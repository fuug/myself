<?php

namespace App\Service;

use App\Models\Session;
use App\Models\Subscription;
use Carbon\Carbon;



class ListUrgencyService
{
    public static function getPerformers(): array
    {
        $subscription_ids = Session::all();

//        $subscription_ids = Session::where(function ($query) {
//            $query->where('end', '<=', Carbon::now('3'))
//                ->orWhere('start', '>=', Carbon::now('4'));
//        })->get();
        $subscription_ids = self::getSubscriptionIds(4, 3);
        $performers = [];
        foreach ($subscription_ids as $subscription_id) {
            $performers[] = Subscription::all()->where('id', $subscription_id)->first()->performer;
        }
        return $performers;
    }


    public static function getSubscriptionIds(int $start, int $end): array
    {
        $sessions = Session::where(function ($query) use ($start, $end) {
            $query->where('end', '<=', Carbon::now($end))
                ->orWhere('start', '>=', Carbon::now($start));
        })->get();

        if ($sessions->count() <= 3) {
            $start += 1;
            $end += 1;
            return self::getSubscriptionIds($start, $end);
        }
        return array_keys($sessions->groupBy('subscription_id')->toArray());
    }


}
