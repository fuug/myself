<?php

namespace App\Http\Controllers\Admin\Activity;

use App\Http\Controllers\Controller;
use App\Models\Activity;

class ShowController extends Controller
{
    public function __invoke(Activity $activity)
    {
        return view('admin.activity.show', compact('activity'));
    }
}
