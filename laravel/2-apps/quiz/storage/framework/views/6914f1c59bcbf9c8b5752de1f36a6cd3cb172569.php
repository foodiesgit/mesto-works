<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> Quizes <?php $__env->endSlot(); ?>
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <a href="<?php echo e(route('quizes.create')); ?>">
                    <div class="btn btn-primary"><i class="fa fa-plus mr-2"></i>Create Quiz</div>
                </a>
            </div>
            <div class="d-gap mb-2">
                <form method="get">
                    <input type="text" class="form-control" name="title" id=""  placeholder="&#128269;">
                </form>
            </div>
            <table class="table table-bordered">
            <thead>
                <th>Title</th>
                <th class="col col-3">Description</th>
                <th>Questions Count</th>
                <th>State</th>
                <th>Created_At</th>
                <th>Finished_At</th>
                <th>Process</th>
            </thead>
            <tbody>
                <?php if(isset($quizes)): ?>
                    <?php $__currentLoopData = $quizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($item->title); ?></td>
                            <td class="col col-3"><textarea class="form-control" disabled style="width:100%;" rows="1"><?php echo e($item->description); ?></textarea></td>
                            <td><?php echo e($item->questions_count); ?></td>
                            <?php switch($item->state):
                                case ('active'): ?>
                                    <td><span class="badge bg-success"><?php echo e($item->state); ?></span></td>
                                    <?php break; ?>
                                <?php case ('passive'): ?>
                                    <td><span class="badge bg-danger"><?php echo e($item->state); ?></span></td>
                                    <?php break; ?>
                                <?php case ('draft'): ?>
                                    <td><span class="badge bg-warning"><?php echo e($item->state); ?></span></td>
                                    <?php break; ?>
                                <?php default: ?>
                            <?php endswitch; ?>

                            <td><?php echo e($item->created_at->diffForHumans()); ?></td>
                            <td><?php echo e($item->finished_at->diffForHumans()); ?></td>
                            <td class="d-flex justify-content-between btn-group btn">
                                <a href="<?php echo e(route('quizes.show', $item->id)); ?>" style="color:#fff;" class="btn btn-info mr-2 waves-effect waves-themed">Details</a>
                                <a href="<?php echo e(route('questions.index', $item->id)); ?>" style="color:#fff;" class="btn btn-primary mr-2 waves-effect waves-themed">Questions</a>
                                <a href="<?php echo e(route('quizes.edit', $item->id)); ?>" style="color:#fff;" class="btn btn-success mr-2 waves-effect waves-themed">Edit</a>
                                <form action="<?php echo e(route('quizes.destroy', $item->id)); ?>" method="post" class="btn btn-danger waves-effect waves-themed">
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
          <?php echo e($quizes->links()); ?>

        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php /**PATH /home/mesto/Documents/works/quiz/resources/views/admin/quizes/index.blade.php ENDPATH**/ ?>