<?php

namespace App\Http\Controllers\Admin\Review;

use App\Http\Controllers\Controller;
use App\Models\Review;
use function view;

class ShowController extends Controller
{
    public function __invoke(Review $review)
    {
        return view('admin.review.show', compact('review'));
    }
}
