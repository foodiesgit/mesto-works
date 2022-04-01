@extends('welcome')
@section('content')
<div class="position-relative z-index-3 mt-100">
    <div class="container">
        <div class="row">
            @if($products)
                @foreach($products as $item)
                    <div class="col-xl-4 col-lg-6">
                        <div class="brk-pricing-strict text-center brk-library-rendered" data-brk-library="component__pricing_table,component__button">
                            <div class="brk-pricing-strict__content">
                                <div class="brk-pricing-strict__title font__family-open-sans font__weight-bold">
                                    <span class="before brk-bg-grad"></span>
                                    <span>{{$item->title}}</span>
                                </div>
                                <img src="{{asset($item->image)}}" alt="">
                                <button class="brk-pricing-strict__btn btn btn-md-2 btn-icon border-radius-25 font__family-open-sans font__weight-bold btn-inside-out rendered">
                                    <span class="before">İncele</span>
                                    <span class="text"><a href="{{route('urunler.detay', $item->id)}}">İncele</a></span>
                                    <span class="after">İncele</span>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>

@stop
