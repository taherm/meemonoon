@extends('backend.layouts.master')

@section('content')
    <div class="table-container">
        <table class="table table-striped table-bordered table-hover" id="subcategories">
            <thead>
            <tr>
                <th> id</th>
                <th> name_en</th>
                <th> name_ar</th>
                <th> parent</th>
                <th> description en </th>
                <th> description ar</th>
                <th> edit</th>
                <th> delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($subcategories as $subcategory)
                <tr>
                    <td> {{$subcategory->id}}</td>
                    <td> {{$subcategory->name_en}} </td>
                    <td> {{$subcategory->name_ar}} </td>
                    <td> {{$subcategory->parent['name_en']}} </td>
                    <td> {{$subcategory->description_en}} </td>
                    <td> {{$subcategory->description_ar}} </td>
                    <td>
                        <a href="{{ route('backend.subcategory.edit',$subcategory->id) }}"
                           class="btn btn-outline btn-circle green btn-sm purple"><i class="fa fa-edit"></i> Edit
                        </a>
                    </td>
                    <td>
                        {{ Form::open(['route' => ['backend.subcategory.destroy', $subcategory->id] , 'method' => 'DELETE']) }}
                        <button type="submit" class="btn btn-outline btn-circle dark btn-sm black"><i
                                    class="fa fa-trash-o"></i>
                            Delete
                        </button>
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection