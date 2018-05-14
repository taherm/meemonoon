@extends('backend.layouts.master')

@section('content')
    <div class="row">
        @if(!empty($slides))
            @foreach($slides as $slide)
                <div class="col-lg-4" style="max-height: 200px;margin-top: 15px;">
                    <div class="panel panel-default" style="height:200px; max-height : 200px;">
                        <div class="panel-heading">
                            {{ Form::open(['route' => ['backend.slider.destroy', $slide->id], 'method' => 'DELETE'])  }}
                            <button type="submit" class="btn btn-outline btn-circle pink btn-xs"><i
                                        class="fa fa-remove"></i>
                                Delete Slide
                            </button>
                            {{--<span style="float: right;">{{$slide->order}}</span>--}}
                            {{ Form::close() }}
                        </div>
                        <div class="panel-body">
                            <img class="img-responsive img-thumbnail center" src="{{ asset('img/uploads/medium/'.$slide->image_path) }}" style="max-height:150px;max-width: 150px;"/>
                            <br />
                            <div class="caption">
                                {{--{{ $slide->caption_en }} <br />--}}
                                {{ $slide->url }}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <br /><br />
    {{ Form::open(['route'=>['backend.slider.store'],'method'=>'POST','files' => 'true','class' => 'form-horizontal','enctype' =>"multipart/form-data"]) }}

    {{ Form::hidden('MAX_FILE_SIZE','20971520') }}
    <div class="form-group" style="padding-top: 20px;">
        <div class="col-lg-12">
            <div class="alert alert-info">
                <strong>Image Size Must be 1920X759.</strong></br>
                <strong>URL must has the full path (with http://).</strong></br>
            </div>
        </div>
        <div class="col-lg-4">
            <label class="mt-checkbox"> Add Slide</label>
            <div class="form-control">
                <input name="image" type="file" required/>
            </div>
        </div>
        <div class="col-lg-2">
            <label class="mt-checkbox"> URL </label>
            {!! Form::text('url',null,['class' =>'form-control','required']) !!}
        </div>

        <div class="col-lg-2">
            <label class="mt-checkbox"> order </label>
            {!! Form::text('order',null,['class' =>'form-control','required']) !!}
        </div>
        <div class="col-lg-4">
            <label class="mt-checkbox"> caption en </label>
            {!! Form::text('caption_en','default',['class' =>'form-control','required']) !!}
        </div>
        <div class="col-lg-4">
            <label class="mt-checkbox"> caption ar </label>
            {!! Form::text('caption_ar','default',['class' =>'form-control','required']) !!}
        </div>
    </div>

    {{ Form::submit('submit',['class' => 'btn btn-outline btn-circle btn-success']) }}
    <a class="btn btn-outline btn-danger btn-circle" href="{{ route('backend.slider.index') }}">cancel</a>
    {{ Form::close() }}
@endsection