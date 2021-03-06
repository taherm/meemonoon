@extends('backend.layouts.master')

@section('content')
        {{ Form::model($subcategory,['route' => ['backend.subcategory.update',$subcategory->id],'method'=>'PATCH','files' => true,'class' => 'form-horizontal']) }}
    <div class="form-body">
        <input type="hidden" name="parent_id" value="{{ $subcategory->parent_id }}">
        <div class="form-group">
            <label class="col-md-2 control-label">name en:
                <span class="required"> * </span>
            </label>
            <div class="col-md-3">
                {!! Form::text('name_en', (isset($subcategory) ? $subcategory->name_en : old('name_en')) ,['class' => 'form-control','required']) !!}
            </div>

            <label class="col-md-2 control-label">name ar:
                <span class="required"> * </span>
            </label>
            <div class="col-md-3">
                {!! Form::text('name_ar', (isset($subcategory) ? $subcategory->name_ar : old('name_ar')) ,['class' => 'form-control','required']) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-3 pull-right">
                <img src="{{ asset('img/uploads/large/'.$subcategory->image) }}" alt="" class="img-responsive">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-3">
                <label class="label" for="image" style="color: black;"> image
                    <small>['1150', '290']</small>
                </label>
                {!! Form::file('image',['class' => 'form-control' ]) !!}
            </div>
        </div>
        <div class="form-group hidden">
            <label class="col-md-2 control-label">{{ trans('general.description') }}:
                <span class="required"> * </span>
            </label>
            <div class="col-md-3">
                {!! Form::text('description_en', (isset($subcategory) ? $subcategory->description_en : old('description_en')) ,['class' => 'form-control']) !!}
            </div>

            <label class="col-md-2 control-label">{{ trans('general.description') }}:
                <span class="required"> * </span>
            </label>
            <div class="col-md-3">
                {!! Form::text('description_ar', (isset($subcategory) ? $subcategory->description_ar : old('description_en')) ,['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-3">
                {!! Form::submit('submit',['class' => 'btn btn-primary pull-right']) !!}
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection