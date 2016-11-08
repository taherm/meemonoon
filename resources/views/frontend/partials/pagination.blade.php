<div class="pages">
    <ol>
        @for($i=1;$i <= round($productsCounter/$perPage); $i++)
            @if(str_contains(Request::getQueryString(),'page'))
                <li class=""><a href="?&page={{ $i }}">{{ $i }}</a>
                </li>
            @else
                <li class=""><a href="?{{ Request::getQueryString() }}&page={{ $i }}">{{ $i }}</a>
                </li>
            @endif
        @endfor
    </ol>
</div>