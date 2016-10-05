@extends('backend.layouts.master')

@section('page-title')
    <h3 class="page-title"> Index Form from the page title
        <small>form layouts</small>
    </h3>
@stop

@section('actions')
    @include('backend.partials._actions')
@stop
@section('page-title')
    About Us
@stop
@section('panel-title')
    about.index
@stop
@section('content')

    {{ Form::open(['route' => 'backend.pages.about.update','method'=>'POST','class'=>'form-horizontal']) }}

    <div class="form-body">
        <div class="form-group">
            <label class="col-md-2 control-label">{{ trans('general.title_en') }}:
                <span class="required"> * </span>
            </label>
            <div class="col-md-3">
                {!! Form::text('title_en', (isset($aboutData) ? $aboutData->title_en : old('title_en')) ,['class' => 'form-control','required']) !!}
            </div>
            <label class="col-md-2 control-label">{{ trans('general.title_ar') }}:
                <span class="required"> * </span>
            </label>
            <div class="col-md-3">
                {!! Form::text('title_ar', (isset($aboutData) ? $aboutData->title_ar : old('title_ar')) ,['class' => 'form-control','required']) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">{{ trans('general.body_en') }}:
                <span class="required"> * </span>
            </label>
            <div class="col-md-10">
                {!! Form::textarea('body_en', (isset($aboutData) ? $aboutData->body_en : old('body_en')) ,['class' => 'form-control','rows' => 20, 'cols' => 100,'required']) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">{{ trans('general.body_ar') }}:
                <span class="required"> * </span>
            </label>
            <div class="col-md-10">
                {!! Form::textarea('body_ar', (isset($aboutData) ? $aboutData->body_ar : old('body_ar')) ,['class' => 'form-control','rows' => 20, 'cols' => 40,'required']) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-3">
                {!! Form::submit('Save',['class' => 'btn btn-primary pull-right']) !!}
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection