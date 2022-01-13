@extends('frontend.layout.master')

@section('title', 'Anasayfa')

@section('content')

<section class="banner banner__home-with-slider section-gap-bottom">
	<div class="banner__home-with-slider-overlay">

	</div>
	<!-- End of .banner__home-with-slider-overlay -->

	<div class="container">

		<div class="row">
			<div class="col-xl-5">
				<div class="banner-slider-container">
					<div class="slick-slider slick-slider-for slick-synced">

						@foreach($indexPosts as $indexPost)
						<div class="item">
							<div class="post-metas home-banner-post-metas m-b-xs-20">
								<ul class="list-inline">
									<li class="m-r-xs-20">
										<a href="#" class="d-flex align-items-center">
											<img src="/upload/user/{{@$indexPost->createdBy->profile_photo}}" alt="{{@$indexPost->createdBy->name}}" class="m-r-xs-20">
											<span>{{@$indexPost->createdBy->name}}</span>
										</a>
									</li>
								</ul>
							</div>
							<!-- End of .post-metas -->
							<h1 class="page-title m-b-xs-40 hover-line">
								<a href="{{route('post.detail', ['slug' => $indexPost->slug])}}">
									{{$indexPost->title}}
								</a>
							</h1>
							<div class="btn-group">
								<a href="{{route('post.detail', ['slug' => $indexPost->slug])}}" class="btn btn-primary m-r-xs-30">Daha Fazla</a>
								<a href="{{route('post.all')}}" class="btn-link">Tüm Yayınlar</a>
							</div>
						</div>
						@endforeach

					</div>
					<!-- End of .owl-carousel -->
				</div>
				<!-- End of .banner-slider-container -->
			</div>
			<!-- End of .col-lg-5 -->
		</div>
		<!-- End of .row -->

		<div class="banner-slider-container-synced">
			<div class="slick-slider slick-slider-nav slick-synced" data-slick-items="1" data-slick-dots="true" data-slick-arrows="true">
				@foreach($indexPosts as $indexPost)
				<div class="item">
					<img src="/upload/post/slider/{{$indexPost->image}}" alt="{{$indexPost->title}}">
				</div>
				@endforeach
			</div>
			<!-- End of .owl-carousel -->

			<div class="banner-share-slider-container">
				<div class="slick-slider banner-share-slider">
					@foreach($indexPosts as $indexPost)
					<div class="item">
						<div class="banner-shares slick-banner-shares">
							<div class="toggle-shares">Paylaş <span>+</span></div>
							<div class="social-share-wrapper">
								<ul class="social-share social-share__with-bg">
									<li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{route('post.detail', ['slug' => $indexPost->slug])}}"><i class="fab fa-facebook-f"></i></a></li>
									<li><a target="_blank" href="https://twitter.com/intent/tweet?text={{$indexPost->title}}&url={{route('post.detail', ['slug' => $indexPost->slug])}}"><i class="fab fa-twitter"></i></a></li>
									<li><a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url={{route('post.detail', ['slug' => $indexPost->slug])}}&title={{$indexPost->title}}"><i class="fab fa-linkedin-in"></i></a></li>
								</ul>
							</div>
							<!-- End of .social-share-wrapper -->
						</div>
						<!-- End of .banner-shares -->
					</div>
					@endforeach

				</div>
				<!-- End of .owl-carousel -->
			</div>
		</div>
		<!-- End of .banner-slider-container-synced -->
	</div>
	<!-- End of .container -->
</section>
<!-- End of .banner -->


<section class="section-gap section-gap-top__with-text trending-stories bg-grey-light-three">
	<div class="container">
		<div class="section-title m-b-xs-40">
			<h2 class="axil-title">En Beğenilen Yazılar</h2>
			<a href="{{route('post.all')}}" class="btn-link">TÜM YAZILAR</a>
		</div>

		<div class="row">
			@foreach($topPosts as $topPost)
			<div class="col-lg-6">
				<div class="media post-block m-b-xs-30">
					<a href="{{route('post.detail', ['slug' => $topPost->slug])}}" class="align-self-center">
						<img class=" m-r-xs-30" src="/upload/post/{{@$post->image}}" alt="">
					</a>
					<div class="media-body">
						<div class="post-cat-group m-b-xs-10">
							@foreach($topPost->categories as $post_category)
							<a href="{{route('post.all', ['category_slug' => $post_category->slug])}}" class="post-cat cat-btn bg-color-blue-one" style="background-color: {{$post_category->category->hex_color_code}} !important;">{{$post_category->category->name}}</a>
							@endforeach
						</div>
						<h3 class="axil-post-title hover-line hover-line">
							<a href="{{route('post.detail', ['slug' => $topPost->slug])}}">
							</a>
						</h3>
						<div class="post-metas">
							<ul class="list-inline">
								<li>
									<a href="{{route('author.detail', ['slug' => $topPost->slug])}}">
										<img src="/upload/user/{{$topPost->createdBy->profile_photo}}" alt="author" style="max-width: 30px;">
										{{@$topPost->createdBy->name}}
									</a>
								</li>
								<li>{{$topPost->likes()->count()}} <i class="feather icon-heart"></i> </li>
							</ul>
						</div>
					</div>
				</div>
				<!-- End of .post-block -->
			</div>
			<!-- End of .col-lg-6 -->
			@endforeach

		</div>
		<!-- End of .row -->
	</div>
	<!-- End of .container -->
