<div class="form-group">
    <h4>Categories</h4>
    <hr>
    <label class="col-md-2 control-label">Choose Categories:
        <span class="required"> * </span>
    </label>
    <div class="col-md-10">
        <div class="form-control height-auto">
            <div class="scroller" style="min-height:300px;"
                 data-always-visible="1">
                @foreach($categories as $category)
                    <div class="col-lg-4">
                        <ul class="list-unstyled ">
                            @if($category->parent_id == 0)
                                <li>
                                    <label>
                                        {!! Form::radio('parent_id',$category->id, (in_array($category->id,$categoriesList,true)) ? true : false) !!}
                                        {{ $category->name }}
                                    </label>
                                    @if(count($category->children) > 0)
                                        <ul class="list-unstyled">
                                            @foreach($category->children as $child)
                                                <li>
                                                    <label>
                                                        {!! Form::checkbox('categories[]',$child->id,(in_array($child->id,$categoriesList,true)) ? true : false) !!}
                                                        {{ $child->name }}
                                                        @if(count($child->children) > 0)
                                                            <ul class="list-unstyled">
                                                                @foreach($child->children as $subChild)
                                                                    <li style="margin-left: 10px">
                                                                        <label>
                                                                            {!! Form::checkbox('categories[]',$subChild->id,(in_array($subChild->id,$categoriesList,true)) ? true : false) !!}
                                                                            {{ $subChild->name }}
                                                                        </label>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endif
                        </ul>
                    </div>
                    @if(in_array($loop->index,[2,5,8,12]))
                    <div class="col-lg-12">
                        <hr>
                    </div>
                    @endif
                @endforeach

            </div>
        </div>
        <span class="help-block">* at least one category must be choosen</span>
    </div>
</div>