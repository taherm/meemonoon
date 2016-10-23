@extends('backend.layouts.master')

@section('content')
    {{ Form::open(['route' => 'backend.size.store','method'=>'POST','class'=>'form-horizontal']) }}
    <div class="form-body">
        <div class="form-group">
            <label class="col-md-2 control-label">Size name:
                <span class="required"> * </span>
            </label>
            <div class="col-md-5">
                {!! Form::text('size', old('size') ,['class' => 'form-control','required']) !!}
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