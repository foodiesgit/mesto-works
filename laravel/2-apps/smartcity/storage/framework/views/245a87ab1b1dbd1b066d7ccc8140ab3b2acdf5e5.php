<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $__env->make('/partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body class="defult-home" id="default-home">
    <div id="scrollUp" class="green-color">
        <i class="fa fa-angle-up"></i>
    </div>

    <header><?php echo $__env->make('/partials.adminHeader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></header>
    <div class="admin-page" id="admin-page">
        <section class="admin-left" id="admin-left"><?php echo $__env->make('/partials.adminMenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></section>
        <section  class="admin-right"><?php echo $__env->yieldContent('content'); ?></section>
    </div>
    <script>
        const hrefArray = document.location.href.split('/')
        if(hrefArray[hrefArray.length - 2] === 'admin'){
            document.getElementById(hrefArray[hrefArray.length - 1]).classList.add('active-list')
        }
        document.getElementById('admin-left').addEventListener('click', (e) => {
            document.getElementById('admin-left').style.display = 'none'
        })
    </script>
    <?php echo $__env->make('/partials.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH C:\Users\Administrator\Desktop\Web Site\smartcity\resources\views/layoutadmin.blade.php ENDPATH**/ ?>