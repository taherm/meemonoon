{!! Form::open(['route' => 'newsletter.store', 'method' =>
            'POST'],['class'=>'form-horizontal','role'=>'form']) !!}
<div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label"></label>

    <div class="col-lg-12">
        {!! Form::text('email',['class' => 'form-control', 'placeholder' => trans('general.email'), 'required']) !!}
    </div>
</div>
<div class="form-group">
    <label for="text1" class="col-lg-4 control-label"></label>

    <div class="col-lg-12">
        {!! Form::text('name',['class' => 'form-control', 'placeholder' => trans('general.name'), 'required']) !!}
    </div>
</div>
<div class="form-group">
    <div class="col-lg-6 col-lg-push-3 text-center">
        <button type="submit"
                class="btn btn-success text-center">{!! trans('general.subscribe')  !!}</button>
    </div>
</div>
{!! Form::close() !!}

