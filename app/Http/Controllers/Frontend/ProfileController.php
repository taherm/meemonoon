<?php

namespace App\Http\Controllers\Frontend;

use App\Core\PrimaryController;
use App\Src\Order\OrderRepository;
use App\Src\User\UserRepository;
use Illuminate\Http\Request;

use App\Http\Requests;

class ProfileController extends PrimaryController
{

    public $userRepository;
    /**
     * @var OrderRepository
     */
    private $orderRepository;

    /**
     * ProfileController constructor.
     * @param UserRepository $userRepository
     * @param OrderRepository $orderRepository
     */
    public function __construct(UserRepository $userRepository,OrderRepository $orderRepository)
    {
        $this->userRepository = $userRepository;
        $this->orderRepository = $orderRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        return view('frontend.modules.profile.index',compact('user'));
    }

    public function getOrders(Request $request)
    {

        $user = auth()->user();
        $orders = $this->orderRepository->model->has('order_metas')->with(['order_metas','products'])->where('user_id',$user->id)->where('status','!=','temp');
        
        if($request->has('status')) {
            $status = $request->get('status');
            switch($status) {
                case 'pending': $orders->ofStatus('pending'); break;
                case 'completed': $orders->ofStatus('completed'); break;
                case 'shipped': $orders->ofStatus('shipped'); break;
            }
        }

        $orders = $orders->get();

        $orders->map(function ($order) {
            $order->product = $order->products->first();
            $order->quantity = $order->order_metas->sum('quantity');
        });
        return view('frontend.modules.profile.orders',compact('orders'));
    }

    public function editProfile(Request $request)
    {
        $user = auth()->user();

        return view('frontend.modules.profile.edit',compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $user->update($request->except(['password']));

        return redirect()->route('profile.edit')->with('success','Account Updated');
        
    }

}
