
<?php $__env->startSection('content'); ?> 
    <div class="main-content">
        <div class="container">
            <div style="text-align:center;margin-top:20px;">
                <h2>
                    <span id="contestants-count" class="cl-g">0</span>
                    <span id="contestants-status" class="cl-g">Katılımcı</span>
                </h2>
                
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <nav class="navbar navbar-light justify-content-end filter-con">
                        <div id="filter-1">
                        <select name="" id="filter-box">
                            <option value="Filtre" selected disabled>Filtre</option>
                            <option value="Hepsi">Hepsi</option>
                            <option value="Kazandı">Kazananlar</option>
                            <option value="Kaybetti">Kaybedenler</option>
                            <option value="Geçersiz">Geçersizler</option>
                            <option value="Bekliyor">Bekleyenler</option>
                            <option value="">-----------</option>
                            <option value="1.">Birinciler</option>
                            <option value="2.">İkinciler</option>
                            <option value="3.">Üçüncüler</option>
                        </select>
                        </div>
                    </nav>
                    <table class="table">
                        <thead>
                            <tr class="contestants-column-left">
                                <th scope="col">Ad</th>
                                <th scope="col">Soyad</th>
                                <th scope="col">TC</th>
                                <th scope="col">Durum</th>
                                <th scope="col-lg-4">İşlemler</th>
                            </tr>
                        </thead>
                        <tbody id="contestants-list">
                            
                        </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Muhtar\Desktop\works\laravel-project\biappyaz\resources\views/pages/contestants.blade.php ENDPATH**/ ?>