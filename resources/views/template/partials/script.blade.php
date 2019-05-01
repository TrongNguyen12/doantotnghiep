<!-- Required Jquery -->
<script type="text/javascript" src="bower_components/jquery/js/jquery.min.js"></script>
<script type="text/javascript" src="bower_components/jquery-ui/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="bower_components/popper.js/js/popper.min.js"></script>
<script type="text/javascript" src="bower_components/bootstrap/js/bootstrap.min.js"></script>

<!-- waves js -->
<script src="assets/pages/waves/js/waves.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
<!-- Float Chart js -->
<script src="assets/pages/chart/float/jquery.flot.js"></script>
<script src="assets/pages/chart/float/jquery.flot.categories.js"></script>
<script src="assets/pages/chart/float/curvedLines.js"></script>
<script src="assets/pages/chart/float/jquery.flot.tooltip.min.js"></script>
<script src="toast/jquery.toast.js"></script>
<script src="sweetalert/sweetalert.min.js"></script>
<script src="date/datepicker.min.js"></script>
<script src="date/datepicker.vi-VN.js"></script>
<!-- todo js -->
<script type="text/javascript" src="assets/pages/todo/todo.js"></script>
<script type="text/javascript" src="bower_components/Sematic/semantic.min.js"></script>
<!-- Custom js -->
<script src="assets/js/pcoded.min.js"></script>
@if (Request::segment(2)=='sales')
    <script src="assets/typeahead.bundle.min.js"></script>
    <script src="assets/js/vertical/horizontal-layout.min.js"></script>
   	<script src="swiper/js/swiper.min.js"></script>
   	<script src="nprogress/nprogress.js"></script>
@else
    <script src="assets/js/vertical/vertical-layout.min.js"></script>
@endif
@if (Request::segment(2)=='posimport')
	<script src="assets/typeahead.bundle.min.js"></script>
	<script src="swiper/js/swiper.min.js"></script>
   	<script src="nprogress/nprogress.js"></script>
@endif

<script type="text/javascript" src="assets/pages/widget/widget-data.js"></script>
<script type="text/javascript" src="assets/js/script.min.js"></script>

@include('toast.toast')

<script type="text/javascript" src=" {{ asset('public/custom/js/custom.js') }}"></script>
<script type="text/javascript" src=" {{ asset('public/custom/js/ajax.js') }}"></script>