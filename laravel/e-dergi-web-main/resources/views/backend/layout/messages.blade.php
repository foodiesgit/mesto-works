@if ($errors->any())
<div class="alert alert-custom alert-outline-2x alert-outline-danger fade show mb-5" role="alert">
	<div class="alert-icon"><i class="flaticon-warning"></i></div>
	<ul>
		@foreach ($errors->all() as $error)
		<li>
			<div class="alert-text">{{ $error }}</div>
		</li>
		@endforeach
	</ul>
</div>
@endif

@if(Session::has('error'))
<div class="alert alert-danger" role="alert">
    {{Session::get('error')}}
</div>
 @endif
@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{Session::get('success')}}
</div>
@endif