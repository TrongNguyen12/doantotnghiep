@if (Session::has('error'))
	<div class="alert alert-danger background-danger">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<i class="icofont icofont-close-line-circled text-white"></i>
		</button>
		<strong>{{ Session::get('error') }}</strong>
	</div>
@endif
@foreach ($errors->all() as $error)
	<div class="alert alert-danger background-danger">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-top: 0px">
		<i class="icofont icofont-close-line-circled text-white"></i>
		</button>
		<strong>{{ $error }}</strong>
	</div>
@endforeach