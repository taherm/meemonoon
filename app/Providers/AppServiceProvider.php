<?php

namespace App\Providers;

use App\Observers\OrderObservers;
use App\Src\Cart\CartInterface;
use App\Src\Cart\SessionCart;
use App\Src\Order\Order;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(CartInterface::class, SessionCart::class);
        Order::observe(OrderObservers::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() == 'local') {
            App::register('Laracasts\Generators\GeneratorsServiceProvider');
            App::register('Fitztrev\QueryTracer\Providers\QueryTracerServiceProvider');
        }
//        if (Schema::hasTable('currencies')) {
//             currencies api
            App::register('Torann\Currency\CurrencyServiceProvider');

//        }

//        if (Schema::hasTable('countries')) {
//             countries list with all data
            App::register('Webpatser\Countries\CountriesServiceProvider');
//        }
    }
}
