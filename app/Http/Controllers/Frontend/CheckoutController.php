<?php

namespace App\Http\Controllers\Frontend;

use App\Core\PrimaryController;
use App\Core\Services\PrimaryEmailService;
use App\Events\NewOrder;
use App\Http\Requests;
use App\Src\Cart\Cart;
use App\Src\Cart\ShippingManager;
use App\Src\Country\Country;
use App\Src\Coupon\Coupon;
use App\Src\Order\OrderRepository;
use App\Src\Product\ProductAttribute;
use App\Src\Product\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Support\Facades\Input;
use App\Mail\ConfirmUserOrder;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends PrimaryController
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
     * @var ShippingManager
     */
    private $shippingManager;
    public $coupon;

    /**
     * CartController constructor.
     * @param Cart $cart
     * @param ProductRepository $productRepository
     * @param Country $country
     * @param ShippingManager $shippingManager
     */
    public function __construct(Cart $cart, ProductRepository $productRepository, Country $country, ShippingManager $shippingManager, Coupon $coupon)
    {
        $this->cart = $cart;
        $this->productRepository = $productRepository;
        $this->country = $country;
        $this->shippingManager = $shippingManager;
        $this->coupon = $coupon;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('shipping_country')) {

            Session::put('SHIPPING_COUNTRY', $request->shipping_country);
            Session::put('SHIPPING_AREA', $request->area);

        } else {
            if (!Session::has('SHIPPING_COUNTRY')) {

                $validator = Validator::make($request->all(), [
                    'shipping_country' => 'required|numeric|exists:countries,id',
                    'area'=> 'required|min2'
                ]);

                if ($validator->fails()) {
                    return redirect()->route('cart.index')
                        ->withErrors($validator)
                        ->withInput();
                }

                Session::put('SHIPPING_COUNTRY', $request->shipping_country);
                Session::put('SHIPPING_AREA', $request->area);
            }
        }

        $shippingCountry = Session::get('SHIPPING_COUNTRY');
        $area = Session::get('SHIPPING_AREA');

        // @todo : use actual logged in user
        if (!auth()->check()) {
            return redirect()->to('login')->with('error', trans('Please Login Or Sign up Before Continue To Checkout!'));
        }

        $user = auth()->user();

        $cartItems = $this->cart->getItems();

        $products = $this->productRepository->model->has('product_meta')->whereIn('id', $cartItems->keys())->get();

        // Prepare the cart to display
        $cart = $this->cart->make($products);

        if (!count($cart->items)) {

            //@todo handle empty cart
            dd('cart empty');

        }

        $countries = $this->country->has('currency')->get();

        $shippingCountry = $countries->where('id', (int)$shippingCountry)->first();

        if (!$shippingCountry) {

            dd('no shipment to this country');
            // handle no shipment countries
        }

        $shippingCost = $this->shippingManager->calculateCost($cart->netWeight, $shippingCountry->name, $area);

        if($shippingCost == 0) {
            return redirect()->route('cart.index')
                ->with('error','unknown error .. please try again later');
        }

        if (Cache::has('coupon.' . Auth::id())) {

            $couponCache = Cache::get('coupon.' . Auth::id());

            $coupon = $this->coupon->where(['id' => $couponCache['id'], 'code' => $couponCache['code']])->first();

            if ($coupon->is_percentage) {

                $couponDiscountValue = ($coupon->value > 0) ? -(($coupon->value / 100) * $cart->grandTotal) : null;

            } else {

                $couponDiscountValue = ($coupon->value > 0) ? -$coupon->value : null;

            }

            $amountAfterCoupon = ($coupon->value > 0) ? $cart->grandTotal + $couponDiscountValue : null;

        }

        $finalAmount = (isset($amountAfterCoupon) && $amountAfterCoupon > 0) ? $amountAfterCoupon + $shippingCost : $cart->grandTotal + $shippingCost;

        Session::put('ORDER', [
            'coupon_id' => (isset($coupon)) ? $coupon->id : 0,
            'couponQty' => (isset($coupon)) ? 1 : 0,
            'couponCode' => (isset($coupon)) ? $coupon->code : 0,
            'couponValue' => (isset($coupon)) ? abs($couponDiscountValue) : 0,
            'amount' => $cart->subTotal,
            'sale_amount' => $cart->grandTotal,
            'net_amount' => $finalAmount,
            'shippingCountry' => 'shippingCost.country.' . $shippingCountry->name,
            'shippingCost' => (isset($shippingCost) && $shippingCost > 0) ? $shippingCost : 0,
            'shippingQty' => 1,
        ]);
        $area = session()->has('SHIPPING_AREA') ? session()->get('SHIPPING_AREA') : null;

        return view('frontend.modules.checkout.index',
            compact('user', 'cart', 'shippingCountry', 'shippingCost', 'finalAmount', 'coupon', 'couponDiscountValue', 'amountAfterCoupon','area'));
    }

    public function reviewOrder(Request $request, OrderRepository $orderRepository)
    {
        $this->validate($request, [
            'shipping_country' => 'required|numeric|exists:countries,id',
            'payment' => 'required|not_in:no',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'city' => 'required',
            'mobile' => 'required',
        ]);

        $address = '';
        //if shipping kuwait
        if ($request->shipping_country === '414') {
            $address .= 'Area ' . $request->area . ' ';
            $address .= 'Block ' . $request->block . ' ';
            $address .= 'Street ' . $request->street . ' ';
            $address .= 'Building ' . $request->building . ' ';
            $address .= 'Floor ' . $request->floor . ' ';
            $address .= 'Apartment ' . $request->apartment;
        } else {
            $address .= $request->address1 . ' ';
            $address .= $request->address2;
        }

        $cartItems = $this->cart->getItems();

        $products = $this->productRepository->model->has('product_meta')->whereIn('id', $cartItems->keys())->get();

        $cart = $this->cart->make($products);

        $shippingCountry = $this->country->find($request->shipping_country);

        $area = Session::get('SHIPPING_AREA');

        $shippingCost = $this->shippingManager->calculateCost($cart->netWeight, $shippingCountry->name,$area);

        $orderDetails = session()->get('ORDER');

        if (Cache::has('coupon.' . Auth::id())) {

            $couponCache = Cache::get('coupon.' . Auth::id());

            $coupon = $this->coupon->where(['id' => $couponCache['id'], 'code' => $couponCache['code']])->first();

            $couponDiscountValue = ($coupon->value > 0) ? -(($coupon->value / 100) * $cart->grandTotal) : null;

            $amountAfterCoupon = ($coupon->value > 0) ? $cart->grandTotal + $couponDiscountValue : null;

        }

        $finalAmount = (isset($amountAfterCoupon) && $amountAfterCoupon > 0) ? $amountAfterCoupon + $shippingCost : $cart->grandTotal + $shippingCost;

        $payment = $request->payment;

        $userEmail = $request->email;

        $mobile = $request->mobile;

        session()->put('order_mobile',$request->mobile);

        return view('frontend.modules.checkout.invoice_review',
            compact('finalAmount', 'cart', 'shippingCountry', 'shippingCost', 'orderDetails', 'mobile','address', 'payment', 'userEmail', 'coupon', 'couponDiscountValue', 'amountAfterCoupon'));
    }

    public function checkout(Request $request, OrderRepository $orderRepository)
    {

        $user = auth()->user();

        $cartItems = $this->cart->getItems();

        $products = $this->productRepository->model->has('product_meta')->whereIn('id', $cartItems->keys())->get();

        $cart = $this->cart->make($products);

        $shippingCountry = $this->country->find($request->shipping_country);

        $area = Session::get('SHIPPING_AREA');

        $shippingCost = $this->shippingManager->calculateCost($cart->netWeight, $shippingCountry->name,$area);

        $orderDetails = session()->get('ORDER');


        if ($request->payment === 'cash') {
            //reduce item quantity after successful order
            foreach ($cartItems as $item) {
                $itemAttribute = ProductAttribute::where('id', $item['product_attribute_id'])->first();
                $itemAttribute->update([
                    'qty' => $itemAttribute->qty - $item['quantity']
                ]);
            }

            $order = $orderRepository->model->create([
                'status' => 'pending',
                'user_id' => $user->id,
                'country_id' => $request->shipping_country,
                'coupon_id' => $orderDetails['coupon_id'],
                'coupon_value' => $orderDetails['couponValue'],
                'amount' => $cart->subTotal,
                'shipping_cost' => $shippingCost,
                'sale_amount' => $orderDetails['sale_amount'],
                'net_amount' => $orderDetails['net_amount'],
                'email' => $request->email,
                'address' => $request->address,
                'mobile' => session()->get('order_mobile'),
                'payment_method' => $request->payment,
            ]);


            $cart->items->map(function ($item) use ($order) {
                $order->order_metas()->create([
                    'product_id' => $item->id,
                    'product_attribute_id' => $item->product_attribute_id,
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                    'sale_price' => $item->sale_price,
                ]);
            });

            $this->cart->flushCart();

            $email = new ConfirmUserOrder($order);
            $emailToAdmin = new ConfirmUserOrder($order, 1);

            Mail::to(auth()->user()->email)->send($email);
            Mail::to('info@meemonoon.com')->cc('order@meemonoon.com')->send($emailToAdmin);

            // consuming the coupon
            $coupon = Coupon::whereId($order->coupon_id)->update(['consumed' => true]);
            // removing the cache
            cache()->forget('coupon.' . Auth::id());

            return redirect()->to('/invoice/' . $order->id)->with('success', trans('general.message.order_created'));
        } else {
            // My fatoorah

            $paymentStatus = Event::fire(new NewOrder($cart, $orderDetails, $user));
//            dd($paymentStatus);
            if ($paymentStatus[0]->responseMessage) {

                //reduce item quantity after successful order
                foreach ($cartItems as $item) {
                    $itemAttribute = ProductAttribute::where('id', $item['product_attribute_id'])->first();
                    $itemAttribute->update([
                        'qty' => $itemAttribute->qty - $item['quantity']
                    ]);
                }

                $order = $orderRepository->model->create([
                    'status' => 'temp',
                    'user_id' => $user->id,
                    'country_id' => $request->shipping_country,
                    'coupon_id' => $orderDetails['coupon_id'],
                    'coupon_value' => $orderDetails['couponValue'],
                    'amount' => $cart->subTotal,
                    'shipping_cost' => $shippingCost,
                    'sale_amount' => $orderDetails['sale_amount'],
                    'net_amount' => $orderDetails['net_amount'],
                    'email' => $request->email,
                    'address' => $request->address,
                    'mobile' => session()->get('order_mobile'),
                    'payment_method' => $request->payment,
                    'invoice_id' => $paymentStatus[0]->referenceId
                ]);


                $cart->items->map(function ($item) use ($order) {
                    $order->order_metas()->create([
                        'product_id' => $item->id,
                        'product_attribute_id' => $item->product_attribute_id,
                        'quantity' => $item->quantity,
                        'price' => $item->price,
                        'sale_price' => $item->sale_price,
                    ]);
                });

                /*            // please refere to OrderObservers
                                    - coupons consumed if applied
                               // firing event NewOrder
                                    - emails
                                    - payment
                */

//            - after saving the order + sending emails + consuming the coupon if exists - flush the whole cart session

                return redirect()->secure($paymentStatus[0]->paymentURL);

            }
        }

        return redirect('cart')->with('error', 'Not completed');
    }

    public function orderInvoice($orderId, OrderRepository $orderRepository)
    {
        $order = $orderRepository->getById($orderId);

        return view('frontend.modules.checkout.final_order_invoice',
            compact('order'));
    }

    public function paymentSuccess(OrderRepository $orderRepository)
    {
        $this->cart->flushCart();
        $id = Input::get('id');

        $order = $orderRepository->getWhereId($id, 'invoice_id')->first();
        if ($order->update([
            'status' => 'pending',
            'captured_status' => 1
        ])
        ) {
            $email = new ConfirmUserOrder($order);
            $emailToAdmin = new ConfirmUserOrder($order, 1);

            Mail::to(auth()->user()->email)->send($email);
            Mail::to('info@meemonoon.com')->send($emailToAdmin);

            // consuming the coupon
            $coupon = Coupon::whereId($order->coupon_id)->update(['consumed' => true]);
            // removing the cache
            cache()->forget('coupon.' . Auth::id());

            return redirect()->to('/')->with('success', 'Order payment Success!!');
        }

        // consuming the coupon
        $coupon = Coupon::whereId($order->coupon_id)->update(['consumed' => true]);
        // removing the cache
        cache()->forget('coupon.' . Auth::id());

        //send Email to user and admin

        return redirect()->to('/')->with('error', trans('System Error!'));
    }

    public function paymentFail(OrderRepository $orderRepository)
    {
        $id = Input::get('id');
        $orderRepository->getWhereId($id, 'invoice_id')->delete();
        return redirect()->to('/')->with('error', 'Payment fail, Please check your credit card again!');

    }

}
