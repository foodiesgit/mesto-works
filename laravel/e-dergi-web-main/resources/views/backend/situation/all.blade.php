@extends('backend.layout.master')

@section('title', 'Durumlar')

@section('breadcrumb')
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
  	<!--begin::Info-->
  	<div class="d-flex align-items-center flex-wrap mr-1">
    	<!--begin::Page Heading-->
    	<div class="d-flex align-items-baseline flex-wrap mr-5">
        <!--begin::Page Title-->
        <h5 class="text-dark font-weight-bold my-1 mr-5">Durumlar</h5>
        <!--end::Page Title-->
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
        	<li class="breadcrumb-item">
        	  <a href="{{route('admin.get.index')}}" class="text-muted">Anasayfa</a>
        	</li>
        	<li class="breadcrumb-item">
        	  <a href="" class="text-muted">Durumlar</a>
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
          <h3 class="card-label">Durumlar</h3>
        </div>
        <?php /* <div class="card-toolbar">
          <a href="{{route('situation.create')}}" class="btn btn-sm btn-light-success font-weight-bold">
            <i class="flaticon2-plus"></i> Durum Ekle
          </a>
        </div> */ ?>
      </div>
      <div class="card-body">
        <table class="table table-hover mb-6">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Tipi</th>
              <th scope="col">Durum</th>
              <th scope="col">İşlemler</th>
            </tr>
          </thead>
          <tbody>
            @foreach($situations as $situation)
            <tr>
              <th scope="row">{{$situation->id}}</th>
              <td>{{$situation->type_id == 2 ? 'Magazine' : 'Post'}}</td>
              <td>{{$situation->name}}</td>
              <td>
                @if($situation->is_deletable == 1)
                <a href="{{route('situation.edit', ['id' => $situation->id])}}" class="btn btn-sm btn-light-primary font-weight-bold mr-2">Düzenle</a>
                <button type="button" class="btn btn-sm btn-light-danger font-weight-bold mr-2 destroy" data-id="{{$situation->id}}">Sil</button>
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{$situations->links('vendor.pagination.custom')}}
      </div>
    </div>
    <!--end::Card-->
  </div>
</div>

@endsection

@section('scripts')
<script>
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
      var url = '{{ route("situation.destroy", ":id") }}';
      url = url.replace(':id', id);
      window.location.href = url;
      
    } 
  });
});
</script>
@endsection