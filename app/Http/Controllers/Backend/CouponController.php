<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
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
    public function store(Requests\Backend\CouponStore $request)
    {
        $request->request->add(['due_date' => Carbon::parse($request->input('due_date'))]);

        $coupon = $this->coupon->create($request->request->all());

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
    public function update(Requests\Backend\CouponUpdate $request, $id)
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
        if($this->coupon->destroy($id)) {
            return redirect()->route('backend.coupon.index')->with('success', 'coupon deleted');
        }

        return redirect()->back()->with('error', 'coupon not deleted');
    }
}
