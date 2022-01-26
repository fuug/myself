<?php

namespace App\Http\Controllers\Main\Performer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Main\FilterRequest;
use App\Models\Category;
use App\Models\User;
use App\Service\ListUrgencyService;

class ShowController extends Controller
{
    public function __invoke(User $performer)
    {
        return view('main.performer.performerAbout', compact('performer'));
    }

}
