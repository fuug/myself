<?php

namespace App\Http\Controllers\Admin\Activity;

use App\Models\Activity;

class DeleteController
{
    public function __invoke(Activity $activity) {
        $activity->delete();
        return redirect()->route('admin.activity.index');
    }
}
