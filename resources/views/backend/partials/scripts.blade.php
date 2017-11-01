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
    tinymce.init({
        selector: 'textarea',
        height: 500,
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor textcolor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table contextmenu paste code help'
        ],
        toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css']
    });
</script>