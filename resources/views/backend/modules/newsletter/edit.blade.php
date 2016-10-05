@extends('backend.layouts.master')

@section('content')
    {{ Form::model($subscriber,['route' => ['backend.newsletter.update',$subscriber->id],'method'=>'PATCH','files' => 'true','class' => 'form-horizontal']) }}
    <div class="form-body">
        <div class="form-group">
            <label class="col-md-2 control-label"> name:
                <span class="required"> * </span>
            </label>
            <div class="col-md-5">
                {!! Form::text('name', old('name') ,['class' => 'form-control','required']) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label"> email:
                <span class="required"> * </span>
            </label>
            <div class="col-md-5">
                {!! Form::text('email', old('email') ,['class' => 'form-control','required','email']) !!}
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