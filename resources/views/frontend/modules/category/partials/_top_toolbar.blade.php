<div class="tab-bar">
    <div class="tab-bar-inner">
        <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#shop-grid" data-toggle="tab"><i class="fa fa-th-large"></i></a></li>
            <li><a href="#shop-list" data-toggle="tab"><i class="fa fa-th-list"></i></a></li>
        </ul>
    </div>
    <div class="toolbar">
        <div class="sorter">
            <div class="sort-by">
                <label>Sort By</label>
                <select id="sort" style="height: auto;">
                    <option value="position">{{ trans('general.position') }}</option>
                    <option value="name">{{ trans('general.name') }}</option>
                    <option value="price">{{ trans('general.price') }}</option>
                </select>
                {{--@if(str_contains(request()->fullUrl(),'desc'))--}}
                    {{--<a href="{{ request()->fullUrl().'&sort=asc' }}"><i class="fa fa-long-arrow-up"></i></a>--}}
                {{--@else--}}
                    {{--<a href="{{ request()->fullUrl().'&sort=desc' }}"><i class="fa fa-long-arrow-down"></i></a>--}}
                {{--@endif--}}
            </div>
        </div>
    </div>
</div>
</div>
@section('customScripts')
    @parent
    <script type="text/javascript">
        $('#sort').on('change', function (e) {
            var type = e.target.value;
            window.location.replace('{!! request()->url() !!}' + '?type=' + type);
        });
    </script>
@endsection