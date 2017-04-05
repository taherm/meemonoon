<?php

namespace App\Http\Controllers\Backend;

use App\Core\PrimaryController;
use App\Src\Currency\Currency;
use App\Http\Requests;
use Illuminate\Support\Facades\Artisan;

class CurrencyController extends PrimaryController
{

    public function index()
    {

        $currencies = Currency::all();

        return view('backend.modules.currency.index', compact('currencies'));
    }

    public function updateRates()
    {
        Artisan::call('currency:update');

        return redirect()->route('backend.currency.index')->with('success', 'currencies updated');
    }
}
