@extends('backend.layouts.master')

@section('page-title')
    @include('backend.partials._product_steps',
    ['main' => 'active','meta' => 'null','attribute' => 'null', 'productId' => (request()->get('product_id')) ? request()->get('product_id') :  null ])
    @stop

@section('content')

    @include('backend.partials.forms._product')

@endsection
