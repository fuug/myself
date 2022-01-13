<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\CreateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class CreateController extends Controller
{
    public function __invoke(CreateRequest $request)
    {
        $data = $request->validated();
        User::create([
            'name' => $data['username'],
            'email' => $data['email'],
            'role' => $data['user_role'],
            'role_rus' => $this->getRoleName($data['user_role']),
            'password' => Hash::make('11111111'),
        ]);

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
