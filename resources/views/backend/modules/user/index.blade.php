@extends('backend.layouts.master')

@section('page-title')
    <h3 class="page-title"> Index Form from the page title
        <small>form layouts</small>
    </h3>
@stop



@section('content')
        <div class="table-container">
            <table class="table table-striped table-bordered table-hover" id="users">
                <thead>
                <tr>
                    <th> Id </th>
                    <th> Name</th>
                    <th> Username</th>
                    <th> Email</th>
                    <th> Status</th>
                    <th> Phone</th>
                    <th width="20%"> Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td> {{$user->id}} </td>
                        <td> {{$user->firstname . ' ' . $user->lastname}} </td>
                        <td> {{$user->username}} </td>
                        <td> {{$user->email}} </td>
                        @if($user->active)
                            <td><span class="label label-sm label-success"> Active </span></td>
                        @else
                            <td><span class="label label-sm label-warning"> Suspended </span></td>
                        @endif
                        <td> {{$user->phone}} </td>
                        <td>
                            {{ Form::open(['route' => ['backend.user.suspend', $user->id] , 'method' => 'POST', 'style' => 'float:left;']) }}
                            @if($user->active)
                                <button type="submit" class="btn btn-outline btn-circle green btn-sm red"><i class="fa fa-fw fa-unlock"></i> suspend</button>
                            @else
                                <button type="submit" class="btn btn-outline btn-circle green btn-sm green"><i class="fa fa-fw fa-lock"></i> activate</button>
                            @endif
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
@endsection
