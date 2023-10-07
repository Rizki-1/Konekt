<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <h2>selamat akun anda berhasil di buat anda bisa login dengan klik <a href="{{ route('user.index') }}">disini</a></h2>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>
</html> -->
<!doctype html>
<html lang="en" dir="ltr">
<!-- Mirrored from templates.iqonic.design/aprycot/html/dashboard/dist/dashboard/auth/recoverpw.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 Aug 2023 04:55:03 GMT -->
<head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

      <title>Kirim email-Mailtrap</title>

      <!-- Favicon -->
      <!-- <link rel="shortcut icon" href="https://templates.iqonic.design/aprycot/html/dashboard/dist/assets/images/favicon.ico" /> -->

      <!-- Library / Plugin Css Build -->
      <link rel="stylesheet" href="../../assets/css/core/libs.min.css">
</head>
      <!-- Custom Css -->
      <!-- <link rel="stylesheet" href="../../assets/css/aprycot.mine209.css?v=1.0.0">  </head> -->
    <body class=" " data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">

      <div class="wrapper">
      <section class="container-fluid bg-circle" id="auth-login">
         <div class="row align-items-center">
            <div class="col-md-12 col-lg-7 col-xl-4">
               <div class="row justify-content-center">
                  <div class="col-md-10">
                     <div class="d-flex justify-content-center mb-0">
                        <div class="card-body text-center">
                           <a href="../index-2.html">
                              <img src="../../assets/images/kuliner.png" class="img-fluid logo-img mb-4" alt="img3">
                           </a>
                           @if ($errors->any())
                            <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>

                           @endif

                           @if (session()->has('status'))
                           <div class="alert alert-success">
                            {{ session()->get('status')}}
                           @endif
                           <h2 class="mb-2 text-center">Maaf akun anda tidak berhasil di konfirmasi <a class="text-center" href="{{ route('user.index') }}">disini</a></h2>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
             <div class="col-md-12 col-lg-5 col-xl-8 d-lg-block d-none vh-100 overflow-hidden">
               <div>
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
         </div>
      </section>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>


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
    <script src="../../assets/vendor/moment.min.js"></script>

   </body>

<!-- Mirrored from templates.iqonic.design/aprycot/html/dashboard/dist/dashboard/auth/recoverpw.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 Aug 2023 04:55:03 GMT -->
</html>
