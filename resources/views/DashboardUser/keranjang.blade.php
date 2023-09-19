<!doctype html>
<html lang="en" dir="ltr">

<!-- Mirrored from templates.iqonic.design/aprycot/html/dashboard/dist/dashboard/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 Aug 2023 04:52:12 GMT -->

<head>
    <style>
        .title {
            text-align: center;
            justify-content: center;
            position: relative;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        .card-container {
            background-color: #ffffff;
            /* Warna latar belakang */
            color: #000000;
            /* Warna teks */
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            margin: 10px;
            padding: 10px;
            height: 100vh;
            margin-bottom: 10px;
        }


        .card img {
            max-width: 100px;
            max-height: 100px;
            /* border-radius: 100%; */
            margin-right: 10px;
        }

        .card-content {
            flex: 1;
        }

        .img {
            width: 80px;
            height: 80px;
            text-align: right;
            justify-content: right;

        }

        .main-content {
            flex: 1px;
        }

        .text-left {
            color: #F66F0C;
            font-family: "sans-serif";
        }

        input[type="checkbox"] {
            width: 20px;
            /* Ubah ukuran sesuai kebutuhan */
            height: 20px;
            /* Ubah ukuran sesuai kebutuhan */
            margin-right: 15px;
        }

        i.fa-solid {
            margin-right: 10px;
            /* Ubah jumlah margin sesuai kebutuhan */
            font-size: 20px;
        }

        .text {
            font-family: "sans-serif";
            font-size: 16px;

        }

        .centered-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 10px;
            color: #000000;
            /* Membuat div menutupi tinggi seluruh viewport (tinggi layar) */
        }

        .content {
            margin-right: 50px;
        }

        .form-label {
            color: grey;

        }

        strong {
            font-weight: bold;
            font-size: 16px;
            /* Adjust the text size */
        }

        .form-label {
            margin-left: 50px;
            margin-right: 0px;
            /* text-align: justify; */

        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Kuliner kita</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

    <!-- Favicon -->
    <link rel="shortcut icon"
        href="https://templates.iqonic.design/aprycot/html/dashboard/dist/assets/images/favicon.ico" />

    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="../../assets/css/core/libs.min.css">

      <!-- Custom Css -->
      <link rel="stylesheet" href="../../assets/css/aprycot.mine209.css?v=1.0.0">

      {{-- jquery --}}
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

      <!-- Include the SweetAlert 2 CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">

      <!-- Include the SweetAlert 2 JavaScript -->
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

      {{-- bootstrap icon --}}
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    </head>
  <body class="  "  style="background:url(../../assets/images/dashboard.png);    background-attachment: fixed;
    background-size: cover;">
    {{-- @include('layout.logoloader') --}}
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
                        <a class="nav-link"  href="menu" role="button" >
                            <i class="icon">
                                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.4" d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z" fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z" fill="currentColor"></path>
                                </svg>
                            </i>
                            <span class="item-name">Dashboard</span>
                        </a>
                        <!--  ACTIVE = PILIHAN SIDE BAR BERWARNA -->
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="daftartoko">
                                  <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="30" viewBox="0 0 27 23" fill="none">
                                        <path d="M26.1895 6.67998L24.377 1.24248C24.3139 1.05491 24.1912 0.893125 24.0276 0.781849C23.8639 0.670572 23.6684 0.615917 23.4707 0.626232H3.53323C3.33561 0.615917 3.14004 0.670572 2.9764 0.781849C2.81276 0.893125 2.69004 1.05491 2.62698 1.24248L0.81448 6.67998C0.801423 6.77621 0.801423 6.87376 0.81448 6.96998V12.4075C0.81448 12.6478 0.909959 12.8783 1.07991 13.0483C1.24987 13.2183 1.48038 13.3137 1.72073 13.3137H2.62698V22.3762H4.43948V13.3137H9.87698V22.3762H24.377V13.3137H25.2832C25.5236 13.3137 25.7541 13.2183 25.924 13.0483C26.094 12.8783 26.1895 12.6478 26.1895 12.4075V6.96998C26.2025 6.87376 26.2025 6.77621 26.1895 6.67998ZM22.5645 20.5637H11.6895V13.3137H22.5645V20.5637ZM24.377 11.5012H20.752V7.87623H18.9395V11.5012H14.4082V7.87623H12.5957V11.5012H8.06448V7.87623H6.25198V11.5012H2.62698V7.11498L4.18573 2.43873H22.8182L24.377 7.11498V11.5012Z" fill="#959895"/>
                                        </svg>
                                    </i>
                                  <span class="item-name">Daftar Toko</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="pesanan">
                                   <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="30" viewBox="0 0 26 23" fill="none">
                                        <path d="M2.55044 0C1.13495 0 0 1.13495 0 2.55044V7.65133C0 9.06683 1.13495 10.2018 2.55044 10.2018H7.65133C9.06683 10.2018 10.2018 9.06683 10.2018 7.65133V2.55044C10.2018 1.13495 9.06683 0 7.65133 0M7.90637 1.91283L9.25811 3.25182L4.16997 8.28894L0.943664 5.03713L2.30815 3.69814L4.18273 5.59822M2.55044 12.7522C1.13495 12.7522 0 13.8872 0 15.3027V20.4035C0 21.819 1.13495 22.954 2.55044 22.954H7.65133C9.06683 22.954 10.2018 21.819 10.2018 20.4035V15.3027C10.2018 13.8872 9.06683 12.7522 7.65133 12.7522M2.55044 15.3027H7.65133V20.4035H2.55044M12.7522 2.55044H25.5044V5.10089H12.7522M12.7522 20.4035V17.8531H25.5044V20.4035M12.7522 10.2018H25.5044V12.7522H12.7522V10.2018Z" fill="#959895"/>
                                        </svg>
                                    </i>
                                   <span class="item-name">Pesanan</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="riwayatuser">
                                   <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="30" viewBox="0 0 33 30" fill="none">
                                        <path d="M18.8974 0.747714C10.8752 0.526047 4.30301 7.00188 4.30301 14.9977H1.48186C0.772628 14.9977 0.425894 15.8527 0.930234 16.3435L5.32745 20.7769C5.64266 21.0935 6.13124 21.0935 6.44646 20.7769L10.8437 16.3435C11.3323 15.8527 10.9855 14.9977 10.2763 14.9977H7.45514C7.45514 8.82271 12.467 3.83521 18.6452 3.91438C24.5081 3.99355 29.4412 8.94938 29.52 14.8394C29.5988 21.0302 24.6342 26.081 18.4876 26.081C15.9501 26.081 13.6018 25.2102 11.742 23.7377C11.1116 23.2469 10.229 23.2944 9.66162 23.8644C8.99968 24.5294 9.04696 25.6535 9.78771 26.2235C12.1833 28.1235 15.1936 29.2477 18.4876 29.2477C26.4467 29.2477 32.8928 22.6452 32.6721 14.586C32.4673 7.16021 26.2891 0.953547 18.8974 0.747714ZM18.0936 8.66438C17.4474 8.66438 16.9115 9.20271 16.9115 9.85188V15.6785C16.9115 16.2327 17.211 16.7552 17.6838 17.0402L22.6011 19.9694C23.1685 20.3019 23.8935 20.1119 24.2244 19.5577C24.5554 18.9877 24.3663 18.2594 23.8147 17.9269L19.2756 15.2194V9.83605C19.2756 9.20271 18.7397 8.66438 18.0936 8.66438Z" fill="#959895"/>
                                        </svg>
                                    </i>
                                   <span class="item-name">Riwayat</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ asset('UserKeranjang') }}"><!-- Tambahkan / sebelum keranjang -->
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon">K</i>
                                    <span class="item-name">Keranjang</span>
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
                    <div class="input-group search-input">
                        <span class="input-group-text" id="search-input">
                            <svg width="18" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="11.7669" cy="11.7666" r="8.98856" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle>
                                <path d="M18.0186 18.4851L21.5426 22" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </span>
                        <input type="search" class="form-control" placeholder="Search...">
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
                            <!-- isi dari notifikasi-->
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link" id="notification-drop" data-bs-toggle="dropdown">
                                    <svg width="18" height="21" viewBox="0 0 18 21" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M16.7695 10.1453C16.039 9.29229 15.7071 8.55305 15.7071 7.29716V6.87013C15.7071 5.23354 15.3304 4.17907 14.5115 3.12459C13.2493 1.48699 11.1244 0.5 9.04423 0.5H8.95577C6.91935 0.5 4.86106 1.44167 3.577 3.0128C2.71333 4.08842 2.29293 5.18822 2.29293 6.87013V7.29716C2.29293 8.55305 1.98284 9.29229 1.23049 10.1453C0.676907 10.7738 0.5 11.5815 0.5 12.4557C0.5 13.3309 0.787226 14.1598 1.36367 14.8336C2.11602 15.6413 3.17846 16.1569 4.26375 16.2466C5.83505 16.4258 7.40634 16.4933 9.0005 16.4933C10.5937 16.4933 12.165 16.3805 13.7372 16.2466C14.8215 16.1569 15.884 15.6413 16.6363 14.8336C17.2118 14.1598 17.5 13.3309 17.5 12.4557C17.5 11.5815 17.3231 10.7738 16.7695 10.1453Z"
                                            fill="currentColor" />
                                        <path opacity="0.4"
                                            d="M11.0097 17.7285C10.5098 17.6217 7.46364 17.6217 6.96372 17.7285C6.53636 17.8272 6.07422 18.0568 6.07422 18.5604C6.09907 19.0408 6.38033 19.4648 6.76992 19.7337L6.76893 19.7347C7.27282 20.1275 7.86416 20.3773 8.48334 20.4669C8.8133 20.5122 9.14923 20.5102 9.49111 20.4669C10.1093 20.3773 10.7006 20.1275 11.2045 19.7347L11.2035 19.7337C11.5931 19.4648 11.8744 19.0408 11.8992 18.5604C11.8992 18.0568 11.4371 17.8272 11.0097 17.7285Z"
                                            fill="currentColor" />
                                    </svg>
                                    <span class="bg-danger dots"></span>
                                </a>
                                <div class="sub-drop dropdown-menu dropdown-menu-end p-0"
                                    aria-labelledby="notification-drop">
                                    <div class="card shadow-none m-0">
                                        <div class="card-header d-flex justify-content-between bg-primary mx-0 px-4">
                                            <div class="header-title">
                                                <h5 class="mb-0 text-white">All Notifications</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- End notifikasi -->
                            <!-- start pesan -->
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link" id="mail-drop2" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4"
                                            d="M20 13.441C20 16.231 17.76 18.491 14.97 18.501H14.96H5.05C2.27 18.501 0 16.251 0 13.461V13.451C0 13.451 0.006 9.02498 0.014 6.79898C0.015 6.38098 0.495 6.14698 0.822 6.40698C3.198 8.29198 7.447 11.729 7.5 11.774C8.21 12.343 9.11 12.664 10.03 12.664C10.95 12.664 11.85 12.343 12.56 11.763C12.613 11.728 16.767 8.39398 19.179 6.47798C19.507 6.21698 19.989 6.45098 19.99 6.86798C20 9.07698 20 13.441 20 13.441Z"
                                            fill="currentColor" />
                                        <path
                                            d="M19.4769 3.174C18.6109 1.542 16.9069 0.5 15.0309 0.5H5.05086C3.17486 0.5 1.47086 1.542 0.60486 3.174C0.41086 3.539 0.50286 3.994 0.82586 4.252L8.25086 10.191C8.77086 10.611 9.40086 10.82 10.0309 10.82C10.0349 10.82 10.0379 10.82 10.0409 10.82C10.0439 10.82 10.0479 10.82 10.0509 10.82C10.6809 10.82 11.3109 10.611 11.8309 10.191L19.2559 4.252C19.5789 3.994 19.6709 3.539 19.4769 3.174Z"
                                            fill="currentColor" />
                                    </svg>
                                    <span class="bg-primary count-mail"></span>
                                </a>
                                <div class="sub-drop dropdown-menu dropdown-menu-end p-0"
                                    aria-labelledby="mail-drop2">
                                    <div class="card shadow-none m-0">
                                        <div class="card-header d-flex justify-content-between bg-primary mx-0 px-4">
                                            <div class="header-title">
                                                <h5 class="mb-0 text-white">All Message</h5>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </li>
                            <!-- End Pesan-->
                            <!-- Start Profile-->
                            <li class="nav-item dropdown">
                                <a class="nav-link py-0 d-flex align-items-center" href="#" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="../assets/images/avatars/01.png" alt="User-Profile"
                                        class="img-fluid avatar avatar-50 avatar-rounded">
                                    <div class="caption ms-3 d-none d-md-block ">
                                        <h6 class="mb-0 caption-title">Austin Robertson</h6>
                                        <p class="mb-0 caption-sub-title">Marketing Administrator</p>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="profileuser">Profile</a></li>
                                    <li><a class="dropdown-item" href="app/user-privacy-setting.html">Privacy
                                            Setting</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                    <li><button type="submit" class="dropdown-item"> logout </button></li>
                                    </form>
                            </li>
                        </ul>
                        </li>
                        <!-- End Profile-->
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="content-inner mt-5 py-0">
            <div class="card col-md-12 mb-2">
                <div class="card-body">
                    <div>
                        <h3 class="card-title" style="color:#F66F0C">
                            <i class="fas fa-shopping-cart"></i> Keranjang Saya
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col active" data-iq-gsap="onStart" data-iq-opacity="0" data-iq-position-y="-40"
                        data-iq-duration=".6" data-iq-delay=".6" data-iq-trigger="scroll" data-iq-ease="none">
                        <div>
                            <input type="checkbox">
                            <i class="fa-solid fa-store" style="color: black;"></i><strong
                                style="font-size: 18px; color:black;">Masakkan nasi-Warung berkah</strong>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <div class="align-self-center"><input type="checkbox"></div>
                            <div class="" style="font-size: 17px;"><img
                                    src="{{ asset('assets/images/admin/08.png') }}" width="100px"
                                    style="border-radius: 10px; margin-left:-50px;">Nasi goreng</div>
                            <div class="form-label text-bold"><span class="form-label">Harga</span>
                                <div class="">
                                    <p class="form-label" style="margin-top: 10px;">Rp.15,000</p>
                                </div>
                            </div>
                            <div class="form-label text-bold px-4"><span class="form-label">jumlah</span>
                                <div class="input-step" style="margin-top:10px;">
                                    <button type="button" class="btn-sm"
                                        onclick="decrementQuantity(this.nextElementSibling)">-</button>
                                    <input type="number" class="product-quantity" style="text-align: center;" value="2" min="0"
                                        max="100" readonly onchange="updateTotal(this)">
                                    <button type="button" class="btn-sm"
                                        onclick="incrementQuantity(this.previousElementSibling)">+</button>
                                </div>
                            </div>
                            <div class="form-label text-bold px-4"><span class="form-label">total</span>
                                <div class="">
                                    <p class="form-label" style="margin-top: 10px;">Rp.15,000</p>
                                </div>
                            </div>
                            <div class="form-label text-bold px-4"><span class="form-label">Aksi</span>
                                <div class="">
                                    <form action="" method="POST" style="margin-top:10px;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class=""
                                            style="border-radius:5px; margin-left: 45px; color:red;"><i
                                                class="fa-solid fa-trash-can"
                                                style="margin-left: 8px ; margin-top: 5px;"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        {{-- <hr> --}}
                        {{-- akhir --}}
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="profileuser">Profile</a></li>
                    <li><a class="dropdown-item" href="app/user-privacy-setting.html">Privacy Setting</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <li>
                            <button type="submit" class="dropdown-item"> logout </button>
                        </li>
                    </form>
                    </li>
                  </ul>
                </li>
                <!-- End Profile-->
              </ul>
            </div>
          </div>
        </nav>
      </div>
      <div class="content-inner mt-5 py-0">
          <div class="card col-md-12 col-lg-12">
              <div class="card-body">
                  <div>
                      <h4 class="card-title" style="color:#F66F0C">
                        <i class="fas fa-shopping-cart"></i> Keranjang Saya
                    </h4>
                </div>
            </div>
            <div class="card-body">
                <div class="col active"
                data-iq-gsap="onStart"
        data-iq-opacity="0"
        data-iq-position-y="-40"
        data-iq-duration=".6"
        data-iq-delay=".6"
        data-iq-trigger="scroll"
        data-iq-ease="none">
        <hr>
        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">Pilih</th>
                    <th scope="col">Menu</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Total</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($keranjangItems as $p)
                    <tr>
                        <td><input class="item-checkbox" type="checkbox" value="{{ $p->id }}"></td>
                        <td>
                            <img src="{{ Storage::url($p->barangpenjual->fotomakanan) }}" width="100px" alt="" srcset="">
                            {{ $p->barangpenjual->namamenu }}
                        </td>
                        <td>Rp. {{number_format($p->barangpenjual->harga, 0, ',', '.')}} </td>
                        <td>
                            <div class="input-group">
                                <button type="button" class="btn btn-outline-primary btn-sm minus-btn">–</button>
                                <input type="number" class="form-control product-quantity text-center" style="width: 30px" value="{{ $p->jumlah }}" min="0" max="100" readonly data-product-id="{{ $p->id }}">
                                <button type="button" class="btn btn-outline-primary btn-sm plus-btn">+</button>
                            </div>
                        </td>
                        <td>Rp. <span class="total">{{number_format($p->totalHarga, 0, ',', '.')}}</span></td>
                        <td>
                                <button type="submit" class="btn btn-outline-danger hapus" data-item-id="{{$p->id}}" style="border-radius: 10%;"><i class="bi bi-trash-fill"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="align-self-center">
            <input type="checkbox" id="selectAllItems">
            <span style="color: black;">pilih semua</span>
        </div>
        <div class="text-end">
            <button type="button" class="btn btn-primary" id="beli">Beli</button>
        </div>
      </div>
    </div>
  </div>
