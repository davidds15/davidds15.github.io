

<?php $__env->startSection('tempat_konten'); ?>
<style>
.myText {
    color: white;
}
</style>

<div class="page-title-box">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h4 class="page-title mb-1">Create Transaksi</h4>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                    <li class="breadcrumb-item active">Form Validation</li>
                </ol>
                <br>
                <?php if(session('status')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('status')); ?>

                </div>
                <?php endif; ?>
            </div>
            <div class="col-md-4">
                <div class="float-right d-none d-md-block">

                </div>
            </div>
        </div>

    </div>
</div>
<form method="POST" action="<?php echo e(url('transaksi/'.$data[0]->id)); ?>">
    <?php echo csrf_field(); ?>
    <?php echo method_field("PUT"); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Edit Transaksi </h4>

                    <div class="form-group">
                        <label>Jadwal Pelayanan</label>
                        <div>
                            <div class="">
                                <select class="form-control dynamicjadwal" id="jadwal" name="jadwal"
                                    data-dependent1="customer" data-dependent2="pegawai" data-dependent3="alamat">
                                    <option value=''>select Jadwal</option>
                                    <?php $__currentLoopData = $data_jadwal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($data[0]->id_penjadwalan == $s->id): ?>
                                    <option value='<?php echo e($s->id); ?>' selected><?php echo e($s->tanggalpenjadwalan); ?> - <?php echo e($s->namapegawai); ?>

                                        |
                                        customer : <?php echo e($s->namacustomer); ?></option>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <?php $__currentLoopData = $data_jadwal_semua; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <option value='<?php echo e($sm->id); ?>'><?php echo e($sm->tanggalpenjadwalan); ?> - <?php echo e($sm->namapegawai); ?>

                                        |
                                        customer : <?php echo e($sm->namacustomer); ?></option>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </select>
                            </div>
                        </div>
                    </div>
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                        <label>Customer</label>
                        <div>
                            <select class="form-control dynamic" id="customer" name="customer" data-dependent="alamat"
                                disabled>
                                <?php $__currentLoopData = $data_customer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <option value='<?php echo e($c->id_customer); ?>' selected><?php echo e($c->namacustomer); ?></option>

                           
                            </select>
                            <input class="form-control" type="number" value="{$c->id_customer}" id="customer_id" name="customer_id"
                                hidden>     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                        <label>Alamat dan Nomor telepon Pelanggan</label>
                        <div>
                            <select class="form-control" id="alamat" name="alamat">
                            <?php $__currentLoopData = $data_alamat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value='<?php echo e($c->id_detailcustomer); ?>' selected><?php echo e($c->alamatcustomer); ?> - <?php echo e($c->nomortelepon); ?></option>
                            </select>
                            <input class="form-control" type="number" value="<?php echo e($c->id_detailcustomer); ?>" id="alamat_id" name="alamat_id" hidden>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                        <label>Pegawai </label>
                        <div>
                            <select class="form-control" id="pegawai" name="pegawai" disabled>
                            <?php $__currentLoopData = $data_pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($data[0]->id_pegawai == $p->id): ?>
                                <option value='<?php echo e($p->id); ?>' selected><?php echo e($p->namapegawai); ?> </option>
                            </select>
                            <input class="form-control" type="number" value="<?php echo e($c->id); ?>" id="pegawai_id" name="pegawai_id"
                                hidden>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                    <div class="form-group bayar">

                        <label>Jenis Pembayaran</label>
                        <div>
                            <input type="text" id="jenis_bayar" class="form-control" name="jenis_bayar"
                                placeholder="Masukan Jenis Pembayaran" />
                        </div>
                    </div>

                    <div class="form-group bayar">
                        <label>Tanggal Pembayaran</label>
                        <div>
                            <input class="form-control" type="date" value="null" id="tanggal_bayar"
                                name="tanggal_bayar">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Status </label>
                        <div>
                            <select class="form-control" id="Status" name="Status">
                                <option value='Dijadwalkan'>Dijadwalkan</option>
                                <option value='Proses Perbaikan'>Proses Perbaikan</option>
                                <option value='Belum Bayar'>Belum Bayar</option>
                                <option value='Lunas'>Lunas</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <?php $count=0;?>
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $count+=1;?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <h2>Data <?php echo e($count); ?></h2>
                <div class="card-body">
                    <div class="form-group" style="display: none">
                        <label>ID data</label>
                        <div>
                            <input class="form-control" type="number" value="<?php echo e($count); ?>" id="id<?php echo e($d->id_detail); ?>"
                                name="id<?php echo e($d->id_detail); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Jenis Pelayanan</label>
                        <div>
                            <select class="form-control" id="jenis_pel<?php echo e($d->id_detail); ?>"
                                name="jenis_pel<?php echo e($d->id_detail); ?>">
                                <?php $__currentLoopData = $data_pelayanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($d->id_jenispelayanan==$k->id): ?>
                                <option value='<?php echo e($k->id); ?>' selected><?php echo e($k->namajenispelayanan); ?></option>
                                <?php else: ?>
                                <option value='<?php echo e($k->id); ?>'><?php echo e($k->namajenispelayanan); ?></option>
                                <?php endif; ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Pelayanan</label>
                        <div>

                            <textarea class="form-control" id="Deskripsi<?php echo e($d->id_detail); ?>"
                                name="Deskripsi<?php echo e($d->id_detail); ?>"><?php echo e($d->deskripsipelayanan); ?></textarea>
                        </div>
                    </div>



                    <div class="form-group">
                        <label>Subtotal</label>
                        <div>
                            <input class="form-control" type="number" value="<?php echo e($d->subtotal); ?>"
                                id="total<?php echo e($d->id_detail); ?>" name="total<?php echo e($d->id_detail); ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group" style="display: none">
                        <label>total data</label>
                        <div>
                            <input class="form-control" type="number" value="<?php echo e($count); ?>" id="totaldata"
                                name="totaldata">
                        </div>
                    </div>
                    <div class="form-group mb-0">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                Submit
                            </button>
                            <!-- <a href="<?php echo e(url('add-to-cart/')); ?>" class="btn btn-primary" role="button">Add to cart</a>  -->
                            <button type="reset" class="btn btn-secondary waves-effect">
                                <a href="/" class="myText">Cancel</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div>

