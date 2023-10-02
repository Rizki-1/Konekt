<!doctype html>
<html lang="en" dir="ltr">

<!-- Mirrored from templates.iqonic.design/aprycot/html/dashboard/dist/dashboard/auth/sign-up.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 Aug 2023 04:54:56 GMT -->
<head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Register</title>

      <!-- Favicon -->
      <link rel="shortcut icon"  href="../../assets/images/kuliner.png" />

      <!-- Library / Plugin Css Build -->
      <link rel="stylesheet" href="../../assets/css/core/libs.min.css">

      <!-- Custom Css -->
      <link rel="stylesheet" href="../../assets/css/aprycot.mine209.css?v=1.0.0">  </head>
  <body class=" " data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
    @include('layout.logoloader')

      <div class="wrapper">
      <section class="container-fluid bg-circle-login">
         <div class="row align-items-center">
            <div class="col-md-12 col-lg-7 col-xl-4">
               <div class="d-flex justify-content-center mb-0">
                  <div class="card-body mt-5">
                     <a href="../index-2.html">
                        <img src="../../assets/images/kuliner.png" class="img-fluid logo-img" alt="img5">
                     </a>
                     <h2 class="mb-2 text-center">Register</h2>
                     <p class="text-center">Buat akun Kuliner Anda.</p>
                     <form action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <div class="row">
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label for="full-name" class="form-label">Nama</label>
                                 <input type="text" name="name" class="form-control form-control-sm" id="full-name" placeholder=" ">
                                 @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                 @endif
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label for="email" class="form-label">Email</label>
                                 <input type="email" name="email" class="form-control form-control-sm" id="email" placeholder=" ">
                                 @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                 @endif
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label for="password" class="form-label">Kata Sandi</label>
                                 <input type="password" name="password" class="form-control form-control-sm" id="password" placeholder=" ">
                                 @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                 @endif
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label for="confirm-password" class="form-label">Confirm Password</label>
                                 <input type="password" name="confirm_password" class="form-control form-control-sm" id="confirm-password" placeholder=" ">
                                 @if ($errors->has('confirm_password'))
                                    <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                                 @endif
                              </div>
                           </div>
                        </div>
                        <div class="d-flex justify-content-center">
                           <button type="submit" class="btn btn-primary">Daftar</button>
                        </div>
                        <p class="mt-3 text-center">
                           Sudah punya akun? <a href="{{route('user.index')}}" class="text-underline">Masuk</a>
                        </p>

                  </div>
               </div>
            </div>
            <div class="col-md-12 col-lg-5 col-xl-8 d-lg-block d-none vh-100 overflow-hidden">
            <img src="../../assets/images/auth/01.png" class="hover-img rounded-circle first-img" alt="images">
                  <img src="../../assets/images/auth/02.png" class="hover-img rounded-circle second-img" alt="images">
                  <img src="../../assets/images/auth/03.png" class="hover-img rounded-circle third-img" alt="images">
                  <img src="../../assets/images/auth/04.png" class="hover-img rounded-circle fourth-img" alt="images">
                  <img src="../../assets/images/auth/05.png" class="hover-img rounded-circle fifth-img" alt="images">
                  <img src="../../assets/images/auth/06.png" class="hover-img rounded-circle six-img" alt="images">
                  <img src="../../assets/images/auth/01.png" class="hover-img rounded-circle seventh-img" alt="images">
                  <img src="../../assets/images/auth/02.png" class="hover-img rounded-circle eight-img" alt="images">
            </div>
         </div>
      </section>
      </div>

    <!-- Required Library Bundle Script -->
    <script src="../../assets/js/core/libs.min.js"></script>

    <!-- External Library Bundle Script -->
    <script src="../../assets/js/core/external.min.js"></script>

    <!-- Widgetchart JavaScript -->
    <script src="../../assets/js/charts/widgetcharts.js"></script>

    <!-- Mapchart JavaScript -->
    <script src="../../assets/js/charts/vectore-chart.js"></script>
    <script src="../../assets/js/charts/dashboard.js"></script>

    <!-- Admin Dashboard Chart -->
    <script src="../../assets/js/charts/admin.js"></script>

    <!-- fslightbox JavaScript -->
    <script src="../../assets/js/fslightbox.js"></script>

    <!-- GSAP Animation -->
    <script src="../../assets/vendor/gsap/gsap.min.js"></script>
    <script src="../../assets/vendor/gsap/ScrollTrigger.min.js"></script>
    <script src="../../assets/js/animation/gsap-init.js"></script>

    <!-- Stepper Plugin -->
    <script src="../../assets/js/stepper.js"></script>

    <!-- Form Wizard Script -->
    <script src="../../assets/js/form-wizard.js"></script>

    <!-- app JavaScript -->
    <script src="../../assets/js/app.js"></script>

    <!-- moment JavaScript -->
    <script src="../../assets/vendor/moment.min.js"></script>  </body>

<!-- Mirrored from templates.iqonic.design/aprycot/html/dashboard/dist/dashboard/auth/sign-up.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 Aug 2023 04:54:56 GMT -->
</html>
