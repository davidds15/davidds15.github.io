

<?php $__env->startSection('tempat_konten'); ?>
<?php
$tgl = now();
?>
<div class="page-title-box">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h4 class="page-title mb-1">Pengeluaran</h4>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Riwayat Pengeluaran</li>
                </ol>
            </div>
            <div class="col-md-4">
                <div class="float-right d-none d-md-block">
              
                                <h4 class="font-size-14" style="color:white;">Custom Filter</h4>
                                <label style="color:white;">Pilih Bulan dan Tahun Pengeluaran</label>
                                <div class="row">
                                    <form method='POST' action="<?php echo e(route('FiltertanggalPengeluaran')); ?>">
                                        <?php echo csrf_field(); ?>
                                        <div class="">
                                            <input class="form-control" type="date" value="<?php echo $tgl?>" id="Tanggal"
                                                name="Tanggal">
                                        </div>

                                        <div id="btnsearch">
                                            <input type="submit" value="Search" id="buttonsearch" style="color:white;"
                                                class="btn btn-success waves-effect waves-light mr-1">

                                        </div>
                                    </form>
                                </div>
                            </div>
                
            </div>
        </div>

    </div>
    <a href="<?php echo e(route('pengeluaran.create')); ?>" class="btn btn-success">
        + Tambah Data Pengeluaran
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
                            <th>Tanggal</th>
                            <th>Pengeluaran</th>
                            <th>Keterangan</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($d->id); ?></td>
                            <td><?php echo e($d->tanggal); ?></td>
                            <td><?php echo e($d->jumlah); ?></td>
                            <td><?php echo e($d->keterangan); ?></td>
                            <td>

                                <a href="<?php echo e(route('pengeluaran.edit', $d->id)); ?>" class='btn btn-xs btn-info'>Edit
                                </a>
                                <form method='POST' action="<?php echo e(url('pengeluaran/'.$d->id)); ?>">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <input type="submit" value="Delete" class='btn btn-xs btn-danger'
                                        onclick="if(!confirm('are you sure to delete this record ?')) return false;">
                                </form>
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
<?php echo $__env->make('layout.xoric', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ProjectKP_v2\resources\views/pengeluaran/index.blade.php ENDPATH**/ ?>