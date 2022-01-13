@extends('backend.layout.master')

@section('title', 'Post Ekle')

@section('breadcrumb')
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
  	<!--begin::Info-->
  	<div class="d-flex align-items-center flex-wrap mr-1">
    	<!--begin::Page Heading-->
    	<div class="d-flex align-items-baseline flex-wrap mr-5">
        <!--begin::Page Title-->
        <h5 class="text-dark font-weight-bold my-1 mr-5">Post Ekle</h5>
        <!--end::Page Title-->
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
        	<li class="breadcrumb-item">
        	  <a href="{{route('admin.get.index')}}" class="text-muted">Anasayfa</a>
        	</li>
          <li class="breadcrumb-item">
            <a href="{{route('post.index')}}" class="text-muted">Postlar</a>
          </li>
          <li class="breadcrumb-item">
            <a href="" class="text-muted">Post Ekle</a>
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
        <h3 class="card-title">Post Ekle</h3>
      </div>
      <!--begin::Form-->
      <form method="POST" action="{{route('post.store')}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="category_ids">Kategori <span class="text-danger">*</span></label>
                <select class="form-control" id="category_ids" name="category_ids[]" multiple required>
                  @foreach($categories as $category)
                  <option value="{{$category->id}}" {{ old('category_ids') && in_array($category->id, old('category_ids')) ? 'selected' : '' }}>{{$category->name}}</option>

	                  @foreach($category->subs as $cat)
	                  <option value="{{$cat->id}}" {{ old('category_ids') && in_array($cat->id, old('category_ids')) ? 'selected' : '' }}>
	                  	{{$category->name}} > {{ $cat->name }}
	                  </option>
	                  @endforeach
                  @endforeach
                </select>
                @error('category_ids')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="title">Başlık <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Başlık" name="title" id="title" required value="{{ old('title') }}" maxlength="255" />
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-8">
              <div class="form-group">
                <label for="description">Açıklama </label>
                <textarea class="form-control" name="description" maxlength="255" rows="3">{{ old('description') ? old('description') : '' }}</textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="description">Slider Resmi </label>
                    <input type="file" class="form-control @error('slider_image') is-invalid @enderror" placeholder="Slider Resmi" name="slider_image" id="slider_image" required value="{{ old('slider_image') }}" maxlength="255" />
                    @error('slider_image')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="content">İçerik <span class="text-danger">*</span></label>
                <textarea class="summernote" id="content" name="content" required>
                	{!! old('content') ? old('content') : '' !!}
                </textarea>
                @error('content')
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
                  <option value="1" {{ old('show_index') == 1 ? 'selected' : '' }}>Evet</option>
                  <option value="0" {{ old('show_index') && old('show_index') == 0 ? 'selected' : '' }}>Hayır</option>
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
                  <option value="1" {{ old('show_header') == 1 ? 'selected' : '' }}>Evet</option>
                  <option value="0" {{ old('show_header') && old('show_header') == 0 ? 'selected' : '' }}>Hayır</option>
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
                  <option value="1" {{ old('show_footer') == 1 ? 'selected' : '' }}>Evet</option>
                  <option value="0" {{ old('show_footer') && old('show_footer') == 0 ? 'selected' : '' }}>Hayır</option>
                </select>
                @error('show_footer')
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

@section('page-scripts')
<script src="{{asset('/assets/js/pages/crud/forms/editors/summernote.js?v=7.2.8')}}"></script>
@endsection

@section('scripts')
<script>
	$('select').select2();

    $('#slider_image').dropzone({
        url: "{{ route('post.upload-image') }}",
        paramName: ["slider_image"],
        params: {
            // post_id: $('#id').val()
        },
        maxFiles: 1,
        maxFilesize: 10, // MB
        addRemoveLinks: true,
        /*accept: function(file, done) {
            if (file.name == "justinbieber.jpg") {
                done("Naha, you don't.");
            } else {
                done();
            }
        }*/
    });

var KTSummernoteDemo = function () {
	// Private functions
	var demos = function () {
		$('.summernote').summernote({
			height: 150
		});
	}

	return {
		// public functions
		init: function() {
			demos();
		}
	};
}();

// Initialization
jQuery(document).ready(function() {
	KTSummernoteDemo.init();
});
</script>
@endsection
