@extends('backend.layouts.master')

@section('page-title')
    @include('backend.partials._product_steps',['main' => 'null','meta' => 'null','attribute' => 'active', 'product_id' =>  (request()->product_id) ? request()->product_id : null ])
@stop

@section('panel-title','ProductMeta')

@section('content')

    @include('backend.partials.forms._productAttributes')

@endsection
