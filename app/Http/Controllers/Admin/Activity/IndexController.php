<?php

namespace App\Http\Controllers\Admin\Activity;

use App\Http\Controllers\Controller;
use App\Models\Activity;

class IndexController extends Controller
{
    public function __invoke()
    {
        $activities = Activity::all();
        return view('admin.activity.index', compact('activities'));
    }
}
