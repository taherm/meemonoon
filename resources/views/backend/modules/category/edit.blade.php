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
    {{ Form::hidden('parent_id',0) }}
    <div class="form-body">
        <div class="form-group">
            <div class="col-lg-4">
                <label class="control-label" for="name_ar">{{ trans('general.name_ar') }}:
                    <span class="required"> * </span>
                </label>
                {!! Form::text('name_ar', (isset($category) ? $category->name_ar : old('name_ar')) ,['class' => 'form-control','required']) !!}
            </div>
            <div class="col-lg-4">
                <label class="control-label" for="name_en">{{ trans('general.name_en') }}:
                    <span class="required"> * </span>
                </label>
                {!! Form::text('name_en', (isset($category) ? $category->name_en : old('name')) ,['class' => 'form-control','required']) !!}
            </div>
            <div class="col-lg-2">
                <label class="control-label" for="limited">{{ trans('general.limited') }}:
                    <span class="required"> *(limited for a cart only 2 items allowed) </span>
                </label>
                {!! Form::radio('limited', 1, (isset($category) ? $category->limited : 1) ,['class' => 'form-control']) !!}</br>
                <span class="required"> *(no limit) </span>
                {!! Form::radio('limited', 0, (isset($category) ? $category->limited : 0) ,['class' => 'form-control']) !!}
            </div>
            <div class="col-lg-2">
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-6">
                <label class="control-label">{{ trans('general.description_ar') }}:
                    <span class="required"> * </span>
                </label>
                {!! Form::text('description_ar', (isset($category) ? $category->description_ar : old('description_ar')) ,['class' => 'form-control','required']) !!}
            </div>
            <div class="col-lg-6">
                <label class="control-label">{{ trans('general.description_en') }}:
                    <span class="required"> * </span>
                </label>
                {!! Form::text('description_en', (isset($category) ? $category->description_en : old('description_en')) ,['class' => 'form-control','required']) !!}
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