@extends('welcome')
@section('content')
<section id="services-08" class="services-08 pt-120 pb-120 p-relative" style="background: url(img/bg/aliment-left.png) no-repeat; background-position: left center;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title center-align mb-50 text-center">
                     <h3>{{$myResult->name}} {{$myResult->lastname}} Sonucu</h3>
                </div>
            </div>
        </div>
        <div class="row services-08-item--wrapper mt-0">
            <div class="col-lg-12 col-md-12" style="border: none;">
                <ul class="list-group mt-20">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Soru Sayısı  <span class="badge badge-primary" style="min-width: 100px;font-size:14px;">{{$myResult->results[0]->correct_count + $myResult->results[0]->wrong_count}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Doğru Sayısı  <span class="badge badge-success" style="min-width: 100px;font-size:14px;">{{$myResult->results[0]->correct_count}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Yanlış Sayısı  <span class="badge badge-danger" style="min-width: 100px;font-size:14px;">{{$myResult->results[0]->wrong_count}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Puanınız  <span class="badge badge-secondary" style="min-width: 100px;font-size:14px;">{{$myResult->results[0]->score}}</span>
                    </li>
                </ul>
            </div>
        </div>
        <a href="{{route('joiner-logout')}}" style="display:block;width: 100%;margin:10px 0;text-align:right;">
            <h4 class="btn ss-btn" style="max-height:40px;max-width:100px;display:flex;align-items:center;">Çıkış</h4>
        </a>
    </div>
</section>
@stop
