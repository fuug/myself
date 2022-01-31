<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\EditRequest;
use App\Http\Requests\Admin\User\PerformerEditRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class EditController extends Controller
{
    public function __invoke(EditRequest $request)
    {
        $data = $request->validated();
        $user = User::where('id', $data['user_id'])->first();

        $data['role_id'] = $data['role_id'] ?? $user->role->id;
        if(isset($data['thumbnail'])) {
            $data['thumbnail'] = Storage::disk('public')->put('/images', $data['thumbnail']);
        } else {
            $data['thumbnail'] = $user->thumbnail;
        }

        $user->update(array(
            'name'=>$data['name'],
            'email'=>$data['email'],
            'role_id'=>$data['role_id'],
            'thumbnail' => $data['thumbnail'],
        ));
        $user->categories()->sync($data['category_ids'] ?? null);

        return redirect()->route('admin.user.show', $data['user_id']);
    }

    public function performerEdit(PerformerEditRequest $request)
    {

        $data = $request->validated();
        dd($data);
//user_id
//email
//name
//role_id
//description
//category_ids
//experience
//highestCategory
//activities
//thumbnail
        $user = User::where('id', $data['user_id'])->first();

        $data['role_id'] = $data['role_id'] ?? $user->role->id;
        if(isset($data['thumbnail'])) {
            $data['thumbnail'] = Storage::disk('public')->put('/images', $data['thumbnail']);
        } else {
            $data['thumbnail'] = $user->thumbnail;
        }

        $user->update(array(
            'name'=>$data['name'],
            'email'=>$data['email'],
            'role_id'=>$data['role_id'],
            'thumbnail' => $data['thumbnail'],
        ));
        $user->categories()->sync($data['category_ids'] ?? null);

        return redirect()->route('admin.user.show', $data['user_id']);
    }
}
