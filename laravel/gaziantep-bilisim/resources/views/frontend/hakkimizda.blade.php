@extends('welcome')
@section('content')
<div class="main-wrapper">
    <main class="main-container pt-100">

        <section class="pb-120 brk-top-triangle position-relative overflow-hid" style="background-color: #f7f9fd;">

			<img src="img/wave-bg-1.png" alt="alt" style="position: absolute; left: 0; top: 0;">
			<img src="img/wave-bg-2.png" alt="alt" style="position: absolute; right: -50px; top: 120px">
			<img src="img/wave-bg-3.png" alt="alt" style="position: absolute; left: 0; bottom: 0;">
			<div class="text-center mb-80 position-relative">
                <h2 class="font__family-roboto font__weight-thin line__height-52 font__size-46 text-uppercase letter-spacing-60 mt-20" data-brk-library="component__title">Vizyonumuz & Misyonumuz</h2>
				<p class="col-col-md-6 col-lg-6 font__family-open-sans font__size-14 line__height-21" style="margin:auto;"  data-brk-library="component__title">
                    Gaziantep başta olmak üzere Türkiye ve dünyada en başarılı bilişim şirketi olmak. Küresel pazarda rekabet gücü ile tercih edilen, güven duyulan, çevreye ve insana duyarlı, istihdam yaratma gücü olan bir bilişim firması olmak.
                </p>
				<hr class="divider wow zoomIn mt-35" data-brk-library="component__title">
			</div>
			<div class="container">
				<div class="position-relative">
					<div class="icon__wrapper-main icon__wrapper-overlay active__effect-main text-center" data-brk-library="component__sequence">
						<div class="row no-gutters">
							<div class="col-lg-4">
								<div class="icon__wrapper active__effect bg-white">
									<div class="icon__wrapper-body pt-30 pb-30 pl-30 pr-30">
										<div class="svg-wrap">
											<span class="before"></span>
											<img src="{{asset('img/0/h1.png')}}" alt="">
										</div>
										<h4 class="font__family-montserrat font__size-28 font__weight-bold">Satın Alma</h4>
										<p class="font__family-open-sans font__size-14 line__height-21">
                                            Satın Alma Süreçlerinin mevzuata uygun yönetimini ve 'Satın Alma Süreçlerinin' dijital ortamda yürütülmesini sağlayan paket yazılımı veya
                                            Sınav yapan kurumlar için detaylı değerlendirme, ölçme ve takibin yapılması amaçlarına yönelik yazılımlar geliştirilmektedir.
                                        </p>
										<a href="{{route('hizmetler')}}" class="btn btn-inside-out btn-lg border-radius-30 font__weight-bold btn-min-width-200" data-brk-library="component__button">
											<span class="before">daha fazla</span><span class="text">İncele</span><span class="after">daha fazla</span>
										</a>
										<span class="after"></span>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="icon__wrapper active__effect active current bg-white">
									<div class="icon__wrapper-body pt-30 pb-30 pl-30 pr-30">
										<div class="svg-wrap">
											<span class="before"></span>
											<img src="{{asset('img/0/h2.png')}}" alt="">
										</div>
										<h4 class="font__family-montserrat font__size-28 font__weight-bold">Bilgi Teknojileri</h4>
										<p class="font__family-open-sans font__size-14 line__height-21">Mobil Uygulama ve Oyunlar
                                            Bilgi Teknojileri Desteği
                                            Akıllı Kamera Sistemleri
                                            Paket Yazılımlar
                                            Kullanıcı dostu arayüz tasarımalrı ile kullanımı kolay programlar.
                                            Programın kurulum ve sonrasında en verimli kullanıcı deneyimi için destek.

                                        </p>
										<a href="{{route('urunler')}}" class="btn btn-inside-out btn-lg border-radius-30 font__weight-bold btn-min-width-200" data-brk-library="component__button">
											<span class="before">daha fazla</span><span class="text">İncele</span><span class="after">daha fazla</span>
										</a>
										<span class="after"></span>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="icon__wrapper active__effect bg-white">
									<div class="icon__wrapper-body pt-30 pb-30 pl-30 pr-30">
										<div class="svg-wrap">
											<span class="before"></span>
											<img src="{{asset('img/0/h3.png')}}" alt="">
										</div>
										<h4 class="font__family-montserrat font__size-28 font__weight-bold">Paket Yazılım</h4>
										<p class="font__family-open-sans font__size-14 line__height-21">İşletmenize uygun profesyonel paket yazılım çözümleri.
                                            Oyun Sektörü için Uygulama Geliştirme.
                                            Tamamen soruna yönelik özelleştirilmiş çözümler ile amaca hizmet.
                                            Çoklu proje yönetim desteği.
                                            Bulut depolama kaynakları ile güvenli ve hızlı veritabanı çözümleri.</p>
										<a href="{{route('urunler')}}" class="btn btn-inside-out btn-lg border-radius-30 font__weight-bold btn-min-width-200" data-brk-library="component__button">
											<span class="before">Daha Fazla</span><span class="text">İncele</span><span class="after">Daha Fazla</span>
										</a>
										<span class="after"></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
    </main>
</div>
@stop
