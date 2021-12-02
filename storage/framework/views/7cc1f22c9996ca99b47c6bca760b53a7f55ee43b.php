


<?php $__env->startSection('tempat_konten'); ?> 
<div class="page-title-box">
                        <div class="container-fluid">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h4 class="page-title mb-1">Create Pegawai</h4>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                    <li class="breadcrumb-item active">Form Validation</li>
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
                    </div>
                      <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
            
                                            <h4 class="header-title">insert Pegawai</h4>
                                            
            
                                            <form method="POST" action="<?php echo e(route('jenisPelayanan.store')); ?>">
                                             <?php echo csrf_field(); ?>
            
                                                <div class="form-group">
                                                    <label>Nama Pelayanan</label>
                                                    <div>
                                                        <input type="text" id="nama" class="form-control" required name="nama_pel"
                                                                placeholder="Masukan Nama"/>
                                                    </div>
                                                </div>
                                               
            
                                                <div class="form-group mb-0">
                                                    <div>
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                                            Submit
                                                        </button>
                                                        <button type="reset" class="btn btn-secondary waves-effect">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
            
                                        </div>
                                    </div>
                                </div> <!-- end col -->
            
                            </div> 

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.xoric', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ProjectKP_v2\resources\views/pelayanan/create.blade.php ENDPATH**/ ?>