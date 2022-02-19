@extends('admin.dashboard')
@section('content')

 <div class="col-xl-12">
    <div id="panel-1" class="panel">
        <div  class="custom-toolbar">
            <h2>
               İletişim
            </h2>
            <div class="panel-toolbar">
              İletişim Güncelleme
            </div>
        </div>
        <div class="panel-container show">
            <div class="panel-content">
                <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                    <thead>
                        <tr>
                            <th>Posta Adresi</th>
                            <th>Telefon</th>
                            <th>Şube 1</th>
                            <th>Şube 2</th>
                            <th>Harita</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                      @if($contact)
                      <tr>
                          <td>{{$contact->email}}</td>
                          <td>{{$contact->phone}}</td>
                          <td>{{$contact->branch1}}</td>
                          <td>{{$contact->branch2}}</td>
                          <td><textarea disabled name="" id="" cols="20" rows="10">
                          {{$contact->map}}
                          </textarea></td>
                          <td>
                            <a href="{{route('contact.edit', $contact->id)}}" style="color:#fff;width:100%;margin-bottom:10px;" class="btn btn-success waves-effect waves-themed">Düzenle</a>
                            
                            <form action="{{route('contact.destroy', $contact->id)}}" method="post" style="display:inline;">
                              @method('delete')
                              @csrf
                              <button type="submit" class="btn btn-danger waves-effect waves-themed" style="width:100%;">Sil</button>
                            </form>
                          </td>
                      </tr>
                      @endif
                    </tbody>
                   
                </table>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
<script>
    $(function(){
        $('#dt-basic-example').dataTable();
    });
</script>
    
@endsection