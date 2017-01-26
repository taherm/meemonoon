@extends('backend.layouts.master')

@section('page-title')
    @include('backend.partials._product_steps',['main' => 'null','meta' => 'null','attribute' => 'active', 'product_id' =>  (request()->product_id) ? request()->product_id : null ])
@stop

@section('panel-title','ProductMeta')

@section('content')

    @include('backend.partials.forms._productAttributes')

    <div class="table-container">
        <table class="table table-striped table-bordered table-hover"
               id="datatable_history">
            <thead>
            <tr role="row" class="heading">
                <th width="10%"> id</th>
                <th width="10%"> Size</th>
                <th width="10%"> Color</th>
                <th width="10%"> Quantity</th>
                <th width="30%"> Notes ar</th>
                <th width="30%"> Notes en</th>
                <th width="10%"> edit</th>
                <th width="10%"> delete</th>
            </tr>
            </thead>
            <tbody>

            @if($product->product_attributes->count() > 0)
                @foreach($product->product_attributes as $productAttribute)
                    @include('backend.modules.product.attribute._attribute_row')
                @endforeach
            @endif

            </tbody>
        </table>
    </div>


@endsection
