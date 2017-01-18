@extends('backend.layouts.master')

@section('content')
    @if(isset($tag))
        {{ Form::model($tag,['route' => ['backend.tag.update',$tag->id],'method'=>'PATCH','files' => 'true','class' => 'form-horizontal']) }}
        <div class="form-body">
            <div class="form-group">
                <label class="col-md-2 control-label"> name :
                    <span class="required"> * </span>
                </label>
                <div class="col-md-3">
                    {!! Form::text('name', old('name') ,['class' => 'form-control','required']) !!}
                </div>
                <div class="form-group">
                    <div class="col-md-3">
                        {!! Form::submit('submit',['class' => 'btn btn-primary pull-right']) !!}
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
@endsection