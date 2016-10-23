<?php namespace App\Http\Controllers\Frontend;

use App\Core\PrimaryController;
use App\Http\Requests;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Session;


class CurrencyController extends PrimaryController
{

    /**
     *
     * @param $lang
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeCurrency($currencyCode)
    {
        !currency()->hasCurrency($currencyCode) ? redirect()->back()->with('error', 'no such currency available') : null;

        session()->put('currency',$currencyCode);

        currency()->setUserCurrency($currencyCode);

        return redirect()->back();

    }

}
