<?php

namespace App\Http\Controllers\Backend;

use App\Core\PrimaryController;
use App\Mail\OrderShipped;
use App\Src\Order\OrderRepository;
use App\Src\User\UserRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends PrimaryController
{
    protected $orderRepository;
    protected $userRepository;

    public function __construct(OrderRepository $orderRepository, UserRepository $userRepository)
    {
        //$this->authorize('module','orders');
        $this->orderRepository = $orderRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = $this->orderRepository->model->with('user', 'order_metas', 'country')->orderBy('created_at','desc')->get();
        return view('backend.modules.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = $this->orderRepository->model->whereId($id)->with('order_metas.product', 'order_metas.product_attribute')->orderBy('created_at','desc')->first();

        return view('backend.modules.order.meta.index', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


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

    }

    public function changeStatus(Request $request)
    {

        $this->orderRepository->model->whereId($request->id)->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'status changed successfully');

    }

    public function addOrderTrackId(Request $request)
    {
        $order = $this->orderRepository->model->whereId($request->id)->first();

        $order->update([
            'status' => 'shipped',
            'track_id' => ($request->trackId != '' ? $request->trackId : NULL)
        ]);

        $email = new OrderShipped($order);
        Mail::to($order->user->email)->send($email);

        return redirect()->back()->with('success', 'status changed successfully');
    }

    public function ordersBetweenDates(Request $request)
    {
        $orders = $this->orderRepository->model->with('user', 'order_metas', 'country')->whereBetween('created_at', array(Carbon::createFromFormat('m/d/Y', $request->from)->toDateString(), Carbon::createFromFormat('m/d/Y', $request->to)->toDateString()))->orderBy('created_at','desc')->get();

        return view('backend.modules.order.index', compact('orders'));
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
