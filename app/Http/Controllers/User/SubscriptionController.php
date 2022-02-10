<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Event\ConfirmRequest;
use App\Http\Requests\Event\DeleteEventRequest;
use App\Http\Requests\Event\StoreRequest;
use App\Models\Event;
use App\Models\Session;
use App\Models\Subscription;
use App\Models\User;

class SubscriptionController extends Controller
{
    public function __invoke(User $user)
    {
        $subscriptions = $user->subscriptions_customer->where('customer_id', '');
        return view('user.subscriptions', compact('user', 'subscriptions'));
    }

    public function sessions(User $user, Subscription $subscription)
    {
        $performerEvents = User::all()->where('id', $subscription->performer_id)->first()->performerSessions->where('customer_id', '');
        return view('user.sessions', compact('user', 'subscription', 'performerEvents'));
    }

    public function confirmSession(User $customer, ConfirmRequest $request): string
    {
        $session = Session::all()->where('id', $request->sessionId)->first();
        $subscription = Subscription::all()->where('id', $request->subscriptionId)->first();
        if($subscription->sessions()->count() < $subscription->session_count) {
            $session->update([
                'customer_id' => $customer->id,
                'subscription_id' => $subscription->id
            ]);
        } else {
            return 'err';
        }

        return 'success';
    }
}
