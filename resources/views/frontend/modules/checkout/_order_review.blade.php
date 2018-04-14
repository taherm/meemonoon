<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="check-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#checkut6">
                <span class="number">{{ $order }}</span>{{ trans('general.order_review') }}</a>
        </h4>
    </div>
    <div id="checkut6" class="panel-collapse collapse in" style="color : black; font-weight: bolder;">
        <div class="panel-body">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="table-responsive">
                    <table class="tablec">
                        <tr>
                            <td>{{ trans('general.product_name') }}</td>
                            <td>{{ trans('general.price') }}</td>
                            <td>{{ trans('general.qty') }}</td>
                            <td>{{ trans('general.subtotal') }}</td>
                        </tr>
                        @foreach($cart->items as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td><p class="tabletextp">{{ $product->sale_price }} KD</p></td>
                                <td>{{ $product->quantity }}</td>
                                <td><p class="tabletextp">{{ $product->grand_total }} KD</p></td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3">
                                <p class="tabletext">Total</p>
                                {!! (isset($coupon) && $coupon->value > 0) ? '<p class="tabletext">Coupon Value :</p>' : null !!}
                                {!! (isset($coupon) && $coupon->value > 0) ? '<p class="tabletext">After Coupon :</p>' : null !!}
                                <p class="tabletext">{{ trans('general.shipping_and_handling_fees') }}:</p>
                                <p class="tabletext">{{ trans('general.grand_total') }} :</p>


                            </td>
                            <td>
                                <p class="tabletextp">{{ $cart->grandTotal }} KD</p>
                                {!! (isset($coupon) && $coupon->value > 0) ? '<p class="tabletextp">'.$couponDiscountValue .'KD</p>' : null !!}
                                {!! (isset($coupon) && $coupon->value > 0) ? '<p class="tabletextp">'.$amountAfterCoupon .'KD</p>' : null !!}
                                <p class="tabletextp">{{ $shippingCost }} KD ({{ $shippingCountry->name }} - {{ $area }})</p>
                                <p class="tabletextp">{{ $finalAmount }} KD</p>


                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <div class="button-check">
                                    <div class="">
                                        <span class="col-lg-12">
                                            <a href="{{ action('Frontend\CartController@index') }}">
                                                {{ trans('general.forget_item_edit_here') }}
                                            </a>
                                            <ul>
                                                @if(!session()->get('currency') === 'KWD')
                                                    <li>Additional duties and taxes may apply according to your
                                                        country, </br>
                                                        Paid when receiving the order
                                                    </li>
                                                @endif
                                            </ul>
                                        </span>
                                        <span class="col-lg-12 pull-left">
                                            <button type="submit" class="btn right-btn custom-button">
                                                {{ trans('general.proceed_to_payment') }}
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>