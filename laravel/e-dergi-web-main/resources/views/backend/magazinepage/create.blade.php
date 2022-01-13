@extends('backend.layout.master')

@section('title', 'Sayfa Ekle')

@section('page-css')
<link rel="stylesheet" href="{{asset('/assets/css/custom.css')}}">
@endsection

@section('breadcrumb')
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
  	<!--begin::Info-->
  	<div class="d-flex align-items-center flex-wrap mr-1">
    	<!--begin::Page Heading-->
    	<div class="d-flex align-items-baseline flex-wrap mr-5">
        <!--begin::Page Title-->
        <h5 class="text-dark font-weight-bold my-1 mr-5">Sayfa Ekle</h5>
        <!--end::Page Title-->
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
        	<li class="breadcrumb-item">
        	  <a href="{{route('admin.get.index')}}" class="text-muted">Anasayfa</a>
        	</li>
          <li class="breadcrumb-item">
            <a href="{{route('magazine.index')}}" class="text-muted">Dergiler</a>
          </li>
          <li class="breadcrumb-item">
            <a href="{{route('magazine-page.index', ['magazine_id' => $magazine->id])}}" class="text-muted"> {{$magazine->name}} | Detay</a>
          </li>
          <li class="breadcrumb-item">
            <a href="" class="text-muted">Sayfa Ekle</a>
          </li>
        </ul>
        <!--end::Breadcrumb-->
    	</div>
    	<!--end::Page Heading-->
  	</div>
  	<!--end::Info-->
	</div>
</div>

<!--end::Subheader-->
@endsection

