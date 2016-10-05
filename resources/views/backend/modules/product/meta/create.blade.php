@extends('backend.layouts.master')

@section('page-title')
    @include('backend.partials._product_steps',['main' => 'null','meta' => 'active','attribute' => 'null', 'product_id' =>  (request()->product_id) ? request()->product_id : null ])
@stop

@section('panel-title','ProductMeta')

@section('content')

    @include('backend.partials.forms._productMeta')

@endsection

@section('scripts')
    @parent
    <script src="http://cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({selector: 'textarea'});</script>
@endsection