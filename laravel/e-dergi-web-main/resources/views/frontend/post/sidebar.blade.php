<aside class="post-sidebar">

	<div class="category-widget m-b-xs-40">
		<div class="widget-title">
			<h3>Kategoriler</h3>
			<div class="owl-nav">
				<button class="custom-owl-prev"><i class="feather icon-chevron-left"></i></button>
				<button class="custom-owl-next"><i class="feather icon-chevron-right"></i></button>
			</div>
		</div>

		<div class="category-carousel">
			<div class="owl-carousel owl-theme">

				@foreach($categories->chunk(2) as $chunk)
				<div class="cat-carousel-inner">
					<ul class="category-list-wrapper">
						@foreach($chunk as $category)
						<li class="category-list perfect-square">
							<a href="{{route('post.all', ['category_slug' => $category->slug])}}" class="list-inner" style="background-image: url(/f-assets/images/category-bg/category-bg-5.jpg)">
								<div class="post-info-wrapper overlay">
									<div class="counter-inner"><span class="counter">{{$category->posts_count}}</span></div>
									<h4 class="cat-title">{{$category->name}}</h4>
								</div>
								<!-- End of .counter-wrapper -->
							</a>
						</li>
						<!-- End of .category-list -->
						@endforeach

					</ul>
					<!-- End of .category-list-wrapper -->
				</div>
				<!-- End of .cat-carousel-inner -->
				@endforeach

			</div>
			<!-- End of  .owl-carousel -->
		</div>
		<!-- End of .category-carousel -->
	</div>
	<!-- End of .category-widget -->

	<div class="post-widget sidebar-post-widget m-b-xs-40">
		<ul class="nav nav-pills row no-gutters">
			<li class="nav-item col">
				<a class="nav-link active" data-toggle="pill" href="#recent-post">Son Postlar</a>
			</li>
		</ul>

		<div class="tab-content">
			<div class="tab-pane fade show active" id="recent-post">
				<div class="axil-content">
					@foreach($recentposts as $recentpost)
					<div class="media post-block post-block__small">
						<a href="{{route('post.detail', ['slug' => $recentpost->slug])}}" class="align-self-center"><img class=" m-r-xs-30" src="/upload/post/{{$recentpost->image}}" alt="{{$recentpost->title}}"></a>
						<div class="media-body">
							<div class="post-cat-group">
								@foreach($recentpost->categories as $recentpost_category)
								<a href="{{route('post.all', ['category_slug' => $recentpost_category->slug])}}" class="post-cat color-blue-three" style="color: {{$recentpost_category->category->hex_color_code}}">{{$recentpost_category->category->name}},</a>
								@endforeach
							</div>
							<h4 class="axil-post-title hover-line hover-line"><a href="{{route('post.detail', ['slug' => $recentpost->slug])}}">{{@$recentpost->title}}</a></h4>
							<div class="post-metas">
								<ul class="list-inline">
									<li><a href="{{route('author.detail', ['slug' => $recentpost->slug])}}">{{@$recentpost->name}}</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- End of .post-block -->
					@endforeach
				</div>
				<!-- End of .content -->
			</div>
			<!-- End of .tab-pane -->
		</div>
		<!-- End of .tab-content -->

	</div>
	<!-- End of .sidebar-post-widget -->

</aside>
<!-- End of .post-sidebar -->
