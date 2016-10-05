<!-- feature-product-area start -->
<div class="feature-product-area" style="background: #FFFFFF;">
    <div class="container">
        <!-- Area-heading start -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="feature-headline section-heading text-center">
                    <h2>New Arrivals</h2>
                    {{--<p>Mirum est notare quam littera gothica, quam nunc putamus parum claram</p>--}}
                </div>
            </div>
        </div>
        <!-- Area-heading end -->
        <div class="row">
            <div class="feature-product-4 product-carousel derection-key">
                <!-- single-product start -->
                @if(!is_null($newArivals))
                    @include('frontend.modules.product._product',['products' => $newArivals])
                @endif
            </div>
            <!-- carousel-end -->
        </div>
    </div>
</div>
<!-- featured-product-area end -->

<!-- feature-product-area start -->
<div class="feature-product-area">
    <div class="container">
        <!-- Area-heading start -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="feature-headline section-heading text-center">
                    <h2>On Sale Products</h2>
                    {{--<p>Mirum est notare quam littera gothica, quam nunc putamus parum claram</p>--}}
                </div>
            </div>
        </div>
        <!-- Area-heading end -->
        <div class="row">
            <div class="feature-product-4 product-carousel derection-key">
                <!-- single-product start -->
                @if(!is_null($onSale))
                    @include('frontend.modules.product._product',['products' => $onSale])
                @endif
            </div>
            <!-- carousel-end -->
        </div>
    </div>
</div>
<!-- featured-product-area end -->

<!-- feature-product-area start -->
<div class="feature-product-area" style="background: #FFFFFF;">
    <div class="container">
        <!-- Area-heading start -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="feature-headline section-heading text-center">
                    <h2>Best Seller products</h2>
                    {{--<p>Mirum est notare quam littera gothica, quam nunc putamus parum claram</p>--}}
                </div>
            </div>
        </div>
        <!-- Area-heading end -->
        <div class="row">
            <div class="feature-product-4 product-carousel derection-key">
                <!-- single-product start -->
                @if(!is_null($bestSales))
                    @include('frontend.modules.product._product',['products' => $bestSales])
                @endif
            </div>
            <!-- carousel-end -->
        </div>
    </div>
</div>
<!-- featured-product-area end -->