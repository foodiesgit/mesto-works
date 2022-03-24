@extends('welcome')
@section('content')
<div class="main-wrapper">
    <main class="main-container">
        <div class="container-project" style="display:flex;justify-content:center;">
            <ul class="col col-md-8 col-lg-8 projects-ul">
                @if($productDetails)
                <h2 style="margin:20px 0; color:#6d53d6;">{{$productDetails->title}}</h2>
                <img src="{{asset($productDetails->imagedetail)}}" alt="">
                <p class="">{{$productDetails->content}}</p>
                <button class="brk-pricing-strict__btn btn btn-md-2 btn-icon border-radius-25 font__family-open-sans font__weight-bold btn-inside-out rendered">
                    <span class="before">Geri</span>
                    <span class="text"><a href="{{route('urunler')}}">Geri</a></span>
                    <span class="after">Geri</span>
                </button>
                @endif
            </ul>
        </div>
    </main>
</div>
@stop
<style>
    .projects-ul{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-top: 50px;
        background-color: #fff;
        padding: 0;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
    }
    .projects-ul h4{
        text-align: center;
        margin:10px 0;
        padding: 10px 0;
    }
    .projects-ul p{
        width: 800px;
        text-align: center;
        margin: 20px 0;
    }
</style>
