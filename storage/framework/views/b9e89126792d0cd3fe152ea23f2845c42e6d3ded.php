<!DOCTYPE html>
<html lang="en">
<head>

     <title>Satelit Servis - Landing Page</title>
<!-- 
Hydro Template 
http://www.templatemo.com/tm-509-hydro
-->
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="<?php echo e(asset('frontend/css/bootstrap.min.css')); ?>">
     <link rel="stylesheet" href="<?php echo e(asset('frontend/css/magnific-popup.css')); ?>">
     <link rel="stylesheet" href="<?php echo e(asset('frontend/css/font-awesome.min.css')); ?>">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="<?php echo e(asset('frontend/css/templatemo-style.css')); ?>">
</head>
<body>

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">
               <span class="spinner-rotate"></span>
          </div>
     </section>


     <!-- MENU -->
     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">

               <div class="navbar-header">


                    <!-- lOGO TEXT HERE -->
               <div class="row"><a href="#" class="navbar-brand"> <img src="<?php echo e(asset('frontend/images/logo satelit kecil.png')); ?>" width="40"  height="20" class="img-responsive" alt="">&nbsp;
                    Satelit Service</a>
               </div>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="#home" class="smoothScroll">Home</a></li>
                         <li><a href="#about" class="smoothScroll">About</a></li>
                         <li><a href="#blog" class="smoothScroll">Our Service</a></li>
                         <li><a href="#work" class="smoothScroll">Our Product</a></li>
                         <li><a href="#contact" class="smoothScroll">Contacts</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="https://api.whatsapp.com/send?phone=628155004798"><i class="fa fa-whatsapp fa-2x"></i></a></li>
                         <!-- <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
                         <li><a href="#"><i class="fa fa-whatsapp"></i></a></li> -->
                         <li class="section-btn"><a href="<?php echo e(route('login')); ?>" data-target="#modal-form">Sign in</a></li>
                    </ul>
               </div>

          </div>
     </section>


     <!-- HOME -->
     <section id="home" data-stellar-background-ratio="0.5">
          <div class="overlay"></div>
          <div class="container">
               <div class="row">

               <div class="col-md-6 col-sm-12">
                         <div class="home-info">
                              <h1>Welcome to Satelit Servis</h1>
                              <a href="https://api.whatsapp.com/send?phone=628155004798" class="btn section-btn smoothScroll"><i class="fa fa-whatsapp fa-lg"></i>&nbsp;Contact Us On Whatsapp</a>
                              <span>
                                   CALL US / Whatsapp (+62) 81-55-00-4798
                                   <small>For Any Information or Booking Service</small>
                              </span>
                         </div>
                    </div>

                    <div class="col-md-6 col-sm-12">
                         <div class="home-video">
                              <div class="embed-responsive embed-responsive-16by9">
                                   <iframe src="" frameborder="0" allowfullscreen></iframe>
                              </div>
                         </div>
                    </div>
                    
               </div>
          </div>
     </section>


     <!-- ABOUT -->
     <section id="about" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-5 col-sm-6">
                         <div class="about-info">
                              <div class="section-title">
                                   <h2>Let Us Introduce</h2>
                                   <span class="line-bar">...</span>
                              </div>
                              <p>Satelite Serivce adalah penyedia jasa perbaikan dan servis Air Conditioner (AC), kulkas, pompa air.</p>
                              <p>Berlokasi di Surabaya dan telah berdiri sejak 2008.</p>
                         </div>
                    </div>

                    <div class="col-md-4 col-md-4">
                         <div class="about-info skill-thumb">

                              <strong>Cuci AC</strong>
                                   <span class="pull-right">&#11088; &#11088; &#11088; &#11088; &#11088;</span>
                                   <br>
                              <strong>Servis AC</strong>
                                   <span class="pull-right">&#11088; &#11088; &#11088; &#11088; &#11088;</span>

                              <strong>Bongkar Pasang AC</strong>
                                   <span class="pull-right">&#11088; &#11088; &#11088; &#11088; &#11088;</span>
   

                              <strong>Perbaikan Kulkas</strong>
                                   <span class="pull-right">&#11088; &#11088; &#11088; &#11088; &#11088;</span>


                              

                         </div>
                    </div>

                    <div class="col-md-3 col-sm-12">
                         <div class="about-image">
                              <img  src="<?php echo e(asset('frontend/images/logo satelit.png')); ?>" class="img-responsive" alt="">
                              <br>
                         </div>
                         <br>
                    </div>
                    
               </div>
          </div>
     </section>


     <!-- BLOG -->
     <section id="blog" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-12 col-sm-12">
                         <div class="section-title">
                              <h2>Our Service</h2>
                              <span class="line-bar">...</span>
                         </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                         <!-- BLOG THUMB -->
                         <div class="media blog-thumb">
                              <div class="media-object media-left">
                                   <a href="#"><img src="<?php echo e(asset('frontend/images/cuci AC.jpg')); ?>" class="img-responsive" alt=""></a>
                              </div>
                              <div class="media-body blog-info">
                                   <small><i class="fa fa-clock-o"></i>Best Seller &#11088;</small>
                                   <h3><a href="#">Jasa Cuci AC</a></h3>
                                   <p>Estimasi Rp. 50.000</p>
                                   <a href="#" class="btn section-btn">More Info</a>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                         <!-- BLOG THUMB -->
                         <div class="media blog-thumb">
                              <div class="media-object media-left">
                                   <a href="#"><img src="<?php echo e(asset('frontend/images/isi freon.jpg')); ?>" class="img-responsive" alt=""></a>
                              </div>
                              <div class="media-body blog-info">
                                   <small><i class="fa fa-clock-o"></i>Best Seller &#11088;</small>
                                   <h3><a href="#">Jasa Isi Freon AC</a></h3>
                                   <p>Estimasi Rp. 100.000</p>
                                   <a href="#" class="btn section-btn">More Info</a>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                         <!-- BLOG THUMB -->
                         <div class="media blog-thumb">
                              <div class="media-object media-left">
                                   <a href="#"><img src="<?php echo e(asset('frontend/images/bongkar AC.jpeg')); ?>" class="img-responsive" alt=""></a>
                              </div>
                              <div class="media-body blog-info">
                                   <small><i class="fa fa-clock-o"></i>Best Seller &#11088;</small>
                                   <h3><a href="#">Jasa Bongkar AC</a></h3>
                                   <p>Estimasi Rp. 80.000</p>
                                   <a href="#" class="btn section-btn">More Info</a>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                         <!-- BLOG THUMB -->
                         <div class="media blog-thumb">
                              <div class="media-object media-left">
                                   <a href="#"><img src="<?php echo e(asset('frontend/images/ganti pipa.jpg')); ?>" class="img-responsive" alt=""></a>
                              </div>
                              <div class="media-body blog-info">
                                   <small><i class="fa fa-clock-o"></i>Best Seller &#11088;</small>
                                   <h3><a href="#">Jasa Tambah dan Pasang Pipa AC</a></h3>
                                   <p>Estimasi Pipa Rp. 50.000 / Meter</p>
                                   <p> Jasa Pasang Rp. 20.000 </p>
                                   <a href="#" class="btn section-btn">More Info</a>
                              </div>
                         </div>
                    </div>
                    
               </div>
          </div>
     </section>


     <!-- WORK -->
     <section id="work" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-12 col-sm-12">
                         <div class="section-title">
                              <h2>Our Product</h2>
                              <span class="line-bar">...</span>
                         </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                         <!-- WORK THUMB -->
                         <div class="work-thumb">
                              <a href="<?php echo e(asset('frontend/images/AC Changhong.jpg')); ?>" class="image-popup">
                                   <img src="<?php echo e(asset('frontend/images/AC Changhong.jpg')); ?>" class="img-responsive" alt="Work">

                                   <div class="work-info">
                                        <h3>Air Conditioner</h3>
                                        <small>Changhong</small>
                                   </div>
                              </a>
                         </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                         <!-- WORK THUMB -->
                         <div class="work-thumb">
                              <a href="<?php echo e(asset('frontend/images/kulkas panasonic.png')); ?>" class="image-popup">
                                   <img src="<?php echo e(asset('frontend/images/kulkas panasonic.png')); ?>" class="img-responsive" alt="Work">

                                   <div class="work-info">
                                        <h3>Kulkas</h3>
                                        <small>Panasonic</small>
                                   </div>
                              </a>
                         </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                         <!-- WORK THUMB -->
                         <div class="work-thumb">
                              <a href="<?php echo e(asset('frontend/images/outdoor daikin.jpg')); ?>" class="image-popup">
                                   <img src="<?php echo e(asset('frontend/images/outdoor daikin.jpg')); ?>" class="img-responsive" alt="Work">

                                   <div class="work-info">
                                        <h3>Outdoor AC</h3>
                                        <small>Daikin</small>
                                   </div>
                              </a>
                         </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                         <!-- WORK THUMB -->
                         <div class="work-thumb">
                              <a href="<?php echo e(asset('frontend/images/pipa AC.jpg')); ?>" class="image-popup">
                                   <img src="<?php echo e(asset('frontend/images/pipa AC.jpg')); ?>" class="img-responsive" alt="Work">

                                   <div class="work-info">
                                        <h3>Pipa AC</h3>
                                        <small>Tateyama</small>
                                   </div>
                              </a>
                         </div>
                    </div>

               </div>
          </div>
     </section>

     <!-- CONTACT -->
     <section id="contact" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-12 col-sm-12">
                         <div class="section-title">
                              <h2>Contact us</h2>
                              <span class="line-bar">...</span>
                         </div>
                    </div>

                    <div class="col-md-8 col-sm-8">
                        
                         <!-- CONTACT FORM HERE -->
                         <form id="contact-form" role="form" action="#" method="post">
                              <div class="col-md-6 col-sm-6">
                                   <input type="text" class="form-control" placeholder="Full Name" id="cf-name" name="cf-name" required="">
                              </div>

                              <div class="col-md-6 col-sm-6">
                                   <input type="email" class="form-control" placeholder="Your Email" id="cf-email" name="cf-email" required="">
                              </div>

                              <div class="col-md-6 col-sm-6">
                                   <input type="tel" class="form-control" placeholder="Your Phone" id="cf-number" name="cf-number" required="">
                              </div>

                              <div class="col-md-6 col-sm-6">
                                   <select class="form-control" id="cf-budgets" name="cf-budgets">
                                        <option>Budget Level</option>
                                        <option>$500 to $1,000</option>
                                        <option>$1,000 to $2,200</option>
                                        <option>$2,200 to $4,500</option>
                                        <option>$4,500 to $7,500</option>
                                        <option>$7,500 to $12,000</option>
                                        <option>$12,000 or more</option>
                                   </select>
                              </div>

                              <div class="col-md-12 col-sm-12">
                                   <textarea class="form-control" rows="6" placeholder="Your requirements" id="cf-message" name="cf-message" required=""></textarea>
                              </div>

                              <div class="col-md-4 col-sm-12">
                                   <input type="submit" class="form-control" name="submit" value="Send Message">
                              </div>

                         </form>
                    </div>

                    <div class="col-md-4 col-sm-4">
                         <div class="google-map">
	<!-- How to change your own map point
            1. Go to Google Maps
            2. Click on your location point
            3. Click "Share" and choose "Embed map" tab
            4. Copy only URL and paste it within the src="" field below
	-->
     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.9280109106126!2d112.78542381539143!3d-7.2490339732216045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7f9eb4447565b%3A0x80ca82d24a74d8ab!2sLb.%20Tim.%20IX%20No.2%2C%20Gading%2C%20Kec.%20Tambaksari%2C%20Kota%20SBY%2C%20Jawa%20Timur%2060134!5e0!3m2!1sid!2sid!4v1635434976310!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                         </div>
                    </div>

               </div>
          </div>
     </section>


     <!-- FOOTER -->
     <footer data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-5 col-sm-12">
                         <div class="footer-thumb footer-info"> 
                              <h2>Satelite Service</h2>
                              <p>Jasa perbaikan dan service air conditioner (AC), Pompa, Kulkas. <br> Area Surabaya, Sidoarjo dan sekitarnya. <br> Buka dari 2008.</p>
                         </div>
                    </div>

                    <div class="col-md-2 col-sm-4"> 
                         <div class="footer-thumb"> 
                              <h2>Dashboard</h2>
                              <ul class="footer-link">
                              <li><a href="#about" class="smoothScroll">About</a></li>
                              <li><a href="#blog" class="smoothScroll">Our Service</a></li>
                              <li><a href="#work" class="smoothScroll">Our Product</a></li>
                              <li><a href="#contact" class="smoothScroll">Contacts</a></li>
                              </ul>
                         </div>
                    </div>

                    <div class="col-md-2 col-sm-4"> 
                         <div class="footer-thumb"> 
                              <h2>Service</h2>
                              <ul class="footer-link">
                                   <li>Cuci AC</li>
                                   <li>Bongkar Pasang AC</li>
                                   <li>Tambah Freon</li>
                              </ul>
                         </div>
                    </div>

                    <div class="col-md-3 col-sm-4"> 
                         <div class="footer-thumb"> 
                              <h2>Find us</h2>
                              <p>Satelite Service AC</p>
                              <p>Jl. Lebak Timur 9/2 , <br> Surabaya, Jawa Timur, 60134</p>
                              <p>Phone / Whatsapp : 08155004798</p>
                              <p>Mail : satelit.service.sby@gmail.com</p>
                         </div>
                    </div>                    

                    <div class="col-md-12 col-sm-12">
                         <div class="footer-bottom">
                              <div class="col-md-6 col-sm-5">
                                   <div class="copyright-text"> 
                                        <p>Copyright &copy; 2021 Satelite Service</p>
                                   </div>
                              </div>
                              <div class="col-md-6 col-sm-7">
                                   <div class="phone-contact"> 
                                   <a href="https://api.whatsapp.com/send?phone=628155004798" ><p>Call Us / Whatsapp &nbsp; <i class="fa fa-whatsapp fa-2x"></i> <span>(+62) 81-55-00-4798</span></p>
                                   </a>     
                              </div>

                              </div>
                         </div>
                    </div>
                    
               </div>
          </div>
     </footer>


     <!-- MODAL -->
    

     <!-- SCRIPTS -->
     <script src="<?php echo e(asset('frontend/js/jquery.js')); ?>"></script>
     <script src="<?php echo e(asset('frontend/js/bootstrap.min.js')); ?>"></script>
     <script src="<?php echo e(asset('frontend/js/jquery.stellar.min.js')); ?>"></script>
     <script src="<?php echo e(asset('frontend/js/jquery.magnific-popup.min.js')); ?>"></script>
     <script src="<?php echo e(asset('frontend/js/smoothscroll.js')); ?>"></script>
     <script src="<?php echo e(asset('frontend/js/custom.js')); ?>"></script>

</body>
</html><?php /**PATH C:\xampp\htdocs\ProjectKP_v2\resources\views/layout/frontend.blade.php ENDPATH**/ ?>