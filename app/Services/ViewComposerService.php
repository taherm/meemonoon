<?php

namespace App\Services;

use App\Src\Ad\Ad;
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
use Illuminate\Support\Facades\Session;
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
        $countriesList = collect([
            '414' => 'Kuwait',
//            '512' => 'Oman',
//            '634' => 'Qatar',
            '682' => 'Saudi Arabia',
//            '48' => 'Bahrain',
            '784' => 'United Arab Emirates'
        ]);

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
        $currencies = Currency::all();

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
        $cartItemsCount = $cart->getItemsCount();

        $cartItems = $cart->getItems();
        $products = $this->productRepository->model->has('product_meta')->whereIn('id', $cartItems->pluck('id'))->get();
        $cartHeaderItems = $cart->make($products);

        $view->with(compact('cartItemsCount', 'cartHeaderItems'));
    }

    public function getContactUs(View $view)
    {
        $contactData = Contactus::where('id', 1)->first();

        $view->with('contact', $contactData);
    }

    public function getAds(View $view)
    {
        $ads = Ad::orderBy('order')->take(3)->get();

        $view->with('ads', $ads);
    }
}
