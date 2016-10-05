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
    Terms & Conditions
@stop
@section('panel-title')
    terms.index
@stop
@section('content')

    {{ Form::open(['route' => 'backend.pages.terms.update','method'=>'POST','class'=>'form-horizontal']) }}

    <div class="form-body">
        <div class="form-group">
            <label class="col-md-2 control-label">{{ trans('general.title_en') }}:
                <span class="required"> * </span>
            </label>
            <div class="col-md-3">
                {!! Form::text('title_en', (isset($termsData) ? $termsData->title_en : old('title_en')) ,['class' => 'form-control','required']) !!}
            </div>
            <label class="col-md-2 control-label">{{ trans('general.title_ar') }}:
                <span class="required"> * </span>
            </label>
            <div class="col-md-3">
                {!! Form::text('title_ar', (isset($termsData) ? $termsData->title_ar : old('title_ar')) ,['class' => 'form-control','required']) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">{{ trans('general.body_en') }}:
                <span class="required"> * </span>
            </label>
            <div class="col-md-10">
                {!! Form::textarea('body_en', (isset($termsData) ? $termsData->body_en : old('body_en')) ,['class' => 'form-control','rows' => 20, 'cols' => 100,'required']) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">{{ trans('general.body_ar') }}:
                <span class="required"> * </span>
            </label>
            <div class="col-md-10">
                {!! Form::textarea('body_ar', (isset($termsData) ? $termsData->body_ar : old('body_ar')) ,['class' => 'form-control','rows' => 20, 'cols' => 40,'required']) !!}
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