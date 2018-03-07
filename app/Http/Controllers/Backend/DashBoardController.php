<?php

namespace App\Http\Controllers\Backend;

use App\Core\PrimaryController;
use App\Http\Requests;
use App\Src\Currency\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class DashBoardController extends PrimaryController
{
    public function index()
    {
        return view('backend.modules.home.main');
    }

    public function BackupDB()
    {
        Artisan::call('backup:db');

        return back()->with('success', 'db packed successfully');
    }

    public function currencyUpdate()
    {
        Artisan::call('currency:update');

        return redirect()->back()->with('success', 'currency updated');
    }

    public function toggleActivate(Request $request)
    {
//        $className = '\App\Src\\' . title_case($request->model);
//        $element = new $className();
//        $element = $element->withoutGlobalScopes()->whereId($request->id)->first();
        $element = Currency::whereId($request->id)->first();
        $element->update([
            'active' => !$element->active
        ]);
        return redirect()->back()->with('success', 'Process Success');
    }
}
