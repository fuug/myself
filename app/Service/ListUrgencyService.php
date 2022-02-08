<?php

namespace App\Service;

use App\Models\Session;
use App\Models\Subscription;
use App\Models\User;
use Carbon\Carbon;


class ListUrgencyService
{
    public static function getNearPerformers()
    {
        $performers = User::getPerformers();

        foreach ($performers as $key => $performer) {
            if ($performer->getNearSessions() === null) unset($performers[$key]);
        }

        return $performers->sortBy(function ($performer) {
            return $performer->getNearSessions()->start;
        });
    }

}
