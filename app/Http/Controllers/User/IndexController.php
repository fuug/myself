<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Event\DeleteEventRequest;
use App\Http\Requests\Event\StoreRequest;
use App\Models\Session;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke(User $user)
    {
        $timeZoneList = self::getTimeZoneList();
        return view('user.index', compact('user', 'timeZoneList'));
    }

    public function storeSession(User $user, StoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        Session::create([
            'performer_id' => $user->id,
            'title' => 'Свободное место',
            'start' => $request->date . ' ' . $request->start,
            'end' => $request->date . ' ' . $request->end
        ]);

        return redirect()->route('user.profile.index', compact('user'));
    }

    public function deleteEvent(User $user, DeleteEventRequest $request): \Illuminate\Http\RedirectResponse
    {
        Session::all()->where('id', $request->eventId)->first()->delete();
        return redirect()->route('user.profile.index', compact('user'));
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
