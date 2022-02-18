<?php

namespace App\Http\Controllers\Admin\Review;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Review\StoreRequest;
use App\Models\Review;
use function dd;
use function redirect;

class StoreController extends Controller
{
    public function __invoke(Review $review, StoreRequest $request)
    {
        $data = $request->validated();
        dd($data);
        $data['published'] = isset($data['published']) ? 1 : 0;
        $review->update($data);
        return redirect()->route('admin.review.index');
    }
}
