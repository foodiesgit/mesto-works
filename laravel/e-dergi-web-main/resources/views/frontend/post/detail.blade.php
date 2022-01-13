@extends('frontend.layout.master')

@section('title', $post->title.' - Detay')

@section('content')

<div class="post-single-wrapper p-t-xs-60">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<main class="site-main">
					<article class="post-details">
						<div class="single-blog-wrapper">
							<div class="post-details__social-share mt-3">
								<ul class="social-share social-share__with-bg social-share__vertical">
									<li><a target="_blank" href="#"><i class="fab fa-facebook-f"></i></a></li>
									<li><a target="_blank" href="#"><i class="fab fa-twitter"></i></a></li>
									<li><a target="_blank" href="#"><i class="fab fa-linkedin-in"></i></a></li>
								</ul>
								<!-- End of .social-share__no-bg -->
							</div>
							<!-- End of .social-share -->
							<h2 class="axil-post-title hover-line">
								{{$post->title}}
							</h2>

							{!! $post->content !!}

						</div>
						<!-- End of .single-blog-wrapper -->
					</article>
					<!-- End of .post-details -->

					<div class="post-shares m-t-xs-60">
						<ul class="social-share social-share__rectangular">
							<li>
								<a href="{{route('post.like', ['post_id' => $post->id, 'is_like' => 1])}}" class="btn {{$post->likes()->where('ip', request()->ip())->where('user_agent', request()->userAgent())->where('post_id', $post->id)->where('is_like', 1)->first() ? 'bg-primary' : 'bg-secondary'}} "><i class="far fa-thumbs-up"></i> {{$post->likes()->where('is_like', 1)->count()}} </a>
							</li>
							<li>
								<a href="{{route('post.like', ['post_id' => $post->id, 'is_like' => 0])}}" class="btn {{$post->likes()->where('ip', request()->ip())->where('user_agent', request()->userAgent())->where('post_id', $post->id)->where('is_like', 0)->first() ? 'bg-danger' : 'bg-secondary'}}"><i class="far fa-thumbs-down"></i> {{$post->likes()->where('is_like', 0)->count()}}</a>
							</li>
						</ul>
					</div>
					<!-- End of .post-shares -->
					
					<hr class="m-t-xs-50 m-b-xs-60">
					<div class="about-author m-b-xs-60">
						<div class="media">
							@if($post->createdBy->profile_photo != null)
							<a href="">
								<img class="author-img" src="/upload/user/{{$post->createdBy->profile_photo}}" alt="{{$post->createdBy->name}}">
							</a>
							@endif
							<div class="media-body">
								<div class="media-body-title">
									<h3><a href="#">{{$post->createdBy->name}}</a></h3>
								</div>
								<!-- End of .media-body-title -->
							</div>
						</div>
					</div>
					<!-- End of .about-author -->

					<div class="post-navigation-wrapper row  m-b-xs-60">

						@if($previous)
						<div class="post-navigation col-lg-6">
							<div class="post-nav-content">
								<a href="{{route('post.detail', ['slug' => $previous->slug])}}" class="prev-post">
									<i class="feather icon-chevron-left"></i> Önceki Yayın
								</a>
								<h3><a href="{{route('post.detail', ['slug' => $previous->slug])}}">{{@$previous->title}}</a></h3>
							</div>
						</div>
						@endif
						@if($next)
						<div class="post-navigation text-right col-lg-6">
							<div class="post-nav-content">
								<a href="{{route('post.detail', ['slug' => $next->slug])}}" class="next-post">
									Sonraki Yayın <i class="feather icon-chevron-right"></i>
								</a>
								<h3><a href="{{route('post.detail', ['slug' => $next->slug])}}">{{@$next->title}}</a></h3>
							</div>
						</div>
						@endif
					</div>
					<!-- End of .post-navigation -->
				</main>
				<!-- End of main -->
			</div>
			<!--End of .col-auto  -->
			<div class="col-lg-4">
				@include('frontend.post.sidebar')
			</div>
			<!-- End of .col-lg-4 -->
		</div>
		<!-- End of .row -->
	</div>
	<!-- End of .container -->
</div>
<!-- End of .post-single-wrapper -->
@endsection