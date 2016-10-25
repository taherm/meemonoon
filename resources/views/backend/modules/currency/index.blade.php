@extends('backend.layouts.master')

@section('content')
    <div class="table-container">
        <table class="table table-striped table-bordered table-hover" id="currencies">
            <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>code</th>
                <th>symbol</th>
                <th>format</th>
                <th>exchange_rate</th>
            </tr>
            </thead>
            <tbody>
            @foreach($currencies as $currency)
                <tr>
                    <td>{{ $currency->id }}</td>
                    <td>{{ $currency->name }}</td>
                    <td>{{ $currency->code }}</td>
                    <td>{{ $currency->symbol }}</td>
                    <td>{{ $currency->format }}</td>
                    <td>{{ $currency->exchange_rate }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

