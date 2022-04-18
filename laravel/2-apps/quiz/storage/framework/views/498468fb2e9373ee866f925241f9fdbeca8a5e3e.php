<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> Edit of <?php if(isset($questions)): ?> <?php echo e($questions->question); ?> <?php endif; ?> <?php $__env->endSlot(); ?>
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <?php if(isset($questions)): ?>
                    <form class="needs-validation" action="<?php echo e(route('questions.update', [$questions->quizes_id, $questions->id])); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('put'); ?>
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label" for="validationTooltip01">Subject<span class="text-danger">*</span> </label>
                                        <input type="text"  class="form-control" name="subject" value="<?php echo e($questions->subject); ?>"  id="validationTooltip01" placeholder="Subject" required>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label" for="validationTooltip01">Level<span class="text-danger">*</span> </label>
                                        <input type="text"  class="form-control" name="level" value="<?php echo e($questions->level); ?>" id="validationTooltip01" placeholder="Level" required>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label" for="validationTooltip01">Line<span class="text-danger">*</span> </label>
                                        <input type="text"  class="form-control" name="line" value="<?php echo e($questions->line); ?>" id="validationTooltip01" placeholder="Line" required>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="validationTooltip01">Image<span class="text-danger">*</span> </label>
                                    <img src="<?php echo e(asset($questions->image)); ?>" alt=""  style="width: 100%;max-height:170px;margin-bottom:10px;">
                                    <input type="file" name="image" id="" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationTooltip01">Question <span class="text-danger">*</span> </label>
                                    <textarea class="form-control" name="question" id="" cols="30" rows="2" style="width: 100%;" required placeholder="Question"><?php echo e($questions->question); ?></textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationTooltip01">A <span class="text-danger">*</span> </label>
                                    <input type="text"  class="form-control" name="A" value="<?php echo e($questions->A); ?>" id="validationTooltip01" placeholder="A" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationTooltip01">B <span class="text-danger">*</span> </label>
                                    <input type="text"  class="form-control" name="B" value="<?php echo e($questions->B); ?>" id="validationTooltip01" placeholder="B" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationTooltip01">C <span class="text-danger">*</span> </label>
                                    <input type="text"  class="form-control" name="C" value="<?php echo e($questions->C); ?>" id="validationTooltip01" placeholder="C" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationTooltip01">D <span class="text-danger">*</span> </label>
                                    <input type="text"  class="form-control" name="D" value="<?php echo e($questions->D); ?>" id="validationTooltip01" placeholder="D" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Correct Answer <span class="text-danger">*</span> </label>
                                    <select name="correct_answer" id="" class="form-control">
                                        <option value="A"><?php echo e($questions->A); ?></option>
                                        <option value="B"><?php echo e($questions->B); ?></option>
                                        <option value="C"><?php echo e($questions->C); ?></option>
                                        <option value="D"><?php echo e($questions->D); ?></option>
                                    </select>
                                </div>

                            </div>

                        </div>
                        <div class="d-flex flex-row-reverse">
                            <button type="submit" id="submit" class="btn btn-primary">Update</button>
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
<?php /**PATH /home/mesto/Documents/works/quiz/resources/views/admin/questions/edit.blade.php ENDPATH**/ ?>