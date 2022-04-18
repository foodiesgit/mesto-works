<ul class="nav justify-content-center|justify-content-end">
    <li class="nav-item">
        <a class="nav-link active" href="<?php echo e(route('home')); ?>"><?php echo app('translator')->get('navbar.home'); ?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('aboutus')); ?>"><?php echo app('translator')->get('navbar.aboutus'); ?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('contact')); ?>"><?php echo app('translator')->get('navbar.contact'); ?></a>
    </li>
</ul>
<ul>
    <li><a href="<?php echo e(url('lang/en')); ?>">English</a></li>
    <li><a href="<?php echo e(url('lang/tr')); ?>">Turkish</a></li>
</ul><?php /**PATH D:\works\mesto-works\laravel\localization\resources\views//layouts/partials/navbar.blade.php ENDPATH**/ ?>