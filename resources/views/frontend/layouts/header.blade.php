<!-- Header-area start -->
<header>
    <div class="header-area header-4-area">
        <!-- header-top start -->
        <div class="header-top">
            <div class="container">
                <div class="row">
                    @include('frontend.partials._nav_left')
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="logo">
                            <a href="{{URL('/')}}" style="margin-top: -27%;"><img
                                        src="{{asset('meem/frontend/img/logo/mainlogo.jpg')}}" alt=""
                                        style="width: 83%;"></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        @include('frontend.partials._nav_right')
                    </div>
                </div>
            </div>
        </div>
        <!-- header-top end -->
        <!-- header-bottom start -->
        <div class="header-bottom hidden-xs">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <!-- main-menu start -->
                        <div class="main-menu main-menu4">
                            <nav>
                                <ul style="{!! (App::isLocale('ar')) ? 'direction: rtl !important;' : null !!}">
                                    <li><a class="no-child" href="{{URL('/')}}">{{ trans('general.home') }}</a></li>
                                    @foreach($categories as $category)
                                        <li class="dropdown">
                                            <a href="{{ route('category.show',$category->id) }}">{{ $category->name }}</a>
                                            @if(count($category->children) > 0)
                                                <ul>
                                                    @foreach($category->children as $child)

                                                        <li>
                                                            <a href="{{ route('category.show',[$category->id]) }}?child={{ $child->id }}">{{ $child->name }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </nav>
                        </div>
                        <!-- main-menu end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- header-bottom end -->
    </div>
    <!-- mobile-menu-area start -->
    <div class="mobile-menu-area hidden-lg hidden-md hidden-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-12 hidden-lg hidden-md">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul>
                                <li><a href="{{URL('/')}}">home</a></li>
                                {{--@foreach($categories as $category)--}}
                                {{--<li class="dropdown">--}}
                                {{--<a href="#">{{ trans('general.categories') }}</a>--}}
                                {{--@if(count($category->children) > 0)--}}
                                {{--<ul>--}}
                                {{--<li><a href="{{ route('category.show',[Session::get('company_id'),$category->id]) }}">{{ $category->name }}</a></li>--}}
                                {{--@foreach($category->children as $child)--}}
                                {{--<li><a href="{{ route('category.show',[Session::get('company_id'),$category->id,$child->id]) }}">{{ $child->name }}</a></li>--}}
                                {{--@endforeach--}}
                                {{--</ul>--}}
                                {{--@endif--}}
                                {{--</li>--}}
                                {{--@endforeach--}}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- mobile-menu-area end -->
</header>
<!-- header area end -->