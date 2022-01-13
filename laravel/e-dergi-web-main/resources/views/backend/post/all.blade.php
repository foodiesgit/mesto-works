@extends('backend.layout.master')

@section('title', 'Postlar')

@section('breadcrumb')
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
  	<!--begin::Info-->
  	<div class="d-flex align-items-center flex-wrap mr-1">
    	<!--begin::Page Heading-->
    	<div class="d-flex align-items-baseline flex-wrap mr-5">
        <!--begin::Page Title-->
        <h5 class="text-dark font-weight-bold my-1 mr-5">Postlar</h5>
        <!--end::Page Title-->
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
        	<li class="breadcrumb-item">
        	  <a href="{{route('admin.get.index')}}" class="text-muted">Anasayfa</a>
        	</li>
        	<li class="breadcrumb-item">
        	  <a href="" class="text-muted">Postlar</a>
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
          <h3 class="card-label">Postlar</h3>
        </div>
        <div class="card-toolbar">
          <a href="{{route('post.create')}}" class="btn btn-sm btn-light-success font-weight-bold">
            <i class="flaticon2-plus"></i> Post Ekle
          </a>
        </div>
      </div>
      <div class="card-body">
        <table class="table table-hover mb-6">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Durumu</th>
              <th scope="col">Oluşturan</th>
              <th scope="col">Başlığı</th>
              <th scope="col">Göster/Gizle</th>
              <th scope="col">Oluşturulma Tarihi</th>
              <th scope="col">İşlemler</th>
            </tr>
          </thead>
          <tbody>
            @foreach($posts as $post)
            <tr>
              <th scope="row">{{$post->id}}</th>
              <td>
                <span class="badge bg-{{$post->status->class_name}}">{{$post->status->name}}</span>

                <?php /*
                <!-- Button trigger modal-->
                <button type="button" class="badge bg-{{$post->status->class_name}}" data-toggle="modal" data-target="#status_{{$post->id}}">
                  {{$post->status->name}}
                </button>

                @include('backend.blog.edit-status')
                */ ?>
              </td>
              <td>{{$post->createdBy->name}}</td>
              <td>{{@$post->title}} ({{$post->likes()->where('is_like', 1)->count()}} <i class="far fa-thumbs-up"></i> {{$post->likes()->where('is_like', 0)->count()}} <i class="far fa-thumbs-down"></i>) </td>
              <td>
                @if($post->show_index)
                <a href="{{route('get.edit-show', ['id' => $post->id, 'show' => 'show_index', 'is_active' => 0])}}" class="label label-light-success label-inline">Anasayfa</a> 
                @else
                <a href="{{route('get.edit-show', ['id' => $post->id, 'show' => 'show_index', 'is_active' => 1])}}" class="label label-light-danger label-inline">Anasayfa</a>
                @endif
                @if($post->show_header)
                <a href="{{route('get.edit-show', ['id' => $post->id, 'show' => 'show_header', 'is_active' => 0])}}" class="label label-light-success label-inline">Header</a> 
                @else
                <a href="{{route('get.edit-show', ['id' => $post->id, 'show' => 'show_header', 'is_active' => 1])}}" class="label label-light-danger label-inline">Header</a>
                @endif
                @if($post->show_footer)
                <a href="{{route('get.edit-show', ['id' => $post->id, 'show' => 'show_footer', 'is_active' => 0])}}" class="label label-light-success label-inline">Footer</a> 
                @else
                <a href="{{route('get.edit-show', ['id' => $post->id, 'show' => 'show_footer', 'is_active' => 1])}}" class="label label-light-danger label-inline">Footer</a>
                @endif
              </td>
              <td>{{$post->created_at}}</td>
              <td>
                <a href="{{route('post.edit', ['id' => $post->id])}}" class="btn btn-sm btn-light-primary font-weight-bold mr-2"> Düzenle</a>
                <button type="button" class="btn btn-sm btn-light-danger font-weight-bold mr-2 destroy" data-id="{{$post->id}}">Sil</button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{$posts->links('vendor.pagination.custom')}}
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
      var url = '{{ route("post.destroy", ":id") }}';

      url = url.replace(':id', id);

      window.location.href = url;
      
    } 
  });
});
</script>
@endsection