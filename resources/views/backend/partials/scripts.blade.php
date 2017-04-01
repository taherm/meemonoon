{{--<script src="{{ asset('js/app.js') }}"></script>--}}
<script src="{{ asset('js/backend.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#disableTrack').on('click', function() {
            $('#trackId').attr('disabled', this.checked)
            if (this.checked) {
                $('#trackId').val('');
            }
        });
    });

</script>