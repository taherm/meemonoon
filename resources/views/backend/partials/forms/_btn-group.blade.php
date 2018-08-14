{{--<div class="form-actions">--}}
    {{--<div class="col-lg-3 col-lg-push-9">--}}
        {{--<button type="submit" id="submit" class="btn green btn-circle-left">Submit</button>--}}
        {{--<a href="{!! url()->previous() !!}" class="btn red btn-circle-right">Cancel</a>--}}
    {{--</div>--}}
{{--</div>--}}
<div class="form-actions right">
    {{--<button type="button" class="btn default">Cancel</button>--}}
    <a href="{!! url()->previous() !!}" class="btn default">Cancel</a>
    <button type="submit" class="btn blue">
        <i class="fa fa-check"></i> Save
    </button>
</div>