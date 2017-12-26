@extends('backend.layouts.master')

@section('content')
    {{ Form::open(['route' => 'backend.tag.store','method'=>'POST','class'=>'form-horizontal']) }}
    <div class="form-body">
        <div class="form-group">
            <div class="col-md-4">
            <label class="control-label">name:
                <span class="required"> * </span>
            </label>
                {!! Form::text('name', null ,['class' => 'form-control','required']) !!}
            </div>
            {{--<div class="col-md-4">--}}
            {{--<label class="control-label">name en:--}}
                {{--<span class="required"> * </span>--}}
            {{--</label>--}}
                {{--{!! Form::text('name_en', null ,['class' => 'form-control','required']) !!}--}}
            {{--</div>--}}
        </div>
        <div class="form-group">
            <div class="col-md-12">
                {!! Form::submit('submit',['class' => 'btn btn-primary pull-right']) !!}
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection