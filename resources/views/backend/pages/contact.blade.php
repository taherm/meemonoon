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
    Contact Us
@stop
@section('panel-title')
    Contact.index
@stop
@section('content')

    {{ Form::open(['route' => 'backend.pages.contact.update','method'=>'POST','class'=>'form-horizontal']) }}

    <div class="form-body">
        <div class="form-group">
            <label class="col-md-2 control-label">{{ trans('general.address_en') }}:
                <span class="required"> * </span>
            </label>
            <div class="col-md-3">
                {!! Form::text('address_en', (isset($contactData) ? $contactData->address_en : old('address_en')) ,['class' => 'form-control','required']) !!}
            </div>
            <label class="col-md-2 control-label">{{ trans('general.address_ar') }}:
                <span class="required"> * </span>
            </label>
            <div class="col-md-3">
                {!! Form::text('address_ar', (isset($contactData) ? $contactData->address_ar : old('address_ar')) ,['class' => 'form-control','required']) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">{{ trans('general.phone') }}:
                <span class="required"> * </span>
            </label>
            <div class="col-md-3">
                {!! Form::text('phone', (isset($contactData) ? $contactData->phone : old('phone')) ,['class' => 'form-control','required']) !!}
            </div>
            <label class="col-md-2 control-label">{{ trans('general.email') }}:
                <span class="required"> * </span>
            </label>
            <div class="col-md-3">
                {!! Form::text('email', (isset($contactData) ? $contactData->email : old('email')) ,['class' => 'form-control','required']) !!}
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