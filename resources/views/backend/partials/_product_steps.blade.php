<div class="mt-element-step">
    <div class="row step-background-thin">
        <div class="col-md-4 bg-grey-steel mt-step-col {{ $main }}">
            <div class="mt-step-number">1</div>
            <div class="mt-step-title uppercase font-grey-cascade">Product</div>
            <div class="mt-step-content font-grey-cascade"><a class="text-muted small"
                                                              href="{{ (request()->product_id) ? route('backend.product.edit',[request()->product_id, 'product_id' => request()->product_id]) : null }}">Primary
                    Information</a></div>
        </div>
        <div class="col-md-4 bg-grey-steel mt-step-col {{ $meta }}">
            <div class="mt-step-number">2</div>
            <div class="mt-step-title uppercase font-grey-cascade">Product Details</div>
            <div class="mt-step-content font-grey-cascade"><a class="text-muted small"
                                                              href="{{ (request()->product_id) ? route('backend.meta.edit',[request()->product_id, 'product_id' => request()->product_id]) : null }}">ProductMeta
                    Information</a></div>
        </div>
        <div class="col-md-4 bg-grey-steel mt-step-col {{ $attribute }}">
            <div class="mt-step-number">3</div>
            <div class="mt-step-title uppercase font-grey-cascade">Deploy</div>
            <div class="mt-step-content font-grey-cascade"><a class="text-muted small"
                                                              href="{{ (request()->product_id) ? route('backend.attribute.index',['product_id' => request()->product_id]) : null }}">Product
                    Attirubtes Information</a></div>
        </div>
    </div>
</div>