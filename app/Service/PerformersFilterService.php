<?php

namespace App\Service;


use App\Models\Role;

class PerformersFilterService
{
    public static function getPerformers($request)
    {
        $performers = Role::all()->where('title', 'performer')->first()->users()->paginate(9);

        if ($request['category'] != 'default') {
            foreach ($performers as $key => $performer) {
                if (!$performer->hasCategory($request['category'])) {
                    unset($performers[$key]);
                }
            }
        }
        if ($request['gender'] != 'default') {
            foreach ($performers as $key => $performer) {
                if (!$performer->hasGender($request['gender'])) {
                    unset($performers[$key]);
                }
            }
        }
        if ($request['price'] != 'default') {
            $price = explode(',', $request['price']);
            foreach ($performers as $key => $performer) {
                if (!self::checkSum($performer, $price)) {
                    unset($performers[$key]);
                }
            }
        }

        return $performers;
    }

    private static function checkSum($performer, array $price)
    {
        if ($price[0] == '') { // n < price
            if ($performer->performerDescription->pricePerOnceSession <= $price[1]) {
                return true;
            }
        } elseif ($price[1] == '') { // n > price
            if ($performer->performerDescription->pricePerOnceSession >= $price[0]) {
                return true;
            }
        } else { // price < n < price
            if ($performer->performerDescription->pricePerOnceSession > $price[0] && $performer->performerDescription->pricePerOnceSession < $price[1]) {
                return true;
            }
        }
        return false;
    }
}
