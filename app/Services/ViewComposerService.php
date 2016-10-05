<?php

namespace App\Services;

use App\Src\Cart\Cart;
use App\Src\Currency\Currency;
use App\Src\Product\Color;
use App\Src\Product\Size;
use App\Src\User\Condition;
use App\Src\User\Faq;
use App\Src\Country\Country;
use App\Src\Category\CategoryRepository;
use App\Src\Product\ProductRepository;
use Conner\Tagging\Model\Tag;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use App\Src\User\Contactus;
use App\Src\Slider\Slider;
use App\Http\Requests;

class ViewComposerService
{
    public $categoryRepository;
    public $productRepository;

    public function __construct(CategoryRepository $categoryRepository, ProductRepository $productRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }

    /**
     * to return all countries only for register view
     * ComposerServiceProvider
     * @param View $view
     */
    public function getAllCountriesList(View $view)
    {

        $countriesList = new Country();

        $view->with(compact('countriesList'));
    }


    /**
     * @return
     */
    public function getAllCategories(View $view)
    {

        $categories = $this->categoryRepository->getParentCategoriesWithChildren();

        $view->with('categories', $categories);
    }

    public function getContactUsData(View $view)
    {

        $contactusInfo = Contactus::first();

        $view->with('contactusInfo', $contactusInfo);

    }

    public function getSliderItems(View $view)
    {
        $sliders = Slider::orderBy('order', 'asc')->get();

        $view->with(compact('sliders'));
    }

    public function getFaq(View $view)
    {

        $faqs = Faq::all();

        return $view->with(compact('faqs'));
    }


    public function getConditions(View $view)
    {

        $conditions = Condition::first();

        $view->with('conditions', $conditions);

    }

    public function getSizes(View $view)
    {
        $sizes = Size::all();

        $view->with('sizes', $sizes);
    }

    public function getcolors(View $view)
    {

        $colors = Color::all();

        $view->with('colors', $colors);

    }

    public function getAllTagsForProducts(View $view)
    {
        $tags = Tag::all();

        $view->with('tags', $tags);
    }

    public function getAllCurrencies(View $view)
    {
        $currencies = Currency::where('status', 1)->get();

        $view->with('currencies', $currencies);

    }

    public function getBreadCrumbs(View $view)
    {
        $link = '';

        $arrayFilter = ['index', 'create', 'update', 'store', 'destroy', 'delete', 'meta', 'attribute', 'edit'];

        $name = Route::currentRouteName();

        $routes = explode('.', $name);

        $routes = array_filter($routes, function ($item) use ($arrayFilter) {

            if (!in_array($item, $arrayFilter, true)) {

                return $item;

            }

        });

        $view->with('breadCrumbs', $routes);
    }

    public function getCartItemsCount(View $view)
    {
        $cart = app()->make(Cart::class);

        $view->with('cartItemsCount', $cart->getItemsCount());
    }

    public function getContactUs(View $view)
    {
        $contactData = Contactus::where('id', 1)->first();

        $view->with('contact', $contactData);
    }

}
