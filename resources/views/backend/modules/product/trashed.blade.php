@extends('backend.layouts.master')

@section('content')
    <div class="table-container">
        <table class="table table-striped table-bordered table-hover" id="products">
            <thead>
            <tr>
                <th> id</th>
                <th> sku</th>
                <th> name</th>
                <th> created_at</th>
                <th> delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td> {{ $product->id }} </td>
                    <td> {{ str_limit($product->sku,10) }} </td>
                    <td> {{$product->name}} </td>
                    <td> {{ $product->created_at->diffForHumans() }}</td>
                    <td>
                        {{ Form::open(['route' => ['backend.product.destroy',$product->id],'method' => 'DELETE']) }}
                        <button class="btn btn-outline btn-circle dark btn-sm red"><i
                                    class="fa fa-trash-o"></i></button>
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection