<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Src\Coupon\Coupon;
use App\Http\Requests;
use App\Core\PrimaryController;

class CouponController extends PrimaryController
{

    public $coupon;

    /**
     * CouponController constructor.
     * @param Coupon $coupon
     */
    public function __construct(Coupon $coupon)
    {
        $this->coupon = $coupon;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = $this->coupon->orderBy('created_at','desc')->get();

        return view('backend.modules.coupon.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.modules.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coupon = $this->coupon->create($request->except('_token', '_method'));

        if ($coupon) {

            return redirect()->route('backend.coupon.index')->with('success', 'coupon saved');

        }
        return view('backend.modules.coupon.create')->with('error', 'not saved');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupon = $this->coupon->with('user', 'order')->whereId($id)->first();

        return view('backend.modules.coupon.create', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updated = $this->coupon->whereId($id)->update($request->except('_token', '_method'));

        if ($updated) {
            return redirect()->route('backend.coupon.index')->with('success', 'coupon updated');
        }

        return redirect()->back()->with('error', 'coupon not updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
