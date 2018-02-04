@extends('emails.layouts.master')
@section('body')
    <tr>
        <td align="center" valign="top" width="100%" style="background-color: #f7f7f7;" class="content-padding">
            <center>
                <table cellspacing="0" cellpadding="0" width="600" class="w320">
                    <tr>
                        <td class="header-lg">
                            Your order has shipped!
                        </td>
                    </tr>
                    <tr>
                        <td class="free-text">
                            We wanted to let you know that we just shipped off your order <a href="{{url('orders')}}">#{{$order->id}}</a>.
                            @if($order->track_id)
                                To track your order go to <a href="https://www.aramex.com/express/track.aspx">Aramex</a> and enter your track id {{$order->track_id}}.
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="button">
                            <div><!--[if mso]>
                                <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="http://" style="height:45px;v-text-anchor:middle;width:155px;" arcsize="15%" strokecolor="#ffffff" fillcolor="#ff6f6f">
                                    <w:anchorlock/>
                                    <center style="color:#ffffff;font-family:Helvetica, Arial, sans-serif;font-size:14px;font-weight:regular;">My Account</center>
                                </v:roundrect>
                                <![endif]--><a href="{{url('orders')}}"
                                               style="background-color:#ff6f6f;border-radius:5px;color:#ffffff;display:inline-block;font-family:'Cabin', Helvetica, Arial, sans-serif;font-size:14px;font-weight:regular;line-height:45px;text-align:center;text-decoration:none;width:155px;-webkit-text-size-adjust:none;mso-hide:all;">My Account</a></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="w320">
                            <table cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td class="mini-container-left">
                                        <table cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                                <td class="mini-block-padding">
                                                    <table cellspacing="0" cellpadding="0" width="100%" style="border-collapse:separate !important;">
                                                        <tr>
                                                            <td class="mini-block">
                                                                <span class="header-sm">Shipping Address</span><br />
                                                                {{$order->address}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="mini-block">
                                                                <span class="header-sm">Mobile</span><br />
                                                                {{$order->mobile}}
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td class="mini-container-right">
                                        <table cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                                <td class="mini-block-padding">
                                                    <table cellspacing="0" cellpadding="0" width="100%" style="border-collapse:separate !important;">
                                                        <tr>
                                                            <td class="mini-block">
                                                                <span class="header-sm">Date Ordered</span><br />
                                                                {{$order->created_at}} <br />
                                                                <br />
                                                                <span class="header-sm">Order</span> <br />
                                                                #{{$order->id}}
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </center>
        </td>
    </tr>
    <tr>
        <td align="center" valign="top" width="100%" style="background-color: #ffffff;  border-top: 1px solid #e5e5e5; border-bottom: 1px solid #e5e5e5;">
            <center>
                <table cellpadding="0" cellspacing="0" width="600" class="w320">
                    <tr>
                        <td class="item-table">
                            <table cellspacing="0" cellpadding="0" width="100%">
                                <tr>
                                    <td class="title-dark" width="300">
                                        Item
                                    </td>
                                    <td class="title-dark" width="163">
                                        Qty
                                    </td>
                                    <td class="title-dark" width="150">
                                        Total
                                    </td>
                                </tr>


                                @foreach($order->order_metas as $item)
                                    <tr>
                                        <td class="item-col item">
                                            <table cellspacing="0" cellpadding="0" width="100%">
                                                <tr>
                                                    <td class="mobile-hide-img">
                                                        <a href=""><img width="110" height="92" src="img/uploads/thumbnail/{{($item->product->product_meta->image != '' ? $item->product->product_meta->image : $item->product->gallery->images->first()->thumb_url)}}" alt="item1"></a>
                                                    </td>
                                                    <td class="product">
                                                        <span style="color: #4d4d4d; font-weight:bold;">{{$item->product->name}}</span> <br />
                                                        {{$item->product->sku}}
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td class="item-col quantity">
                                            {{$item->quantity}}
                                        </td>
                                        <td class="item-col">
                                            {{$item->sale_price. " KD"}}
                                        </td>
                                    </tr>
                                @endforeach

                                <tr>
                                    <td class="item-col item mobile-row-padding"></td>
                                    <td class="item-col quantity"></td>
                                    <td class="item-col price"></td>
                                </tr>
                                <tr>
                                    <td class="item-col item">
                                    </td>
                                    <td class="item-col quantity" style="text-align:right; padding-right: 10px; border-top: 1px solid #cccccc;">
                                        <span class="total-space" style="width: 150px;">Subtotal</span> <br />
                                        {!! (isset($order) && $order->coupon_value > 0) ? '<span style="width: 150px;" class="total-space">Coupon Value :</span>' : null !!}
                                        {!! (isset($coupon) && $order->coupon_value > 0) ? '<span style="width: 150px;" class="total-space">After Coupon :</span>' : null !!}
                                        <span class="total-space" style="width: 150px;">Shipping</span> <br />
                                        <span class="total-space" style="font-weight: bold; color: #4d4d4d; width: 150px;">Total</span>
                                    </td>
                                    <td class="item-col price" style="text-align: left; border-top: 1px solid #cccccc;">
                                        <span class="total-space" style="width: 150px;">{{$order->sale_amount . ' KD'}}</span> <br />
                                        {!! (isset($order) && $order->coupon_value > 0) ? '<span style="width: 150px;" class="total-space"> - '.$order->coupon_value.'</span>' : null !!}
                                        {!! (isset($coupon) && $order->coupon_value > 0) ? '<span style="width: 150px;" class="total-space">'.($order->net_amount + $order->shipping_cost).'</span>' : null !!}
                                        <span class="total-space" style="width: 150px;">{{$order->shipping_cost . ' KD'}}</span>  <br />
                                        <span class="total-space" style="font-weight:bold; color: #4d4d4d; width: 150px;">{{$order->net_amount . ' KD'}}</span>
                                    </td>
                            </table>
                        </td>
                    </tr>
                </table>
            </center>
        </td>
    </tr>
@stop