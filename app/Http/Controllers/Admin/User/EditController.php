<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\RenameRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(RenameRequest $request)
    {

        $data = $request->validated();
        $category = Category::where('id', $data['cat_id'])->first();
        $category->update(array('title'=>$data['title']));
        return redirect()->route('admin.category.index');
    }
}
