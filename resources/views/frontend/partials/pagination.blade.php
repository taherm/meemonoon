<div class="sorter">
    <div class="sort-by">
        <label>Sort By</label>
        <select id="sort" style="height: auto;">
            <option value="position">{{ trans('general.position') }}</option>
            <option value="name">{{ trans('general.name') }}</option>
            {{--<option value="price">{{ trans('general.price') }}</option>--}}
        </select>
        @if(str_contains(request()->fullUrl(),'desc'))
            <a href="{{ request()->fullUrl().'&sort=asc' }}"><i class="fa fa-long-arrow-up"></i></a>
        @else
            <a href="{{ request()->fullUrl().'&sort=desc' }}"><i class="fa fa-long-arrow-down"></i></a>
        @endif
    </div>
</div>
{{--@if($products->count() >= 12)--}}
    {{--<div class="pages">--}}
        {{--<ol>--}}
            {{--@for($i=1;$i <= round($products->count() / 12) + 1 ; $i++)--}}
                {{--@if(str_contains(Request::getQueryString(),'page'))--}}
                    {{--<li class=""><a href="?&page={{ $i }}">{{ $i }}</a>--}}
                    {{--</li>--}}
                {{--@else--}}
                    {{--<li class=""><a href="?{{ Request::getQueryString() }}&page={{ $i }}">{{ $i }}</a>--}}
                    {{--</li>--}}
                {{--@endif--}}
            {{--@endfor--}}
        {{--</ol>--}}
        {{ $products->links() }}
    {{--</div>--}}
{{--@endif--}}