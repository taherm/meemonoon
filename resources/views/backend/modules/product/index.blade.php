@extends('backend.layouts.master')

@section('content')
    <div class="table-container">
        <table class="table table-striped table-bordered table-hover" id="products">
            <thead>
            <tr>
                <th> id</th>
                <th> sku</th>
                <th> name</th>
                <th> price</th>
                <th> sale_price</th>
                <th> total Qty</th>
                <th> edit</th>
                <th> gallery</th>
                <th> status</th>
                <th> categories</th>
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
                    <td> {{$product->product_meta->price}} </td>
                    <td> {{$product->product_meta->sale_price}} </td>
                    <td> {{$product->totalQty }} </td>
                    <td>
                        <a href="{{ route('backend.product.edit',[$product->id,'product_id' => $product->id]) }}"
                           class="btn btn-outline btn-circle green btn-xs" title="edit product"><i
                                    class="fa fa-edit"></i></a>
                    </td>
                    <td>
                        <a href="{{ route('backend.gallery.index',['product_id' => $product->id]) }}"
                           class="btn btn-outline btn-circle dark btn-xs blue" title="edit gallery"><i
                                    class="fa fa-image"></i></a>
                    </td>
                    @if($product->active)
                        <td>
                            <span class="label label-sm label-success"> active </span>
                        </td>
                    @else
                        <td>
                            <span class="label label-sm label-warning"> not active </span>
                        </td>
                    @endif
                    <td>
                        <ul>
                            @if($product->categories->count() > 0)
                                @foreach($product->categories as $cat)
                                    <li>{{ $cat->name .'-'. $cat->id}}</li>
                                @endforeach
                            @else
                                <label class="label-sm label-danger">not assigned to category</label>
                            @endif
                        </ul>
                    </td>
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