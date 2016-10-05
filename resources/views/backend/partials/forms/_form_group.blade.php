<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="weight" class="control-label">
                {{ ($labelOne) ? trans('general.'.$labelOne) : null }}
            </label>
            {{ ($elementOne) ? $elementOne : null }}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="weight" class="control-label">
                {{ ($labelTow) ? trans('general.'.$labelTow) : null }}
            </label>
            {{ ($elementTow) ? $elementTow : null }}
        </div>
    </div>
</div>