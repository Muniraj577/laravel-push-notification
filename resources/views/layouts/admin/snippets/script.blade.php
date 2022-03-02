<script src="{{asset('admin/vendors/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('admin/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('admin/vendors/fastclick/lib/fastclick.js')}}"></script>
<script src="{{asset('admin/vendors/nprogress/nprogress.js')}}"></script>
<script src="{{asset('admin/vendors/Chart.js/dist/Chart.min.js')}}"></script>
<script src="{{asset('admin/vendors/gauge.js/dist/gauge.min.js')}}"></script>
<script src="{{asset('admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
<script src="{{asset('admin/vendors/iCheck/icheck.min.js')}}"></script>
<script src="{{asset('admin/vendors/skycons/skycons.js')}}"></script>
<script src="{{asset('admin/vendors/Flot/jquery.flot.js')}}"></script>
<script src="{{asset('admin/vendors/Flot/jquery.flot.pie.js')}}"></script>
<script src="{{asset('admin/vendors/Flot/jquery.flot.time.js')}}"></script>
<script src="{{asset('admin/vendors/Flot/jquery.flot.stack.js')}}"></script>
<script src="{{asset('admin/vendors/Flot/jquery.flot.resize.js')}}"></script>
<script src="{{asset('admin/vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
<script src="{{asset('admin/vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
<script src="{{asset('admin/vendors/flot.curvedlines/curvedLines.js')}}"></script>
<script src="{{asset('admin/vendors/DateJS/build/date.js')}}"></script>
<script src="{{asset('admin/vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
<script src="{{asset('admin/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
<script src="{{asset('admin/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
<script src="{{asset('admin/vendors/moment/min/moment.min.js')}}"></script>
<script src="{{asset('admin/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('admin/js/custom.min.js')}}"></script>
<script src="{{asset('admin/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('admin/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{asset('admin/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
<script src="{{asset('admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
<script src="{{asset('admin/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('js/toastr.min.js')}}"></script>
<script>
    toastr.options = {
        "closeButton": true,
    }
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            let reader = new FileReader();
            reader.onload = function (e) {
                $("#imgPreview").attr('src', e.target.result).width(100).height(100);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#img").change(function () {
        readURL(this);
    });

    function readLogoURL(input) {
        if (input.files && input.files[0]) {
            let reader = new FileReader();
            reader.onload = function (e) {
                $("#logoPreview").attr('src', e.target.result).width(100).height(100);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#logo").change(function () {
        readLogoURL(this);
    });

    setTimeout(function () {
        $('.messageAlert').fadeOut('fast');
    }, 5000); // <--
    CKEDITOR.replace('desc');
</script>
<script>
    @if(Session::has('msg'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch (type) {
        case 'info':
            toastr.info("{{ Session::get('msg') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('msg') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('msg') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('msg') }}");
            break;
    }
    @endif
</script>
@yield('scripts')
