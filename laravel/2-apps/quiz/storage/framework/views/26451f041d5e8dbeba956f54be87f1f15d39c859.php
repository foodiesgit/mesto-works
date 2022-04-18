<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> Questions of <?php if(isset($quiz)): ?> <?php echo e($quiz->title); ?><?php endif; ?> <?php $__env->endSlot(); ?>
    <div class="mb-2">
        <div class="col-lg-12 col-md-12" style="border: none;">
            <form action="<?php echo e(route('quiz.answers', $quiz->id)); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="card" style="background-color:#f1f8fe;padding:10px;">
                    <?php if(isset($quiz)): ?>
                        <?php $__currentLoopData = $quiz->questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="questions-con">
                                <strong><?php echo e($loop->iteration); ?> - </strong>
                                <strong><?php echo e($item->question); ?></strong>
                                <img src="/<?php echo e($item->image); ?>" alt="<?php echo e($item->image); ?>" style="margin: 10px;width:48px;">
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
                            <hr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    <button type="submit" class="btn btn-primary btn-sm rounded-pill btn-block" style="display:flex;justify-content:center;align-items:center;max-height:34px;">
                        <span>Finish</span>
                    </button>

                </div>
            </form>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php /**PATH /home/mesto/Documents/works/quiz/resources/views/frontend/questions.blade.php ENDPATH**/ ?>