@extends('admin.dashboard')
@section('content')
<div id="panel-5" class="panel col-md-12">
  <div  class="custom-toolbar">
      <h2>
        İletişim Güncelle
      </h2>
  </div>
  <div class="panel-container show">
      <div class="panel-content p-0">
          <form class="needs-validation" action="{{route('contact.update',$contact->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
              <div class="panel-content">
                  <div class="form-row">
                    <div class="col-md-12 mb-3">
                      <label class="form-label" for="validationTooltip03">Posta Adresi <span class="text-danger">*</span></label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroupPrepend2">@</span>
                        </div>
                        <input type="email" class="form-control" name="email" value="{{$contact->email}}" id="validationTooltip03" placeholder="Posta Adresi" aria-describedby="inputGroupPrepend2" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" oninvalid="this.setCustomValidity('Posta Adresi Formata Uygun Degil')" oninput="setCustomValidity('')">
                        <div class="invalid-tooltip">
                        Posta Adresi
                        </div>
                      </div>
                    </div>
                      <div class="col-md-12 mb-3">
                          <label class="form-label" for="validationTooltip01">Telefon <span class="text-danger">*</span> </label>
                          <input type="number"  minlength="10" maxlength="14"  class="form-control" name="phone" value="{{$contact->phone}}" placeholder="Telefon" required>
                          <div class="valid-tooltip">
                          Telefon
                          </div>
                      </div>
                      <div class="col-md-12 mb-3">
                          <label class="form-label" for="validationTooltip02">Şube 1 <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" name="branch1" value="{{$contact->branch1}}" id="validationTooltip02" placeholder="Branch 1" required>
                          <div class="valid-tooltip">
                          Şube 1
                          </div>
                      </div>
                      <div class="col-md-12 mb-3">
                          <label class="form-label" for="validationTooltip02">Şube 2 <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" name="branch2" value="{{$contact->branch2}}" id="validationTooltip02" placeholder="Şube 2" required>
                          <div class="valid-tooltip">
                              Şube 2
                          </div>
                      </div>
                      <div class="col-md-12 mb-3">
                          <label class="form-label" for="validationTooltip02">Harita <span class="text-danger">*</span></label>
                         <textarea name="map" id="" cols="80" rows="10">{{$contact->map}}</textarea>
                          <div class="valid-tooltip">
                          Harita
                          </div>
                      </div>
                     
                  </div>
                  
              </div>
              <div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center">
                  <button class="btn btn-primary ml-auto" type="submit">Kaydet</button>
              </div>
          </form>
          <script>
              (function()
              {
                  'use strict';
                  window.addEventListener('load', function()
                  {
                      var forms = document.getElementsByClassName('needs-validation');
                      var validation = Array.prototype.filter.call(forms, function(form)
                      {
                          form.addEventListener('submit', function(event)
                          {
                              if (form.checkValidity() === false)
                              {
                                  event.preventDefault();
                                  event.stopPropagation();
                              }
                              form.classList.add('was-validated');
                          }, false);
                      });
                  }, false);
              })();

          </script>
      </div>
  </div>
</div>
@stop
