@extends('backend.layouts.master')

{{--@section('page-title')--}}
{{--<h3 class="page-title"> Index Form from the page title--}}
{{--</h3>--}}
{{--@stop--}}

{{--@section('actions')--}}
{{--@include('backend.partials._actions')--}}
{{--@stop--}}
{{--@section('page-title')--}}
{{--Category index--}}
{{--@stop--}}

@section('content')
    {!! Form::open(['route' => 'backend.category.store','method'=>'POST','files' => 'true', 'class'=>'form-horizontal']) !!}
    <div class="form-body">
        <div class="form-group">
            <label class="col-md-2 control-label">name arabic :
                <span class="required"> * </span>
            </label>
            <div class="col-md-3">
                {!! Form::text('name_ar', null ,['class' => 'form-control','required']) !!}
            </div>

            <label class="col-md-2 control-label">name english :
                <span class="required"> * </span>
            </label>
            <div class="col-md-3">
                {!! Form::text('name_en', null ,['class' => 'form-control','required']) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label"> Category Order :
                <span class="required"> * </span>
            </label>
            <div class="col-md-3">
                {!! Form::text('order', null ,['class' => 'form-control','required']) !!}
            </div>
        </div>
        <div class="form-group hidden">
            <label class="col-md-2 control-label">description english :
                <span class="required">  </span>
            </label>
            <div class="col-md-3">
                {!! Form::hidden('description_en', 'english descirption' ,['class' => 'form-control']) !!}
            </div>
            <label class="col-md-2 control-label">description arabic :
                <span class="required">  </span>
            </label>
            <div class="col-md-3">
                {!! Form::hidden('description_ar', 'arabic description'  ,['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-3">
                <label class="label" for="image" style="color: black;"> image*
                    <small>['1150', '290']</small>
                </label>
                {!! Form::file('image',['class' => 'form-control','required' => true ]) !!}
            </div>
            <div class="col-md-1">
                <label for="limited">limited*</label>
                {{ Form::radio('limited',1, false , ['class' => 'form-control']) }}
            </div>
            <div class="col-md-1">
                <label for="limited">
                    <small>not limited*</small>
                </label>
                {{ Form::radio('limited',0, true , ['class' => 'form-control']) }}
            </div>
            <div class="col-lg-5">
                <p>Limited : when a category is limited , any order shipment that includes products related to such
                    category will be limited only with 2 products (perfume category)</p>
            </div>
        </div>


        <div class="form-group">
            <div class="col-md-2 col-lg-push-8">
                {!! Form::submit('submit',['class' => 'btn btn-primary pull-right']) !!}
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection