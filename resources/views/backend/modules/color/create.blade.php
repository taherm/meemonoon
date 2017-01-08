@extends('backend.layouts.master')

@section('styles')
    @parent
    <link rel="stylesheet" href="http://bgrins.github.io/spectrum/spectrum.css">
@endsection

@section('content')
    {{ Form::open(['route' => 'backend.color.store','method'=>'POST','class'=>'form-horizontal']) }}
    <div class="form-body">
        <div class="form-group">
            <div class="col-lg-3">
                <label class="control-label" for="name_ar">color_ar:
                    <span class="required"> * </span>
                </label>
                {!! Form::text('name_ar', old('name_ar') ,['class' => 'form-control','required']) !!}
            </div>
            <div class="col-lg-3">
                <label class="control-label" for="name_en">color_en:
                    <span class="required"> * </span>
                </label>
                {!! Form::text('name_en', old('name_en') ,['class' => 'form-control','required']) !!}
            </div>
            <div class="col-md-3">
                <label class="control-label" for="color">color code:
                    <span class="required">*</span>
                </label>
                <input type='color' name="code" id="customColor" class="form-control"/>
                <input type='text' disabled  id="colorCode" class="form-control" value=""/>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-3 col-lg-push-1 pull-right">
                {{ Form::submit('submit',['class'=>'btn btn-outline btn-circle btn-primary']) }}
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection

@section('scripts')
    @parent
    <script src="http://bgrins.github.io/spectrum/spectrum.js"></script>
    <script>
        $("#customColor").spectrum({
            color: "#ECC",
            showInput: true,
            className: "full-spectrum",
            showInitial: true,
            showPalette: true,
            showSelectionPalette: true,
            maxSelectionSize: 10,
            preferredFormat: "hex",
            localStorageKey: "spectrum.demo",
            move: function (color) {

            },
            show: function () {

            },
            beforeShow: function () {

            },
            hide: function () {

            },
            change: function(color) {
                $('#colorCode').attr('value',color.toString());
            },
        });
    </script>
@endsection
