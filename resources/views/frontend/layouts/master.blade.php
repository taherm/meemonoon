<!doctype html>
<html class="no-js" lang="en" dir="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>MeemOnoon</title>
    <meta name="IdeasOwners" content="Web Development">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/img/icons/favicon.ico">

    @section('styles')
        @include('frontend.partials.styles')
    @show
</head>

<body>
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