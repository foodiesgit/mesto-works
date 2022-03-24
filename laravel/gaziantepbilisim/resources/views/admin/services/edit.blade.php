@extends('admin.dashboard')
@section('content')
<div id="panel-5" class="panel col-md-12">
  <div  class="custom-toolbar">
      <h2>
          Hizmetler Güncelle
      </h2>
      
  </div>
  <div class="panel-container show">
      <div class="panel-content p-0">
          <form class="needs-validation" action="{{route('services.update',$services->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
              <div class="panel-content">
                  <div class="form-row">
                      <div class="col-md-12 mb-3">
                          <label class="form-label" for="validationTooltip01">Başlık <span class="text-danger">*</span> </label>
                          <input type="text" class="form-control" name="title" value="{{$services->title}}" id="validationTooltip01" placeholder="Başlık" required>
                          <div class="valid-tooltip">
                              Başlık
                          </div>
                      </div>
                      <div class="col-md-12 mb-3">
                        <label class="form-label" for="validationTooltip03">Açıklama <span class="text-danger">*</span></label>
                        <div class="input-group">
                          
                        <textarea name="description" id="" style="width:100%;" rows="3"  class="form-control" required>{{$services->description}}</textarea>
                          <div class="invalid-tooltip">
                          Açıklama
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12 mb-3">
                          <label class="form-label" for="validationTooltip02">İçerik <span class="text-danger">*</span></label>
                          <textarea name="content" id="" style="width:100%;" rows="3"  class="form-control" required>{{$services->content}}</textarea>
                          <div class="valid-tooltip">
                          İçerik
                          </div>
                      </div>
                      <div class="col-md-12 mb-3">
                          <label class="form-label" for="validationTooltip02">Önceki Resim <span class="text-danger">*</span></label><br>
                          <img src="{{asset($services->image)}}" alt="" width="120"><br>
                          <label for="">{{$services->image}}</label>
                      </div>
                      <div class="col-md-12 mb-3">
                        <label class="form-label" for="validationTooltip02">Resim Yükle <span class="text-danger">*</span></label><br>
                        <input type="file"  accept="image/*" name="image" id="file" onchange="loadFile(event)" required>
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