</section>
<!-- End of .trending-stories -->


		<?php /*
		<div class="random-posts section-gap">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<main class="axil-content">
							<div class="media post-block post-block__mid m-b-xs-30">
								<a href="post-format-standard.html" class="align-self-center"><img class=" m-r-xs-30"
										src="f-assets/images/post/post-img-3.jpg" alt=""></a>
								<div class="media-body">
									<div class="post-cat-group m-b-xs-10">
										<a href="business.html" class="post-cat cat-btn bg-color-blue-one">TRAVEL</a>
									</div>
									<h3 class="axil-post-title hover-line hover-line"><a
											href="post-format-standard.html">Will The
											Democrats
											Be Able To Reverse The
											Online Gambling Ban</a></h3>
									<p class="mid">Aliquam erat volutpat. Nam ut bibendum eros. Nam vel nulla est.
										Quisque fermentum sapien.</p>
									<div class="post-metas">
										<ul class="list-inline">
											<li>By <a href="#">Amachea Jajah</a></li>
										</ul>
									</div>
								</div>
							</div>
							<!-- End of .post-block -->
							<div class="media post-block post-block__mid m-b-xs-30">
								<a href="post-format-standard.html" class="align-self-center"><img class=" m-r-xs-30"
										src="f-assets/images/post/post-img-4.jpg" alt=""></a>
								<div class="media-body">
									<div class="post-cat-group m-b-xs-10">
										<a href="business.html" class="post-cat cat-btn bg-color-blue-two">SCIENCE</a>
									</div>
									<h3 class="axil-post-title hover-line hover-line"><a
											href="post-format-standard.html">Old
											Fashioned Recipe
											For Preventing
											Allergies And Chemical Sensitivities</a></h3>
									<p class="mid">Cras sit amet maximus odio, finibus pulvinar nisl. Praesent sed
										sagittis diam. Integer sed volutpat mi, in ultrices tellus.</p>
									<div class="post-metas">
										<ul class="list-inline">
											<li>By <a href="#">Amachea Jajah</a></li>
										</ul>
									</div>
								</div>
							</div>
							<!-- End of .post-block -->
							<div class="media post-block post-block__mid m-b-xs-30">
								<a href="post-format-standard.html" class="align-self-center"><img class=" m-r-xs-30"
										src="f-assets/images/post/post-img-5.jpg" alt=""></a>
								<div class="media-body">
									<div class="post-cat-group m-b-xs-10">
										<a href="business.html"
											class="post-cat cat-btn bg-color-purple-one">PHILOSOPHY</a>
									</div>
									<h3 class="axil-post-title hover-line hover-line"><a
											href="post-format-standard.html">Barbeque
											Techniques
											Two Methods To
											Consider</a></h3>
									<p class="mid">Nulla facilisi. Aenean scelerisque elit nec placerat fermentum. Duis
										eu urna.</p>
									<div class="post-metas">
										<ul class="list-inline">
											<li>By <a href="#">Amachea Jajah</a></li>
										</ul>
									</div>
								</div>
							</div>
							<!-- End of .post-block -->
							<div class="media post-block post-block__mid m-b-xs-30">
								<a href="post-format-standard.html" class="align-self-center"><img class=" m-r-xs-30"
										src="f-assets/images/post/post-img-6.jpg" alt=""></a>
								<div class="media-body">
									<div class="post-cat-group m-b-xs-10">
										<a href="business.html" class="post-cat cat-btn bg-color-purple-two">BEAUTY</a>
									</div>
									<h3 class="axil-post-title hover-line hover-line"><a
											href="post-format-standard.html">Sony
											Laptops Are
											Still Part Of The Sony
											Family</a></h3>
									<p class="mid">Curabitur egestas est vitae sem blandit tincidunt. Nunc cursus
										interdum odio sit amet gravida.</p>
									<div class="post-metas">
										<ul class="list-inline">
											<li>By <a href="#">Amachea Jajah</a></li>
										</ul>
									</div>
								</div>
							</div>
							<!-- End of .post-block -->
							<div class="media post-block post-block__mid m-b-xs-30">
								<a href="post-format-standard.html" class="align-self-center"><img class=" m-r-xs-30"
										src="f-assets/images/post/post-img-7.jpg" alt=""></a>
								<div class="media-body">
									<div class="post-cat-group m-b-xs-10">
										<a href="business.html"
											class="post-cat cat-btn bg-color-blue-three">ADVERTISING</a>
									</div>
									<h3 class="axil-post-title hover-line hover-line"><a
											href="post-format-standard.html">It takes a big idea to attract the
											attention of consumers and get them to buy your product. </a></h3>
									<p class="mid">Nullam arcu purus, elementum ut tincidunt sit amet, facilisis quis
										quam. Pellentesque fringilla leo et commodo pulvinar.</p>
									<div class="post-metas">
										<ul class="list-inline">
											<li>By <a href="#">Amachea Jajah</a></li>
										</ul>
									</div>
								</div>
							</div>
							<!-- End of .post-block -->
							<div class="media post-block post-block__mid m-b-xs-30">
								<a href="post-format-standard.html" class="align-self-center"><img class=" m-r-xs-30"
										src="f-assets/images/post/post-img-8.jpg" alt=""></a>
								<div class="media-body">
									<div class="post-cat-group m-b-xs-10">
										<a href="business.html"
											class="post-cat cat-btn bg-color-green-two">TECHNOLOGY</a>
									</div>
									<h3 class="axil-post-title hover-line hover-line"><a
											href="post-format-standard.html">Going
											Wireless With
											Your Headphones</a></h3>
									<p class="mid">Donec ac felis purus. Nam quis justo vel tortor imperdiet efficitur.
										Ut ac sagittis magna. Ut tincidunt rhoncus lacus.</p>
									<div class="post-metas">
										<ul class="list-inline">
											<li>By <a href="#">Amachea Jajah</a></li>
										</ul>
									</div>
								</div>
							</div>
							<!-- End of .post-block -->
							<div class="media post-block post-block__mid m-b-xs-30">
								<a href="post-format-standard.html" class="align-self-center"><img class=" m-r-xs-30"
										src="f-assets/images/post/post-img-9.jpg" alt=""></a>
								<div class="media-body">
									<div class="post-cat-group m-b-xs-10">
										<a href="business.html"
											class="post-cat cat-btn bg-color-green-three">MOTIVATION</a>
									</div>
									<h3 class="axil-post-title hover-line hover-line"><a
											href="post-format-standard.html">Hypnotherapy For Motivation Getting The
											Drive Back</a>
									</h3>
									<p class="mid">Pellentesque ullamcorper nibh nec lacus lobortis lobortis. Praesent
										sit amet venenatis nibh. </p>
									<div class="post-metas">
										<ul class="list-inline">
											<li>By <a href="#">Amachea Jajah</a></li>
										</ul>
									</div>
								</div>
							</div>
							<!-- End of .post-block -->

							<div class="media post-block post-block__mid m-b-xs-30">
								<a href="post-format-standard.html" class="align-self-center"><img class=" m-r-xs-30"
										src="f-assets/images/post/post-img-10.jpg" alt=""></a>
								<div class="media-body">
									<div class="post-cat-group m-b-xs-10">
										<a href="business.html" class="post-cat cat-btn bg-color-red-one">SPORTS</a>
									</div>
									<h3 class="axil-post-title hover-line hover-line"><a
											href="post-format-standard.html">Maui By Air The Best Way Around The
											Island</a>
									</h3>
									<p class="mid">Ut et feugiat dui. Nam fringilla, sem et mollis tincidunt, eros orci
										congue magna, eget lacinia erat metus vel tortor. Praesent efficitur ultricies
										felis. </p>
									<div class="post-metas">
										<ul class="list-inline">
											<li>By <a href="#">Amachea Jajah</a></li>
										</ul>
									</div>
								</div>
							</div>
							<!-- End of .post-block -->
						</main>
						<!-- End of .axil-content -->
					</div>
					<!-- End of .col-lg-8 -->
					<div class="col-lg-4">
						@include('frontend.post.sidebar')
					</div>
					<!-- End of .col-lg-4 -->
				</div>
				<!-- End of .row -->
			</div>
			<!-- End of .container -->
		</div>
		<!-- End of .random-posts -->
		*/ ?>


<section class="related-post p-b-xs-30 section-gap">
	<div class="container">
		<div class="section-title m-b-xs-40">
			<h2 class="axil-title">Dergiler</h2>
			<a href="{{route('magazine.all')}}" class="btn-link ml-auto">Tüm Dergiler</a>
		</div>
		<!-- End of .section-title -->
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
