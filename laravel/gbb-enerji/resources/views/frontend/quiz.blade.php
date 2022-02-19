@extends('welcome')
@section('content')
<section id="services-08" class="services-08 pt-120 pb-120 p-relative" style="background: url(img/bg/aliment-left.png) no-repeat; background-position: left center;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title center-align mb-50 text-center">
                     <h3>Çevre Koruma Testine Hoşgeldiniz</h3>
                </div>
            </div>
        </div>
        <div class="row services-08-item--wrapper mt-0">
            <div class="col-lg-12 col-md-12" style="border: none;">
                @if($quizes)
                    @foreach($quizes as $item)
                        <ul class="list-group mt-20">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{$item->title}}
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{$item->description}}
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Bitiş Tarihi <span class="badge badge-warning" style="min-width: 100px;font-size:14px;">{{$item->finished_at->diffForHumans()}}</span>
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <a href="{{route('questions', $item->id)}}">
                                    <button type="button" class="btn btn-info btn-sm rounded-pill btn-block" style="display:flex;align-items:center;max-height:34px;">
                                        <span >Teste Katıl</span>
                                    </button>
                                </a>
                            </li>
                        </ul>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>
@stop
