<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index() {
        $cartItems  = session()->get('cart', []);
        $products = [];
        foreach ($cartItems as $key => $value) {
            $product               = Product::where('id', $key)->first();
            $product['quantity']   = $value;
            array_push($products, $product);
        }
        return view('checkout', compact('products'));
    }

    public function store(Request $request) {
        // $data = $request->validate([
        //     "full_name"         => 'required',
        //     "email"             => 'required|email|exists:users,email',
        //     "address"           => 'required',
        //     "country"           => 'required',
        //     "state"             => 'required',
        //     "zip"               => 'required',
        //     "cc_name"           => 'required',
        //     "cc_number"         => 'required',
        //     "cc_expiration"     => 'required',
        //     "cc_cvv"            => 'required'
        // ]);

        $data = $request->all();

        $user = User::create([
            'full_name'     => $data['full_name'],
            'email'         => $data['email'],
            'address'       => $data['address'] .', '. $data['state'] .', '. $data['country'] .', '. $data['zip'],
            'password'      => bcrypt('abcd1234')
        ]);

        $cartItems      = session()->get('cart', []);
        $total_quantity = 0;
        $total_amount   = 0;

        $order                  = Order::create([
            'user_id'           => $user->id,
            'track_number'      => substr(md5(microtime()),rand(0,26),10),
            'address'           => $data['address'] .', '. $data['state'] .', '. $data['country'] .', '. $data['zip'],
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
}
