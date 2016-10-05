@extends('backend.layouts.master')

@section('content')
    <div class="table-container">
        <table class="table table-striped table-bordered table-hover" id="currencies">
            <thead>
            <tr>
                <th>id</th>
                <th>title</th>
                <th>title_en</th>
                <th>title_ar</th>
                <th>name_en</th>
                <th>name_ar</th>
                <th>iso_3166_3</th>
                <th>country_id</th>
                <th>symbol_left</th>
                <th>symbol_right</th>
                <th>code</th>
                <th>decimal_place</th>
                <th>value</th>
                {{--<th>decimal_point</th>--}}
                {{--<th>thousand_point</th>--}}
                <th>status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($currencies as $currency)
                <tr>
                    <td>{{ $currency->id }}</td>
                    <td>{{ $currency->title }}</td>
                    <td>{{ $currency->title_en }}</td>
                    <td>{{ $currency->title_ar }}</td>
                    <td>{{ $currency->name_en }}</td>
                    <td>{{ $currency->name_ar }}</td>
                    <td>{{ $currency->iso_3166_3 }}</td>
                    <td>{{ $currency->country_id }}</td>
                    <td>{{ $currency->symbol_left }}</td>
                    <td>{{ $currency->symbol_right }}</td>
                    <td>{{ $currency->code }}</td>
                    <td>{{ $currency->decimal_place }}</td>
                    <td>{{ $currency->value }}</td>
                    {{--<td>{{ $currency->decimal_point }}</td>--}}
                    {{--<td>{{ $currency->thousand_point }}</td>--}}

                    <td>
                        <span class="label label-sm {!! ($currency->status) ? 'label-success' : 'label-error'  !!}">
                            {{ ($currency->status) ? 'active' : 'not active' }}
                        </span>
                    </td>
                    {{--<td>{{ route('backend.currency.edit', $currency->id)}}</td>--}}
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

