@if (Session::has('success'))
  <div class="alert alert-success">
    <strong>
      <i class="fa fa-check-circle fa-lg fa-fw"></i>
      {{ Session::get('success') }}
    </strong>
  </div>
@endif
