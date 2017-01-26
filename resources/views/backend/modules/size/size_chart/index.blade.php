@extends('backend.layouts.master')

@section('content')
    <div class="col-lg-2 col-lg-push-10" style="margin: 15px;">
        <a href="{{ route('backend.chart.create') }}"
           class="btn btn-outline btn-circle green btn-sm purple"><i class="fa fa-edit"></i> Create New
        </a>
    </div>
    <div class="table-container">
        <table class="table table-striped table-bordered table-hover" id="coupons">
            <thead>
            <tr>
                <th>id</th>
                <th>name_en</th>
                <th>image</th>
                <th>edit</th>
            </tr>
            </thead>
            <tbody>
            @foreach($sizeCharts as $chart)
                <tr>
                    <td> {{$chart->id}} </td>
                    <td> {{$chart->description_en}} </td>
                    <td><img style="width : 120px;" src="{!! asset('img/uploads/thumbnail/'.$chart->images->first()->thumb_url)  !!}" class="img-responsive thumbnail" alt=""></td>
                    <td>
                        <a href="{{ route('backend.chart.edit',$chart->id) }}"
                           class="btn btn-outline btn-circle green btn-sm purple"><i class="fa fa-edit"></i> Edit
                        </a>
                    </td>
                    <td>
                        {{ Form::open(['route' => ['backend.chart.destroy', $chart->id] , 'method' => 'DELETE']) }}
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