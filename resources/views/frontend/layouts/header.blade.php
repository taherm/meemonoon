<!-- Header-area start -->
<header>
    <div class="header-area header-4-area">
        <!-- header-top start -->
        <div class="header-top">
            <div class="container">
                <div class="row">
                    @include('frontend.partials._nav_left')
                    <div class="col-lg-4 col-md-4 col-sm-4" style="max-height: 73px;">
                        <div class="logo">
                            <a href="{{URL('/')}}"><img class="img-responsive" style="width : 100%; height : auto;"
                                                        src="{{asset('meem/frontend/img/logo/mainlogo.jpg')}}"
                                                        alt=""></a>
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
                                    @foreach($categories->sortBy('order') as $category)
                                        <li>
                                            <a href="{{ route('category.show',$category->id) }}">{{ $category->name }}</a>
                                            <!-- mega menu start -->
                                            @if(count($category->children) > 0)
                                                <div class="mega-menu mega-menu3">
                                                    @foreach($category->children->sortBy('order') as $child)
                                                        <span>
                                                                <a class="mega-headline"
                                                                   href="{{ route('category.show',[$category->id]) }}?child={{ $child->id }}">{{ $child->name }}</a>
                                                            @if(count($child->children) > 0)
                                                                @foreach($child->children->sortBy('order') as $subChild)
                                                                    <a href="{{ route('category.show',[$child->id]) }}?child={{ $subChild->id }}">{{ $subChild->name }}</a>
                                                                @endforeach
                                                            @endif
                                                            </span>

                                                    @endforeach
                                                </div>
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
                        <nav id="dropdown">
                            <ul>
                                <li><a href="{{URL('/')}}">home</a></li>
                                @foreach($categories->sortBy('order') as $category)
                                    <li>
                                        <a href="{{ route('category.show',$category->id) }}">{{ $category->name }}</a>
                                        <!-- mega menu start -->
                                        @if(count($category->children) > 0)
                                            <ul>
                                                @foreach($category->children->sortBy('order') as $child)
                                                    <li>
                                                        <a class="mega-headline"
                                                           href="{{ route('category.show',[$category->id]) }}?child={{ $child->id }}">{{ $child->name }}</a>
                                                        @if(count($child->children) > 0)
                                                            <ul>
                                                                @foreach($child->children->sortBy('order') as $subChild)
                                                                    <li>
                                                                        <a href="{{ route('category.show',[$child->id]) }}?child={{ $subChild->id }}">{{ $subChild->name }}</a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
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