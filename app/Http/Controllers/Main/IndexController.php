<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Main\FilterRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('main.index');
    }

    public function performersList()
    {
        $performers = User::all()->where('role', 'performer');
        $categories = Category::all();
        return view('main.performers', compact('performers', 'categories'));
    }

    public function performersListFilters(FilterRequest $request)
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
        return view('main.performers', compact('performers', 'categories', 'old_category', 'gender', 'price'));
    }
}
