@extends('panel.layouts.master')
@section('page', 'Anasayfa')
@section('title', 'Yeni Kabul Belgesi Oluşturma / HAFRİYAT')
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
            <div class="col-lg-6">
              <div class="d-flex flex-column h-100">
                <h5 class="font-weight-bolder">Yeni Taşınan Kabul Belgesi</h5>
                <p class="mb-5">Yeni bir taşınan kabul belgesi oluşturma modülü.</p>
                  <form class="" action="{{ route('save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                      <fieldset>
                        <legend><i class="fas fa-file-import"></i> Belge Bilgileri</legend>
                        <div class="row">
                          <div class="col-3">
                            <label class="text-sm mb-0 text-capitalize font-weight-bold">İlçe Belediye Seçiniz</label>
                          </div>
                          <div class="col-9">
                              <select class="form-control js-stuff-basic-single"  name="IlceBelediyeKodu">
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
                            <select class="form-control IsTuru js-stuff-basic-single2"  name="IsTuru" id="IsTuru" >
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
                            <input type="date" class="form-control" name="IhaleBaslangicTarihi" value="{{ date("Y-m-d") }}">
                          </div>
                          <div class="col-3">
                            <label class="text-sm mb-0 text-capitalize font-weight-bold">İhale Bitiş Tarihi</label>
                          </div>
                          <div class="col-3">
                            <input type="date" class="form-control" name="IhaleBitisTarihi" value="{{ date("Y-m-d") }}">
                          </div>
                          <hr>
                          <div class="col-3">
                            <label class="text-sm mb-0 text-capitalize font-weight-bold">İhale Numarası</label>
                          </div>
                          <div class="col-9">
                            <input type="text" class="form-control" name="IhaleKayitNo" value="" placeholder="İhale Kayıt Numarası">
                          </div>
                        </div>
                      </fieldset>

                      <fieldset>
                        <legend><i class="fas fa-truck"></i> Atık Bilgileri</legend>
                        <div class="row">
                          <div class="col-3">
                            <label class="text-sm mb-0 text-capitalize font-weight-bold">Atık Cinsi Seçiniz</label>
                          </div>
                          <div class="col-9">
                            <select class="form-control js-stuff-basic-single3"  name="AtikCinsiId">
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
                            <input type="number" class="form-control" name="TahminiAtikMiktari" value="" required>
                          </div>
                          <div class="col-3">
                            <label class="text-sm mb-0 text-capitalize font-weight-bold">Birimi</label>
                          </div>
                          <div class="col-3">
                            <select class="form-control js-stuff-basic-single4" name="AtikBirimiId">
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
                            <input type="text" class="form-control" name="RuhsatNo" value="" >
                          </div>
                          <div class="col-3">
                            <label class="text-sm mb-0 text-capitalize font-weight-bold">İnşaat Ruhsat Tarihi</label>
                          </div>
                          <div class="col-3">
                            <input type="date" class="form-control"  name="RuhsatTarihi" value="{{ date("Y-m-d") }}">
                          </div>
                        </div>
                      </fieldset>
                      <hr>
                      <div class="row">
                        <div class="col-3">
                          <label class="text-sm mb-0 text-capitalize font-weight-bold">İlçe Seçiniz</label>
                        </div>
                        <div class="col-3">
                          <select name="AtikIlceKodu" id="district" class="form-control js-stuff-basic-single8">
                            @foreach ($Districts as $key => $value)
                              <option value="{{ $value->IlceKodu }}">{{ $value->IlceAdi }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="col-3">
                          <label class="text-sm mb-0 text-capitalize font-weight-bold">Mahalle Seçiniz</label>
                        </div>
                        <div class="col-3">
                          <select name="AtikMahalleKodu" id="quarter" class="form-control js-stuff-basic-single7">
                            @foreach ($Parish as $key => $value)
                              <option value="{{ $value->MahalleKodu }}">{{ $value->MahalleAdi }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-4">
                            <input type="number" class="form-control" name="AtikAda" value="" placeholder="Ada">
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control" name="AtikParsel" value="" placeholder="Parsel">
                        </div>
                        <div class="col-4">
                          <input type="text" class="form-control" name="AtikPafta" value="" placeholder="Pafta">
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-6">
                            <textarea name="Aciklama" rows="8" cols="80" placeholder="Açıklama" class="form-control"></textarea>
                        </div>
                        <div class="col-6">
                          <textarea name="AtikAdres" rows="8" cols="80" placeholder="Adres" class="form-control" required></textarea>

                        </div>
                      </div>
                      <hr>
                      <fieldset>
                        <legend><i class="fas fa-truck"></i>Taşıyıcı Firma Seçiniz</legend>
                        <div class="row">
                          <div class="col-12">
                            <select class="js-stuff-basic-single5 form-control" name="TasiyiciFirmaId">
                              @foreach ($Transporter as $key => $value)
                                <option value="{{ $value->FirmaId }}"> {{ $value->Ad ?? "Silinmiş Veri"}} </option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                      </fieldset>
                      <hr>
                      <fieldset>
                        <legend><i class="fas fa-car"></i> Araç Seçiniz</legend>
                        <div class="row">
                          <div class="col-12">
                            <select class="js-stuff-basic-multiple form-control" name="AracId[]" multiple="multiple" required>
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
                        <legend><i class="fas fa-file-upload"></i> Ek Dosya Eklenmesi <i class="fas fa-file-pdf text-lg me-1" aria-hidden="true"></i> PDF </legend>
                        <div class="row">
                          <div class="col-12">
                            <hr>
                            <input type="file" id="files" name="attachment[]" value="" multiple="multiple" accept="application/pdf" onchange="control()" required>
                            <hr>
                          </div>
                        </div>
                      </fieldset>
                      <hr>
                    <div class="col-12">
                      <input type="submit" class="btn btn-primary btn-frm" value="KAYDET">
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
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2" style="border-radius:0px;">
      <i class="fa fa-truck py-2"> </i> Taşıyıcı Firmalar
    </a>
    <div class="card shadow-lg ">
      <div class="card-header pb-0 pt-3 ">
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <div class="float-start">
          <h5 class="mt-3 mb-0">Taşıyı Firma Araç Oranları</h5>
          <p>Hangi firmanın ne kadar taşıyıcı aracı var burdan inceleyebilirsiniz</p>
        </div>

        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Taşıyıcı Firma Oranları</h6>
        </div>

        <!-- Sidenav Type -->
        <div class="mt-3">
            <canvas id="myChart" width="400" height="400"></canvas>
        </div>

      </div>
    </div>
  </div>
@endsection


@section('script')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="/assets/panel/js/notify.js"></script>
  <script src="sha512-5vwN8yor2fFT9pgPS9p9R7AszYaNn0LkQElTXIsZFCL7ucT8zDCAqlQXDdaqgA1mZP47hdvztBMsIoFxq/FyyQ==" charset="utf-8"></script>

  <script>
  var ctx = document.getElementById('myChart');


  var myChart = new Chart(ctx, {
      type: 'polarArea',
      data: {
        labels: [
          @foreach ($TransporterGraphics as $key => $value)
            '{{ $value->FirmaAd }}',
          @endforeach

        ],
        datasets: [{
          label: 'Firma Araç Oranları',
          data: [@foreach ($TransporterGraphics as $key => $value)
                      {{ $value->Adet }},
                    @endforeach],
          backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(75, 192, 192)',
            'rgb(255, 205, 86)',
            'rgb(201, 203, 207)',
            'rgb(54, 162, 235)',
            'rgb(77, 220, 30)',
            'rgb(54, 0, 235)',
            'rgb(54, 162, 0)',
            'rgb(0, 162, 235)',
            'rgb(255, 105, 186)',

          ]
        }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
  });
  </script>
  <script type="text/javascript">


     $(document).ready(function(){


       $('.js-stuff-basic-multiple').select2();
       $('.js-stuff-basic-single').select2();
       $('.js-stuff-basic-single2').select2();
       $('.js-stuff-basic-single3').select2();
       $('.js-stuff-basic-single4').select2();
       $('.js-stuff-basic-single5').select2();
       $('.js-stuff-basic-single6').select2();
       $('.js-stuff-basic-single7').select2();
       $('.js-stuff-basic-single8').select2();

       $("js-stuff-basic-multiple").select2({
          containerCssClass: function(e) {
            return $(e).attr('required') ? 'required' : '';
          }
       });

       $(".tender").css("display","none");

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

     @if (session('message'))
       $.notify("{{ session('message') }}", "success");
     @endif

     function control()
     {
       // console.log("çalıştı");
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
            {
               $('.btn-frm').show();
            }
           }

          });

     }

  </script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection
