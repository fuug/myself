<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\EditRequest;
use App\Models\User;

class EditController extends Controller
{
    public function __invoke(EditRequest $request)
    {
        $data = $request->validated();
        $category_id = $data['category_ids'];
        unset($data['category_ids']);

        $user = User::where('id', $data['user_id'])->first();
        $role = isset($data['user_role']) ? $data['user_role'] : $user->role;
        $user->update(array(
            'name'=>$data['name'],
            'email'=>$data['email'],
            'role'=>$role,
            'role_rus'=> $this->getRoleName($role),
        ));
        $user->categories()->sync($category_id);
        return redirect()->route('admin.user.index');
    }

    private function getRoleName($user_role)
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
