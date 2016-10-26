<div class="row">
    <div class="feature-product-4 {{ isset($carousel) ?  'product-carousel derection-key': '' }}">
        <!-- single-product start -->
        @foreach($products as $product)
            <div class="{{ isset($cols)  ? $cols : 'col-lg-4 col-md-4 col-sm-4' }} col-xs-12"
                 style="height: 500px !important; max-height: 500px !important; margin-bottom: 21px;">
                <!-- single-product end -->
                <div class="single-product">
                    <div class="product-details">
                        <div class="product-name">
                            <h3>
                                <a href="{{ route('product.show',$product->id) }}">{{  str_limit($product->name, 20) }}</a>
                            </h3>
                        </div>
                        <div class="price-box">
                            {{--{{ currency()->setUserCurrency('AED') }}--}}
                            {{--{{ var_dump(app()->getLocale()) }}--}}
                            {{--{{ var_dump(session()->get('currency')) }}--}}
                            {{--{{ dd(currency()->getCurrency(session()->get('currency'))['code']) }}--}}
                            {{--{{ dd(currency(1,'KWD',session()->get('currency'),false))}}--}}
                            {{--{{(App::getLocale() == 'ar' ? Currency::getCurrency()['symbol_left'] : Currency::getCurrency()['symbol_right'])}}--}}
                            {{--{{(App::getLocale() == 'ar' ? Currency::getCurrency()['symbol_left']:Currency::getCurrency()['symbol_right'])}}--}}
                            @if($product->product_meta->on_sale)
                                <span class="old-price">
                                    {{ currency($product->product_meta->price,'KWD',currency()->getUserCurrency(),false) }}
                                    {{ currency()->getCurrency(session()->get('currency'))[ app()->getLocale() === 'ar' ? 'symbol' : 'code'] }}
                                </span>
                                <span class="new-price">{{ currency($product->product_meta->sale_price,'KWD',session()->get('currency'),false)}}
                                    {{ currency()->getCurrency(session()->get('currency'))[ app()->getLocale() === 'ar' ? 'symbol' : 'code'] }}
                                </span>
                            @else
                                {{--<span class="new-price">{{ currency($product->product_meta->price)}} {{(App::getLocale() == 'ar' ? Currency::getCurrency()['symbol_left']:Currency::getCurrency()['symbol_right'])}} </span>--}}
                                <span class="new-price">{{ currency($product->product_meta->price,'KWD',session()->get('currency'),false) }}
                                    {{ currency()->getCurrency(session()->get('currency'))[ app()->getLocale() === 'ar' ? 'symbol' : 'code'] }}
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="product-img">
                        @if($product->product_meta->on_sale)
                            <span class="sale-text">{{ trans('gneral.sale') }}</span>
                        @elseif($product->created_at)
                            <span class="sale-text new-sale">{{ trans('general.new') }}</span>
                        @endif
                        <a href="#">
                            @if(file_exists(url('img/uploads/thumbnail/'.$product->product_meta->image)))
                                <img class="primary-img" src="{{ url('img/uploads/thumbnail/'.$product->product_meta->image) }} " alt="" style="width: 261px;height: 300px;">
                            @else
                                <img class="primary-img" src="{{ url('img/uploads/thumbnail/default-placeholder.jpg') }} " alt="" style="width: 261px;height: 300px;">
                            @endif

                            @if(isset($product->gallery->images->first()->thumb_url))
                                @if(file_exists(url('img/uploads/thumbnail/'.$product->gallery->images->first()->thumb_url)))
                                    <img class="secondary-img" src="{{ url('img/uploads/thumbnail/'.$product->gallery->images->first()->thumb_url) }} " alt="" style="width: 261px;height: 300px;">
                                @else
                                        <img class="secondary-img" src="{{ url('img/uploads/thumbnail/default-placeholder.jpg') }} " alt="" style="width: 261px;height: 300px;">
                                @endif
                            @endif
                        </a>
                        <div class="add-action">
                            <ul>
                                <li>
                                    @if($product->liked())
                                        <a href="{{ route('wishlist.remove',$product->id) }}" data-toggle="tooltip"
                                           title="Remove from Wishlist">
                                            <i class="fa fa-heart" style="color: red"></i>
                                        </a>
                                    @else
                                        <a href="{{ route('wishlist.add',$product->id) }}" data-toggle="tooltip"
                                           title="Add to Wishlist">
                                            <i class="fa fa-heart-o"></i>
                                        </a>
                                    @endif
                                </li>
                                <li class="quickview" data-toggle="tooltip" title="Quick view">
                                    <a href="#" title="Quick view"
                                       data-toggle="modal"
                                       data-target="#productModal"
                                       data-name="{{ $product->name }}"
                                       data-saleprice="{{ $product->product_meta->finalPrice  }} KD"
                                       data-price="{{ $product->product_meta->price }} KD"
                                       data-link="{{ route('product.show',$product->id) }}"
                                       data-image="{{ asset('img/uploads/thumbnail/'.$product->product_meta->image) }}"
                                       data-description="{!! $product->product_meta->description !!}"
                                    >
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="add-to-cart" style="padding-top: 15px;">
                        <a href="{{ route('product.show',$product->id)  }}">{{ ucfirst(trans('general.view_product_details')) }}</a>
                    </div>
                    {{--<div class="add-to-cart" style="padding-top: 15px;">--}}
                    {{--{!! Form::open(['route' => 'cart.add', 'method' => 'post'], ['class'=>'']) !!}--}}

                    {{--{!! Form::hidden('product_id',$product->id) !!}--}}
                    {{--{!! Form::hidden('quantity',1) !!}--}}
                    {{--{!! Form::hidden('product_attribute_id',$product->product_attribute->id) !!}--}}

                    {{--<button type="submit" class="btn custom-button" >Add to Cart</button>--}}
                    {{--{!! Form::close() !!}--}}
                    {{--</div>--}}
                </div>
            </div>

        @endforeach
    </div>
    <!-- carousel-end -->
</div>
@include('frontend.modules.product.partials.quick-view')
