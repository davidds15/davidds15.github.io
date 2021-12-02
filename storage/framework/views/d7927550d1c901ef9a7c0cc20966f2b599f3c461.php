

<?php $__env->startSection('tempat_konten'); ?>
<!-- <script>

    $('#datatable').DataTable();
    
   


</script> -->
<div class="page-title-box">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h4 class="page-title mb-1">Transaksi</h4>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Riwayat Transaksi</li>
                </ol>
            </div>
            <div class="col-md-4">
                <div class="float-right d-none d-md-block">
                    <div class="dropdown">
                        <button class="btn btn-light btn-rounded dropdown-toggle" type="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-settings-outline mr-1"></i> Settings
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <a href="<?php echo e(route('transaksi.create')); ?>" class="btn btn-success">
        + Tambah Data Transaksi
    </a>
    <br>
    <?php if(session('status')): ?>
    <div class="alert alert-success">
        <?php echo e(session('status')); ?>

    </div>
    <?php endif; ?>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title">Riwayat Transaksi</h4>


                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
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
                        
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($d->id); ?></td>
                            <td><?php echo e($d->namacustomer); ?></td>
                            <td><?php echo e($d->total); ?></td>
                            <td>
                                <?php if(!empty($d->jenispembayaran)): ?>
                                <?php echo e($d->jenispembayaran); ?>

                                <?php else: ?>
                                Belum Bayar
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if(!empty($d->tanggalbayar)): ?>
                                <?php echo e($d->tanggalbayar); ?>

                                <?php else: ?>
                                Belum Bayar
                                <?php endif; ?>
                            </td>

                            <td>
                                <?php if($d->status == "Lunas"): ?>
                                <div class="badge badge-soft-success"><?php echo e($d->status); ?></div>
                                <?php elseif($d->status == "Belum Bayar"): ?>
                                <div class="badge badge-soft-danger"><?php echo e($d->status); ?></div>
                                <?php else: ?>
                                <div class="badge badge-soft-primary"><?php echo e($d->status); ?></div>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($d->tanggalpenjadwalan); ?></td>
                            <td>
                                
                                <a href="<?php echo e(route('transaksi.show', $d->id)); ?>" class='btn btn-xs btn-info'>Show
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

<!-- end page title end breadcrumb -->




<?php $__env->stopSection(); ?>
<?php $__env->startSection('tempat_script'); ?>
<script>
$(document).ready(function() {
    $('#datatable').DataTable();
    
   

});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.xoric', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ProjectKP_v2\resources\views/transaksi/index.blade.php ENDPATH**/ ?>