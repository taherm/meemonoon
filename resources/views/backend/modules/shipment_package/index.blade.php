@extends('backend.layouts.master')

@section('content')
    <div class="table-container">
        <table class="table table-striped table-bordered table-hover" id="coupons">
            <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>slug_ar</th>
                <th>slug_en</th>
                <th>charge</th>
                <th>active</th>
                <th>is_local</th>
                <th>actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($elements as $element)
                <tr>
                    <td>{{ $element->id }}</td>
                    <td>{{ $element->name }}</td>
                    <td>{{ $element->slug_ar}}</td>
                    <td>{{ $element->slug_en}}</td>
                    <td>
                        {{ $element->charge }}
                    </td>
                    <td>
                        <span class="label {{ $element->active ? 'label-success' : 'label-default' }}">{{ $element->active ? 'active' : 'n/a'}}</span>
                    </td>
                    <td>
                        <span class="label {{ $element->is_local ? 'label-succes'  : 'label-default'}}">{{ $element->is_local ? 'is_local' : 'N/a' }}</span>
                    </td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn green btn-xs btn-outline dropdown-toggle"
                                    data-toggle="dropdown"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li>
                                    <a href="{{ route('backend.package.edit',$element->id) }}">
                                        <i class="fa fa-fw fa-edit"></i> Edit</a>
                                </li>
                                {{--<li>--}}
                                    {{--<a data-toggle="modal" href="#" data-target="#basic"--}}
                                       {{--data-title="Delete"--}}
                                       {{--data-content="Are you sure you want to delete {{ $element->name  }}? "--}}
                                       {{--data-form_id="delete-{{ $element->id }}"--}}
                                    {{-->--}}
                                        {{--<i class="fa fa-fw fa-recycle"></i> delete</a>--}}
                                    {{--<form method="post" id="delete-{{ $element->id }}"--}}
                                          {{--action="{{ route('backend.package.destroy',$element->id) }}">--}}
                                        {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                                        {{--<input type="hidden" name="_method" value="delete"/>--}}
                                        {{--<button type="submit" class="btn btn-del hidden">--}}
                                            {{--<i class="fa fa-fw fa-times-circle"></i> delete--}}
                                        {{--</button>--}}
                                    {{--</form>--}}
                                {{--</li>--}}
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection