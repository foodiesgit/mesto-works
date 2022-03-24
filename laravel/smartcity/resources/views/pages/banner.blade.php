@extends('layoutadmin')
@section('content')

<div class="admin-container">
    <div class="row admin-rows">
        <div class="col-lg-12 col-md-12 col-sm-12">
        <form action="/admin/addbanner" method="post"  class="adding-form" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="type" value="Banner">
              <input type="text" name="title" id="banner-title" class="adding-text" placeholder="Başlık" required>
              <textarea name="text" id="" cols="30" rows="1" name="text" class="adding-text"  placeholder="Text" required></textarea>
              <input type="text" name="link" id="banner-text" class="adding-text" placeholder="Link" required>
              <label for="banner-img" class="adding-file">Dosya Seç</label>
              <input type="file" name="file" id="banner-img" required style="display:none;">
              <input type="submit" id="add-banner" value="Ekle">
          </form>
          <table class="table admin-table">
              <thead>
                  <tr class="list-column">
                      <th scope="col">Resim</th>
                      <th scope="col">Başlık</th>
                      <th scope="col">Text</th>
                      <th scope="col">İşlemler</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($result as $item)
                      <tr class="list-rows">
                          <td scope="col"><img src="{{ asset('/uploads/banner/'.$item->img)}}" alt="" width="60"></td>
                          <td scope="col">{{ $item->title }}</td>
                          <td scope="col" ><textarea class="adding-text" cols="30" rows="2">{{ $item->text }}</textarea></td>
                          <td scope="col"><button class="del-btn-danger" onclick="deleteBanner({{$item->id}}, event)">Sil</button></td>
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
    const deleteBanner = async (id, e) => {
        const result = await fetch('/admin/banner/delete',{
          method:'POST',
          headers: {
              Accept: 'application/json',
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN':'{{csrf_token()}}'
          },
          body:JSON.stringify({
            id: id
          })
        })
        if(result.status === 200){
            e.target.parentNode.parentNode.remove()
        }
    }
</script>