</form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('tempat_script'); ?>
<script>
$(document).ready(function() {
    // function tambahtransaksi(){
    //     
    //     var items =
    //     "<div class='form-group'>"+
    //     "<label>Jenis Pelayanan</label>"+
    //                     "<div>"+
    //                         "<select class='form-control' id='jenis_pel_' name='jenis_pel_'>"+
    //                             "<?php $__currentLoopData = $data_pelayanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>"+
    //                             "<option value='<?php echo e($k->id); ?>'><?php echo e($k->namajenispelayanan); ?></option>"+
    //                             "<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>"+
    //                         "</select>"+
    //                     "</div>"+
    //                 "</div>"+
    //                 "<div class='form-group'>"+
    //                     "<label>Deskripsi Pelayanan</label>"+
    //                     "<div>"+

    //                         "<textarea class='form-control' value='' id='Deskripsi_' name='Deskripsi_'>"
    //                         "</textarea>"+
    //                     "</div>"+
    //                 "</div>";
        
    //     $('.tambahan').append(items);
    // }
    // $('.dynamicjadwal').change(function() {
    //     if ($(this).val() != '') {
    //         var select = $('.dynamic').attr('id');
    //         var value = $('.dynamic').val();
    //         var dependent = $('#Customer').data('dependent');
    //         var _token = $('input[name="_token"]').val();
    //         $.ajax({
    //             url: "<?php echo e(route('transaksi.alamat')); ?>",
    //             method: "POST",
    //             data: {
    //                 select: select,
    //                 value: value,
    //                 _token: _token,
    //                 dependent: dependent
    //             },
    //             success: function(result) {
    //                 $('#' + dependent).html(result);
    //                 console.log(result);
    //             }
    //         })
    //     }
    // });

    $('.dynamicjadwal').change(function() {
        if ($(this).val() != '') {
            var select = $(this).attr('id');
            var value = $(this).val();
            var dependent1 = $(this).data('dependent1');
            var dependent2 = $(this).data('dependent2');
            var dependent3 = $(this).data('dependent3');
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "<?php echo e(route('transaksi.lockdata')); ?>",
                method: "POST",
                data: {
                    select: select,
                    value: value,
                    _token: _token,
                 
                },
                success: function(result) {
                    var json = $.parseJSON(result);
                    $('#' + dependent1).html(json[0].output);
                     $('#' + dependent2).html(json[1].output);
                     $('#' + dependent3).html(json[2].output);

                     $('#customer_id').html(json[0].hidden);
                     $('#pegawai_id').html(json[1].hidden);
                     $('#alamat_id').html(json[2].hidden);
                    console.log(json[1].output);
                    
                }
            })
        }
    });
    
   

});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.xoric', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ProjectKP_v2\resources\views/transaksi/edit.blade.php ENDPATH**/ ?>