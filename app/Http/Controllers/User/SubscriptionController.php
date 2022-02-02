<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Event\ConfirmRequest;
use App\Http\Requests\Event\DeleteEventRequest;
use App\Http\Requests\Event\StoreRequest;
use App\Models\Event;
use App\Models\Subscription;
use App\Models\User;

class SubscriptionController extends Controller
{
    public function __invoke(User $user)
    {
        $subscriptions = $user->subscriptions_customer;
        return view('user.subscriptions', compact('user', 'subscriptions'));
    }

    public function events(User $user, Subscription $subscription)
    {
        $performerEvents = User::all()->where('id', $subscription->performer_id)->first()->performerEvents->where('customer_id', '');
        return view('user.events', compact('user', 'subscription', 'performerEvents'));
    }

    public function confirmEvent(User $customer, ConfirmRequest $request)
    {
        $event = Event::all()->where('id', $request->eventId)->first();
        $performer = User::all()->where('id', $event->performer_id)->first();
        $allEventsCount = $performer->performerEvents()->where('customer_id', $customer->id)->count();

        $subscription = Subscription::all()->where('id', $request->subscriptionId)->first();

        if($allEventsCount < $subscription->session_count) {
            $event->update([
                'customer_id' => $customer->id
            ]);
        } else {
            return 'err';
        }

        return 'success';
    }
}
