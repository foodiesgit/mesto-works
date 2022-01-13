@extends('panel.layouts.master')
@section('page', 'Kabul Belgesi Düzenleme')
@section('title', 'Kabul Belgesi Düzenleme / HAFRİYAT')
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
            <div class="col-12">
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Evrak Geri Gelmesi :  </strong> {{ $document->BasvuruRetNedeni }}
                <hr>
                <b>Kayıt ID : {{ $document->KabulBelgesiId }}</b>
                <b>Evrak No : {{ $document->BelgeNo }}</b>
                <i>Güncellenme Tarihi :  {{ \Carbon\Carbon::parse($document->GuncellenmeTarihi)->format('d/m/Y H:i:s') }} </i>
                <small>Revizyon : {{ $document->Revizyon ?? "1.0" }}</small>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="d-flex flex-column h-100">
                <h5 class="font-weight-bolder"><i class="fa fa-edit"></i> Kabul Belgesi Düzenleme</h5>
                <p class="mb-5">Kabul belgesi düzenleme modülüdür.</p>
                @if ($document->BasvuruDurumId == 5)
                  <form class="" action="{{ route('update')}}" method="post" enctype="multipart/form-data">
                @endif
                    <input type="hidden" name="KabulBelgesiId" value="{{ $document->KabulBelgesiId }}">
                    @csrf
                      <fieldset>
                        <legend><i class="fas fa-file-import"></i> Belge Bilgileri</legend>
                        <div class="row">
                          <div class="col-3">
                            <label class="text-sm mb-0 text-capitalize font-weight-bold">İlçe Belediye Seçiniz</label>
                          </div>
                          <div class="col-9">
                              <select class="form-control js-example-basic-single" id="IlceBelediyeKodu" name="IlceBelediyeKodu">
                                  @foreach ($Districts as $key => $value)
                                    <option value="{{ $value->IlceKodu }}">{{ $value->IlceAdi }} BELEDİYE BAŞKANLIĞI </option>
                                  @endforeach
                              </select>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-3">
                            <label class="text-sm mb-0 text-capitalize font-weight-bold">Belge Tarihi</label>
                          </div>
                          <div class="col-9">
                            <input type="date" name="BelgeTarihi" class="form-control" value="{{ date('Y-m-d') }}">
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-3">
                            <label class="text-sm mb-0 text-capitalize font-weight-bold">İş Türü</label>
                          </div>
                          <div class="col-9">
                            <select class="form-control IsTuru js-example-basic-single2"  name="IsTuru" id="IsTuru" >
                              <option value="1">Özel</option>
                              <option value="2">İhale</option>
                            </select>
                          </div>
                        </div>
                        <hr>
                        <div class="row tender">
                          <div class="col-3">
                            <label class="text-sm mb-0 text-capitalize font-weight-bold">İhale Başlangıç Tarihi</label>
                          </div>
                          <div class="col-3">
                            <input type="date" class="form-control" name="IhaleBaslangicTarihi" value="{{ \Carbon\Carbon::parse($document->IhaleBaslangicTarihi)->format('Y-m-d') }}">
                          </div>
                          <div class="col-3">
                            <label class="text-sm mb-0 text-capitalize font-weight-bold">İhale Bitiş Tarihi</label>
                          </div>
                          <div class="col-3">
                            <input type="date" class="form-control" name="IhaleBitisTarihi" value="{{ \Carbon\Carbon::parse($document->IhaleBitisTarihi)->format('Y-m-d') }}">
                          </div>
                          <hr>
                          <div class="col-3">
                            <label class="text-sm mb-0 text-capitalize font-weight-bold">İhale Numarası</label>
                          </div>
                          <div class="col-9">
                            <input type="text" class="form-control" name="IhaleKayitNo" value="{{ $document->IhaleKayitNo }}" placeholder="İhale Kayıt Numarası">
                          </div>
                        </div>
                      </fieldset>

                      <fieldset>
                        <legend><i class="fas fa-biohazard"></i> Atık Bilgileri</legend>
                        <div class="row">
                          <div class="col-3">
                            <label class="text-sm mb-0 text-capitalize font-weight-bold">Atık Cinsi Seçiniz</label>
                          </div>
                          <div class="col-9">
                            <select class="form-control js-example-basic-single3"  name="AtikCinsiId">
                              @foreach ($Waste as $key => $value)
                                <option value="{{ $value->AtikCinsiId }}">{{ $value->Ad }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-3">
                            <label class="text-sm mb-0 text-capitalize font-weight-bold">Atık Miktarı</label>
                          </div>
                          <div class="col-3">
                            <input type="number" class="form-control" name="TahminiAtikMiktari" value="{{ $document->TahminiAtikMiktari }}" required>
                          </div>
                          <div class="col-3">
                            <label class="text-sm mb-0 text-capitalize font-weight-bold">Birimi</label>
                          </div>
                          <div class="col-3">
                            <select class="form-control js-example-basic-single4" name="AtikBirimiId">
                              <option value="m3">Metreküp</option>
                              <option value="t">Ton</option>
                            </select>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-3">
                            <label class="text-sm mb-0 text-capitalize font-weight-bold">İnşaat Ruhsat No</label>
                          </div>
                          <div class="col-3">
                            <input type="text" class="form-control" name="RuhsatNo" value="{{ $document->RuhsatNo }}" required>
                          </div>
                          <div class="col-3">
                            <label class="text-sm mb-0 text-capitalize font-weight-bold">İnşaat Ruhsat Tarihi</label>
                          </div>
                          <div class="col-3">
                            <input type="date" class="form-control"  name="RuhsatTarihi" value="{{ \Carbon\Carbon::parse($document->RuhsatTarihi)->format('Y-m-d') }}">
                          </div>
                        </div>
                      </fieldset>
                      <hr>
                      {{-- <hr>
                      <div class="row">
                        <div class="col-12">

                          <div class="form-check form-switch ps-0">
                            <input class="form-check-input ms-auto" name="permission" type="checkbox" id="flexSwitchCheckDefault2" checked>
                            <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault2">Revizyon güncellemesi açık.</label>
                          </div>
                        </div>
                      </div>
                      <hr> --}}
                      <div class="row">
                        <div class="col-3">
                          <label class="text-sm mb-0 text-capitalize font-weight-bold">İlçe Seçiniz</label>
                        </div>
                        <div class="col-3">
                          <select name="AtikIlceKodu" id="district" class="form-control">
                            @foreach ($Districts as $key => $value)
                              <option value="{{ $value->IlceKodu }}" @php
                                if ($document->AtikIlceKodu == $value->IlceKodu ) {
                                  echo " selected ";
                                }
                              @endphp>{{ $value->IlceAdi }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="col-3">
                          <label class="text-sm mb-0 text-capitalize font-weight-bold">Mahalle Seçiniz</label>
                        </div>
                        <div class="col-3">
                          <select name="AtikMahalleKodu" id="quarter" class="form-control">
                            @foreach ($Parish as $key => $value)
                              <option value="{{ $value->MahalleKodu }}" @php
                                if ($document->AtikMahalleKodu == $value->MahalleKodu ) {
                                  echo " selected ";
                                }
                              @endphp>{{ $value->MahalleAdi }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-4">
                            <input type="text" class="form-control" name="AtikAda" value="{{ $document->AtikAda }}" placeholder="Ada">
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control" name="AtikParsel" value="{{ $document->AtikParsel }}" placeholder="Parsel">
                        </div>
                        <div class="col-4">
                          <input type="text" class="form-control" name="AtikPafta" value="{{ $document->AtikPafta }}" placeholder="Pafta">
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-6">
                            <textarea name="Aciklama" rows="8" cols="80" placeholder="Açıklama" class="form-control">{{ $document->Aciklama }}</textarea>
                        </div>
                        <div class="col-6">
                          <textarea name="AtikAdres" rows="8" cols="80" placeholder="Adres" class="form-control" required>{{ $document->AtikAdres }}</textarea>

                        </div>
                      </div>
                      <hr>
                      <fieldset>
                        <legend><i class="fas fa-truck"></i>Taşıyıcı Firma Seçiniz</legend>
                        <div class="row">
                          <div class="col-12">
                            <select class="js-example-basic-single5 form-control" name="TasiyiciFirmaId" required>
                              @foreach ($Transporter as $key => $value)
                                <option value="{{ $value->FirmaId }}"> {{ $value->Ad ?? "Silinmiş Veri"}} </option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                      </fieldset>
                      <hr>
                      <fieldset>
                        <legend><i class="fas fa-car"></i> Araç Seçiniz ({{ count($Cars) }})</legend>
                        <div class="row">
                          <div class="col-12">
                            <select class="js-example-basic-multiple form-control" name="AracId[]" multiple="multiple" required>
                              @foreach ($Cars as $key => $value)
                                @php
                                  $yuk =  $value->AzamiYukAgirlik / 1000  ;
                                  $netAgirlik =  $value->NetAgirlik / 1000  ;
                                @endphp
                                <option value="{{ $value->AracId }}">Plaka {{ $value->PlakaNo }} Firma : {{ $value->FirmaAd }} Marka {{ $value->Marka ?? "Tanımlı Değil!" }} Azami Yük Ağırlık : {{ $yuk ?? "Tanımlı Değil!"}}ton Net Ağırlık {{ $netAgirlik ?? "Tanımlı Değil!" }}ton</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                      </fieldset>
                      <hr>
                      <fieldset>
                        <legend><i class="fas fa-file-upload"></i> Ek Dosya Eklenmesi</legend>
                        <div class="row">
                          <div class="col-12">
                            <hr>
                            <input type="file" id="files" name="attachment[]" value="" multiple="multiple" accept="application/pdf" onchange="control()" >
                            <hr>
                          </div>
                        </div>
                      </fieldset>
                      <hr>
                      <fieldset>
                        <legend><i class="fas fa-file"></i> Eklenmiş Dosyalar</legend>
                        <div class="row">
                          <div class="col-12">
                            <table class="form-control table">
                              @foreach ($PDF as $key => $value)
                                <tr>
                                  <td>{{ $key+1 }}</td>
                                  <td>Yüklü Dosya</td>
                                  <td>

                                    <a href="{{ URL::to($value->TamYol)   }}" class="btn btn-link text-dark text-sm mb-0 px-0 ms-4" target="_blank"><i class="fas fa-file-pdf text-lg me-1" aria-hidden="true"></i> PDF </a></td>
                                  <td>{{ \Carbon\Carbon::parse($value->EklenmeTarihi)->format('m/d/Y H:i') }}</td>
                                </tr>
                              @endforeach
                              @if (count($PDF) == 0)
                                Dosya Bulunamadı!
                              @endif
                            </table>
                          </div>
                        </div>
                      </fieldset>
                      <hr>

                    <div class="col-12">
                      @if ($document->BasvuruDurumId == 5)
                        <input type="submit" class="btn btn-primary btn-frm" value="GÜNCELLE">
                      @endif
                      @if ($document->BasvuruDurumId == 1)
                        <label class="btn btn-success"><i class="fa fa-clock"></i> ONAY BEKLENİYOR</label>
                      @endif
                      @if ($document->BasvuruDurumId == 4)
                        <label class="btn btn-danger"><i class="fa fa-times"></i> BU BELGE İPTAL EDİLMİŞTİR</label>
                      @endif
                    </div>
                  </form>
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
  <script src="/assets/panel/js/notify.js"></script>

  <script type="text/javascript">


     $(document).ready(function(){


       $('.js-example-basic-multiple').select2();
       $('.js-example-basic-single').select2(); //ilçe
       $('.js-example-basic-single2').select2(); //İş Türü
       $('.js-example-basic-single3').select2(); // atık
       $('.js-example-basic-single4').select2(); // arık birimi
       $('.js-example-basic-single5').select2(); // Taşıyıcı Firma
       $('.js-example-basic-single6').select2(); //kabul belgesi evrak yükleme


       $(".js-example-basic-single").val("{{ trim($document->IlceBelediyeKodu) }}").trigger("change");
       $(".js-example-basic-single2").val("{{ trim($document->IsTuru) }}").trigger("change");
       $(".js-example-basic-single3").val("{{ trim($document->AtikCinsiId) }}").trigger("change");
       $(".js-example-basic-single4").val("{{ trim($document->AtikBirimiId) }}").trigger("change");
       $(".js-example-basic-single5").val("{{ trim($document->TasiyiciFirmaId) }}").trigger("change");
       $(".js-example-basic-single6").val("{{ trim($document->KabulBelgesiId) }}").trigger("change");


       @php
       $items = array();
       @endphp
       @foreach ( $Vehicle as $key => $value)
       @php
          $items[] = $value->AracId ;
       @endphp
       @endforeach

       $(".js-example-basic-multiple").val([<?=implode("," , $items)?>]).trigger("change");

       @if ($document->IsTuru == 1)
            $(".tender").css("display","none");
       @endif


         $('.IsTuru').change(function(){
           if($('.IsTuru').val() == "1")
           {
             $(".tender").slideUp(300);
           }
           else
           {
             $(".tender").slideDown(300);
           }
         });



         $('#district').change(function(){
            $("#quarter option").remove();
            var id = this.value;
            //console.log("seçim id " + id );
            $.ajax({
               url : '{{ route( 'loadStates' ) }}',
               data: {
                 "_token": "{{ csrf_token() }}",
                 "id": id
                 },
               type: 'post',
               dataType: 'json',
               success: function( result )
               {
                    $.each( result, function(k, v) {
                         $('#quarter').append($('<option>', {value:k, text:v}));
                    });
               },
               error: function(xhr, textStatus, error) {
                    console.log(xhr.responseText);
                    console.log(xhr.statusText);
                    console.log(textStatus);
                    console.log(error);
                }
            });
         });
     });

     $.notify("Evrak Red Edilme Sebebi : {{ $document->BasvuruRetNedeni }}", "error");

     @if (session('message'))
       $.notify("{{ session('message') }}", "success");
     @endif

     function control()
     {
       var anahtar = 0 ;
         Array.from($("#files")[0].files).forEach(file => {

           var extension = /[^.]+$/.exec(file.name);

           if( extension != "pdf")
           {
             anahtar++;
             console.log("izin verilmeyen dosya formatı var");
             $.notify(extension + " dosya formatına izin verilmemektedir", "error");
             $('.btn-frm').hide();

           }
           else {
             // $.notify("Dosyalar destekleniyor", "success");
             if(anahtar == 0 )
             $('.btn-frm').show();
           }

          });

     }

  </script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection
