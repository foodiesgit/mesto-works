@extends('welcome')
@section('content')
<div class="main-wrapper">
	<main class="main-container">
		<section class="pt-100 pb-100">
			<div class="text-center">
				<h2 class="font__family-montserrat font__size-56 font__weight-bold line__height-60 mb-20">Hizmetlerimiz</h2>
				<p class="brk-dark-font-color font__size-16 font__weight-normal line__height-26 mb-80">
					Yetişmiş mühendislere istihdam ve kendisini daha da geliştirmesine imkan sağlamak.
				</p>
			</div>
			<div class="mb-70">
				<div class="container">
					<div class="row">
                        @if($services)
                            @foreach($services as $item)
                            <div class="col-lg-4">
								<div class="flip-box">
									<div class="flip flip_horizontal flip-box__gradient brk-library-rendered" data-brk-library="component__flip_box">
										<div class="flip__front text-center flip-box__bg flip-box__gradient-pb100 lazyloaded">
											<span class="overlay-position-full brk-base-bg-gradient-right-bottom"></span>
											<div class="flip-box__gradient-title font__family-montserrat font__weight-light font__size-28 text-capitalize">
												<span class="font__weight-bold"></span>{{$item->title}}
											</div>
										</div>
										<div class="flip__back text-center">
											<div class="flip-box__position flip-box__position_75">
												<h4 class="flip-box__gradient-h4 font__family-montserrat font__weight-light font__size-28 text-capitalize">
													<span class="font__weight-bold"></span>{{$item->title}}
												</h4>
												<p class="font__family-open-sans font__size-14 line__height-21 text-gray mt-15 pl-30 pr-30">
													<img src="{{asset($item->image)}}" alt="">
												</p>

											</div>
										</div>
									</div>
								</div>
							</div>
                            @endforeach
                        @endif
					</div>
				</div>
			</div>
		</section>
	</main>
</div>
@stop
