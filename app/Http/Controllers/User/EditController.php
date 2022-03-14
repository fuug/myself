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
        $timeZoneList = self::getTimeZoneList();
        return view('user.editProfile', compact('user', 'categories', 'activities', 'timeZoneList'));
    }

    public function save(User $user, EditRequest $request)
    {
        if ($user->role->title == 'performer') {
            EditUserService::savePerformer($request->validated(), $user);
        } else {
            EditUserService::saveUser($request->validated(),$user);
        }
        return redirect()->route('user.profile.index', $user);
    }

    static public function getTimeZoneList()
    {
        return \Cache::rememberForever('timezones_list_collection', function () {
            $timestamp = time();
            foreach (timezone_identifiers_list(\DateTimeZone::ALL) as $key => $value) {
                date_default_timezone_set($value);
                $timezone[$value] = $value . ' (UTC ' . date('P', $timestamp) . ')';
            }
            return collect($timezone)->sortKeys();
        });
    }
}
