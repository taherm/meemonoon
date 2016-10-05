@extends('frontend.layouts.master')

@section('body')

    <!-- Contact page body start -->
    <div class="contact-page-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="shop-head furniture-head">
                        <ul class="shop-head-menu ">
                            <li><i class="fa fa-home"></i><a class="home" href="#"><span>Home</span></a></li>
                            <li>Contact Us</li>
                        </ul>
                    </div>
                    <!--maps-area start-->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <!-- Map area -->
                            <div class="map-area">
                                <div id="googleMap" style="width:100%;height:410px;"></div>
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
                                        {{$contactData->address}}
                                    </li>
                                    <li>
                                        <i class="fa fa-envelope"></i> <strong>Phone</strong>
                                        {{$contactData->phone}}
                                    </li>
                                    <li>
                                        <i class="fa fa-mobile"></i> <strong>Email</strong>
                                        <a href="mailto:{{$contactData->email}}" target="_top">{{$contactData->email}}</a>
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
                                            {!! Form::text('subject', null, ['placeholder'=>'Subject (required)']) !!}
                                        </div>
                                        <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
                                            {!! Form::select('Inquiry Type (required)', array('no' => 'Select Your Inquiry Type', 'Payment' => 'Where\'s my stuff?', 'Order' => 'Problem with an order', 'Orders' => 'Returns and refunds', 'Other' => 'Payment issues', 'Others' => 'Change an order', 'Otherz' => 'Other')) !!}
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBuU_0_uLMnFM-2oWod_fzC0atPZj7dHlU"></script>
    <script>
        function initialize() {
            var mapOptions = {
                zoom: 15,
                scrollwheel: false,
                center: new google.maps.LatLng(23.81033, 90.41252)
            };

            var map = new google.maps.Map(document.getElementById('googleMap'),
                    mapOptions);


            var marker = new google.maps.Marker({
                position: map.getCenter(),
                animation:google.maps.Animation.BOUNCE,
                icon: '/img/logo/map-marker.png',
                map: map
            });

        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>

@endsection
