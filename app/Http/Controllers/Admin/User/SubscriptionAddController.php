<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\SubscriptionAddRequest;
use App\Models\Subscription;
use App\Models\User;


class SubscriptionAddController extends Controller
{
    public function __invoke(User $user, SubscriptionAddRequest $request)
    {
        $data = $request->validated();
        $data = $this->serializeData($data, $user->id);
        Subscription::create($data);
        return redirect()->route('admin.user.show', $user->id);
    }

    private function serializeData(array $data, int $user_id): array
    {
        return [
            'performer_id' => $user_id,
            'price' => $data['price'],
            'session_count' => $data['countSessions']
        ];
    }


}
