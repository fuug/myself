<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke(User $user)
    {
        return view('user.index', compact('user'));
    }
}
