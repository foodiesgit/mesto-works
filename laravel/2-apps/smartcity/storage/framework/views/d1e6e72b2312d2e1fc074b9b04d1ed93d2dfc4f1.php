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
        <h3><?php echo e($details[0]->title); ?></h3>
        <div class="container-details">
           <!-- Container for the image gallery -->
      <div class="container-images">
          <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="mySlides">
              <div class="numbertext"></div>
              <img src="<?php echo e(asset('uploads/activities/'.$details[0]->title.'/' . $image->getFilename())); ?>" class="demo cursor" style="width:700px;height: 500px;" onclick="currentSlide(1)" alt="The Woods">
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          <!-- Next and previous buttons -->
          <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
          <a class="next" onclick="plusSlides(1)">&#10095;</a>

          <!-- Thumbnail images -->
          <div class="row-slider">
              <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="column">
                      <img src="<?php echo e(asset('uploads/activities/'.$details[0]->title.'/' . $image->getFilename())); ?>" class="demo cursor" style="width:100%" onclick="currentSlide(<?php echo e($loop->index+1); ?>)" alt="The Woods">
                  </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          <?php else: ?>
          <h3><?php echo e($details); ?></h3>
          <?php endif; ?>
      </div>
              <div class="details-text"><?php echo $details[0]->text; ?></div>
           
          </div>
  </div>
<script src="<?php echo e(asset('/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('/js/wow.min.js')); ?>"></script>
<script src="<?php echo e(asset('/js/main.js')); ?>"></script>

<script>
    var slideIndex = 1;
        showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        var captionText = document.getElementById("caption");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
    }
</script>
                        
<section  class="main-content"><?php echo $__env->yieldContent('content'); ?></section>
    <footer  id="rs-footer" class="rs-footer home9-style home12-style"><?php echo $__env->make('/partials.footer1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></footer>
    <?php echo $__env->make('/partials.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>
</html>
<?php /**PATH C:\Users\Administrator\Desktop\Web Site\smartcity\resources\views/pages/activitiesdetails.blade.php ENDPATH**/ ?>