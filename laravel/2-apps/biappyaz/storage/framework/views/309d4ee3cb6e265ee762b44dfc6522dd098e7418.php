
<?php $__env->startSection('content'); ?>
    <div class="main-content">
      <div class="container" style="padding:50px 0;">
        <h2>
            <span id="contestants-status" class="cl-g">Katılımcı Dosyaları</span>
        </h2>
        <div class="row">
          <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-12 col-md-12 col-sm-12">
              <a href="/downloadfile/<?php echo e($file); ?>" title="<?php echo e($file); ?>" style="display:flex;flex-direction:column;">
                <span>
                  <img src="<?php echo e(asset('/images/zip.png')); ?>" alt="">
                  <span><?php echo e($file); ?></span>
                </span>
                <span class="download-btn">İndir</span>
              </a>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </div> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Muhtar\Desktop\works\gazibilisim\biappyaz\resources\views/pages/contestantsfiles.blade.php ENDPATH**/ ?>