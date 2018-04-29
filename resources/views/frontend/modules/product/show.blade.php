@extends('frontend.layouts.master')

@section('body')
    <div class="single-page-area shop-product-area">
        <div class="container">
            <div class="row">
                <div class="shop-head">
                    <ul class="shop-head-menu">
                        <li><i class="fa fa-home"></i><a class="home"
                                                         href="{{ url('/') }}"><span>{{ trans('general.home') }}</span></a>
                        </li>
                        <li>{{ $product->name }}</li>
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
                                        @if(isset($product->product_meta->image))
                                            <div class="tab-pane active" id="{{'p-view-1'}}">
                                                <div class="simpleLens-big-image-container">
                                                    <a class="simpleLens-lens-image"
                                                       data-lens-image="{{asset('img/uploads/large/'.$product->product_meta->image)}}">
                                                        <img src="{{asset('img/uploads/large/'.$product->product_meta->image)}}"
                                                             class="simpleLens-big-image" alt="{{ $product->name }}">
                                                    </a>
                                                </div>
                                            </div>
                                            <div style="display: none;">
                                                {{$count++}}
                                            </div>
                                        @endif

                                        @if(count($product->gallery->images) > 0)
                                            @foreach($product->gallery->images->sortBy('order') as $image)
                                                <div class="tab-pane @if($count == 1) active @endif"
                                                     id="{{'p-view-'. $count++}}">
                                                    <div class="simpleLens-big-image-container">
                                                        <a class="simpleLens-lens-image"
                                                           data-lens-image="{{asset('img/uploads/large/'.$image->large_url)}}">
                                                            <img src="{{asset('img/uploads/large/'.$image->large_url)}}"
                                                                 class="simpleLens-big-image" alt="{{ $product->name }}">
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif

                                    </div>
                                    <!-- Simple Lence Thumbnail -->
                                    <div class="simpleLens-thumbnails-container text-center">
                                        <div id="single-product" class="owl-carousel custom-carousel">
                                            @if(isset($product->product_meta->image) && count($product->gallery->images) > 0)
                                                @if(isset($product->product_meta->image))
                                                    <ul class="nav nav-tabs" role="tablist">
                                                        <li class="active"><a href="/#p-view-1" role="tab" data-toggle="tab">
                                                                <img src="{{asset('img/uploads/thumbnail/'.$product->product_meta->image)}}"
                                                                     width="100" height="100" alt="{{ $product->name }}"></a>
                                                        </li>
                                                    </ul>
                                                @endif
                                                <div style="display: none;">

                                                    @if(isset($product->product_meta->image))
                                                        {{$count2 = 2}}
                                                    @else
                                                        {{$count2 = 1}}
                                                    @endif

                                                </div>
                                                @if(count($product->gallery->images) > 0)
                                                    @foreach($product->gallery->images->sortBy('order') as $image)

                                                        <ul class="nav nav-tabs" role="tablist">
                                                            <li class="@if($count2 == 1) active @else last-li @endif"><a
                                                                        href="{{'/#p-view-'. $count2++}}" role="tab"
                                                                        data-toggle="tab"><img
                                                                            src="{{asset('img/uploads/large/'.$image->large_url)}}"
                                                                            width="100" height="100" alt="{{ $product->name }}"></a>
                                                            </li>
                                                        </ul>

                                                    @endforeach
                                                    @endif
                                            @endif

                                        </div>
                                    </div><!-- End Simple Lence Thumbnail -->
                                </div><!-- End Simple Lence Gallery Container -->
                            </div><!-- End Single Product View -->
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12 single-product-details">
                            <div class="product-details shop-review ">
                                <div class="col-lg-12" style="padding-left: 0px;padding-right: 0px;">
                                    <div class="col-lg-10" style="padding-left: 0px;padding-right: 0px;">
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
                                    <h3 style="font-size: 15px;">{{ trans('general.sku') }} : ({{$product->sku}})</h3>
                                </div>
                                <div class="price-box">
                                    @if($product->product_meta->on_sale)
                                        <span class="old-price">
                                            {{ currency($product->product_meta->price,'KWD',currency()->getUserCurrency('KWD'),false) }}
                                            {{ currency()->getCurrency('KWD')['code'] }}
                                        </span>
                                        <span class="new-price">
                                            {{ currency($product->product_meta->sale_price,'KWD',currency()->getUserCurrency('KWD'),false) }}
                                            {{ currency()->getCurrency('KWD')['code'] }}
                                        </span>
                                        @if(Currency::getCurrency(session()->get('currency')) != 'KWD')
                                            <div>
                                                <p style="margin: 0px;padding-top: 15px;font-size: 10px;">{{trans('general.approximately')}}</p>
                                                <span class="old-price"
                                                      style="font-size: 13px;">
                                                {{ currency($product->product_meta->price,'KWD',session()->get('currency'),false) }}
                                                    {{ currency()->getCurrency(session()->get('currency'))['code'] }}
                                                </span>
                                                <span class="new-price"
                                                      style="font-size: 13px;">
                                                {{ currency($product->product_meta->sale_price,'KWD',session()->get('currency'),false) }}
                                                    {{ currency()->getCurrency(session()->get('currency'))['code'] }}
                                                </span>
                                            </div>
                                        @endif
                                    @else
                                        <span class="new-price">
                                        {{ currency($product->product_meta->price,'KWD',currency()->getUserCurrency('KWD'),false) }}
                                            {{ currency()->getCurrency('KWD')['code'] }}
                                        </span>
                                        @if(currency()->getCurrency(session()->get('currency')) != 'KWD')
                                            <div>
                                                <p style="margin: 0px;padding-top: 15px;font-size: 10px;">Approx.</p>
                                                <span class="new-price"
                                                      style="font-size: 13px;">
                                                {{ currency($product->product_meta->price,'KWD',session()->get('currency'),false) }}
                                                    {{ currency()->getCurrency(session()->get('currency'))['code'] }}
                                                </span>
                                            </div>
                                        @endif
                                    @endif

                                </div>
                                @if($product->totalQty > 0)
                                    <p class="availability in-stock">{{ trans('general.availability') }}: <span>In stock</span></p>
                                @else
                                    <p class="availability in-stock">{{ trans('general.availability') }} : <span style="color: #ff0000;">Out stock</span>
                                    </p>
                                @endif
                                {{--<p class="availability in-stock">--}}
                                    {{--@if(currency()->getCurrency(session()->get('currency')) == 'KWD')--}}
                                        {{--<i class="fa fa-truck" aria-hidden="true"></i>--}}
                                        {{--<strong>{{ trans('general.free_delivery_within_24_hours') }}</strong>--}}
                                    {{--@elseif(currency()->getCurrency(session()->get('currency')) == 'SAR')--}}
                                        {{--<img src="{{asset('meem/frontend/img/aramex.png')}}" width="40"/>--}}
                                    {{--@else--}}
                                        {{--<img src="{{asset('meem/frontend/img/aramex.png')}}" width="40"/>--}}
                                        {{--<strong>{{ trans('general.delivery_within_3_days') }}</strong>--}}
                                    {{--@endif--}}
                                {{--</p>--}}
                                </br>
                                <div class="product-review">
                                    <p>{!! $product->product_meta->description !!}</p>
                                </div>
                                @if($product->totalQty > 0)
                                    <div class="add-to-cart cart-sin-product">
                                        @if($product->product_attributes->unique('size')->contains(function ($value, $key) {
                                                    return ($value->size->size != 'none' AND $value->qty > 0);
                                                }))
                                            <div class="quick-add-to-cart">
                                                <div class="col-lg-6">
                                                    <div>{{ trans('general.size') }}</div>
                                                </div>
                                                <div class="col-lg-12" style="padding-left: 0px;padding-right: 0px;">
                                                    <div class="col-lg-6">

                                                        <select class="input-text qty"
                                                                name="size" id="size">
                                                            <option value="none">{{ trans('general.size_select') }}</option>
                                                            @foreach($product->product_attributes->unique('size') as $attribute)
                                                                @if($attribute->qty > 0)
                                                                    <option value="{{$attribute->size->id}}">{{$attribute->size->name}}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    {{--Size Chart Image Table will only Show if the parent category not limited--}}
                                                    @if(!$product->parent()->first()->limited)
                                                        <a href="#" data-toggle="modal" data-target="#imagemodal"
                                                           title="Check Item Sizes!"
                                                           style="text-decoration: none;border: navajowhite;color: #b2dab7;font-size: 12px;">
                                                            {{ trans('general.size_charts') }}</a>
                                                    @endif
                                                </div>
                                            </div>
                                            <input id="size_attribute" value="found" style="display: none;">
                                        @else
                                            <input id="size_attribute" value="not-found" style="display: none;">
                                        @endif
                                        @if($product->product_attributes->unique('color')->contains(function ($value, $key) {
                                                return ($value->color->name != 'none' AND $value->qty > 0);
                                            }))
                                            <div class="quick-add-to-cart">
                                                <div class="col-lg-6">{{ trans('general.color') }}</div>
                                                <div class="col-lg-12" style="padding-left: 0px;padding-right: 0px;">
                                                    <div class="col-lg-6">
                                                        <select class="input-text qty" name="color"
                                                                id="color">
                                                            <option value="none">{{ trans('general.select_color') }}</option>

                                                            @foreach($product->product_attributes->unique('color') as $attribute)
                                                                @if($attribute->qty > 0)
                                                                    <option value="{{$attribute->color->id}}">{{$attribute->color->name}}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        @foreach($product->product_attributes->unique('color') as $attribute)
                                                            <div class="col-lg-1"
                                                                 style="border: 1px solid lightgrey; min-height : 30px; margin: 3px; background-color : {!! $attribute->color->code !!}"></div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <input id="color_attribute" value="found" style="display: none;">
                                        @else
                                            <input id="color_attribute" value="not-found" style="display: none;">
                                        @endif

                                        <div class="quick-add-to-cart col-lg-12" style="padding-top: 3%;">
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
                                                           style="{{ App::getLocale() == 'ar' ?  'margin-right: -90px; margin-top: -8px; width:20px;' :  'padding-right: 20px; top: -27px;' }} outline: none;"
                                                           disabled>
                                                </div>
                                                <div class="box-icon button-minus">
                                                    <input id="decreaseQty" type="button" class="qty-decrease"
                                                           onclick="var qty_el = document.getElementById('quantity'); var qty = qty_el.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) qty_el.value--;return false;"
                                                           value="-"
                                                           style="{{ App::getLocale() == 'ar' ?  'top: -31px; margin-right: -111px; width:20px;' :  'padding-right: 8px;top: -31px;' }} outline: none;"
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
                            </div>
                            @endif
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

        @if(!is_null($products) && $products->count() > 0)
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
                    <img src="{{ file_exists(public_path('img/uploads/large/'.$product->product_meta->size_chart_image)) ? asset('img/uploads/large/'.$product->product_meta->size_chart_image) : asset('meem/frontend/img/charts.png') }}"
                         id="imagepreview"
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
                var checkColorFound = $('#color_attribute').val();
                //Get selected color value
                var color = $('#color').val();
                if ($('#size').val() != 'none') {
                    //request colors related to selected size
                    $.get("/product/" + $('#productId').val() + "/" + $('#size').val())
                            .done(function (data) {
                                //disable all color options
//                                $("#color option").attr('disabled', 'disabled');
                                //check if already selected color available in colors returned from Ajax based on selected size otherwise set color to default
                                $(data).each(function (index, item) {
//                                    $("#color option[value=" + item.color_id + "]").removeAttr('disabled');
                                    //if size and color selected set attribute id & enable add to cart button with quantity
                                    if (item.color_id == color || checkColorFound === 'not-found') {
                                        attributeId = item.id;
                                        checkAttribute = true;
                                        $('#max_qty').val(item.qty);
                                    }
                                });

                                if (!checkAttribute) {
                                    if (color !== 'none') {
                                        toastr.warning('Sorry Please Select Another Color', 'Please Select Another Color',
                                                {
                                                    "closeButton": true,
                                                    "debug": false,
                                                    "positionClass": "toast-top-full-width",
                                                    "onclick": null,
                                                    "showDuration": "1000",
                                                    "hideDuration": "1000",
                                                    "timeOut": "5000",
                                                    "extendedTimeOut": "1000",
                                                    "showEasing": "swing",
                                                    "hideEasing": "linear",
                                                    "showMethod": "fadeIn",
                                                    "hideMethod": "fadeOut"
                                                });

                                        $('#color').val('none');
                                    }
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
                var checkSizeFound = $('#size_attribute').val();
                //Get selected size value
                var size = $('#size').val();
                if ($('#color').val() != 'none') {
                    //request colors related to selected size
                    $.get("/product-color/" + $('#productId').val() + "/" + $('#color').val())
                            .done(function (data) {
                                //disable all size options
//                                $("#size option").attr('disabled', 'disabled');
                                //check if already selected size available in sizes returned from Ajax based on selected color otherwise set size to default
                                $(data).each(function (index, item) {
//                                    $("#size option[value=" + item.size_id + "]").removeAttr('disabled');
                                    //if size and color selected set attribute id & enable add to cart button with quantity
                                    if (item.size_id == size || checkSizeFound === 'not-found') {
                                        attributeId = item.id;
                                        checkAttribute = true;
                                        $('#max_qty').val(item.qty);
                                    }
                                });
                                if (!checkAttribute) {
                                    if (size !== 'none') {
                                        toastr.warning('Sorry Please Select Another Size', 'Please Select Another Size',
                                                {
                                                    "closeButton": true,
                                                    "debug": false,
                                                    "positionClass": "toast-top-full-width",
                                                    "onclick": null,
                                                    "showDuration": "1000",
                                                    "hideDuration": "1000",
                                                    "timeOut": "5000",
                                                    "extendedTimeOut": "1000",
                                                    "showEasing": "swing",
                                                    "hideEasing": "linear",
                                                    "showMethod": "fadeIn",
                                                    "hideMethod": "fadeOut"
                                                });

                                        $('#size').val('none');
                                    }

                                    enableCart = false;
                                    disableCartActions();
                                } else {
                                    $('#productAttributeId').val(attributeId);
                                }
                            }).done(function () {
                        if (enableCart) {
                            enableCartActions();
                        }
                    });
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
