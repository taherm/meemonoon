@extends('frontend.layouts.master')

@section('body')
    <div class="checkout-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-sm-12" style="color : black;">
                    <!-- Payment Method -->
                    <div class="payment-method">
                        <!-- Panel Gropup -->
                        <div class="panel-group" id="accordion">
                            @if(!auth()->check())
                                @include('frontend.modules.checkout._guest_register',
                                    ['order'=>1]
                                )
                            @else
                                {!! Form::model($user = auth()->user(),['route' => ['checkout.review'], 'method' => 'post', 'files'=>true, 'class'=>'checkout-form product-form']) !!}

                                {{Form::hidden('shipping_country',$shippingCountry->id)}}
                                @include('frontend.modules.checkout._billing_info',
                                    ['order'=>auth()->check() ? 1 : 2,'user'=>$user,'shippingCountry'=>$shippingCountry]
                                )
                                @include('frontend.modules.checkout._payment_info',
                                    ['order'=>auth()->check() ? 2 : 3]
                                )
                                @include('frontend.modules.checkout._order_review',
                                    ['order'=>auth()->check() ? 3 : 4]
                                )
                                {!! Form::close() !!}
                            @endif

                        </div>
                        <!-- End Panel Gropup -->
                    </div>
                    <!-- End Payment Method -->
                </div>
                {{--<div class="col-md-3 col-sm-12">--}}
                {{--<div class="checkout-sidebar">--}}
                {{--<h4>Checkout Progress</h4>--}}
                {{--<ul>--}}
                {{--<li><a href="#">Billing Address</a></li>--}}
                {{--<li><a href="#">Shipping Address</a></li>--}}
                {{--<li><a href="#">Shipping Method</a></li>--}}
                {{--<li><a href="#">Payment Method</a></li>--}}
                {{--</ul>--}}
                {{--</div>--}}
                {{--</div>--}}
            </div>
        </div>
    </div>
@endsection