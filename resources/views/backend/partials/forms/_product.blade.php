@section('panel-title')
Create New Product
@endsection

@section('content')
    @if(isset($product))
        {{ Form::model($product,['route' => ['backend.product.update',$product->id],'method'=>'PATCH','files' => 'true','class' => 'form-horizontal']) }}
    @else
        {{ Form::open(['route' => 'backend.product.store','method'=>'POST','files' => 'true','class'=>'form-horizontal']) }}
    @endif
    <div class="form-body">
        <div class="form-group">
            <label class="col-md-2 control-label">name_ar:
                <span class="required"> * </span>
            </label>
            <div class="col-md-3">
                {!! Form::text('name_ar', old('name_ar') ,['class' => 'form-control','required']) !!}
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">name_en:
                    <span class="required"> * </span>
                </label>
                <div class="col-md-3">
                    {!! Form::text('name_en',old('name_en'),['class' => 'form-control', 'required']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">id
                :
                <span class="required"> * </span>
            </label>
            <div class="col-md-3">
                {!! Form::text('sku',old('sku'),['class' => 'form-control','required']) !!}
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">status:
                    <span class="required"> * </span>
                </label>
                <div class="col-md-3">
                    <select class="table-group-action-input form-control input-medium"
                            name="active">
                        <option value="">select</option>
                        <option value="1" {{ (isset($product->active) && $product->active) ? 'selected' : '' }}>{{ trans('general.active') }}</option>
                        <option value="0" {{ (isset($product->active) && !$product->active) ? 'selected' : '' }}>{{ trans('general.not_active') }}</option>
                    </select>
                </div>
            </div>
        </div>

        @include('backend.partials.forms._categories')
        @include('backend.partials.forms._tags')
        <div class="form-group">

            <button class="btn btn-success {!! Session::get('pull-reverse') !!}">
                <i class="fa fa-check"></i> Save
            </button>

        </div>
    </div>
    {!! Form::close() !!}
@endsection

