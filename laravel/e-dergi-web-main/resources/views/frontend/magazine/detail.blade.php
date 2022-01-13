@extends('frontend.layout.master')

@section('title', $magazine->name.' - Detay')

@section('css-part')
<style type="text/css">

#flipbook{
	width:1152px;
	height:752px;
}
#flipbook .page{
	background-color:#ccc;
	background-size:100% 100%;
}
</style>
@endsection

@section('content')

<div class="post-single-wrapper p-t-xs-60">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
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
								{{$magazine->name}}
							</h2>

							<div id="flipbook">
								<div class="hard"> Turn.js </div>
								<div class="hard"></div>
								<div> Page 1 </div>
								<div> Page 2 </div>
								<div> Page 3 </div>
								<div> Page 4 </div>
								<div class="hard"></div>
								<div class="hard"></div>
							</div>

						</div>
						<!-- End of .single-blog-wrapper -->
					</article>
					<!-- End of .post-details -->

					<div class="post-shares m-t-xs-60">
						<ul class="social-share social-share__rectangular">
							<li>
								<a href="{{route('magazine.like', ['magazine_id' => $magazine->id, 'is_like' => 1])}}" class="btn {{$magazine->likes()->where('ip', request()->ip())->where('user_agent', request()->userAgent())->where('magazine_id', $magazine->id)->where('is_like', 1)->first() ? 'bg-primary' : 'bg-secondary'}} "><i class="far fa-thumbs-up"></i> {{$magazine->likes()->where('is_like', 1)->count()}} </a>
							</li>
							<li>
								<a href="{{route('magazine.like', ['magazine_id' => $magazine->id, 'is_like' => 0])}}" class="btn {{$magazine->likes()->where('ip', request()->ip())->where('user_agent', request()->userAgent())->where('magazine_id', $magazine->id)->where('is_like', 0)->first() ? 'bg-danger' : 'bg-secondary'}}"><i class="far fa-thumbs-down"></i> {{$magazine->likes()->where('is_like', 0)->count()}}</a>
							</li>
						</ul>
					</div>
					<!-- End of .post-shares -->
					
					<hr class="m-t-xs-50 m-b-xs-60">

					<div class="post-navigation-wrapper row  m-b-xs-60">

						@if($previous)
						<div class="post-navigation col-lg-6">
							<div class="post-nav-content">
								<a href="{{route('magazine.detail', ['slug' => $previous->slug])}}" class="prev-post">
									<i class="feather icon-chevron-left"></i> Önceki Yayın
								</a>
								<h3><a href="{{route('magazine.detail', ['slug' => $previous->slug])}}">{{@$previous->title}}</a></h3>
							</div>
						</div>
						@endif
						@if($next)
						<div class="post-navigation text-right col-lg-6">
							<div class="post-nav-content">
								<a href="{{route('magazine.detail', ['slug' => $next->slug])}}" class="next-post">
									Sonraki Yayın <i class="feather icon-chevron-right"></i>
								</a>
								<h3><a href="{{route('magazine.detail', ['slug' => $next->slug])}}">{{@$next->title}}</a></h3>
							</div>
						</div>
						@endif
					</div>
					<!-- End of .post-navigation -->
				</main>
				<!-- End of main -->
			</div>
			<!--End of .col-auto  -->
		</div>
		<!-- End of .row -->
	</div>
	<!-- End of .container -->
</div>
<!-- End of .post-single-wrapper -->
@endsection

@section('scripts')
<script src="/f-assets/js/turn.min.js"></script>

<script type="text/javascript">
	$("#flipbook").turn({
		width: 400,
		height: 300,
		autoCenter: true
	});
</script>
@endsection