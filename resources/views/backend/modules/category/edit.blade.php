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
    {{ Form::model($category,['route' => ['backend.category.update',$category->id],'method'=>'PATCH','files' => 'true','class' => 'form-horizontal']) }}
    <div class="form-body">
        <div class="form-group">
            <label class="col-md-2 control-label"> name en:
                <span class="required"> * </span>
            </label>
            <div class="col-md-3">
                {!! Form::text('name_en', (isset($category) ? $category->name_en : old('name_en')) ,['class' => 'form-control','required']) !!}
            </div>

            <label class="col-md-2 control-label"> name ar:
                <span class="required"> * </span>
            </label>
            <div class="col-md-3">
                {!! Form::text('name_ar', (isset($category) ? $category->name_ar : old('name_ar')) ,['class' => 'form-control','required']) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label"> Category Order :
                <span class="required"> * </span>
            </label>
            <div class="col-md-3">
                {!! Form::text('order', (isset($category) ? $category->order : old('order')) ,['class' => 'form-control','required']) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-3 pull-right">
                <img src="{{ asset('img/uploads/large/'.$category->image) }}" alt="" class="img-responsive">
            </div>
        </div>
        <div class="form-group hidden">
            <label class="col-md-2 control-label">{{ trans('general.description') }}:
                <span class="required"> * </span>
            </label>
            <div class="col-md-3">
                {!! Form::hidden('description_en', (isset($category) ? $category->description_en : old('description_en')) ,['class' => 'form-control','required']) !!}
            </div>

            <label class="col-md-2 control-label">{{ trans('general.description') }}:
                <span class="required"> * </span>
            </label>
            <div class="col-md-3">
                {!! Form::hidden('description_ar', (isset($category) ? $category->description_ar : old('description_ar')) ,['class' => 'form-control','required']) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-3">
                <label class="label" for="image" style="color: black;"> image
                    <small>['1150', '290']</small>
                </label>
                {!! Form::file('image',['class' => 'form-control' ]) !!}
            </div>
            <div class="col-md-1">
                <label for="limited">limited</label>
                {{ Form::radio('limited',1, $category->limited , ['class' => 'form-control']) }}
            </div>
            <div class="col-md-1">
                <label for="limited"><small>not limited</small></label>
                {{ Form::radio('limited',0, $category->limited , ['class' => 'form-control']) }}
            </div>
            <div class="col-lg-5">
                <p>Limited : when a category is limited , any order shipment that includes products related to such
                    category will be limited only with 2 products (perfume category)</p>
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