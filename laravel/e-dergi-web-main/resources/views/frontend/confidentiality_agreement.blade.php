@extends('frontend.layout.master')

@section('title', 'Hakkımızda')

@section('content')

<div class="axil-about-us section-gap-top p-b-xs-20">
	<div class="container">

		<div class="row">
			<div class="col-lg-12">
				<h2 class="axil-title">Gizlilik Sözleşmesi</h2>

				{!!$settings->where('key', 'page_confidentiality_agreement')->first()->page_confidentiality_agreement!!}
			</div>
			<!-- End of .col-lg-8 -->

		</div>
		<!-- End of .row -->
	</div>
	<!-- End of .container -->
</div>
<!-- End of .section-gap -->
@endsection