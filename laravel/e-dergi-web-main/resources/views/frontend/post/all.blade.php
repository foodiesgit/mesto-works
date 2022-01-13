@extends('frontend.layout.master')

@section('title', 'Postlar')

@section('content')
<!-- Banner starts -->
<section class="banner banner__default bg-grey-light-three">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-12">
				<div class="post-title-wrapper">
					<h2 class="m-b-xs-0 axil-post-title hover-line">Postlar @if($category) - {{$category->name}} @endif @if($request->search) - {{$request->search}} @endif</h2>
				</div>
				<!-- End of .post-title-wrapper -->
			</div>
			<!-- End of .col-lg-8 -->
		</div>
	</div>
	<!-- End of .container -->
</section>
<!-- End of .banner -->


<div class="random-posts section-gap">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<main class="axil-content">

					@if($posts->count() == 0)
					<h4>Sonuç bulunamadı.</h4>
					@endif

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
									<li><a href="{{route('author.detail', ['slug' => $post->slug])}}">{{@$post->name}}</a></li>
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
