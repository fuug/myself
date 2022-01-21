<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\CreateRequest;
use App\Mail\User\PasswordMail;
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
            'role' => $data['user_role'],
            'thumbnail' => 'images/guest.png',
            'role_rus' => $this->getRoleName($data['user_role']),
            'password' => Hash::make($password),
        ]);
        Mail::to($data['email'])->send(new PasswordMail($password));
        event(new Registered($user));
        return redirect()->route('admin.user.index');
    }

    private function getRoleName($user_role): string
    {
        switch ($user_role) {
            case 'admin':
                $role = 'Администратор';
                break;
            case 'moderator':
                $role = 'Модератор';
                break;
            case 'performer':
                $role = 'Исполнитель';
                break;
            default:
                $role = 'Заказчик';
                break;
        }
        return $role;
    }
}
