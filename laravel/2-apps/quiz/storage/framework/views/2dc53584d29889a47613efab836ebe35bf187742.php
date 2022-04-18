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
        <?php if(isset($resultDetails)): ?>
            <?php if(auth()->user()): ?> <?php endif; ?>
            <?php echo e(auth()->user()->name); ?> for <?php echo e($resultDetails->title); ?>

        <?php endif; ?>
     <?php $__env->endSlot(); ?>
    <div class="container">
        <div class="row services-08-item--wrapper mt-0 d-flex justify-content-center">
            <div class="col-lg-8 col-md-8" style="border: none;">
                <ul class="list-group mt-20">
                    Created Date: <?php echo e($resultDetails->created_at); ?>

                    <?php if(isset($resultDetails)): ?>
                        <?php $__currentLoopData = $resultDetails->questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="questions-con">
                                <strong><?php echo e($loop->iteration); ?> - </strong>
                                <strong><?php echo e($item->question); ?></strong>
                                <img src="/<?php echo e($item->image); ?>" alt="<?php echo e($item->image); ?>" style="margin: 10px;width:48px;">
                                <div class="form-check questions-block">
                                    <label>A) <?php echo e($item->A); ?></label>
                                </div>
                                <div class="form-check questions-block">
                                    <label>B) <?php echo e($item->B); ?></label>
                                </div>
                                <div class="form-check questions-block">
                                    <label>C) <?php echo e($item->C); ?></label>
                                </div>
                                <div class="form-check questions-block">
                                    <label>D) <?php echo e($item->D); ?></label>
                                </div>
                                <div class="form-check questions-block">
                                    <label class="questions-labels" style="color:green;">Correct Answer: <?php echo e($item->correct_answer); ?></label>
                                </div>
                                <div class="form-check questions-block">
                                    <?php if($item->correct_answer === $item->userAnswers->answers): ?>
                                        <label class="questions-labels" style="color:green;">
                                            Your Answer: <?php echo e($item->userAnswers->answers); ?>

                                            <i class="fa fa-thumbs-up ml-2 fa-lg"></i>
                                        </label>
                                    <?php else: ?>
                                        <label class="questions-labels" style="color:red;">
                                            Your Answer: <?php echo e($item->userAnswers->answers); ?>

                                            <i class="fa fa-thumbs-down ml-2 fa-lg"></i>
                                        </label>
                                    <?php endif; ?>
                                </div>
                                <div class="form-check questions-block">
                                    <label for="">Percent of Users-Correct-Answers: <?php echo e($item->truePercent); ?></label>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </ul>
                <div class="d-grid gap-2">
                    <a href="<?php echo e(route('quiz.results',$resultDetails->id)); ?>" class="btn btn-primary btn-block">Back</a>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php /**PATH /home/mesto/Documents/works/quiz/resources/views/frontend/result-details.blade.php ENDPATH**/ ?>