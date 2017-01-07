<div id="shop-list" class="tab-pane shop-list" role="tabpanel">
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
                        @if(file_exists(url('img/uploads/thumbnail/'.$product->product_meta->image)))
                            <img class="primary-img"
                                 src="{{ url('img/uploads/thumbnail/'.$product->product_meta->image) }} " alt=""
                                 style="width: 261px;height: 300px;">
                        @else
                            <img class="primary-img"
                                 src="{{ url('img/uploads/thumbnail/default-placeholder.jpg') }} "
                                 alt="" style="width: 261px;height: 300px;">
                        @endif

                        @if(isset($product->gallery->images->first()->thumb_url))
                            @if(file_exists(url('img/uploads/thumbnail/'.$product->gallery->images->first()->thumb_url)))
                                <img class="secondary-img"
                                     src="{{ url('img/uploads/thumbnail/'.$product->gallery->images->first()->thumb_url) }} "
                                     alt="" style="width: 261px;height: 300px;">
                            @else
                                <img class="secondary-img"
                                     src="{{ url('img/uploads/thumbnail/default-placeholder.jpg') }} " alt=""
                                     style="width: 261px;height: 300px;">
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
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 ">
                <div class="product-details shop-review">
                    <div class="product-name">
                        <h3><a href="#">{{ $product->name }}</a></h3>
                    </div>
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
                    <div class="product-reveiw">
                        <p>{!! $product->product_meta->description !!}</p>
                    </div>
                    <div class="add-to-cart" style="padding-top: 15px;">
                        <a href="{{ route('product.show',$product->id)  }}">{{ ucfirst(trans('general.view_product_details')) }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <!-- single blog end -->
</div>
@endforeach
</div>

{{--@include('frontend.modules.product.partials.quick-view')--}}
