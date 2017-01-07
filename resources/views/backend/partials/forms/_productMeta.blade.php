@if(isset($productMeta))
    {{ Form::model($productMeta,['route' => ['backend.meta.update',$productMeta->product_id],'method'=>'PATCH','files' => 'true']) }}
@else
    {{ Form::open(['route' => 'backend.meta.store','method'=>'POST','files' => 'true']) }}
@endif

{{ Form::hidden('product_id',request()->product_id) }}
<div class="form-body">
    @include('backend.partials.forms._form_group',
    [
    'labelOne' => 'price',
    'elementOne' => Form::text('price', old('price') ,['class' => 'form-control','required', 'placeholder'=> '00.000']),
    'labelTow' => 'weight' ,
     'elementTow' => Form::text('weight', old('weight') ,['class'=>'form-control','required'])
    ])


    @include('backend.partials.forms._form_group',
    [
    'labelOne' => 'description_ar',
    'elementOne' => Form::textarea('description_ar',old('description_ar') ,['class' => 'form-control']),
    'labelTow' => 'description_en' ,
    'elementTow' => Form::textarea('description_en',old('description_en'),['class' => 'form-control'])
    ])

    @include('backend.partials.forms._form_group',
    ['labelOne' => 'notes_ar',
    'elementOne' => Form::textarea('notes_ar',old('notes_ar'),['class' => 'form-control', 'data-provide' => 'markdown']),
    'labelTow' => 'notes_en' ,
     'elementTow' => Form::textarea('notes_en',old('notes_en'),['class' => 'form-control'])
    ])

    <div class="form-group col-lg-12 text-left small">
        <h4>{{ trans('general.availability') }}</h4>
        <hr>
        <div class="mt-radio-list">
            <div class="col-lg-4">
                <label class="mt-radio"> on home delivery availability
                    {!! Form::radio('home_delivery_availability',true, old('home_delivery_availability'),['class' => 'form-control']) !!}
                    <span></span>
                </label>
                <label class="mt-radio"> not on home delivery availability
                    {!! Form::radio('home_delivery_availability',false, old('home_delivery_availability'),['class' => 'form-control']) !!}
                    <span></span>
                </label>
                <label class="mt-radio"> on shipment_availability
                    {!! Form::radio('shipment_availability', true,old('shipment_availability'),['class' => 'form-control']) !!}
                    <span></span>
                </label>
                <label class="mt-radio"> not on shipment_availability
                    {!! Form::radio('shipment_availability', false,old('shipment_availability'),['class' => 'form-control']) !!}
                    <span></span>
                </label>
            </div>
            <div class="col-lg-4">
                <label class="mt-radio"> on_homepage
                    {!! Form::radio('on_homepage', true,old('on_homepage'),['class' => 'form-control']) !!}
                    <span></span>
                </label>
                <label class="mt-radio"> not on_homepage
                    {!! Form::radio('on_homepage', false,old('on_homepage'),['class' => 'form-control']) !!}
                    <span></span>
                </label>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label class="label" for="image" style="color: black;"> image</label>
                    {!! Form::file('image',['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label class="label" for="size_chart_image" style="color: black;"> size charts</label>
                    {!! Form::file('size_chart_image',['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
    </div>

    @include('backend.partials.forms._productSale')


    <div class="col-lg-12 col-lg-push-10">
        {{ Form::submit('submit',['class' => 'btn btn-outlined btn-primary btn-circle']) }}
    </div>


</div>

{!! Form::close() !!}

