<?php

namespace App\Http\Controllers\Admin\Review;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Review\EditRequest;
use App\Models\Review;

class EditController extends Controller
{
    public function __invoke(Review $review, EditRequest $request)
    {
        $data = $request->validated();
        $data['published'] = isset($data['published']) ? 1 : 0;
        $review->update($data);
        return redirect()->route('admin.review.index');
    }
}
