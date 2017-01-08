<div class="single-layout">
    <div class="layout-title">
        <h4>{{ trans('general.color') }}</h4>
    </div>
    <div class="layout-list">
        <ul>
            @if(!is_null($colorCounter))
                @foreach($colorCounter as $color)
                    <li class="{{ ($color['color_counter'] >= 1) ? 'hidden' : ''}}"><a
                                href="?{{ $queryString }}&color={{ $color['color_id'] }}">
                            <button disabled style="background-color: {!! $color['code'] !!}; border: none; border-radius: 0" class="btn-sm"></button>
                            {{ $color['name'] }} <span> ({{ count($color['color_counter']) }})</span>
                        </a></li>
                @endforeach
                @else
                <div class="alert alert-warning">
                        <i class="fa fa-exclamation-circle"></i>
                    {{ trans('general.message.warning.no_colors') }}</div>
            @endif
        </ul>
    </div>
</div>