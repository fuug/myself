<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\EditRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class EditController extends Controller
{
    public function __invoke(EditRequest $request)
    {
        $data = $request->validated();
        $data['thumbnail'] = Storage::put('/images', $data['thumbnail']);

        $user = User::where('id', $data['user_id'])->first();

        $data['user_role'] = $data['user_role'] ?? $user->role;
        $user->update(array(
            'name'=>$data['name'],
            'email'=>$data['email'],
            'description'=>$data['description'],
            'role'=>$data['user_role'],
            'thumbnail' => $data['thumbnail'],
            'role_rus'=> $this->getRoleName($data['user_role']),
        ));
        $user->categories()->sync($data['category_ids'] ?? null);

        return redirect()->route('admin.user.show', $data['user_id']);
    }

    private function getRoleName($user_role): string
    {
        switch ($user_role) {
            case 'admin':
                return 'Администратор';
            case 'moderator':
                return 'Модератор';
            case 'performer':
                return 'Исполнитель';
            case 'customer':
                return 'Заказчик';
            default:
                return '';
        }
    }
}
