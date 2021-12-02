

<?php $__env->startSection('tempat_konten'); ?>

<div class="page-title-box">
                        <div class="container-fluid">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h4 class="page-title mb-1">Pegawai</h4>
                                    <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item active">Insert Pegawai</li>
                                    </ol>
                                </div>
                                <div class="col-md-4">
                                    <div class="float-right d-none d-md-block">
                                        <div class="dropdown">
                                            <button class="btn btn-light btn-rounded dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                        <a href="<?php echo e(route('pegawai.create')); ?>" class="btn btn-success">
                      
                    + Tambah Data Pegawai
                    </a>
                    <br>
                      <?php if(session('status')): ?>
                      <br>
                      <div class="alert alert-success">
                        <?php echo e(session('status')); ?>

                      </div>
                      <?php endif; ?>
                    </div>
                
                    <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
            
                                            <h4 class="header-title">List Customer</h4>
                                          
            
                                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                              <tr>
                                                <th>ID</th>
                                                <th>Nama Pegawai</th>
                                                <th>Nomor Telepon</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <tr>
                                                <td><?php echo e($d->id); ?></td>
                                                <td><?php echo e($d->namapegawai); ?></td>
                                                <td><?php echo e($d->nomortelepon); ?></td>
                                                <td>
                                                  <a href="<?php echo e(url('pegawai/'.$d->id.'/edit')); ?>" class='btn btn-xs btn-info'>edit</a>
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

<?php $__env->startSection('tempat_css'); ?>
<link href="<?php echo e(asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
<link href="<?php echo e(asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />     

<?php $__env->stopSection(); ?>

<?php $__env->startSection('tempat_js'); ?>
        <script src="<?php echo e(asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')); ?>')}}"></script>
        <script src="<?php echo e(asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
        <!-- Buttons examples -->
        <script src="<?php echo e(asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/jszip/jszip.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/pdfmake/build/pdfmake.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/pdfmake/build/vfs_fonts.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js')); ?>"></script>
        <!-- Responsive examples -->
        <script src="<?php echo e(asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')); ?>"></script>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.xoric', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ProjectKP_v2\resources\views/pegawai/index.blade.php ENDPATH**/ ?>