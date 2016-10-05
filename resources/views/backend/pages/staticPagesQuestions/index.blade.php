@extends('backend.layouts.master')

@section('content')
    <div class="table-container">
        <table class="table table-striped table-bordered table-hover" id="faqs">
            <thead>
            <tr>
                <th> id</th>
                <th> question</th>
                <th> answer</th>
                <th> edit</th>
                <th> delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($QAs as $qa)
                <tr>
                    <td> {{$qa->id}}</td>
                    <td> {{$qa->question_en}} </td>
                    <td> {{$qa->answer_en}} </td>
                    <td>
                        @if($qa->page == 1)
                            <a href="{{ route('backend.pages.faqs.edit',$qa->id) }}" class="btn btn-outline btn-circle green btn-sm purple"><i class="fa fa-edit"></i> Edit</a>
                        @elseif($qa->page == 2)
                            <a href="{{ route('backend.pages.returnPolicy.edit',$qa->id) }}" class="btn btn-outline btn-circle green btn-sm purple"><i class="fa fa-edit"></i> Edit</a>
                        @else
                            <a href="{{ route('backend.pages.shippingOrders.edit',$qa->id) }}" class="btn btn-outline btn-circle green btn-sm purple"><i class="fa fa-edit"></i> Edit</a>
                        @endif
                    </td>
                    <td>
                        @if($qa->page == 1)
                            {{ Form::open(['route' => ['backend.pages.faqs.destroy', $qa->id] , 'method' => 'POST']) }}
                                <button type="submit" class="btn btn-outline btn-circle dark btn-sm black"><i class="fa fa-trash-o"></i>Delete</button>
                            {{ Form::close() }}
                        @elseif($qa->page == 2)
                            {{ Form::open(['route' => ['backend.pages.returnPolicy.destroy', $qa->id] , 'method' => 'POST']) }}
                                <button type="submit" class="btn btn-outline btn-circle dark btn-sm black"><i class="fa fa-trash-o"></i>Delete</button>
                            {{ Form::close() }}
                        @else
                            {{ Form::open(['route' => ['backend.pages.shippingOrders.destroy', $qa->id] , 'method' => 'POST']) }}
                                <button type="submit" class="btn btn-outline btn-circle dark btn-sm black"><i class="fa fa-trash-o"></i>Delete</button>
                            {{ Form::close() }}
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection