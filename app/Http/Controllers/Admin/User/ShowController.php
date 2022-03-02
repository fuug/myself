<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(User $user)
    {
        $categories = Category::all();
        $activities = Activity::all();
        $subscriptions = $user->subscriptions_performer;
        return view('admin.user.show', compact('user', 'categories', 'activities', 'subscriptions'));
    }
}
