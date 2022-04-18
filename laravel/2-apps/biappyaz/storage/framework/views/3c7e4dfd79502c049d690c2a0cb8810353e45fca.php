
<?php $__env->startSection('content'); ?>
    <div class="main-content">
      <h2>Files</h2>
    <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="column is-3">
        <div class="box">
        <a href="/test/<?php echo e($file); ?>" title="MyPdf"><?php echo e($file); ?></a>
         
        </div>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Muhtar\Desktop\works\gazibilisim\biappyaz\resources\views/pages/test.blade.php ENDPATH**/ ?>