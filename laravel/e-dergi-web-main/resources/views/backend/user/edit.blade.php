@extends('backend.layout.master')

@section('title', 'Kullanıcı Düzenle')

@section('breadcrumb')
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
  	<!--begin::Info-->
  	<div class="d-flex align-items-center flex-wrap mr-1">
    	<!--begin::Page Heading-->
    	<div class="d-flex align-items-baseline flex-wrap mr-5">
        <!--begin::Page Title-->
        <h5 class="text-dark font-weight-bold my-1 mr-5">Kullanıcı Düzenle</h5>
        <!--end::Page Title-->
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
        	<li class="breadcrumb-item">
        	  <a href="{{route('admin.get.index')}}" class="text-muted">Anasayfa</a>
        	</li>
          <li class="breadcrumb-item">
            <a href="{{route('user.index')}}" class="text-muted">Kullanıcılar</a>
          </li>
          <li class="breadcrumb-item">
            <a href="" class="text-muted">Kullanıcı Düzenle</a>
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
        <h3 class="card-title">Kullanıcı Düzenle</h3>
      </div>
      <!--begin::Form-->
      <form method="POST" action="{{route('user.update', ['id' => $user->id])}}" enctype="multipart/form-data" autocomplete="off">
        {{csrf_field()}}
        <div class="card-body">
          <div class="row">
            <div class="col-4">
              <div class="form-group">
                <label for="role_id">Rolü <span class="text-danger">*</span></label>
                <select class="form-control" id="role_id" name="role_id">
                  @foreach($roles as $role)
                  <option value="{{$role->id}}" {{ $user->role_id == $role->id ? 'selected' : '' }}>{{$role->name}}</option>
                  @endforeach
                </select>
                @error('role_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <label for="name">Adı Soyadı <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Adı" name="name" id="name" required value="{{ old('name') ? old('name') : $user->name }}" />
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <label for="phone">Telefon <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="Telefon" name="phone" id="phone" required value="{{ old('phone') ? old('phone') : $user->phone }}" autocomplete="off" />
                @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <label for="email">Emaili <span class="text-danger text-small">*</span></label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Emaili" name="email" id="email" value="{{ old('email') ? old('email') : $user->email }}" autocomplete="off" required />
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <label for="tc">TC <span class="text-danger text-small">*</span></label>
                <input type="text" class="form-control @error('tc') is-invalid @enderror" placeholder="TC" name="tc" id="tc" value="{{ old('tc') ? old('tc') : $user->tc }}" autocomplete="off" required />
                @error('tc')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <label for="password">Şifresi</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Şifresi" name="password" id="password" autocomplete="off" />
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-4">
              <div class="form-group">
                <label for="profile_photos">Profil Fotoğrafı </label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input @error('profile_photos') is-invalid @enderror" id="profile_photos" name="profile_photos" />
                  <label class="custom-file-label" for="profile_photos">Dosya Seçin</label>
                </div>
                @error('profile_photos')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
          <div class="form-group">
            @if($user->profile_photo != null)
            <img src="/upload/user/{{$user->profile_photo}}" class="h-150px align-self-end">
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