@extends('welcome')
@section('content')
<section class="pt-80 pb-25">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <form action="{{route('iletisim.email')}}" method="post" class="  brk-form-strict pt-15 wow fadeInLeft">
                @csrf
                <div class="row">
                        <div class="col-12 col-md-6">
                            <input type="text" name="subject" placeholder="Konu" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <input type="text" name="email" placeholder="Posta Adresi"&#x1F534; pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" oninvalid="this.setCustomValidity('Posta Adresi Formata Uygun Degil')" oninput="setCustomValidity('')" required>
                        </div>
                        <div class="col-12">
                            <textarea name="text" class="bordered-bottom" placeholder="Sorulariniz" style="min-height: 110px;" required></textarea>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="Submit" class="btn btn-inside-out btn-lg btn-icon border-radius-30 mt-25 btn-shadow">
                            <span class="before">Gönder</span><span class="text">Gönder</span><span class="after">Gönder</span>
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-5">
                <div class="wow fadeInRight">
                    <h2 class="font__family-montserrat font__size-56 line__height-60 font__weight-thin mb-30">
                        Proje Görüş ve Öneriniz için , <br>
                        <span class="font__weight-bold">Bizimle İletişime Geçebilirsin</span>
                    </h2>
                    <p class="brk-dark-font-color font__size-14 line__height-26 mb-35">
                        <h3>Adresimiz</h3><hr>
                        <h4>Şube 1</h4>
                        <p>{{$contact->branch1}}</p>
                        <hr>
                        <h4>Şube 2</h4>
                        <p>{{$contact->branch2}}</p>

                        <hr>

                    </p>
                    <p class="font__family-open-sans font__weight-bold font__size-14 mb-15">
                        <i class="brk-footer-icon text-middle fa fa-envelope line__height-24 brk-base-font-color"></i>
                        <a href="mailto:{{$contact->email}}" class="show-inline-block">{{$contact->email}}</a>
                    </p>

                    <p class="font__family-open-sans font__weight-bold font__size-14 mb-15">
                        <i class="brk-footer-icon text-middle fa fa-phone line__height-24 brk-base-font-color"></i>
                        <a href="tel:+{{$contact->phone}}" class="show-inline-block">+{{$contact->phone}}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="pt-90 text-center position-relative" data-brk-library="component__social_block,component__button">
    <span class="brk-abs-overlay brk-light-gradient-90deg-94"></span>
    <div class="container all-light">
        <div class="text-center">
            <h3 class="brk-white-font-color font__family-montserrat font__size-56 font__weight-bold lh-60">Sosyal Linklerimiz</h3>
        </div>
        <div class="row no-gutters mt-70">
            <div class="col-6 col-md-4 col-lg-2">
                <div class="social__icon-square">
                    <a href="https://www.facebook.com/gantepbilisim/"><i class="brk-icon slide-bg-wrap fab fa-facebook-f"><span class="slide-bg"></span></i></a>
                    <h4 class="font__family-montserrat font__size-16 text">Facebook</h4>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <div class="social__icon-square">
                    <a href="https://twitter.com/GantepBilisim"><i class="brk-icon slide-bg-wrap fab fa-twitter"><span class="slide-bg"></span></i></a>
                    <h4 class="font__family-montserrat font__size-16 text">Twitter</h4>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <div class="social__icon-square">
                    <a href="https://www.instagram.com/gantepbilisim/"><i class="brk-icon slide-bg-wrap fab fa-instagram"><span class="slide-bg"></span></i></a>
                    <h4 class="font__family-montserrat font__size-16 text">Instagram</h4>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <div class="social__icon-square">
                    <a href="https://www.linkedin.com/company/gantepbilisim/mycompany/"><i class="brk-icon slide-bg-wrap fab fa-linkedin"><span class="slide-bg"></span></i></a>
                    <h4 class="font__family-montserrat font__size-16 text">Linkedin</h4>
                </div>
            </div>

        </div>
    </div>
</div>
@stop
