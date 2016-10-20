<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="check-title">
            <a data-toggle="collapse" class="active" data-parent="#accordion" href="#checkut2">
                <span class="number">{{ $order }}</span>Billing Information</a>
        </h4>
    </div>
    <div id="checkut2" class="panel-collapse collapse in">
        <div class="panel-body">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form">
                    <div class="card-control">
                        <ul>
                            <li>
                                <div class="field fix">
                                    <div class="input-box">
                                        <label class="label" for="first">First Name <em>*</em></label>
                                        {{ Form::text('firstname',null,['class'=>'border-color']) }}
                                    </div>
                                    <div class="input-box">
                                        <label class="label" for="last">Last Name<em>*</em></label>
                                        {{ Form::text('lastname',null,['class'=>'border-color']) }}
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="field fix">
                                    <div class="input-box">
                                        <label class="label" for="email">Email Address <em>*</em></label>
                                        {{ Form::text('email',(auth()->user() ? auth()->user()->email : null) ,['class'=>'border-color']) }}
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="field fix">
                                    <div class="input-box">
                                        <label class="label" for="City">City <em>*</em></label>
                                        {{ Form::text('city',null,['class'=>'border-color']) }}
                                    </div>
                                    <div class="input-box">
                                        <label class="label" for="Country">Shipping Country<em>*</em></label>
                                        <div class="i-box">
                                            <div class="i-box">
                                                {{ $shippingCountry->name }}
                                                <br>
                                                <a href="{{ action('Frontend\CartController@index',['shipping_country'=>$shippingCountry->id]) }}">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <label class="label" for="addr">Address <em>*</em></label>
                                @if($shippingCountry->currency_symbol === 'KWD')
                                    <div class="field fix">
                                        <div class="input-box">
                                            {{ Form::text('area',(Auth::user()->area != '' ? Auth::user()->area: null),['class'=>'border-color', 'placeholder'=>'Area']) }}
                                        </div>
                                        <div class="input-box">
                                            {{ Form::text('block',(Auth::user()->block != '' ? Auth::user()->block: null),['class'=>'border-color', 'placeholder'=>'Block']) }}
                                        </div>
                                    </div>
                                    <div class="field fix">
                                        <div class="input-box">
                                            {{ Form::text('street',(Auth::user()->street != '' ? Auth::user()->street: null),['class'=>'border-color', 'placeholder'=>'Street']) }}
                                        </div>
                                        <div class="input-box">
                                            {{ Form::text('building',(Auth::user()->building != '' ? Auth::user()->building: null),['class'=>'border-color', 'placeholder'=>'Building']) }}
                                        </div>
                                    </div>
                                    <div class="field fix">
                                        <div class="input-box">
                                            {{ Form::text('floor',(Auth::user()->floor != '' ? Auth::user()->floor: null),['class'=>'border-color', 'placeholder'=>'Floor']) }}
                                        </div>
                                        <div class="input-box">
                                            {{ Form::text('apartment',(Auth::user()->apartment != '' ? Auth::user()->apartment: null),['class'=>'border-color', 'placeholder'=>'Apartment']) }}
                                        </div>
                                    </div>
                                @else
                                    {{ Form::text('address1',(Auth::user()->address != '' ? Auth::user()->address: null),['class'=>'border-color', 'placeholder'=>'Address 1']) }}
                                    {{ Form::text('address2',(Auth::user()->address2 != '' ? Auth::user()->address2: null),['class'=>'border-color', 'placeholder'=>'Address 2']) }}
                                @endif

                            </li>
                            <li>
                                <div class="field fix">
                                    <div class="input-box">
                                        <label class="label" for="Zip">Zip/Postal Code <em>*</em></label>
                                        {{ Form::text('zip',null,['class'=>'border-color']) }}
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="field fix">
                                    <div class="input-box">
                                        <label class="label" for="Mobile">Mobile <em>*</em></label>
                                        {{ Form::text('mobile',null,['class'=>'border-color']) }}
                                    </div>
                                    <div class="input-box">
                                        <label class="label" for="phone">Phone <em>*</em></label>
                                        {{ Form::text('phone',null,['class'=>'border-color']) }}
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>