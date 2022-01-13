@extends('layoutadmin')
@section('content')
<div class="admin-container">
    <div class="row admin-rows">
        <div class="col-lg-12 col-md-12 col-sm-12">
        <form action="/admin/addprojects" method="post"  class="adding-form" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="type" value="Projects">
              <input type="text" name="category" id="ptoject-category" class="adding-text" placeholder="Kategori" required>
              <input type="text" name="title" id="ptoject-title" class="adding-text" placeholder="Başlık" required>
              <textarea name="text" id="" cols="30" rows="1" class="adding-text"  placeholder="Text" required></textarea>
              <input type="text" name="link" id="link" class="adding-text" placeholder="Paylaşım Linki" required>
              <label for="project-img" class="adding-file">Dosya Seç</label>
              <input type="file" name="file" id="project-img" required style="display:none;">
              <input type="submit" id="add-project" value="Ekle">
          </form>
          <table class="table admin-table">
              <thead>
                  <tr class="list-column">
                      <th scope="col">Resim</th>
                      <th scope="col">Kategori</th>
                      <th scope="col">Başlık</th>
                      <th scope="col">Text</th>
                      <th scope="col">Link</th>
                      <th scope="col">İşlemler</th>
                  </tr>
              </thead>
              <tbody>
                  @isset($result)
                    @foreach($result as $item)
                        <tr class="list-rows">
                            <td scope="col"><img src="{{ asset('/uploads/projects/'.$item->title.'/'.$item->img)}}" alt="" width="60"></td>
                            <td scope="col">{{ $item->category }}</td>
                            <td scope="col">{{ $item->title }}</td>
                            <td scope="col"><textarea class="adding-text" cols="30" rows="1">{{ $item->text }}</textarea></td>
                            <td scope="col">{{ $item->link }}</td>
                            <td scope="col"><button class="del-btn-danger" onclick="deleteProject({{$item->id}},'{{$item->title}}', event)">Sil</button></td>
                        </tr>
                    @endforeach
                  @endisset
                  @isset($msg)
                        {{$msg}}
                    @endisset
              </tbody>
          </table>
        </div>
    </div>
</div>
@stop
<script>
    //remove project
    const deleteProject = async (id,project, e) => {
        const result = await fetch('/admin/project/delete',{
          method:'POST',
          headers: {
              Accept: 'application/json',
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN':'{{csrf_token()}}'
          },
          body:JSON.stringify({
            id: id,project:project
          })
        })
        if(result.status === 200){
            e.target.parentNode.parentNode.remove()
        }
    }
</script>
