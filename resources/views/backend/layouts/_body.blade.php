@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-plus font-red-sunglo"></i>
                        <span class="caption-subject font-red-sunglo bold uppercase">
                            {!! Request::route()->getName() !!}
                        </span>
                        {{--<span class="caption-helper">some info...</span>--}}
                    </div>
                    @yield('tools')
                </div>
                <div class="portlet-body">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
@show
