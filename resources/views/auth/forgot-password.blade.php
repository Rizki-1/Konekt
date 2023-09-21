


<!doctype html>
<html lang="en" dir="ltr">

<!-- Mirrored from templates.iqonic.design/aprycot/html/dashboard/dist/dashboard/auth/recoverpw.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 Aug 2023 04:55:03 GMT -->
<head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Lupa Kata Sandi</title>

      <!-- Favicon -->
      <link rel="shortcut icon" href="https://templates.iqonic.design/aprycot/html/dashboard/dist/assets/images/favicon.ico" />

      <!-- Library / Plugin Css Build -->
      <link rel="stylesheet" href="../../assets/css/core/libs.min.css">

      <!-- Custom Css -->
      <link rel="stylesheet" href="../../assets/css/aprycot.mine209.css?v=1.0.0">  </head>
  <body class=" " data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
    <!-- loader Start -->
    <div id="loading">
      <div class="loader simple-loader">
      <defs>
      <filter id="filter0_d" x="161.365" y="26.7417" width="34.8633" height="35.6804" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
      <feFlood flood-opacity="0" result="BackgroundImageFix"/>
      <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
      <feOffset/>
      <feGaussianBlur stdDeviation="2"/>
      <feComposite in2="hardAlpha" operator="out"/>
      <feColorMatrix type="matrix" values="0 0 0 0 0.643137 0 0 0 0 0.568627 0 0 0 0 0.458824 0 0 0 0.4 0"/>
      <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
      <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>
      </filter>
      <linearGradient id="paint0_linear" x1="178.765" y1="50.7577" x2="178.385" y2="55.4601" gradientUnits="userSpaceOnUse">
      <stop offset="1" stop-color="#EB262B"/>
      <stop offset="0.69" stop-color="#EB262B"/>
      <stop offset="1" stop-color="white"/>
      </linearGradient>
      <linearGradient id="paint1_linear" x1="188.127" y1="41.0632" x2="187.747" y2="45.765" gradientUnits="userSpaceOnUse">
      <stop offset="1" stop-color="#EB262B"/>
      <stop offset="0.69" stop-color="#EB262B"/>
      <stop offset="1" stop-color="white"/>
      </linearGradient>
      <linearGradient id="paint2_linear" x1="170.987" y1="45.8164" x2="171.492" y2="50.5007" gradientUnits="userSpaceOnUse">
      <stop offset="1" stop-color="#EB262B"/>
      <stop offset="0.69" stop-color="#EB262B"/>
      <stop offset="1" stop-color="white"/>
      </linearGradient>
      <linearGradient id="paint3_linear" x1="177.505" y1="43.0576" x2="177.125" y2="47.76" gradientUnits="userSpaceOnUse">
      <stop offset="1" stop-color="#EB262B"/>
      <stop offset="0.69" stop-color="#EB262B"/>
      <stop offset="1" stop-color="white"/>
      </linearGradient>
      <linearGradient id="paint4_linear" x1="181.824" y1="39.4151" x2="181.444" y2="44.1174" gradientUnits="userSpaceOnUse">
      <stop offset="1" stop-color="#EB262B"/>
      <stop offset="0.69" stop-color="#EB262B"/>
      <stop offset="1" stop-color="white"/>
      </linearGradient>
      <linearGradient id="paint5_linear" x1="176.172" y1="37.5107" x2="175.792" y2="42.213" gradientUnits="userSpaceOnUse">
      <stop offset="1" stop-color="#EB262B"/>
      <stop offset="0.69" stop-color="#EB262B"/>
      <stop offset="1" stop-color="white"/>
      </linearGradient>
      <linearGradient id="paint6_linear" x1="170.322" y1="36.7027" x2="169.942" y2="41.4045" gradientUnits="userSpaceOnUse">
      <stop offset="1" stop-color="#EB262B"/>
      <stop offset="0.69" stop-color="#EB262B"/>
      <stop offset="1" stop-color="white"/>
      </linearGradient>
      <linearGradient id="paint7_linear" x1="185.55" y1="46.9899" x2="186.055" y2="51.6741" gradientUnits="userSpaceOnUse">
      <stop offset="1" stop-color="#EB262B"/>
      <stop offset="0.69" stop-color="#EB262B"/>
      <stop offset="1" stop-color="white"/>
      </linearGradient>
      <linearGradient id="paint8_linear" x1="178.06" y1="31.8899" x2="177.68" y2="36.5918" gradientUnits="userSpaceOnUse">
      <stop offset="1" stop-color="#EB262B"/>
      <stop offset="0.69" stop-color="#EB262B"/>
      <stop offset="1" stop-color="white"/>
      </linearGradient>
      <linearGradient id="paint9_linear" x1="184.754" y1="33.8362" x2="185.259" y2="38.5206" gradientUnits="userSpaceOnUse">
      <stop offset="1" stop-color="#EB262B"/>
      <stop offset="0.69" stop-color="#EB262B"/>
      <stop offset="1" stop-color="white"/>
      </linearGradient>
      </defs>
      </svg>
      </div>    </div>
    <!-- loader END -->

      <div class="wrapper">
      <section class="container-fluid bg-circle" id="auth-login">
         <div class="row align-items-center">
            <div class="col-md-12 col-lg-7 col-xl-4">
               <div class="row justify-content-center">
                  <div class="col-md-10">
                     <div class="d-flex justify-content-center mb-0">
                        <div class="card-body text-center">
                           <a href="../index-2.html">
                              <img src="https://templates.iqonic.design/aprycot/html/dashboard/dist/assets/images/logo.svg" class="img-fluid logo-img mb-4" alt="img3">
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
                           <h2 class="mb-2 text-center">Reset Password</h2>
                           <p class=" text-center">Masukkan Alamat Email Anda.</p>
                           <form action="{{ route('password.email') }}" method="post">
                            @csrf
                           <div class="row text-start">
                              <div class="col-lg-12">
                                 <div class="floating-label form-group">
                                       <label for="email" class="form-label">Email</label>
                                       <input name="email" type="email" class="form-control" id="email" aria-describedby="email" placeholder=" ">
                                 </div>
                              </div>
                           </div>
                           <button type="submit" value="Request Password Reset" class="btn btn-primary">Reset</button>
                           </form>
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

<!-- Mirrored from templates.iqonic.design/aprycot/html/dashboard/dist/dashboard/auth/recoverpw.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 Aug 2023 04:55:03 GMT -->
</html>
