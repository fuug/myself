<?php

namespace App\Http\Controllers\Admin\Statistic;

use App\Http\Requests\Admin\Statistic\DateRequest;
use App\Models\User;
use Carbon\Carbon;

class IndexController
{
    public function __invoke()
    {
        $users = User::all()->where('role', 'performer');
        $now = Carbon::now();
        $startDate = $now->startOfWeek()->format('Y-m-d');
        $endDate = $now->endOfWeek()->format('Y-m-d');
        return view('admin.statistics.index', compact('users', 'startDate', 'endDate'));
    }

    public function formatByDate(DateRequest $request)
    {
        $data = $request->validated();
        $users = User::all()->where('role', 'performer');
        $startDate = $data['startDate'];
        $endDate = $data['endDate'];
        return view('admin.statistics.index', compact('users', 'startDate', 'endDate'));
    }
}
