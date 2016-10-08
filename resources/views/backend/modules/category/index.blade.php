@extends('backend.layouts.master')

@section('content')
    <div class="table-container">
        <table class="table table-striped table-bordered table-hover" id="categories">
            <thead>
            <tr>
                <th> id</th>
                <th> name en</th>
                <th> name ar</th>
                <th> description en</th>
                <th> description ar</th>
                <th> edit</th>
                <th> delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td> {{$category->id}}</td>
                    <td> {{$category->name_en}} </td>
                    <td> {{$category->name_ar}} </td>
                    <td> {{$category->description_en}} </td>
                    <td> {{$category->description_ar}} </td>
                    <td>
                        <a href="{{ route('backend.category.edit',$category->id) }}"
                           class="btn btn-outline btn-circle green btn-sm purple"><i class="fa fa-edit"></i> Edit
                        </a>
                    </td>
                    <td>
                        {{ Form::open(['route' => ['backend.category.destroy', $category->id] , 'method' => 'DELETE']) }}
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