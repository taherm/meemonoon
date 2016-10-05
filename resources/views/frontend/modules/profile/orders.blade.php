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
                                    <a href="{{ route('orders',['status'=>'failed']) }}" >
                                        <i class="fa fa-calendar icon_9"></i>
                                        Failed
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('orders',['status'=>'success']) }}" >
                                        <i class="fa fa-download icon_9"></i>
                                        Success
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('orders',['status'=>'completed']) }}" >
                                        <i class="fa fa-download eicon_9"></i>
                                        Completed
                                    </a>
                                </li>

                            </ul>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered text-center">
                                <thead>
                                <tr class="c-head">
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                @foreach($orders as $order)
                                    <tr>
                                        <td class="c-img">
                                            <a href="#"><img src="{{ $order->product->product_meta->image }}" alt=""></a>
                                        </td>
                                        <td class="c-qty"><span>{{ $order->quantity }}</span></td>
                                        <td class="c-price"> {{ $order->net_amount }}</td>
                                        <td class="c-price"> {{ $order->created_at->format('d-m-Y') }}</td>

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
