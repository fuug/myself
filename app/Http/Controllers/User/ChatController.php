<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ChatController extends Controller
{
    public function __invoke(User $user)
    {
        $users = User::all()->whereNotIn('id', $user->id);
        return view('user.chat', compact('user', 'users'));
    }

    public function chat(User $user, $second_user_id)
    {
        $users = User::all()->whereNotIn('id', $user->id);
        $second_user = User::all()->where('id', $second_user_id)->first();
        $chat = $user->getChatWith($second_user_id);
        if ($chat == null) {
            $chat = Chat::create(array(
                'user_id' => $user->id,
                'second_user_id' => $second_user_id
            ));
        }
        return view('user.chat-user', compact('user', 'users', 'second_user', 'chat'));
    }

    public function upload(Request $request)
    {
        return Storage::disk('public')->put('/chats/files', $request->file);
    }

}
