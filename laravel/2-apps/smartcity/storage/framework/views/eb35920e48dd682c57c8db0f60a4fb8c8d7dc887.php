<?php $__env->startSection('content'); ?>

<div class="admin-container">
    <div class="row admin-rows">
        <div class="col-lg-12 col-md-12 col-sm-12">
        <form action="/admin/addbanner" method="post"  class="adding-form" enctype="multipart/form-data">
              <?php echo csrf_field(); ?>
              <input type="hidden" name="type" value="Banner">
              <input type="text" name="title" id="banner-title" class="adding-text" placeholder="Başlık" required>
              <textarea name="text" id="" cols="30" rows="1" name="text" class="adding-text"  placeholder="Text" required></textarea>
              <input type="text" name="link" id="banner-text" class="adding-text" placeholder="Link" required>
              <label for="banner-img" class="adding-file">Dosya Seç</label>
              <input type="file" name="file" id="banner-img" required style="display:none;">
              <input type="submit" id="add-banner" value="Ekle">
          </form>
          <table class="table admin-table">
              <thead>
                  <tr class="list-column">
                      <th scope="col">Resim</th>
                      <th scope="col">Başlık</th>
                      <th scope="col">Text</th>
                      <th scope="col">İşlemler</th>
                  </tr>
              </thead>
              <tbody>
                  <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr class="list-rows">
                          <td scope="col"><img src="<?php echo e(asset('/uploads/banner/'.$item->img)); ?>" alt="" width="60"></td>
                          <td scope="col"><?php echo e($item->title); ?></td>
                          <td scope="col" ><textarea class="adding-text" cols="30" rows="2"><?php echo e($item->text); ?></textarea></td>
                          <td scope="col"><button class="del-btn-danger" onclick="deleteBanner(<?php echo e($item->id); ?>, event)">Sil</button></td>
                      </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
          </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<script>
    //remove category
    const deleteBanner = async (id, e) => {
        const result = await fetch('/admin/banner/delete',{
          method:'POST',
          headers: {
              Accept: 'application/json',
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN':'<?php echo e(csrf_token()); ?>'
          },
          body:JSON.stringify({
            id: id
          })
        })
        if(result.status === 200){
            e.target.parentNode.parentNode.remove()
        }
    }
</script>

<?php echo $__env->make('layoutadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mfaga\Desktop\Web Site\smartcity\resources\views/pages/banner.blade.php ENDPATH**/ ?>