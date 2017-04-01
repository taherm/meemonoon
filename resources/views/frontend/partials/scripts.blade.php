{{--<script src="{{ asset('js/app.js') }}"></script>--}}
<script src="{{ asset('js/frontend.js') }}"></script>

<!-- Toaster js Notifications -->
<script src="{{asset('meem/frontend/plugins/bootstrap-toastr/toastr.min.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function () {
        console.log('jquery loaded');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //Fix Carousal click
        $('.owl-item img').on('click', function(){
            $('.owl-item li').removeClass('active');
            $(this).addClass('active');
            console.log('asds');
        });
    });

</script>


<!-- Placed js at the end of the document so the pages load faster -->