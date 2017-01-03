@extends('backend.layouts.master')

@section('content')
    {{ Form::model($color,['route' => ['backend.color.update',$color->id],'method'=>'PATCH','files' => 'true','class' => 'form-horizontal']) }}
    <div class="form-body">
        <div class="form-group">
            <label class="col-md-2 control-label">name_ar:
                <span class="required"> * </span>
            </label>
            <div class="col-md-3">
                {!! Form::text('name_ar', old('name_ar') ,['class' => 'form-control','required']) !!}
            </div>
            <label class="col-md-2 control-label">name_en:
                <span class="required"> * </span>
            </label>
            <div class="col-md-3">
                {!! Form::text('name_en', old('name_en') ,['class' => 'form-control','required']) !!}
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