<?php

namespace App\Service;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class SocialService
{
    public function saveSocialData($user)
    {
        $password = Hash::make('11111111');

        $isUser = User::where('email', $user->email)->first();
        if ($isUser) {
            Auth::login($isUser);
            return true;
        }

        $createUser = User::create([
            'name' => $user->name,
            'email' => $user->email,
            'password' => $password
        ]);

        Auth::login($createUser);


        return redirect('Main');
    }
}
