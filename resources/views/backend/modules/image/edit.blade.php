@extends('backend.layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            {{ Form::open(['route'=>['backend.image.update',$element->id],'method'=>'PATCH','files' => 'true','class' => 'form-horizontal','enctype' =>"multipart/form-data"]) }}
            <div class="form-group">
                <div class="col-lg-4">
                    <label class="mt-checkbox"> caption arabic</label>
                    {!! Form::text('caption_ar',$element->caption_ar ,['class' =>'form-control','required']) !!}
                </div>
                <div class="col-lg-4">
                    <label class="mt-checkbox"> caption english</label>
                    {!! Form::text('caption_en', $element->caption_en ,['class' =>'form-control','required']) !!}
                </div>
                <div class="col-lg-2">
                    <label class="mt-checkbox"> image order</label>
                    {!! Form::text('order',$element->order ,['class' =>'form-control','required']) !!}
                </div>
            </div>
            <input type="hidden" name="product_id" value="{{ request()->product_id }}">
            {{ Form::submit('submit',['class' => 'btn btn-outline btn-circle btn-success']) }}
            <a class="btn btn-outline btn-danger btn-circle" href="{{ route('backend.product.index') }}">cancel</a>
            {{ Form::close() }}
        </div>
    </div>
@endsection