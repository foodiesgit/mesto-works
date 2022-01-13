<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <title>Gazi Danışmanlık Kurumsal Web Sitesi</title>

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">

  <link rel="icon" type="image/png" href="{{ URL::to('assets/home/images/favicon.png') }}">
  <link rel="stylesheet" href="{{ URL::to('assets/home/plugins/bootstrap/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ URL::to('assets/home/plugins/fontawesome/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ URL::to('assets/home/plugins/animate-css/animate.css') }}">
  <link rel="stylesheet" href="{{ URL::to('assets/home/plugins/slick/slick.css') }}">
  <link rel="stylesheet" href="{{ URL::to('assets/home/plugins/slick/slick-theme.css') }}">
  <link rel="stylesheet" href="{{ URL::to('assets/home/plugins/colorbox/colorbox.css') }}">
  <link rel="stylesheet" href="{{ URL::to('assets/home/css/style.css') }}">
  <style media="screen">
  .collapsible {
background-color: #777;
color: white;
cursor: pointer;
padding: 18px;
width: 100%;
border: none;
text-align: left;
outline: none;
font-size: 15px;
}

.active, .collapsible:hover {
background-color: #555;
}

.content {
padding: 0 18px;
display: none;
overflow: hidden;
background-color: #f1f1f1;
}
.image:hover{
opacity: .6;
}
  </style>
  {{-- <style media="screen">
  .call-to-action-box .action-style-box {
  background: #0061b3;
  padding: 30px;
}
.ts-service-box .ts-service-icon i {
    font-size: 36px;
    float: left;
    color: #0061b3;
}
.accordion-group .card-header .btn[aria-expanded="true"] {
    color: #0061b3;
}
.btn-primary {
    background: #0061b3;
}
.slider.border {
    background: none;
    border: 2px solid #0061b3 !important;
}
.slider.border:hover {
    background: #0061b3;
    border: 2px solid transparent;
}
.ts-facts .ts-facts-content .ts-facts-title {
   font-size: 16px;
   color: #0061b3;
   margin: 0;
}
.copyright {
    background: #0061b3;
    color: #111;
    padding: 25px 0;
    position: relative;
    z-index: 1;
    font-weight: 600;
    font-size: 12px;
}
.footer .widget-title {
    font-size: 16px;
    font-weight: 700;
    position: relative;
    margin: 0 0 30px;
    padding-left: 15px;
    text-transform: uppercase;
    color: #fff;
    border-left: 3px solid #0061b3;
}
.slick-dots li button:hover:before, .slick-dots .slick-dots li button:focus:before, .slick-dots li.slick-active button:before {
    opacity: 1;
    color: #0061b3;
}
#back-to-top .btn.btn-primary {
    width: 36px;
    height: 36px;
    line-height: 36px;
    background: rgba(0, 0, 0, 0.9);
    border-radius: 3px;
    color: #008aff !important;
    font-weight: 700;
    font-size: 16px;
    padding: 0;
}
.bg-white {
    background-color: #343a40!important;
}
ul.top-info-box li .info-box .info-box-title {
    font-size: 14px;
    margin-bottom: 8px;
    line-height: normal;
    color: #ebebeb;
}
ul.top-info-box li .info-box .info-box-subtitle {
    margin: 0;
    line-height: normal;
    font-size: 15px;
    font-weight: 700;
    color: #9e9e9e;
}
.header-get-a-quote .btn-primary:hover {
    color: #0e61af !important;
}
  </style> --}}
  <style media="screen">
    .top-bar{
      width: 100%;
      position: fixed;
      z-index: 999;
      height: 40px;
      margin-bottom: 160px;
    }
    #header{
      margin-top: 40px;
    }
  </style>
