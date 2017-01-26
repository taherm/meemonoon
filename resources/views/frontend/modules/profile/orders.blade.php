@extends('frontend.layouts.master')

@section('body')

    <div class="feature-product-area" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="feature-headline section-heading text-center">
                        <h2>Orders</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                @include('frontend.modules.profile.sidebar',['active' =>'orders'])
            </div>

            <div class="col-md-8">
                <div class="table-area wishlist-area">

                    <div class="panel-body" >
                        <div class="dropdown" style="margin-bottom: 20px;" >
                            <a href="#" title="" class="btn btn-default" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-cog icon_8"></i>
                                <i class="fa fa-chevron-down icon_8"></i>
                                Filter

                                <div class="ripple-wrapper">


                                </div></a>
                            <ul class="dropdown-menu float-right">
                                <li>
                                    <a href="{{ route('orders',['status'=>'all']) }}" >
                                        <i class="fa fa-pencil-square-o icon_9"></i>
                                        All
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('orders',['status'=>'pending']) }}" >
                                        <i class="fa fa-pencil-square-o icon_9"></i>
                                        Pending
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('orders',['status'=>'shipped']) }}" >
                                        <i class="fa fa-calendar icon_9"></i>
                                        Shipped
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('orders',['status'=>'completed']) }}" >
                                        <i class="fa fa-download icon_9"></i>
                                        Delivered
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered text-center">
                                <thead>
                                <tr class="c-head">
                                    <th>id</th>
                                    <th>status</th>
                                    <th>payment_method</th>
                                    <th>coupon_value</th>
                                    <th>country_id</th>
                                    <th>shipping_cost</th>
                                    <th>amount</th>
                                    <th>sale_amount</th>
                                    <th>net_amount</th>
                                    <th>address</th>
                                    <th>Date</th>
                                    {{--<th>details</th>--}}
                                </tr>
                                </thead>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->id}}</td>
                                        <td>{{ $order->status}}</td>
                                        <td>{{ $order->payment_method}}</td>
                                        <td>{!! ($order->coupon_value <= 1) ? '<span class="label label-sm label-warning">N/A</span>' : $order->coupon_value !!}</td>
                                        <td>{{ $order->country->name}}</td>
                                        <td>{{ $order->shipping_cost}}</td>
                                        <td>{{ $order->amount}}</td>
                                        <td>{{ $order->sale_amount}}</td>
                                        <td>{{ $order->net_amount}}</td>
                                        <td>{{ $order->address}}</td>
                                        <td>{{ $order->created_at->diffForHumans()}}</td>
                                        {{--<td>--}}
                                        {{--<a href="{{ route('order.show',$order->id) }}" class="btn btn-outline btn-circle dark btn-xs green"><i--}}
                                        {{--class="fa fa-info-circle"></i></a>--}}
                                        {{--</td>--}}

                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
