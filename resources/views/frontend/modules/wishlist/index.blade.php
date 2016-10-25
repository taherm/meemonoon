@extends('frontend.layouts.master')

@section('body')

    <!-- feature-product-area start -->
    <div class="feature-product-area" style="background: {{ isset($backgroundColor) ?  :'white' }};">
        <div class="container">
            <!-- Area-heading start -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="feature-headline section-heading text-center">
                        <h2>My Wishlist</h2>
                    </div>
                </div>
            </div>
            @include('frontend.modules.product.partials.product_thumbnail',['products'=>$wishlistProducts])
        </div>
    </div>

    @include('frontend.modules.product.partials.quick-view')

@endsection
