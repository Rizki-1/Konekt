

<!doctype html>
<html lang="en" dir="ltr">

<!-- Mirrored from templates.iqonic.design/aprycot/html/dashboard/dist/dashboard/auth/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 Aug 2023 04:54:54 GMT -->
<head>
    @include('layout.link')
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
                     <img src="../../assets/images/kuliner.png" class="img-fluid logo-img" alt="img4">
                  </a>
                           <h2 class="mb-2 text-center">Selamat Datang</h2>
                           <p class="text-center">Di Kuliner Kita.</p>
                           <form action="{{ route('authenticate') }}" method="POST">
                            @csrf
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                       <label for="email" class="form-label">Email</label>
                                       <input type="email" class="form-control form-control-sm" id="email" aria-describedby="email" name="email" placeholder=" ">
                                       @if ($errors->has('email'))
                                          <span class="text-danger">{{ $errors->first('email') }}</span>
                                       @endif
                                    </div>
                                 </div>
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                       <label for="password" class="form-label">Password</label>
                                       <input type="password" class="form-control form-control-sm" id="password" name="password" aria-describedby="password" placeholder=" ">
                                       @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                 @endif
                                    </div>
                                 </div>
                                 <div class="col-lg-12 d-flex justify-content-between">
                              <div class="form-check mb-3">
                           <input type="checkbox" class="form-check-input" id="customCheck1">
                           <label class="form-check-label" for="customCheck1">Kebijakan privasi</label>
                        </div>
                        <script>
                           const checkbox = document.getElementById('customCheck1');
                           const form = document.querySelector('form');

                           form.addEventListener('submit', function(event) {
                              if (!checkbox.checked) {
                                 event.preventDefault(); // Menghentikan pengiriman formulir
                                 Swal.fire('Peringatan','Anda harus menyetujui kebijakan privasi untuk melanjutkan.', 'warning');
                              }
                           });
                        </script>
                              <a href="{{ route('password.request') }}">Lupa Password?</a>
                           </div>
                              <style>
                           .wide-button {
                              width: 500px; /* Atur lebar sesuai kebutuhan Anda */
                           }
                        </style>
                        <style>
                     .rounded-button {
                        border-radius: 30px; /* Sesuaikan dengan tingkat ke-tumpulan yang diinginkan */
                     }
                  </style>

                  <div class="d-flex justify-content-center">
                     <button type="submit" class="btn btn-primary wide-button rounded-button">Login</button>
                  </div>
                  <center>
                     <div class="row" style="padding-top: 25px;">
                        <div class="col-sm-6">
                           <div class="card">
                              <div class="card-body">
                                 <a href="{{ route('register') }}">
                                    <img src="{{asset('assets/images/admin/pembelii.jpg')}}" class="card-img-top" alt="...">
                                 </a>
                                 <h5 class="card-title"></h5>
                                 <center>
                                    <p>Pembeli</p>
                                 </center>
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="card">
                              <div class="card-body">
                                 <a href="{{ route('penjualrole.index') }}">
                                    <img src="{{asset('assets/images/admin/penjuall.jpg')}}" class="card-img-top" alt="...">
                                 </a>
                                 <h5 class="card-title"></h5>
                                 <center>
                                    <p>Penjual</p>
                                 </center>
                              </div>
                           </div>
                        </div>
                     </div>
                  </center>

                  <style>
                     .card-link {
                        color: blue;
                        text-decoration: none;
                     }

                     .card-link:hover {
                        text-decoration: underline;
                     }
                  </style>

                     <style>
                     .card:hover {
                        transform: translateY(-5px);
                        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
                     }
                     </style>
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
