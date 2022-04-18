<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        Results of
        <?php if(isset($quiz)): ?>
            <?php if(auth()->user()): ?> <?php endif; ?>
            <?php echo e(auth()->user()->name); ?> for <?php echo e($quiz->title); ?>

        <?php endif; ?>
     <?php $__env->endSlot(); ?>
    <div class="container">
        <div class="row services-08-item--wrapper mt-0 d-flex justify-content-center">
            <div class="col-lg-8 col-md-8" style="border: none;">
                <ul class="list-group mt-20">
                    <?php if(isset($quiz)): ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Questions Count  <span class="badge bg-info" style="min-width: 100px;font-size:14px;"><?php echo e($quiz->questions_count); ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Correct Count  <span class="badge bg-success" style="min-width: 100px;font-size:14px;"><?php echo e($quiz->userResults->correct_count); ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Wrong Count  <span class="badge bg-danger" style="min-width: 100px;font-size:14px;"><?php echo e($quiz->userResults->wrong_count); ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Score  <span class="badge bg-secondary" style="min-width: 100px;font-size:14px;"><?php echo e($quiz->userResults->score); ?></span>
                        </li>
                    <?php endif; ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="<?php echo e(route('quiz.result.details',$quiz->id)); ?>" class="btn btn-primary btn-block">Details</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php /**PATH /home/mesto/Documents/works/quiz/resources/views/frontend/results.blade.php ENDPATH**/ ?>