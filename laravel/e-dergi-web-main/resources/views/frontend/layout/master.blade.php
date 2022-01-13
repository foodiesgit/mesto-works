<!DOCTYPE html>

<html class="no-js">
<!--<![endif]-->

<head>
	<!-- Basic metas
    	======================================== -->
	<meta charset="utf-8">
	<meta name="author" content="">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<!-- Mobile specific metas
    	======================================== -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Twitter -->
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:site" content="@EDergi">
	<meta name="twitter:creator" content="@EDergi">
	<meta name="twitter:title" content="EDergi">
	<meta name="twitter:description" content="EDergi test test">
	<meta name="twitter:image" content="http://axilthemes.com/demo/template/papr/assets/images/papr.png">
	<!-- Facebook -->
	<meta property="og:url" content="">
	<meta property="og:title" content="EDergi">
	<meta property="og:description" content="EDergi test test">
	<meta property="og:type" content="website">
	<meta property="og:image" content="http://axilthemes.com/demo/template/papr/assets/images/papr.png">
	<meta property="og:image:secure_url" content="">
	<meta property="og:image:type" content="image/png">
	<meta property="og:image:width" content="1200">
	<meta property="og:image:height" content="630">

	<!-- Page Title
    	======================================== -->
	<title>@yield('title') | {{ENV('APP_NAME')}}</title>
	<!-- links for favicon
    	======================================== -->
	<link rel="apple-touch-icon" sizes="57x57" href="/f-assets/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/f-assets/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/f-assets/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/f-assets/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/f-assets/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/f-assets/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/f-assets/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/f-assets/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/f-assets/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192" href="/f-assets/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/f-assets/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/f-assets/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/f-assets/favicon/favicon-16x16.png">
	<link rel="manifest" href="/f-assets/favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/f-assets/favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<!-- Icon fonts
    	======================================== -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,500i,700,700i,900" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/f-assets/css/fontawesome-all.min.css">
	<link rel="stylesheet" type="text/css" href="/f-assets/css/iconfont.css">
	<!-- css links
    	======================================== -->
	<!-- Bootstrap link -->
	<link rel="stylesheet" type="text/css" href="/f-assets/css/vendor/bootstrap.min.css">
	<!-- Link Swiper's CSS -->
	<link rel="stylesheet" href="/f-assets/css/vendor/owl.carousel.min.css">
	<!-- Slick slider -->
	<link rel="stylesheet" href="/f-assets/css/vendor/slick.css">
	<!-- Magnific popup -->
	<link rel="stylesheet" type="text/css" href="/f-assets/css/vendor/magnific-popup.css">
	<!-- Animate css -->
	<link rel="stylesheet" type="text/css" href="/f-assets/css/vendor/animate.css">

	<!-- Custom css -->
	<link rel="stylesheet" type="text/css" href="/f-assets/css/style.css">
	@yield('css-part')
</head>

