@extends('backend.layouts.master')

@section('content')
    <div class="table-container">
        <table class="table table-striped table-bordered table-hover" id="currencies">
            <thead>
            <tr>
                <th>id</th>
                <th>user_id</th>
                <th>status</th>
                <th>payment_method</th>
                <th>coupon_id</th>
                <th>coupon_value</th>
                <th>country_id</th>
                <th>shipping_cost</th>
                <th>amount</th>
                <th>sale_amount</th>
                <th>net_amount</th>
                <th>created_at</th>
                <th>details</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id}}</td>
                    <td>{{ $order->user->fullName}}</td>
                    <td>{{ $order->status}}</td>
                    <td>{{ $order->payment_method}}</td>
                    <td>{!! ($order->coupon_id <= 1) ? '<span class="label label-sm label-warning">N/A</span>' : $order->coupon_id !!}</td>
                    <td>{!! ($order->coupon_value <= 1) ? '<span class="label label-sm label-warning">N/A</span>' : $order->coupon_value !!}</td>
                    <td>{{ $order->country->name}}</td>
                    <td>{{ $order->shipping_cost}}</td>
                    <td>{{ $order->amount}}</td>
                    <td>{{ $order->sale_amount}}</td>
                    <td>{{ $order->net_amount}}</td>
                    <td>{{ $order->created_at->diffForHumans()}}</td>
                    <td>
                        <a href="{{ route('backend.order.show',$order->id) }}" class="btn btn-outline btn-circle dark btn-xs green"><i
                                    class="fa fa-info-circle"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

