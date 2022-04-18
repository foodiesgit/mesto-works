<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo e(asset('main.css')); ?>">
</head>
<body>
    <header><?php echo $__env->make('adminHeader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></header>
    <div class="admin-container">
        <section class="admin-left">
            <ul>
                <li class="left-menu"><a href="nodes">Düğümler</a></li>
                <li class="left-menu"><a href="addnode">Düğüm Ekleme</a></li>
                <li class="left-menu"><a href="addstyle">Düğüm Biçimlendirme</a></li>
            </ul>
        </section>
        <section  class="admin-right"><?php echo $__env->yieldContent('content'); ?></section>
    </div>
</body>
</html>
<?php /**PATH C:\Users\mfaga\Desktop\Web Site\creativehubs\resources\views/layout.blade.php ENDPATH**/ ?>