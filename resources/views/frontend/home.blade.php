@extends('frontend.layouts.master')

@section('body')

@section('slider')
        <!--slider-area start-->
@include('frontend.partials.slider')
        <!--slider-area end-->

@include('frontend.modules.ad.show')
@show

        <!--feature-product-area start-->
{{--col-lg-4 col-md-4 col-sm-4--}}
@include('frontend.modules.product.partials.product_carousel',['products'=>$newArrivals,'heading'=> trans('general.new_arrival'),'backgroundColor'=>'#e7e7e7', 'cols' => 'col-lg-3 col-md-3 col-sm-3'])
        <!--feature-product-area end-->

<!--news-product-area start-->
@include('frontend.modules.product.partials.product_carousel',['products'=>$onSaleProducts,'heading'=> trans('general.on_sale_products'), 'cols' => 'col-lg-3 col-md-3 col-sm-3'])


@include('frontend.modules.product.partials.product_carousel',['products'=>$bestSalesProducts,'heading'=>trans('general.best_sale_products'),'backgroundColor'=>'#e7e7e7','cols' => 'col-lg-3 col-md-3 col-sm-3'])

        <!--news letter-->
@include('frontend.partials.newsletter')
        <!--slider-area end-->

@endsection
