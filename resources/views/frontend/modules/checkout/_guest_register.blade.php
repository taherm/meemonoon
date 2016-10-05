<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="check-title">
            <a data-toggle="collapse" class="active" data-parent="#accordion" href="#checkut1">
                <span class="number">{{ $order }}</span>Checkout Method</a>
        </h4>
    </div>
    <div id="checkut1" class="panel-collapse collapse in">
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6 col-sm-6">
                    <form class="checkout-form product-form">
                        <h2>Checkout as a Guest or Register</h2>
                        <div class="checkout-form-inner">
                            <p>Register with us for future convenience:</p>
                            <div class="i-boxb">
                                <label class="cradio" for="credio">Checkout as Guest</label>
                            </div>
                            <div class="i-boxb col-lg-12">
                                <div class="user-bottom fix pull-left ">
                                    <a href="{{ url('/register') }}" class="btn custom-button disabled">{{ trans('general.continue') }}</a>
                                </div>
                            </div>
                            <div class="i-boxb">
                                <label class="cradio" for="craiot">OR</label>
                            </div>
                            <p>
                                <span>Register and save time!</span><br />
                                Register with us for future convenience:<br />
                                Fast and easy check out<br />
                                Easy access to your order history and status<br />
                            </p>
                        </div>
                        <div class="user-bottom fix pull-left">
                            <a href="{{ url('/register') }}" class="btn custom-button">Register</a>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        <h2>Login</h2>
                        <div class="submit-review">
                            <p class="title"><b>Already registered?</b></p>
                            <p>Please log in below</p>
                            <div class="account-form">
                                {!! csrf_field() !!}
                                <div class="form-goroup">
                                    <label>Email Address <sup>*</sup></label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-goroup">
                                    <label>Password <sup>*</sup></label>
                                    <input type="password" class="form-control" name="password">
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="user-bottom fix pull-left">
                            <button class="btn custom-button" type="submit">login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><!-- End Panel Default -->
