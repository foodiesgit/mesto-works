@extends('welcome')
@section('content')
<section  class="contact-area after-none contact-bg pt-120 pb-120" >
    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                <div class="contact-bg02 wow fadeInLeft  animated">
                    <div class="section-title center-align">
                        <h5>
                            <span>Giriş Sayfası</span>
                            <a href="{{route('joiner.signup.form')}}">Üye Ol</a>
                        </h5>
                    </div>
                    <p>Bu teste katılmak içi sisteme kayıt olmanız gerekmektedir!</p>
                    @if($errors->any)
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger m-1" role="alert">{{$error}}</div>
                        @endforeach
                    @endif
                    <form action="{{route('joiner.signin')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="contact-field p-relative c-email mb-20">
                                    <input type="number" id="identity" name="identity" placeholder="TC" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="slider-btn">
                                    <button class="btn ss-btn"  data-animation="fadeInRight" data-delay=".8s">Giriş Yap</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