</head>
<body>
  <div class="body-inner">

    <div id="top-bar" class="top-bar">
        <div class="container">
          <div class="row">
              <div class="col-lg-12 col-md-12">
                <ul class="top-info text-center text-md-left">
                  <ul class="top-info text-center text-md-left">

                        {{-- <a href="https://www.google.com/maps?q=37.06207275390625,37.37916946411133&z=17&hl=tr" target="_blank">
                        <i class="fas fa-map-marker-alt"></i> <p class="info-text">Gaziantep</p>
                        </a> --}}
                          <li><a href="#"><i class="fas fa-home"></i>ANASAYFA</a></li>
                          <li><a href="{{ URL::to('/') }}#hakkimizda">HAKKIMIZDA</a></li>
                          <li><a href="{{ URL::to('/') }}#misyon">MİSYON/VİZYON</a></li>
                          <li><a href="{{ URL::to('/') }}#mevzuat">MEVZUAT</a></li>
                          <li><a href="{{ URL::to('/') }}#faaliyet">FAALİYET ALANLARI/HİZMETLERİMİ </a></li>
                          <li><a href="tel:+903423300055">İLETİŞİM</a></li>
                  </ul>
                </ul>
              </div>
              <!--/ Top info end -->

              {{-- <div class="col-lg-4 col-md-4 top-social text-center text-md-right">
                <ul class="list-unstyled">
                    <li>
                      {{-- <a title="Facebook" href="#">
                          <span class="social-icon"><i class="fab fa-facebook-f"></i></span>
                      </a> --}}
                      {{-- <a title="Twitter" href="https://twitter.com/gazidanismanlik" title="Gazi Danışmanlık" target="_blank">
                          <span class="social-icon"><i class="fab fa-twitter"></i></span>
                      </a> --}}
                      {{-- <a title="Instagram" href="#">
                          <span class="social-icon"><i class="fab fa-instagram"></i></span>
                      </a>
                    </li>
                </ul>
              </div> --}}
              <!--/ Top social end -->
          </div>
          <!--/ Content row end -->
        </div>
        <!--/ Container end -->
    </div>
    <!--/ Topbar end -->
<!-- Header start -->
<header id="header" class="header-one">
  <div class="bg-white">
    <div class="container">
      <div class="logo-area">
          <div class="row align-items-center">
            <div class="logo col-lg-3 text-center text-lg-left mb-3 mb-md-5 mb-lg-0">
                <a class="d-block" href="{{ route('internet')}}">
                  <img loading="lazy" src="uploads/orginal.png" alt="Gaziantep Danışmanlık" style="height: 53px;">
                  {{-- HAFRİYAT --}}
                </a>
            </div><!-- logo end -->

            <div class="col-lg-9 header-center">
                <ul class="top-info-box">
                  <li>
                    <div class="info-box">
                      <div class="info-box-content">
                          <p class="info-box-title">Bizi Arayın</p>
                          <p class="info-box-subtitle">
                            <a href="tel:+903423300055">0(342) 330 00 55</a>
                          </p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="info-box">
                      <div class="info-box-content">
                          <p class="info-box-title">E-Posta</p>
                          <p class="info-box-subtitle">hafriyat@gazidanismanlik.com.tr</p>
                      </div>
                    </div>
                  </li>

                  <li class="header-get-a-quote">
                    <img src="{{ URL::to('assets\home\images\gaziantep-buyuksehir.png') }}" width="150" alt="">
                    {{-- <a class="btn btn-primary" href="{{ route('sign-up') }}">Sisteme Giriş</a> --}}
                  </li>
                </ul><!-- Ul end -->
            </div><!-- header right end -->
          </div><!-- logo area end -->

      </div><!-- Row end -->
    </div><!-- Container end -->
  </div>

  <div class="site-navigation">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              {{-- <nav class="navbar navbar-expand-lg navbar-dark p-0">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div id="navbar-collapse" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav mr-auto"> --}}
                      {{-- <li class="nav-item dropdown active">
                          <a href="#" class="nav-link" data-toggle="dropdown">HAFRİYAT</a>
                          <ul class="dropdown-menu" role="menu">
                            <li class="active"><a href="index.html">Home One</a></li>
                            <li><a href="index-2.html">Home Two</a></li>
                          </ul>
                      </li> --}}

                      {{-- <li class="nav-item dropdown">
                          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Company <i class="fa fa-angle-down"></i></a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="team.html">Our People</a></li>
                            <li><a href="testimonials.html">Testimonials</a></li>
                            <li><a href="faq.html">Faq</a></li>
                            <li><a href="pricing.html">Pricing</a></li>
                          </ul>
                      </li>

                      <li class="nav-item dropdown">
                          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Projects <i class="fa fa-angle-down"></i></a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="projects.html">Projects All</a></li>
                            <li><a href="projects-single.html">Projects Single</a></li>
                          </ul>
                      </li>

                      <li class="nav-item dropdown">
                          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Services <i class="fa fa-angle-down"></i></a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="services.html">Services All</a></li>
                            <li><a href="service-single.html">Services Single</a></li>
                          </ul>
                      </li>

                      <li class="nav-item dropdown">
                          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Features <i class="fa fa-angle-down"></i></a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="typography.html">Typography</a></li>
                            <li><a href="404.html">404</a></li>
                            <li class="dropdown-submenu">
                                <a href="#!" class="dropdown-toggle" data-toggle="dropdown">Parent Menu</a>
                                <ul class="dropdown-menu">
                                  <li><a href="#!">Child Menu 1</a></li>
                                  <li><a href="#!">Child Menu 2</a></li>
                                  <li><a href="#!">Child Menu 3</a></li>
                                </ul>
                            </li>
                          </ul>
                      </li>

                      <li class="nav-item dropdown">
                          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">News <i class="fa fa-angle-down"></i></a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="news-left-sidebar.html">News Left Sidebar</a></li>
                            <li><a href="news-right-sidebar.html">News Right Sidebar</a></li>
                            <li><a href="news-single.html">News Single</a></li>
                          </ul>
                      </li>

                      <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li> --}}
                    {{-- </ul>
                </div>
              </nav> --}}
          </div>
          <!--/ Col end -->
        </div>
        <!--/ Row end -->

         <!-- Search end -->

        <div class="search-block" style="display: none;">
          <label for="search-field" class="w-100 mb-0">
            <input type="text" class="form-control" id="search-field" placeholder="Type what you want and enter">
          </label>
          <span class="search-close">&times;</span>
        </div><!-- Site search end -->
    </div>
    <!--/ Container end -->

  </div>
  <!--/ Navigation end -->
</header>
<!--/ Header end -->

<div class="banner-carousel banner-carousel-1 mb-0">
  @php
    $sliders = ["slider0.jpg" , "bg2.jpg" , "wallpapers1.png"];
  @endphp
  @for ($i=0; $i < 3; $i++)


  <div class="banner-carousel-item" style="background-image:url(assets/home/images/slider-main/@php
    echo $sliders[$i];
  @endphp)">
    <div class="slider-content">
        <div class="container h-100">
          <div class="row align-items-center h-100">
              <div class="col-md-12 text-center">
                <h2 class="slide-title" data-animation-in="slideInLeft" style="text-shadow: 2px 2px #007bff;">Gazİ Danışmanlık</h2>
                {{-- <h3 class="slide-sub-title" data-animation-in="slideInRight">SLOGAN</h3> --}}
                <p data-animation-in="slideInLeft" data-duration-in="1.2">
                    {{-- <a href="services.html" class="slider btn btn-primary">Our Services</a> --}}
                    <a href="https://www.google.com/maps?q=37.06207275390625,37.37916946411133&z=17&hl=tr" target="_blank" class="slider btn btn-primary border" style="background:#ffb600"><i class="fa fa-map"></i></a>
                </p>
              </div>
          </div>
        </div>
    </div>
  </div>
   @endfor


</div>

<section class="call-to-action-box no-padding">
  <div class="container">
    <div class="action-style-box">
        <div class="row align-items-center">
          <div class="col-md-8 text-center text-md-left">
              <div class="call-to-action-text">
                <h3 class="action-title">GAZİ DANIŞMANLIK</h3>
                <p>Sunduğumuz tüm hizmetlerde katılımcı, şeffaf ve hesap verebilirlik ilkelerine bağlı kalarak mevzuat hükümlerinin uygulanmasınınım sürdürülebilirliğini sağlamak, bu hükümlerle müşteri ve çalışanlarımızın ihtiyaç ve beklentileri doğrultusunda sürekli iyileştirmeyi sağlamak ve tüm çalışanlarımızda kalite bilincini oluşturmaktır.</p>
              </div>
          </div><!-- Col end -->
          <div class="col-md-4 text-center text-md-right mt-3 mt-md-0">
              <div class="call-to-action-btn">
                <a class="btn btn-dark" href="{{ route('sign-up') }}">SİSTEME GİRİŞ</a>
              </div>
          </div><!-- col end -->

        </div><!-- row end -->
    </div><!-- Action style box -->
  </div><!-- Container end -->
</section><!-- Action end -->
<section>
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3183.8073942680167!2d37.37698081529727!3d37.06207277989558!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzfCsDAzJzQzLjUiTiAzN8KwMjInNDUuMCJF!5e0!3m2!1str!2str!4v1629358309747!5m2!1str!2str" width="600" height="450"  style="width:100%;border:0px;" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</section>
<section id="hakkimizda" class="ts-features">
  <div class="container">
    <div class="row">
        <div class="col-lg-12">
          <div class="ts-intro">
              <h2 class="into-title">GAZİ DANIŞMANLIK</h2>
              <h3 class="into-sub-title">
                <span class="ts-service-icon">
                  <i class="fas fa-users"></i>
                </span>HAKKIMIZDA</h3>
              <p>
                ŞİRKETİMİZ 18.02.2005 TARİHİNDE MÜŞAVİLİK, ÖZEL EĞİTİM VE KONTRÖLLÜK VE HAFRİYAT HİZMETİ AMACIYLA KURULMUŞ OLUP;<br>
                1.	HAFRİYAT İŞLETMECİLİĞİ<br>
                2.	PERSONEL ÇALIŞTIRMA HİZMET İŞİ<br>
                3.	ENGELSİZ YAŞAM MERKEZİ İŞLETMECİLİĞİ <br>
                4.	MYK BELGELENDİRME İŞİ<br>
FAALİYETLERİNİ YÜRÜTMEKTEDİR.
              </p>
          </div><!-- Intro box end -->

          <div class="gap-20" id="misyon"></div>


          <div class="ts-intro" >
              {{-- <h2 class="into-title">GAZİ DANIŞMANLIK</h2> --}}
              <h3 class="into-sub-title">
                <span class="ts-service-icon">
                  <i class="fas fa-thumbs-up"></i>
                </span>MİSYONUMUZ</h3>
              <p>
              Tarafımızdan yapılmakta olan bütün proje faaliyetlerin, hedeflenen kapsam ve kalitede, bütçe sınırları içerisinde, kamu kaynaklarının etkin ve verimli kullanılarak yapılmasını sağlamaktır.
              </p>
          </div><!-- Intro box end -->

          <div class="gap-20"></div>


          <div class="ts-intro">
              {{-- <h2 class="into-title">GAZİ DANIŞMANLIK</h2> --}}
              <h3 class="into-sub-title">
                <span class="ts-service-icon">
                  <i class="fas fa-trophy"></i>
                </span>VİZYONUMUZ</h3>
              <p>
                Gelişen ve büyüyen iller arasındaki şehrimizin;
                <ul>
                  <li>Daha yaşanabilir,</li>
                  <li>Daha yeşil bir çevrede,</li>
                  <li>Daha sağlıklı yaşam süren mutlu bir toplum içerisinde olabilmek amacıyla
                  Kalite Yönetim Sistemini mevzuat hükümleri ile vatandaş ihtiyaç ve beklentileri doğrultusunda sürekli iyileştirebilmek için tüm çalışanlarda kalite bilincini oluşturmak, Gaziantep Büyükşehir Belediyesine ve GASKİ idaresine personel sağlamak ve eğitimler vererek bu personellerin verimliliklerini arttırmaktır.
                  Gaziantep il sınırları içeresinde oluşan inşaat ve hafriyat atıklarının depolanması ve bertaraf işlemlerini çevre kirliliği yaratmadan gerçekleştirmektir. Kaçak döküntüleri engellemek ve inşaat atıklarının mevzuata uygun bertarafını sağlamaktır.
                  </li>
                </ul>



              </p>
          </div><!-- Intro box end -->

          <div class="gap-20"></div>



        </div><!-- Col end -->

        <div class="col-lg-12 mt-12 mt-lg-12">
          <h3 class="into-sub-title">GAZİ DANIŞMANLIK</h3>
          {{-- <p>Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir. Lorem Ipsum kullanmanın amacı, sürekli 'buraya metin gelecek, buraya metin gelecek' yazmaya kıyasla daha dengeli bir harf dağılımı sağlayarak okunurluğu artırmasıdır. Şu anda birçok masaüstü yayıncılık paketi ve web sayfa düzenleyicisi, varsayılan mıgır metinler olarak Lorem Ipsum kullanmaktadır. </p> --}}

          <div class="accordion accordion-group" id="our-values-accordion">
              <div class="card">
                <div class="card-header p-0 bg-transparent" id="headingOne">
                    <h2 class="mb-0">
                      <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <i class="fa fa-star"></i>  KALİTE POLİTİKAMIZ
                      </button>
                    </h2>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#our-values-accordion">
                    <div class="card-body">
                      Gazi Danışmanlık A.Ş. olarak kalite politikamız;<br>
                      <ul>
                        <li>Sunduğumuz tüm hizmetlerde katılımcı, şeffaf ve hesap verebilirlik ilkelerine bağlı kalarak mevzuat hükümlerinin uygulanmasınınım sürdürülebilirliğini sağlamak, bu hükümlerle müşteri ve çalışanlarımızın ihtiyaç ve beklentileri doğrultusunda sürekli iyileştirmeyi sağlamak ve tüm çalışanlarımızda kalite bilincini oluşturmaktır.</li>
                        <li>
                          Tüm süreçlerde, müşterinin temel ihtiyaç ve sosyal beklentilerini tam olarak karşılayan bir anlayış içinde güvenilir ve aranan firma olmak, tüm çalışanlara kalite bilincini benimsetmek, tedarikçilerle, kazan kazan ilkesi çerçevesinde karşılıklı yarara dayanan bir iş birliği içerisinde olmak, içinde bulunduğumuz topluma ve çevreye saygılı, örnek bir kuruluş olmak ve iş hacmini sürekli geliştirerek, ülke ekonomisine katkıda bulunmaktır.</li>
                      </ul>

                    </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header p-0 bg-transparent" id="headingTwo">
                    <h2 class="mb-0">
                      <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <i class="fa fa-adjust"></i>  İLKELERİMİZ
                      </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#our-values-accordion">
                    <div class="card-body">
                      a.	Adil olmak,<br>
                      b.	Şeffaf olmak,<br>
                      c.	İlerleme odaklı olmak,<br>
                      d.	Yenilikçi olmak,<br>
                      e.	Yüksek kalite anlayışı ile hizmet vermek,<br>
                      f.	Paydaşları ile iş birliği içinde olmak,<br>
                      g.	Sosyal sorumluluk bilincine sahip olmaktır.<br>
                    </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header p-0 bg-transparent" id="headingThree">
                    <h2 class="mb-0">
                      <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <i class="fa fa-building"></i>  İSG POLİTİKASI
                      </button>
                    </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#our-values-accordion">
                    <div class="card-body">
                      GAZİ DANIŞMANLIK yönetimi, İSG politikasını oluşturmuştur. İSG Politikası her yıl yapılan yönetimin gözden geçirme faaliyetleri sırasında gözden geçirilir ve gerek görülürse revize edilir.
                      <br>İSG politikasının şirketin tümüne yayılmasından ve tüm çalışanlar tarafından anlaşılıp uygulanmasından her kademedeki yöneticiler sorumludur. İş Sağlığı ve Güvenliği politikası web sitesinde yayınlanarak, duvarlara asılarak, eğitimlerle veya çalışanlarla yapılan toplantılarda duyurularak daha iyi anlaşılması sağlanır.
                      Bu politika Genel Müdür tarafından imzalanmış olup bu el kitabının GAZİ DANIŞMANLIK Hakkında bölümünde yer almaktadır.
                      <hr>
                      Gazi Danışmanlık Hizmet Müşavirlik İnşaat Sanayi ve Ticaret A.Ş. 2005 yılında Gaski A.Ş. ve Gaziantep Büyükşehir Belediyesi’nin ortak iştiraki olarak kurulmuştur. Kurulduğu günden bu yana Gaski ve Büyükşehir Belediyesi’nin ihtiyacı olan vasıflı -vasıfsız personel ihtiyacını karşılamaktadır.
                      Aynı zamanda Gaziantep il sınırları içerisinde çıkan inşaat yıkıntı atıkları ve hafriyatın sağlıklı bir şekilde depolanması ve bertaraf edilmesi işlemlerini Gaziantep Büyükşehir Belediyesi Zabıta Daire Başkanlığı yönetiminde gerçekleştirmektedir.
                      Verilen tüm hizmet alanlarında; kaynaklarını verimli ve etkin kullanarak, toplumun yaşam kalitesini ve memnuniyetini arttırmak için en iyi hizmeti sağlamaktır.
                      Abdülhamithan hafriyat sahası ve Taşlıca hafriyat sahası olmak üzere tarafımıza tahsis edilen aktif olarak çalıştığımız 2 adet saha bulunmaktadır.

                    </div>
                </div>
              </div>
          </div>
          <!--/ Accordion end -->

          <button type="button" id="faaliyet" class="collapsible">FAALİYET ALANLARI/HİZMETLERİMİZ</button>
          <div class="content">
            <p>
              1.	HAFRİYAT İŞLETMECİLİĞİ<br>
              2.	PERSONEL ÇALIŞTIRMA HİZMET İŞİ<br>
              3.	ENGELSİZ YAŞAM MERKEZİ İŞLETMECİLİĞİ<br>
              4.	MYK BELGELENDİRME İŞİ<br>
            </p>

          </div>

          <button type="button" class="collapsible">1.A.)HAFRİYAT YÖNETİM SİSTEMİ</button>
          <div class="content">
            <p>
              <br>
              GAZİ ŞEHRİMİZDE OLUŞAN TÜM HAFRİYATIN TOPLANMASI, GEÇİCİ DEPOLANMASI, YERİNDE BERTARAFI, ALT YAPI, YOL VE DOLGU MALZEMESİ OLARAK ZABITA DAİRE BAŞKANLIĞI VE İLÇE BELEDİYELERLE BİRLİKTE KOORDİNELİ OLARAK YÖNLENDİRİLMESİ VE DEPOLAMA SAHALARINA DEPOLANMASINI İÇEREN SİSTEMDİR.
              <br>SİSTEMİN AMACI; YÖNETİM ANLAYIŞI İNSAN, ÇEVRE KORUMA VE ÇEVRE SORUNLARINI ÇÖZME DOĞRULTUSUNDA OLAN GAZİANTEP BÜYÜKŞEHİR BELEDİYESİ ŞEHİRDE OLUŞAN TÜM HAFRİYATIN ÇEVREYE VERDİĞİ ZARARI MİNİMUMA İNDİREREK DAHA AZ EMİSYON DAHA ÇOK KARBON AYAK İZİ, DAHA AZ ATIK VE DAHA AZ ÇEVRE KİRLİLİĞİNİ HEDEFLEMEKTEDİR.
                <img src="{{ URL::to('assets\home\images\karbon.jpg')}}" alt="" style="display:block;">
                1.A.A) HAFRİYAT DEPOLAMA SAHALARIMIZ<br>
                GAZİANTEP İL SINIRLARI İÇERİSİNDE FAAL OLARAK İKİ ADET HAFRİYAT DEPOLAMA SAHAMIZ BULUNMAKTADIR. BUNLAR; ŞEHİTKAMİL İLÇEMİZDEKİ “TAŞLICA HAFRİYAT DEPOLAMA SAHASI” VE ŞAHİNBEY İLÇEMİZDEKİ “ABDÜLHAMİDHAN HAFRİYAT DEPOLAMA SAHASI”DIR.
            </p>
          </div>

          <button type="button" class="collapsible">1.B) HAFRİYAT TOPRAĞI VE İNŞAAT YIKINTI ATIĞI TAŞIMA KABUL BELGESİ BAŞVURU BİLGİLERİ</button>
          <div class="content">
            <p>
              <i class="fa fa-check"></i>	TAPU FOTOKOBİSİ<br>
              <i class="fa fa-check"></i> İHALELİ İŞLERDE İHALE SÖZLEŞMESİ FOTOKOPİSİ<br>
              <i class="fa fa-check"></i> İMZA SİRKÜSÜ FOTOKOPİSİ<br>
              <i class="fa fa-check"></i> KAT KARŞILIĞI/İNŞAAT YAPIM SÖZLEŞMESİ FOTOKOPİSİ<br>
              <i class="fa fa-check"></i> VEKÂLETNAME FOTOKOPİSİ <br>
              <i class="fa fa-check"></i> KİMLİK FOTOKOPİSİ<br>
              <i class="fa fa-check"></i> VAZİYET PLANI<br>
              <i class="fa fa-check"></i> PLANKOTE <br>
              <i class="fa fa-check"></i> FİRMA KAŞESİ<br>
              <i class="fa fa-check"></i> HAFRİYAT FİRMASI İLE BİRLİKTE BAŞVURU YAPILACAKTIR<br>
              <i class="fa fa-check"></i>  * (HAFRİYAT TOPRAĞI VE İNŞAAT YIKINTI ATIĞI TAŞIMA KABUL BELGESİ ÖRNEKTİR FOTOĞRAFI)<br>

            </p>
          </div>
          <button type="button" class="collapsible">1.C) İŞ MAKİNASI MOBİL KIRICI KİRALAMA HİZMETİ </button>
          <div class="content">
            <p>ŞİRKETİMİZ BÜNYESİNDE OLAN MOBİL DARBELİ KIRICI ŞEHİRDE OLUŞAN İHTİYACA GÖRE FİRMALARA KİRALANMAKTADIR. </p>
          </div>
          <button type="button" class="collapsible">2. PERSONEL ÇALIŞTIRMA HİZMET İŞİ</button>
          <div class="content">
            <p>ŞİRKETİMİZ GAZİANTEP BÜYÜKŞEHİR BELEDİYESİNİN TEŞEKKÜLÜ OLUP, BÜYÜKŞEHİR BELEDİYESİNİN BAĞLI KURULUŞU GASKİ GENEL MÜDÜRLÜĞÜ’NE PERSONEL TEDARİKÇİSİ OLARAK HİZMET VERMEKTEDİR. </p>
          </div>
          <button type="button" class="collapsible">3. ENGELSİZ YAŞAM MERKEZİ </button>
          <div class="content">
            <p>ŞİRKETİMİZ TARAFINDAN İŞLETİLMEKTE OLAN GAZİANTEP BÜYÜKŞEHİR BELEDİYESİ ENGELSİZ YAŞAM MERKEZİ, GÖRME, İŞİTME, ZİHİNSEL, DİL VE KONUŞMA GÜÇLÜĞÜ, ÖZEL ÖĞRENME GÜÇLÜĞÜ, YAYGIN GELİŞİM VE BEDENSEL ENGELLİ OLMAK ÜZERE 7 ALANDA ENGELLİLERE YÖNELİK FAALİYET YÜRÜTMEKTEDİR. </p>
          </div>

          <button type="button" class="collapsible">4.MYK ( MESLEKİ YETERLİLİK KURUMU) BELGELENDİRME İŞİ</button>
          <div class="content">
            <p>ŞİRKETİMİZ 5544 SAYILI MESLEKİ YETERLİLİK KURUMU KANUNU KAPSAMINDA YETKİLENDİRİLMİŞ BELGELENDİRME KURULUŞU OLARAK FAALİYET GÖSTERMEYE BAŞLAMIŞTIR.</p>
          </div>

          <button type="button" id="mevzuat" class="collapsible">HAFRİYAT YÖNETMELİĞİ</button>
          <div class="content">
            <br>
            <p>İlgili madde için <a class="btn btn-sm btn-success" href="https://www.mevzuat.gov.tr/mevzuat?MevzuatNo=5401&MevzuatTur=7&MevzuatTertip=5" target="_blank"> Tıklayınız </a> </p>
          </div>
          <button type="button" class="collapsible">ÇEVRE KANUNU</button>
          <div class="content">
            <br>
            <p>İlgili madde için <a class="btn btn-sm btn-success" href="https://www.mevzuat.gov.tr/MevzuatMetin/1.5.2872.pdf" target="_blank"> Tıklayınız </a> </p>

          </div>








