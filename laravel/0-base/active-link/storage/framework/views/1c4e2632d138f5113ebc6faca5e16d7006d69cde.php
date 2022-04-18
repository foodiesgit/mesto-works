<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="<?php echo e(asset('main.css')); ?>" rel="stylesheet">
  <title><?php echo $__env->yieldContent('title'); ?></title>
</head>
<body>
  <nav><?php echo $__env->make('./layouts/partials/navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></nav>
  <main>
    <?php echo $__env->yieldContent('content'); ?>
  </main>
</body>
</html><?php /**PATH D:\works\mesto-works\laravel\active-link\resources\views/layouts/master.blade.php ENDPATH**/ ?>