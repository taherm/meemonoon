@extends('frontend.layouts.master')

@section('body')

    <div class="feature-product-area" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="feature-headline section-heading text-center">
                        <h2>Login to Your Account </h2>
                    </div>
                </div>
            </div>

            <div class="col-md-offset-2 col-md-8">
                <div class="panel panel-default">
                    <div class="panel-body">

                        {!! Form::open(['url' => 'login', 'method' => 'POST'], ['class'=>'']) !!}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="control-label pull-left">Email</label>
                            {!! Form::text('email',null,['class'=>'form-control','placeholder'=>'E-Mail Address']) !!}
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="control-label pull-left">Password</label>

                            {!! Form::password('password',null,['class'=>'form-control','placeholder'=>'E-Mail Address']) !!}


                        </div>

                        <button type="submit" class="col-xs-12 btn custom-button" >
                            Login
                        </button>

                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="panel-footer" style="font-size: 19px">
                    <div class="cta pull-left" >
                        <a href="{{ url('/register') }}">
                            Don't Have an account ? Sign up now !!
                        </a>
                    </div>
                    <div class="cta pull-right">
                        <a href="{{ url('/password/reset') }}">
                            Forgot your password?
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
