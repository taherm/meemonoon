<!-- Panel Default -->
<!-- Panel Default -->
<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="check-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#checkut5">
                <span class="number">{{ $order }}</span>{{ trans('general.payment_information') }}</a>
        </h4>
    </div>
    <div id="checkut5" class="panel-collapse collapse in ">
        <div class="panel-body">
            <div class="col-xs-5">
                <div class="form-group">
                    <input type="radio" name="payment" checked="checked" value="my_fatoorah" style="width: 15%;float: left;"/>
                    <label for="payment"><img class="img-responsive" src="{{asset('img/payment.png')}}" alt=""></label>
                    <div>Processed by My Fatorrah</div>

                </div>
            </div>
            {{--<div class="col-xs-5">--}}
                {{--<div class="form-group">--}}
                    {{--@if($shippingCountry->id == '414')--}}
                        {{--<input type="radio" name="payment" value="cash" style="width: 15%;"/>--}}
                    {{--@else--}}
                        {{--<input type="radio" name="payment" value="no" style="width: 15%;" disabled="disabled"/>--}}
                    {{--@endif--}}
                        {{--<label for="payment">{{ trans('general.cash_on_delivery') }}</label>--}}
                {{--</div>--}}
            {{--</div>--}}
            <p>
            {{--<ol style="direction: ltr;">--}}
                {{--<li>K-net,Visa,master card (processed by MyFatoorah)</li>--}}
                {{--<li>Cash on delivery. Other than Kuwait: Visa,master card (Processed by MyFatoorah).</li>--}}
            {{--</ol>--}}
            </p>
        </div>
    </div>
</div>
</div><!-- End Panel Default -->