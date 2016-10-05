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
    {{$title}}
@stop
@section('panel-title')
    {{$title}}.index
@stop
@section('content')

    @if(isset($type))
        @if($type == 1)
            {{ Form::open(['route' => 'backend.pages.faqs.store','method'=>'POST','class'=>'form-horizontal']) }}
        @elseif($type == 2)
            {{ Form::open(['route' => 'backend.pages.returnPolicy.store','method'=>'POST','class'=>'form-horizontal']) }}
        @else
            {{ Form::open(['route' => 'backend.pages.shippingOrders.store','method'=>'POST','class'=>'form-horizontal']) }}
        @endif
    @endif

    @if(isset($qa->page))
        @if($qa->page == 1)
            {{ Form::open(['route' => ['backend.pages.faqs.update',$qa->id],'method'=>'POST','class'=>'form-horizontal']) }}
        @elseif($qa->page == 2)
            {{ Form::open(['route' => ['backend.pages.returnPolicy.update',$qa->id],'method'=>'POST','class'=>'form-horizontal']) }}
        @else
            {{ Form::open(['route' => ['backend.pages.shippingOrders.update',$qa->id],'method'=>'POST','class'=>'form-horizontal']) }}
        @endif
    @endif


    <div class="form-body">
        <div class="form-group">
            <label class="col-md-2 control-label">{{ trans('general.question_en') }}:
                <span class="required"> * </span>
            </label>
            <div class="col-md-3">
                {!! Form::text('question_en', (isset($qa) ? $qa->question_en : old('question_en')) ,['class' => 'form-control','required']) !!}
            </div>
            <label class="col-md-2 control-label">{{ trans('general.question_ar') }}:
                <span class="required"> * </span>
            </label>
            <div class="col-md-3">
                {!! Form::text('question_ar', (isset($qa) ? $qa->question_ar : old('question_ar')) ,['class' => 'form-control','required']) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">{{ trans('general.answer_en') }}:
                <span class="required"> * </span>
            </label>
            <div class="col-md-3">
                {!! Form::text('answer_en', (isset($qa) ? $qa->answer_en : old('answer_en')) ,['class' => 'form-control','required']) !!}
            </div>
            <label class="col-md-2 control-label">{{ trans('general.answer_ar') }}:
                <span class="required"> * </span>
            </label>
            <div class="col-md-3">
                {!! Form::text('answer_ar', (isset($qa) ? $qa->answer_ar : old('answer_ar')) ,['class' => 'form-control','required']) !!}
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