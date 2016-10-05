@extends('backend.layouts.master')

@section('content')
    @if(isset($subcategory))
        {{ Form::model($subcategory,['route' => ['backend.subcategory.update',$subcategory->id],'method'=>'PATCH','files' => 'true','class' => 'form-horizontal']) }}
    @else
        {{ Form::open(['route' => 'backend.subcategory.store','method'=>'POST','class'=>'form-horizontal']) }}
    @endif
    <div class="form-body">
        <div class="form-group">
            <label class="col-md-2 control-label">{{ trans('general.name') }}:
                <span class="required"> * </span>
            </label>
            <div class="col-md-3">
                {!! Form::text('name', (isset($subcategory) ? $subcategory->name_en : old('name')) ,['class' => 'form-control','required']) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">{{ trans('general.parentCategory') }}:
                <span class="required"> * </span>
            </label>
            <div class="col-md-3">
                {!! Form::select('parentCategory', $parentCategories , (isset($subcategory->parent) ? $subcategory->parent['id'] : old('parentCategory')) ,['class' => 'form-control','required']) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">{{ trans('general.description') }}:
                <span class="required"> * </span>
            </label>
            <div class="col-md-3">
                {!! Form::text('description', (isset($subcategory) ? $subcategory->description_en : old('description')) ,['class' => 'form-control','required']) !!}
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