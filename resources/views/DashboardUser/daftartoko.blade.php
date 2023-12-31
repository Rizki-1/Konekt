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
            background-color: #F66F0C;
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

        .img {
            max-width: 150px;
            /* Atur lebar maksimal gambar */

            max-height: 330px;
            /* Atur tinggi maksimal gambar */
            margin-top: auto;
            margin-left: auto;
            /* Memindahkan gambar ke kanan */
            align-self: flex-start;
            /* Memindahkan gambar ke atas */

            border-radius: 5px;
            vertical-align: top;
            margin-top: -1000px;


            margin-right: 10px;
            margin-top: 10px;

        }

        .card-content {
            flex: 1;
        }

        .content-container {
            flex: 1;
            padding-left: 10px;
            /* Atur jarak kiri konten dari gambar */
            margin-bottom: 50px;
        }

        .main-content {
            flex: 1px;
        }

        .btn-custom {
            background-color: rgba(234, 106, 18, 0.11);
            color: #F66F0C;
            padding: 1px 10px;
            /* Sesuaikan padding sesuai kebutuhan */
            border-radius: 5px;
            width: auto;
            /* Atur lebar tombol sesuai dengan isi */
            text-align: left;
            /* Teks di kiri tombol */
            display: inline-block;
            /* Ubah elemen menjadi inline-block */
        }

        .my-custom-card {
            height: auto;
            /* Atur tinggi card sesuai kebutuhan Anda */
        }


        .nav-link.active {
            color: #F66F0C;
            /* Ganti dengan kode warna yang Anda inginkan */
        }

        .gray-text {
            color: gray;
            /* You can use a different shade of gray if needed */
        }

        .custom-button {
            background-color: #F66F0C;
            /* Warna latar belakang tombol (sesuaikan dengan preferensi Anda) */
            color: white;
            /* Warna teks tombol */
            border: none;
            /* Menghilangkan border tombol */
            padding: 10px 20px;
            /* Padding tombol */
            cursor: pointer;
            /* Mengubah cursor saat mengarahkan ke tombol */
            border-radius: 10px;
        }

        .my-custom-card {
            height: auto;
        }

        .custom-button:hover {
            background-color: #FF9901;
            /* Warna latar belakang tombol saat dihover */
        }

        p,
        h5 {
            margin: 0;
        }

        .stars {
            color: gold;
            /* Warna bintang (misalnya, emas) */
            font-size: 24px;
            /* Ukuran bintang */
        }

        .card-body {
            height: auto;
        }
        #men {
            padding-top: 90px;
            padding-bottom: 90px;
            border-bottom: 3px dotted #eee;
        }

        #men .section-heading {
            margin-bottom: 60px;
        }

        #men .item .down-content {
            padding-top: 30px;
            position: relative;
            z-index: 3;
            background-color: #fff;
        }

        #men .item .down-content h4 {
            font-size: 22px;
            color: #2a2a2a;
            font-weight: 700;
            margin-bottom: 8px;
        }

        #men .item .down-content span {
            font-size: 18px;
            color: #a1a1a1;
            font-weight: 500;
            display: block;
        }

        #men .item .down-content ul.stars {
            position: absolute;
            right: 0;
            top: 30px;
        }

        #men .item .down-content ul.stars li {
            display: inline;
            font-size: 13px;
        }

        #men .item .thumb .hover-content {
            position: absolute;
            z-index: 2;
            text-align: center;
            bottom: -60px;
            width: 100%;
            opacity: 0;
            visibility: hidden;
            transition: all .5s;
        }

        #men .item .thumb:hover .hover-content {
            bottom: 30px;
            opacity: 1;
            visibility: visible;
        }

        #men .item .thumb {
            position: relative;
        }

        #men .item .thumb .hover-content ul li {
            display: inline;
            margin: 0px 10px;
        }

        #men .item .thumb .hover-content ul li a {
            width: 50px;
            height: 50px;
            text-align: center;
            line-height: 50px;
            display: inline-block;
            color: #2a2a2a;
            background-color: #fff;
        }


        #men .owl-nav {
            text-align: center;
            position: absolute;
            width: 100%;
            top: 40%;
            transform: translateY(-25px);
        }

        #men .owl-dots {
            display: none;
        }

        #men .owl-nav .owl-prev {
            position: absolute;
            left: -80px;
            outline: none;
        }

        #men .owl-nav .owl-prev span,
        #men .owl-nav .owl-next span {
            opacity: 0;
        }

        #men .owl-nav .owl-prev:before {
            display: inline-block;
            font-family: 'FontAwesome';
            color: #2a2a2a;
            font-size: 25px;
            font-weight: 700;
            content: '\f104';
            width: 50px;
            height: 50px;
            background-color: transparent;
            line-height: 48px;
            border: 1px solid #2a2a2a;
        }

        #men .owl-nav .owl-prev {
            opacity: 0.75;
            transition: all .5s;
        }

        #men .owl-nav .owl-prev:hover {
            opacity: 1;
        }

        #men .owl-nav .owl-next {
            opacity: 0.75;
            transition: all .5s;
        }

        #men .owl-nav .owl-next:hover {
            opacity: 1;
        }

        #men .owl-nav .owl-next {
            outline: none;
            position: absolute;
            right: -85px;
        }

        #men .owl-nav .owl-next:before {
            display: inline-block;
            font-family: 'FontAwesome';
            color: #2a2a2a;
            font-size: 25px;
            font-weight: 700;
            content: '\f105';
            width: 50px;
            height: 50px;
            background-color: transparent;
            line-height: 48px;
            border: 1px solid #2a2a2a;
        }
     
    </style>

    @include('layout.link')

    
