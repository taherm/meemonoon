<div class="price-filter-area single-layout">
    <div class="price-filter">
        <div class="layout-title">
            <h4>{{ trans('general.price') }}</h4>
        </div>
        <p>
            {{ trans('general.range') }}:
            <input type="text" id="amount" readonly style="border:0; color:#F3652A; font-weight:bold;">
            <input id="parentId" type="hidden" name="parent" value="{{ $parentId }}">
        </p>
        <div id="slider-range"></div>
    </div>
</div>
<!-- End Price Filter Area -->

@section('customScripts')
    @parent
    <script type="text/javascript">
        $(document).ready(function() {
            function getParameterByName(name) {
                name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
                var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
                        results = regex.exec(location.search);
                return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
            }

            var min_price_original = getParameterByName('min').replace('%2C', '');
            var max_price_original = getParameterByName('max').replace('%2C', '');

            var min = 1;
            var max = 1000;
            if (min_price_original > 1) {
                min = min_price_original;
            } else {
                min = 1;
            }
            if (max_price_original === '') {
                max = 1000;
            } else if (max_price_original < 1000) {
                max = max_price_original;
            }

            /*----------------------------
             price-slider active
             ------------------------------ */
            $("#slider-range").slider({
                range: true,
                min: 1,
                max: 1000,
                values: [min, max],
                slide: function(event, ui) {
                    $("#amount").val("" + ui.values[0] + " - " + ui.values[1]);
                    var min = ui.values[0];
                    var max = ui.values[1];
                    $("#amount").val("" + $("#slider-range").slider("values", 0) +
                            " - " + $("#slider-range").slider("values", 1));
                },
                change: function(event, ui) {
                    $("#amount").val("" + ui.values[0] + " - " + ui.values[1]);

//                    var pathurl = '/api/products/price';
                    var min = ui.values[0];
                    var max = ui.values[1];
                    var parent = $("#parentId").val();
                    var url =  '/category/'+ parent + '?min=' + min + '&max=' + max;
                    window.location.replace(url);
                }
            });
            {{--$("#slider-range").slider({--}}
                {{--range: true,--}}
                {{--min: 1,--}}
                {{--max: 1000,--}}
                {{--values: [min, max],--}}
                {{--slide: function (event, ui) {--}}
                    {{--$("#amount").val("" + ui.values[0] + " - " + ui.values[1]);--}}
                    {{--var min = ui.values[0];--}}
                    {{--var max = ui.values[1];--}}
                    {{--$("#amount").val("" + $("#slider-range").slider("values", 0) +--}}
                            {{--" - " + $("#slider-range").slider("values", 1));--}}
                {{--},--}}
                {{--change: function (event, ui) {--}}
                    {{--$("#amount").val("" + ui.values[0] + " - " + ui.values[1]);--}}

                    {{--var pathurl = '/api/products/price';--}}
                    {{--var min = ui.values[0];--}}
                    {{--var max = ui.values[1];--}}
                    {{--var parent = $("#parentId").val();--}}
                    {{--console.log('min =>' + min + 'max ==> ' + max + 'parent ===>' + parent);--}}

                    {{--$.ajax({--}}
                        {{--type: 'POST',--}}
                        {{--url: '{{ url('api/products/price') }}',--}}
                        {{--data: {'min': ui.values[0], 'max': ui.values[1], 'parent': parent},--}}
                        {{--dataType: 'JSON',--}}
                        {{--beforeSend: function (data) {--}}
                        {{--},--}}
                        {{--success: function (response) {--}}
                            {{--console.log(response.url);--}}
                            {{--window.location.replace(response.url);--}}
                        {{--},--}}
                        {{--error: function (jqXHR, textStatus, errorThrown) {--}}
                            {{--console.log('error : ' + jqXHR + textStatus + errorThrown);--}}
                        {{--}--}}

                    {{--});--}}
                {{--}--}}
            {{--});--}}
            $("#amount").val("" + $("#slider-range").slider("values", 0) +
                    " - " + $("#slider-range").slider("values", 1));
        });
    </script>
@endsection
