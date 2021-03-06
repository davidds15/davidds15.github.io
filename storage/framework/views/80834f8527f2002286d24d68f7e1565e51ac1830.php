<?php $__env->startSection('tempat_konten'); ?>
<style>
.mybut {
    width: 150%;
}
</style>
<?php $bulan = 0; 
 $curmonth = date('m');
$tgl =now();
 ?>

<script>
var selected = 1;
</script>
<div class="modal fade " id="modal_tambah_Jadwal" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content myDiv">

            <div class="modal-header">
                <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button> -->
                <h4 class="modal-title">
                    Tambah Jadwal
                </h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo e(route('penjadwalan.store')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label>Pegawai </label>
                        <div>
                            <select class="form-control" id="pegawai" name="pegawai">
                                <?php $__currentLoopData = $data_pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value='<?php echo e($k->id); ?>''><?php echo e($k->namapegawai); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Customer</label>
                                                        <div>
                                                        <select class="form-control" id="customer" name="customer">
                                                            <?php $__currentLoopData = $data_cust; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value=' <?php echo e($k->customer->id); ?>'>
                                    <?php echo e($k->customer->namacustomer); ?> - <?php echo e($k->detailcustomer->nomortelepon); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Servis</label>
                        <div>
                            <input class="form-control" type="date" value="<?php echo $tgl?>" id="Tanggal" name="Tanggal">
                        </div>
                    </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            </div>

            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>




<!-- Page-Title -->
<div class="page-title-box">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-12">
                <h4 class="page-title mb-1">Penjadwalan</h4>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Xoric</a></li>
                    <li class="breadcrumb-item active">Penjadwalan</li>

                </ol>

            </div>
            <div class="">
                <div class="float-right d-none d-md-block">



                    <button class="btn btn-light btn-rounded mybut" type="button" aria-haspopup="true"
                        aria-expanded="false">
                        <a href="<?php echo e(url('/listJadwal')); ?>">
                            Lihat Jadwal
                        </a>
                    </button>


                </div>
            </div>
        </div>
        <br>
        <!-- <?php if(session('status')): ?>
        <div class="alert alert-success">
            <?php echo e(session('status')); ?>

        </div>
        <?php endif; ?> -->

    </div>
</div>
<!-- end page title end breadcrumb -->

<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class=" col-lg-2 col-md-4">
                                <h4 class="font-size-14">Tambah Penjadwalan</h4>
                                <a href="#modal_tambah_Jadwal" class="btn btn-primary" data-toggle="modal">
                                    + Tambah Data Penjadwalan
                                </a>
  
                                <div id='external-events'>
                                    <!-- <h4 class="font-size-14">Draggable Events</h4>
                                                        <div class='fc-event'>My Event 1</div>
                                                        <div class='fc-event'>My Event 2</div>
                                                        <div class='fc-event'>My Event 3</div>
                                                        <div class='fc-event'>My Event 4</div>
                                                        <div class='fc-event'>My Event 5</div> -->
                                </div>

                                <!-- checkbox -->
                                <!-- <div class="custom-control custom-checkbox mt-3"> -->
                                <!-- <input type="checkbox" class="custom-control-input" id="drop-remove" data-parsley-multiple="groups" data-parsley-mincheck="2"> -->
                                <!-- <label class="custom-control-label" for="drop-remove">Remove after drop</label> -->
                            </div>
                            <div class="col-lg-7 col-md-5">
                                <h4 class="font-size-14"></h4> <br>
                                <a href="<?php echo e(url('/penjadwalan')); ?>" class="btn btn-primary">
                                    Hari ini
                                </a>
                            </div>
                            <div class="form-group col-lg-3 col-md-3 filter">
                                <h4 class="font-size-14">Custom Filter</h4>
                                <label>Pilih Tanggal Jadwal Pelayanan</label>
                                <div class="row">
                                    <form method='POST' action="<?php echo e(route('Filtertanggal')); ?>">
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
                        <br>
    <?php if(session('status')): ?>
    <div class="alert alert-success">
        <?php echo e(session('status')); ?>

    </div>
    <?php elseif(session('error')): ?>
    <div class="alert alert-danger">
        <?php echo e(session('error')); ?>

    </div>
    <?php endif; ?>

                        <!-- <div id='calendar' class="col-xl-10 col-lg-9 col-md-8 mt-4 mt-md-0"> -->

                        <!-- </div> -->
                        <br>
                        <div class="row">
                            <div class="col-xl-2 col-lg-3 col-md-4">
                                <a href="<?php echo e(url('/pengerjaankemarin')); ?>" class="btn btn-warning">
                                    Kemarin
                                </a>
                                <a href="<?php echo e(url('/pengerjaanbesok')); ?>" class="btn btn-success">
                                    Besok
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="header-title">Pengerjaan ( <?php echo e($tgl); ?>)</h4>


                                        <table id="datatable-buttons"
                                            class="table table-striped table-bordered dt-responsive nowrap"
                                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>

                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nama Customer</th>
                                                    <th>Nama Pegawai</th>
                                                    <th>Nomor Telepon Pegawai</th>
                                                    <th>Tanggal Servis</th>
                                                    <th>Alamat Customer</th>
                                                    <th>Nomor Telepon Customer</th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                                <?php $__currentLoopData = $datapengerjaan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data => $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($d['id']); ?></td>
                                                    <td><?php echo e($d['nama_customer']); ?></td>
                                                    <td><?php echo e($d['nama_pegawai']); ?></td>
                                                    <td>

                                                        <?php echo e($d['nomortelepon_pegawai']); ?>

                                                    </td>
                                                    <td>

                                                        <?php echo e($d['tanggalservis']); ?>


                                                    </td>
                                                    <td><?php echo e($d['alamat']); ?></td>
                                                    <td>
                                                        <?php echo e($d['nomor_customer']); ?>


                                                    </td>
                                                    <td>

                                                       
                                                        <form method='POST' action="<?php echo e(url('penjadwalan/'.$d['id'])); ?>">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('DELETE'); ?>
                                                            <input type="submit" value="Delete"
                                                                class='btn btn-xs btn-danger'
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

                    </div>
                    <!-- end row -->

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

</div>
<!-- end container-fluid -->

<!-- End Page-content -->


<!-- <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                2020 ?? Xoric.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-right d-none d-sm-block">
                                    Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div> -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('tempat_script'); ?>
<script>
$(document).ready(function() {

    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        timeZone: 'UTC',
        initialView: 'dayGridMonth',
        events: '',
        editable: true,
        selectable: true
    });

    calendar.render();

    //   $('.buttonsearch').change(function(){
    //         if($(this).val()!='')
    //         {
    //             var select = $(this).attr('id');
    //             var value = $(this).val();
    //             var dependent = $(this).data('dependent');
    //             var _token = $('input[name="_token"]').val();
    //             $.ajax({
    //                 url:"<?php echo e(route('transaksi.alamat')); ?>",
    //                 method:"POST",
    //                 data:{select:select , value:value,_token:_token,dependent:dependent},
    //                 success:function(result)
    //                 {
    //                     $('#'+dependent).html(result);
    //                     console.log(result);
    //                 }
    //             })
    //         }
    //     });


});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.xoric', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ProjectKP-master\resources\views/penjadwalan/index.blade.php ENDPATH**/ ?>