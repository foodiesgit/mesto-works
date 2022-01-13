@extends('backend.layout.master')

@section('title', 'Taslak Düzenle')

@section('page-css')
<link rel="stylesheet" href="{{asset('/assets/plugins/custom/magnific-popup/magnific-popup.css')}}">
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
        <h5 class="text-dark font-weight-bold my-1 mr-5">Taslak Düzenle</h5>
        <!--end::Page Title-->
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
        	<li class="breadcrumb-item">
        	  <a href="{{route('admin.get.index')}}" class="text-muted">Anasayfa</a>
        	</li>
          <li class="breadcrumb-item">
            <a href="{{route('magazinedraft.index')}}" class="text-muted">Taslaklar</a>
          </li>
          <li class="breadcrumb-item">
            <a href="" class="text-muted">Taslak Düzenle</a>
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

<div class="row">
  <div class="col">
    <!--begin::Card-->
    <div class="card card-custom gutter-b example example-compact">
      <div class="card-header">
        <h3 class="card-title">Taslak Düzenle</h3>
      </div>
      <!--begin::Form-->
      <form method="POST" action="{{route('magazinedraft.update', ['id' => $magazinedraft->id])}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="card-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="name">Kategori Adı <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Kategori Adı" name="name" id="name" required value="{{ old('name') ? old('name') : $magazinedraft->name }}" />
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-8">
              <div class="form-group">
                <label for="description">Açıklama </label>
                <input type="text" class="form-control @error('description') is-invalid @enderror" placeholder="Açıklama" name="description" id="description" value="{{ old('description') ? old('description') : $magazinedraft->description }}" maxlength="255" />
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="images">Görseli </label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input @error('images') is-invalid @enderror" id="images" name="images" />
                  <label class="custom-file-label" for="images">Dosya Seçin</label>
                </div>
                @error('images')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary mr-2">Kaydet</button>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                @if($magazinedraft->image != null)
                <a class="image-popup-vertical-fit" href="/upload/magazine/{{$magazinedraft->image}}" title="{{$magazinedraft->image}}">
                  <img src="/upload/magazine/{{$magazinedraft->image}}">
                </a>
                @endif
              </div>
            </div>
          </div>
        </div>
      </form>
      <!--end::Form-->
    </div>
    <!--end::Card-->
  </div>
</div>

@endsection

@section('page-scripts')
<!-- Magnific popup JavaScript -->
<script src="{{asset('/assets/plugins/custom/magnific-popup/jquery.magnific-popup.js')}}"></script>
@endsection

@section('scripts')
<script>
  $('select').select2();

  $('.image-popup-vertical-fit').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    mainClass: 'mfp-img-mobile',
    image: {
      verticalFit: true
    }
    
  });
</script>
@endsection