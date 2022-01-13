@extends('backend.layout.master')

@section('title', 'Dergiler')

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
        <h5 class="text-dark font-weight-bold my-1 mr-5">Dergiler</h5>
        <!--end::Page Title-->
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
        	<li class="breadcrumb-item">
        	  <a href="{{route('admin.get.index')}}" class="text-muted">Anasayfa</a>
        	</li>
        	<li class="breadcrumb-item">
        	  <a href="" class="text-muted">Dergiler</a>
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
          <h3 class="card-label">Dergiler</h3>
        </div>
        <div class="card-toolbar">
          <a href="{{route('magazine.create')}}" class="btn btn-sm btn-light-success font-weight-bold">
            <i class="flaticon2-plus"></i> Dergi Ekle
          </a>
        </div>
      </div>
      <div class="card-body">
        <table class="table table-hover mb-6">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Durumu</th>
              <th scope="col">Görsel</th>
              <th scope="col">Ad</th>
              <th scope="col">Oluşturulma Tarihi</th>
              <th scope="col">İşlemler</th>
            </tr>
          </thead>
          <tbody>
            @foreach($magazines as $magazine)
            <tr class="magazine-side">
              <th scope="row">{{$magazine->id}}</th>
              <td>
                <span class="badge bg-{{$magazine->status->class_name}}">{{$magazine->status->name}}</span>
              </td>
              <td>
                <a class="image-popup-vertical-fit" href="/upload/magazine/{{$magazine->image}}" title="{{$magazine->image}}">
                  <img src="/upload/magazine/{{$magazine->image}}" style="max-height: 75px;">
                </a>
              </td>
              <td>{{@$magazine->name}} ({{$magazine->likes()->where('is_like', 1)->count()}} <i class="far fa-thumbs-up"></i> {{$magazine->likes()->where('is_like', 0)->count()}} <i class="far fa-thumbs-down"></i>)</td>
              <td>{{$magazine->created_at}}</td>
              <td>
                <a href="{{route('magazine-page.index', ['magazine_id' => $magazine->id])}}" class="btn btn-sm btn-light-warning font-weight-bold mr-2"> Sayfalar </a>
                <a href="{{route('magazine.edit', ['id' => $magazine->id])}}" class="btn btn-sm btn-light-primary font-weight-bold mr-2"> Düzenle</a>
                <button type="button" class="btn btn-sm btn-light-danger font-weight-bold mr-2 destroy" data-id="{{$magazine->id}}">Sil</button>
                <a href="{{route('magazine.ebook', ['id' => $magazine->id])}}" class="btn btn-sm btn-light-primary font-weight-bold mr-2" target_blank> Oku</a>
                <a href="{{route('magazine.ebook', ['id' => $magazine->id])}}" class="btn btn-sm btn-light-primary font-weight-bold mr-2" target_blank><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                  </svg></a>

              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{$magazines->links('vendor.pagination.custom')}}
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
      var url = '{{ route("magazine.destroy", ":id") }}';

      url = url.replace(':id', id);

      window.location.href = url;

    }
  });
});

document.querySelectorAll('.magazine-side').forEach(item => {
    item.style.cursor = 'pointer'
    item.addEventListener('click', (e) => {

    })
})
</script>
@endsection
