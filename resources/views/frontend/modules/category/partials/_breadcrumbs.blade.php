<div class="shop-head">
    <ul class="shop-head-menu">
        <li><i class="fa fa-home"></i><a class="home"
                                         href="{{ route('home') }}"><span>{{ trans('general.home') }}</span></a>
        </li>
        @if(!is_null($categories))
            @if(\Request::route()->getName() == 'category.show')
                <li><i class="fa fa-arrow"></i><a
                            href="{{ route('category.show',$parentId) }}"><span>{{ $categories->where('id',(int) $parentId)->first()->name }}</span></a>
                </li>
                @if(Request::has('child'))
                    <li><i class="fa fa-arrow"></i><a
                                href="{{ route('category.show',$parentId) }}?child={!! Request::input('child') !!}"><span>{{ $categories->where('id',(int) $parentId)->first()->children->where('id',(int) Request::input('child'))->first()->name }}</span></a>
                    </li>
                @endif
            @elseif(\Request::route()->getName() == 'product.tags')
                <li><i class="fa fa-arrow"></i><a
                            href="{{ route('product.index') }}"><span>{{ trans('general.index') }}</span></a>
                </li>
                <li><i class="fa fa-arrow"></i><a
                            href="{{ route('product.tags',Request::segment(3)) }}"><span>{{ trans('general.tags') }}</span></a>
                </li>
                <li><i class="fa fa-arrow"></i><a href="#"><span>{{ Request::segment(3) }}</span></a></li>
            @elseif(Request::route()->getName() == 'product.index')

            @endif
        @endif
    </ul>
</div><!-- shop head end -->