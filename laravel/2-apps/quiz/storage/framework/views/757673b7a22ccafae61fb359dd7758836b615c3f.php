<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> Dashboard <?php $__env->endSlot(); ?>
    <div class="mb-2">
        <div class="card-group gap-2">
            <?php $__currentLoopData = $quizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('join.quiz', $item->id)); ?>" style="color: #444; text-decoration:none;">
                    <div class="card">
                        <img src="/uploads/Subject 1/1.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo e($item->title); ?></h5>
                            <p><?php echo e($item->description); ?></p>
                            <ul>
                                <li><span>Question Count: <?php echo e($item->questions_count); ?></span></li>
                                <li><span>Joiner Count: <?php echo e($item->details['joinerCount']); ?></span></li>
                                <li><span>Avarage Score: <?php echo e($item->details['avarage']); ?></span></li>
                                <li><span>Your Rank: <?php echo e($item->rank); ?></span></li>
                            </ul>
                            <p class="card-text"><small class="text-muted"><?php echo e($item->finished_at->diffForHumans()); ?></small></p>
                            <a href="<?php echo e(route('join.quiz', $item->id)); ?>" class="btn btn-primary">Join</a>
                        </div>
                    </div>
                </a>
                <?php echo e($quizes); ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php /**PATH /home/mesto/Documents/works/quiz/resources/views/dashboard.blade.php ENDPATH**/ ?>