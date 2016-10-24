
<div class="form-group">
    <h4>{{ trans('general.on_sale') }}</h4>
    <hr>
    <div class="table-container">
        <table class="table table-striped table-bordered table-hover"
               id="datatable_sales">
            <thead>
            <tr role="row" class="heading">
                <th width="10%"> Date</th>
                <th width="10%"> Sale Price
                    <small> - KWD</small>
                </th>
                <th width="5%"> Home Delivery
                    <small> - KWD</small>
                </th>
                <th width="3%"> {{ trans('general.on_sale') }}</th>
                <th width="3%"> {{ trans('general.on_sale_on_homepage') }}</th>
            </tr>
            <tr role="row" class="filter">
                <td>
                    <div class="input-group input-large date-picker input-daterange"
                         data-date={!! Carbon::now() !!} data-date-format="yyyy/mm/dd 00:00:00">
                        {{ Form::text('start_sale',(isset($productMeta)) ? $productMeta->start_sale->format('Y-m-d') : null,['class'=>'form-control']) }}
                        <span class="input-group-addon"> to </span>
                        {{ Form::text('end_sale',(isset($productMeta)) ? $productMeta->end_sale->format('Y-m-d') : null,['class'=>'form-control']) }}
                    </div>
                </td>
                <td>
                    <input type="number" class="form-control form-filter input-sm"
                           name="sale_price" value="{{ (isset($productMeta)) ? $productMeta->sale_price : null }}" placeholder="000.000"/>
                </td>
                <td>
                    <input type="number" class="form-control form-filter input-sm"
                           name="home_delivery_fees" value="{{ (isset($productMeta)) ? $productMeta->home_delivery_fees : null }}" placeholder="00.00"/>
                </td>

                <td>
                    <label class="mt-radio"> on sale
                        {!! Form::radio('on_sale', true,old('on_sale'),['class' => 'form-control form-filter input-sm']) !!}
                        <span></span>
                    </label>
                    <label class="mt-radio"> not on sale
                        {!! Form::radio('on_sale', false,old('on_sale'),['class' => 'form-control form-filter input-sm']) !!}
                        <span></span>
                    </label>
                </td>
                <td>
                    <label class="mt-radio"> on sale & on Homepage
                        {!! Form::radio('on_sale_on_homepage', true,old('on_sale_on_homepage'),['class' => 'form-control form-filter input-sm']) !!}
                        <span></span>
                    </label>
                    <label class="mt-radio"> not on sale & on Homepage
                        {!! Form::radio('on_sale_on_homepage', false,old('on_sale_on_homepage'),['class' => 'form-control form-filter input-sm']) !!}
                        <span></span>
                    </label>
                </td>
            </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>