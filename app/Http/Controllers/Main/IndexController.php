<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('main.index');
    }

    public function timezone(Request $request)
    {
        if (auth()->user() != null) {
            auth()->user()->update(array('timezone' => $request->timezone));
        } else {
            Cookie::queue('timezone', $request->timezone, 60 * 24 * 30);
        }
        return redirect(url()->previous());
    }

    public function privacy(Request $request)
    {
        if (auth()->user() != null) {
            auth()->user()->update(array('privacy' => true));
        } else {
            Cookie::queue('privacy', $request->privacy, 60 * 24 * 30);
        }
        return redirect(url()->previous());
    }

    public function currency(Request $request)
    {
        if (auth()->user() != null) {
            auth()->user()->update(array('currency_id' => $request->currency));
        } else {
            Cookie::queue('currency_id', $request->currency, 60 * 24 * 30);
        }
        return redirect(url()->previous());
    }

    public function urgency()
    {
        if (auth()->user() != null) {
            auth()->user()->update(array('show_urgency' => false));
        } else {
            Cookie::queue('show_urgency', 1, 60 * 24 * 30);
        }
        return redirect(url()->previous());
    }
}
