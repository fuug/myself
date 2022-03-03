<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\EditRequest;
use App\Models\Activity;
use App\Models\Category;
use App\Models\User;
use App\Service\EditUserService;

class EditController extends Controller
{
    public function __invoke(User $user)
    {
        $categories = Category::all();
        $activities = Activity::all();
        return view('user.editProfile', compact('user', 'categories', 'activities'));
    }

    public function save(User $user, EditRequest $request)
    {
        if ($user->role->title == 'performer') {
            EditUserService::savePerformer($request->validated(), $user);
        } else {
            EditUserService::saveUser($request->firstname . ' ' . $request->surname, $request->email, $user);
        }
        return redirect()->route('user.profile.index', $user);
    }

}
