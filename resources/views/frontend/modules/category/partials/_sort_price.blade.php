<div class="sort-by">
    <label>{{ trans('general.sort_by') }} : </label>
    {{--<select>--}}
    {{--<option value="position">{{ trans('general.price') }}</option>--}}
    {{--<option value="name">{{ trans('general.highest') }}</option>--}}
    {{--<option value="price">{{ trans('general.lowest') }}</option>--}}
    {{--</select>--}}
    <a type="button" class="btn btn-default btn-xs btn-outline sbold uppercase" href="?{{ Request::getQueryString() }}&order=asc">{{ trans('general.lowest') }}</a>
    <a type="button" class="btn btn-default btn-xs green btn-outline sbold uppercase" href="?{{ Request::getQueryString() }}&order=desc">{{ trans('general.highest') }}</a>
</div>