@extends('frontend.layouts.master')

@section('body')

        <!--Products start-->
<!-- shop page area start -->
<div class="shop-product-area">
    <div class="container">
        <div class="row">
            <!--Filters start-->
            {{--<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">--}}

{{--                @include('frontend.modules.category.partials._filters')--}}
                        <!--Filters end-->
            {{--</div>--}}
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!--breadcrumbs start-->
                {{--@include('frontend.modules.category.partials._breadcrumbs')--}}
                        <!--breadcrumbs end-->
                @include('frontend.modules.category.partials._banner')
                <div class="shop-product-view">
                    <!-- Shop Product Tab Area -->
                    @include('frontend.modules.product.partials.product_category')
                </div>
            </div>
        </div>
    </div>
</div>
<!-- shop page area end -->
<!--Products end-->
@endsection

@section('customScripts')
    @parent
    <script type="text/javascript">

    </script>
@endsection

