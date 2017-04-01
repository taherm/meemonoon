<?php

namespace App\Http\Controllers\Frontend;

use App\Src\Coupon\Coupon;
use App\Core\PrimaryController;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Response;

class CouponController extends PrimaryController
{
    public $coupon;

    public function __construct(Coupon $coupon)
    {
        $this->coupon = $coupon;
    }

    public function getCoupon()
    {
        $code = request()->code;

        $authId = Auth::guard('api')->user()->id;

        $coupon = $this->coupon->where('code', $code)->first();

        if ($coupon) {

            $couponCode = Cache::put('coupon.' . $authId, ['id' => $coupon->id, 'code' => $coupon->code, 'is_precentage' => $coupon->is_precentage], 5);

            return Response::json($coupon);

        }

        return Response::json(['result' => 0]);
    }
}
