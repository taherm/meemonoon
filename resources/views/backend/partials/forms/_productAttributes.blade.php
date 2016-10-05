@if(isset($productAttribute))
    {{ Form::model($productAttribute,['route' => ['backend.attribute.update',$productAttribute->id],'method' => 'PATCH','class' => 'form-horizontal']) }}
    {{ Form::hidden('product_id',$productAttribute->product_id) }}
@else
    {{ Form::open(['route' => ['backend.attribute.store'],'method' => 'POST','class' => 'form-horizontal']) }}
    {{ Form::hidden('product_id',$product->id) }}
@endif
@if(isset($productAttributes) && count($productAttributes) > 0)
    <div class="table-container">
        <table class="table table-striped table-bordered table-hover"
               id="datatable_sales">
            <thead>
            <tr role="row" class="heading">
                <th>size</th>
                <th>color</th>
                <th>quantity</th>
                <th>notes_ar</th>
                <th>notes_en</th>
                <th>action</th>
            </tr>
            @foreach($productAttributes as $productAttribute)
                <tr role="row" class="filter">
                    <td>{{ $productAttribute->sizeName }}</td>
                    <td>{{ $productAttribute->colorName }}</td>
                    <td>{{ $productAttribute->qty }}</td>
                    <td>{{ $productAttribute->notes_en }}</td>
                    <td>{{ $productAttribute->notes_en }}</td>
                    <td>{{ Form::open(['route' => ['backend.attribute.edit',$productAttribute->id],'method' => 'GET']) }}
                        {{ Form::hidden('product_id',$productAttribute->product_id) }}
                        <button type="submit" class="btn btn-circle btn-outline btn-warning btn-xs"><i class="fa fa-pencil"></i></button>
                        {{Form::close()}}
                    </td>
                </tr>
            @endforeach
            </thead>
        </table>
    </div>
@endif
<div class="form-group">
    <h4>Add New Product Attribute</h4>
    <hr>
    <div class="table-container">
        <table class="table table-striped table-bordered table-hover"
               id="datatable_sales">
            <thead>
            <tr role="row" class="heading">
                <th>size</th>
                <th>color</th>
                <th>quantity</th>
                <th>notes_ar</th>
                <th>notes_en</th>
                <th>action</th>
            </tr>
            <tr role="row" class="filter">
                <td>
                    <select name="size_id" class="form-control">
                        @foreach($sizes as $size)
                            <option value="{{ $size->id }}" {{ (isset($productAttribute) && $productAttribute->size_id === $size->id) ? 'selected' : null }}>{{ $size->size }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="color_id" class="form-control">
                        @foreach($colors as $color)
                            <option value="{{ $color->id }}" {{ (isset($productAttribute) &&$productAttribute->color_id === $color->id) ? 'selected' : null }}>{{ $color->color }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="number" class="form-control form-filter input-sm"
                           name="qty" value="{{ (isset($productAttribute) ? $productAttribute->qty : null) }}"/>
                </td>
                <td>
                    <input type="text" class="form-control form-filter input-sm"
                           name="notes_en"
                           value="{{ (isset($productAttribute) ? $productAttribute->notes_en : null) }}"/>
                </td>

                <td>
                    <input type="text" class="form-control form-filter input-sm"
                           name="notes_ar"
                           value="{{ (isset($productAttribute) ? $productAttribute->notes_ar : null) }}"/>
                </td>
                <td>
                    {{ Form::submit('save',['class' => 'btn btn-sm btn-circle btn-outlined btn-primary']) }}
                </td>
            </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
{{ Form::close() }}