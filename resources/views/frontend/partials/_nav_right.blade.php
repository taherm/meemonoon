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
                            <ul style="left: 0px;" id="profile-list">
                                @if(Auth::id() == 1)
                                    <li><a href="{{ url('/backend') }}">{{ trans('general.dashboard') }}</a></li>
                                @endif
                                <li><a href="{{ route('profile') }}">{{ trans('general.my_account') }}</a></li>
                                <li><a href="/wishlist">{{ trans('general.my_wishlist') }}</a></li>
                                <li><a href="/cart">{{ trans('general.shopping_cart') }}</a></li>
                                <li><a href="/checkout">{{ trans('general.checkout') }}</a></li>
                                <li style="display: block;">
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
            <a href="{{URL('login')}}" style="color: #b2dab7;">{{ trans('general.login') }}</a>
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
                @if(count($cartHeaderItems->items) > 0)
                    <div class="cart-content">
                        <div style="display: none;">{{$itemCount = 1}}</div>
                        @foreach($cartHeaderItems->items as $product)
                            @if($itemCount <= 2)
                            <div class="product-items-cart">
                                <div class="cart-img">
                                    <a href="{{ route('product.show',$product->id) }}"><img width="50" height="60" src="{{ asset('img/uploads/thumbnail/').'/'.$product->image}}" alt="" /></a>
                                </div>
                                <div class="cart-text-2">
                                    <a class="btn-remove" title="Remove This Item" href="{{ route('cart.remove',$product->id) }}"><i class="fa fa-times"></i></a>
                                    <p class="product-name"><a href="{{ route('product.show',$product->id) }}">{{ $product->name }}</a></p>
                                    <p><strong>{{ $product->quantity }}</strong> x<span class="price">{{ $product->sale_price }} KD</span> </p>
                                </div>
                            </div>
                            <div style="display: none;">{{$itemCount++}}</div>
                            @endif
                        @endforeach

                        <div class="cart-btn-3">
                            <a class="button" href="{{ route('cart.index') }}" style="margin-left: 10%;">{{trans('general.view_all_items')}}</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <!-- cart item end -->
    </div>
</div>
<!-- header right4 end -->