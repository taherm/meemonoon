{!! Form::open(['route' => ['newsletter.store'], 'method' =>
            'POST'],['class'=>'form-horizontal','role'=>'form']) !!}
<div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label"></label>

    <div class="col-lg-12">
        <input type="email" name="email" class="form-control" id="inputEmail1"
               placeholder="{{ trans('general.email') }}">
    </div>
</div>
<div class="form-group">
    <label for="text1" class="col-lg-4 control-label"></label>

    <div class="col-lg-12">
        <input type="text" name="name" class="form-control" id="text1"
               placeholder="{{ trans('general.name') }}">
    </div>
</div>
<div class="form-group">
    <div class="col-lg-6 col-lg-push-3 text-center">
        <button type="submit"
                class="btn btn-success text-center">{{ trans('general.subscribe') }}</button>
    </div>
</div>
{!! Form::close() !!}

