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
                    <form class="needs-validation" action="<?php echo e(route('questions.store', $quiz->id)); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationTooltip01">Subject<span class="text-danger">*</span> </label>
                                    <input type="text"  class="form-control" name="subject"  id="validationTooltip01" placeholder="Subject" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationTooltip01">Level<span class="text-danger">*</span> </label>
                                    <input type="text"  class="form-control" name="level" id="validationTooltip01" placeholder="Level" required value="<?php echo e(old('level')); ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationTooltip01">Line<span class="text-danger">*</span> </label>
                                    <input type="text"  class="form-control" name="line" id="validationTooltip01" placeholder="Line" required value="<?php echo e(old('line')); ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationTooltip01">Image<span class="text-danger">*</span> </label><br>
                                    <input type="file" name="image" id="" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationTooltip01">Question <span class="text-danger">*</span> </label>
                                    <textarea class="form-control" name="question" id="" cols="30" rows="2" style="width: 100%;" required placeholder="Question"><?php echo e(old('question')); ?></textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationTooltip01">A <span class="text-danger">*</span> </label>
                                    <input type="text"  class="form-control" name="A" id="validationTooltip01" placeholder="A" required value="<?php echo e(old('A')); ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationTooltip01">B <span class="text-danger">*</span> </label>
                                    <input type="text"  class="form-control" name="B" id="validationTooltip01" placeholder="B" required value="<?php echo e(old('B')); ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationTooltip01">C <span class="text-danger">*</span> </label>
                                    <input type="text"  class="form-control" name="C" id="validationTooltip01" placeholder="C" value="<?php echo e(old('C')); ?>" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationTooltip01">D <span class="text-danger">*</span> </label>
                                    <input type="text"  class="form-control" name="D" id="validationTooltip01" placeholder="D" value="<?php echo e(old('D')); ?>" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Correct Answer <span class="text-danger">*</span> </label>
                                    <select name="correct_answer" id="" class="form-control">
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                    </select>
                                </div>

                            </div>

                        </div>
                        <div class="d-flex flex-row-reverse">
                            <button type="submit" id="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
      </div>
  </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php /**PATH /home/mesto/Documents/works/quiz/resources/views/admin/questions/create.blade.php ENDPATH**/ ?>