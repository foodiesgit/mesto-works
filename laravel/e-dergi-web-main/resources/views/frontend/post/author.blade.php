@extends('frontend.layout.master')

@section('title', 'Postlar')

@section('content')
@if($author)
<!-- Banner starts -->
<section class="banner banner__default bg-grey-light-three">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-12">
				<div class="author-details-block">
					<div class="media post-block post-block__mid m-b-xs-0">
						@if($author->profile_photo != null)
						<a href="" class="align-self-center">
							<img class="m-r-xs-30" src="/upload/user/{{$author->profile_photo}}" alt="{{$author->name}}">
							<div class="grad-overlay__transparent overlay-over"></div>
						</a>
						@endif
						<div class="media-body">
							<h2 class="h4 m-b-xs-15">{{$author->name}} @if($category) - {{$category->name}} @endif </h2>
							<div class="post-metas">
								<ul class="list-inline">
									<li><a href=""><i class="fal fa-user-edit"></i>Toplam Yayın ({{$author->posts_count}})</a></li>
								</ul>
							</div>
							<?php /* <div class="author-social-share">
								<ul class="social-share social-share__with-bg">
									<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
									<li><a href="#"><i class="fab fa-twitter"></i></a></li>
									<li><a href="#"><i class="fab fa-instagram"></i></a></li>
									<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
								</ul>
							</div>
							<!-- End of .author-social-share -->
							*/ ?>
						</div>
						<!-- End of  .media-body -->
					</div>
					<!-- End of .media -->
				</div>
				<!-- End of .author-details-block -->
			</div>
			<!-- End of .col-lg-8 -->
		</div>
	</div>
	<!-- End of .container -->
</section>
<!-- End of .banner -->
@endif

<div class="random-posts section-gap">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<main class="axil-content">

					@foreach($posts as $post)
					<div class="media post-block post-block__mid m-b-xs-30">
						<a href="{{route('post.detail', ['slug' => $post->slug])}}" class="align-self-center"><img class=" m-r-xs-30" src="/upload/post/{{@$post->image}}" alt=""></a>
						<div class="media-body">
							<div class="post-cat-group m-b-xs-10">
								@foreach($post->categories as $post_category)
								<a href="{{route('post.all', ['category_slug' => $post_category->slug])}}" class="post-cat cat-btn bg-color-blue-one" style="background-color: {{$post_category->category->hex_color_code}} !important;">{{$post_category->category->name}}</a>
								@endforeach
							</div>
							<h3 class="axil-post-title hover-line hover-line">
								<a href="{{route('post.detail', ['slug' => $post->slug])}}">{{@$post->title}}</a>
							</h3>
							<p class="mid">{{@$post->description}}</p>
							<div class="post-metas">
								<ul class="list-inline">
									<li><a href="#">{{@$post->createdBy->name}}</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- End of .post-block -->
					@endforeach

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
@endsection