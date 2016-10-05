@extends('backend.layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-2 pull-right">
                <button class="btn btn-danger btn-md btn-rounded" href="{{ url('backend/newsletter/campaign') }}">create campaign</button>
            </div>
        </div>
    </div>
    <div class="table-container">
        <table class="table table-striped table-bordered table-hover" id="users">
            <thead>
            <tr>
                <th> id</th>
                <th> name</th>
                <th> email</th>
                <th> actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($subscribers as $subscriber)
                <tr>
                    <td> {{$subscriber->id}} </td>
                    <td> {{$subscriber->name}} </td>
                    <td> {{$subscriber->email}} </td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-xs green dropdown-toggle" type="button"
                                    data-toggle="dropdown" aria-expanded="false"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('backend.newsletter.edit',$subscriber->id) }}">
                                        <i class="fa fa-eye"></i> edit subscirber</a>
                                </li>
                                <li>
                                    {{ Form::open(['route' => ['backend.newsletter.destroy',$subscriber->id],'method' => 'DELETE','class' => 'form-horizontal col-lg-12']) }}
                                    <button href="#" type="submit" class="btn btn-danger btn-xs btn-rounded">
                                        <i class="fa fa-remove"></i> delete subscriber</button>
                                    {{ Form::close() }}
                                </li>

                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
