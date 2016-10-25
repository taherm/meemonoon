<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8"/>
    <title>MeemOnoon | Dashboard</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    @section('styles')
        @include('backend.partials.styles')
    @show
</head>
<!-- END HEAD -->

<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">


@include('backend.layouts.header')


<div class="clearfix"></div>


<div class="page-container">

    @include('backend.layouts._sidebar')

    <div class="page-content-wrapper">

        <div class="page-content">

            @include('backend.partials._page_bar')

            @include('backend.partials._page_title')

            @include('backend.partials._notification')

            @include('backend.layouts._body')

        </div>

        @section('quick-sidebar')
            @include('backend.partials._quick_sidebar')
        @show
    </div>

</div>

@include('backend.layouts.footer')


@section('scripts')

    @include('backend.partials.scripts')
    @include('backend.partials._scripts_backend')

@show
</body>

</html>