@extends('backend.layouts.master')

@section('content')
    <div class="table-container">
        <table class="table table-striped table-bordered table-hover" id="coupons">
            <thead>
            <tr>
                <th> id</th>
                <th> value</th>
                <th> customer_id</th>
                <th> active</th>
                <th> consumed</th>
                <th> code</th>
                <th> m_charge</th>
                <th> is_percentage </th>
                <th> due_date</th>
                <th> created at</th>
                <th> actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($coupons as $coupon)
                <tr>
                    <td> {{$coupon->id}}</td>
                    <td> {{$coupon->value}} </td>
                    <td> {{$coupon->customer_id}} </td>
                    <td> {!! ($coupon->active) ? '<span class="label label-sm label-success"> active </span>' : '<span class="label label-sm label-warning"> not active </span>' !!} </td>
                    <td> {!! (!$coupon->counsumed) ? '<span class="label label-sm label-success"> available </span>' : '<span class="label label-sm label-danger"> expired </span>' !!} </td>
                    <td> {{$coupon->code}} </td>
                    <td> {{$coupon->minimum_charge}} </td>
                    <td> <span class="label {{ $coupon->is_percentage ? 'label-success' : 'label-danger' }}">percentage</span></td>
                    <td> {{$coupon->due_date->format('d-m-Y') }} </td>
                    <td> {{$coupon->created_at->format('d-m-Y')}} </td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-xs green dropdown-toggle" type="button"
                                    data-toggle="dropdown" aria-expanded="false"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu" style="min-width: 30px;">
                                <li >
                                    <a href="{{ route('backend.coupon.edit',$coupon->id) }}"
                                       class="btn btn-xs dark purple"><i class="fa fa-edit"></i>
                                        Edit
                                    </a>
                                </li>
                                <li >
                                    {{ Form::open(['route' => ['backend.coupon.destroy', $coupon->id] , 'method' => 'DELETE']) }}
                                    <button type="submit" class="btn btn-xs btn-circle dark red"><i
                                                class="fa fa-trash-o"></i>
                                        Delete
                                    </button>
                                    {{ Form::close() }}
                                </li>

                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection