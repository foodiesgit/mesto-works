@extends('frontend.layout.master')

@section('title', 'İletişim')

@section('content')
<section class="contact-form section-gap bg-grey-light-three ">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-7">
				<div class="axil-contact-form-block m-b-xs-30">
					<div class="section-title d-block">
						<h2 class="h3 axil-title m-b-xs-20">
							Bize Yaz
						</h2>
						<p>Your email address will not be published. All the fields are required.
						</p>
					</div>
					<!-- End of .section-title -->

					<div class="axil-contact-form-wrapper p-t-xs-10">
						<form class="axil-contact-form row no-gutters" method="POST" action="{{route('post.contact')}}">
							@csrf

							<div class="form-group col-12">
								<label for="contact-name">Ad Soyad</label>
								<input type="text" name="contact-name" id="contact-name">
							</div>

							<div class="form-group col-12">
								<label for="contact-phone">Telefon</label>
								<input type="text" name="contact-phone" id="contact-phone">
							</div>

							<div class="form-group col-12">
								<label for="contact-email">Email</label>
								<input type="email" name="contact-email" id="contact-email">
							</div>

							<div class="form-group col-12">
								<label for="contact-message">Mesaj</label>
								<textarea name="contact-message" id="contact-message"></textarea>
							</div>

							<div class="col-12">
								<button class="btn btn-primary m-t-xs-0 m-t-lg-20">GÖNDER</button>
							</div>
						</form>
						<!-- End of .axil-contact-form -->
					</div>
					<!-- End of .axil-contact-form-wrapper -->
				</div>
				<!-- End of .axil-contact-form-block -->
			</div>
			<!-- End of .col-lg-6 -->

			<div class="col-lg-5">
				<div class="axil-contact-info-wrapper p-l-md-45 m-b-xs-30">
					<div class="axil-contact-info-inner">
						<h2 class="h4 m-b-xs-10">
							İletişim Bilgileri
						</h2>
						<div class="axil-contact-info">
							<address class="address">
                                @if(isset($setting))
								<p class="mid m-b-xs-30">{!!$settings->where('key', 'facebook_url')->first()->contact_address!!}</p>
                                @endif
								<div>
									@if($settings->where('key', 'contact_phone')->first() && $settings->where('key', 'contact_phone')->first()->value != null)
									<a class="tel" href="tel:{{$settings->where('key', 'contact_phone')->first()->value}}"><i class="fas fa-phone"></i>{{$settings->where('key', 'contact_phone')->first()->value}}</a>
									@endif
								</div>
							</address>
							<!-- End of address -->

							<div class="contact-social-share m-t-xs-30">
								<div class="axil-social-title h5">Takip Et</div>
								<ul class="social-share social-share__with-bg">
									@if($settings->where('key', 'facebook_url')->first() && $settings->where('key', 'facebook_url')->first()->value != null)
									<li><a href="{{$settings->where('key', 'facebook_url')->first()->value}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
									@endif
									@if($settings->where('key', 'twitter_url')->first() && $settings->where('key', 'twitter_url')->first()->value != null)
									<li><a href="{{$settings->where('key', 'twitter_url')->first()->value}}" target="_blank"><i class="fab fa-twitter"></i></a></li>
									@endif
									@if($settings->where('key', 'instagram_url')->first() && $settings->where('key', 'instagram_url')->first()->value != null)
									<li><a href="{{$settings->where('key', 'instagram_url')->first()->value}}" target="_blank"><i class="fab fa-instagram"></i></a></li>
									@endif
									@if($settings->where('key', 'linkedin_url')->first() && $settings->where('key', 'linkedin_url')->first()->value != null)
									<li><a href="{{$settings->where('key', 'linkedin_url')->first()->value}}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
									@endif
								</ul>
							</div>
							<!-- End of .contact-shsdf -->
						</div>
						<!-- End of .axil-contact-info -->
					</div>
					<!-- End of .axil-contact-info-inner -->
				</div>
				<!-- End of .axil-contact-info-wrapper -->
			</div>
			<!-- End of .col-lg-6 -->
		</div>
		<!-- End of .row -->
	</div>
	<!-- End of .container -->
</section>
<!-- End of .contact-form -->

@if($settings->where('key', 'iframe_location')->first() && $settings->where('key', 'iframe_location')->first()->value != null)
<section class="section-gap our-location section-gap-top__with-text">
	<div class="container">
		<div class="section-title">
			<h2 class="axil-title m-b-xs-40">
				Konumumuz
			</h2>
		</div>
		<!-- End of .section-title -->

		<div class="axil-map-wrapper m-b-xs-30">

			{!!$settings->where('key', 'iframe_location')->first()->value!!}
		</div>
		<!-- End of .axil-map-wrapper -->
	</div>
	<!-- End of .container -->
</section>
<!-- End of .our-location -->
@endif

@endsection
