<?php

namespace App\Service;

use App\Models\PerformerDescription;

class EditUserService
{
    public static function savePerformer($data, $user)
    {
        self::saveUser($data['firstname'] . ' ' . $data['surname'], $data['email'], $user);

        $description = $user->performerDescription;

        $user->categories()->sync($data['category_ids'] ?? null);
        $user->activities()->sync($data['activity_ids'] ?? null);
        unset($data['firstname'], $data['surname'], $data['email'], $data['category_ids'], $data['activity_ids']);

        if ($description != null) {
            $description->update($data);
        } else {
            PerformerDescription::create($data);
        }

    }

    public static function saveUser($name, $email, $user)
    {
        $user->update(array(
            'name' => $name,
            'email' => $email,
        ));
    }
}
