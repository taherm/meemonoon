<ul class="page-breadcrumb">
    @section('breadcrumbsItems')
        <a href="{{ route('home') }}">Home</a>
        <i class="fa fa-circle"></i>
    {{ $link = '' }}
        @foreach($breadCrumbs as $key => $value)
            <a href="{{ $link .= '/'.$value }}">{{$value}}</a>
            <i class="fa fa-arrow-right"></i>
        @endforeach
    @show
</ul>