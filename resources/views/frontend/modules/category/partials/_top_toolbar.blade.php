<!-- Tab Bar -->
<div class="tab-bar">
    <div class="tab-bar-inner">
        @if(Request::route()->getName() == 'category.show')
            @include('frontend.modules.category.partials._sort_price')
        @endif
    </div>
    <div class="toolbar">
        <div class="pager-list" style="float: right;">
            <div class="limiter">
                @include('frontend.partials.pagination',['elements' => $products,'perPage' => 9])
            </div>
        </div>
    </div>
</div>
<!-- End Tab Bar -->