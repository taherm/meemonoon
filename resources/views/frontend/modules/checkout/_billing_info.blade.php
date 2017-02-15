<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="check-title">
            <a data-toggle="collapse" class="active" data-parent="#accordion" href="#checkut2">
                <span class="number">{{ $order }}</span>{{ trans('general.shipping_address') }}</a>
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
                                        <label class="label" for="first">{{ trans('general.firstname') }} <em>*</em></label>
                                        {{ Form::text('firstname',null,['class'=>'border-color']) }}
                                    </div>
                                    <div class="input-box">
                                        <label class="label" for="last"> {{ trans('general.lastname') }}<em>*</em></label>
                                        {{ Form::text('lastname',null,['class'=>'border-color']) }}
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="field fix">
                                    <div class="input-box">
                                        <label class="label" for="City">{{ trans('general.city') }} <em>*</em></label>
                                        {{ Form::text('city',null,['class'=>'border-color', 'required']) }}
                                    </div>
                                    <div class="input-box">
                                        <label class="label" for="Country">{{ trans('general.country') }}<em>*</em></label>
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
                                                <a href="{{ action('Frontend\CartController@index',['shipping_country'=>$shippingCountry->id]) }}">{{ trans('general.edit') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                @if($shippingCountry->currency_symbol === 'KWD')
                                    <div class="field fix">
                                        <div class="input-box">
                                            <label class="label" for="area">{{ trans('general.area') }}<em>*</em></label>
                                            {{ Form::text('area',(Auth::user()->area != '' ? Auth::user()->area: null),['class'=>'border-color', 'placeholder'=>'Area', 'required']) }}
                                        </div>
                                        <div class="input-box">
                                            <label class="label" for="block">{{ trans('general.block') }}<em>*</em></label>
                                            {{ Form::text('block',(Auth::user()->block != '' ? Auth::user()->block: null),['class'=>'border-color', 'placeholder'=>'Block', 'required']) }}
                                        </div>
                                    </div>
                                    <div class="field fix">
                                        <div class="input-box">
                                            <label class="label" for="street">{{ trans('general.street') }}<em>*</em></label>
                                            {{ Form::text('street',(Auth::user()->street != '' ? Auth::user()->street: null),['class'=>'border-color', 'placeholder'=>'Street', 'required']) }}
                                        </div>
                                        <div class="input-box">
                                            <label class="label" for="building">{{ trans('general.building') }}</label>
                                            {{ Form::text('building',(Auth::user()->building != '' ? Auth::user()->building: null),['class'=>'border-color', 'placeholder'=>'Building']) }}
                                        </div>
                                    </div>
                                    <div class="field fix">
                                        <div class="input-box">
                                            <label class="label" for="floor">{{ trans('general.floor') }}<em>*</em></label>
                                            {{ Form::text('floor',(Auth::user()->floor != '' ? Auth::user()->floor: null),['class'=>'border-color', 'placeholder'=>'Floor', 'required']) }}
                                        </div>
                                        <div class="input-box">
                                            <label class="label" for="apartment">{{ trans('general.apartment') }}</label>
                                            {{ Form::text('apartment',(Auth::user()->apartment != '' ? Auth::user()->apartment: null),['class'=>'border-color', 'placeholder'=>'Apartment']) }}
                                        </div>
                                    </div>
                                @else
                                    <label class="label" for="address1">{{ trans('general.address1') }}<em>*</em></label>
                                    {{ Form::text('address1',(Auth::user()->address != '' ? Auth::user()->address: null),['class'=>'border-color', 'placeholder'=>'Address 1', 'required']) }}
                                    <label class="label" for="block">{{ trans('general.address2') }}<em>*</em></label>
                                    {{ Form::text('address2',(Auth::user()->address2 != '' ? Auth::user()->address2: null),['class'=>'border-color', 'placeholder'=>'Address 2', 'required']) }}
                                @endif

                            </li>
                            <li>
                                <div class="field fix">
                                    <div class="input-box">
                                        <label class="label" for="email">{{ trans('general.email') }} <em>*</em></label>
                                        {{ Form::text('email',(auth()->user() ? auth()->user()->email : null) ,['class'=>'border-color', 'required']) }}
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="field fix">
                                    <div class="input-box">
                                        <label class="label" for="Zip">{{ trans('general.zip_code') }} <em>*</em></label>
                                        {{ Form::text('zip',null,['class'=>'border-color', 'required']) }}
                                    </div>
                                    <div class="input-box">
                                        <label class="label" for="Mobile">{{ trans('general.contact_number') }}<em>*</em></label>
                                        {{ Form::text('mobile',null,['class'=>'border-color', 'required']) }}
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