<?php

namespace App\Http\Controllers\Main\Performer;

use App\Http\Requests\Main\PaymentRequest;
use App\Models\Role;
use App\Models\User;

class CheckoutController
{

    public function __invoke(User $currentPerformer)
    {
        $subscriptions = $currentPerformer->subscriptions_performer;
        $pricePerOne = $currentPerformer->performerDescription->pricePerOnceSession;
        $performers = Role::all()->where('title', 'performer')->first()->users;
        return view('user.checkout', compact('performers' ,'currentPerformer', 'subscriptions', 'pricePerOne'));
    }

    public function payment (PaymentRequest $request){
        $performer_id = $request->performer_id;
        $subscription_id = $request->subscription_id;
        $sum = $request->hiddenSum;
        return view('user.payment', compact('performer_id', 'subscription_id', 'sum'));
    }
}
