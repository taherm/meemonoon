@extends('backend.layouts.master')

@section('content')
    @if(isset($coupon))
        {{ Form::model($coupon,['route' => ['backend.coupon.update',$coupon->id],'method'=>'PATCH','files' => 'true','class' => 'form-horizontal']) }}
    @else
        {{ Form::open(['route' => 'backend.coupon.store','method'=>'POST','class'=>'form-horizontal']) }}
    @endif
    <div class="form-body">
        <div class="form-group">
            <label class="col-md-2 control-label">coupon value:
                <span class="required"> * </span>
            </label>
            <div class="col-md-3">
                {!! Form::text('value', old('value') ,['class' => 'form-control','required']) !!}
            </div>
            <label class="col-md-2 control-label">customer Id:
                <span class="required"> * </span>
            </label>
            <div class="col-md-3">
                {!! Form::text('customer_id',old('customer_id'),['class' => 'form-control', 'required']) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">coupon status:
                <span class="required"> * </span>
            </label>
            <div class="col-md-3">
                {{ Form::select('active',['1' => 'active','0'=> 'not active'], (isset($coupon) && $coupon->active) ? $coupon->active : 0,['class' => 'table-group-action-input form-control input-medium','required']) }}
            </div>
            <label class="col-md-2 control-label">consumed:
                <span class="required"> * </span>
            </label>
            <div class="col-md-3">
                {{ Form::select('consumed',['0' => 'available', '1' => 'consumed'] , (isset($coupon) && $coupon->consumed) ? $coupon->consumed : 0,['class' => 'form-control']) }}
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">code:
                <span class="required"> *</span>
            </label>
            <div class="col-md-3">
                {{ Form::text('code',(isset($coupon) ? $coupon->code : str_random(30)),['class'=>'form-control']) }}
                <span class="required">will be generated automtaically</span>
            </div>
            <label class="col-md-2 control-label">minimum charge:
                <span class="required"> * </span>
            </label>
            <div class="col-md-3">
                {{ Form::text('minimum_charge',old('minimum_charge'),['class' => 'form-control', 'required','number']) }}
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">due date:
                <span class="required"> * </span>
            </label>
            <div class="col-md-3">
                {{--                {{ Form::date('due_date',(isset($coupon)) ? $coupon->due_date->format('Y-m-d') : null,['class'=>'form-control','required']) }}--}}
                <div class="input-group input-large date-picker input-daterange"
                     data-date={!! Carbon::now() !!} data-date-format="yyyy/mm/dd 00:00:00">
                    {{ Form::date('due_date',(isset($coupon)) ? $coupon->due_date->format('Y-m-d') : null,['class'=>'form-control']) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-3 col-lg-push-1 pull-right">
                    {{ Form::submit('submit',['class'=>'btn btn-outline btn-circle btn-primary']) }}
                </div>
            </div>
        </div>
    {!! Form::close() !!}
@endsection