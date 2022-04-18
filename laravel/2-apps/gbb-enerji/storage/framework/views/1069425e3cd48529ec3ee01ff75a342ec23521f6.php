
<?php $__env->startSection('content'); ?>
    <section id="services-08" class="services-08 pt-120 pb-120 p-relative" style="background: url(/img/bg/aliment-left.png) no-repeat; background-position: left center;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title center-align mb-50 text-center">
                        <h3><?php echo e($quizInfo[0]->title); ?></h3>
                    </div>
                </div>
            </div>
            <div class="row services-08-item--wrapper mt-0">
                <div class="col-lg-12 col-md-12" style="border: none;">
                    <form action="<?php echo e(route('set-results', $quizInfo[0]->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="card" style="background-color:#f1f8fe;padding:10px;">
                            <?php if($questions): ?>
                                <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="questions-con">
                                    <strong><?php echo e($loop->iteration); ?> - </strong>
                                    <strong><?php echo e($item->question); ?></strong>
                                    <div class="form-check questions-block">
                                        <label>A)</label>
                                        <label class="questions-labels" for="<?php echo e($item->id); ?>1">
                                        <input type="radio" name="<?php echo e($item->id); ?>" id="<?php echo e($item->id); ?>1" value="A" required>
                                        <?php echo e($item->A); ?>

                                        </label>
                                    </div>
                                    <div class="form-check questions-block">
                                        <label>B)</label>
                                        <label class="questions-labels" for="<?php echo e($item->id); ?>2">
                                        <input type="radio" name="<?php echo e($item->id); ?>" id="<?php echo e($item->id); ?>2" value="B" required>
                                            <?php echo e($item->B); ?>

                                        </label>
                                    </div>
                                    <div class="form-check questions-block">
                                        <label>C)</label>
                                        <label class="questions-labels" for="<?php echo e($item->id); ?>3">
                                        <input type="radio" name="<?php echo e($item->id); ?>" id="<?php echo e($item->id); ?>3" value="C" required>
                                            <?php echo e($item->C); ?>

                                        </label>
                                    </div>
                                    <div class="form-check questions-block">
                                        <label>D)</label>
                                        <label class="questions-labels" for="<?php echo e($item->id); ?>4">
                                        <input type="radio" name="<?php echo e($item->id); ?>" id="<?php echo e($item->id); ?>4" value="D" required>
                                            <?php echo e($item->D); ?>

                                        </label>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            <button type="submit" class="btn btn-info btn-sm rounded-pill btn-block" style="display:flex;justify-content:center;align-items:center;max-height:34px;">
                                <span>BİTİR</span>
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\works\application\gbb-enerji\resources\views/frontend/questions.blade.php ENDPATH**/ ?>