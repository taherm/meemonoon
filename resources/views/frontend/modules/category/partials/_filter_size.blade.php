<div class="single-layout">
    <div class="layout-title">
        <h4>{{ trans('general.size') }}</h4>
    </div>
    <div class="layout-list">
        <ul>
            @if(!is_null($sizeCounter))
                @foreach($sizeCounter as $size)
                    <li class="{!! ($size['size_counter'] >= 1) ? '' : 'hidden'!!}"><a
                                href="?{{ $queryString }}&size={{ $size['size_id'] }}">
                            {!! $size["size"] !!}<span> ({!! $size['size_counter'] !!})</span>
                        </a></li>
                @endforeach
            @else
                <div class="alert alert-warning">
                    <i class="fa fa-exclamation-circle"></i>
                    {{ trans('general.message.warning.no_sizes') }}</div>
            @endif
        </ul>
    </div>
</div>