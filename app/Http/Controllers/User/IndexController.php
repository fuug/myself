<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Event\DeleteEventRequest;
use App\Http\Requests\Event\StoreRequest;
use App\Models\Session;
use App\Models\User;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function __invoke(User $user)
    {
        return view('user.index', compact('user'));
    }

    public function customersList(User $user)
    {
        $customers = $user->getCustomers();
        return view('user.customersList', compact('user', 'customers'));
    }

    public function storeSession(User $user, StoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        //Конвертируем время пользователя в UTC, для представления пользователю в другом часовом поясе
        $timeStart = Carbon::createFromFormat('H:i', $request->start, $user->timezone)->setTimezone('UTC');
        $timeEnd = Carbon::createFromFormat('H:i', $request->end, $user->timezone)->setTimezone('UTC');

        Session::create([
            'performer_id' => $user->id,
            'title' => 'Свободное место',
            'start' => $request->date . ' ' . $timeStart->format('H:i'),
            'end' => $request->date . ' ' . $timeEnd->format('H:i')
        ]);

        return redirect()->route('user.profile.index', compact('user'));
    }

    public function deleteEvent(User $user, DeleteEventRequest $request): \Illuminate\Http\RedirectResponse
    {
        Session::all()->where('id', $request->eventId)->first()->delete();
        return redirect()->route('user.profile.index', compact('user'));
    }

}