</div>

@include('layout.footer')
  </main>
         @include('layout.js')
      </body>
  </html>

{{-- JS for Update jumlah --}}
<script>
    $(document).ready(function () {
        $(".minus-btn").on("click", function () {
            updateCartItem($(this), -1);
        });

        $(".plus-btn").on("click", function () {
            updateCartItem($(this), 1);
        });

        function updateCartItem(button, change) {
            var inputElement = button.closest(".input-group").find("input.product-quantity");
            var currentValue = parseInt(inputElement.val());
            var productId = inputElement.data("product-id");
            var newQuantity = currentValue + change;

            if (newQuantity >= 1 && newQuantity <= 100) {
                inputElement.val(newQuantity);

                $.ajax({
                    url: "{{ route('updateKeranjang') }}",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "productId": productId,
                        "quantity": newQuantity
                    },
                    success: function (response) {
                        if (response.success) {
                            var totalElement = button.closest("tr").find(".total");
                            var formattedTotal = response.totalHarga.toLocaleString('id-ID');
                            totalElement.text(formattedTotal);
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function () {
                        alert('Terjadi kesalahan dalam memperbarui keranjang belanja.');
                    }
                });
            }
        }
    });
</script>
{{-- JS for Update jumlah --}}

{{-- AJAX delete --}}
<script>
    $(document).ready(function () {
        $(".hapus").click(function () {
            var itemId = $(this).data("item-id");
            var itemElement = $(this).closest("tr"); // Temukan elemen yang berisi item keranjang

            Swal.fire({
                title: 'Konfirmasi',
                text: 'Anda yakin ingin menghapus item keranjang ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('hapusKeranjang') }}",
                        type: "DELETE",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "item_id": itemId
                        },
                        success: function (response) {
                            if (response.success) {
                                // Item keranjang berhasil dihapus
                                Swal.fire('Sukses', 'Item keranjang berhasil dihapus.', 'success');

                                // Hapus elemen item dari tampilan
                                itemElement.remove();
                            } else {
                                // Gagal menghapus item keranjang
                                Swal.fire('Gagal', 'Item keranjang gagal dihapus.', 'error');
                            }
                        },
                        error: function () {
                            // Terjadi kesalahan dalam menghapus item keranjang
                            Swal.fire('Error', 'Terjadi kesalahan dalam menghapus item keranjang.', 'error');
                        }
                    });
                }
            });
        });
    });
