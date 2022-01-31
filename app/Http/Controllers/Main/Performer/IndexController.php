<?php

namespace App\Http\Controllers\Main\Performer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Main\FilterRequest;
use App\Models\Category;
use App\Models\Role;
use App\Models\User;
use App\Service\PerformersFilterService;

class IndexController extends Controller
{
    public function __invoke()
    {
        $performers = Role::all()->where('title', 'performer')->first()->users;
        $categories = Category::all();
        return view('main.performer.performersList', compact('performers', 'categories'));
    }

    public function filtered(FilterRequest $request)
    {
        $categories = Category::all();

        $old_category = $request['category'];
        $gender = $request['gender'];
        $price = $request['price'];

        $performers = PerformersFilterService::getPerformers($request);

        return view('main.performer.performersList', compact('performers', 'categories', 'old_category', 'gender', 'price'));
    }

}
