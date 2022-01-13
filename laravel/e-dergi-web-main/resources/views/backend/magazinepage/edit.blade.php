@extends('backend.layout.master')

@section('title', 'Sayfa Düzenle')

@section('breadcrumb')
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
  	<!--begin::Info-->
  	<div class="d-flex align-items-center flex-wrap mr-1">
    	<!--begin::Page Heading-->
    	<div class="d-flex align-items-baseline flex-wrap mr-5">
        <!--begin::Page Title-->
        <h5 class="text-dark font-weight-bold my-1 mr-5">Sayfa Düzenle</h5>
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
            <a href="" class="text-muted">Sayfa Düzenle</a>
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
        <h3 class="card-title">Sayfa Düzenle</h3>
      </div>
      <!--begin::Form-->
      <form method="POST" action="{{route('magazine.update', ['id' => $magazine->id])}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <div class="row">
                  <div class="col-lg-3">
                    <label for="post_id">Taslak </label>
                    <label class="option">
                      <span class="option-label">
                        <span class="option-body">
                          <img src="/upload/magazine/{{$magazinepage->layer_image}}" src="{{$magazinepage->name}}" style="max-height: 100px;">
                        </span>
                      </span>
                    </label>
                  </div>
                  <div class="col-lg-3">
                    <label for="post_id">Post </label>
                    <label class="option">
                      <span class="option-label">
                        <span class="option-head">
                          <span class="option-title">
                            {{@$magazinepage->post->createdBy->name}} - {{$magazinepage->title}}
                          </span>
                        </span>
                      </span>
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="order">Sırası <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('order') is-invalid @enderror" placeholder="Sırası" name="order" id="order" required value="{{ old('order') ? old('order') : $magazinepage->order }}" />
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

@endsection

@section('scripts')
<script>
  $('select').select2();
</script>
@endsection