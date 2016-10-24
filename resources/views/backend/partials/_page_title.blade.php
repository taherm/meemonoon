<h3 class="page-title">
    @section('page-title')
        {{ \Request::route()->getName() }}
    @show
    <small>
        @section('page-title-small')
            {{--test page title small--}}
        @show
    </small>
</h3>