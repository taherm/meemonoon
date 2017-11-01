@extends('frontend.layouts.master')

@section('body')

    <!-- About page body start -->
    <div class="contact-page-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="shop-head furniture-head">
                        <ul class="shop-head-menu ">
                            <li><i class="fa fa-home"></i><a class="home" href="#"><span>Home</span></a></li>
                            <li>{{$termsData->title}}</li>
                        </ul>
                    </div>

                    <!--about-body-area start-->
                    <div class="row">
                        <!-- About info -->
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 col-md-offset-2">
                            <div class="contact-info">
                                <h3>{{$termsData->title}}</h3>
                                <p>{!! $termsData->body !!}</p>
                            </div>
                        </div><!-- End About info -->

                    </div>
                    <!--about-body-area end-->
                </div>
            </div>
        </div>
    </div>
    <!-- About page body end -->

@endsection
