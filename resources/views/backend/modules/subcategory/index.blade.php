@extends('backend.layouts.master')

@section('content')
    <div class="table-container">
        <table class="table table-striped table-bordered table-hover" id="subcategories">
            <thead>
            <tr>
                <th> id</th>
                <th> name ar</th>
                <th> name en</th>
                <th> parent</th>
                <th> children</th>
                <th> edit</th>
                <th> assign child</th>
                <th> delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($subcategories as $subcategory)
                <tr>
                    <td> {{$subcategory->id}}</td>
                    <td> {{$subcategory->name_ar }} </td>
                    <td> {{$subcategory->name_en}} </td>
                    <td> {{$subcategory->parent['name_en']}} </td>
                        <td>
                            @if($subcategory->children && !$subcategory->children->isEmpty())
                            <ul>
                                @foreach($subcategory->children as $child)
                                    <li>{{ $child->name }}
                                        {{ Form::open(['route' => ['backend.subcategory.destroy', $child->id] , 'method' => 'DELETE']) }}
                                        <button type="submit" class="btn btn-outline btn-circle dark btn-sm black">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                        {{ Form::close() }}</li>
                                @endforeach
                            </ul>
                            @else
                                N/A
                            @endif
                        </td>
                    <td>
                        <a href="{{ route('backend.subcategory.edit',$subcategory->id) }}"
                           class="btn btn-outline btn-circle green btn-sm purple"><i class="fa fa-edit"></i> Edit
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('backend.subcategory.create',['sub_id' => $subcategory->id]) }}"
                           class="btn btn-outline btn-circle green btn-sm blue"><i class="fa fa-plus"></i> Assign Child
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