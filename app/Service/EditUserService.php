<?php

namespace App\Service;

use App\Models\PerformerDescription;

class EditUserService
{
    public static function savePerformer($data, $user)
    {
        self::saveUser($data, $user);

        $description = $user->performerDescription;

        $user->categories()->sync($data['category_ids'] ?? null);
        $user->activities()->sync($data['activity_ids'] ?? null);
        unset(
            $data['firstname'],
            $data['surname'],
            $data['email'],
            $data['category_ids'],
            $data['activity_ids'],
            $data['timezone'],
            $data['currency_id']
        );

        if ($description != null) {
            $description->update($data);
        } else {
            PerformerDescription::create($data);
        }

    }

    public static function saveUser($data, $user)
    {
        $user->update(array(
            'name' => $data['firstname'] . ' ' . $data['surname'],
            'email' => $data['email'],
            'timezone' => $data['timezone'],
            'currency_id' => $data['currency_id']
        ));
    }
}
