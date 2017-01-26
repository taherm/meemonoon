<?php

namespace App\Providers;

use App\Http\Controllers\Frontend\CartController;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        //breadCrumbs
        view()->composer('backend.partials.breadcrumbs', 'App\Services\ViewComposerService@getBreadCrumbs');

        // Ad
        view()->composer('frontend.modules.ad.show', 'App\Services\ViewComposerService@getAds');

        // cart item count
        view()->composer('frontend.partials._nav_right', 'App\Services\ViewComposerService@getCartItemsCount');

        // Footer Contact Us
        view()->composer('frontend.layouts.footer', 'App\Services\ViewComposerService@getContactUs');


        // getAllCountriesList
        view()->composer('auth.register',
            'App\Services\ViewComposerService@getAllCountriesList');

        // getAllCountriesList for edit profile
        view()->composer('frontend.modules.profile.edit',
            'App\Services\ViewComposerService@getAllCountriesList');

        // slider
        view()->composer('frontend.partials.slider',
            'App\Services\ViewComposerService@getSliderItems');

        // getAllCategories
        view()->composer(
            ['frontend.layouts.header',
                'backend.partials.forms._categories',
                'frontend.modules.category.partials._filter_subcategories',
                'frontend.modules.category.partials._breadcrumbs'
            ],
            'App\Services\ViewComposerService@getAllCategories');

        // default colors
        view()->composer(
            ['frontend.modules.category.partials._filter_color',
                'backend.partials.forms._productAttributes'],
            'App\Services\ViewComposerService@getColors');

        // default sizes
        view()->composer(
            ['frontend.modules.category.partials._filter_size',
                'backend.partials.forms._productAttributes'],
            'App\Services\ViewComposerService@getSizes');

        // tags
        view()->composer(
            ['frontend.modules.category.partials._tags',
                'backend.partials.forms._tags'],
            'App\Services\ViewComposerService@getAllTagsForProducts');

        view()->composer(
            'frontend.partials._currency_language',
            'App\Services\ViewComposerService@getAllCurrencies');

        view()->composer(
            ['frontend.partials.footer',
                'frontend.pages.contact'],
            'App\Services\ViewComposerService@getContactUsData');

        view()->composer('frontend.pages.contact',
            'App\Services\ViewComposerService@getContactUsData');

        view()->composer('frontend.pages.condition',
            'App\Services\ViewComposerService@getConditions');

        view()->composer('frontend.pages.faq',
            'App\Services\ViewComposerService@getFaq');

    }

    /**
     * automatically composer() method will be registered
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

    }
}
