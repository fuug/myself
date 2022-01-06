<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Service\SocialService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
