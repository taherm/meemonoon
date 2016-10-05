
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{asset('meem/backend/js/datatable.js')}}" type="text/javascript"></script>
    <script src="{{asset('meem/backend/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('meem/backend/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}"
type="text/javascript"></script>
    <script src="{{asset('meem/backend/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"
type="text/javascript"></script>
    <script src="{{asset('meem/backend/js/table-datatables-buttons.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
<script type="text/javascript">
    $('#tags').DataTable();
    $('#categories').DataTable();
    $('#subcategories').DataTable();
    $('#users').DataTable();
    $('#products').DataTable();
    $('#currencies').DataTable();
    $('#orders').DataTable();
    $('#coupons').DataTable();
</script>