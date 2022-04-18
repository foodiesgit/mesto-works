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
        <script>
            const setAggre = () => {
                if(document.getElementById('submit').hasAttribute('disabled')){
                    document.getElementById('submit').removeAttribute('disabled')
                    document.getElementById('submit').classList.remove('disabled-btn')
                    document.getElementById('submit').classList.add('register-btn')
                } else {
                    document.getElementById('submit').setAttribute('disabled','disabled')
                    document.getElementById('submit').classList.add('disabled-btn')
                    document.getElementById('submit').classList.remove('register-btn')
                }
            }
            const logout = () => {
                $.ajax({
                    url: "/logout",
                    headers:{'X-CSRF-TOKEN':'<?php echo e(csrf_token()); ?>'},
                    type: "DELETE",
                    success: function (data) {
                        window.location.href= "/"
                    }
                })
            }
            const setLine = (id, line) => {
                $.ajax({
                    url: "/details/setline",
                    headers:{'X-CSRF-TOKEN':'<?php echo e(csrf_token()); ?>'},
                    type: "PUT",
                    data: {id: id, line: line},
                    dataType: "json",
                    success: function (data) {
                        document.getElementById('line').innerText = data.line
                        document.getElementById('status').innerText = 'Kazandı'
                    }
                })
            }
            const setStatus = (id, status) => {
                $.ajax({
                    url: "/details/setstatus",
                    headers:{'X-CSRF-TOKEN':'<?php echo e(csrf_token()); ?>'},
                    type: "PUT",
                    data: {id: id, status: status},
                    dataType: "json",
                    success: function (data) {
                        document.getElementById('status').innerText = data.status
                        document.getElementById('line').innerText = null
                    }
                })
            }
            const login = () => {
                const name = document.getElementById('name').value
                const password = document.getElementById('password').value
                $.ajax({
                    url: "/login",
                    headers:{'X-CSRF-TOKEN':'<?php echo e(csrf_token()); ?>'},
                    type: "POST",
                    data: {name: name, password: password},
                    dataType: "json",
                    success: function (data) {
                        if(data === 200){
                            window.location.href = '/contestants'
                        } else {
                            document.getElementById('login-message').classList.remove('login-message-none')
                        }
                    }
                })
            }
            const removeMessage = () => {
                document.getElementById('login-message').classList.add('login-message-none')
            }
        </script>
</body>
</html><?php /**PATH C:\Users\Muhtar\Desktop\works\laravel-project\biappyaz\resources\views/layout.blade.php ENDPATH**/ ?>