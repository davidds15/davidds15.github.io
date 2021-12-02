<!-- section menempel pada yield -->
<?php $__env->startSection('tempat_script'); ?>
  
<?php $__env->stopSection(); ?>

<?php $__env->startSection('tempat_konten'); ?> 
<div class="page-title-box">
                        <div class="container-fluid">
                            <div class="row align-items-center">
                            
                                <div class="col-md-8">
                                    <h4 class="page-title mb-1">Dashboard</h4>
                                    <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item active">Welcome to Satelit Service Dashboard</li>
                                    </ol>
                                </div>
                                <div class="col-md-4">
                                    <div class="float-right d-none d-md-block">
                                       
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- end page title end breadcrumb -->

                    <div class="page-content-wrapper">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xl-4">
                                  <div class="card">
                                        <div class="card-body">
                                        <div class="row">
                                                <div class="col-6">
                                                    <h5>Welcome Back !</h5>
                                                    <p class="text-muted">Satelit Service</p>

                                                    <div class="mt-4">
                                                        <a href="/transaksi/create" class="btn btn-primary btn-sm">Mulai transaksi<i class="mdi mdi-arrow-right ml-1"></i></a>
                                                    </div>
                                                </div>

                                                <div class="col-5 ml-auto">
                                                    <div>
                                                        <img src="assets/images/widget-img.png" alt="" class="img-fluid">
                                                    </div>
                                                </div>
                                        </div>
                                        </div>
                                  </div>
                                </div>
                                <div class="col-xl-4">
                                   <div class="card">
                                        <div class="card-body">
                                        <div class="row">
                                                <div class="col-6">
                                                    <h5>Hapus Cart</h5>
                                                    <p class="text-muted">Satelit Service</p>

                                                    <div class="mt-4">
                                                    <a href="/deletecart" class="btn btn-danger btn-sm"
                                            onclick="if(!confirm('are you sure want to delete this ?')) return false;"><i
                                                class="mdi mdi-trash-can"></i></a>
                                                    </div>
                                                </div>

                                                <div class="col-5 ml-auto">
                                                    <div>
                                                        <img src="assets/images/widget-img.png" alt="" class="img-fluid">
                                                    </div>
                                                </div>
                                        </div>
                                        </div>
                                    </div>
                                  </div>

                                </div>
                            
                                
                                 
                            </div>
                              <div class="col-xl-4">
                                   <div class="card">
                                        <div class="card-body">
                                        <div class="row">
                                                <div class="col-6">
                                                    <h5>Cart</h5>
                                                    <p class="text-muted">Satelit Service</p>

                                                    <div class="mt-4">
                                                        <a href="/cart" class="btn btn-primary btn-sm">Cart<i class="mdi mdi-arrow-right ml-1"></i></a>
                                                    </div>
                                                </div>

                                                <div class="col-5 ml-auto">
                                                    <div>
                                                        <img src="assets/images/widget-img.png" alt="" class="img-fluid">
                                                    </div>
                                                </div>
                                        </div>
                                        </div>
                                    </div>
                                  </div>
                            </div>
                           

                            
                            </div>
                          </div>
                        </div>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.xoric', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ProjectKP_v2\resources\views/welcome.blade.php ENDPATH**/ ?>