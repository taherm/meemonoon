@extends('backend.layouts.master')

@section('content')
    {{ Form::open(['url' => ['backend/newsletter/campaign'],'method'=>'POST','files' => 'true','class' => 'form-horizontal']) }}
    <div class="form-body">
        <div class="form-group">
            <label class="col-md-2 control-label"> title:
                <span class="required"> * </span>
            </label>
            <div class="col-md-5">
                {!! Form::text('title', old('title') ,['class' => 'form-control','required']) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Campaign Content:
                <span class="required"> * </span>
            </label>
            <div class="col-md-10">
                {!! Form::textarea('body',old('body'),['class' => 'form-control']) !!}
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