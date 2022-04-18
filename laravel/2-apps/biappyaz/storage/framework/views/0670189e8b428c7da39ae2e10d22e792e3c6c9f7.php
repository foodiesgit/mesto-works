
<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="service-item wow fadeInUp" data-wow-delay="900ms" data-wow-duration="2000ms">
                            <div class="content-part contest-row">
                            <span class="icon-part"><i class="flaticon-tax"></i></span>
                                <ul>
                                    <li class="contestants-list">
                                        <div class="col-lg-4 col-md-4 col-sm-4 contestants-list-tag">Ad</div>
                                        <div class="col-lg-8 col-md-8 col-sm-8"><?php echo e($contestants[0]->name); ?> </div>
                                    </li>
                                    <li class="contestants-list">
                                        <div class="col-lg-4 col-md-4 col-sm-4 contestants-list-tag">Soyad</div>
                                        <div class="col-lg-8 col-md-8 col-sm-8"><?php echo e($contestants[0]->lastname); ?> </div>
                                    </li>
                                    <li class="contestants-list">
                                        <div class="col-lg-4 col-md-4 col-sm-4 contestants-list-tag">E-Posta</div>
                                        <div class="col-lg-8 col-md-8 col-sm-8"><?php echo e($contestants[0]->email); ?> </div>
                                    </li>
                                    <li class="contestants-list">
                                        <div class="col-lg-4 col-md-4 col-sm-4 contestants-list-tag">Tel</div>
                                        <div class="col-lg-8 col-md-8 col-sm-8"><?php echo e($contestants[0]->phone); ?> </div>
                                    </li>
                                    <li class="contestants-list">
                                        <div class="col-lg-4 col-md-4 col-sm-4 contestants-list-tag">TC</div>
                                        <div class="col-lg-8 col-md-8 col-sm-8"><?php echo e($contestants[0]->identity); ?> </div>
                                    </li>
                                    <li class="contestants-list">
                                        <div class="col-lg-4 col-md-4 col-sm-4 contestants-list-tag">Doğum Tarihi</div>
                                        <div class="col-lg-8 col-md-8 col-sm-8"><?php echo e($contestants[0]->birthdate); ?> </div>
                                    </li>
                                    <li class="contestants-list">
                                        <div class="col-lg-4 col-md-4 col-sm-4 contestants-list-tag">Eğitim Durumu</div>
                                        <div class="col-lg-8 col-md-8 col-sm-8"><?php echo e($contestants[0]->education); ?> </div>
                                    </li>
                                    <li class="contestants-list">
                                        <div class="col-lg-4 col-md-4 col-sm-4 contestants-list-tag">Hakkında</div>
                                        <textarea name="" id="" cols="30" rows="2" readonly class="col-lg-8 col-md-8 col-sm-8 about-text"><?php echo e($contestants[0]->about); ?></textarea>
                                    </li>
                                    <li class="contestants-list">
                                        <div class="col-lg-4 col-md-4 col-sm-4 contestants-list-tag">Durum</div>
                                        <div class="col-lg-8 col-md-8 col-sm-8" id="status"><?php echo e($contestants[0]->status); ?> </div>
                                    </li>
                                    <li class="contestants-list">
                                        <div class="col-lg-4 col-md-4 col-sm-4 contestants-list-tag">Tarih</div>
                                        <div class="col-lg-8 col-md-8 col-sm-8"><?php echo e($contestants[0]->created); ?> </div>
                                    </li>
                                    <li class="contestants-list">
                                        <div class="col-lg-4 col-md-4 col-sm-4 contestants-list-tag">Derece</div>
                                        <div class="col-lg-8 col-md-8 col-sm-8" id="line"><?php echo e($contestants[0]->line); ?> </div>
                                    </li>
                                </ul>
                                <div class="details-footer">
                                <div class="details-footer-left">
                                    <span class="won-1 line" onclick="setLine(<?php echo e($contestants[0]->id); ?>, '1.')">1</span>
                                    <span class="won-2 line" onclick="setLine(<?php echo e($contestants[0]->id); ?>, '2.')">2</span>
                                    <span class="won-3 line" onclick="setLine(<?php echo e($contestants[0]->id); ?>, '3.')">3</span>
                                </div>
                                <div class="details-footer-right">
                                    <i class="fa fa-balance-scale fa-3x cl-y" onclick="setStatus(<?php echo e($contestants[0]->id); ?>, 'Bekliyor')"></i>
                                    <i class="fa fa-ban fa-3x cl-o" onclick="setStatus(<?php echo e($contestants[0]->id); ?>, 'Geçersiz')"></i>
                                    <i class="fa fa-trash fa-3x cl-r" onclick="setStatus(<?php echo e($contestants[0]->id); ?>, 'Kaybetti')"></i>
                                </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="row">
            </div>
            <div class="row mt-5">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="service-item wow fadeInUp" data-wow-delay="900ms" data-wow-duration="2000ms">
                        <h3 style="text-align:center;">Mail Gönder</h3>
                    <form action="<?php echo e(route('email')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                        <label for="exampleFormControlInput1">Konu</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="subject" required>
                        <input type="hidden" name="email" value="<?php echo e($contestants[0]->email); ?>">
                        </div>
                        <div class="form-group">
                        <label for="exampleFormControlTextarea1">Açıklama</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="text" rows="6" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block mb-5">Gönder</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Muhtar\Desktop\works\laravel-project\biappyaz\resources\views/pages/details.blade.php ENDPATH**/ ?>