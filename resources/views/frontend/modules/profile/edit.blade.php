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
                <div class="panel panel-default">
                    <div class="panel-heading">Update Profile </div>
                    <div class="panel-body">

                        {!! Form::model($user,['route' => 'profile.update', 'method' => 'POST'], ['class'=>'']) !!}

                        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                            <div class="col-md-12 col-sm-12">
                                <label class="control-label pull-left">First Name</label>
                                {!! Form::text('firstname',null,['class'=>'form-control','placeholder'=>'First Name']) !!}
                                @if ($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <div class="col-md-12 col-sm-12">
                                <label class="control-label pull-left">Last Name</label>

                                {!! Form::text('lastname',null,['class'=>'form-control','placeholder'=>'Last Name']) !!}
                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-md-12 col-sm-12">
                                <label class="control-label pull-left">E-Mail Address</label>

                                {!! Form::text('email',null,['class'=>'form-control','placeholder'=>'E-Mail Address']) !!}

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                            <div class="col-md-12 col-sm-12">
                                <label class="control-label pull-left">Country</label>

                                {!! Form::select('country_id', $countriesList, null, array('class' => 'form-control')) !!}

                                @if ($errors->has('country'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <div class="col-md-12 col-sm-12">
                                <label class="control-label pull-left">City</label>

                                {!! Form::text('city',null,['class'=>'form-control','placeholder'=>'City']) !!}
                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        @if ($user->country_id != '414')
                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <div class="col-md-12 col-sm-12">
                                    <label class="control-label pull-left">Address 1</label>
                                    {!! Form::text('address',null,['class'=>'form-control','placeholder'=>'Address 1']) !!}
                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('address2') ? ' has-error' : '' }}">
                                <div class="col-md-12 col-sm-12">
                                    <label class="control-label pull-left">Address 2</label>
                                    {!! Form::text('address2',null,['class'=>'form-control','placeholder'=>'Address 2']) !!}
                                    @if ($errors->has('address2'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('address2') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @else
                            <div class="form-group{{ $errors->has('area') ? ' has-error' : '' }}">
                                <div class="col-md-6 col-sm-6">
                                    <label class="control-label pull-left">Area</label>
                                    {!! Form::text('area',null,['class'=>'form-control','placeholder'=>'Area']) !!}
                                    @if ($errors->has('area'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('area') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <label class="control-label pull-left">Block</label>
                                    {!! Form::text('block',null,['class'=>'form-control','placeholder'=>'Block']) !!}
                                    @if ($errors->has('block'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('block') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6">
                                    <label class="control-label pull-left">Street</label>
                                    {!! Form::text('street',null,['class'=>'form-control','placeholder'=>'Street']) !!}
                                    @if ($errors->has('street'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('street') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <label class="control-label pull-left">Building</label>
                                    {!! Form::text('building',null,['class'=>'form-control','placeholder'=>'Building']) !!}
                                    @if ($errors->has('building'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('building') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6">
                                    <label class="control-label pull-left">Floor</label>
                                    {!! Form::text('floor',null,['class'=>'form-control','placeholder'=>'Floor']) !!}
                                    @if ($errors->has('floor'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('floor') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="col-md-6 col-sm-6">
                                    <label class="control-label pull-left">Apartment</label>
                                    {!! Form::text('apartment',null,['class'=>'form-control','placeholder'=>'Apartment']) !!}
                                    @if ($errors->has('apartment'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('apartment') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endif

                        <div class="form-group{{ $errors->has('zip') ? ' has-error' : '' }}">
                            <div class="col-md-12 col-sm-12">
                                <label class="control-label pull-left">Zip</label>

                                {!! Form::text('zip',null,['class'=>'form-control','placeholder'=>'Zip']) !!}
                                @if ($errors->has('zip'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('zip') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                            <div class="col-md-12 col-sm-12">
                                <label class="control-label pull-left">Mobile</label>

                                {!! Form::text('mobile',null,['class'=>'form-control','placeholder'=>'Mobile']) !!}
                                @if ($errors->has('mobile'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <div class="col-md-12 col-sm-12">
                                <label class="control-label pull-left">Phone</label>

                                {!! Form::text('phone',null,['class'=>'form-control','placeholder'=>'Phone']) !!}
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2 col-xs-12" >
                                <button type="submit" class="col-xs-12 btn custom-button" >
                                    Save
                                </button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection

