<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    @include('layout.link')
</head>

<body class="" data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
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
                                        <input type="email" class="form-control form-control-sm" id="email"
                                            aria-describedby="email" name="email" placeholder=" ">
                                        @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control form-control-sm" id="password"
                                            name="password" aria-describedby="password" placeholder=" ">
                                        @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12 d-flex justify-content-between">
                                    <div class="form-check mb-3">
                                        <input type="checkbox" class="form-check-input" id="customCheck1">
                                        <a href="" class="text-secondary" data-bs-toggle="modal" data-bs-target="#privacyModal">Kebijakan privasi</a>
                                    </div>
                                    <script>
                                        const checkbox = document.getElementById('customCheck1');
                                        const form = document.querySelector('form');

                                        form.addEventListener('submit', function (event) {
                                            if (!checkbox.checked) {
                                                event.preventDefault(); // Menghentikan pengiriman formulir
                                                alert('Anda harus menyetujui kebijakan privasi untuk melanjutkan.');
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
                                                        <img src="{{asset('assets/images/admin/pembelii.jpg')}}"
                                                            class="card-img-top" alt="...">
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
                                                        <img src="{{asset('assets/images/admin/penjuall.jpg')}}"
                                                            class="card-img-top" alt="...">
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
                        </form>
                    </div>
                </div>
                <div class="col-md-12 col-lg-5 col-xl-8 d-lg-block d-none vh-100 overflow-hidden">
                    <img src="../../assets/images/auth/01.png" class="hover-img rounded-circle first-img"
                        alt="images">
                    <img src="../../assets/images/auth/02.png" class="hover-img rounded-circle second-img"
                        alt="images">
                    <img src="../../assets/images/auth/03.png" class="hover-img rounded-circle third-img"
                        alt="images">
                    <img src="../../assets/images/auth/04.png" class="hover-img rounded-circle fourth-img"
                        alt="images">
                    <img src="../../assets/images/auth/05.png" class="hover-img rounded-circle fifth-img"
                        alt="images">
                    <img src="../../assets/images/auth/06.png" class="hover-img rounded-circle six-img"
                        alt="images">
                    <img src="../../assets/images/auth/01.png" class="hover-img rounded-circle seventh-img"
                        alt="images">
                    <img src="../../assets/images/auth/02.png" class="hover-img rounded-circle eight-img"
                        alt="images">
                </div>
            </div>
        </section>
    </div>

    <!-- Modal Kebijakan Privasi -->
   <div class="modal fade" id="privacyModal" tabindex="-1" aria-labelledby="privacyModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="privacyModalLabel">Kebijakan Privasi</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body" style="max-height: 450px; overflow-y: scroll;">
                  <h6>Syarat dan Ketentuan</h6>
                  <p>Selamat datang di Website Kuliner Kita.</p>
                  <p>Ketentuan dan Syarat penggunaan ini menguraikan aturan dan peraturan untuk penggunaan situs web milik Company Name, yang terletak di website.com. Dengan mengakses situs web ini, kami menganggap Anda menerima ketentuan dan syarat ini. Jangan lanjutkan menggunakan Website Name jika Anda tidak setuju dengan semua ketentuan dan syarat yang tertera di halaman ini.</p>
                  <h6>Terminologi</h6>
                  <p>Terminologi berikut berlaku untuk Ketentuan dan Syarat, Pernyataan Privasi, dan Pemberitahuan Disclaimer ini, serta semua Perjanjian: "Klien", "Anda", dan "Pemilik" mengacu pada Anda, orang yang masuk ke situs web ini, dan mematuhi ketentuan dan syarat perusahaan. "Perusahaan", "Kami", "Kami", "Kami", dan "Kita" mengacu pada perusahaan kami. "Pihak", "Pihak-pihak", atau "Kita", mengacu pada Klien dan kami bersama-sama. Semua istilah mengacu pada penawaran, penerimaan, dan pertimbangan pembayaran yang diperlukan untuk melakukan proses bantuan kami kepada Klien dengan cara yang paling sesuai untuk tujuan ekspres memenuhi kebutuhan Klien dalam penyediaan layanan yang dinyatakan Perusahaan, sesuai dengan dan tunduk pada hukum yang berlaku di Belanda. Penggunaan istilah di atas atau sebagai serupa dan oleh karena itu mengacu pada hal yang sama, baik dalam bentuk tunggal, jamak, huruf kapital, dan/atau "dia" atau "mereka", dianggap sejalan dengan konteks dan interpretasi.
                  <h6>Cookies</h6>
                  <p>Kami menggunakan cookies. Dengan mengakses Website Name, Anda setuju untuk menggunakan cookies sesuai dengan kebijakan privasi Company Name. Sebagian besar situs web interaktif menggunakan cookies untuk memungkinkan kami mengambil detail fungsionalitas area tertentu agar lebih mudah bagi orang yang mengunjungi situs web kami. Beberapa mitra afiliasi/iklan kami juga dapat menggunakan cookies.</p>
                  <h6>Lisensi</h6>
                  <p>Kecuali dinyatakan lain, Company Name dan/atau pemilik hak kekayaan intelektual milik semua materi di website Kuliner Kita. Semua hak kekayaan intelektual dilindungi. Anda dapat mengaksesnya dari website dalam ketentuan dan syarat ini. Penggunaan dari website Kuliner Kita adalah untuk penggunaan pribadi Anda sendiri yang tunduk pada pembatasan yang ditetapkan. Anda tidak boleh:</p>
                  <ol>
                        <li>Memublikasikan ulang materi dari Website Kuliner Kita.</li>
                        <li>Menjual, menyewakan, atau mensublisensikan materi dari Website Kuliner Kita.</li>
                        <li>Menggandakan atau menyalin materi dari Website Kuliner Kita.</li>
                        <li>Mendistribusikan konten dari Website Kuliner Kita.</li>
                  </ol>
                  <p>Perjanjian ini dimulai pada tanggal ini.</p>
                  <h6>Opini dan Informasi</h6>
                  <p>Bagian-bagian dari situs web ini memberikan kesempatan bagi pengguna untuk memposting dan bertukar opini dan informasi di area tertentu dari situs web. Company Name tidak menyaring, mengedit, memublikasikan, atau meninjau Komentar sebelum keberadaan mereka di situs web. Komentar tidak mencerminkan pandangan dan pendapat Company Name, agen-agennya, dan/atau afiliasinya. Komentar mencerminkan pandangan dan pendapat orang yang memposting pandangan dan pendapat mereka.</p>
                  <p>Sejauh yang diizinkan oleh hukum yang berlaku, Company Name tidak akan bertanggung jawab atas Komentar atau atas setiap tanggung jawab, kerusakan, atau biaya yang ditimbulkan dan/atau diderita sebagai akibat dari penggunaan, penulisan, atau tampilan Komentar di situs web ini. Komentar mengandung unsur yang mengganggu, ofensif, atau menyebabkan pelanggaran terhadap Ketentuan dan Syarat, Company Name berhak memonitor semua Komentar dan menghapus Komentar yang dianggap tidak sesuai dengan syarat ini.</p>
                  <p>Anda menjamin dan mewakili bahwa Anda berhak memposting Komentar di situs web kami dan memiliki semua lisensi dan persetujuan yang diperlukan untuk melakukannya. Komentar tidak melanggar hak kekayaan intelektual apa pun, termasuk tanpa batasan hak cipta, paten, atau merek dagang dari pihak ketiga. Komentar tidak mengandung materi yang fitnah, pencemaran nama baik, ofensif, cabul, atau materi ilegal lainnya yang merupakan pelanggaran privasi. Komentar tidak akan digunakan untuk menyulut atau mempromosikan bisnis, kegiatan komersial, atau kegiatan ilegal.</p>
                  <p>Dengan ini Anda memberikan kepada Company Name lisensi non-eksklusif untuk menggunakan, memproduksi, mengedit, dan memberikan izin kepada pihak lain untuk menggunakan, mereproduksi, dan mengedit setiap komentar Anda dalam bentuk, format, atau media apa pun.</p>
                  <h6>Hyperlink ke Konten Kami</h6>
                  <p>Organisasi berikut dapat membuat tautan ke Website kami tanpa persetujuan tertulis sebelumnya:</p>
                  <ul>
                        <li>Badan pemerintah</li>
                        <li>Mesin pencari</li>
                        <li>Organisasi berita</li>
                  </ul>
                  <p>Distributor direktori online dapat membuat tautan ke Website kami dengan cara yang sama seperti mereka menghubungkan ke situs web bisnis terdaftar lainnya; dan Bisnis Terakreditasi dalam seluruh sistem kecuali organisasi nirlaba yang meminta sumbangan, mal pusat pembelanjaan amal, dan kelompok penggalangan dana amal yang mungkin tidak menghubungkan kesitus web kami. Organisasi-organisasi ini dapat menghubungkan ke halaman utama kami, publikasi, atau informasi lainnya di Website asalkan tautan: (a) tidak dalam cara apa pun yang menyesatkan; (b) tidak secara salah mengimplikasikan sponsor, dukungan, atau persetujuan dari pihak yang menghubungkan dan produk dan/atau layanannya; dan (c) sesuai dengan konteks situs pihak yang menghubungkan.</p>
                  <p>Kami dapat mempertimbangkan dan menyetujui permintaan tautan lain dari jenis organisasi berikut:</p>
                  <ul>
                        <li>Sumber informasi konsumen dan/atau bisnis yang dikenal secara umum</li>
                        <li>Situs komunitas dot.com</li>
                        <li>Asosiasi</li>
                  </ul>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
               </div>
         </div>
      </div>
   </div>


    @include('layout.js')
    <!-- Required Library Bundle Script -->
</body>

</html>
