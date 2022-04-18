
<?php $__env->startSection('content'); ?> 
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <nav class="navbar navbar-light bg-light justify-content-end">
                        <div id="filter-1">
                        <select name="" id="">
                            <option value="Filtre" selected disabled>Filtre</option>
                            <option value="hepsi">Hepsi</option>
                            <option value="Kazandı">Kazananlar</option>
                            <option value="Kaybetti">Kaybedenler</option>
                            <option value="Geçersiz">Geçersizler</option>
                            <option value="Bekliyor">Bekleyenler</option>
                            <option value="">-----------</option>
                            <option value="1">Birinciler</option>
                            <option value="2">İkinciler</option>
                            <option value="3">Üçüncüler</option>
                        </select>
                        </div>
                    </nav>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Ad</th>
                                <th scope="col">Soyad</th>
                                <th scope="col">Eğitim Durumu</th>
                                <th scope="col">Durum</th>
                                <th scope="col-lg-4">İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $contestants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($item->name); ?></td>
                                    <td><?php echo e($item->lastname); ?></td>
                                    <td><?php echo e($item->education); ?></td>
                                    <td><?php echo e($item->status); ?></td>
                                    <td class="col-lg-1"><div class="btn btn-primary"><a  href="<?php echo e(url('details', ['id' => $item->id])); ?>" style="color:#fff;">Detaylar</a></div></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Muhtar\Desktop\works\laravel-project\biappyaz\resources\views//pages/contestants.blade.php ENDPATH**/ ?>