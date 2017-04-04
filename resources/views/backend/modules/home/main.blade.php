@extends('backend.layouts.master')


@section('body')

    <div class="col-lg-12">
        <div class="text-info">
            <ul>
                <li>
                    *related product
                    it fetches products from the same parent category related to the current product selected.
                </li>
                <li>
                    *best sale
                    all products that are currently active and it has order that has been completed and has on_homepage feature enabled.
                </li>
            </ul>
        </div>
    </div>

@stop