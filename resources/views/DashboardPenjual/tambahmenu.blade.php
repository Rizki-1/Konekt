<!doctype html>
<html lang="en" dir="ltr">
<!-- Mirrored from templates.iqonic.design/aprycot/html/dashboard/dist/dashboard/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 Aug 2023 04:52:12 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Kuliner kita</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="../../assets/images/kuliner.png" />
    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="../../assets/css/core/libs.min.css">
    <!-- Custom Css -->
    <link rel="stylesheet" href="../../assets/css/aprycot.mine209.css?v=1.0.0">
    <!-- Include the SweetAlert 2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">

    <!-- Include the SweetAlert 2 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    {{-- bootstrap icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>

    .avatar-container {
        width: 200px; /* Sesuaikan lebar yang Anda inginkan */
        height: 170px; /* Sesuaikan tinggi yang Anda inginkan (disesuaikan dengan lebar agar menjadi kotak) */
        overflow: hidden;
        position: relative;
        border-radius: 0%; /* Mengatur radius sudut menjadi 0% untuk membuatnya menjadi kotak */
    }

    .avatar-container img {
        object-fit: cover;
        width: 100%;
        height: 100%;
    }

</style>
</head>

<body class="  "
    style="background:url(../../assets/images/dashboard.png);    background-attachment: fixed;
    background-size: cover;">

    @include('layout.sweetalert')

    @include('layout.sweetalert')

    {{-- Modal Store --}}
    <div class="modal fade" id="myModal" tabindex="-1">
        <form action="{{ route('DashboardPenjual.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="toko_id" value="{{ $penjualId }}">
            <div class="modal-dialog modal-lg"> {{-- Menggunakan class modal-lg untuk membuat modal lebih besar --}}
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Menu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row"> {{-- Memulai baris grid --}}
                            <div class="col-md-6"> {{-- Kolom kiri --}}
                                <div class="mb-3">
                                    <label for="namamenu" class="form-label fw-bold">Nama Menu</label>
                                    <input type="text" name="namamenu"
                                        class="form-control @error('namamenu') is-invalid @enderror"
                                        value="{{ old('namamenu') }}">
                                    @error('namamenu')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="kategori_id" class="form-label fw-bold">Kategori</label>
                                    <select name="kategori_id"
                                        class="form-control @error('kategori_id') is-invalid @enderror">
                                        <option value="" disabled>Pilih kategori</option>
                                        @foreach ($adminkategori as $siswa)
                                            <option value="{{ $siswa->id }}"
                                                {{ old('kategori_id') == $siswa->id ? 'selected' : '' }}>
                                                {{ $siswa->kategori }}</option>
                                        @endforeach
                                    </select>
                                    @error('kategori_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                @foreach ($penjualTokoId as $idToko)
                                    <input type="hidden" name="nama_toko" value="{{ $idToko->id }}">
                                @endforeach
                                <div class="mb-3">
                                    <label for="harga" class="form-label fw-bold">Harga</label>
                                    <input type="number" name="harga"
                                        class="form-control @error('harga') is-invalid @enderror"
                                        value="{{ old('harga') }}">
                                    @error('harga')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="keterangan_makanan" class="form-label fw-bold">Keterangan
                                        Makanan</label>
                                    <textarea name="keterangan_makanan" class="form-control @error('keterangan_makanan') is-invalid @enderror"
                                        value="{{ old('keterangan_makanan') }}"></textarea>
                                    @error('keterangan_makanan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> {{-- Akhir kolom kiri --}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="stok" class="form-label fw-bold">Stok</label>
                                    <input type="number" name="stok"
                                        class="form-control @error('stok') is-invalid @enderror"
                                        value="{{ old('stok') }}">
                                    @error('stok')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="fotomakanan" class="form-label fw-bold">Foto Makanan</label>
                                    <input type="file" name="fotomakanan"
                                        class="form-control @error('fotomakanan') is-invalid @enderror"
                                        id="previewImage">
                                    @error('fotomakanan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div id="imagePreview" class="mb-3" style="width: 200px"></div>
                            </div> {{-- Akhir kolom kanan --}}
                        </div> {{-- Akhir baris grid --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    {{-- AJAX Store --}}
    <script>
        $(document).ready(function() {
            // Menampilkan gambar terpilih
            $("#previewImage").change(function() {
                readURL(this);
            });

            // Fungsi untuk menampilkan gambar terpilih
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $("#imagePreview").html('<img src="' + e.target.result +
                            '" class="img-fluid" alt="Preview Gambar" />');
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }

            // Tangani klik tombol "Simpan"
            $("#myModal form").submit(function(e) {
                e.preventDefault();

                // Hapus pesan kesalahan yang mungkin sudah ada
                $(".is-invalid").removeClass('is-invalid');
                $(".invalid-feedback").remove();

                var formData = new FormData($(this)[0]); // Dapatkan data formulir
                formData.append('_token', '{{ csrf_token() }}'); // Tambahkan token CSRF

                $.ajax({
                    url: "{{ route('DashboardPenjual.store') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // Tanggapan berhasil, lakukan sesuatu jika perlu
                        if (response.success) {
                            $("#myModal").modal("hide"); // Sembunyikan modal
                            Swal.fire('Sukses',
                                'Berhasil menambahkan menu, halaman akan terefresh.',
                                'success');

                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else {
                            Swal.fire('Gagal', 'Terjadi kesalahan saat menambahkan menu.',
                                'error');
                        }
                    },
                    error: function(xhr, status, error) {
                        // Tangani kesalahan status respons
                        if (xhr.status === 422) {
                            var responseErrors = xhr.responseJSON.errors;

                            $.each(responseErrors, function(key, value) {
                                var inputField = $("input[name='" + key +
                                    "'], textarea[name='" + key +
                                    "'], select[name='" + key + "']");
                                inputField.addClass('is-invalid');
                                if (inputField.is('select')) {
                                    inputField.after('<div class="invalid-feedback">' +
                                        value[0] + '</div>');
                                } else {
                                    // Jika bukan elemen select, tambahkan pesan validasi setelah elemen
                                    inputField.after('<div class="invalid-feedback">' +
                                        value[0] + '</div>');
                                }

                            });
                        } else {
                            Swal.fire('Gagal', 'Terjadi kesalahan saat menambahkan menu.',
                                'error');
                        }
                    }
                });
            });
        });
    </script>
    {{-- AJAX Store --}}

    {{-- Modal Store --}}

    @include('layout.logoloader')
    <aside class="sidebar sidebar-default sidebar-hover sidebar-mini navs-pill-all ">
        <div class="sidebar-header d-flex align-items-center justify-content-start">
            @include('layout.minilogo')
            <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
                <i class="icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </i>
            </div>
        </div>
        <div class="sidebar-body pt-0 data-scrollbar">
            <div class="navbar-collapse" id="sidebar">
                <!-- Sidebar Menu Start -->
                <ul class="navbar-nav iq-main-menu">
                    <li class="nav-item static-item">
                        <a class="nav-link static-item disabled" href="#" tabindex="-1">
                            <span class="default-icon">Home</span>
                            <span class="mini-icon">-</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="DashboardPenjual_">
                            <i class="icon">
                                <svg width="20" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.4"
                                        d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z"
                                        fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z"
                                        fill="currentColor"></path>
                                </svg>
                            </i>
                            <span class="item-name">Dashboard</span>
                        </a>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('DashboardPenjual.index') }}">

                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25"
                                    viewBox="0 0 24 25" fill="none">
                                    <path
                                        d="M8.09975 13.9508L10.9297 11.1208L3.90975 4.1108C2.34975 5.6708 2.34975 8.2008 3.90975 9.7708L8.09975 13.9508ZM14.8797 12.1408C16.4097 12.8508 18.5597 12.3508 20.1497 10.7608C22.0597 8.8508 22.4297 6.1108 20.9597 4.6408C19.4997 3.1808 16.7597 3.5408 14.8397 5.4508C13.2497 7.0408 12.7497 9.1908 13.4597 10.7208L3.69975 20.4808L5.10975 21.8908L11.9997 15.0208L18.8797 21.9008L20.2897 20.4908L13.4097 13.6108L14.8797 12.1408Z"
                                        fill="white" />
                                </svg>
                            </i>
                            {{-- <i class="sidenav-mini-icon">M</i> --}}
                            <span class="item-name">menu</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link "aria-current="page" href="pesananpenjual">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="28"
                                    viewBox="0 0 20 21" fill="none">
                                    <path
                                        d="M16.3712 11.067C16.3712 11.5236 15.9417 11.9346 15.4644 11.9346H4.58203C4.10474 11.9346 3.67517 11.5236 3.67517 11.067V10.1994C3.67517 9.74277 4.10474 9.33181 4.58203 9.33181H15.5121C15.9894 9.33181 16.419 9.74277 16.419 10.1994V11.067H16.3712ZM14.5575 16.2725C14.5575 16.7291 14.1279 17.14 13.6506 17.14H4.58203C4.10474 17.14 3.67517 16.7291 3.67517 16.2725V15.4049C3.67517 14.9483 4.10474 14.5373 4.58203 14.5373H13.6984C14.1757 14.5373 14.6052 14.9483 14.6052 15.4049V16.2725H14.5575ZM3.67517 4.94825C3.67517 4.49163 4.10474 4.08067 4.58203 4.08067H13.6984C14.1757 4.08067 14.6052 4.49163 14.6052 4.94825V5.81583C14.6052 6.27245 14.1757 6.68341 13.6984 6.68341H4.58203C4.10474 6.68341 3.67517 6.27245 3.67517 5.81583V4.94825ZM17.2781 0.610352H2.76831C1.24097 0.610352 0 1.79757 0 3.21309V18.0076C0 19.4231 1.24097 20.6104 2.72058 20.6104H17.2781C18.7577 20.6104 19.9987 19.4231 19.9987 18.0076V3.21309C20.0464 1.79757 18.8054 0.610352 17.2781 0.610352Z"
                                        fill="#959895" />
                                </svg>
                            </i>
                            {{-- <i class="sidenav-mini-icon">D</i> --}}
                            <span class="item-name">pesanan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="riwayatpenjual">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="30"
                                    viewBox="0 0 33 30" fill="none">
                                    <path
                                        d="M18.8974 0.747714C10.8752 0.526047 4.30301 7.00188 4.30301 14.9977H1.48186C0.772628 14.9977 0.425894 15.8527 0.930234 16.3435L5.32745 20.7769C5.64266 21.0935 6.13124 21.0935 6.44646 20.7769L10.8437 16.3435C11.3323 15.8527 10.9855 14.9977 10.2763 14.9977H7.45514C7.45514 8.82271 12.467 3.83521 18.6452 3.91438C24.5081 3.99355 29.4412 8.94938 29.52 14.8394C29.5988 21.0302 24.6342 26.081 18.4876 26.081C15.9501 26.081 13.6018 25.2102 11.742 23.7377C11.1116 23.2469 10.229 23.2944 9.66162 23.8644C8.99968 24.5294 9.04696 25.6535 9.78771 26.2235C12.1833 28.1235 15.1936 29.2477 18.4876 29.2477C26.4467 29.2477 32.8928 22.6452 32.6721 14.586C32.4673 7.16021 26.2891 0.953547 18.8974 0.747714ZM18.0936 8.66438C17.4474 8.66438 16.9115 9.20271 16.9115 9.85188V15.6785C16.9115 16.2327 17.211 16.7552 17.6838 17.0402L22.6011 19.9694C23.1685 20.3019 23.8935 20.1119 24.2244 19.5577C24.5554 18.9877 24.3663 18.2594 23.8147 17.9269L19.2756 15.2194V9.83605C19.2756 9.20271 18.7397 8.66438 18.0936 8.66438Z"
                                        fill="#959895" />
                                </svg>
                            </i>
                            {{-- <i class="sidenav-mini-icon">R</i> --}}
                            <span class="item-name">Riwayat</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="pembayaranpenjual">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="30"
                                    viewBox="0 0 25 26" fill="none">
                                    <path
                                        d="M18.75 5.51367H6.25C4.52411 5.51367 3.125 6.91278 3.125 8.63867V16.972C3.125 18.6979 4.52411 20.097 6.25 20.097H18.75C20.4759 20.097 21.875 18.6979 21.875 16.972V8.63867C21.875 6.91278 20.4759 5.51367 18.75 5.51367Z"
                                        stroke="#959895" stroke-width="1.23" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M3.125 10.7207H21.875" stroke="#959895" stroke-width="1.23"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M7.29248 15.9297H7.30248" stroke="#959895" stroke-width="1.23"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M11.4575 15.9297H13.5409" stroke="#959895" stroke-width="1.23"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </i>
                            {{-- <i class="sidenav-mini-icon">R</i> --}}
                            <span class="item-name">Pembayaran</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="pengajuandana">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="30"
                                    viewBox="0 0 21 22" fill="none">
                                    <path d="M5.25 4.04688H13.125V5.35938H5.25V4.04688Z" fill="#959895" />
                                    <path d="M5.25 6.67285H13.125V7.98535H5.25V6.67285Z" fill="#959895" />
                                    <path d="M5.25 9.29785H9.1875V10.6104H5.25V9.29785Z" fill="#959895" />
                                    <path d="M5.25 15.8604H7.875V17.1729H5.25V15.8604Z" fill="#959895" />
                                    <path
                                        d="M19.4972 12.7714L17.5284 10.8027C17.4675 10.7417 17.3952 10.6933 17.3156 10.6603C17.236 10.6273 17.1506 10.6104 17.0645 10.6104C16.9783 10.6104 16.8929 10.6273 16.8133 10.6603C16.7337 10.6933 16.6614 10.7417 16.6005 10.8027L10.502 16.9011V19.7979H13.3987L19.4972 13.6993C19.5581 13.6384 19.6065 13.5661 19.6395 13.4865C19.6725 13.4069 19.6895 13.3216 19.6895 13.2354C19.6895 13.1492 19.6725 13.0639 19.6395 12.9843C19.6065 12.9046 19.5581 12.8323 19.4972 12.7714ZM12.8552 18.4854H11.8145V17.4446L15.0957 14.1634L16.1364 15.2041L12.8552 18.4854ZM17.0645 14.2761L16.0237 13.2354L17.0645 12.1946L18.1052 13.2354L17.0645 14.2761Z"
                                        fill="#959895" />
                                    <path
                                        d="M7.875 19.7978H3.9375C3.58952 19.7975 3.25589 19.6591 3.00983 19.413C2.76376 19.167 2.62536 18.8333 2.625 18.4853V2.73535C2.62536 2.38737 2.76376 2.05374 3.00983 1.80768C3.25589 1.56161 3.58952 1.42322 3.9375 1.42285H14.4375C14.7855 1.42322 15.1191 1.56161 15.3652 1.80768C15.6112 2.05374 15.7496 2.38737 15.75 2.73535V9.29785H14.4375V2.73535H3.9375V18.4853H7.875V19.7978Z"
                                        fill="#959895" />
                                </svg>
                            </i>
                            {{-- <i class="sidenav-mini-icon">K</i> --}}
                            <span class="item-name">Pengajuan</span>
                        </a>
                    </li>
                </ul>
                </li>
                </ul>
                <!-- Sidebar Menu End -->
            </div>
        </div>
        <div class="sidebar-footer"></div>
    </aside>
    <main class="main-content">
        <div class="position-relative">
            <!--Nav Start-->
            <nav class="nav navbar navbar-expand-lg navbar-light iq-navbar">
                <div class="container-fluid navbar-inner">
                    @include('layout.logo')
                    <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
                        <i class="icon">
                            <svg width="20px" height="20px" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" />
                            </svg>
                        </i>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                            <span class="navbar-toggler-bar bar1 mt-2"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto align-items-center navbar-list mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <div class="sub-drop dropdown-menu dropdown-menu-end p-0"
                                    aria-labelledby="notification-drop">
                                    <div class="card shadow-none m-0">
                                        <div class="card-header d-flex justify-content-between bg-primary mx-0 px-4">
                                            <div class="header-title">
                                                <h5 class="mb-0 text-white">All Notifications</h5>
                                            </div>
                                        </div>
                                        @php
                                            $latestNotifications = $notifikasi_penjual->sortByDesc('created_at')->take(3);
                                        @endphp
                                        @foreach ($latestNotifications as $np)
                                            <div class="card-body p-0 notifikasi-belum-kedaluwarsa">
                                                <div class="d-flex align-items-center">
                                                    <img class="avatar-40 rounded-pill" src="{{ $np->fotomakanan }}"
                                                        alt="">
                                                    {{-- ../assets/images/layouts/01.png --}}
                                                    <div class="ms-3 w-100">
                                                        <h6 class="mb-0">{{ $np->keterangan_penjual }}</h6>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <p class="mb-0">{{ $np->isi_penjual }}</p>
                                                            <small class="float-end font-size-12">Just Now</small>
                                                        </div>
                                                    </div>
                                                </div>
                                        @endforeach

                                    </div>
                                </div>

                            <li class="nav-item dropdown">
                                <a class="nav-link py-0 d-flex align-items-center" href="#" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="../assets/images/avatars/01.png" alt="User-Profile"
                                        class="img-fluid avatar avatar-50 avatar-rounded">
                                    <div class="caption ms-3 d-none d-md-block ">
                                        <h6 class="mb-0 caption-title">{{ Auth::user()->name }}</h6>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="profilepenjual">Profile</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <li><button type="submit" class="dropdown-item">logout</button></li>
                                    </form>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <div class="content-inner mt-5 py-0">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class=" " data-iq-gsap="onStart" data-iq-opacity="0" data-iq-position-y="-40"
                        data-iq-duration=".6" data-iq-delay=".8" data-iq-trigger="scroll" data-iq-ease="none"
                        style="position: relative">
                    </div>
                    <button type="button" class="btn btn-outline-primary rounded-pill" data-bs-toggle="modal"
                        data-bs-target="#myModal">Tambah Menu</button>
                </div>
                @php
                    $no = 1;
                @endphp
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 row-cols-xxl-4 ">
                    @foreach ($penjual as $p)

                        <div class="col-xl-3 col-lg-3 col-md-6 col-12 dish-card-horizontal mt-2 ">

                            <div class="col active" data-iq-gsap="onStart" data-iq-opacity="0"
                                data-iq-position-y="-40" data-iq-duration=".6" data-iq-delay=".6"
                                data-iq-trigger="scroll" data-iq-ease="none">
                            </div>
                            <div class="card card-white dish-card profile-img mb-0">
                                <div class="profile-img21 d-flex justify-content-center align-items-center">
                                    <!-- tempat foto -->
                                    <img src="{{ asset('Storage/' . $p->fotomakanan) }}"
                                        class="img-fluid avatar-170 position-bottom" alt="profile-image">
                                </div>

                                <!-- Menu muter muter Start -->
                                <div class="card-body menu-image">
                                    <h6 class="heading-title fw-bolder mt-3 mb-0 text-center fs-5">{{ $p->namamenu }}
                                    </h6>
                                    <h6 class="text-center  fw-light mt-1">{{ $p->adminkategori->kategori }}</6>
                                    </h6>
                                    <div class="d-flex justify-content-evenly">
                                        <span class="text-primary fw-bolder mt-2">Rp.
                                            {{ number_format($p->harga) }}</span>
                                    </div>
                                    @if ($p->ulasan->count() > 0)
                                        <div class="card-rating stars-ratings text-center">
                                            @for ($i = 0; $i < 5; $i++)
                                                @if ($i < $p->ulasan->avg('rating'))
                                                    <svg width="18" viewBox="0 0 30 30" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M27.2035 11.1678C27.127 10.9426 26.9862 10.7446 26.7985 10.5985C26.6109 10.4523 26.3845 10.3643 26.1474 10.3453L19.2112 9.79418L16.2097 3.14996C16.1141 2.93597 15.9586 2.75421 15.762 2.62662C15.5654 2.49904 15.336 2.43108 15.1017 2.43095C14.8673 2.43083 14.6379 2.49853 14.4411 2.6259C14.2444 2.75327 14.0887 2.93486 13.9929 3.14875L10.9914 9.79418L4.05515 10.3453C3.82211 10.3638 3.59931 10.449 3.41343 10.5908C3.22754 10.7325 3.08643 10.9249 3.00699 11.1447C2.92754 11.3646 2.91311 11.6027 2.96544 11.8305C3.01776 12.0584 3.13462 12.2663 3.30204 12.4295L8.42785 17.4263L6.61502 25.2763C6.55997 25.5139 6.57762 25.7626 6.66566 25.99C6.7537 26.2175 6.90807 26.4132 7.10874 26.5519C7.30942 26.6905 7.54713 26.7656 7.79103 26.7675C8.03493 26.7693 8.27376 26.6978 8.47652 26.5623L15.1013 22.1458L21.726 26.5623C21.9333 26.6999 22.1777 26.7707 22.4264 26.7653C22.6751 26.7598 22.9161 26.6783 23.1171 26.5318C23.3182 26.3852 23.4695 26.1806 23.5507 25.9455C23.632 25.7104 23.6393 25.456 23.5717 25.2167L21.3464 17.43L26.8652 12.4635C27.2266 12.1375 27.3592 11.6289 27.2035 11.1678Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                @endif
                                            @endfor
                                        </div>
                                        <div class="rating-info">
                                            <p class="mb-0 text-center">
                                                {{ number_format($p->ulasan->avg('rating'), 1, ',', '.') }} /
                                                {{ $p->ulasan->count() }}
                                            </p>
                                        </div>
                                    @else
                                        <p style="text-align: center">tidak ada ulasan</p>
                                    @endif
                                    @if ($p->stok === 0)
                                    <p class="text-center">stok habis</p>
                                    @else
                                    <div class="d-flex justify-content-evenly text-black">
                                        <p>Sisa Stok : {{ $p->stok }}</p>
                                    </div>
                                    @endif
                                    <div class="d-flex justify-content-evenly">
                                        <a class="btn btn-outline-info"
                                            href="{{ route('detailmenupen', ['id' => $p->id]) }}"><i
                                                class="bi bi-eye"></i></a>
                                        <button type="submit" class="btn btn-outline-warning edit-btn"
                                            data-id="{{ $p->id }}"><i
                                                class="bi bi-pencil-square"></i></button>
                                        <button type="submit" class="btn btn-outline-danger delete-btn"
                                            data-id="{{ $p->id }}"><i class="bi bi-trash"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- AJAX DELETE --}}
                <script>
                    $(document).ready(function() {
                        // Tangani klik tombol "Delete"
                        $(".delete-btn").click(function() {
                            var itemId = $(this).data("id"); // Dapatkan ID item dari atribut data

                            // Simpan referensi ke elemen yang akan dihapus
                            var $itemToDelete = $(this).closest(
                                ".col-xl-3.col-lg-3.col-md-6.col-12.dish-card-horizontal.mt-2");

                            // Konfirmasi penghapusan dengan SweetAlert atau pesan konfirmasi lainnya
                            Swal.fire({
                                title: 'Konfirmasi',
                                text: 'Anda yakin ingin menghapus item ini?',
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#d33',
                                cancelButtonColor: '#3085d6',
                                confirmButtonText: 'Hapus',
                                cancelButtonText: 'Batal'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // Jika pengguna mengonfirmasi penghapusan, kirim permintaan DELETE dengan AJAX
                                    $.ajax({
                                        url: "{{ route('DashboardPenjual.destroy', '') }}" + "/" +
                                            itemId,
                                        type: "DELETE",
                                        data: {
                                            "_token": "{{ csrf_token() }}",
                                        },
                                        success: function(response) {
                                            // Tanggapan berhasil, lakukan sesuatu jika perlu
                                            if (response.success) {
                                                // Item berhasil dihapus, hapus elemen dari tampilan
                                                $itemToDelete.remove();
                                                Swal.fire('Sukses', 'Berhasil menghapus menu.',
                                                    'success');
                                            } else {
                                                Swal.fire('Gagal',
                                                    'Terjadi kesalahan saat menghapus item.',
                                                    'error');
                                            }
                                        },
                                        error: function() {
                                            Swal.fire('Peringatan',
                                                'Ada pembeli yang sedang membeli menu ini.',
                                                'warning');
                                        }
                                    });
                                }
                            });
                        });
                    });
                </script>
                {{-- AJAX DELETE --}}

                {{-- Modal Edit --}}
                @foreach ($penjual as $p)
                    <div class="modal fade" id="editModal" tabindex="-1">
                        <form action="{{ route('DashboardPenjual.update', ['DashboardPenjual' => $p->id]) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="toko_id" value="{{ $penjualId }}">
                            <input type="hidden" name="item_id" id="editItemID">
                            <!-- Ini adalah input tersembunyi untuk menyimpan ID item yang akan diubah -->
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalTitle">Edit Menu</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="namamenu" class="form-label fw-bold">Nama Menu</label>
                                                    <input type="text" name="namamenu" id="editNamamenu"
                                                        class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="kategori_id"
                                                        class="form-label fw-bold">Kategori</label>
                                                    <select name="kategori_id" id="editKategoriID"
                                                        class="form-control">
                                                        <option value="" disabled>Pilih kategori</option>
                                                        @foreach ($adminkategori as $siswa)
                                                            <option value="{{ $siswa->id }}">
                                                                {{ $siswa->kategori }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="harga" class="form-label fw-bold">Harga</label>
                                                    <input type="number" name="harga" id="editHarga"
                                                        class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="keterangan_makanan"
                                                        class="form-label fw-bold">Keterangan Makanan</label>
                                                    <textarea type="text" name="keterangan_makanan" id="editketerangan_makanan" class="form-control">
                                                    </textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="stok" class="form-label fw-bold">Stok</label>
                                                    <input type="number" name="stok" id="editStok"
                                                        class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="fotomakanan" class="form-label fw-bold">Foto
                                                        Makanan</label>
                                                    <input type="file" name="fotomakanan" class="form-control"
                                                        id="editPreviewImage">
                                                    <div id="editImagePreview" class="mt-2" style="width: 200px">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Kembali</button>
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                @endforeach
                {{-- Modal Edit --}}

                {{-- AJAX Edit --}}
                <script>
                    $(document).ready(function() {
                        // Tangani klik tombol "Edit"
                        $(".edit-btn").click(function() {
                            var itemId = $(this).data("id"); // Dapatkan ID item dari atribut data'

                            // Reset pesan kesalahan dari validasi sebelumnya
                            $(".is-invalid").removeClass('is-invalid');
                            $(".invalid-feedback").remove();

                            // Kirim permintaan GET untuk mendapatkan data item yang akan diedit
                            $.ajax({
                                url: "{{ url('DashboardPenjual') }}" + "/" + itemId + "/edit",
                                type: "GET",
                                success: function(response) {
                                    if (response.success) {
                                        // Isi nilai-nilai dalam modal edit dengan data item
                                        $("#editNamamenu").val(response.data.namamenu);
                                        $("#editKategoriID").val(response.data.kategori_id);
                                        $("#editHarga").val(response.data.harga);
                                        $("#editStok").val(response.data.stok);
                                        $("#editketerangan_makanan").val(response.data.keterangan_makanan);

                                        // Tampilkan gambar saat ini di modal
                                        if (response.data.fotomakanan) {
                                            var imageUrl = "{{ asset('storage/') }}/" + response.data
                                                .fotomakanan;
                                            $("#editImagePreview").html('<img src="' + imageUrl +
                                                '" class="img-fluid" alt="Preview Gambar" />');
                                        } else {
                                            $("#editImagePreview").html('');
                                        }
                                        // Simpan ID item yang akan diubah
                                        $("#editItemID").val(itemId);

                                        // Tampilkan modal edit
                                        $("#editModal").modal("show");

                                        // Tampilkan gambar terpilih
                                        $("#editPreviewImage").change(function() {
                                            readURL(this);
                                        });

                                        // Fungsi untuk menampilkan gambar terpilih
                                        function readURL(input) {
                                            if (input.files && input.files[0]) {
                                                var reader = new FileReader();

                                                reader.onload = function(e) {
                                                    $("#editImagePreview").html('<img src="' + e.target
                                                        .result +
                                                        '" class="img-fluid" alt="Preview Gambar" />'
                                                    );
                                                };

                                                reader.readAsDataURL(input.files[0]);
                                            }
                                        }

                                    } else {
                                        Swal.fire('Gagal', 'Terjadi kesalahan saat mengambil data item.',
                                            'error');
                                    }
                                },
                                error: function() {
                                    Swal.fire('Gagal', 'Terjadi kesalahan saat mengambil data item.',
                                        'error');
                                }
                            });
                        });

                        // Tangani klik tombol "Simpan Perubahan" pada modal edit
                        $("#editModal form").submit(function(e) {
                            e.preventDefault();

                            // Reset pesan kesalahan dari validasi sebelumnya
                            $(".is-invalid").removeClass('is-invalid');
                            $(".invalid-feedback").remove();

                            var itemId = $("#editItemID").val();
                            var formData = new FormData($(this)[0]);
                            formData.append('_token', '{{ csrf_token() }}');
                            formData.append('_method', 'PUT');
                            $.ajax({
                                url: "{{ url('DashboardPenjual') }}" + "/" + itemId,
                                type: "POST",
                                data: formData,
                                contentType: false,
                                processData: false,
                                success: function(response) {

                                    if (response.success) {

                                        $("#editModal").modal("hide");

                                        Swal.fire('Sukses',
                                            'Berhasil memperbarui data menu, halaman akan terefresh.',
                                            'success');

                                        Swal.fire('Sukses', 'Berhasil memperbarui data menu.', 'success');
                                        setTimeout(function() {
                                            location.reload();
                                        }, 2000);
                                    } else {
                                        Swal.fire('Gagal', 'Terjadi kesalahan saat menyimpan perubahan.',
                                            'error');
                                    }
                                },
                                error: function(xhr) {
                                    if (xhr.status === 422) {
                                        var responseErrors = xhr.responseJSON.errors;

                                        $.each(responseErrors, function(key, value) {
                                            var inputField = $("input[name='" + key +
                                                "'], textarea[name='" + key +
                                                "'], select[name='" + key + "']");
                                            inputField.addClass('is-invalid');
                                            if (inputField.is('select')) {
                                                inputField.after('<div class="invalid-feedback">' +
                                                    value[0] + '</div>');
                                            } else {

                                                inputField.after('<div class="invalid-feedback">' +
                                                    value[0] + '</div>');
                                            }
                                        });
                                    } else {
                                        Swal.fire('Gagal', 'Terjadi kesalahan saat menyimpan perubahan.',
                                            'error');
                                    }
                                }
                            });
                        });
                    });
                </script>
                {{-- AJAX Edit --}}

                {{-- @include('layout.footer') --}}


    </main>
    @include('layout.js')
</body>

</html>
