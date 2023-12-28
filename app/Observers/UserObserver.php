<?php

namespace App\Observers;

use App\Models\User;
use Stripe\StripeClient;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $customer)
    {
        $stripe = new StripeClient(env('STRIPE_SECRET'));
        $customer_stripe = $stripe->customers->create([
            'name' => $customer->full_name,
            'email' => $customer->email,
            'phone' => $customer->phone,
            'payment_method' => 'pm_card_visa',
        ]);

        $customer->update([
            'customer_stripe_id' => $customer_stripe['id']
        ]);
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
