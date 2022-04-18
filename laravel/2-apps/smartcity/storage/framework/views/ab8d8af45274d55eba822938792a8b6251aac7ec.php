<?php $__env->startSection('content'); ?>
<div class="admin-container">
    <div class="row admin-rows">
        <div class="col-lg-12 col-md-12 col-sm-12">
        <form action="" method="post"  class="adding-form" enctype="multipart/form-data">
              <?php echo csrf_field(); ?>
              <input type="hidden" name="type" id="category" value="categories">
              <input type="text" name="category" id="categories-title" class="adding-text" placeholder="Kategori" required>
              <label for="project-img" class="adding-file">Dosya Seç</label>
              <input type="file" name="file" id="project-img" required style="display:none;">
              <input type="submit" id="add-category" value="Ekle" style="margin-right: 10px">
            </form>
            <table class="table admin-table">
                <thead>
                    <tr class="list-column">
                        <th scope="col">Resim</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Tarih</th>
                        <th scope="col">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="list-rows">
                        <td scope="col"><img src="<?php echo e(asset('/uploads/categories/'.$item->category.'/'.$item->img)); ?>" alt="" width="60;"></td>
                        <td scope="col"><?php echo e($item->category); ?></td>
                        <td scope="col"><?php echo e($item->date); ?></td>
                        <td scope="col">
                            <button class="del-btn-danger" onclick="deleteCategory(<?php echo e($item->id); ?>, '<?php echo e($item->category); ?>', event)">Sil</button>
                            <a href="<?php echo e(url('/admin/categories/edit/'.$item->category)); ?>" class="del-btn-warning" id="edit-category">Düzenle</a>
                        </td>
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
    const deleteCategory = async (id,category, e) => {
        const result = await fetch('/admin/categories/delete',{
          method:'POST',
          headers: {
              Accept: 'application/json',
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN':'<?php echo e(csrf_token()); ?>'
          },
          body:JSON.stringify({
            id: id,category:category
          })
        })
        if(result.status === 200){
            e.target.parentNode.parentNode.remove()
        }
    }
</script>

<?php echo $__env->make('layoutadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Administrator\Desktop\Web Site\smartcity\resources\views/pages/categories.blade.php ENDPATH**/ ?>