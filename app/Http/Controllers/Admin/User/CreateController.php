<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\CreateRequest;
use App\Mail\User\PasswordMail;
use App\Models\PerformerDescription;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class CreateController extends Controller
{
    public function __invoke(CreateRequest $request)
    {
        $data = $request->validated();
        $password = Str::random(10);
        $user = User::create([
            'name' => $data['username'],
            'email' => $data['email'],
            'thumbnail' => 'images/guest.png',
            'password' => Hash::make($password),
            'role_id' => $data['role_id']
        ]);
        Mail::to($data['email'])->send(new PasswordMail($password));
        event(new Registered($user));

        if ($user->role->title == 'performer') {
            PerformerDescription::create([
                "user_id"=> $user->id
            ]);
        }

        return redirect()->route('admin.user.index');
    }
}
