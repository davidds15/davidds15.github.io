

<?php $__env->startSection('tempat_konten'); ?>
<?php $bulan = 0; 
 $curmonth = date('m');
 $tgl = now();
 ?>

<script>
var selected = 1;
</script>
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
                
                                <h4 class="font-size-14" style="color:white;">Custom Filter</h4>
                                <label style="color:white;">Pilih Bulan dan Tahun Pengeluaran</label>
                                <div class="row">
                                    <form method='POST' action="<?php echo e(route('filterLaporan')); ?>">
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
    <br>
    <div class="alert alert-success">
        Jenis Pelayanan yang sering dipesan bulan ini : <b><?php echo e($terbanyak); ?></b> dengan pesananan sebanyak <b><?php echo e($countterbanyak); ?></b> 
    </div>
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

        <div class="card">
            <div class="card-body">

                <h4 class="header-title">Jenis Pelayanan yang paling sering dipesan bulan ini</h4>


                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Nama Pelayanan</th>
                            <th>Total Pemesanan </th>
                            
                        </tr>
                    </thead>
                    <tbody>
                   
                        <?php $__currentLoopData = $listpelayanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pelayanan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       
                        <tr>
                        <?php if($pelayanan['nama_pelayanan'] == ""|| $pelayanan['nama_pelayanan'] == null): ?>
                            <td>-</td>
                        <?php else: ?>
                            <td><?php echo e($pelayanan['nama_pelayanan']); ?></td>
                        <?php endif; ?>
                            <td><?php echo e($pelayanan['count']); ?></td>
                            
                            
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    </tbody>
                    
                </table>
            </div>
        </div>

        <div class="card">
                                        <div class="card-body">
                                            <h5 class="header-title mb-4">Monthy sale Report</h5>
                                            <div class="media">
                                                <div class="media-body">
                                                <div class='row'>
                                                    <p class="text-muted mb-2">&nbsp Pendapatan bulan ini</p> &emsp; &emsp; &emsp; &emsp; &emsp;
                                                    <p class="text-muted mb-2">&nbsp Pengeluaaran bulan ini</p>
                                                </div>
                                                    <div class='row'>
                                                    <h4>&nbsp Rp <?php echo e($total); ?></h4> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;

                                                    
                                                    <h4>&nbsp Rp <?php echo e($total_pengeluaran); ?></h4> 
                                                    </div>
                                                </div>
                                                <div dir="ltr" class="ml-2">
                                                    <input data-plugin="knob" data-width="56" data-height="56" data-linecap=round data-displayInput=false
                                                    data-fgColor="#3051d3" value="100" data-skin="tron" data-angleOffset="56"
                                                    data-readOnly=true data-thickness=".17" />
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>
    </div> <!-- end col -->
</div>

<!-- end page title end breadcrumb -->


<?php $__env->stopSection(); ?>
<?php $__env->startSection('tempat_script'); ?>
<script>
$(document).ready(function() {

   
    $('#datatable-buttons').DataTable();
    // $('.dynamicjadwal').on('change', function(e) {
    //     if ($(this).val() != '') {
    //         var select = $(this).attr('id');
    //         var value = $(this).val();
    //         selected = value;
    //         $('#btnsearch').html("");
    //         var items = "<a href='/Laporan/" + selected + "' id='buttonsearch ' style='color: white;'" +
    //             "class='btn btn-success waves-effect waves-light mr-1'>" +
    //             "search" +
    //             "</a>";
    //         $('#btnsearch').html(items);
    //     }
    //     console.log("test");
    });
    

});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.xoric', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ProjectKP_v2\resources\views/report/index.blade.php ENDPATH**/ ?>