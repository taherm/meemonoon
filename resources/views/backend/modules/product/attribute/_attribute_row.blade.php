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
    <td>{{ Form::open(['route' => ['backend.attribute.destroy',$productAttribute->id],'method' => 'DELETE']) }}
        {{ Form::hidden('product_id',$productAttribute->product_id) }}
        <button type="submit" class="btn btn-circle btn-outline btn-danger btn-xs"><i class="fa fa-times"></i></button>
        {{Form::close()}}
    </td>
</tr>