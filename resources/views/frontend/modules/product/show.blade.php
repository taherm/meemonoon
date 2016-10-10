@extends('frontend.layouts.master')

@section('body')
    <div class="single-page-area shop-product-area">
        <div class="container">
            <div class="row">
                <div class="shop-head">
                    <ul class="shop-head-menu">
                        <li><i class="fa fa-home"></i><a class="home" href="#"><span>{{ trans('general.home') }}</span></a>
                        </li>
                        <li>{{ trans('general.single_product') }}</li>
                    </ul>
                </div>
                <!-- shop head end -->
            </div>
        </div>

        <!-- Single Product details Area -->
        <div class="single-product-detaisl-area">
            <!-- Single Product View Area -->
            <div class="single-product-view-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                            <!-- Single Product View -->
                            <div class="single-procuct-view">
                                <!-- Simple Lence Gallery Container -->
                                <div class="simpleLens-gallery-container" id="p-view">
                                    <div class="simpleLens-container tab-content">

                                        <div style="display: none;">
                                            {{$count = 1}}
                                        </div>
                                        @if(count($product->gallery->images) > 0)
                                            @foreach($product->gallery->images as $image)
                                                <div class="tab-pane @if($count == 1) active @endif"
                                                     id="{{'p-view-'. $count++}}">
                                                    <div class="simpleLens-big-image-container">
                                                        <a class="simpleLens-lens-image"
                                                           data-lens-image="{{url('img/uploads/large/'.$image->large_url)}}">
                                                            <img src="{{url('img/uploads/large/'.$image->large_url)}}"
                                                                 class="simpleLens-big-image" alt="productd">
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="tab-pane active" id="{{'p-view-1'}}">
                                                <div class="simpleLens-big-image-container">
                                                    <a class="simpleLens-lens-image"
                                                       data-lens-image="{{url('img/uploads/large/'.$product->product_meta->image)}}">
                                                        <img src="{{url('img/uploads/large/'.$product->product_meta->image)}}"
                                                             class="simpleLens-big-image" alt="productd">
                                                    </a>
                                                </div>
                                            </div>
                                        @endif

                                    </div>
                                    <!-- Simple Lence Thumbnail -->
                                    <div class="simpleLens-thumbnails-container text-center">
                                        <div id="single-product" class="owl-carousel custom-carousel">
                                            {{--<ul class="nav nav-tabs" role="tablist">--}}
                                            {{--<li class="active"><a href="#p-view-1" role="tab" data-toggle="tab"><img src="{{$product->product_meta->image}}" width="100" height="100" alt="productd"></a></li>--}}
                                            {{--</ul>--}}
                                            <div style="display: none;">
                                                {{$count2 = 1}}
                                            </div>
                                            @if(count($product->gallery->images) > 0)
                                                @foreach($product->gallery->images as $image)

                                                    <ul class="nav nav-tabs" role="tablist">
                                                        <li class="@if($count2 == 1) active @else last-li @endif"><a
                                                                    href="{{'#p-view-'. $count2++}}" role="tab"
                                                                    data-toggle="tab"><img
                                                                        src="{{url('img/uploads/large/'.$image->large_url)}}"
                                                                        width="100" height="100" alt="productd"></a>
                                                        </li>
                                                    </ul>

                                                @endforeach
                                            @else
                                                <ul class="nav nav-tabs" role="tablist">
                                                    <li class="active last-li"><a href="{{'#p-view-1'}}" role="tab"
                                                                                  data-toggle="tab"><img
                                                                    src="{{url('img/uploads/large/'.$product->product_meta->image)}}"
                                                                    width="100" height="100" alt="productd"></a></li>
                                                </ul>
                                            @endif

                                        </div>
                                    </div><!-- End Simple Lence Thumbnail -->
                                </div><!-- End Simple Lence Gallery Container -->
                            </div><!-- End Single Product View -->
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12 single-product-details">
                            <div class="product-details shop-review ">
                                <div class="col-lg-12">
                                    <div class="col-lg-10">
                                        <div class="product-name">
                                            <h3>{{$product->name}}</h3>
                                        </div>
                                    </div>

                                    <div class="col-lg-2 {{ App::getLocale() == 'ar' ? 'pull-left' : 'pull-right' }}">
                                        <div class="sin-product-icons fix">
                                            <div class="add-action">
                                                <ul>
                                                    <li>
                                                        @if($product->liked())
                                                            <a href="{{ route('wishlist.remove',$product->id) }}"
                                                               data-toggle="tooltip" title="Remove from Wishlist">
                                                                <i class="fa fa-heart" style="color: red"></i>
                                                            </a>
                                                        @else
                                                            <a href="{{ route('wishlist.add',$product->id) }}"
                                                               data-toggle="tooltip" title="Add to Wishlist">
                                                                <i class="fa fa-heart-o"></i>
                                                            </a>
                                                        @endif
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-name">
                                    <h3 style="font-size: 15px;">SKU ({{$product->sku}})</h3>
                                </div>
                                <div class="price-box">
                                    @if($product->product_meta->on_sale)
                                        <span class="old-price">{{Currency::format($product->product_meta->price,'KWD','')}} {{(App::getLocale() == 'ar' ? Currency::getCurrency('KWD')['symbol_left']:Currency::getCurrency('KWD')['symbol_right'])}}</span>
                                        <span class="new-price">{{Currency::format($product->product_meta->sale_price,'KWD','')}} {{(App::getLocale() == 'ar' ? Currency::getCurrency('KWD')['symbol_left']:Currency::getCurrency('KWD')['symbol_right'])}}</span>
                                        @if(Currency::getCurrencyCode() != 'KWD')
                                            <div>
                                                <p style="margin: 0px;padding-top: 15px;font-size: 10px;">Approx.</p>
                                                <span class="old-price"
                                                      style="font-size: 13px;">{{Currency::format($product->product_meta->price,'','')}} {{currency()->getCurrencySymbol(App::getLocale() == 'ar'?false:true)}}</span>
                                                <span class="new-price"
                                                      style="font-size: 13px;">{{Currency::format($product->product_meta->sale_price,'','')}} {{currency()->getCurrencySymbol(App::getLocale() == 'ar'?false:true)}}</span>
                                            </div>
                                        @endif
                                    @else
                                        <span class="new-price">{{Currency::format($product->product_meta->price,'KWD','')}} {{(App::getLocale() == 'ar' ? Currency::getCurrency('KWD')['symbol_left']:Currency::getCurrency('KWD')['symbol_right'])}}</span>
                                        @if(Currency::getCurrencyCode() != 'KWD')
                                            <div>
                                                <p style="margin: 0px;padding-top: 15px;font-size: 10px;">Approx.</p>
                                                <span class="new-price"
                                                      style="font-size: 13px;">{{Currency::format($product->product_meta->price,'','')}} {{currency()->getCurrencySymbol(App::getLocale() == 'ar'?false:true)}}</span>
                                            </div>
                                        @endif
                                    @endif

                                </div>
                                <p class="availability in-stock">Availability: <span>In stock</span></p>
                                <p class="availability in-stock">
                                    @if(currency()->getCurrencyCode() == 'KWD')
                                        <i class="fa fa-truck" aria-hidden="true"></i>
                                        <strong>{{ trans('general.free_delivery_within_24_hours') }}</strong>
                                    @elseif(currency()->getCurrencyCode() == 'SAR')
                                        <img src="{{asset('meem/frontend/img/aramex.png')}}" width="40"/>
                                        <strong>{{ trans('general.delivery_within_4_days') }}</strong>
                                    @else
                                        <img src="{{asset('meem/frontend/img/aramex.png')}}" width="40"/>
                                        <strong>{{ trans('general.delivery_within_3_days') }}</strong>
                                    @endif
                                </p>
                                <div class="product-review">
                                    <p>{!! $product->product_meta->description !!}</p>
                                </div>
                                <div class="add-to-cart cart-sin-product">
                                    <div class="add-to-cart cart-sin-product">
                                        <div class="quick-add-to-cart">
                                            <div
                                            ">
                                            <div>{{ trans('general.size') }}</div>
                                        </div>
                                        <div>
                                            <select class="input-text qty"
                                                    name="size" id="size">
                                                <option value="none">{{ trans('size_select') }}</option>
                                                @foreach($product->product_attributes->unique('size') as $attribute)
                                                    <option value="{{$attribute->size->id}}">{{$attribute->size->size}}</option>
                                                @endforeach
                                            </select>
                                            <a href="#" data-toggle="modal" data-target="#imagemodal"
                                               title="Check Item Sizes!"
                                               style="text-decoration: none;border: navajowhite;color: #b2dab7;font-size: 12px;">
                                                {{ trans('size_charts') }}</a>
                                        </div>

                                    </div>
                                    <div class="quick-add-to-cart">
                                        <div>
                                            <div>{{ trans('general.color') }}</div>
                                        </div>
                                        <div>
                                            <select class="input-text qty" name="color"
                                                    id="color">
                                                <option value="none">{{ trans('general.select_color') }}</option>

                                                @foreach($product->product_attributes->unique('color') as $attribute)
                                                    <option value="{{$attribute->color->id}}">{{$attribute->color->color}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="quick-add-to-cart">
                                        {!! Form::open(['route' => 'cart.add', 'method' => 'POST'], ['class'=>'cart']) !!}
                                        {{--$product->product_attributes->random()->id--}}
                                        {!! Form::hidden('product_id',$product->id, ['id' => 'productId']) !!}
                                        {!! Form::hidden('product_attribute_id','', ['id' => 'productAttributeId']) !!}
                                        <div class="qty-button">
                                            <input type="text" class="input-text qty" title="Qty" value="1"
                                                   maxlength="3" id="quantity" name="quantity"
                                                   style="height: 42px;">
                                            <input type="hidden" id="max_qty" value="1"/>
                                            <div class="box-icon button-plus">
                                                <input id="increaseQty" type="button" class="qty-increase "
                                                       value="+"
                                                       style="{{ App::getLocale() == 'ar' ?  'right: -36px; !important;padding-right: 10px;' :  null }} padding-right: 10px; top: -25px;outline: none;"
                                                       disabled>
                                            </div>
                                            <div class="box-icon button-minus">
                                                <input id="decreaseQty" type="button" class="qty-decrease"
                                                       onclick="var qty_el = document.getElementById('quantity'); var qty = qty_el.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) qty_el.value--;return false;"
                                                       value="-"
                                                       style="padding-right: 8px;top: -31px;outline: none;"
                                                       disabled>
                                            </div>
                                        </div>


                                        <div class="add-to-cart">
                                            <button id="addToCart" type="submit" class="btn custom-button" disabled>
                                                {{ trans('general.add_to_cart') }}
                                            </button>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                                <!-- Add to cart end -->

                                <!-- social-markting end -->
                                {{--<div class="social-button-img">--}}
                                {{--<a href="#">--}}
                                {{--<img src="img/logo/social.png" alt="">--}}
                                {{--</a>--}}
                                {{--</div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Product View Area -->
        </div>
        <!-- End Single details Area -->

        <!--product-Description-area start-->
        @include('frontend.modules.product.partials.productDescription')
                <!--product-Description-area end-->

        @if(count($products) > 0)
                <!--related-products-area start-->
        @include('frontend.modules.product.partials.product_carousel',['products'=>$products,'heading'=>'Related Products','backgroundColor'=>'#e7e7e7', 'cols' => 'col-lg-3 col-md-3 col-sm-3'])
                <!--related-products-area end-->
        @endif
    </div>
    </div>
    <!-- Single Product Area end -->
    <!-- Creates the bootstrap modal where the image will appear -->
    <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span><span
                                class="sr-only">{{ trans('general.close') }}</span></button>
                    <h4 class="modal-title" id="myModalLabel">Size Chart</h4>
                </div>
                <div class="modal-body" style="text-align: center;">
                    <img src="{{ file_exists(public_path('img/uploads/large/'.$product->product_meta->size_chart_image)) ? asset('img/uploads/large/'.$product->product_meta->size_chart_image) : asset('meem/frontend/img/charts.png') }}" id="imagepreview"
                         style="width: 400px; height: 264px;">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('customScripts')
    @parent

    <script type="text/javascript">
        $(document).ready(function () {
            $('#increaseQty').click(function () {
                var qty = $('#quantity').val();
                var max_limit = $('#max_qty').val();
                qty++;
                if (!isNaN(qty) && (qty <= max_limit)) {
                    $('#quantity').val(qty);
                }
                return false;
            });

            $('#size').change(function () {
                $('#productAttributeId').val('');
                var attributeId = $('#productAttributeId').val();
                var checkAttribute = false;
                var enableCart = true;

                //Get selected color value
                var color = $('#color').val();
                if ($('#size').val() != 'none') {
                    //request colors related to selected size
                    $.get("/product/" + $('#productId').val() + "/" + $('#size').val())
                            .done(function (data) {
                                //disable all color options
                                $("#color option").attr('disabled', 'disabled');
                                //check if already selected color available in colors returned from Ajax based on selected size otherwise set color to default
                                $(data).each(function (index, item) {
                                    $("#color option[value=" + item.color_id + "]").removeAttr('disabled');

                                    //if size and color selected set attribute id & enable add to cart button with quantity
                                    if (item.color_id == color) {
                                        attributeId = item.id;
                                        checkAttribute = true;
                                        $('#max_qty').val(item.qty);
                                    }

                                });

                                if (!checkAttribute) {
                                    $('#color').val('none');
                                    enableCart = false;
                                    disableCartActions();
                                } else {
                                    $('#productAttributeId').val(attributeId);
                                }

                            });

                    if (enableCart) {
                        enableCartActions();
                    }
                }
            });

            //if color changed
            $('#color').change(function () {
                $('#productAttributeId').val('');
                var attributeId = $('#productAttributeId').val();
                var checkAttribute = false;
                var enableCart = true;

                //Get selected size value
                var size = $('#size').val();
                if ($('#color').val() != 'none') {
                    //request colors related to selected size
                    $.get("/product-color/" + $('#productId').val() + "/" + $('#color').val())
                            .done(function (data) {
                                //disable all size options
                                $("#size option").attr('disabled', 'disabled');
                                //check if already selected size available in sizes returned from Ajax based on selected color otherwise set size to default
                                $(data).each(function (index, item) {
                                    $("#size option[value=" + item.size_id + "]").removeAttr('disabled');

                                    //if size and color selected set attribute id & enable add to cart button with quantity
                                    if (item.size_id == size) {
                                        attributeId = item.id;
                                        checkAttribute = true;
                                        $('#max_qty').val(item.qty);
                                    }

                                });

                                if (!checkAttribute) {
                                    $('#size').val('none');
                                    enableCart = false;
                                    disableCartActions();
                                } else {
                                    $('#productAttributeId').val(attributeId);
                                }

                            });

                    if (enableCart) {
                        enableCartActions();
                    }
                }
            });
        });

        function enableCartActions() {
            $('#increaseQty').removeAttr('disabled');
            $('#decreaseQty').removeAttr('disabled');
            $('#addToCart').removeAttr('disabled');
        }

        function disableCartActions() {
            $('#increaseQty').attr('disabled', 'disabled');
            $('#decreaseQty').attr('disabled', 'disabled');
            $('#addToCart').attr('disabled', 'disabled');
        }
    </script>
@endsection
