<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> Create Quiz <?php $__env->endSlot(); ?>
    <div class="card">
        <div class="card-body">
            <form action="<?php echo e(route('quizes.store')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" required value="<?php echo e(old('title')); ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label><br>
                    <textarea class="form-control" name="description" id="" rows="1" required  style="width: 100%;"><?php echo e(old('description')); ?></textarea>
                </div>
                <div class="mb-3">
                    <select name="state" id="" class="form-control">
                        <option selected disabled>State</option>
                        <option <?php if(old('state') === 'passive'): ?> selected <?php endif; ?> value="passive">Passive</option>
                        <option <?php if(old('state') === 'draft'): ?> selected <?php endif; ?> value="draft">Draft</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Finished_At</label><br>
                    <input type="datetime-local" class="form-control" name="finished_at" value="<?php echo e(old('finished_at')); ?>" required >
                </div>
                <div class="d-flex flex-row-reverse">
                    <button type="submit" id="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
     <?php $__env->slot('js', null, []); ?> 
        <script>
            alert('Test Javascript in x-slot')
        </script>
     <?php $__env->endSlot(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php /**PATH /home/mesto/Documents/works/quiz/resources/views/admin/quizes/create.blade.php ENDPATH**/ ?>