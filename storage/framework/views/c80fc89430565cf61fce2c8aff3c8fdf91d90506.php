

<?php $__env->startSection('tempat_konten'); ?> 
<div class="page-title-box">
                        <div class="container-fluid">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h4 class="page-title mb-1">Create Customer</h4>
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
            
                                            <h4 class="header-title">insert Customer</h4>
                                            
            
                                            <form method="POST" action="<?php echo e(url('customer/'.$data->id)); ?>">
                                              <?php echo csrf_field(); ?>
                                              <?php echo method_field("PUT"); ?>
            
                                                <div class="form-group">
                                                    <label>Nama</label>
                                                    <div>
                                                        <input type="text"  value="<?php echo e($data->namacustomer); ?>" id="nama_cus" class="form-control" required name="nama_cus"
                                                                placeholder="Masukan Nama"/>
                                                    </div>
                                                </div>
            
                                                <div class="form-group">
                                                    <label>Alamat</label>
                                                    <div>
                                                        <input type="text" value="<?php echo e($id_detail->alamatcustomer); ?>" id="alamat_cus" class="form-control" required name="alamat_cus"
                                                                parsley-type="alamat" placeholder="Masukan Alamat"/>
                                                    </div>
                                                </div>
                                          
                                                <div class="form-group">
                                                    <label>Nomor Telepon</label>
                                                    <div>
                                                        <input data-parsley-type="number" type="text" id="nomor_cus" value="<?php echo e($id_detail->nomortelepon); ?>" name="nomor_cus"
                                                                class="form-control" required
                                                                placeholder="Masukan nomer Telepon"/>
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




<?php echo $__env->make('layout.xoric', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ProjectKP_v2\resources\views/customer/edit.blade.php ENDPATH**/ ?>