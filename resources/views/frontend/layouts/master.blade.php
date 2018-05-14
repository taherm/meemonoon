<!doctype html>
<html class="no-js" lang="en" dir="{{ app()->isLocale('ar') ? 'rtl' : 'ltr' }}"
      xmlns="http://www.w3.org/1999/xhtml"
      xmlns:fb="http://ogp.me/ns/fb#"
>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="{{ config('app.name') }}" content="E-commerce">
    <meta name="keywords" content="{{ trans('general.app_keywords') }}"/>
    <meta name="description" content="{{ trans('general.app_description') }}">
    <meta name="author" content="{{ trans('general.app_author') }}">
    <meta name="country" content="kuwait">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('img/icon.ico') }}" type="image/x-icon"/>
    @section('head')
        <title>{{ config('app.name') }}</title>
    @show
    @section('styles')
        @include('frontend.partials.styles')
    @show
</head>

<body>
@include('frontend.modules.product.partials.quick-view')
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

@include('frontend.layouts.header')

@include('backend.partials._notification')

@section('content')
    @yield('body')
@show

<!--footer start-->
@include('frontend.layouts.footer')
<!--footer end-->

<!--script for this page-->
@section('customScripts')
    @include('frontend.partials.scripts')
@show
</body>
</html>