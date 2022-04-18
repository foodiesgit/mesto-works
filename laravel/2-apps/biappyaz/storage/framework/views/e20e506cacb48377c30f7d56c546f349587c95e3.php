
<?php $__env->startSection('content'); ?>
    <div class="container mt-5 mb-5" style="max-width: 500px">
    <h3 class="file-upload-title">Dosya Yükleme</h3>
        <form id="fileUploadForm" method="POST" action="/fileupload" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <input id="file" name="file" type="file" accept=".zip, .rar" class="form-control" style="height:44px;">
            </div>

            <div class="form-group">
                <input type="submit" id="submit-btn" value="Yükle" class="btn btn-primary btn-block">
            </div>

            <div class="form-group">
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                </div>
            </div>
        </form>
        <div id="done" class="alert alert-primary" role="alert">
            Kaydınız başarıyla tamamlanmıştır!
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Muhtar\Desktop\works\gazibilisim\biappyaz\resources\views/pages/fileupload.blade.php ENDPATH**/ ?>