<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $__env->make('/partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body class="defult-home">
    <div id="loader" class="loader green-color">
        <div class="loader-container">
            <div class='loader-icon'>
                <img src="<?php echo e(asset('/images/aklogo.png')); ?>" alt="">
            </div>
        </div>
    </div>
    <div id="scrollUp" class="green-color">
        <i class="fa fa-angle-up"></i>
    </div>

    <header><?php echo $__env->make('/partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></header>
    <section  class="main-content"><?php echo $__env->yieldContent('content'); ?></section>
    <footer  id="rs-footer" class="rs-footer home9-style home12-style"><?php echo $__env->make('/partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></footer>
    <?php echo $__env->make('/partials.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html><?php /**PATH C:\Users\Administrator\Desktop\Web Site\smartcity\resources\views/layout.blade.php ENDPATH**/ ?>