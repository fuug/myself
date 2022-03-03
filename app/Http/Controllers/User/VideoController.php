<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\VideoRoom\StoreRequest;
use App\Models\User;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function __invoke(User $user)
    {
        // Получаем всех пользователей, которые могут иметь связь с текущим пользователем
        $ids = $user->performerSessions()->whereNotNull('customer_id')->groupBy('customer_id')->pluck('customer_id')->toArray();
        $ids += $user->customerSessions()->whereNotNull('performer_id')->groupBy('performer_id')->pluck('performer_id')->toArray();
        $callableUsers = User::all()->whereIn('id', $ids);
        return view('user.videoroom', compact('callableUsers'));
    }

    public function newId(StoreRequest $request, User $user)
    {
        $user->peer_id = $request->peerId;
        $user->save();
        return $user->peer_id;
    }

    public function getPeerId(Request $request)
    {
        $peer_id = User::all()->where('id', $request->userId)->first()->peer_id;
        return response()->json(['peer_id' => $peer_id]);
    }
}
