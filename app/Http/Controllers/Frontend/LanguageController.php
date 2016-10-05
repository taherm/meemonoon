<?php namespace App\Http\Controllers\Frontend;

use App\Core\PrimaryController;
use App\Http\Requests;
use App\Providers\AppServiceProvider;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;


class LanguageController extends PrimaryController
{

    /**
     *
     * @param $lang
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeLocale($lang)
    {
        App::setLocale($lang);

        Session::put('locale',$lang);

        return redirect()->back();
    }

}
