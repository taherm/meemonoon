@extends('frontend.layouts.master')

@section('body')

    <div class="feature-product-area" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="feature-headline section-heading text-center">
                        <h2>Profile Info</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                @include('frontend.modules.profile.sidebar',['active' =>'info'])
            </div>

            <div class="col-md-8">
                @include('frontend.modules.profile.info',['user'=>$user])
            </div>

        </div>
    </div>

@endsection
