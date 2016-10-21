{{--<!--common script init for all pages-->--}}
{{--<!-- all js here -->--}}
{{--<!-- jquery latest version -->--}}
{{--<script src="{{asset('meem/frontend/js/vendor/jquery-1.12.0.min.js')}}"></script>--}}
{{--<!-- bootstrap js -->--}}
{{--<script src="{{asset('meem/frontend/js/bootstrap.min.js')}}"></script>--}}
{{--<!-- modernizr css -->--}}
{{--<script src="{{asset('meem/frontend/js/vendor/modernizr-2.8.3.min.js')}}"></script>--}}
{{--<!-- nivo slider js -->--}}
{{--<script src="{{asset('meem/frontend/js/jquery.nivo.slider.pack.js')}}"></script>--}}
{{--<!-- owl.carousel js -->--}}
{{--<script src="{{asset('meem/frontend/js/owl.carousel.min.js')}}"></script>--}}
{{--<!-- owl.carousel js -->--}}
{{--<script src="{{asset('meem/frontend/js/jquery-ui.min.js')}}"></script>--}}
{{--<!-- meanmenu js -->--}}
{{--<script src="{{asset('meem/frontend/js/jquery.meanmenu.js')}}"></script>--}}
{{--<!-- Simple Lence JS -->--}}
{{--<script src="{{asset('meem/frontend/js/jquery.simpleGallery.min.js')}}"></script>--}}
{{--<script src="{{asset('meem/frontend/js/jquery.simpleLens.min.js')}}"></script>--}}
{{--<!-- wow js -->--}}
{{--<script src="{{asset('meem/frontend/js/wow.min.js')}}"></script>--}}
{{--<!-- plugins js -->--}}
{{--<script src="{{asset('meem/frontend/js/plugins.js')}}"></script>--}}
{{--<!-- main js -->--}}
{{--<script src="{{asset('meem/frontend/js/main.js')}}"></script>--}}

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/frontend.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function () {
        console.log('jquery loaded');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //Fix Carousal click
        $('.images img').on('click', function(){
            $('li.images').removeClass('active');
            $(this).addClass('active');
        });

        $('#disableTrack').on('click', function () {
            console.log('asdsad');
            $('input:text').attr('disabled', !this.checked)
        });
    });

</script>


<!-- Placed js at the end of the document so the pages load faster -->