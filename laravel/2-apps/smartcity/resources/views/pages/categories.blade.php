@extends('layoutadmin')
@section('content')
<div class="admin-container">
    <div class="row admin-rows">
        <div class="col-lg-12 col-md-12 col-sm-12">
        <form action="" method="post"  class="adding-form" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="type" id="category" value="categories">
              <input type="text" name="category" id="categories-title" class="adding-text" placeholder="Kategori" required>
              <label for="project-img" class="adding-file">Dosya Seç</label>
              <input type="file" name="file" id="project-img" required style="display:none;">
              <input type="submit" id="add-category" value="Ekle" style="margin-right: 10px">
            </form>
            <table class="table admin-table">
                <thead>
                    <tr class="list-column">
                        <th scope="col">Resim</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Tarih</th>
                        <th scope="col">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($result as $item)
                    <tr class="list-rows">
                        <td scope="col"><img src="{{ asset('/uploads/categories/'.$item->category.'/'.$item->img)}}" alt="" width="60;"></td>
                        <td scope="col">{{ $item->category }}</td>
                        <td scope="col">{{ $item->date }}</td>
                        <td scope="col">
                            <button class="del-btn-danger" onclick="deleteCategory({{$item->id}}, '{{$item->category}}', event)">Sil</button>
                            <a href="{{url('/admin/categories/edit/'.$item->category)}}" class="del-btn-warning" id="edit-category">Düzenle</a>
                        </td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
        </div>
    </div>
</div>
@stop
<script>
    //remove category
    const deleteCategory = async (id,category, e) => {
        const result = await fetch('/admin/categories/delete',{
          method:'POST',
          headers: {
              Accept: 'application/json',
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN':'{{csrf_token()}}'
          },
          body:JSON.stringify({
            id: id,category:category
          })
        })
        if(result.status === 200){
            e.target.parentNode.parentNode.remove()
        }
    }
</script>
