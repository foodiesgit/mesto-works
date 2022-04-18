<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> Questions of <?php if(isset($quiz)): ?> <?php echo e($quiz->title); ?> <?php endif; ?> <?php $__env->endSlot(); ?>
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <?php if(isset($quiz)): ?>
                    <a href="<?php echo e(route('questions.create', $quiz->id)); ?>">
                        <div class="btn btn-primary"><i class="fa fa-plus mr-2"></i>Create Questions</div>
                    </a>
                <?php endif; ?>
            </div>
            <table class="table table-bordered">
            <thead>
                <th>Question</th>
                <th>Image</th>
                <th>Subject</th>
                <th>Level</th>
                <th>Line</th>
                <th>A</th>
                <th>B</th>
                <th>C</th>
                <th>D</th>
                <th>Correct Answer</th>
                <th>Process</th>
            </thead>
            <tbody>
                <?php if(isset($quiz)): ?>
                    <?php $__currentLoopData = $quiz->questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($item->question); ?></td>
                            <td><img src="<?php echo e(asset($item->image)); ?>" alt="" width="48"></td>
                            <td><?php echo e($item->subject); ?></td>
                            <td><?php echo e($item->level); ?></td>
                            <td><?php echo e($item->line); ?></td>
                            <td><?php echo e($item->A); ?></td>
                            <td><?php echo e($item->B); ?></td>
                            <td><?php echo e($item->C); ?></td>
                            <td><?php echo e($item->D); ?></td>
                            <td><?php echo e($item->correct_answer); ?></td>
                            <td class="d-flex justify-content-between btn-group btn">
                                <a href="<?php echo e(route('questions.edit', [$quiz->id, $item->id])); ?>" style="color:#fff;" class="btn btn-success mr-2 waves-effect waves-themed">Edit</a>
                                <form action="<?php echo e(route('questions.destroy', [$quiz->id, $item->id])); ?>" method="post" class="btn btn-danger waves-effect waves-themed">
                                <?php echo method_field('delete'); ?>
                                <?php echo csrf_field(); ?>
                                <button type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </tbody>
          </table>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php /**PATH /home/mesto/Documents/works/quiz/resources/views/admin/questions/index.blade.php ENDPATH**/ ?>