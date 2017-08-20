<?php

namespace App\Http\Controllers\Frontend;

use App\Core\PrimaryController;
use App\Http\Requests;
use App\Src\Cart\Cart;
use App\Src\Country\Country;
use App\Src\Product\Product;
use App\Src\Product\ProductAttribute;
use App\Src\Product\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class CartController extends PrimaryController
{

    private $cart;
    /**
     * @var ProductRepository
     */
    private $productRepository;
    /**
     * @var Country
     */
    private $country;

    /**
     * CartController constructor.
     * @param Cart $cart
     * @param ProductRepository $productRepository
     * @param Country $country
     */
    public function __construct(Cart $cart, ProductRepository $productRepository, Country $country)
    {
        $this->cart = $cart;
        $this->productRepository = $productRepository;
        $this->country = $country;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (Cache::has('coupon.' . Auth::id())) {

            Cache::forget('coupon.' . Auth::id());

        }

        $cartItems = $this->cart->getItems();

        $products = $this->productRepository->model->has('product_meta')->whereIn('id', $cartItems->pluck('id'))->get();

        $cart = $this->cart->make($products);

        $shippingCountry = Session::get('SHIPPING_COUNTRY');

//        //@todo:// translate text
        $countries = $this->country->has('currency')->where('name_en','!=','Kuwait')->pluck('name_' . app()->getLocale(), 'id');

        return view('frontend.modules.cart.index', compact('cart', 'countries', 'shippingCountry'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function updateCart(Request $request)
    {
        $formDatas = $request->except('_token');

        foreach ($formDatas as $key => $value) {

            if (str_contains($key, 'quantity')) {

                // strip product ID from quanitity_{product_id} i.e => quantity_10 => 10
                $productID = substr($key, 9);
                try {
                    $updatedItem = $this->cart->getItemByKey($productID);
                    $productStock = ProductAttribute::where('id', $updatedItem['product_attribute_id'])->first();

                    if($productStock->qty >= $value)
                    {
                        $updatedItem['quantity'] = (int)$value;
                        $this->cart->addItem($updatedItem);
                    }
                    else
                    {
                        return redirect()->back()->with('error', 'Sorry this item has only '. $productStock->qty . ' left in stock!');
                    }

                } catch (\Exception $e) {
                    return redirect()->back()->with('error', $e->getMessage());
                }
            }
        }

        return redirect()->back()->with('success', 'Cart Updated');
    }

    public function clearCart()
    {
        $this->cart->flushCart();
        return redirect()->back()->with('success', 'Cart Cleared');
    }

    public function removeItem($productID)
    {

//        dd($productID);
//        dd(session('MEEM_CART'));
        $this->cart->removeItem($productID);
        return redirect()->back()->with('success', 'Item Removed');
    }

    public function addItem(Requests\Frontend\addProductToCart $request)
    {
        if ($this->cart->getItems()->count() > 1) {

            $ids = $this->cart->getItems()->pluck('id')->toArray();

            $products = Product::whereIn('id', $ids)->with('parents');

//            if ($products->parentscount(1) >= 3) {
//
//                return redirect()->route('cart.index')->with('error', trans('general.messages.error.cart.perfumes'));
//
//            }
        }

        $this->cart->addItem(['id' => $request->product_id, 'quantity' => (int)$request->quantity, 'product_attribute_id' => (int)$request->product_attribute_id]);
        return redirect()->route('cart.index')->with('success', trans('cart.updated'));

    }

    public function getCartItemCount()
    {
        return $this->cart->getItemsCount();
    }
}
