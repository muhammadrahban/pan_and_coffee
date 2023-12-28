<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Stripe\Charge;
use Stripe\Stripe;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems  = session()->get('cart', []);
        $products = [];
        foreach ($cartItems as $key => $value) {
            $product               = Product::where('id', $key)->first();
            $product['quantity']   = $value;
            array_push($products, $product);
        }
        return view('checkout', compact('products'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "full_name"         => 'required',
            "email"             => 'required|email', //|exists:users,email
            "address"           => 'required',
            "country"           => 'required',
            "state"             => 'required',
            "city"              => 'required',
            "phone"             => 'required',
            "zip"               => 'required',
            "cc_name"           => 'required',
            "cc_number"         => 'required',
            "cc_month"          => 'required',
            "cc_year"           => 'required',
            "cc_cvv"            => 'required',
            "stripeToken"       => 'required'
        ]);

        $cartItems      = session()->get('cart', []);
        $total_quantity = 0;
        $total_amount   = 0;

        // Create Auth Token
        $this->createAuthToken($request);

        // Address Varification Code by UPS
        $varifyAddress = $this->varifyAddress($request);
        $varifyAddress = json_decode($varifyAddress);
        if (!($varifyAddress->XAVResponse ?? null) || $varifyAddress->XAVResponse->Response->ResponseStatus->Code != "1") {
            return back()->with("error", "Your Address Is Invalid for UPS!");
        }
        // return $varifyAddress;

        // Stripe Amount
        $stripe_total_amount = 0;
        foreach ($cartItems as $key => $value) {
            $products               = Product::where('id', $key)->first();
            $stripe_total_amount   += ($value * $products->price);
        }
        $this->StripePaymant($request, $stripe_total_amount);

        // Shipping Order Code by UPS
        $shipping = $this->shipping($request);
        $shipping = json_decode($shipping);

        if(!($shipping->ShipmentResponse ?? null) || $shipping->ShipmentResponse->Response->ResponseStatus->Code != "1"){
            return back()->with("error", "UPS Can't accept this Order Please try leter!");
        }
        $shipping       = $shipping->ShipmentResponse;
        $trackingNumber = $shipping->ShipmentResults->PackageResults->TrackingNumber;
        $shippingImage  = $shipping->ShipmentResults->PackageResults->ShippingLabel->GraphicImage;
        // return $shipping;

        $data = $request->all();

        $user = User::firstOrCreate([
            'email'         => $data['email']
            ],[
            'full_name'     => $data['full_name'],
            'phone'         => $data['phone'],
            'address'       => $data['address'] . ', ' . $data['state'] . ', ' . $data['city'] . ' ' . $data['zip'] . ', ' . $data['country'],
            'password'      => bcrypt('abcd1234')
        ]);

        $order                  = Order::create([
            'user_id'           => $user->id,
            'track_number'      => $trackingNumber, // substr(md5(microtime()), rand(0, 26), 10),
            'parcel_image'      => $shippingImage, // UPS Shipping parcel Image,
            'address'           => $data['address'] . ', ' . $data['state'] . ', ' . $data['city'] . ' ' . $data['zip'] . ', ' . $data['country'],
            'phone'             => $data['phone'],
            'status'            => 'pending',
            'payment_status'    => 'pending',
        ]);
        foreach ($cartItems as $key => $value) {
            $products               = Product::where('id', $key)->first();
            $products['quantity']   = $value;
            $total_quantity        += $value;
            $total_amount          += ($value * $products->price);
            OrderDetail::create([
                'order_id'      => $order->id,
                'product_id'    => $key,
                'quantity'      => $value,
                'price'         => ($value * $products->price),
            ]);
        }
        $order->update([
            'quantity'      => $total_quantity,
            'total_amount'  => $total_amount
        ]);
        session()->forget('cart');
        return redirect(route('main'));
    }

    private function varifyAddress($request)
    {
        $token          = session()->get('access_token', [])['access_token'] ?? config('app.USP_ACCESS_TOKEN');
        $version        = 'v1';
        $requestOption  = 1;

        $query = [
            "regionalrequestindicator" => false,
            "maximumcandidatelistsize" => "1"
        ];

        $payload = [
            "XAVRequest" => [
                "AddressKeyFormat" => [
                    "AddressLine"           => ["$request->address"],
                    "PoliticalDivision1"    => $request->state,
                    "PoliticalDivision2"    => $request->city,
                    "PostcodePrimaryLow"    => $request->zip,
                    "CountryCode"           => $request->country
                ]
            ]
        ];

        try {
            $response = Http::withHeaders([
                "Authorization" => "Bearer $token",
                "Content-Type" => "application/json"
            ])->post("https://wwwcie.ups.com/api/addressvalidation/{$version}/{$requestOption}?" . http_build_query($query), $payload);

            return $response->body();
        } catch (\Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    private function createAuthToken($request)
    {
        // Get values from the environment variables
        $clientId = env('UPS_CLIENT_ID');
        $clientSecret = env('UPS_CLIENT_SECRET');

        $curl = curl_init();

        $payload = "grant_type=client_credentials";

        curl_setopt_array($curl, [
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/x-www-form-urlencoded",
                "x-merchant-id: string",
                "Authorization: Basic " . base64_encode("$clientId:$clientSecret")
            ],
            CURLOPT_POSTFIELDS => $payload,
            CURLOPT_URL => "https://wwwcie.ups.com/security/v1/oauth/token",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        if ($error) {
            return false;
        } else {
            $response       = json_decode($response);
            $access_token   = $response->access_token;
            session()->forget('access_token');
            session()->get('access_token', []);
            $cart['access_token']   = $response->access_token;
            $request->session()->put('access_token', $cart);
            return $access_token;
        }
    }

    private function shipping($request) {
        $token      = session()->get('access_token', [])['access_token'] ?? config('app.USP_ACCESS_TOKEN');
        $version    = 'v1';
        $query      = [
            "additionaladdressvalidation" => "string"
        ];

        $payload = [
            "ShipmentRequest" => [
                "Request" => [
                    "SubVersion" => "1801",
                    "RequestOption" => "nonvalidate",
                    "TransactionReference" => [
                        "CustomerContext" => ""
                    ]
                ],
                "Shipment" => [
                    "Shipper" => [
                        "Name" => "Pan & Coffee",
                        "Phone" => [
                            "Number" => "1115554758",
                            "Extension" => " "
                        ],
                        "ShipperNumber" => "G52K27",
                        "Address" => [
                            "AddressLine" => ["19298 Stone Oak Parkway"],
                            "City" => "SAN ANTONIO",
                            "StateProvinceCode" => "MD",
                            "PostalCode" => "21093",
                            "CountryCode" => "US"
                        ]
                    ],
                    "ShipTo" => [
                        "Name" => $request->full_name,
                        "Phone" => [
                            "Number" => $request->phone
                        ],
                        "Address" => [
                            "AddressLine"           => ["$request->address"],
                            "City"                  => $request->city,
                            "StateProvinceCode"     => $request->state,
                            "PostalCode"            => $request->zip,
                            "CountryCode"           => $request->country
                        ],
                        "Residential" => " "
                    ],
                    "PaymentInformation" => [
                        "ShipmentCharge" => [
                            "Type" => "01",
                            "BillShipper" => [
                                "AccountNumber" => "G52K27"
                            ]
                        ],
                    ],
                    "Service" => [
                        "Code" => "03",
                        "Description" => "Express"
                    ],
                    "Package" => [
                        "Description" => " ",
                        "Packaging" => [
                            "Code" => "02",
                            "Description" => "Pan&Coffee Bakery Cakes"
                        ],
                        "Dimensions" => [
                            "UnitOfMeasurement" => [
                                "Code" => "IN",
                                "Description" => "Inches"
                            ],
                            "Length" => "10",
                            "Width" => "30",
                            "Height" => "45"
                        ],
                        "PackageWeight" => [
                            "UnitOfMeasurement" => [
                                "Code" => "LBS",
                                "Description" => "Pounds"
                            ],
                            "Weight" => "5"
                        ]
                    ],
                ],
                "LabelSpecification" => [
                    "LabelImageFormat" => [
                        "Code" => "GIF",
                        "Description" => "GIF"
                    ],
                    "HTTPUserAgent" => "Mozilla/4.5"
                ]
            ]
        ];

        try {
            $response = Http::withHeaders([
                "Authorization" => "Bearer $token",
                "Content-Type" => "application/json",
                "transId" => "string",
                "transactionSrc" => "testing"
            ])->post("https://wwwcie.ups.com/api/shipments/{$version}/ship?" . http_build_query($query), $payload);

            return $response->body();
        } catch (\Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    private function StripePaymant($request, $amount) {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        Charge::create ([
            "amount" => $amount * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Order From Pan&Coffee."
        ]);
    }
}
