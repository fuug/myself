<?php

namespace App\Http\Controllers\Telegram;

use App\Http\Controllers\Controller;
use App\Service\SocialService;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function index()
    {
        return Socialite::driver('telegram')->redirect();
    }

    public function callback()
    {
        $user = Socialite::driver('telegram')->stateless()->user();
        dd($user);
        $objSocial = new SocialService();
        if ($objSocial->saveSocialData($user)) {
            return redirect('');
        }

        return back();
    }
}
