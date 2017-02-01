{{--<!-- google fonts here -->--}}
{{--<link href='https://fonts.googleapis.com/css?family=Lato:400,400italic,700,900,300' rel='stylesheet'--}}
{{--type='text/css'>--}}
{{--<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,400italic,700' rel='stylesheet'--}}
{{--type='text/css'>--}}

{{--<!-- all css here -->--}}

{{--<!-- bootstrap v3.3.6 css -->--}}
{{--@if (Session::get('locale') == 'ar')--}}
{{--<link rel="stylesheet" href="{{asset('meem/frontend/css/bootstrap.min.css') }}">--}}
{{--<link rel="stylesheet" href="{{asset('meem/frontend/css/stylertl.css') }}">--}}
{{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.2.0-rc2/css/bootstrap-rtl.css">--}}
{{--<style type="text/css">--}}
{{--@import url('http://fonts.googleapis.com/earlyaccess/droidarabickufi.css');--}}

{{--body, div, a, span, table, p, form, input, h1, h2, h3, h4 {--}}
{{--font-family: 'Droid Arabic Kufi', sans-serif !important;--}}
{{--}--}}
{{--</style>--}}
{{--@else--}}
{{--<link rel="stylesheet" href="{{asset('meem/frontend/css/bootstrap.min.css') }}">--}}
{{--<!-- style css -->--}}
{{--<link rel="stylesheet" href="{{asset('meem/frontend/css/style.css')}}">--}}
{{--@endif--}}
{{--<!-- nivo slider css -->--}}
{{--<link rel="stylesheet" href="{{asset('meem/frontend/css/nivo-slider.css')}}">--}}
{{--<!-- nivo slider css -->--}}
{{--<link rel="stylesheet" href="{{asset('meem/frontend/css/jquery-ui.min.css')}}">--}}
{{--<!-- meanmenu css -->--}}
{{--<link rel="stylesheet" href="{{asset('meem/frontend/css/meanmenu.min.css')}}">--}}
{{--<!-- owl.carousel css -->--}}
{{--<link rel="stylesheet" href="{{asset('meem/frontend/css/owl.carousel.css')}}">--}}
{{--<!-- font-awesome css -->--}}
{{--<link rel="stylesheet" href="{{asset('meem/frontend/css/font-awesome.min.css')}}">--}}
{{--<!-- simpleLens css -->--}}
{{--<link rel="stylesheet" href="{{asset('meem/frontend/css/jquery.simpleGallery.css')}}">--}}
{{--<link rel="stylesheet" href="{{asset('meem/frontend/css/jquery.simpleLens.css')}}">--}}
{{--<!-- responsive css -->--}}
{{--<link rel="stylesheet" href="{{asset('meem/frontend/css/responsive.css')}}">--}}


{{--<link href='https://fonts.googleapis.com/css?family=Lato:400,400italic,700,900,300' rel='stylesheet'--}}
{{--type='text/css'>--}}
{{--<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,400italic,700' rel='stylesheet'--}}
{{--type='text/css'>--}}
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('css/frontend.css') }}">
<link rel="stylesheet" href="{{ asset('css/lightbox.css') }}">
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
<!-- Toaster css Notifications -->
<link rel="stylesheet" href="{{asset('meem/frontend/plugins/bootstrap-toastr/toastr.min.css')}}">

@if (app()->getLocale() === 'ar')
    {{--@if(str_contains('category.show',request()->route()->getName()) || str_contains('product.show',request()->route()->getName()))--}}
    {{--@if(!str_contains('home',request()->route()->getName()))--}}
    <link rel="stylesheet" href="{{ asset('css/rtl.css') }}">
    {{--@endif--}}
    <link rel="stylesheet" href="{{ asset('css/custom-arabic.css') }}">
    <style type="text/css">
        .owl-carousel, .owl-carousel .owl-wrapper {
            position: initial;

        }
        .owl-carousel .owl-item {
            float: right;

        }
        .owl-wrapper-outer{
            z-index: 99;
        }
        .owl-buttons{
            margin-top: -33%;
            position: relative;
            padding-bottom: 33%;
            z-index: 0;

        }
        .owl-prev{
            right: 98% !important;
            top: 22% !important;
        }
        .owl-next{
            right: -12% !important;
            top: 22% !important;
        }

        .single-procuct-view .simpleLens-big-image-container, .single-procuct-view .simpleLens-lens-image{
            direction: ltr;
        }
        div.simpleLens-lens-element {
            left: -112%;
        }
        .add-action ul li {
            left: 10%;
            float: left;
        }
        div.add-action ul {
            width: 115%;
        }
        #size{
            margin-bottom: 8%;
        }
    </style>
@else
    <link rel="stylesheet" href="{{ asset('css/custom-english.css') }}">
@endif

<style type="text/css">
    @font-face {
        font-family: cairo;
        src: url('{!! asset('fonts/Cairo-SemiBold.otf') !!}');
    }

    body, div, a, span, table, p, form, input, h1, h2, h3, h4 {
        font-family: 'cairo', sans-serif !important;
    }
</style>