{{--
          <button type="button" class="collapsible">HAFRİYAT YÖNETMELİĞİ</button>
          <div class="content">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          </div> --}}


        </div><!-- Col end -->
    </div><!-- Row end -->
  </div><!-- Container end -->
</section><!-- Feature are end -->

{{-- <section id="facts" class="facts-area dark-bg">
  <div class="container">
    <div class="facts-wrapper">
        <div class="row">
          <div class="col-md-3 col-sm-6 ts-facts">
              <div class="ts-facts-img">
                <img loading="lazy" src="assets/home/images/icon-image/fact1.png" alt="facts-img">
              </div>
              <div class="ts-facts-content">
                <h2 class="ts-facts-num"><span class="counterUp" data-count="1789">0</span></h2>
                <h3 class="ts-facts-title">TOPLAM PROJELER</h3>
              </div>
          </div><!-- Col end -->

          <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-sm-0">
              <div class="ts-facts-img">
                <img loading="lazy" src="assets/home/images/icon-image/fact2.png" alt="facts-img">
              </div>
              <div class="ts-facts-content">
                <h2 class="ts-facts-num"><span class="counterUp" data-count="647">0</span></h2>
                <h3 class="ts-facts-title">HAFRİYAT</h3>
              </div>
          </div><!-- Col end -->

          <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-md-0">
              <div class="ts-facts-img">
                <img loading="lazy" src="assets/home/images/icon-image/fact3.png" alt="facts-img">
              </div>
              <div class="ts-facts-content">
                <h2 class="ts-facts-num"><span class="counterUp" data-count="4000">0</span></h2>
                <h3 class="ts-facts-title">ÇALIŞMA SAATİ</h3>
              </div>
          </div><!-- Col end -->

          <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-md-0">
              <div class="ts-facts-img">
                <img loading="lazy" src="assets/home/images/icon-image/fact4.png" alt="facts-img">
              </div>
              <div class="ts-facts-content">
                <h2 class="ts-facts-num"><span class="counterUp" data-count="44">0</span></h2>
                <h3 class="ts-facts-title">İŞ GÜCÜ</h3>
              </div>
          </div><!-- Col end -->

        </div> <!-- Facts end -->
    </div>
    <!--/ Content row end -->
  </div>
  <!--/ Container end -->
</section><!-- Facts end --> --}}

