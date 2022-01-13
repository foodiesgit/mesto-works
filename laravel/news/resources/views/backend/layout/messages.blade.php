@if ($errors->any())
<div class="alert alert-danger" role="alert">
	@foreach ($errors->all() as $error)
	<h5 class="alert-text">{{ $error }}</h5>
	@endforeach
</div>
@endif

@if(session()->has('error'))
<div class="alert alert-danger" role="alert">
	<h5 class="alert-text">{{session()->get('error')}}</h5>
</div>
 @endif
@if(session()->has('success'))
<div class="alert alert-success" role="alert">
	<h5 class="alert-text">{{session()->get('success')}}</h5>
</div>
@endif