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
                                        <label class="label" for="addr">Address <em>*</em></label>
                                        @if($shippingCountry->currency_symbol === 'KWD')
                                            {{ Form::text('area',null,['class'=>'border-color', 'placeholder'=>'Area']) }}
                                            {{ Form::text('block',null,['class'=>'border-color', 'placeholder'=>'Block']) }}
                                            {{ Form::text('street',null,['class'=>'border-color', 'placeholder'=>'Street']) }}
                                            {{ Form::text('building',null,['class'=>'border-color', 'placeholder'=>'Building']) }}
                                            {{ Form::text('floor',null,['class'=>'border-color', 'placeholder'=>'Floor']) }}
                                            {{ Form::text('apartment',null,['class'=>'border-color', 'placeholder'=>'Apartment']) }}
                                        @else
                                            {{ Form::text('address1',null,['class'=>'border-color', 'placeholder'=>'Address 1']) }}
                                            {{ Form::text('address2',null,['class'=>'border-color', 'placeholder'=>'Address 2']) }}
                                        @endif
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
                                            {{--<select  id="country_id" name="country_id" class="form-control">--}}
                                                {{--@foreach($countries as $country)--}}
                                                    {{--<option value="{{ $country->id }}"--}}
                                                            {{--@if(Form::getValueAttribute('country_id') == $country->id)--}}
                                                            {{--selected="selected"--}}
                                                            {{--@elseif($shippingCountry->id == $country->id)--}}
                                                            {{--selected="selected"--}}
                                                            {{--@endif--}}
                                                    {{-->{{ $country->name }}</option>--}}
                                                {{--@endforeach--}}
                                            {{--</select>--}}
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