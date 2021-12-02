

<?php $__env->startSection('tempat_konten'); ?>
<style>
.highlight {
    background-color: yellow;
}
</style>
<div class="page-title-box">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h4 class="page-title mb-1">Penagihan</h4>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">List Transaksi yang harus ditagih</li>
                </ol>
            </div>
            <!-- <div class="col-md-8">
                <div class="float-right d-none d-md-block"> -->
                    <!-- <form class="app-search d-none d-lg-block">
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Search..." id="searchInput">
                            <span class="mdi mdi-magnify"></span>
                        </div>
                        <button class="btn btn-light btn-rounded" type="button" id="searchBtn">search
                        </button>
                    </form> -->



                <!-- </div>
            </div> -->
        </div>

    </div>

    <br>
    <?php if(session('status')): ?>
    <div class="alert alert-success">
        <?php echo e(session('status')); ?>

    </div>
    <?php endif; ?>
 
</div>

<div class="page-content-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="header-title">List yang sudah melewati masa bayar</h4>


                        <table id="datatable-buttons content" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Customer</th>
                                    <th>Total</th>
                                    <th>Jenis Pembayaran</th>
                                    <th>Tanggal Pembayaran</th>
                                    <th>Status</th>
                                    <th>Tanggal Pengerjaan</th>
                                    <th>Detail</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = session()->get('tagih'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($details['id']); ?></td>
                                    <td><?php echo e($details['nama']); ?></td>
                                    <td><?php echo e($details['total']); ?></td>
                                    <td>
                                        <?php if(!empty($details['jenispembayaran'])): ?>
                                        <?php echo e($details['jenispembayaran']); ?>

                                        <?php else: ?>
                                        Belum Bayar
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if(!empty($details['tanggalbayar'])): ?>
                                        <?php echo e($details['tanggalbayar']); ?>

                                        <?php else: ?>
                                        Belum Bayar
                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <?php if($details['status'] == "Lunas"): ?>
                                        <div class="badge badge-soft-success"><?php echo e($details['status']); ?></div>
                                        <?php elseif($details['status'] == "Belum Bayar"): ?>
                                        <div class="badge badge-soft-danger"><?php echo e($details['status']); ?></div>
                                        <?php else: ?>
                                        <div class="badge badge-soft-primary"><?php echo e($details['status']); ?></div>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($details['tanggalpenjadwalan']); ?></td>
                                    <td>

                                        <a href="<?php echo e(route('transaksi.show', $details['id'])); ?>" class='btn btn-xs btn-info'>Show
                                            detail</a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>

    </div>
</div>

<!-- end page title end breadcrumb -->




<?php $__env->stopSection(); ?>

<?php $__env->startSection('tempat_script'); ?>
<script>

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.xoric', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ProjectKP_v2\resources\views/penagihan/listharustagih.blade.php ENDPATH**/ ?>