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
@if (Session::get('locale') == 'ar')
    <link rel="stylesheet" href="{{ asset('css/rtl.css') }}">
    <style type="text/css">
        @import url('http://fonts.googleapis.com/earlyaccess/droidarabickufi.css');

        body, div, a, span, table, p, form, input, h1, h2, h3, h4 {
            font-family: 'Droid Arabic Kufi', sans-serif !important;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/custom-arabic.css') }}">
@else
    <link rel="stylesheet" href="{{ asset('css/custom-english.css') }}">
@endif
