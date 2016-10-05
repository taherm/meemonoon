<!-- feature-product-area start -->
<div class="feature-product-area" style="background: {{ isset($backgroundColor) ?  :'white' }};">
    <div class="container">
        <!-- Area-heading start -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="feature-headline section-heading text-center">
                    <h2>{{ $heading }}</h2>
                </div>
            </div>
        </div>
        <!-- Area-heading end -->
        @include('frontend.modules.product.partials.product_thumbnail',['products'=>$products,'carousel'=>true])
    </div>
</div>

<!--quick-view start-->
<!-- featured-product-area end -->