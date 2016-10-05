@extends('backend.layouts.master')

@section('content')
    <div class="table-container">
        <table class="table table-striped table-bordered table-hover" id="coupons">
            <thead>
            <tr>
                <th> id</th>
                <th>name</th>
                <th>edit</th>
            </tr>
            </thead>
            <tbody>
            @foreach($sizes as $size)
                <tr>
                    <td> {{$size->id}}</td>
                    <td> {{$size->size}} </td>
                    <td>
                        <a href="{{ route('backend.size.edit',$size->id) }}"
                           class="btn btn-outline btn-circle green btn-sm purple"><i class="fa fa-edit"></i> Edit
                        </a>
                    </td>
                    {{--<td>--}}
                        {{--{{ Form::open(['route' => ['backend.size.destroy', $size->id] , 'method' => 'DELETE']) }}--}}
                        {{--<button type="submit" class="btn btn-outline btn-circle dark btn-sm black"><i--}}
                                    {{--class="fa fa-trash-o"></i>--}}
                            {{--Delete--}}
                        {{--</button>--}}
                        {{--{{ Form::close() }}--}}
                    {{--</td>--}}
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection