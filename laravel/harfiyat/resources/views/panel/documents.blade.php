@extends('panel.layouts.master')
@section('page', 'Gönderilen Belgeler')
@section('title', 'Belge Durumları Gösteriliyor / ')
@section('TOTAL_DOC')
  {{ $TOTAL_DOC}}
@endsection
@section('SUCCESS_DOC')
  {{ $SUCCESS_DOC}}
@endsection
@section('RED_DOC')
  {{ $RED_DOC }}
@endsection
@section('CONTINUE_DOC')
  {{ $CONTINUE_DOC}}
@endsection
@section('content')
  <div class="row mt-4">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-lg-10">
              <div class="d-flex flex-column h-100">
                <h5 class="font-weight-bolder">Göderilen Kabul Belgeleri</h5>
                <p class="mb-5">Göndermiş olduğunuz kabul belgelerinin durumlarını burda görebilirsiniz.</p>

                <div class="row">
                  <div class="col-12">
                    <table id="DocsMy">
                      <thead>
                          <tr>
                              <th>BelgeNo</th>
                              {{-- <th>SözleşmeNo</th> --}}
                              <th>Tahmini Atık Miktarı</th>
                              <th>Atık Tutarı</th>
                              <th>Başvuru Durumu</th>
                              <th>Gönderim Tarihi</th>
                              <th>#</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($UnUploadedDocs as $key => $value)
                          <tr>
                              <td>{{ $value->BelgeNo }}</td>
                              {{-- <td>{{ $value->SozlesmeNo }}</td> --}}
                              <td>{{$value->TahminiAtikMiktari}}{{ $value->AtikBirimiId }}</td>
                              <td>@convert($value->AtikTutari)TL</td>
                              <td>@php
                                if( $value->BasvuruDurumId == 1 )
                                  echo '<label class="btn-sm btn-primary"> Bekleniyor </label>';
                                if( $value->BasvuruDurumId == 2 )
                                  echo '<label class="btn-sm btn-success"> Onaylandı </label>';
                                if( $value->BasvuruDurumId == 3 )
                                    echo '<label class="btn-sm btn-success"> Tamamlandı </label>';
                                if( $value->BasvuruDurumId == 4 )
                                    echo '<label class="btn-sm btn-danger"> İptal </label>';
                                if( $value->BasvuruDurumId == 5 )
                                    echo '<label class="btn-sm btn-warning"> Reddedildi </label>';
                              @endphp</td>
                              <td>{{ Carbon\Carbon::parse($value->EklemeTarihi)->format('d/m/Y H:i:s') }}</td>
                              <td>
                                @if ($value->BasvuruDurumId == 3 )
                                  <a class="btn btn btn-primary" title="Evrak ödemesi alınmıştır." data-toggle="tooltip"><i class="fa fa-check"></i> ÖDENDİ </a>
                                @endif
                                @if ($value->BasvuruDurumId == 1 )
                                  <a class="btn btn" title="Evrak durumu bekleniyor" data-toggle="tooltip"><i class="fa fa-infinity"></i> BEKLENİYOR </a>
                                @endif
                                @if ($value->BasvuruDurumId == 2)
                                  <form  action="{{ route('payment') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="key" value="{{ $value->KabulBelgesiId }}">
                                    <button class="btn btn-success" type="submit" name="button" title="Evrak onaylandı ödeme yapınız" data-toggle="tooltip"><i class="fa fa-plus"></i> ÖDEME YAP</button>
                                  </form>
                                @endif
                                @if ($value->BasvuruDurumId == 4 )
                                  <a class="btn btn-warning" title="Evrak artık düzenlenemez" data-toggle="tooltip"><i class="fa fa-times"></i> İPTAL </a>
                                @endif
                                @if ($value->BasvuruDurumId == 5 )
                                  <form  action="{{ route('edit') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="key" value="{{ $value->KabulBelgesiId }}">
                                    <button class="btn btn-warning" type="submit" name="button" title="Evrak geri döndü lütfen düzenleyiniz. Geri dönüş sebebi :  {{ $value->BasvuruRetNedeni }}" data-toggle="tooltip"><i class="fa fa-edit"></i> DÜZENLE </button>
                                  </form>
                                @endif
                              </td>
                          </tr>
                        @endforeach
                      </tbody>
                  </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-2 ms-auto text-center mt-2 mt-lg-0">
              <div class="bg-gradient-primary border-radius-lg h-100">
                <img src="/assets/panel/img/shapes/waves-white.svg" class="position-absolute h-100 w-50 top-0 d-lg-block d-none" alt="waves">
                <div class="position-relative d-flex align-items-center justify-content-center h-100">
                  <img class="w-100 position-relative z-index-2 pt-4" src="/uploads/white.png">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

@endsection

@section('add')
  {{-- <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2" style="border-radius:0px;">
      <i class="fa fa-file-upload py-2"> </i> Dosya Ekle
    </a>
    <div class="card shadow-lg ">
      <div class="card-header pb-0 pt-3 ">
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <div class="float-start">
          <h5 class="mt-3 mb-0">Kabul Belgesine Dosya Ekleme</h5>
          <p>Dosya eklenmemiş kabul belgelerine yalnız 1 defa dosya eklemesi yapabilirsiniz</p>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Dosya Seçiniz</h6>
        </div>

        <!-- Sidenav Type -->
        <div class="mt-3">
           <form class="" action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
             @csrf
             <select class="form-control js-example-basic-single6" name="doc" required>
               @foreach ($UnUploadedDocs as $key => $value)
                 <option value="{{ $value->KabulBelgesiId }}">{{ \Carbon\Carbon::parse($value->EklemeTarihi)->format('m/d/Y H:i') }} {{ $value->BelgeNo }}
                   @if ($value->EvrakIzni == 1)
                     Evrak Yüklendi
                   @endif
                   @if ($value->EvrakIzni == 0 or $value->EvrakIzni == NULL)
                     Evrak Yüklenmedi
                   @endif
                 </option>
               @endforeach
             </select>
             <hr>
             <input type="file" name="attachment[]" value="" multiple="multiple" required>
             <hr>
             <input type="submit" class="btn bg-gradient-primary w-100 px-3 mb-2 active" name="" value="YÜKLE">
           </form>
        </div>

      </div>
    </div>
  </div> --}}
@endsection


@section('script')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js" charset="utf-8"></script>
  <script src="/assets/panel/js/notify.js"></script>
  <script type="text/javascript">


    $(document).ready( function () {
        $('#DocsMy').DataTable({
            "language":{
              "url":"//cdn.datatables.net/plug-ins/1.10.12/i18n/Turkish.json"
              }
              ,"order": [4,"asc"]
          });
            $('[data-toggle="tooltip"]').tooltip();
    });

     @if (session('message'))
       $.notify("{{ session('message') }}", "success");
     @endif

  </script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection
