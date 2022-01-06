<?php

namespace App\Service;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\True_;

class SocialService
{
    public function saveSocialData($user)
    {
        $isUser = User::where('email', $user->email)->first();
        if ($isUser) {
            Auth::login($isUser);
            return true;
        }

        $createUser = User::create([
            'name' => $user->name,
            'email' => $user->email,
            'password' => encrypt('admin@123')
        ]);

        Auth::login($createUser);


        return true;
    }
}
