@if(isset($productMeta))
    {{ Form::model($productMeta,['route' => ['backend.meta.update',$productMeta->product_id],'method'=>'PATCH','files' => true,'class' => 'form-horizontal']) }}
@else
    {{ Form::open(['route' => 'backend.meta.store','method'=>'POST','files' => true,'class' => 'form-horizontal']) }}
@endif

<div class="form-body">
    {{ Form::hidden('product_id',request()->product_id) }}
    @include('backend.partials.forms._form_group',
    [
    'labelOne' => 'price*',
    'elementOne' => Form::text('price', old('price') ,['class' => 'form-control','required', 'placeholder'=> '00.000']),
    'labelTow' => 'weight*' ,
     'elementTow' => Form::text('weight', old('weight') ,['class'=>'form-control','required'])
    ])


    @include('backend.partials.forms._form_group',
    [
    'labelOne' => 'description_ar*',
    'elementOne' => Form::textarea('description_ar',old('description_ar') ,['class' => 'form-control','required']),
    'labelTow' => 'description_en*' ,
    'elementTow' => Form::textarea('description_en',old('description_en'),['class' => 'form-control','required'])
    ])

    @include('backend.partials.forms._form_group',
    ['labelOne' => 'notes_ar*',
    'elementOne' => Form::textarea('notes_ar',old('notes_ar'),['class' => 'form-control', 'data-provide' => 'markdown']),
    'labelTow' => 'notes_en*' ,
     'elementTow' => Form::textarea('notes_en',old('notes_en'),['class' => 'form-control'])
    ])

    <div class="col-lg-12">
        <h4>{{ trans('general.availability') }}</h4>
    </div>
    <div class="form-group">
        <div class="col-lg-12">
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
                        <small>by default is false</small>
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
                        <label class="label" for="image" style="color: black;"> image* best fit 1200*1200</label>
                        {!! Form::file('image',['class' => 'form-control', 'required']) !!}
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label class="label" for="size_chart_image" style="color: black;"> size charts</label>
                        {!! Form::file('size_chart_image',['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        @foreach($sizeCharts as $chart)
                            {!! Form::radio('size_chart',$chart->images->first()->thumb_url) !!}
                            : {{ $chart->description_en }}</br>
                        @endforeach
                    </div>
                    @if(isset($productMeta))
                        <img style="width : 120px;"
                             src="{{ asset('img/uploads/thumbnail/'.$productMeta->size_chart_image) }}" alt=""
                             class="img-responsive img-thumbnail">
                    @endif
                </div>
            </div>
        </div>
    </div>


        @include('backend.partials.forms._productSale')



    <div class="form-group">
        <div class="col-lg-2 col-lg-push-9">
            {{ Form::submit('submit',['class' => 'btn btn-outlined btn-primary btn-circle']) }}
        </div>
    </div>

</div>

{!! Form::close() !!}

