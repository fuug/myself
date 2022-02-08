<?php

namespace App\Http\Controllers\Main\Performer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Main\FilterRequest;
use App\Models\Category;
use App\Models\User;
use App\Service\ListUrgencyService;

class UrgencyController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $performers = ListUrgencyService::getNearPerformers();

        $categories = Category::all();

        return view('main.performer.urgency', compact('performers', 'categories'));
    }
}
