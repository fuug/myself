<?php

namespace App\Http\Controllers\Main\Performer\Review;

use App\Http\Controllers\Controller;
use App\Http\Requests\Review\StoreRequest;
use App\Models\Review;
use App\Models\User;
use function redirect;

class StoreController extends Controller
{
    public function __invoke(User $performer, StoreRequest $request)
    {
        $data = $request->validated();
        $data['incognito'] = isset($data['incognito']) ? 1 : 0;
        $data['published'] = 0;
        $data['customer_id'] = $performer->id;
        Review::create($data);
        return redirect()->route('performer.about', $performer->id);
    }
}
