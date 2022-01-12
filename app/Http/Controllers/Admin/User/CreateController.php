<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\CreateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke(CreateRequest  $request)
    {
//        $data = $request->validated();
        return redirect()->route('admin.category.index');
    }
}
