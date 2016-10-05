<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>MeemOnoon</title>

    @section('style')
        <link rel="stylesheet" href="{{asset('meem/frontend/login/css/reset.css')}}">
        <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
        <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
        <link rel="stylesheet" href="{{asset('meem/frontend/login/css/style.css')}}">
    @show
</head>

<body>
<div class="pen-title">
    <a href="{{URL('/')}}"><img src="{{asset('meem/frontend/img/logo/meem-logo.jpg')}}" alt="" style="width: 10%;"></a>
</div>

@section('content')

@show

@section('script')
    <script src="{{asset('meem/frontend/js/vendor/jquery-1.12.0.min.js')}}"></script>
    <script src="{{asset('meem/frontend/login/js/index.js')}}"></script>
@show
</body>
</html>