<body>
	<!-- Main contents
	================================================ -->
	<div class="main-content">
		<div class="side-nav">
			<div class="side-nav-inner nicescroll-container">
				<form action="{{route('post.all')}}" class="side-nav-search-form" method="GET">
					<div class="form-group search-field">
						<input type="text" class="search-field" name="search" placeholder="Aradığınız kelimeyi yazınız...">
						<button type="submit" class="side-nav-search-btn"><i class="fas fa-search"></i></button>
					</div>
					<!-- End of .side-nav-search-form -->
				</form>
				<!-- End of .side-nav-search-form -->
				<div class="side-nav-content">
					<div class="row ">
						<div class="col-lg-6">
							<ul class="main-navigation side-navigation list-inline flex-column">
								@foreach($header_categories as $header_category)
								<li><a href="{{route('post.all', ['category_slug' => $header_category->slug])}}">{{$header_category->name}}</a></li>
								@endforeach
							</ul>
							<!-- End of .main-navigation -->
						</div>
						<!-- End of  .col-md-6 -->
						<div class="col-lg-6">
							<div class="axil-contact-info-inner">
								<h5 class="h5 m-b-xs-10">
									İletişim Bilgilerimiz
								</h5>
								<div class="axil-contact-info">
									<address class="address">
										<p class="m-b-xs-30  mid grey-dark-three ">{!! isset($settings) ? null : $settings->where('key', 'contact_address')->first()->contact_address!!}</p>
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
					</div>
					<!-- End of .row -->
				</div>
			</div>
			<!-- End of .side-nav-inner -->
			<div class="close-sidenav" id="close-sidenav">
				<div></div>
				<div></div>
			</div>
		</div>
		<!-- End of .side-nav -->
		<!-- Header starts -->
		<header class="page-header">
			<div class="header-top bg-grey-dark-one">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-md">
							<ul class="header-top-nav list-inline justify-content-center justify-content-md-start">
								<li class="current-date">{{\Carbon\Carbon::now()->format('d/m/Y')}}</li>
								<li><a href="">Kayıt Ol</a></li>
								<li><a href="{{route('get.about')}}">Hakkımızda</a></li>
								<li><a href="{{route('get.contact')}}">İletişim</a></li>
							</ul>
							<!-- End of .header-top-nav -->
						</div>
						<div class="col-md-auto">
							<ul class="ml-auto social-share header-top__social-share">
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
					</div>
					<!-- End of .row -->
				</div>
				<!-- End of .container -->
			</div>
			<!-- End of .header-top -->
			<nav class="navbar bg-white">
				<div class="container">
					<div class="navbar-inner">
						<div class="brand-logo-container">
							<a href="{{route('get.index')}}">
								<img src="/logo.png" alt="" class="brand-logo">
							</a>
						</div>
						<!-- End of .brand-logo-container -->
						<div class="main-nav-wrapper">
							<ul class="main-navigation list-inline" id="main-menu">
								<li><a href="{{route('get.index')}}">Anasayfa</a></li>
								@foreach($header_categories as $header_category)
								<li><a href="{{route('post.all', ['category_slug' => $header_category->slug])}}">{{$header_category->name}}</a></li>
								@endforeach
							</ul>
							<!-- End of .main-navigation -->
						</div>
						<!-- End of .main-nav-wrapper -->
						<div class="navbar-extra-features ml-auto">
							<form action="{{route('post.all')}}" class="navbar-search" method="GET">
								<div class="search-field">
									<input type="text" class="navbar-search-field" name="search" placeholder="Aradığınız kelimeyi buraya yazınız...">
									<button type="submit" class="navbar-search-btn" type="button"><i
											class="fal fa-search"></i></button>
								</div>
								<!-- End of .search-field -->
								<a href="#" class="navbar-search-close"><i class="fal fa-times"></i></a>
							</form>
							<!-- End of .navbar-search -->
							<a href="#" class="nav-search-field-toggler" data-toggle="nav-search-feild"><i
									class="far fa-search"></i></a>
							<a href="#" class="side-nav-toggler" id="side-nav-toggler">
								<span></span>
								<span></span>
								<span></span>
							</a>
						</div>
						<!-- End of .navbar-extra-features -->
						<div class="main-nav-toggler d-block d-lg-none" id="main-nav-toggler">
							<div class="toggler-inner">
								<span></span>
								<span></span>
								<span></span>
							</div>
						</div>
						<!-- End of .main-nav-toggler -->
					</div>
					<!-- End of .navbar-inner -->
				</div>
				<!-- End of .container -->
			</nav>
			<!-- End of .navbar -->
		</header>
		<!-- End of .page-header -->

		@yield('content')

		<!-- footer starts -->
		<footer class="page-footer bg-grey-dark-key">
			<div class="container">
				<div class="footer-top">
					<div class="row">
						<div class="col-lg-2 col-md-4 col-6">
							<div class="footer-widget">
								<h2 class="footer-widget-title">
									Hakkımızda
								</h2>
								<ul class="footer-nav">
									<li><a href="{{route('get.about')}}">Hakkımızda</a></li>
									<li><a href="{{route('get.contact')}}">İletişim</a></li>
								</ul>
								<!-- End of .footer-nav -->
							</div>
							<!-- End of .footer-widget -->
						</div>
						<!-- End of .col-lg-2 -->
						@foreach($footer_categories as $footer_category)
						<div class="col-lg-2 col-md-4 col-6">
							<div class="footer-widget">
								<h2 class="footer-widget-title">
									{{$footer_category->name}}
								</h2>
								@if($footer_category->posts->count() > 0)
								<ul class="footer-nav">
									@foreach($footer_category->posts/*()->showFooter()->get()*/ as $footer_post)
									<li><a href="">{{$footer_post->post->title}}</a></li>
									@endforeach
								</ul>
								@endif
								<!-- End of .footer-nav -->
							</div>
							<!-- End of .footer-widget -->
						</div>
						<!-- End of .col-lg-2 -->
						@endforeach

					</div>
					<!-- End of .row -->
				</div>
				<!-- End of .footer-top -->
				<div class="footer-mid">
					<div class="row align-items-center">
						<div class="col-md">
							<div class="footer-logo-container">
								<a href="index.html">
									<img src="/logo.png" style="filter: brightness(0) invert(1);" alt="footer logo" class="footer-logo">
								</a>
							</div>
							<!-- End of .brand-logo-container -->
						</div>
						<!-- End of .col-md-6 -->
						<div class="col-md-auto">
							<div class="footer-social-share-wrapper">
								<div class="footer-social-share">
									<div class="axil-social-title">Bizi Takip Et</div>
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
							</div>
							<!-- End of .footer-social-share-wrapper -->
						</div>
						<!-- End of .col-md-6 -->
					</div>
					<!-- End of .row -->
				</div>
				<!-- End of .footer-mid -->
				<div class="footer-bottom">
					<ul class="footer-bottom-links">
						<li><a href="{{route('get.confidentiality_agreement')}}">Gizlilik Sözleşmesi</a></li>
						<li><a href="{{route('get.terms_of_use')}}">Kullanım Şartları</a></li>
					</ul>
					<!-- End of .footer-bottom-links -->
					<p class="axil-copyright-txt">
						© 2021. All rights reserved by Your Company.
					</p>
				</div>
				<!-- End of .footer-bottom -->
			</div>
			<!-- End of .container -->
		</footer>
		<!-- End of footer -->
	</div>
	<!-- End of .main-content -->
	<!-- Javascripts
    	======================================= -->
	<!-- jQuery -->
	<script src="/f-assets/js/vendor/jquery.min.js"></script>
	<script src="/f-assets/js/vendor/jquery-migrate.min.js"></script>
	<!-- jQuery Easing Plugin -->
	<script src="/f-assets/js/vendor/easing-1.3.js"></script>
	<!-- Waypoints js -->
	<script src="/f-assets/js/vendor/jquery.waypoints.min.js"></script>
	<!-- Owl Carousel JS -->
	<script src="/f-assets/js/vendor/owl.carousel.min.js"></script>
	<!-- Slick Carousel JS -->
	<script src="/f-assets/js/vendor/slick.min.js"></script>
	<!-- Bootstrap js -->
	<script src="/f-assets/js/vendor/bootstrap.bundle.min.js"></script>
	<script src="/f-assets/js/vendor/isotope.pkgd.min.js"></script>
	<!-- Counter up js -->
	<script src="/f-assets/js/vendor/jquery.counterup.js"></script>
	<!-- Magnific Popup js -->
	<script src="/f-assets/js/vendor/jquery.magnific-popup.min.js"></script>
	<!-- Nicescroll js -->
	<script src="/f-assets/js/vendor/jquery.nicescroll.min.js"></script>
	<!-- IF ie -->
	<script src="https://cdn.jsdelivr.net/npm/css-vars-ponyfill@2"></script>
	<!-- Custom Script -->
	<script src="/f-assets/js/main.js"></script>
	@yield('scripts')
</body>

</html>
