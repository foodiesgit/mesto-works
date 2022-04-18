<div id="loader" class="loader">
    <div class="loader-container">
        <div class='loader-icon'>
            <img src="<?php echo e(asset('/images/Logo/Gaziantep bilişim logo.png')); ?>" alt="">
        </div>
    </div>
</div>
<div class="full-width-header header-style2">
    <header id="rs-header" class="rs-header">
        <div class="topbar-area">
            <div class="container">
                <div class="row y-middle">
                    <div class="col-md-6">
                        <ul class="topbar-contact">
                            <li>
                                <i class="flaticon-email"></i>
                                <a href="mailto:info@gaziantepbilisim.com.tr">info@gaziantepbilisim.com.tr</a>
                            </li>
                            <li>
                                <i class="flaticon-call"></i>
                                <a href="tel:03426060643">(0342) 606-06 43</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 login-link">
                        <?php if(session()->has('admin')): ?>
                        <span id="logout" class="auth" onclick="logout()">Çıkış</span>
                        <?php else: ?>
                            <a href="login" id="login" class="auth">
                                Admin Girişi
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div><?php /**PATH C:\Users\Muhtar\Desktop\works\laravel-project\biappyaz\resources\views//partials/header.blade.php ENDPATH**/ ?>