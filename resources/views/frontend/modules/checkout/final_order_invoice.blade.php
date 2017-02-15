<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Order Invoice</title>

    <style>
        .invoice-box{
            max-width:800px;
            margin:auto;
            padding:30px;
            border:1px solid #eee;
            box-shadow:0 0 10px rgba(0, 0, 0, .15);
            font-size:16px;
            line-height:24px;
            font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color:#555;
        }

        .invoice-box table{
            width:100%;
            line-height:inherit;
            text-align:left;
        }

        .invoice-box table td{
            padding:5px;
            vertical-align:top;
        }

        .invoice-box table tr td:nth-child(2){
            text-align:right;
        }

        .invoice-box table tr.top table td{
            padding-bottom:20px;
        }

        .invoice-box table tr.top table td.title{
            font-size:45px;
            line-height:45px;
            color:#333;
        }

        .invoice-box table tr.information table td{
            padding-bottom:40px;
        }

        .invoice-box table tr.heading td{
            background:#eee;
            border-bottom:1px solid #ddd;
            font-weight:bold;
        }

        .invoice-box table tr.details td{
            padding-bottom:20px;
        }

        .invoice-box table tr.item td{
            border-bottom:1px solid #eee;
        }

        .invoice-box table tr.item.last td{
            border-bottom:none;
        }

        .invoice-box table tr.total td:nth-child(2){
            border-top:2px solid #eee;
            font-weight:bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td{
                width:100%;
                display:block;
                text-align:center;
            }

            .invoice-box table tr.information table td{
                width:100%;
                display:block;
                text-align:center;
            }
        }
    </style>
</head>

<body>
<div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
        <tr class="top">
            <td colspan="3">
                <table>
                    <tr>
                        <td class="title">
                            <img src="{{asset('meem/frontend/img/logo/mainlogo.jpg')}}" style="width:100%; max-width:300px;">
                        </td>

                        <td>
                            Order #: {{ $order->id }}<br>
                            Created: {{ $order->created_at }}<br>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="2">
                <table>
                    <tr>
                        <td style="padding-bottom: 10px;">
                            <P style="font-size: 20px;font-weight: bold;">Thank you for your order</P>
                            {{trans('group.name').': '. $order->user->firstname}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            {{trans('group.address').': '. $order->address }}<br>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="heading">
            <td>
                Payment Method
            </td>

            <td style="text-align: left;"></td>

            <td>
                {{$order->payment_method}}
            </td>
        </tr>

        <tr class="details">
            <td>
                {{$order->payment_method}}
            </td>

            <td style="text-align: left;"></td>

            <td>
                {{$order->net_amount}}
            </td>
        </tr>

        <tr class="heading">
            <td style="">
                Item
            </td>

            <td style="text-align: left;">
                Qty
            </td>

            <td>
                Price
            </td>
        </tr>

        @foreach($order->order_metas as $item)
            <tr class="item">
                <td>
                    {{$item->product->name}} <br />
                    <span style="font-size: 10px;color: #a5a5a5;">ID: {{$item->product->sku}}</span>
                </td>
                <td style="text-align: left;">
                    {{$item->quantity}}
                </td>
                <td>
                    {{$item->sale_price. " KD"}}
                </td>
            </tr>
        @endforeach

        <tr class="total">
            <td></td>
            <td style="border: none;"></td>

            <td>
                Subtotal: {{$order->sale_amount . ' KD'}}
            </td>
        </tr>
        @if(isset($order) && $order->coupon_value > 0)
            <tr class="total">
                <td></td>
                <td style="border: none;"></td>

                <td>
                    Coupon Value: -{{$order->coupon_value.' KD'}}
                </td>
            </tr>

            <tr class="total">
                <td></td>
                <td style="border: none;"></td>

                <td>
                    After Coupon: {{($order->net_amount + $order->shipping_cost).' KD'}}
                </td>
            </tr>
        @endif

        <tr class="total">
            <td></td>
            <td style="border: none;"></td>

            <td>
                Shipping: {{$order->shipping_cost . ' KD'}}
            </td>
        </tr>

        <tr class="total">
            <td></td>
            <td style="border: none;"></td>

            <td>
                Total: {{$order->net_amount . ' KD'}}
            </td>
        </tr>

    </table>
    <form method="GET" action="{{URL('home/')}}">
        <button type="submit" style="padding: 10px;">Back To Home</button>
    </form>
</div>
</body>
</html>