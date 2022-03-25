@extends('layout')
@section('content')
<!-- banner -->
  <div id="rs-banner" class="rs-banner style10">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 pl-60 order-last">
                <div class="img-part">
                    @isset($banner[0])
                        <img class="up-down-new" src="{{ asset('/uploads/banner/'.$banner[0]->img) }}" alt="">
                    @endisset
                    </div>
            </div>
            <div class="col-lg-6 pr-0">
                <div class="banner-content">
                    @isset($banner[0])
                    <h3 class="sl-title wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="3000ms"   >{{$banner[0]->text}}
                    </h3>
                    <div class="banner-btn wow fadeInUp" data-wow-delay="1500ms" data-wow-duration="2000ms">
                        <a class="readon green-banner" href="{{$banner[0]->link}}" target="_blank">{{$banner[0]->title}}</a>
                    @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="banner-intro-box">
        <div class="shape-img">
            <img class="up-down-new" src="{{ asset('/images/banner/home12/dotted-shape.png') }}" alt="">
        </div>
        <div class="intro-img">
            <img class="spine2" src="{{ asset('/images/banner/home12/banner.jpg') }}" alt="">
        </div>
    </div>
  </div>
  <!-- categories -->
    <div class="rs-partner style2 pt-100 md-pt-70">
        <div class="container">
            <div class="slider-container">
                <span id="slider-arrow-prev" class="slider-arrow"><</span>
                <div class="slider">
                    <ul id="slider-list" class="slider-list">
                        @isset($categories)
                            @foreach($categories as $item)
                                <li class="carousel-item">
                                    <a href="#projects-block" class="partner-item categories-item" onclick="getProjects('{{ $item->category }}')">
                                        <img src="{{ asset('/uploads/categories/'.$item->category.'/'.$item->img) }}" alt style="border-radius:50px;">
                                        <div style="text-align:center;">{{$item->category}}</div>
                                    </a>
                                </li>
                            @endforeach
                        @endisset
                    </ul>
                </div>
                <span id="slider-arrow-next" class="slider-arrow">></span>
            </div>
        </div>
    </div>
<!-- projects -->
  <div class="rs-popular-courses style2 bg3 pt-94 md-pt-64 md-pb-90 mt-5 project-container">
    <div class="container project-container" >
        <div class="sec-title mb-60 text-center md-mb-30">
            <h2 class="title mb-0">Projelerimiz</h2>
        </div>
        <div id="projects-block" class="row">

        </div>
    </div>
  </div>

<!-- activities -->
  <div class="rs-popular-courses style2 bg3 pt-94  md-pt-64 md-pb-90 mt-5 activities-container">
    <div class="container activities-container">
        <div class="sec-title mb-60 text-center md-mb-30">
            <h2 class="title mb-0">Etkinliklerimiz</h2>
        </div>
        <div id="activities-block" class="row">
            @isset($activities)
                @foreach($activities as $item)
                    <div class="col-lg-3 col-md-6 mb-30">
                        <div class="course-wrap custom-course-wrap">
                            <div class="front-part">
                                <div class="img-part">
                                    <img src="{{ asset('/uploads/activities/'.$item->title.'/'.$item->img) }}" alt="" class="home-images">
                                </div>
                            </div>
                            <div class="inner-part">
                                <h4 class="title" style="color: #ffffff;">{{$item->title}}</h4>
                            </div>
                            <div class="price-btn">
                                <a href="/activitiesdetails/+{{$item->id}}" target="_blank"><i class="flaticon-next"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endisset
        </div>
    </div>
  </div>
  <script>
    const getProjectsAll = async() => {
        const result = await fetch('/getprojects')
        const final  = await result.json()
        setProjects(final.projects)
    }
    getProjectsAll()

    const sliderList = document.getElementById('slider-list')
    const prevArrow = document.getElementById('slider-arrow-prev')
    const nextArrow = document.getElementById('slider-arrow-next')

    prevArrow.addEventListener('click', () => {
        sliderList.scrollLeft -= 500
    })
    nextArrow.addEventListener('click', () => {
        sliderList.scrollLeft += 500
    })
    const setProjects = (param) => {
        if(param.length > 0){
            for (const item of param) {
                document.getElementById('projects-block').innerHTML += `
                <div class="col-lg-3 col-md-6 mb-30" data-toggle="collapse">
                    <div class="course-wrap">
                        <div class="front-part">
                            <div class="img-part">
                                <img src="/uploads/projects/${item.title}/${item.img}" alt="" class="home-images">
                            </div>
                        </div>
                        <div class="inner-part">
                            <h4 class="title" style="color: #ffffff;">${item.title}</h4>
                        </div>
                        <div class="price-btn">
                            <a href="/projectsdetails/${item.id}" target="_blank"><i class="flaticon-next"></i></a>
                        </div>
                    </div>
                </div>
                `
            }
        } else {
            document.getElementById('projects-block').innerHTML = 'Bu Kategoriye uygun proje bulunmamaktadır'
        }
    }
    const getProjects = async (param) => {
        const result = await fetch('/projectscategory/'+param)
        const final  = await result.json()
        document.getElementById('projects-block').innerHTML = ''
        setProjects(final.projectscategory)
    }
  </script>
@stop