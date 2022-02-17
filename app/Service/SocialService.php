<?php

namespace App\Service;

use App\Mail\User\PasswordMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class SocialService
{
    public function saveSocialData($user)
    {
        $password = Str::random(10);

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
        Mail::to($user->email)->send(new PasswordMail($password));
        event(new Registered($user));
        Auth::login($createUser);


        return redirect('Main');
    }

    public function saveSocialDataFromArray($user)
    {
        $password = Str::random(10);

        $isUser = User::where('email', $user['email'])->first();
        if ($isUser) {
            Auth::login($isUser);
            return true;
        }

        $createUser = User::create([
            'name' => $user['name'],
            'email' => $user['email'],
            'role_id' => Role::all()->where('title', 'customer')->first()->id,
            'password' => $password
        ]);
        Mail::to($createUser->email)->send(new PasswordMail($password));
        event(new Registered($createUser));
        Auth::login($createUser);


        return redirect('Main');
    }
}
