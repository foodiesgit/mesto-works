<?php $__env->startSection('content'); ?>
<div class="admin-container">
    <div class="row admin-rows">
        <div class="col-lg-12 col-md-12 col-sm-12">
        <form action="/admin/addprojects" method="post"  class="adding-form" enctype="multipart/form-data">
              <?php echo csrf_field(); ?>
              <input type="hidden" name="type" value="Projects">
              <input type="text" name="category" id="ptoject-category" class="adding-text" placeholder="Kategori" required>
              <input type="text" name="title" id="ptoject-title" class="adding-text" placeholder="Başlık" required>
              <textarea name="text" id="" cols="30" rows="1" class="adding-text"  placeholder="Text" required></textarea>
              <label for="project-img" class="adding-file">Dosya Seç</label>
              <input type="file" name="file" id="project-img" required style="display:none;">
              <input type="submit" id="add-project" value="Ekle">
          </form>
          <table class="table admin-table">
              <thead>
                  <tr class="list-column">
                      <th scope="col">Resim</th>
                      <th scope="col">Kategori</th>
                      <th scope="col">Başlık</th>
                      <th scope="col">Text</th>
                   
                      <th scope="col">İşlemler</th>
                  </tr>
              </thead>
              <tbody>
                  <?php if(isset($result)): ?>
                    <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="list-rows">
                            <td scope="col"><img src="<?php echo e(asset('/uploads/projects/'.$item->title.'/'.$item->img)); ?>" alt="" width="60"></td>
                            <td scope="col"><?php echo e($item->category); ?></td>
                            <td scope="col"><?php echo e($item->title); ?></td>
                            <td scope="col"><textarea class="adding-text" cols="30" rows="1"><?php echo e($item->text); ?></textarea></td>
                           
                            <td scope="col"><button class="del-btn-danger" onclick="deleteProject(<?php echo e($item->id); ?>,'<?php echo e($item->title); ?>', event)">Sil</button></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
                  <?php if(isset($msg)): ?>
                        <?php echo e($msg); ?>

                    <?php endif; ?>
              </tbody>
          </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<script>
    //remove project
    const deleteProject = async (id,project, e) => {
        const result = await fetch('/admin/project/delete',{
          method:'POST',
          headers: {
              Accept: 'application/json',
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN':'<?php echo e(csrf_token()); ?>'
          },
          body:JSON.stringify({
            id: id,project:project
          })
        })
        if(result.status === 200){
            e.target.parentNode.parentNode.remove()
        }
    }
</script>

<?php echo $__env->make('layoutadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mesto/Documents/works/smartcity/resources/views/pages/projects.blade.php ENDPATH**/ ?>