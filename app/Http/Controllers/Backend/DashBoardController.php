<?php

namespace App\Http\Controllers\Backend;

use App\Core\PrimaryController;
use App\Http\Requests;
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
}
