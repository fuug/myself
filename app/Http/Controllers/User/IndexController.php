<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Event\DeleteEventRequest;
use App\Http\Requests\Event\StoreRequest;
use App\Models\Event;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke(User $user)
    {
        return view('user.index', compact('user'));
    }

    public function storeEvent(User $user, StoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        Event::create([
            'performer_id' => $user->id,
            'start' => $request->date . ' ' . $request->start,
            'end' => $request->date . ' ' . $request->end
        ]);

        return redirect()->route('user.profile.index', compact('user'));
    }

    public function deleteEvent(User $user, DeleteEventRequest $request): \Illuminate\Http\RedirectResponse
    {
        Event::all()->where('id', $request->eventId)->first()->delete();
        return redirect()->route('user.profile.index', compact('user'));
    }
}
