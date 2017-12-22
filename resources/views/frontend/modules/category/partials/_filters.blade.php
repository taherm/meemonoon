<!-- Left Sidebar-->
<div class="left-sidebar">
    <div class="left-sidebar-title">
        <h3 style="text-decoration: underline;">{{ $category->name }}</h3>
        {{--<h3>{{ trans('general.shopping_options') }}</h3>--}}
    </div>
    {{--<div class="left-layout">--}}
        {{--@include('frontend.modules.category.partials._filter_range')--}}
        {{--@include('frontend.modules.category.partials._filter_color')--}}
        {{--@include('frontend.modules.category.partials._filter_size')--}}
{{--        @include('frontend.modules.category.partials._filter_subcategorxies')--}}
    {{--</div>--}}
    <div class="left-sidebar-title">
        @include('frontend.modules.category.partials._tags')
    </div>
    {{--<div class="banner-left">--}}
        {{--<div class="single-banner">--}}
            {{--<a href="#">--}}
                {{--<img src="http://placehold.it/300x300" alt="">--}}
            {{--</a>--}}
        {{--</div>--}}
    {{--</div>--}}
</div>
