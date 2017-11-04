@extends('frontend.layouts.master')

@section('body')

    <!-- Contact page body start -->
    <div class="contact-page-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="shop-head furniture-head">
                        <ul class="shop-head-menu ">
                            <li><i class="fa fa-home"></i><a class="home" href="#"><span>{{ trans('general.home') }}</span></a></li>
                            <li>{{ trans('general.contactus') }}</li>
                        </ul>
                    </div>
                    <!--maps-area start-->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <!-- Map area -->
                            <div class="map-area">
                                <div id="googleMap" style="width:100%;height:410px;">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6955.856739054493!2d48.084835662426734!3d29.343094958730017!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3fcf762fcd8ae1c5%3A0x3d38baeb187cf5f1!2sSymphony+Style+Hotel+Kuwait!5e0!3m2!1sen!2s!4v1509296654509" width="1150" height="410" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div>
                            </div><!-- End Map area -->
                        </div>
                    </div>
                    <!--maps-area end-->

                    <!--contact-body-area start-->
                    <div class="row">
                        <!-- contact info -->
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="contact-info">
                                <h3>Contact info</h3>
                                <ul>
                                    <li>
                                        <i class="fa fa-map-marker"></i> <strong>Address</strong>
                                        {{$contactusInfo->address}}
                                    </li>
                                    <li>
                                        <i class="fa fa-envelope"></i> <strong>Phone</strong>
                                        {{$contactusInfo->phone}}
                                    </li>
                                    <li>
                                        <i class="fa fa-mobile"></i> <strong>Email</strong>
                                        <a href="mailto:{{$contactusInfo->email}}" target="_top">{{$contactusInfo->email}}</a>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- End contact info -->
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="contact-form">
                                <h3><i class="fa fa-envelope-o"></i> Leave a Message</h3>
                                <div class="row">
                                    {!! Form::open(['route' => 'contact', 'method' => 'POST','class'=>'']) !!}
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            {!! Form::text('name', null, ['placeholder'=>'Name (required)']) !!}
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            {!! Form::text('email', null, ['placeholder'=>'Email (required)']) !!}
                                        </div>
                                        <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
                                            {!! Form::text('title', null, ['placeholder'=>'Subject (required)']) !!}
                                        </div>
                                        <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
                                            {!! Form::select('inquiry_type', array('no' => 'Select Your Inquiry Type', 'how_to_shop' => 'How to shop?', 'product_information' => 'Product Information', 'delivery' => 'Delivery', 'refund' => 'Refund')) !!}
                                        </div>
                                        <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
                                            {!! Form::textarea('body', null, ['id'=>'message','cols'=>30,'rows'=>10,'placeholder'=>'Message (required)']) !!}
                                            <input type="submit" value="Submit Form" />
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--contact-body-area end-->
                </div>
            </div>
        </div>
    </div>
    <!-- Contact page body end -->

@endsection

@section('customScripts')
    @parent
    <!-- Google Map js -->
    {{--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBuU_0_uLMnFM-2oWod_fzC0atPZj7dHlU"></script>--}}
    {{--<script>--}}
        {{--function initialize() {--}}
            {{--var mapOptions = {--}}
                {{--zoom: 15,--}}
                {{--scrollwheel: false,--}}
                {{--center: new google.maps.LatLng(29.3730493,47.9904677)--}}
            {{--};--}}

            {{--var map = new google.maps.Map(document.getElementById('googleMap'),--}}
                    {{--mapOptions);--}}


            {{--var marker = new google.maps.Marker({--}}
                {{--position: map.getCenter(),--}}
                {{--animation:google.maps.Animation.BOUNCE,--}}
                {{--icon: '/img/logo/map-marker.png',--}}
                {{--map: map--}}
            {{--});--}}

        {{--}--}}

        {{--google.maps.event.addDomListener(window, 'load', initialize);--}}
    {{--</script>--}}

@endsection
