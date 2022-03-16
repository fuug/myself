<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RestoreEmailController extends Controller
{
    public function __invoke(Request $request)
    {
        User::all()->where('id', $request->id)->first()->update(array('email' => $request->email));
        return 'success';
    }
}
