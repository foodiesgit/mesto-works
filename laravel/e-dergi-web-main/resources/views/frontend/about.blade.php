@extends('frontend.layout.master')

@section('title', 'Hakkımızda')

@section('content')

<div class="axil-about-us section-gap-top p-b-xs-20">
	<div class="container">

		<div class="row">
			<div class="col-lg-12">
				<h2 class="axil-title">Hakkımızda</h2>
                @if(isset($setting))
				{!!$settings->where('key', 'page_about')->first()->page_about!!}
                @endif
			</div>
			<!-- End of .col-lg-8 -->

		</div>
		<!-- End of .row -->
	</div>
	<!-- End of .container -->
</div>
<!-- End of .section-gap -->
@endsection
