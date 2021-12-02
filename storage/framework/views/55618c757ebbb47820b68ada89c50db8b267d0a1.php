

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
                    <li class="breadcrumb-item active">List Transaksi yang belum lunas</li>
                </ol>
            </div>
            <div class="col-md-8">
                <div class="float-right d-none d-md-block">
                    <!-- <form class="app-search d-none d-lg-block">
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Search..." id="searchInput">
                            <span class="mdi mdi-magnify"></span>
                        </div>
                        <button class="btn btn-light btn-rounded" type="button" id="searchBtn">search
                        </button>
                    </form> -->



                </div>
            </div>
        </div>

    </div>

    <br>
    <?php if(session('status')): ?>
    <div class="alert alert-success">
        <?php echo e(session('status')); ?>

    </div>
    <?php endif; ?>
    <br>
    <?php $total=0; ?>
    <?php if(session('tagih')): ?>
    <?php $__currentLoopData = session()->get('tagih'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $total++ ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <div class="alert alert-danger">
        <a href="<?php echo e(route('transaksi.showlisttagih')); ?>"> total ada <?php echo e($total); ?> pelanggan yang harus ditagih </a>
    </div>
    <!-- <?php $__currentLoopData = session()->get('tagih'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="alert alert-primary">
        Customer : <?php echo e($details['nama']); ?> belum membayar tagihan
    </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> -->
    <?php endif; ?>
</div>

<div class="page-content-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="header-title">List Transaksi</h4>


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

    </div>
</div>

<!-- end page title end breadcrumb -->




<?php $__env->stopSection(); ?>

<?php $__env->startSection('tempat_script'); ?>
<script>
function highlight(element, string, search, originalString) {
    if (search.length > 0) {
        var regex = new RegExp(search, "g");
        newString = string.replace(regex, "<span class='highlight'" + search + "</span>");
        elemen.innerHTML = newString;
    } else {
        element.innerHtml= originalString;
    }

}
var content = $("#content").val();
var searchInput = $("#searchInput").val();
var searchBtn = $("#searchBtn").val();
var originalContent = content.innerText;

$("#searchBtn").click(function () {
    highlight(content,content.innerText,searchInput.value,originalContent);
})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.xoric', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ProjectKP_v2\resources\views/penagihan/penagihan.blade.php ENDPATH**/ ?>