</head>
<link rel="stylesheet" href="assett/css/owl-carousel.css">
    <link rel="stylesheet" type="text/css" href="assett/css/font-awesome.css">
<body class="  "
    style="background:url(../../assets/images/dashboard.png);    background-attachment: fixed;
    background-size: cover;">
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
                        {{-- <a class="nav-link" data-bs-toggle="collapse" href="menu"> disable --}}
                        <a class="nav-link" aria-current="page" href="menu">
                            <i class="icon">
                                <svg width="23" height="30" viewBox="0 0 24 24" fill="none"
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
                        <a class="nav-link active" aria-current="page" href="daftartoko">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="30"
                                    viewBox="0 0 27 23" fill="none">
                                    <path
                                        d="M26.1895 6.67998L24.377 1.24248C24.3139 1.05491 24.1912 0.893125 24.0276 0.781849C23.8639 0.670572 23.6684 0.615917 23.4707 0.626232H3.53323C3.33561 0.615917 3.14004 0.670572 2.9764 0.781849C2.81276 0.893125 2.69004 1.05491 2.62698 1.24248L0.81448 6.67998C0.801423 6.77621 0.801423 6.87376 0.81448 6.96998V12.4075C0.81448 12.6478 0.909959 12.8783 1.07991 13.0483C1.24987 13.2183 1.48038 13.3137 1.72073 13.3137H2.62698V22.3762H4.43948V13.3137H9.87698V22.3762H24.377V13.3137H25.2832C25.5236 13.3137 25.7541 13.2183 25.924 13.0483C26.094 12.8783 26.1895 12.6478 26.1895 12.4075V6.96998C26.2025 6.87376 26.2025 6.77621 26.1895 6.67998ZM22.5645 20.5637H11.6895V13.3137H22.5645V20.5637ZM24.377 11.5012H20.752V7.87623H18.9395V11.5012H14.4082V7.87623H12.5957V11.5012H8.06448V7.87623H6.25198V11.5012H2.62698V7.11498L4.18573 2.43873H22.8182L24.377 7.11498V11.5012Z"
                                        fill="white" />
                                </svg>
                            </i>
                            <span class="item-name">Daftar Toko</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="pesanan">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="30"
                                    viewBox="0 0 26 23" fill="none">
                                    <path
                                        d="M2.55044 0C1.13495 0 0 1.13495 0 2.55044V7.65133C0 9.06683 1.13495 10.2018 2.55044 10.2018H7.65133C9.06683 10.2018 10.2018 9.06683 10.2018 7.65133V2.55044C10.2018 1.13495 9.06683 0 7.65133 0M7.90637 1.91283L9.25811 3.25182L4.16997 8.28894L0.943664 5.03713L2.30815 3.69814L4.18273 5.59822M2.55044 12.7522C1.13495 12.7522 0 13.8872 0 15.3027V20.4035C0 21.819 1.13495 22.954 2.55044 22.954H7.65133C9.06683 22.954 10.2018 21.819 10.2018 20.4035V15.3027C10.2018 13.8872 9.06683 12.7522 7.65133 12.7522M2.55044 15.3027H7.65133V20.4035H2.55044M12.7522 2.55044H25.5044V5.10089H12.7522M12.7522 20.4035V17.8531H25.5044V20.4035M12.7522 10.2018H25.5044V12.7522H12.7522V10.2018Z"
                                        fill="#959895" />
                                </svg>
                            </i>
                            <span class="item-name">Pesanan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="riwayatuser">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="30"
                                    viewBox="0 0 33 30" fill="none">
                                    <path
                                        d="M18.8974 0.747714C10.8752 0.526047 4.30301 7.00188 4.30301 14.9977H1.48186C0.772628 14.9977 0.425894 15.8527 0.930234 16.3435L5.32745 20.7769C5.64266 21.0935 6.13124 21.0935 6.44646 20.7769L10.8437 16.3435C11.3323 15.8527 10.9855 14.9977 10.2763 14.9977H7.45514C7.45514 8.82271 12.467 3.83521 18.6452 3.91438C24.5081 3.99355 29.4412 8.94938 29.52 14.8394C29.5988 21.0302 24.6342 26.081 18.4876 26.081C15.9501 26.081 13.6018 25.2102 11.742 23.7377C11.1116 23.2469 10.229 23.2944 9.66162 23.8644C8.99968 24.5294 9.04696 25.6535 9.78771 26.2235C12.1833 28.1235 15.1936 29.2477 18.4876 29.2477C26.4467 29.2477 32.8928 22.6452 32.6721 14.586C32.4673 7.16021 26.2891 0.953547 18.8974 0.747714ZM18.0936 8.66438C17.4474 8.66438 16.9115 9.20271 16.9115 9.85188V15.6785C16.9115 16.2327 17.211 16.7552 17.6838 17.0402L22.6011 19.9694C23.1685 20.3019 23.8935 20.1119 24.2244 19.5577C24.5554 18.9877 24.3663 18.2594 23.8147 17.9269L19.2756 15.2194V9.83605C19.2756 9.20271 18.7397 8.66438 18.0936 8.66438Z"
                                        fill="#959895" />
                                </svg>
                            </i>
                            <span class="item-name">Riwayat</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ asset('UserKeranjang') }}">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="30"
                                    viewBox="0 0 31 25" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M15.0996 2.50046C14.0294 2.50055 12.9869 2.801 12.1232 3.35832C11.2595 3.91564 10.6194 4.7009 10.2955 5.6004L9.16151 8.75033H21.0377L19.9037 5.6004C19.5798 4.7009 18.9397 3.91564 18.076 3.35832C17.2123 2.801 16.1699 2.50055 15.0996 2.50046ZM24.0117 8.75033L22.6055 4.84416C22.0999 3.43854 21.0998 2.21137 19.7503 1.34042C18.4008 0.469478 16.7719 0 15.0996 0C13.4273 0 11.7984 0.469478 10.4489 1.34042C9.09935 2.21137 8.09935 3.43854 7.59371 4.84416L6.18751 8.75033H2.83501C2.39239 8.75035 1.95591 8.84174 1.56054 9.01721C1.16516 9.19267 0.821875 9.44733 0.558155 9.7608C0.294435 10.0743 0.117611 10.4378 0.0418433 10.8224C-0.0339244 11.2069 -0.00652333 11.6018 0.121835 11.9753L1.71515 16.6127L3.68271 22.3376C3.94735 23.1077 4.48587 23.7823 5.21874 24.2616C5.95161 24.7411 6.83994 25 7.75247 25H22.4467C23.3591 24.9998 24.247 24.7408 24.9796 24.2613C25.7122 23.7819 26.2506 23.1074 26.5151 22.3376L28.4841 16.6127L30.0774 11.9753C30.2058 11.6018 30.2332 11.2069 30.1573 10.8224C30.0816 10.4378 29.9047 10.0743 29.6411 9.7608C29.3774 9.44733 29.0341 9.19267 28.6387 9.01721C28.2434 8.84174 27.8068 8.75035 27.3642 8.75033H24.0117ZM7.22373 11.2503H2.83501L4.12356 15.0002H9.48188L8.90069 11.2503H7.22373ZM11.7627 11.2503L12.3425 15.0002H17.8567L18.4379 11.2503H11.7627ZM21.2985 11.2503L20.7173 15.0002H26.0756L27.3642 11.2503H21.2985ZM25.2166 17.5002H20.3303L19.5578 22.5001H22.4453C22.7495 22.5001 23.0456 22.4138 23.2899 22.2539C23.5341 22.0942 23.7137 21.8693 23.8019 21.6126L25.2166 17.5002ZM16.6972 22.5001L17.4697 17.5002H12.7281L13.502 22.5001H16.6972ZM10.64 22.5001L9.86745 17.5002H4.98259L6.39588 21.6126C6.4841 21.8693 6.6636 22.0942 6.9079 22.2539C7.15219 22.4138 7.4483 22.5001 7.75247 22.5001H10.64Z"
                                        fill="#959895" />
                                </svg>
                            </i>
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
                        <input type="search" id="search" class="form-control" placeholder="Cari...">
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
                            <!-- start pesan -->

                            <!-- End Pesan-->
                            <!-- Start Profile-->
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
                                    <li><a class="dropdown-item" href="profileuser">Profile</a></li>
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
        
