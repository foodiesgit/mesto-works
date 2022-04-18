<!DOCTYPE html>
<html lang="tr">
    <head>
        <?php echo $__env->make('/partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </head>
    <body>
        <nav>
            <?php echo $__env->make('/partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </nav>
        <?php echo $__env->yieldContent('content'); ?>
        <footer class="footer-bg footer-p">
            <?php echo $__env->make('/partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </footer>
        <?php echo $__env->make('/partials.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </body>
</html>
<?php /**PATH D:\works\application\gbb-enerji\resources\views/welcome.blade.php ENDPATH**/ ?>