@extends('backend.layout.master')

@section('title', 'Taslaklar')

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
        <h5 class="text-dark font-weight-bold my-1 mr-5">Taslaklar</h5>
        <!--end::Page Title-->
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
        	<li class="breadcrumb-item">
        	  <a href="{{route('admin.get.index')}}" class="text-muted">Anasayfa</a>
        	</li>
        	<li class="breadcrumb-item">
        	  <a href="" class="text-muted">Taslaklar</a>
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
    <div class="card card-custom gutter-b">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label">Taslaklar</h3>
        </div>
        <div class="card-toolbar">
          <a href="{{route('magazinedraft.create')}}" class="btn btn-sm btn-light-success font-weight-bold">
            <i class="flaticon2-plus"></i> Taslak Ekle
          </a>
        </div>
      </div>
      <div class="card-body">
        <table class="table table-hover mb-6">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Görsel</th>
              <th scope="col">Ad</th>
              <th scope="col">Oluşturulma Tarihi</th>
              <th scope="col">İşlemler</th>
            </tr>
          </thead>
          <tbody>
            @foreach($drafts as $draft)
            <tr>
              <th scope="row">{{$draft->id}}</th>
              <td>
                <a class="image-popup-vertical-fit" href="/upload/magazine/{{$draft->image}}" title="{{$draft->image}}">
                  <img src="/upload/magazine/{{$draft->image}}" style="max-height: 75px;">
                </a>
              </td>
              <td>{{@$draft->name}}</td>
              <td>{{$draft->created_at}}</td>
              <td>
                <a href="{{route('magazinedraft.edit', ['id' => $draft->id])}}" class="btn btn-sm btn-light-primary font-weight-bold mr-2"> Düzenle</a>
                <button type="button" class="btn btn-sm btn-light-danger font-weight-bold mr-2 destroy" data-id="{{$draft->id}}">Sil</button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{$drafts->links('vendor.pagination.custom')}}
      </div>
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
  $('.image-popup-vertical-fit').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    mainClass: 'mfp-img-mobile',
    image: {
      verticalFit: true
    }
    
  });

$(".destroy").click(function(e) {
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
      var url = '{{ route("magazinedraft.destroy", ":id") }}';

      url = url.replace(':id', id);

      window.location.href = url;
      
    } 
  });
});
</script>
@endsection