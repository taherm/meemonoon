<div class="form-group">
    <div class="col-lg-6">
        <label for="weight" class="control-label">
            {{ ($labelOne) ? trans('general.'.$labelOne) : null }}
        </label>
        {{ ($elementOne) ? $elementOne : null }}
    </div>
    <div class="col-lg-6">
        <label for="weight" class="control-label">
            {{ ($labelTow) ? trans('general.'.$labelTow) : null }}
        </label>
        {{ ($elementTow) ? $elementTow : null }}
    </div>
</div>