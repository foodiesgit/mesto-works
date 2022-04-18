<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gaziantep Akıllı Kent</title>
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/bootstrap.min.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/main.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/responsive.css')); ?>">
</head>
<body  class="defult-home">
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
<div class="full-width-header header-style1 home1-modifiy home12-modifiy">
    <header id="rs-header" class="rs-header">
        <div class="topbar-area home11-topbar">
            <div class="container">
                <div class="row y-middle">
                    <div class="col-md-5">
                        <ul class="topbar-contact">
                            <li>
                                <i class="flaticon-email"></i>
                                <a href="mailto:akillikentgaziantep@gmail.com">akillikentgaziantep@gmail.com</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-7 text-right">
                        <ul class="toolbar-sl-share">
                            <li class="opening"> <i class="flaticon-location"></i> İncili Pınar, 36017. Sk., 27090 Şehitkamil/Gaziantep </li>
                            <li class="header-social"><a href="https://facebook.com/akillikentgbb" target="_blank"><img src="<?php echo e(asset('/images/facebook.png')); ?>" class="social-media"></img></a></li>
                            <li class="header-social"><a href="https://instagram.com/akillikentgbb" target="_blank"><img src="<?php echo e(asset('/images/instagram.png')); ?>" class="social-media"></img></a></li>
                            <li class="header-social"><a href="https://twitter.com/akillikentgbb" target="_blank"><img src="<?php echo e(asset('/images/twitter.png')); ?>" class="social-media"></img></a></li>
                            <li class="header-social"><a href="https://linkedin.com/in/akillikentgbb" target="_blank"><img src="<?php echo e(asset('/images/linkedin.png')); ?>" class="social-media"></img></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>
<div class="details-container">
  <?php if(isset($details[0]->title)): ?>
    <div class="container">
      <h3><?php echo e($details[0]->title); ?></h3>
      <div class="details-link-con"><a href="<?php echo e(url($details[0]->link)); ?>" class="details-link">Siteye Git</a></div>
      <p><?php echo e($details[0]->text); ?></p>
      <div class="row">
          <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="details-images-con">
                <img src="<?php echo e(asset('uploads/activities/'.$details[0]->title.'/' . $image->getFilename())); ?>" class="details-images">
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
  <?php else: ?>
    <h3><?php echo e($details); ?></h3>
  <?php endif; ?>
</div>
<script src="<?php echo e(asset('/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('/js/wow.min.js')); ?>"></script>
<script src="<?php echo e(asset('/js/main.js')); ?>"></script>

</body>
</html>
<?php /**PATH /home/mesto/Documents/works/akillikent/resources/views/pages/activitiesdetails.blade.php ENDPATH**/ ?>