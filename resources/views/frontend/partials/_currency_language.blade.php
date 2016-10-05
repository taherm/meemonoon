<ul>
    <li><span>{{ trans('general.language') }}</span>
        <ul>
            <li><a href="{{ url('/lang/ar') }}">{{ trans('general.arabic') }}</a></li>
            <li><a href="{{ url('/lang/en') }}">{{ trans('general.english') }}</a></li>
        </ul>
    </li>
    <li class="currency"><span>Country:</span> <img width="20" height="20"
                                                    src="{{asset('meem/frontend/img/flags/'.strtolower(currency()->getCurrencyCode()).'.png')}}"
                                                    style="padding-right: 5px; padding-left: 3px;"/><a
                href="#">{{currency()->getCurrencyCode()}}</a>
        <ul>
            @foreach($currencies as $currency)
                <li>
                    <img width="20" height="20"
                         src="{{asset('meem/frontend/img/flags/'.strtolower($currency->code).'.png')}}"
                         style="padding-right: 5px; float: left;padding-top: 9px;padding-left: 3px;"/>
                    <a href="{{ route('currency',strtolower($currency->code)) }}">{{ $currency->code }}</a>
                </li>
            @endforeach
            {{--<li><a href="#">eur</a></li>--}}
        </ul>
    </li>
</ul>