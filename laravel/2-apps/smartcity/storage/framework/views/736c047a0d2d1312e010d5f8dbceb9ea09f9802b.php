<?php $__env->startSection('content'); ?>
<div class="admin-container">
  <div class="upload-image-container">
    <div class="wrapper">
      <form id="form" action='' method="post", enctype='multipart/form-data'>
          <?php echo csrf_field(); ?>
          <select style="margin-bottom:50px;" name="maincategory" id="main-category" onchange="getType()" class="upload-image1">
              <option value="projects" selected="projects">Projeler</option>
              <option value="activities">Etkinlikler</option>
          </select>

          <select name="subcategory" id="sub-category" class="upload-image2">

          </select>

          <input id="file" type='file', name='file'/>
          <i class="fa fa-cloud-upload"></i>
          <h3>Dosya Seçiniz</h3>
          <h5>Yada Sürükle Bırak</h5>
        </form>
        <ul id="area"></ul>
        <ul class="uploaded-area"></ul>
    </div>
  </div>
</div>
<script>
  const getType = async () => {
    const result = await fetch('/admin/uploadimage/type', {
        method:'Post',
        headers: {
            Accept: 'application/json',
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN':'<?php echo e(csrf_token()); ?>',
        },
        body:JSON.stringify({
          type:document.getElementById('main-category').value
        })
    })
    const final = await result.json()
    document.getElementById('sub-category').innerHTML = ''
    for(const item of final.result){
      document.getElementById('sub-category').innerHTML += `
      <option value="${item.title}">${item.title}</option>
      `
    }
  }
  getType()

  const fileIcons = (param) => {
    if(param.match(/\.jp?g|png|gif|webp/)){
      return 'png'
    } else if(param.match(/\.zip|rar/)){
      return 'zip'
    } else if(param.match(/\.mp4/)){
      return 'mp4'
    } else {
      return 'doc'
    }
  }

  const form = document.getElementById('form')
  const file = document.getElementById('file')
  let uploadedArea = document.querySelector('.uploaded-area')
  file.addEventListener('change', (e) => {
    if(e.target.files[0]){
      let fileName = e.target.files[0].name
      if(fileName.length >= 12){
        let splitName = fileName.split('.')
        fileName = splitName[0].substring(0, 12) +'... .'+ splitName[1]
      }
      uploadFile(fileName)
    }
  })

  const uploadFile = (param) => {
    let xhr = new XMLHttpRequest();
    xhr.open('POST', '/admin/uploadimage');
    xhr.upload.addEventListener('progress', ({loaded, total}) => {
      let fileLoaded = Math.floor((loaded / total) * 100)
      let fileTotal = Math.floor(total / 1000)
      let fileSize
      (fileTotal < 1024) ? fileSize = fileTotal + 'KB' : fileSize = (loaded / (1024 * 1024)).toFixed(2) + "MB"
      document.getElementById('area').innerHTML = `
        <li class="row">
          <div class="details">
            <i class="fa fa-file-alt"></i>
            <div>${param}</div>
            <div>${fileLoaded} %</div>
          </div>
          <div class="bar">
            <div class="prog" style="width:${fileLoaded}%"></div>
          </div>
        </li>
      `
      if(loaded == total){
          document.getElementById('area').innerHTML = ''
          let uploadedHTML = `
            <li class="upload-end">
              <span class="name">
                <img src="<?php echo e(asset('/images/icons/${fileIcons(param)}.png')); ?>" style="margin-right:10px;"/>
                ${param}
              </span>
              <span class="size">${fileSize}</span>
              <i class="fa fa-check" style="color:#6990f2"></i>
            </li>
          `
          uploadedArea.insertAdjacentHTML('afterbegin', uploadedHTML)
      }
    })
    xhr.send(new FormData(form))
  }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layoutadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mesto/Documents/works/akillikent/resources/views/pages/uploadimage.blade.php ENDPATH**/ ?>