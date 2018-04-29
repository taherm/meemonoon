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
                                        <a data-toggle="modal" href="#responsive"><i class="icon-bell"></i> Shipped</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('backend.order.status.change',['id' => $order->id,'status' => 'completed']) }}">
                                            <i class="icon-bell"></i> Delivered</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @if(count($order->order_metas) >= 1)
                <div class="portlet-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>order_id</th>
                                <th>product sku</th>
                                <th>product name</th>
                                <th>color</th>
                                <th>size</th>
                                <th>quantity</th>
                                <th>Order Date</th>
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
                                    <td>{{ $orderMeta->product->name  }}</td>
                                    <td>{!! $orderMeta->product_attribute->colorName !!}</td>
                                    <td>{!! $orderMeta->product_attribute->sizeName !!}</td>
                                    <td>{!! $orderMeta->quantity !!}</td>
                                    <td>{{ $orderMeta->created_at }}</td>
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
                    <div class="col-md-8 name"> Mobile :</div>
                    <div class="col-md-3 value"> {{ $order->user->mobile or 'No Mobile' }} </div>
                </div>

                <div class="row static-info align-reverse">
                    <div class="col-md-8 name"> Shipping Address :</div>
                    <div class="col-md-3 value"> {{ $order->address or 'No Address' }} </div>
                </div>
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

    {{--Shipping modal view--}}
    <div id="responsive" class="modal fade" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"> Order Ship Tracking ID </h4>
                </div>
                {!! Form::open(['route' => 'backend.order.shipped', 'method' => 'post']) !!}
                <div class="modal-body">
                    <div class="scroller" style="height:150px" data-always-visible="1" data-rail-visible1="1">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Add Track ID</h4>
                                <span style="font-size: 11px;color: #afa8a8;">Email will sent automatic for user with ship track id</span>
                                <p>
                                    <input type="text" name="trackId" id="trackId" class="col-md-12 form-control">
                                    <input type="hidden" name="id" value="{{$order->id}}" class="col-md-12 form-control">
                                </p>
                                <br />
                                <label class="mt-checkbox">
                                    <input id="disableTrack" type="checkbox"> Without track id
                                    <span></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                    <button type="submit" class="btn green">Save</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    {{--End shipping modal view--}}

@endsection

@section('customScripts')
    @parent
    <script type="text/javascript">
        $(document).ready(function () {

        });
    </script>
@endsection

