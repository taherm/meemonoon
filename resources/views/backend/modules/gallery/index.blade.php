@extends('backend.layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <a href="{{ route('backend.product.index') }}" class="btn btn-primary btn-large col-lg-2 pull-right">back to products</a>
        </div>
        @if(isset($gallery))
            @foreach($gallery->images as $image)
                <div class="col-lg-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            {{ Form::open(['route' => ['backend.gallery.image.delete','image_id' =>$image->id]])  }}
                            <button type="submit" class="btn btn-outline btn-circle pink btn-xs"><i
                                        class="fa fa-remove"></i>
                                Delete Image
                            </button>
                            {{ Form::close() }}
                        </div>
                        <div class="panel-body">
                            <img class="img-thumbnail center"
                                 src={{ asset('img/uploads/thumbnail/'.$image->thumb_url) }} />
                            <div class="caption">{{ $image->caption }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    {{ Form::open(['route'=>['backend.gallery.update',$gallery->id],'method'=>'PATCH','files' => 'true','class' => 'form-horizontal','enctype' =>"multipart/form-data"]) }}
    {!! Form::hidden('gallery_id',$gallery->id) !!}
    {!! Form::hidden('product_id',$product->id) !!}
    {{ Form::hidden('MAX_FILE_SIZE','20971520') }}
    <div class="form-group">
        <div class="col-lg-2">
            <label class="mt-checkbox"> add Image</label>
            <div class="form-control">
                <input name="image" type="file" required/>
            </div>
        </div>
        <div class="col-lg-4">
            <label class="mt-checkbox"> caption arabic</label>
            {!! Form::text('caption_ar',null,['class' =>'form-control','required']) !!}
        </div>
        <div class="col-lg-4">
            <label class="mt-checkbox"> caption english</label>
            {!! Form::text('caption_en',null,['class' =>'form-control','required']) !!}
        </div>
    </div>

    {{ Form::submit('submit',['class' => 'btn btn-outline btn-circle btn-success']) }}
    <a class="btn btn-outline btn-danger btn-circle" href="{{ route('backend.product.index') }}">cancel</a>
    {{ Form::close() }}
    <div class="col-lg-12">
        @foreach($gallery->images->chunk(4) as $set)
            @foreach($set as $i)
                <div class="col-sm-3">
                    <img class="img-responsive img-thumbnail" style="max-height: 120px;"
                         src="{{ asset('storage/uploads/images/thumbnail/'.$i->image) }}" alt="">
                    <form method="post" action="{{ route('backend.image.destroy',$i->id) }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="delete"/>
                        <button type="submit" class="btn btn-circle btn-sm red">
                            <i class="fa fa-fw fa-xs fa-remove"></i>
                        </button>
                    </form>
                </div>
            @endforeach
        @endforeach
    </div>
@endsection