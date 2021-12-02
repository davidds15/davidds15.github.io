

<?php $__env->startSection('tempat_konten'); ?>
<style>
.myText {
    color: white;

}
</style>

<script>
   var count = 0;
    
    function tambahtransaksi(){
        count++;
       $('#jumlahtambahan').val(count);
        var countbaru = count;
        var items =
        
        "<div class='form-group transaksi"+countbaru+"'>"+
        "<label>Jenis Pelayanan "+countbaru+"</label>"+
                        "<div>"+
                            "<select class='form-control' id='jenis_pel_"+countbaru+"' name='jenis_pel_"+countbaru+"'>"+
                                "<?php $__currentLoopData = $data_pelayanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>"+
                                "<option value='<?php echo e($k->id); ?>'><?php echo e($k->namajenispelayanan); ?></option>"+
                                "<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>"+
                            "</select>"+
                        "</div>"+
                    "</div>"+
                    "<div class='form-group transaksi"+countbaru+"'>"+
                        "<label>Deskripsi Pelayanan "+countbaru+"</label>"+
                        "<div>"+

                            "<textarea class='form-control' value='' id='Deskripsi_"+countbaru+"' name='Deskripsi_"+countbaru+"'>"
                            "</textarea>"+
                        "</div>"+
                    "</div>";
        
        $('.tambahan').append(items);
    }
    function deletetransaksi(){
        $("div").remove(".transaksi"+count);
        if(count > 0)
        {
            count--;
        }
      
       $('#jumlahtambahan').val(count);     
       
    }



</script>

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
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title">insert Transaksi Baru</h4>

         
                <form method="POST" action="<?php echo e(route('transaksi.store')); ?>">
                <?php echo csrf_field(); ?>
                     <div class="form-group">
                        <label>Jadwal Pelayanan</label>                    
                        <div>
                            <div class="">
                                <select class="form-control dynamicjadwal" id="jadwal" name="jadwal"  data-dependent1="customer"  data-dependent2="pegawai" data-dependent3="alamat">
                                <option value=''>select Jadwal</option>    
                                <?php $__currentLoopData = $data_jadwal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value='<?php echo e($s->id); ?>'><?php echo e($s->tanggalpenjadwalan); ?> - <?php echo e($s->namapegawai); ?> |
                                        customer : <?php echo e($s->namacustomer); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                        <label>Customer</label>               
                        <div>
                            <select class="form-control dynamic" id="customer" name="customer" data-dependent="alamat" disabled>
                             <option value=''>select Jadwal</option>
                            </select>
                            <input class="form-control" type="number" value="0" id="customer_id" name="customer_id" hidden>
                        </div>
                    </div>

                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                        <label>Alamat dan Nomor telepon Pelanggan</label>
                        <div>
                            <select class="form-control" id="alamat" name="alamat">
                                <option value=''>select name</option>
                            </select>
                            <input class="form-control" type="number" value="0" id="alamat_id" name="alamat_id" hidden>
                        </div>
                    </div>
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                        <label>Pegawai </label>
                        <div>
                            <select class="form-control" id="pegawai" name="pegawai" disabled>
                                <option value=''>select Jadwal</option>
                            </select>
                            <input class="form-control" type="number" value="0" id="pegawai_id" name="pegawai_id" hidden>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Jenis Pelayanan</label>
                        <div>
                            <select class="form-control" id="jenis_pel_0" name="jenis_pel_0">
                                <?php $__currentLoopData = $data_pelayanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value='<?php echo e($k->id); ?>'><?php echo e($k->namajenispelayanan); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Pelayanan</label>
                        <div>

                            <textarea class="form-control" value="" id="Deskripsi_0" name="Deskripsi_0"></textarea>
                        </div>
                    </div>
                
                    <!-- untuk tambah transaksi -->
                    <div class="form-group tambahan">
                        
                    </div>


                
                    <a onClick='tambahtransaksi()' id="buttontambah" style="color:white;" class="btn btn-success waves-effect waves-light mr-1">
                                + tambah transaksi
</a>   
<a onClick='deletetransaksi()' id="buttondelete" style="color:white;" class="btn btn-danger waves-effect waves-light mr-1">
                                - delete transaksi
</a>   
                
                    <div class="form-group">
                            
                            <div>
                                <input class="form-control " type="text" value="0" id="jumlahtambahan"
                                    name="jumlahtambahan" hidden>

                            </div>
                        </div>

                    <div class="form-group">
                        <label>Total Pembayaran</label>
                        <div>
                            <input class="form-control" type="number" value="0" id="total" name="total">
                        </div>
                    </div>
                    <div class="form-group mb-0">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                Submit
                            </button>
                          
                            <button type="reset" class="btn btn-secondary waves-effect">
                                <a href="/" class="myText">Cancel</a>
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div> <!-- end col -->

</div>

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
<?php echo $__env->make('layout.xoric', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ProjectKP_v2\resources\views/transaksi/create.blade.php ENDPATH**/ ?>