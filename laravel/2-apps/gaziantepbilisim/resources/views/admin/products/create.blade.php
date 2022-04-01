@extends('admin.dashboard')
@section('content')
<div id="panel-5" class="panel col-md-12">
  <div  class="custom-toolbar">
      <h2>
          Ürün Ekle
      </h2>
     
  </div>
  <div class="panel-container show">
      <div class="panel-content p-0">
          <form class="needs-validation" action="{{route('products.store')}}" method="post"  enctype="multipart/form-data">
            @csrf
              <div class="panel-content">
                  <div class="form-row">
                      <div class="col-md-12 mb-3">
                          <label class="form-label" for="validationTooltip01">Başlık <span class="text-danger">*</span> </label>
                          <input type="text" class="form-control" name="title" id="validationTooltip01" placeholder="Başlık" required>
                          <div class="valid-tooltip">
                              Başlık
                          </div>
                      </div>
                      <div class="col-md-12 mb-3">
                        <label class="form-label" for="validationTooltip03">Açıklama <span class="text-danger">*</span></label>
                        <div class="input-group">
                          <textarea name="description" id="" style="width:100%;" rows="3"  class="form-control" required placeholder="Açıklama"></textarea>
                          <div class="invalid-tooltip">
                            Açıklama
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12 mb-3">
                          <label class="form-label" for="validationTooltip02">İçerik <span class="text-danger">*</span></label>
                          <textarea name="content" id="" style="width:100%;" rows="3"  class="form-control" required placeholder="İçerik"></textarea>
                          <div class="valid-tooltip">
                              İçerik
                          </div>
                      </div>
                      <div class="col-md-12 mb-3">
                        <label class="form-label" for="validationTooltip02">Resim Yükle <span class="text-danger">*</span></label><br>
                        <input type="file"  accept="image/*" name="image" id="file" onchange="loadFile(event)" required>
                      </div>
                      <div class="col-md-12 mb-3">
                        <label class="form-label" for="validationTooltip02">Detay Resim Yükle <span class="text-danger">*</span></label><br>
                        <input type="file"  accept="image/*" name="imagedetail" id="file2" onchange="loadFile(event)" required>
                      </div>
                  </div>
                  
              </div>
              <div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center">
                  <button class="btn btn-primary ml-auto" type="submit">Ekle</button>
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
