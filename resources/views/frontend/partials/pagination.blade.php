<div class="pages">
    <ol>
        {{--{{ $products->render() }}--}}
        @for($i=1;$i <= $elements->count()/$perPage; $i++)
            <li class=""><a href="?{{ Request::getQueryString() }}&page={{ $i }}">{{ $i }}</a>
            </li>
        @endfor
        {{--@if($elements->hasMorePages())--}}
            {{--<li><a title="Next" href="?{{ Request::getQueryString().'&'.$elements->nextPageUrl() }}"><i--}}
                            {{--class="fa fa-angle-double-right"></i></a>--}}
            {{--</li>--}}
        {{--@endif--}}
    </ol>
</div>