<!-- header right4 start -->
<div class="header-right header-right4">

    <div class="header-right-link">

        @if(Auth::check())
            <div class="top-menu wishlist">
                <nav>
                    <ul>
                        <li>
                            <a href="#">
                                {{--<img src="{{asset('meem/frontend/img/icons/ac-links.png')}}" alt="">--}}
                                {{ trans('general.welcome') }}, {{  auth()->user()->firstname }}
                            </a>
                            <ul style="left: 0px;">
                                @if(Auth::id() == 1)
                                    <li><a href="{{ url('/backend') }}">{{ trans('general.dashboard') }}</a></li>
                                @endif
                                <li><a href="{{ route('profile') }}">{{ trans('general.my_account') }}</a></li>
                                <li><a href="/wishlist">{{ trans('general.my_wishlist') }}</a></li>
                                <li><a href="/cart">{{ trans('general.shopping_cart') }}</a></li>
                                <li><a href="/checkout">{{ trans('general.checkout') }}</a></li>
                                <li>
                                    <a href="{{ url('/logout') }}"
                                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        {{ trans('general.logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        @else
            <a href="{{URL('login')}}">{{ trans('general.login') }}</a>
        @endif
    </div>

    <div class="header-right-link">
        {!!   Form::open(['route' => 'search','method' => 'get']) !!}
        <div class="search-option" style="left: 0px;bottom: -27px;">
            <input type="text" name="term" placeholder="{{ trans('general.search') }}" style="margin-bottom: 0px;height: 30px;border: none;">
            <button class="button" type="submit"><i class="fa fa-search"></i></button>
        </div>
        <a class="search-img" href="#"><img src="{{asset('meem/frontend/img/icons/seach.png')}}" alt=""></a>
        {!! Form::close() !!}
    </div>
    <div class="header-right-link">
        <div class="cart-item">
            <div class="cart-item-title">
                <a href="{{ route('cart.index') }}"><img src="{{asset('meem/frontend/img/icons/card.png')}}" alt="">
                    <span class="total-cart">{{ $cartItemsCount }}</span>
                </a>
                {{--<div class="cart-content">--}}
                    {{--<div class="product-items-cart">--}}
                    {{--<div class="cart-img">--}}
                    {{--<a href="#"><img src="{{asset('meem/frontend/img/cart/12_2.jpg')}}" alt="" /></a>--}}
                    {{--</div>--}}
                    {{--<div class="cart-text-2">--}}
                    {{--<a class="btn-remove" title="Remove This Item" href="#"><span class="pencil"><i class="fa fa-pencil"></i></span><i class="fa fa-times"></i></a>--}}
                    {{--<p class="product-name"><a href="#">Pellentesque habitant</a></p>--}}
                    {{--<p><strong>1</strong> x<span class="price">$100.00</span> </p>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="product-items-cart">--}}
                    {{--<div class="cart-img">--}}
                    {{--<a href="#"><img src="{{asset('meem/frontend/img/cart/12_8.jpg')}}" alt="" /></a>--}}
                    {{--</div>--}}
                    {{--<div class="cart-text-2">--}}
                    {{--<a class="btn-remove" title="Remove This Item" href="#"><span class="pencil"><i class="fa fa-pencil"></i></span><i class="fa fa-times"></i></a>--}}
                    {{--<p class="product-name"><a href="#">Fusce</a></p>--}}
                    {{--<p><strong>1</strong> x<span class="price">$105.00</span>  </p>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="top-subtotal">Subtotal: <span class="price">$205.00</span></div>--}}
                    {{--<div class="cart-btn-3">--}}
                        {{--<a class="button" href="#">view cart</a>--}}
                        {{--<a class="button check-btn" href="#">checkout</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>
        </div>
        <!-- cart item end -->
    </div>
</div>
<!-- header right4 end -->