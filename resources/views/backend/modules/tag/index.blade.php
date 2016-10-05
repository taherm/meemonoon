@extends('backend.layouts.master')


@section('content')
    <div class="table-container">
        <table class="table table-striped table-bordered table-hover" id="tags">
            <thead>
            <tr>
                <th> id</th>
                <th> slug</th>
                <th> name</th>
                <th> edit</th>
                <th> delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tags as $tag)
                <tr>
                    <td> {{$tag->id}}</td>
                    <td> {{$tag->slug}} </td>
                    <td> {{$tag->name}} </td>
                    <td>
                        <a href="{{ route('backend.tag.edit',$tag->id) }}"
                           class="btn btn-outline btn-circle green btn-sm purple"><i class="fa fa-edit"></i> Edit
                        </a>
                    </td>
                    <td>
                        {{ Form::open(['route' => ['backend.tag.destroy', $tag->id] , 'method' => 'DELETE']) }}
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