<div>
    <h2 class="title text-primary"><span class="h2">Kuliner Kita |</span> Daftar Toko</h2>
</div>

<section class="section" id="men">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading" style="text-align: center">
                    <h4 style="color: #EA6A12">Daftar Toko Terpopuler</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="men-item-carousel">
                    <div class="owl-men-item owl-carousel">
                        @forelse($tokoPopuler as $p)
                            <div class="item">
                                <div class="thumb">
                                    <img src="{{ asset('Storage/' . $p->foto_toko) }}" alt="Foto Toko">
                                </div>
                                <div class="down-content">
                                    <div class="d-flex justify-content-center">
                                        <h3 class="types_text">{{ $p->nama_toko }}</h3>
                                    </div>
                                    <div class="card-body menu-image">
                                        <div class="d-flex justify-content-center">
                                            <a class="btn btn-outline-primary"
                                               href="{{ route('detailtoko', ['id' => $p->user->id]) }}">
                                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                Detail
                                            </a> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p style="text-align: center">Tidak ada toko populer</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


                        @php
                    $no = 1;
                @endphp
                        <div id="result">
                            <div class="container">
                                <div class="row gap-5">
                                    @foreach ($penjuallogin as $p)
                                        <div class="card col-md-5"
                                            style="background-color:#ea68121e; margin-left:4%;">
                                            <div class="card-content">
                                                <div class="content-container my-4">
                                                    <h3>{{ $p->nama_toko }}</h3>
                                                    <a>Masakan Tradisional</a><br>
                                                    <p></p>
                                                    <a><i class="fas fa-map-marker-alt"></i>
                                                        <a style="margin-left: 5px;">{{ $p->alamat_toko }}</a>
                                                    </a>
                                                    <p><i class="fas fa-phone"></i><a
                                                            style="margin-left: 2px;">{{ $p->notlp }}</a></p>
                                                    @php
                                                        $menuCount = \App\Models\barangpenjual::where('toko_id', $p->user_id)->count();
                                                    @endphp

                                                    <div class="angka m-0">{{ $menuCount }} Menu</div>
                                                    <img src="{{ asset('Storage/' . $p->foto_toko) }}" alt="Foto Toko"
                                                        style="position: absolute; top: 10px; right: 10px; width: 190px; height:85px;"
                                                        class="img">
                                                    <div class="d-flex justify-content-between my-3">
                                                        <div>
                                                            <a class="btn btn-outline-primary"
                                                                href="{{ route('detailtoko', ['id' => $p->user->id]) }}">
                                                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                                Detail
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <a class="btn btn-outline-primary"
                                                                href="{{ url('chatify/'. $p->user_id) }}">
                                                                <i class="fa fa-comments" aria-hidden="true"></i> Chat
                                                                Penjual
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
        <div class="container">
            @if ($penjuallogin->count() > 0)
                {{ $penjuallogin->links('pagination::default') }}
            @endif
        </div>  
        {{-- @include('layout.footer') --}}

        {{-- search --}}
        <script>
            $(document).ready(function() {
                // Simpan hasil awal semua item
                var allItems = $(".row.gap-5").html();

                $('#search').keyup(function() {
                    var query = $(this).val();
                    if (query != '') {
                        $.ajax({
                            url: "{{ route('caritoko') }}",
                            method: 'GET',
                            data: {
                                query: query
                            },
                            success: function(data) {

                                var resultsContainer = $(
                                    ".row.gap-5");
                                resultsContainer
                                    .empty(); // Bersihkan konten sebelum menambahkan hasil pencarian

                                console.log(query);
                                console.log(data);

                                // Periksa apakah respons adalah array
                                if (typeof(data) == typeof([]) && data.length > 0) {
                                    data.forEach(function(menu) {
                                        var menuItem = `
                                        <div class="card col-md-5"
                                        style="background-color:#ea68121e; margin-left:4%;">
                                        <div class="card-content">
                                            <div class="content-container my-4">
                                                    <h3>${menu.nama_toko}</h3>
                                                    <a>Masakan Tradisional</a><br><p></p>
                                                    <a><i class="fa fa-map-marker" aria-hidden="true"></i>
                                                        <a style="margin-left: 5px; ">${menu.alamat_toko}</a></a>
                                                    <p><i class="fa-solid fa-phone"></i><a style="margin-left: 2px;">
                                                    ${menu.notlp}</a></p>
                                                    <tr>
                                                        <i class="fa fa-star" style="color:gold"
                                                            aria-hidden="true"></i>
                                                        <i class="fa fa-star" style="color:gold"
                                                            aria-hidden="true"></i>
                                                        <i class="fa fa-star" style="color:gold"
                                                            aria-hidden="true"></i>
                                                        <i class="fa fa-star" style="color:gold"
                                                            aria-hidden="true"></i>
                                                        <i class="fa fa-star" style="color:gold"
                                                            aria-hidden="true"></i>
                                                        <a>(26)</a>
                                                    </tr>
                                                    <div class="btn-custom"><span>12 menu</span></div>
                                                    <img src="{{ asset('Storage/') }}/${menu.foto_toko}" alt="Foto Toko"
                                                        style="position: absolute; top: 10px; right: 10px; width: 190px; height:85px;"
                                                        class="img">
                                                        <div class="d-flex justify-content-between my-3">
                                                            <div>
                                                                <a class="btn btn-outline-warning" href="{{ route('detailtoko', ['id' => '/']) }}/ ${menu.id}">
                                                                    <i class="fa fa-info-circle" aria-hidden="true"></i> Detail
                                                                </a>
                                                            </div>
                                                            <div>
                                                                <a class="btn btn-outline-warning" href="/chatify/${menu.user_id}">
                                                                    <i class="fa fa-comments" aria-hidden="true"></i> Chat Penjual
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                `;

                                        resultsContainer.append(menuItem);
                                    });
                                } else {
                                    console.log("gagal");

                                    var errorMessage =
                                        <p class="error-message my-3">Menu tidak ditemukan.</p>;
                                    resultsContainer.append(errorMessage);
                                }
                            },
                            error: function(response) {
                                // Tampilkan pesan kesalahan jika terjadi kesalahan pada permintaan
                                console.log(response.responseText);
                                var errorMessage =
                                    <p class="error-message">Terjadi kesalahan saat mengirim permintaan.</p>;
                                resultsContainer.append(errorMessage);
                            }
                        });
                    } else {
                        // Jika query kosong, bersihkan konten
                        $(".row.gap-5").html(allItems);
                        // Reset style elemen-elemen .col active
                    }
                });
            });
        </script>
        {{-- search --}}

        
        <!-- Javascript files-->
        <script src="{{asset('assetss/js/jquery.min.js')}}"></script>
        <script src="{{asset('assetss/js/popper.min.js')}}"></script>
        <script src="{{asset('assetss/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assetss/js/jquery-3.0.0.min.js')}}"></script>
        <script src="{{asset('assetss/js/plugin.js')}}"></script>
        <!-- sidebar -->
        <script src="{{asset('assetss/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
        <script src="{{asset('assetss/js/custom.js')}}"></script>
        
        @include('layout.js')

      <!-- jQuery -->
    <script src="assett/js/jquery-2.1.0.min.js"></script>

<!-- Bootstrap -->
<script src="assett/js/popper.js"></script>
<script src="assett/js/bootstrap.min.js"></script>

<!-- Plugins -->
<script src="assett/js/owl-carousel.js"></script>
<script src="assett/js/accordions.js"></script>
<script src="assett/js/datepicker.js"></script>
<script src="assett/js/scrollreveal.min.js"></script>
<script src="assett/js/waypoints.min.js"></script>
<script src="assett/js/jquery.counterup.min.js"></script>
<script src="assett/js/imgfix.min.js"></script>
<script src="assett/js/slick.js"></script>
<script src="assett/js/lightbox.js"></script>
<script src="assett/js/isotope.js"></script>

<!-- Global Init -->
<script src="assett/js/custom.js"></script>
</body>

</html>