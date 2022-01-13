@extends('backend.layout.master')

@section('title', 'Ayarlar')

@section('breadcrumb')
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
  	<!--begin::Info-->
  	<div class="d-flex align-items-center flex-wrap mr-1">
    	<!--begin::Page Heading-->
    	<div class="d-flex align-items-baseline flex-wrap mr-5">
        <!--begin::Page Title-->
        <h5 class="text-dark font-weight-bold my-1 mr-5">Ayarlar</h5>
        <!--end::Page Title-->
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
        	<li class="breadcrumb-item">
        	  <a href="{{route('admin.get.index')}}" class="text-muted">Anasayfa</a>
        	</li>
          <li class="breadcrumb-item">
            <a href="" class="text-muted">Ayarlar</a>
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
        <h3 class="card-title">Ayarlar</h3>
      </div>
      <!--begin::Form-->
      <form method="POST" action="{{route('setting.update')}}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="page_about">Hakkımızda <span class="text-danger">*</span></label>
                <textarea name="page_about" id="page_about" class="editor">{!! old('page_about') ? old('page_about') : @$settings->where('key', 'page_about')->first()->value !!}</textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label for="page_confidentiality_agreement">Gizlilik Sözleşmesi <span class="text-danger">*</span></label>
                <textarea name="page_confidentiality_agreement" id="page_confidentiality_agreement" class="editor">{!! old('page_confidentiality_agreement') ? old('page_confidentiality_agreement') : @$settings->where('key', 'page_confidentiality_agreement')->first()->value !!}</textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label for="page_terms_of_use">Kullanım Koşulları <span class="text-danger">*</span></label>
                <textarea name="page_terms_of_use" id="page_terms_of_use" class="editor">{!! old('page_terms_of_use') ? old('page_terms_of_use') : @$settings->where('key', 'page_terms_of_use')->first()->value !!}</textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-6 col-xs-12">
              <div class="form-group">
                <label for="facebook_url">Facebook URL </label>
                <input name="facebook_url" id="facebook_url" class="form-control" placeholder="Facebook URL" value="{{ old('facebook_url') ? old('facebook_url') : @$settings->where('key', 'facebook_url')->first()->value }}"/>
                @error('facebook_url')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-6 col-xs-12">
              <div class="form-group">
                <label for="twitter_url">Twitter URL </label>
                <input name="twitter_url" id="twitter_url" class="form-control" placeholder="Twitter URL" value="{{ old('twitter_url') ? old('twitter_url') : @$settings->where('key', 'twitter_url')->first()->value }}"/>
                @error('twitter_url')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-6 col-xs-12">
              <div class="form-group">
                <label for="instagram_url">Instagram URL </label>
                <input name="instagram_url" id="instagram_url" class="form-control" placeholder="Instagram URL" value="{{ old('instagram_url') ? old('instagram_url') : @$settings->where('key', 'instagram_url')->first()->value }}"/>
                @error('instagram_url')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-6 col-xs-12">
              <div class="form-group">
                <label for="linkedin_url">Linkedin URL </label>
                <input name="linkedin_url" id="linkedin_url" class="form-control" placeholder="Linkedin URL" value="{{ old('linkedin_url') ? old('linkedin_url') : @$settings->where('key', 'linkedin_url')->first()->value }}"/>
                @error('linkedin_url')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-6 col-xs-12">
              <div class="form-group">
                <label for="contact_address">İletişim Adresi </label>
                <input name="contact_address" id="contact_address" class="form-control" placeholder="İletişim Adresi" value="{{ old('contact_address') ? old('contact_address') : @$settings->where('key', 'contact_address')->first()->value }}"/>
                @error('contact_address')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-6 col-xs-12">
              <div class="form-group">
                <label for="contact_phone">İletişim Telefonu </label>
                <input name="contact_phone" id="contact_phone" class="form-control" placeholder="İletişim Telefonu" value="{{ old('contact_address') ? old('contact_phone') : @$settings->where('key', 'contact_phone')->first()->value }}"/>
                @error('contact_phone')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-12 col-xs-12">
              <div class="form-group">
                <label for="iframe_location">Konum - iframe </label>
                <input name="iframe_location" id="iframe_location" class="form-control" placeholder="Konum - iframe" value="{{ old('iframe_location') ? old('iframe_location') : @$settings->where('key', 'iframe_location')->first()->value }}"/>
                @error('iframe_location')
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

@section('page-vendors')
<script src="{{asset('/assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js?v=7.1.0')}}"></script>
@endsection

@section('scripts')
<script>
	ClassicEditor.create( document.querySelector( '#page_about' ) )
	.then( editor => {
		console.log( editor );
	})
	.catch( error => {
		console.error( error );
	});
	ClassicEditor.create( document.querySelector( '#page_confidentiality_agreement' ) )
	.then( editor => {
		console.log( editor );
	})
	.catch( error => {
		console.error( error );
	});
	ClassicEditor.create( document.querySelector( '#page_terms_of_use' ) )
	.then( editor => {
		console.log( editor );
	})
	.catch( error => {
		console.error( error );
	});
</script>
@endsection