

<?php $__env->startSection('tempat_konten'); ?>

<div class="page-title-box">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h4 class="page-title mb-1">Detail Transaksi</h4>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Detail Transaksi</li>
                </ol>
            </div>
            <div class="col-md-4">
                <div class="float-right d-none d-md-block">

                    <button class="btn btn-light btn-rounded " type="button">
                        <a href="/transaksi">Back</a>

                    </button>


                </div>
            </div>
        </div>

    </div>
    <a href="<?php echo e(route('transaksi.edit',$data[0]->id)); ?>" class="btn btn-warning">
        + Edit Data Transaksi
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
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo e($data[0]->id); ?></td>
                            <td><?php echo e($data[0]->namacustomer); ?></td>
                            <td><?php echo e($data[0]->total); ?></td>
                            <td>
                                <?php if(!empty($data[0]->jenispembayaran)): ?>
                                <?php echo e($data[0]->jenispembayaran); ?>

                                <?php else: ?>
                                Belum Bayar
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if(!empty($data[0]->tanggal)): ?>
                                <?php echo e($data[0]->tanggal); ?>

                                <?php else: ?>
                                Belum Bayar
                                <?php endif; ?>
                            </td>

                            <td>
                                <?php if($data[0]->status == "Lunas"): ?>
                                <div class="badge badge-soft-success"><?php echo e($data[0]->status); ?></div>
                                <?php elseif($data[0]->status == "Belum Bayar"): ?>
                                <div class="badge badge-soft-danger"><?php echo e($data[0]->status); ?></div>
                                <?php else: ?>
                                <div class="badge badge-soft-primary"><?php echo e($data[0]->status); ?> </div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php echo e($data[0]->tanggalpenjadwalan); ?>

                            </td>
                            <td>
                                <?php if($data[0]->status == "Belum Bayar"): ?>
                                <form method='POST' action="<?php echo e(url('Lunas/'.$data[0]->id)); ?>">
                                <?php echo csrf_field(); ?>
                                <input type="submit" value="Lunas" class='btn btn-xs btn-success'
                                onclick="if(!confirm('apakah yakin transaksi sudah lunas ?')) return false;">
                                </form>
                               
                                
                                <?php elseif($data[0]->status == "Dijadwalkan"): ?>
                                
                                <form method='POST' action="<?php echo e(url('Lunas/'.$data[0]->id)); ?>">
                                <?php echo csrf_field(); ?>
                                <input type="submit" value="Lunas" class='btn btn-xs btn-success'
                                onclick="if(!confirm('apakah yakin transaksi sudah lunas ?')) return false;">
                                </form>
                                
                                <form method='POST' action="<?php echo e(url('belumBayar/'.$data[0]->id)); ?>">
                                <?php echo csrf_field(); ?>
                                <input type="submit" value="Belum Bayar" class='btn btn-xs btn-danger'
                                onclick="if(!confirm('apakah yakin proses perbaikan sudah selesai ?')) return false;">
                                </form>
                               
                                
                                
                                <?php else: ?>
                                
                                <a> </a>
                                
                                <?php endif; ?>

                            </td>


                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">



                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Alamat</th>
                            <th>No Telp.</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo e($data_customer[0]->alamatcustomer); ?></td>
                            <td><?php echo e($data_customer[0]->nomortelepon); ?></td>



                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div>
<!-- end page title end breadcrumb -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title">Detail Transaksi</h4>


                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>

                            <th>Nama Pelayanan</th>
                            <th>Deskripsi </th>
                            <th>Pegawai</th>
                            <th>Subtotal</th>

                        </tr>
                    </thead>
                    <tbody> <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($d->namajenispelayanan); ?></td>
                            <td><?php echo e($d->deskripsipelayanan); ?></td>
                            <td><?php echo e($d->namapegawai); ?></td>
                            <td><?php echo e($d->subtotal); ?></td>
                            <td>

                                <!-- <a href="<?php echo e(route('detailTransaksi.edit', $d->id)); ?>" class='btn btn-xs btn-info'>Edit -->
                                </a>
                                <form method='POST' action="<?php echo e(url('detailTransaksi/'.$d->id)); ?>">
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



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.xoric', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ProjectKP_v2\resources\views/transaksi/detailtransaksi.blade.php ENDPATH**/ ?>