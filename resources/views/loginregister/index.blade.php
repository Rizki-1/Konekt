

<!doctype html>
<html lang="en" dir="ltr">

<!-- Mirrored from templates.iqonic.design/aprycot/html/dashboard/dist/dashboard/auth/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 Aug 2023 04:54:54 GMT -->
<head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Aprycot | Responsive Bootstrap 5 Admin Dashboard Template</title>

      <!-- Favicon -->
      <link rel="shortcut icon" href="https://templates.iqonic.design/aprycot/html/dashboard/dist/assets/images/favicon.ico" />

      <!-- Library / Plugin Css Build -->
      <link rel="stylesheet" href="../../assets/css/core/libs.min.css">

      <!-- Custom Css -->
      <link rel="stylesheet" href="../../assets/css/aprycot.mine209.css?v=1.0.0">  </head>
  <body class=" " data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
    @include('layout.logoloader')
    @if (session('warning'))
<script>
    toastr.success('{{ session('warning') }}')
</script>
@endif
      <div class="wrapper">
      <section class="container-fluid bg-circle-login" id="auth-sign">
         <div class="row align-items-center">
            <div class="col-md-12 col-lg-7 col-xl-4">
               <div class="card-body">
                  <a href="../index-2.html">
                     <img src="../../assets/images/favicon.png" class="img-fluid logo-img" alt="img4">
                  </a>
                           <h2 class="mb-2 text-center">Sign In</h2>
                           <p class="text-center">Sign in to stay connected.</p>
                           <form action="{{ route('authenticate') }}" method="POST">
                            @csrf
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                       <label for="email" class="form-label">Email</label>
                                       <input type="email" class="form-control form-control-sm" id="email" aria-describedby="email" name="email" placeholder=" ">
                                    </div>
                                 </div>
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                       <label for="password" class="form-label">Password</label>
                                       <input type="password" class="form-control form-control-sm" id="password" name="password" aria-describedby="password" placeholder=" ">
                                    </div>
                                 </div>
                                 <div class="col-lg-12 d-flex justify-content-between">
                                    <div class="form-check mb-3">
                                       <input type="checkbox" class="form-check-input" id="customCheck1">
                                       <label class="form-check-label" for="customCheck1">Remember Me</label>
                                    </div>
                                    <a href="{{ route('password.request') }}">Forgot Password?</a>

                                 </div>
                              </div>
                              <div class="d-flex justify-content-center">
                                 <button type="submit" class="btn btn-primary">Sign In</button>
                              </div>
                            <!-- </form>
                              <p class="text-center my-3">or sign in with other accounts?</p>
                              <div class="d-flex justify-content-center">
                                 <ul class="list-group list-group-horizontal list-group-flush">
                                    <li class="list-group-item border-0 pb-0">
                                       <a href="#"><img src="https://templates.iqonic.design/aprycot/html/dashboard/dist/assets/images/brands/fb.svg" alt="fb"></a>
                                    </li>
                                    <li class="list-group-item border-0 pb-0">
                                       <a href="#"><img src="https://templates.iqonic.design/aprycot/html/dashboard/dist/assets/images/brands/gm.svg" alt="gm"></a>
                                    </li>
                                    <li class="list-group-item border-0 pb-0">
                                       <a href="#"><img src="https://templates.iqonic.design/aprycot/html/dashboard/dist/assets/images/brands/im.svg" alt="im"></a>
                                    </li>
                                    <li class="list-group-item border-0 pb-0">
                                       <a href="#"><img src="https://templates.iqonic.design/aprycot/html/dashboard/dist/assets/images/brands/li.svg" alt="li"></a>
                                    </li>
                                 </ul>
                              </div> -->
<div class="row" style="padding-top: 25px;">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <img src="{{asset('assets/images/admin/pembeli.jpg')}}" class="card-img-top" alt="...">
        <h5 class="card-title"></h5>
        <p class="card-text">Belum punya akun?</p>
        <a href="{{ route('register') }}" class="btn btn-primary">Klik disini</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <img src="{{asset('assets/images/admin/penjual.jpg')}}" class="card-img-top" alt="...">
        <h5 class="card-title"></h5>
        <p class="card-text">Daftar jadi penjual?</p>
        <a href="{{ route('penjualrole.index') }}" class="btn btn-primary">klik disini</a>
      </div>
    </div>
  </div>
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

      @include('layout.js')
    <!-- Required Library Bundle Script -->
    </body>

<!-- Mirrored from templates.iqonic.design/aprycot/html/dashboard/dist/dashboard/auth/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 Aug 2023 04:54:56 GMT -->
</html>
