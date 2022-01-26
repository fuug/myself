<?php

namespace App\Http\Controllers\Main\Performer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Main\FilterRequest;
use App\Models\Category;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke()
    {
        $performers = User::all()->where('role', 'performer');
        $categories = Category::all();
        return view('main.performersList', compact('performers', 'categories'));
    }

    public function filtered(FilterRequest $request)
    {
        $performers = User::all()->where('role', 'performer');
        $categories = Category::all();
        $old_category = $request['category'];
        $gender = $request['gender'];
        $price = $request['price'];

        if ($old_category != 'default') {
            foreach ($performers as $key => $performer) {
                if (!$performer->hasCategory($request['category'])) {
                    unset($performers[$key]);
                }
            }
        }
        if ($gender != 'default') {
            $performers = $performers->where('gender', $request['gender']);
        }
        if ($price != 'default') {
            $performers = $performers->where('price', $request['price']);
        }
        return view('main.performers.list', compact('performers', 'categories', 'old_category', 'gender', 'price'));
    }

}
