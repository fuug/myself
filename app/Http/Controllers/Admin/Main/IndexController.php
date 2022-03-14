<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Role;
use App\Models\Session;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $performersCount = Role::all()->where('title', 'performer')->first()->users->count();
        $customersCount = Role::all()->where('title', 'customer')->first()->users->count();
        $subscriptionsCount = Subscription::all()->count();
        $doneSessionsCount = Session::all()->where('status', 'done')->count();
        $currencies = Currency::all();
        return view('admin.main.index', compact('performersCount', 'customersCount', 'subscriptionsCount', 'doneSessionsCount', 'currencies'));
    }
}
