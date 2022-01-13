@extends('backend.layout.master')

@section('title', 'Dergi Düzenle')

@section('breadcrumb')
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
  	<!--begin::Info-->
  	<div class="d-flex align-items-center flex-wrap mr-1">
    	<!--begin::Page Heading-->
    	<div class="d-flex align-items-baseline flex-wrap mr-5">
        <!--begin::Page Title-->
        <h5 class="text-dark font-weight-bold my-1 mr-5">Dergi Düzenle</h5>
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
            <a href="" class="text-muted">Dergi Düzenle</a>
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
        <h3 class="card-title">Dergi Düzenle</h3>
      </div>
      <!--begin::Form-->
      <form method="POST" action="{{route('magazine.update', ['id' => $magazine->id])}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="status_id">Durumu <span class="text-danger">*</span></label>
                <select class="form-control" id="status_id" name="status_id" data-post_status_id="{{ $magazine->status_id }}">
                  @foreach($situations as $situation)
                  <option value="{{$situation->id}}" {{ $magazine->status_id == $situation->id ? 'selected' : '' }}>{{$situation->name}}</option>
                  @endforeach
                </select>
                @error('status_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-6" id="div-status_description" style="display: none;">
              <div class="form-group">
                <label for="status_description">Durum Açıklaması <span class="text-danger">(Durum değiştirildiğinde zorunludur.)</span></label>
                <input type="text" class="form-control @error('status_description') is-invalid @enderror" placeholder="Durum Açıklaması" name="status_description" id="status_description" value="{{ old('status_description') }}" maxlength="255" />
                @error('status_description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="name">Kategori Adı <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Kategori Adı" name="name" id="name" required value="{{ old('name') ? old('name') : $magazine->name }}" />
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-8">
              <div class="form-group">
                <label for="description">Açıklama </label>
                <input type="text" class="form-control @error('description') is-invalid @enderror" placeholder="Açıklama" name="description" id="description" value="{{ old('description') ? old('description') : $magazine->description }}" maxlength="255" />
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
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
            </div>
          </div>
          <div class="form-group">
            @if($magazine->image != null)
            <img src="/upload/magazine/{{$magazine->image}}" class="h-150px align-self-end">
            @endif
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

  $('#status_id').change(function(){
    var post_status_id = $(this).data("post_status_id");
    if (post_status_id == $(this).val()) {
      $('#div-status_description').hide();
    } else {
      $('#div-status_description').show();
    }
  });
</script>
@endsection
