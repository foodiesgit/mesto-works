<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="register-section pt-100 pb-100">
            <div class="container">
                <div class="register-box">
                    <div class="sec-title text-center mb-30">
                        <h2 class="title mb-10">Giriş Formu</h2>
                    </div>
                    <div class="styled-form">
                        <form action="#" method="post" id="login-form">                               
                            <?php echo csrf_field(); ?>    
                            <div class="row clearfix">                                    
                                <div class="form-group col-lg-12 mb-25">
                                    <input type="text" id="admin" name="name" value="" placeholder="Admin" required>
                                </div>
                            
                                <div class="form-group col-lg-12">
                                    <input type="password" id="password" name="password" value="" placeholder="Şifre" required>
                                </div>
                            </div>
                            <?php if(isset($message)): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo e($message); ?>

                                </div>
                            <?php endif; ?>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 text-center">
                                <button type="submit" id="submit" class="readon register-btn"><span class="txt">Giriş</span></button>
                            </div>
                        </form>
                        <a href="resetpass">Şifrenizi mi unuttunuz?</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Muhtar\Desktop\works\laravel-project\biappyaz\resources\views//pages/login.blade.php ENDPATH**/ ?>