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
    Category index
@stop
@section('panel-title')
    category.index
@stop
@section('content')
    @if(isset($category))
        {{ Form::model($category,['route' => ['backend.category.update',$category->id],'method'=>'PATCH','files' => 'true','class' => 'form-horizontal']) }}
    @else
        {{ Form::open(['route' => 'backend.category.store','method'=>'POST','class'=>'form-horizontal']) }}
    @endif
    <div class="form-body">
        <div class="form-group">
            <label class="col-md-2 control-label">{{ trans('general.name.en') }}:
                <span class="required"> * </span>
            </label>
            <div class="col-md-3">
                {!! Form::text('name_en', (isset($category) ? $category->name_en : old('name_en')) ,['class' => 'form-control','required']) !!}
            </div>

            <label class="col-md-2 control-label">{{ trans('general.name.ar') }}:
                <span class="required"> * </span>
            </label>
            <div class="col-md-3">
                {!! Form::text('name_ar', (isset($category) ? $category->name_ar : old('name_ar')) ,['class' => 'form-control','required']) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">{{ trans('general.description.en') }}:
                <span class="required"> * </span>
            </label>
            <div class="col-md-3">
                {!! Form::text('description_en', (isset($category) ? $category->description_en : old('description_en')) ,['class' => 'form-control','required']) !!}
            </div>

            <label class="col-md-2 control-label">{{ trans('general.description.ar') }}:
                <span class="required"> * </span>
            </label>
            <div class="col-md-3">
                {!! Form::text('description_ar', (isset($category) ? $category->description_ar : old('description_ar')) ,['class' => 'form-control','required']) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-3">
                {!! Form::submit('submit',['class' => 'btn btn-primary pull-right']) !!}
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection