<?php $__env->startSection('content'); ?>
  <h3 style="text-align:center;">Düğümler</h3>
  <?php if(isset($nodes)): ?>
    <?php $__currentLoopData = $nodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="row nodes-list">
        <div class="col-lg-12 col-md-12 col-sm-12"><?php echo e($item->id); ?></div>
        <?php $__currentLoopData = $edges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($item->id == $item2->source): ?>
        <div class="col-lg-12 col-md-12 col-sm-12 nodes-sub-category"><?php echo e($item2->id); ?></div>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mesto/Documents/works/creativehubs/resources/views/nodes.blade.php ENDPATH**/ ?>