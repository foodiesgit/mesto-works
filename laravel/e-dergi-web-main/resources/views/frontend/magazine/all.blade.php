@extends('frontend.layout.master')

@section('title', 'Dergiler')

@section('content')
<!-- Banner starts -->
<section class="banner banner__default bg-grey-light-three">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-12">
				<div class="post-title-wrapper">
					<h2 class="m-b-xs-0 axil-post-title hover-line">Dergiler</h2>
				</div>
				<!-- End of .post-title-wrapper -->
			</div>
			<!-- End of .col-lg-8 -->
		</div>
	</div>
	<!-- End of .container -->
</section>
<!-- End of .banner -->

<section class="related-post p-b-xs-30 section-gap">
	<div class="container">
		<div class="grid-wrapper">
			<div class="row">

				@foreach($magazines as $magazine)
				<div class="col-lg-3 col-md-4">
					<div class="content-block m-b-xs-30">
						<a href="{{route('magazine.detail', ['slug' => $magazine->slug])}}">
							<img src="/upload/magazine/{{$magazine->image}}" alt="{{$magazine->name}}" class="img-fluid">
							<div class="grad-overlay"></div>
						</a>
						<div class="media-caption">
							<div class="caption-content">
								<h3 class="axil-post-title hover-line hover-line"><a href="{{route('magazine.detail', ['slug' => $magazine->slug])}}">{{$magazine->name}}</a></h3>
							</div>
							<!-- End of .content-inner -->
						</div>
					</div>
					<!-- End of .content-block -->
				</div>
				<!-- End of .col-lg-3 -->
				@endforeach


			</div>
			<!-- End of .row -->
		</div>
		<!-- End of .grid-wrapper -->
	</div>
	<!-- End of .container -->
</section>
<!-- End of .related-post -->
@endsection