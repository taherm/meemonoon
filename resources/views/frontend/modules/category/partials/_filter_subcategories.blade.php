@if($childrenCategoryFlag)
<div class="single-layout">
    <div class="layout-title">
        <h4>{{ trans('general.subcategories') }}</h4>
    </div>
    <div class="layout-list">
        <ul>
            @foreach($categories as $category)
                @if($category->id == $parentId)
                    @if(count($category->children) >=1)
                        @foreach($category->children as $category)
                            <li class=""><a
                                        href="?{{ $queryString }}&child={{ $category->id }}">
                                    {{ $category->name }}
                                </a></li>
                        @endforeach
                    @else
                        <div class="alert alert-warning">
                            <i class="fa fa-exclamation-circle"></i>
                            {{ trans('general.message.warning.no_categories') }}</div>
                    @endif
                @endif
            @endforeach
        </ul>
    </div>
</div>
@endif

{{--@if(count($category->children) > 0)--}}
{{--<ul>--}}
{{--<li>--}}
{{--<a href="{{ route('category.show',[$category->id]) }}">{{ $category->name }}</a>--}}
{{--</li>--}}
{{--@foreach($category->children as $child)--}}
{{--<li>--}}
{{--<a href="{{ route('category.show',[$category->id]) }}?child={{ $child->id }}">{{ $child->name }}</a>--}}
{{--</li>--}}
{{--@endforeach--}}
{{--</ul>--}}
{{--@endif--}}