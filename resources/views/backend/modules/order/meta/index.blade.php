@extends('backend.layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="portlet grey-cascade box">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cogs"></i>Order No. {{ $order->id }}</div>
                    <div class="actions">
                        <div class="page-toolbar">
                            <div class="btn-group pull-right">
                                <button type="button" class="btn green btn-sm dropdown-toggle" data-toggle="dropdown">
                                    Status
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-right" role="menu">
                                    <li>
                                        <a href="{{ route('backend.order.status.change',['id' => $order->id,'status' => 'pending']) }}">
                                            <i class="icon-bell"></i> pending</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('backend.order.status.change',['id' => $order->id,'status' => 'failed']) }}">
                                            <i class="icon-bell"></i> failed</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('backend.order.status.change',['id' => $order->id,'status' => 'success']) }}">
                                            <i class="icon-bell"></i> success</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('backend.order.status.change',['id' => $order->id,'status' => 'completed']) }}">
                                            <i class="icon-bell"></i> completed</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @if(count($order->order_metas) >= 1))
                <div class="portlet-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>order_id</th>
                                <th>product sku</th>
                                <th>color</th>
                                <th>size</th>
                                <th>quantity</th>
                                <th>created_at</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order->order_metas as $orderMeta)
                                <tr>
                                    <td>{{ $orderMeta->order_id }}</td>
                                    <td>
                                        <a href="{{ route('backend.product.edit', [$orderMeta->product_id]) }}"
                                           class="btn btn-xs btn-circle btn-outline">{{ $orderMeta->product->sku }}</a>
                                    </td>
                                    <td>{!! $orderMeta->product_attribute->colorName !!}</td>
                                    <td>{!! $orderMeta->product_attribute->sizeName !!}</td>
                                    <td>{!! $orderMeta->quantity !!}</td>
                                    <td>{{ $orderMeta->created_at->diffForHumans()}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                @else
                    <div class="alert alert-danger">no items</div>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6">
            <div class="well">
                <div class="row static-info align-reverse">
                    <div class="col-md-8 name"> Status :</div>
                    <div class="col-md-3 value"> {{ $order->status }} </div>
                </div>
                <div class="row static-info align-reverse">
                    <div class="col-md-8 name"> shipping_cost:</div>
                    <div class="col-md-3 value"> KWD {{ $order->shipping_cost }} </div>
                </div>
                <div class="row static-info align-reverse">
                    <div class="col-md-8 name"> amount</div>
                    <div class="col-md-3 value"> KWD {{ $order->amount }} </div>
                </div>
                <div class="row static-info align-reverse">
                    <div class="col-md-8 name"> sale_amount:</div>
                    <div class="col-md-3 value"> KWD {{ $order->sale_amount }} </div>
                </div>
                <div class="row static-info align-reverse">
                    <div class="col-md-8 name"> net_amount:</div>
                    <div class="col-md-3 value"> KWD {{ $order->net_amount }} </div>
                </div>
            </div>
        </div>
    </div>

@endsection

