@extends('backend.layouts.master')

@section('content')
    <div class="col-lg-6">
        <img src="{{ $sizeChart->images->first()->large_url }}" alt="" class="img-responsive">
    </div>
    {{ Form::open(['route' => ['backend.chart.update',$sizeChart->id],'method'=>'PATCH','files' => true,'class'=>'form-horizontal']) }}
    <div class="form-body">
        <div class="form-group">
            <div class="col-lg-4">
                <label class="control-label">name_en:
                    <span class="required"> * </span>
                </label>
                {!! Form::text('description_en', $sizeChart->description_en,['class' => 'form-control','required']) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-4">
                <label class="label" for="size_chart_image" style="color: black;"> size chart image</label>
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