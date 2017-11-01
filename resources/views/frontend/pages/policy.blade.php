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
                            <li>Policy</li>
                        </ul>
                    </div>

                    <!--about-body-area start-->
                    <div class="row">
                        <!-- About info -->
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 col-md-offset-2">
                            <div class="contact-info">
                                <h3>Return Policy</h3>
                                <span style="display: none;">{{$counter = 0}}</span>
                            @foreach($QAs as $qa)
                                <!-- Panel Default -->
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="check-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#q{{$counter}}">{{$qa->question}}</a>
                                            </h4>
                                        </div>
                                        <div id="q{{$counter++}}" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <p>{!! $qa->answer !!}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Panel Default -->
                                @endforeach
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
