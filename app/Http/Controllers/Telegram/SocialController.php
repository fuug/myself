<?php

namespace App\Http\Controllers\Telegram;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Telegram\ConfirmRequest;
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
        if ($user->email == null) {
            return view('auth.telegram.email', compact('user'));
        }
        $objSocial = new SocialService();
        if ($objSocial->saveSocialData($user)) {
            return redirect('');
        }
        return back();
    }

    public function continueWithEmail(ConfirmRequest $request)
    {
        $user = [
            'name' => $request->user_name,
            'email' => $request->user_email
        ];
        $objSocial = new SocialService();
        if ($objSocial->saveSocialDataFromArray($user)) {
            return redirect('');
        }
        return back();

    }

}
