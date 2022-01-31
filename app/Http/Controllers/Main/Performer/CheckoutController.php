<?php

namespace App\Http\Controllers\Main\Performer;

use App\Http\Requests\Main\TotalRequest;
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

    public function getTotalPrice(TotalRequest $request) {
        $performer = User::all()->where('id', $request->performer_id)->first();
        // performer_id
        // session_id
        // price
        return $performer->name;
    }
    public function payment (){
        return view('user.payment');
    }
}
