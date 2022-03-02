<?php

namespace App\Http\Controllers\Admin\Activity;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\RenameRequest;
use App\Models\Activity;

class RenameController extends Controller
{
    public function __invoke(RenameRequest $request)
    {

        $data = $request->validated();
        $activity = Activity::where('id', $data['cat_id'])->first();
        $activity->update(array('title'=>$data['title']));
        return redirect()->route('admin.activity.index');
    }
}
