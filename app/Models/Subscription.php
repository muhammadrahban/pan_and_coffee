<?php

namespace App\Models;

use Stripe\StripeClient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'package_id',
        'charge_id',
        'amount',
        'currency',
        'end_date',
        'status',
        'transaction_id',
        'paid_from',
        'payment_method',
        'payment_status'
    ];

    protected $casts = [
        'end_date' => 'datetime',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function charge($card, $return_url, $customer = null)
    {
        if ($this->amount == 0) return $this; // No need to charge

        $stripe = new StripeClient(env('STRIPE_SECRET'));
        if (!$customer) $customer = auth()->user();
        if ($this->transaction_id == null) {

            $intent = $stripe->paymentIntents->create([
                "amount" => round($this->amount * 100), // amount in cents
                "currency" => 'USD',
                "payment_method_types" => ['card'],
                "payment_method_options" => ['card' => ['setup_future_usage' => 'off_session']],
                "description" => "Order #$this->order_id | $this->created_at",
                "customer" => $customer['customer_stripe_id'],
                "metadata" => [
                    'ordder_id' => $this->id,
                ]
            ])->confirm([
                'payment_method' => $card,
                'return_url' => $return_url
            ]);
        } else {

            $intent = $stripe->paymentIntents->retrieve($this->transaction_id, []);
            $intent->confirm([
                'payment_method' => $card,
                'return_url' => $return_url
            ]);
        }

        $this->update([
            'transaction_id' => $intent->id,
            'paid_from' => 'card',
            'payment_status' => $intent->status
        ]);

        $this->intent_id = $intent->id;
        $this->status = $intent->status;
        //dd($intent->next_action);
        $this->redirect_url = @$intent->next_action->redirect_to_url->url;
        return $this;
    }
}
