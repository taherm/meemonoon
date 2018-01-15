@extends('backend.layouts.master')

@section('page-title')
    <h3 class="page-title"> Index Form from the page title
        <small>form layouts</small>
    </h3>
@stop



@section('content')

<form class="form-horizontal" role="form" method="POST" action="{{ route('backend.user.update',$element->id) }}">
    {!! csrf_field() !!}
    <input type="hidden" name="_method" value="put">
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">{{ trans('general.email') }} </label>

        <div class="col-md-6">
            <input type="email" class="form-control" name="email" value="{{ $element->email }}">
        </div>
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">{{ trans('general.password') }}</label>

        <div class="col-md-6">
            <input type="password" class="form-control" name="password">
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="col-xs-12 btn custom-button" >
          update
            </button>
        </div>
    </div>
</form>
    @endsection