<?php

namespace App\Http\Controllers\Facebook;

use App\Http\Controllers\Controller;
use App\Service\SocialService;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function index()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback()
    {
        $user = Socialite::driver('facebook')->stateless()->user();
        $objSocial = new SocialService();
        if ($objSocial->saveSocialData($user)) {
            return redirect('');
        }

        return back();
    }
}
