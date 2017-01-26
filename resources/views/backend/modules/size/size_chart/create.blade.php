@extends('backend.layouts.master')

@section('content')
    {{ Form::open(['route' => 'backend.chart.store','method'=>'POST','files' => true,'class'=>'form-horizontal']) }}
    <div class="form-body">
        <div class="form-group">
            <div class="col-lg-4">
                <label class="control-label">name :
                    <span class="required"> * </span>
                </label>
                {!! Form::text('description_en', old('description_en') ,['class' => 'form-control','required']) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-4">
                <label class="label" for="size_chart_image" style="color: black;"> size chart image (best fit 457*604) </label>
                {!! Form::file('image',['class' => 'form-control','required']) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-3 col-lg-push-1 pull-right">
                {{ Form::submit('submit',['class'=>'btn btn-outline btn-circle btn-primary']) }}
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection