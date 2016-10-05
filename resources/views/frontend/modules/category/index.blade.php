@extends('frontend.layouts.master')

@section('body')

        <!--Products start-->
<!-- shop page area start -->
<div class="shop-product-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                <!--Filters start-->
                @include('frontend.modules.category.partials._filters')
                        <!--Filters end-->
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                <!--breadcrumbs start-->
                @include('frontend.modules.category.partials._breadcrumbs')
                        <!--breadcrumbs end-->
                {{--@include('frontend.modules.category.partials._banner')--}}
                <div class="shop-product-view">
                    <!-- Shop Product Tab Area -->
                    <div class="product-tab-area">
                        @include('frontend.modules.category.partials._top_toolbar')
                                <!-- Tab Content -->
                        <div class="clearfix"></div>
                        <div class="tab-content">
                            <div id="shop-grid" class="tab-pane active" role="tabpanel">
                                <div class="row">
                                    @include('frontend.modules.product.partials.product_thumbnail',$products)
                                </div>
                            </div>
                        </div>
                        @include('frontend.modules.category.partials._bottom_toolbar')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- shop page area end -->
<!--Products end-->


@endsection

