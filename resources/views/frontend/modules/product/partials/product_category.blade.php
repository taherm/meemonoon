<div class="product-tab-area">
    <!-- Tab Bar -->
    @include('frontend.modules.category.partials._top_toolbar')
    <!-- End Tab Bar -->
    <!-- Tab Content -->
    <div class="clearfix"></div>
    <div class="tab-content">
        <div id="shop-grid" class="tab-pane active" role="tabpanel">
            <div class="row">
                <!-- single-product start -->
                @foreach($products as $product)
                    <div class="{{ isset($cols)  ? $cols : 'col-lg-4 col-md-4 col-sm-4' }} col-xs-12"
                         style="height: 500px !important; max-height: 500px !important; margin-bottom: 21px;padding-top: 40px;">
                        <!-- single-product end -->
                        <div class="single-product">
                            <div class="product-details">
                                <div class="price-box">
                                    @if($product->product_meta->on_sale)
                                        <span class="old-price">
                                    {{ currency($product->product_meta->price,'KWD',currency()->getUserCurrency('KWD'),false) }}
                                            {{ currency()->getCurrency('KWD')[ app()->getLocale() === 'ar' ? 'symbol' : 'code'] }}
                                </span>
                                        <span class="new-price">{{ currency($product->product_meta->sale_price,'KWD',currency()->getUserCurrency('KWD'),false)}}
                                            {{ currency()->getCurrency('KWD')[ app()->getLocale() === 'ar' ? 'symbol' : 'code'] }}
                                </span>
                                    @else
                                        <span class="new-price">{{ currency($product->product_meta->price,'KWD',currency()->getUserCurrency('KWD'),false) }}
                                            {{ currency()->getCurrency('KWD')[ app()->getLocale() === 'ar' ? 'symbol' : 'code'] }}
                                </span>
                                    @endif
                                </div>
                            </div>
                            <div class="product-img">
                                @if($product->product_meta->on_sale)
                                    <span class="sale-text">{{ trans('general.sale') }}</span>
                                @elseif($product->created_at)
                                    <span class="sale-text new-sale">{{ trans('general.new') }}</span>
                                @endif
                                <a href="{{ route('product.show',$product->id) }}">
                                    {{--                            @if(file_exists(url('img/uploads/thumbnail/'.$product->product_meta->image)))--}}
                                    <img class="primary-img"
                                         src="{{ url('img/uploads/medium/'.$product->product_meta->image) }} " alt=""
                                         style="width: 261px;height: 300px;">
                                    {{--@else--}}
                                    {{--<img class="primary-img" src="{{ url('img/uploads/thumbnail/default-placeholder.jpg') }} " alt="" style="width: 261px;height: 300px;">--}}
                                    {{--@endif--}}

                                    @if(isset($product->gallery->images->first()->thumb_url))
                                        {{--                                @if(file_exists(url('img/uploads/thumbnail/'.$product->gallery->images->first()->thumb_url)))--}}
                                        <img class="secondary-img"
                                             src="{{ url('img/uploads/medium/'.$product->gallery->images->first()->medium_url) }} "
                                             alt="" style="width: 261px;height: 300px;">
                                        {{--@else--}}
                                        {{--<img class="secondary-img" src="{{ url('img/uploads/thumbnail/default-placeholder.jpg') }} " alt="" style="width: 261px;height: 300px;">--}}
                                        {{--@endif--}}
                                    @endif
                                </a>
                                <div class="add-action">
                                    <ul>
                                        <li>
                                            @if($product->liked())
                                                <a href="{{ route('wishlist.remove',$product->id) }}"
                                                   data-toggle="tooltip"
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
                                               data-image="{{ asset('img/uploads/medium/'.$product->product_meta->image) }}"
                                               data-description="{!! $product->product_meta->description !!}"
                                            >
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-details">
                                <div class="product-name">
                                    <h3>
                                        <a href="{{ route('product.show',$product->id) }}">{{  str_limit($product->name, 20) }}</a>
                                    </h3>
                                </div>
                            </div>
                            <div class="add-to-cart" style="padding-top: 15px;">
                                <a href="{{ route('product.show',$product->id)  }}">{{ ucfirst(trans('general.view_product_details')) }}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                            <!-- single-product end -->
            </div>
        </div>
        <div id="shop-list" class="tab-pane shop-list" role="tabpanel">
            <div class="row">
                <!-- single blog start -->
                @foreach($products as $product)
                    <div class="single-product">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                            <div class="product-img">
                                @if($product->product_meta->on_sale)
                                    <span class="sale-text">{{ trans('general.sale') }}</span>
                                @elseif($product->created_at)
                                    <span class="sale-text new-sale">{{ trans('general.new') }}</span>
                                @endif
                                <a href="#">
                                    @if(file_exists(url('img/uploads/medium/'.$product->product_meta->image)))
                                        <img class="primary-img"
                                             src="{{ url('img/uploads/medium/'.$product->product_meta->image) }} "
                                             alt=""
                                             style="width: 261px;height: 300px;">
                                    @else
                                        <img class="primary-img"
                                             src="{{ url('img/uploads/medium/'.$product->product_meta->image) }} "
                                             alt="" style="width: 261px;height: 300px;">
                                    @endif

                                    @if(isset($product->gallery->images->first()->thumb_url))
                                        @if(file_exists(url('img/uploads/thumbnail/'.$product->gallery->images->first()->thumb_url)))
                                            <img class="secondary-img"
                                                 src="{{ url('img/uploads/medium/'.$product->gallery->images->first()->thumb_url) }} "
                                                 alt="" style="width: 261px;height: 300px;">
                                        @else
                                            <img class="secondary-img"
                                                 src="{{ url('img/uploads/medium/'.$product->product_meta->image) }} "
                                                 alt=""
                                                 style="width: 261px;height: 300px;">
                                        @endif
                                    @endif
                                </a>
                                <div class="add-action">
                                    <ul>
                                        <li>
                                            @if($product->liked())
                                                <a href="{{ route('wishlist.remove',$product->id) }}"
                                                   data-toggle="tooltip"
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
                                               data-image="{{ asset('img/uploads/medium/'.$product->product_meta->image) }}"
                                               data-description="{!! $product->product_meta->description !!}"
                                            >
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 ">
                            <div class="product-details shop-review">
                                <div class="product-name">
                                    <h3><a href="#">{{ $product->name }}</a></h3>
                                </div>
                                <div class="price-box">
                                    @if($product->product_meta->on_sale)
                                        <span class="old-price">
                                    {{ currency($product->product_meta->price,'KWD',currency()->getUserCurrency(),false) }}
                                            {{ currency()->getCurrency(session()->get('currency'))[ app()->getLocale() === 'ar' ? 'symbol' : 'code'] }}
                                </span>
                                        <span class="new-price">{{ currency($product->product_meta->sale_price,'KWD',session()->get('currency'),false)}}
                                            {{ currency()->getCurrency(session()->get('currency'))[ app()->getLocale() === 'ar' ? 'symbol' : 'code'] }}
                                </span>
                                    @else
                                        <span class="new-price">{{ currency($product->product_meta->price,'KWD',session()->get('currency'),false) }}
                                            {{ currency()->getCurrency(session()->get('currency'))[ app()->getLocale() === 'ar' ? 'symbol' : 'code'] }}
                                </span>
                                    @endif
                                </div>
                                <div class="product-reveiw">
                                    <p>{!! $product->product_meta->description !!}</p>
                                </div>
                                <div class="add-to-cart" style="padding-top: 15px;">
                                    <a href="{{ route('product.show',$product->id)  }}">{{ ucfirst(trans('general.view_product_details')) }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single blog end -->
                @endforeach
            </div>
        </div>
    </div>
    <!-- bottom toolbar start-->
    @include('frontend.modules.category.partials._bottom_toolbar')
    <!-- End Tab Bar -->
</div>
@include('frontend.modules.product.partials.quick-view')