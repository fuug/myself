<?php

namespace App\Http\Controllers\Admin\Currency;

use App\Http\Requests\Currency\EditRequest;
use App\Http\Requests\Currency\StoreRequest;
use App\Models\Currency;
use Illuminate\Http\Request;

class IndexController
{
    public function __invoke(StoreRequest $request)
    {
        Currency::create($request->validated());
        return redirect()->route('admin.index');
    }

    public function saveEdits(EditRequest $request)
    {
        $currency = Currency::all()->where('id', $request->id)->first();
        $currency->update($request->validated());
        $currency->save();
        return redirect()->route('admin.index');
    }

    public function destroy(Request $request)
    {
        Currency::destroy($request->id);
        return redirect()->route('admin.index');
    }
}
