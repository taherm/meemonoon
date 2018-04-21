@extends('frontend.layouts.master')
@section('body')
    <div class="feature-product-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="feature-headline section-heading text-center">
                        <h2>{{ trans('cart.shopping_cart') }}</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    @if(!$cart->getItemsCount() > 0)
                        <div class="text-center">
                            <h1>{{ trans('cart.empty') }}</h1>
                            <p><a href={{route('home')}}> {{trans('cart.browse')}} </a></p>
                        </div>
                        @else
                                <!-- table start -->
                        {!! Form::open(['action' => ['Frontend\CartController@updateCart'], 'method' => 'post'], ['class'=>'']) !!}
                        <div class="table-content table-responsive">
                            <table>
                                <thead>
                                <tr>
                                    <th class="product-remove">{{ trans('cart.remove') }}</th>
                                    <th class="product-thumbnail">{{ trans('cart.image') }}</th>
                                    <th class="product-thumbnail">{{ trans('cart.color') }}</th>
                                    <th class="product-thumbnail">{{ trans('cart.size') }}</th>
                                    <th class="product-name">{{ trans('cart.product_name') }}</th>
                                    <th class="real-product-price">{{ trans('cart.unit_price') }}</th>
                                    <th class="product-quantity">{{ trans('cart.qty') }}</th>
                                    <th class="product-subtotal">{{ trans('cart.sub_total') }}</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($cart->items as $product)
                                    <tr>
                                        <td class="product-remove">
                                            <a href="{{ route('cart.remove',$product->id) }}">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </td>

                                        <td class="product-thumbnail">
                                            <a href="{{ route('product.show',$product->product_id) }}">
                                                <img src="{{ asset('img/uploads/thumbnail/').'/'.$product->image}}"
                                                     width="140" height="180" alt=""/>
                                            </a>
                                        </td>

                                        <td class="product-thumbnail">
                                            <div class="col-lg-1"
                                                 style="border: 1px solid lightgrey; min-height : 30px; margin: 3px; background-color : {!! $product->color_code !!}"></div>
                                        </td>

                                        <td class="product-thumbnail">
                                            <div class="col-lg-1">{{ $product->size_name }}</div>
                                        </td>

                                        <td class="product-name">
                                            <a href="{{ route('product.show',$product->product_id) }}">{{ $product->name }}</a>
                                        </td>

                                        <td class="real-product-price">
                                            @if($product->price !== $product->sale_price)
                                                <span class="sale_price">{{$product->price}} KD </span>
                                            @endif
                                            <span class="amounte">{{ $product->sale_price }} KD </span>
                                        </td>

                                        <td class="product-quantity">
                                            <input type="number" name="quantity_{{$product->id}}"
                                                   value="{{ $product->quantity }}"/>
                                        </td>

                                        <td class="product-subtotal">{{ $product->grand_total }} KD</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="cart-s-btn">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
                                        <div class="buttons-cart">
                                            <a href="{{ route('home') }}">{{ trans('cart.continue_shopping') }}</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-8 col-xs-12 col-md-push-2">
                                        <div class="buttons-cart button-cart-right">
                                        <span class="shopping-btn">
                                            <button type="submit"
                                                    class="btn custom-button">{{ trans('cart.update_shopping_cart') }}
                                            </button>
                                        </span>
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                    <div class="col-lg-3 col-md-3 col-sm-8 col-xs-12 col-md-push-2">
                                        <div class="place-section" style="padding: 0px;">
                                            {!! Form::open(['route' => 'cart.clear', 'method' => 'Post'], ['class'=>'']) !!}
                                            <button type="submit"
                                                    class="col-lg-12 btn custom-button">{{ trans('cart.clear_cart') }}
                                            </button>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        @if(Auth::user())
                                <!-- Coupon -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="check-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#checkut5">
                                        <span class="number"></span>{{ trans('cart.use_coupon') }}</a>
                                </h4>
                            </div>

                            <div id="checkut5" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="hidden" id="grandTotal"
                                         value="{!! $cart->grandTotal  !!}">{!! $cart->grandTotal !!}</div>
                                    <div class="hidden" id="api_token">{!! auth()->user()->api_token !!}</div>
                                    <div class="col-lg-12 col-md-12 col-sm-12" id="couponApp">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Panel Default -->
                        @endif

                                <!-- table end -->
                        <!-- place selection start -->
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right">
                                <div class="place-section">
                                    {!! Form::open(['route' => ['cart.checkout'], 'method' => 'POST'], ['class'=>'']) !!}
                                    <div class="place-headline">
                                        <h4>{{ trans('cart.estimate_shipping_and_tax') }}</h4>
                                        <p>
                                            <span>{{ trans('cart.enter_ur_destination') }}</span></br>
                                            <span class="pull-left">
                                                {{ trans('general.delivery_within_4_days') }}</br>
                                            </span>
                                        <span class="pull-right">
                                            <img src="/meem/frontend/img/aramex.png" alt=""
                                                 class="img-responsive" style="max-width: 60px;">
                                        </span>
                                        </p>
                                        </br>
                                        </br>
                                    </div>
                                    <div class="search-categori">
                                        <h5>{{ trans('general.country') }}</h5>
                                        <div class="category">
                                            <select class="orderby" name="shipping_country" id="country"
                                                    style="min-width: 80px;" placeholder='Choose Shipping Country'>
                                                <option value="">Select Country</option>
                                                @foreach($countries as $k => $v)
                                                    <option value="{{ $k }}">{{ $v }}</option>
                                                @endforeach
                                            </select>
                                            {{--                                            {{ Form::select('shipping_country',$countries,null,['id' => 'country','class'=>'orderby','placeholder'=>'Choose Shipping Country']) }}--}}
                                        </div>
                                    </div>

                                    <div class="search-categori">
                                        <h5>{{ trans('general.area') }}</h5>
                                        <div class="category">
                                            <select class="disabled" name="area" id="areas" style="min-width: 80px;">
                                                <option value="">Select Area</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="rate-subtotal">
                                        {{--<h4>Subtotal <span>{{ $cart->subTotal }} KD</span></h4>--}}
                                        <h2>{{ trans('general.grand_total') }}
                                            <span>{{ $cart->grandTotal }} KD</span></h2>
                                        <button type="submit" id="forward" disabled
                                                class="col-lg-12 btn custom-button">{{ trans('cart.proceed_to_checkout') }}
                                        </button>
                                    </div>
                                    {!! Form::close() !!}


                                </div>

                            </div>
                        </div>

                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection


@section('customScripts')
    @parent
    {{--REACT COUPON APP HERE--}}
    @if(Auth::user())
        <script type="text/javascript" src="{{ asset('js/coupon-app.js') }}"></script>
    @endif
    <script type="text/javascript">
        $(document).ready(function() {
            $('#areas').html('<option value="">Select Area</option>');
            $('#country').on('change', function(e) {
                countryCode = e.target.value;
                console.log('countryCode', countryCode);
                $('#areas').html('').toggleClass('disabled');
                $('#forward').attr('disabled', 'disabled');
                $.get('/api/country/' + countryCode, function(data) {
                    return setTimeout(injectAreas(data), 4000);
                });
            });
            $('#areas').on('change', function() {
                return setTimeout($('#forward').removeAttr('disabled'), 2000);
            })
            function injectAreas(data) {
                for (var i in data) {
                    data[i].map(function(v, index) {
                        $('#areas').append(`<option value="${v}">${v}</option>`)
                    });

                }
            }
        });
    </script>
@endsection




