<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h3>Edges</h3>
  <?php if(isset($edges)): ?>
    <?php $__currentLoopData = $edges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <li><?php echo e($item->id); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php endif; ?>
  <ul>
    <li></li>
  </ul>
</body>
</html><?php /**PATH C:\Users\Muhtar\Desktop\works\gazibilisim\creativehubs\resources\views/edges.blade.php ENDPATH**/ ?>