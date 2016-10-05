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
        if (currency()->hasCurrency(strtoupper($currencyCode))) {

            currency()->setCurrency(strtoupper($currencyCode));

            return redirect()->back();

        } else {

            currency()->setCurrency('KWT');

            return redirect()->back()->with('error',trans('messages.error.no_currency_available'));

        }

    }

}
