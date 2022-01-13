@extends('backend.layout.master')

@section('title', 'Dergi Sayfaları')

@section('breadcrumb')
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
  	<!--begin::Info-->
  	<div class="d-flex align-items-center flex-wrap mr-1">
    	<!--begin::Page Heading-->
    	<div class="d-flex align-items-baseline flex-wrap mr-5">
        <!--begin::Page Title-->
        <h5 class="text-dark font-weight-bold my-1 mr-5">Dergi Sayfaları</h5>
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
        	  <a href="" class="text-muted">Dergi Sayfaları</a>
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
	<div class="col-12">
		<!--begin::Card-->
		<div class="card card-custom gutter-b">
			<div class="card-body">
				<div class="d-flex">
					<!--begin: Pic-->
					<div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
						<div class="symbol symbol-50 symbol-lg-120">
							<img alt="Pic" src="/3.png" />
						</div>
						<div class="symbol symbol-50 symbol-lg-120 symbol-primary d-none">
							<span class="font-size-h3 symbol-label font-weight-boldest">JM</span>
						</div>
					</div>
					<!--end: Pic-->
					<!--begin: Info-->
					<div class="flex-grow-1">
						<!--begin: Title-->
						<div class="d-flex align-items-center justify-content-between flex-wrap">
							<div class="mr-3">
								<!--begin::Name-->
								<a href="#" id="magazine-name" class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">
									{{$magazine->name}}
								</a>
								<!--end::Name-->
							</div>
							<div class="my-lg-0 my-1">
								<a href="#" class="btn btn-sm btn-light-success font-weight-bolder text-uppercase mr-3">İndir</a>
								<a href="#" class="btn btn-sm btn-info font-weight-bolder text-uppercase">Önizleme</a>
							</div>
						</div>
						<!--end: Title-->
						<!--begin: Content-->
						<div class="d-flex align-items-center flex-wrap justify-content-between">
							<div class="flex-grow-1 font-weight-bold text-dark-50 py-5 py-lg-2 mr-5">
								{{@$magazine->description}}
							</div>
							<div class="d-flex flex-wrap align-items-center py-2">
								<div class="d-flex align-items-center mr-10">
									<div class="mr-6">
										<div class="font-weight-bold mb-2">Yayınlanma Tarihi</div>
										<span class="btn btn-sm btn-text btn-light-primary text-uppercase font-weight-bold">{{@$magazine->published_at ? $magazine->published_at->format('d/m/Y H:i') : '-'}}</span>
									</div>
								</div>
							</div>
						</div>
						<!--end: Content-->
					</div>
					<!--end: Info-->
				</div>
				<div class="separator separator-solid my-7"></div>
				<!--begin: Items-->
				<div class="d-flex align-items-center flex-wrap">
					<!--begin: Item-->
					<div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
						<span class="mr-4">
							<i class="flaticon-piggy-bank icon-2x text-muted font-weight-bold"></i>
						</span>
						<div class="d-flex flex-column text-dark-75">
							<span class="font-weight-bolder font-size-sm">Görüntülenme</span>
							<span class="font-weight-bolder font-size-h5">
							<span class="text-dark-50 font-weight-bold"></span>249,500</span>
						</div>
					</div>
					<!--end: Item-->
					<?php /*
					<!--begin: Item-->
					<div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
						<span class="mr-4">
							<i class="flaticon-chat-1 icon-2x text-muted font-weight-bold"></i>
						</span>
						<div class="d-flex flex-column">
							<span class="text-dark-75 font-weight-bolder font-size-sm">648 Yorum</span>
							<a href="#" class="text-primary font-weight-bolder">Görüntüle</a>
						</div>
					</div>
					<!--end: Item-->
					*/ ?>
				</div>
			</div>
		</div>
		<!--end::Card-->
	</div>
  <div class="col-12">
    <!--begin::Card-->
    <div class="card card-custom gutter-b">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label">Sayfalar</h3>
        </div>
        <div class="card-toolbar">
          <a href="{{route('magazine-page.create', ['magazine_id' => $magazine->id])}}" class="btn btn-sm btn-light-success font-weight-bold">
            <i class="flaticon2-plus"></i> Sayfa Ekle
          </a>
        </div>
      </div>
      <div class="card-body">
        <table class="table table-hover mb-6">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Görsel</th>
              <th scope="col">Dergi Ad</th>
              <th scope="col">Ad</th>
              <th scope="col">Sırası</th>
              <th scope="col">Oluşturulma Tarihi</th>
              <th scope="col">İşlemler</th>
            </tr>
          </thead>
          <tbody>
            @foreach($magazinepages as $magazinepage)
            <tr>
              <th scope="row">{{$magazinepage->id}}</th>
              <td>
                <img src="{{ asset('storage/'.$magazinepage->magazine_name.'/'.$magazinepage->image.'.png')}}" class="page-images" style="max-height: 75px;">
              </td>
              <td>{{@$magazinepage->image}}</td>
              <td>{{@$magazinepage->magazine_name}}</td>
              <td>{{@$magazinepage->order}}</td>
              <td>{{$magazinepage->created_at}}</td>
              <td>
                <a href="{{route('magazine-page.edit', ['magazine_id' => $magazine->id, 'id' => $magazinepage->id])}}" class="btn btn-sm btn-light-primary font-weight-bold mr-2"> Düzenle</a>
                <button type="button" class="btn btn-sm btn-light-danger font-weight-bold mr-2 destroy" data-id="{{$magazinepage->id}}" data-magazine_id="{{$magazine->id}}">Sil</button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{$magazinepages->links('vendor.pagination.custom')}}
      </div>
    </div>
    <!--end::Card-->
  </div>
</div>
@endsection
@section('scripts')
<script>


$(".destroy").click(function(e) {
  var magazine_id = $(this).data('magazine_id');
  var id = $(this).data('id');

  Swal.fire({
    title: "Silmek istediğine emin misin?",
    text: "",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Evet",
    cancelButtonText: "Hayır!",
    reverseButtons: true
  }).then(function(result) {
    if (result.value) {
      var url = '{{ route("magazine-page.destroy", ["id" => ":id", "magazine_id" => ":magazine_id"]) }}';

      url = url.replace(':id', id);
      url = url.replace(':magazine_id', magazine_id);

      window.location.href = url;

    }
  });
});
</script>
@endsection