@section('content')
    @if(1==0)
    <div class="row">
        <div class="col">
            <!--begin::Card-->
            <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">Sayfa Ekle</h3>
            </div>
            <!--begin::Form-->
            <form method="POST" action="{{route('magazine-page.store', ['magazine_id' => $magazine->id])}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                    <div class="form-group">
                        <label for="post_id">Taslak <span class="text-danger">*</span></label>
                        <div class="row">
                            @foreach($drafts as $draft)
                            <div class="col-lg-3">
                                <label class="option">
                                    <span class="option-control">
                                        <span class="radio">
                                            <input type="radio" name="magazine_draft_id" value="{{$draft->id}}" required />
                                            <span></span>
                                        </span>
                                    </span>
                                    <span class="option-label">
                                        <span class="option-head">
                                            <span class="option-title">
                                                {{-- {{$draft->name}} --}}
                                            </span>
                                        </span>
                                        <span class="option-body">
                                            <img src="/upload/magazine/{{$draft->image}}" src="{{$draft->name}}" style="max-height: 100px;">
                                        </span>
                                    </span>
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="post_id">Post <span class="text-danger">*</span></label>
                        <select class="form-control" id="post_id" name="post_id" required>
                        @foreach($posts as $post)
                        <option value="{{$post->id}}" {{ old('post_id') ? 'selected' : '' }}>
                            {{$post->createdBy->name}} - {{$post->title}}
                        </option>
                        @endforeach
                        </select>
                        @error('post_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="order">Sırası<span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('order') is-invalid @enderror" placeholder="Sırası" name="order" id="order" required value="{{ old('order') }}" value="0" min="0" />
                        @error('order')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    </div>
                </div>

                </div>
                <div class="card-footer">
                <button type="submit" class="btn btn-primary mr-2">Kaydet</button>
                </div>
            </form>
            <!--end::Form-->
            </div>
            <!--end::Card-->
        </div>
    </div>
    @endif
   <div class="editor">
        <!-- navbar -->
        <nav id ="navbar" class="navbar">
            <!-- font -->
            <section class="nav-container">
            <div class="nav-header">Yazı Tipi</div>
            <div class="nav-content">
                <input type="number" name="font-size" id="font-size" class="font-input input" onchange="checkTopElement()">
                <input type="color" name="font-color" id="font-color" class="color-input  input" >
                <label id="font-italic" class="font-position input"><img src="{{ asset ('/assets/icons/font-italic.png')}}" alt="" ></label>
                <label id="font-nor" class="font-position input"><img src="{{ asset ('/assets/icons/font-normal.png')}}" alt="" ></label>
                <label id="font-bold" class="font-position input"><img src="{{ asset ('/assets/icons/font-bold.png')}}" alt="" ></label>
            </div>
            </section>
            <!-- text horizontal poition -->
            <section class="nav-container">
            <div class="nav-header">Yatay</div>
            <div class="nav-content">
                <label id="font-left" class="font-position input"><img src="{{ asset ('/assets/icons/font-left.png')}}" alt=""></label>
                <label id="font-center" class="font-position input"><img src="{{ asset ('/assets/icons/font-center.png')}}" alt="" ></label>
                <label id="font-right" class="font-position input"><img src="{{ asset ('/assets/icons/font-right.png')}}" alt="" ></label>
            </div>
            </section>
            <!-- text vertical poition -->
            <section class="nav-container">
            <div class="nav-header">Dikey</div>
            <div class="nav-content">
                <label id="font-vertical-start" class="font-position input"><img src="{{ asset ('/assets/icons/font-vertical-start.png')}}" alt="" ></label>
                <label id="font-vertical-center" class="font-position input"><img src="{{ asset ('/assets/icons/font-vertical.png')}}" alt="" ></label>
                <label id="font-vertical-end" class="font-position input"><img src="{{ asset ('/assets/icons/font-vertical-end.png')}}" alt="" ></label>
            </div>
            </section>
            <section class="nav-container">
            <div class="nav-header">Text</div>
            <div class="nav-content">
                <textarea name="" id="text" cols="3" rows="1" draggable="true" ondragstart="drag(event)" disabled></textarea>
            </div>
            </section>
            <!-- background -->
            <section class="nav-container input">
            <div class="nav-header">Arkaplan</div>
            <div class="nav-content">
                <input type="color" name="bgc-color" id="bgc-color" class="color-input input">
            </div>
            </section>
            <!-- border -->
            <section class="nav-container input">
            <div class="nav-header">Kenarlık</div>
            <div class="nav-content">
                <select name="border-style" id="border-style" class="input-select">
                <option selected>Border</option>
                <option value="solid">Solid</option>
                <option value="dotted">Dotted</option>
                <option value="dashed">Dashed</option>
                <option value="double">Double</option>
                <option value="groove">Groove</option>
                <option value="ridge">Ridge</option>
                <option value="inset">Inset</option>
                <option value="outset">Outset</option>
                </select>
                <input type="number" name="border" id="border-width" class="border input">
                <input type="color" name="border-color" id="border-color" class="color-input input">
                <input type="number" name="border-radius" id="border-radius" class="border-radius input">
            </div>
            </section>
            <!-- padding -->
            <section class="nav-container">
            <div class="nav-header">Boşluk</div>
            <div class="nav-content">
                <input type="number" name="padding" id="padding-left" class="padding-input input" >
                <input type="number" name="padding" id="padding-top" class="padding-input input">
                <input type="number" name="padding" id="padding-right" class="padding-input input">
                <input type="number" name="padding" id="padding-bottom" class="padding-input input">
            </div>
            </section>
            <!-- images -->
            <section class="nav-container ">
            <div class="nav-header">Arkaplan Resmi</div>
            <div class="nav-content">
                <label for="load-file" id="bgi-img" style="cursor: pointer; margin-top: 4px;">
                <img src="{{ asset ('/assets/icons/bgi-icon.png')}}"  alt="">
                </label>
                <input type="file" accept="image/*" name="img-file" id="load-file" style="display: none;">
                <select name="background-size" id="background-size" class="input-select">
                    <option selected>Size</option>
                    <option value="auto">Auto</option>
                    <option value="cover">Cover</option>
                    <option value="contain">Contain</option>
                </select>
                <select name="background-position" id="background-position" class="input-select">
                    <option selected>Position</option>
                    <option value="center">Center</option>
                    <option value="left">Left</option>
                    <option value="right">Right</option>
                    <option value="top">Top</option>
                    <option value="top left">Top Left</option>
                    <option value="top right">Top Right</option>
                    <option value="bottom">Bottom</option>
                    <option value="bottom left">Bottom Left</option>
                    <option value="bottom right">Bottom Right</option>
                </select>
                <select name="background-repeat" id="background-repeat" class="input-select">
                    <option value="repeat">Repeat</option>
                    <option value="repeat-x">Repeat-x</option>
                    <option value="repeat-y">Repeat-y</option>
                    <option value="no-repeat">No-repeat</option>
                </select>
            </div>
            </section>
            <section  class="nav-container">
                <div class="nav-header">Dergi Adı</div>
                <div class="nav-content">
                    <label id="magazine-name">{{session('magazine')->name}}</label>
                    <input type="hidden" name="" id="magazine-id" value="{{session('magazine')->id}}">
                </div>
            </section>
            <section  class="nav-container">
                <div class="nav-header">Son Sayfa</div>
                <div class="nav-content">
                    <label id="page-count" class="page-number" style="color:#fff;font-size:15px;"></label>
                </div>
            </section>
            <section  class="nav-container">
                <div class="nav-header">Sayfa</div>
                <div class="nav-content">
                    <input type="number" min="0" id="add-page-count" class="page-number"/>
                </div>
            </section>
            <!-- ebook -->
            <section class="nav-container">
            <div class="nav-header">Araçlar</div>
            <div class="nav-content nav-content-last">
                <img src="{{ asset ('/assets/icons/delete.png')}}" alt="" id="trash" class="trash input">
                <img src="{{ asset ('/assets/icons/download.png')}}" alt="" id="screenshot-button" class="trash input">
            </div>

            </section>
        </nav>
        <!-- container -->
        <div id="container" class="editor-container">
            <!-- left -->
            <section  class="left">
                <div id="left" class="blog-container">

                </div>
            </section>
            <!-- right -->
            <section id="right" class="right" >
                <div id="tual" class="tual" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
            </section>
        </div>
   </div>
    @if(1==0)
    <pspdfkit></pspdfkit>
    @endif

@endsection

@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/html2canvas@1.0.0-rc.5/dist/html2canvas.min.js"></script>

<script src="{{asset('/assets/js/custom.js')}}"></script>

@endsection


