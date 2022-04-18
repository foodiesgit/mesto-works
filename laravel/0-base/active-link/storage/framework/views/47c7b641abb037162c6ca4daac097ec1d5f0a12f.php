<ul>
  <li><a href="<?php echo e(route('index')); ?>" class="<?php echo e(request()->is('home') ? 'active' : null); ?>">Home</a></li>
  <li><a href="<?php echo e(route('aboutus')); ?>" class="<?php echo e(request()->is('aboutus') ? 'active' : null); ?>">Aboutus</a></li>
  <li><a href="<?php echo e(route('contact')); ?>" class="<?php echo e(request()->is('contact') ? 'active' : null); ?>">Contact</a></li>
</ul><?php /**PATH D:\works\mesto-works\laravel\active-link\resources\views///layouts/partials/navbar.blade.php ENDPATH**/ ?>