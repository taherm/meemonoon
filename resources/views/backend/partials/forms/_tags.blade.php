<div class="form-group">
    <h4>Tags</h4>
    <hr>
    <label class="col-md-2 control-label">Tags:
        <span class="required"> * </span>
    </label>
    <div class="col-md-10">
        <div class="form-control height-auto">
            <div class="scroller" style="height:275px;"
                 data-always-visible="1">
                @foreach($tags as $tag)
                <div class="col-lg-2">
                    <ul class="list-unstyled ">
                        <li>
                            <label>
                                {!! Form::checkbox('tags[]',$tag->slug, (in_array($tag->slug,$productTagsNameList,true)) ? true : false) !!}
                                {{ $tag->name }}
                            </label>
                        </li>
                    </ul>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>