{{-- <section id="ts-service-area" class="ts-service-area pb-0">
  <div class="container">
    <div class="row text-center">
        <div class="col-12">
          {{-- <h2 class="section-title">GAZİ DANIŞMANLIK </h2> --}}
          {{-- <h3 class="section-sub-title">
            <img src="{{ URL::to('\uploads\galeri1.png') }}" width="200" alt="GAZİ DANIŞMANLIK" title="GAZİ DANIŞMANLIK">
            GALERİ</h3>
        </div>
    </div> --}}
    <!--/ Title row end -->

    {{-- <div class="row" style="margin-bottom:50px;">
      <center> --}}

      {{-- @for ($i=1; $i < 25; $i++)
        <a class="grouped_elements image" data-fancybox="gallery" rel="group1" href="{{ URL::to('uploads\web\gorsel' . $i . '.jpeg') }}">
          <img src="{{ URL::to('uploads\web\gorsel' . $i . '.jpeg') }}" width="250" height="300">
        </a>
      @endfor
    </center> --}}
    {{-- </div><!-- Content row end --> --}}

  {{-- </div> --}}
  <!--/ Container end -->
{{-- </section><!-- Service end --> --}}




  <footer id="footer" class="footer bg-overlay">
    <div class="footer-main">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-lg-4 col-md-6 footer-widget footer-about">
            <h3 class="widget-title">Hakkımızda</h3>
            {{-- <img loading="lazy" class="footer-logo" src="assets/home/logo.png" alt="Constra"> --}}
            {{-- <span>HAFRİYAT</span> --}}
            <p>Gazi Danışmanlık Hizmet Müşavirlik İnşaat Sanayi ve Ticaret A.Ş. 2005 yılında Gaski A.Ş. ve Gaziantep Büyükşehir Belediyesi’nin  ortak  iştiraki olarak kurulmuştur. </p>
            <div class="footer-social">
              <ul>
                {{-- <li><a href="#" aria-label="Facebook"><i
                      class="fab fa-facebook-f"></i></a></li> --}}
                <li><a href="https://twitter.com/gazidanismanlik"  target="_blank" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                </li>
                {{-- <li><a href="#" aria-label="Instagram"><i
                      class="fab fa-instagram"></i></a></li>
                <li><a href="#" aria-label="Github"><i class="fab fa-github"></i></a></li> --}}
              </ul>
            </div><!-- Footer social end -->
          </div><!-- Col end -->

          <div class="col-lg-4 col-md-6 footer-widget mt-5 mt-md-0">
            <h3 class="widget-title">Gazi Danışmanlık</h3>
            <div class="working-hours">
              Bey mahallesi hürriyet caddesi no:6/1/1 Şahinbey Gaziantep
              {{-- Şu anda masaüstü yayıncılık paketi ve web sayfa düzenleyicisi, varsayılan mıgır metinler olarak Lorem Ipsum kullanmaktadır.
              <br><br> PZT - CM: <span class="text-right">10:00 - 16:00 </span>
              <br> CTS: <span class="text-right">12:00 - 15:00</span>
              <br> PZ: <span class="text-right">09:00 - 12:00</span> --}}
            </div>
          </div><!-- Col end -->

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0 footer-widget">
            <h3 class="widget-title">TEL <i class="fa fa-phone"></i>  /FAX <i class="fa fa-fax"></i></h3>
            <ul class="list-arrow">
              <li><a href="tel:+903423300055"><i class="fa fa-phone"></i> 0(342) 330 00 55 </a></li>
              <li><a href="#"><i class="fa fa-fax"></i> 0(342) 330 00 56 </a></li>
            </ul>
          </div><!-- Col end -->
        </div><!-- Row end -->
      </div><!-- Container end -->
    </div><!-- Footer main end -->

    <div class="copyright">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="copyright-info">
              <span><a href="#">© {{ date("Y")}} Tüm Hakları Saklıdır.</a></span>
            </div>
          </div>

          <div class="col-md-6">
            <div class="footer-menu text-center text-md-right">
              {{-- <ul class="list-unstyled mb-0">
                <li><a href="#">© 2021 Tüm Hakları Saklıdır.</a></li>

              </ul> --}}
            </div>
          </div>
        </div><!-- Row end -->

        <div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top position-fixed">
          <button class="btn btn-primary" title="Back to Top">
            <i class="fa fa-angle-double-up"></i>
          </button>
        </div>

      </div><!-- Container end -->
    </div><!-- Copyright end -->
  </footer><!-- Footer end -->
  <script src="assets/home/plugins/jQuery/jquery.min.js"></script>
  <script src="assets/home/plugins/bootstrap/bootstrap.min.js" defer></script>
  <script src="assets/home/plugins/slick/slick.min.js"></script>
  <script src="assets/home/plugins/slick/slick-animation.min.js"></script>
  <script src="assets/home/plugins/colorbox/jquery.colorbox.js"></script>
  <script src="assets/home/plugins/shuffle/shuffle.min.js" defer></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
  <script src="assets/home/plugins/google-map/map.js" defer></script>
  <script src="assets/home/js/script.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" charset="utf-8"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $("a.grouped_elements").fancybox();
    });
  </script>
  <script>
  var coll = document.getElementsByClassName("collapsible");
  var i;

  for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var content = this.nextElementSibling;
      if (content.style.display === "block") {
        content.style.display = "none";
      } else {
        content.style.display = "block";
      }
    });
  }
  </script>
  </div>
  </body>

  </html>
