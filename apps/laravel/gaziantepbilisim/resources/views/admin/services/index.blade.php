@extends('admin.dashboard')
@section('content')

 <div class="col-xl-12">
    <div id="panel-1" class="panel">
        <div  class="custom-toolbar">
            <h2>
               Hizmetler
            </h2>
            <div class="panel-toolbar">
              <a href="{{route('services.create')}}" class="btn btn-success waves-effect waves-themed">Yeni Hizmet Ekle</a>
            </div>
        </div>
        <div class="panel-container show">
            <div class="panel-content">
              
                <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                    <thead>
                        <tr>
                            <th>Başlık</th>
                            <th>Açıklama</th>
                            <th>İçerik</th>
                            <th>Resim</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                      @if($services)
                        @foreach($services as $item)
                          <tr>
                            <td>{{$item->title}}</td>
                            <td>
                              <textarea disabled class="form-control" id="" cols="30" rows="1">{{$item->description}}</textarea>
                            </td>
                            <td>
                              <textarea disabled class="form-control" id="" cols="30" rows="1">{{$item->content}}</textarea>
                            </td>
                            <td><img src="{{asset($item->image)}}" alt="" width=48></td>
                            <td>
                                <a href="{{route('services.edit', $item->id)}}" style="color:#fff;" class="btn btn-success waves-effect waves-themed">Düzenle</a>
                                
                                <form action="{{route('services.destroy', $item->id)}}" method="post" style="display:inline;">
                                  @method('delete')
                                  @csrf
                                  <button type="submit" class="btn btn-danger waves-effect waves-themed">Sil</button>
                                </form>
                              </td>
                          </tr>
                        @endforeach
                      @endif()
                    </tbody>
                </table>
              
            </div>
        </div>
    </div>
</div>
@stop