</script>
{{-- AJAX delete --}}

{{-- AJAX order --}}
<script>
    $(document).ready(function () {
        // Ketika item-item checkbox individu berubah status
        $(".item-checkbox").change(function () {
            // Periksa apakah semua item-item checkbox individu dicentang
            var allChecked = $(".item-checkbox:checked").length === $(".item-checkbox").length;

            // Atur status ceklis "Pilih semua" berdasarkan hasil pemeriksaan di atas
            $("#selectAllItems").prop("checked", allChecked);
        });

        // Toggle semua checkbox item saat checkbox "Pilih semua" diubah statusnya
        $("#selectAllItems").change(function () {
            $(".item-checkbox").prop("checked", $(this).prop("checked"));
        });

        $("#beli").click(function () {
            var itemIds = [];
            // Mengumpulkan ID item yang dicentang
            $(".item-checkbox:checked").each(function () {
                itemIds.push($(this).val());
            });

            if (itemIds.length === 0) {
                Swal.fire('Gagal', 'Pilih salah satu item terlebih dahulu.', 'error');
                return;
            }

            $.ajax({
                url: "{{ route('order') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "items": itemIds
                },
                success: function (response) {
                    // Handle respons dari server
                    if (response.success) {
                        // Redirect ke rute konfirmasi pembelian dengan ID pembelian yang sesuai
                        alert(response.message);
                    } else {
                        Swal.fire('Gagal', response.message, 'error'); // Menampilkan pesan error dengan SweetAlert
                    }
                },
                error: function (xhr, status, error) {
                Swal.fire('Gagal', 'Terjadi kesalahan dalam melakukan pembelian.', 'error');
                }
            });
        });
    });
</script>
{{-- AJAX order --}}
