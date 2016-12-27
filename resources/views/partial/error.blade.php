@if (Session::has('error'))
	<div class="alert alert-danger">
		<strong>
      <i class="fa fa-remove fa-fw"></i>
      {{ Session::get('error') }}
    </strong>
	</div>
@endif
