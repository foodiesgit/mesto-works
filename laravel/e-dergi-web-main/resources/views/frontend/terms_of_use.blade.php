@extends('frontend.layout.master')

@section('title', 'Hakkımızda')

@section('content')

<div class="axil-about-us section-gap-top p-b-xs-20">
	<div class="container">

		<div class="row">
			<div class="col-lg-12">
				<h2 class="axil-title">Kullanım Koşulları</h2>

				@if($settings->where('key', 'page_terms_of_use')->first())
				{!!$settings->where('key', 'page_terms_of_use')->first()->page_terms_of_use!!}
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