<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $__env->make('partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
    <div><?php echo $__env->make('/partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>

    <div class="home-style5"><?php echo $__env->yieldContent('content'); ?></div>

    <div id="rs-footer" class="rs-footer"><?php echo $__env->make('/partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>

    <div id="scrollUp" class="orange-color">
        <i class="fa fa-angle-up"></i>
    </div>


    <!-- script side -->
        <script src="<?php echo e(asset('/js/jquery.min.js')); ?>"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
        <script src="<?php echo e(asset('/js/bootstrap.min.js')); ?>"></script>
        <script src="<?php echo e(asset('/js/wow.min.js')); ?>"></script>
        <script src="<?php echo e(asset('/js/jquery.counterup.min.js')); ?>"></script>        
        <script src="<?php echo e(asset('/js/waypoints.min.js')); ?>"></script>
        <script src="<?php echo e(asset('/js/main.js')); ?>"></script>
</body>
</html><?php /**PATH /home/mesto/Documents/works/biappyaz/resources/views/layout.blade.php ENDPATH**/ ?>