@extends('backend.layout.master')

@section('title', 'Kategori Düzenle')

@section('breadcrumb')
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
  	<!--begin::Info-->
  	<div class="d-flex align-items-center flex-wrap mr-1">
    	<!--begin::Page Heading-->
    	<div class="d-flex align-items-baseline flex-wrap mr-5">
        <!--begin::Page Title-->
        <h5 class="text-dark font-weight-bold my-1 mr-5">Kategori Düzenle</h5>
        <!--end::Page Title-->
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
        	<li class="breadcrumb-item">
        	  <a href="{{route('admin.get.index')}}" class="text-muted">Anasayfa</a>
        	</li>
          <li class="breadcrumb-item">
            <a href="{{route('category.index')}}" class="text-muted">Kategoriler</a>
          </li>
          <li class="breadcrumb-item">
            <a href="" class="text-muted">Kategori Düzenle</a>
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
        <h3 class="card-title">Kategori Düzenle</h3>
      </div>
      <!--begin::Form-->
      <form method="POST" action="{{route('category.update', ['id' => $category->id])}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="card-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="top_id">Üst Kategorisi</label>
                <select class="form-control" id="top_id" name="top_id">
                  <option value="" {{ old('top_id') || $category->top_id == null ? 'selected' : '' }}>Üst Kategorisi Yok</option>
                  @foreach($categories as $cat)
                  <option value="{{$cat->id}}" {{ $category->top_id == $cat->id ? 'selected' : '' }}>{{$cat->name}}</option>
                  @endforeach
                </select>
                @error('top_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="name">Kategori Adı <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Kategori Adı" name="name" id="name" required value="{{ old('name') ? old('name') : $category->name }}" />
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="order">Sırası </label>
                <input type="number" class="form-control @error('order') is-invalid @enderror" placeholder="Kategori Adı" name="order" id="order" required value="{{ old('order') ? old('order') : $category->order }}" maxlength="255" />
                @error('order')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="is_active">Aktif mi? <span class="text-danger">*</span></label>
                <select class="form-control" id="is_active" name="is_active">
                  <option value="1" {{ old('is_active') || $category->is_active == 1 ? 'selected' : '' }}>Aktif</option>
                  <option value="0" {{ (old('is_active') && old('is_active') == 0) || $category->is_active == 0 ? 'selected' : '' }}>Aktif Değil</option>
                </select>
                @error('is_active')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="class_name">Class Adı </label>
                <input type="text" class="form-control @error('class_name') is-invalid @enderror" placeholder="Class Adı" name="class_name" id="class_name" value="{{ old('class_name') ? old('class_name') : $category->class_name }}" maxlength="255" />
                @error('class_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
              	<label for="hex_color_code">Renk (HEX)</label>
              	<input class="form-control" type="color" value="{{ old('hex_color_code') ? old('hex_color_code'): $category->hex_color_code }}" id="hex_color_code" name="hex_color_code" />
                @error('hex_color_code')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-4">
              <div class="form-group">
                <label for="show_index">Göster - Anasayfa <span class="text-danger">*</span></label>
                <select class="form-control" id="show_index" name="show_index" required>
                  <option value="1" {{ old('show_index') == 1 || $category->show_index == 1 ? 'selected' : '' }}>Evet</option>
                  <option value="0" {{ (old('show_index') && old('show_index') == 0) || $category->show_index == 0 ? 'selected' : '' }}>Hayır</option>
                </select>
                @error('show_index')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <label for="show_header">Göster - Header <span class="text-danger">*</span></label>
                <select class="form-control" id="show_header" name="show_header" required>
                  <option value="1" {{ old('show_header') == 1 || $category->show_header == 1 ? 'selected' : '' }}>Evet</option>
                  <option value="0" {{ (old('show_header') && old('show_header') == 0) || $category->show_header == 0 ? 'selected' : '' }}>Hayır</option>
                </select>
                @error('show_header')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <label for="show_footer">Göster - Footer <span class="text-danger">*</span></label>
                <select class="form-control" id="show_footer" name="show_footer" required>
                  <option value="1" {{ old('show_footer') == 1 || $category->show_footer == 1 ? 'selected' : '' }}>Evet</option>
                  <option value="0" {{ (old('show_footer') && old('show_footer') == 0) || $category->show_footer == 0 ? 'selected' : '' }}>Hayır</option>
                </select>
                @error('show_footer')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-4">
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
            @if($category->image != null)
            <img src="/upload/category/{{$category->image}}" class="h-150px align-self-end">
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
</script>
@endsection