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

        .card1 {
            background-color: #ea68121e;
            color: #000000;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            margin: 10px;
            padding: 10px;
            width: 500px;
            margin-bottom: 10px;
            position: fixed;
            justify-content: space-between;
            /* Memisahkan konten dan gambar */
            align-items: center;
            /* Pusatkan vertikal */
            max-width: 500px;
        }

        .img {
            max-width: 130px;
            /* Atur lebar maksimal gambar */
            max-height: 330px;
            /* Atur tinggi maksimal gambar */
            margin-left: auto;
            /* Memindahkan gambar ke kanan */
            align-self: flex-start;
            /* Memindahkan gambar ke atas */
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
            color: #ffffff;
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
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Kuliner kita</title>

    <!-- Favicon -->
    <link rel="shortcut icon"
        href="../../assets/images/kuliner.png" />

    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="../../assets/css/core/libs.min.css">

    <!-- Custom Css -->
    <link rel="stylesheet" href="../../assets/css/aprycot.mine209.css?v=1.0.0">
</head>


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
                    <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round"></path>
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
                    <a class="nav-link " href="DashboardPenjual_">
                        <i class="icon">
                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                    <a class="nav-link" aria-current="page" href="{{ route('DashboardPenjual.index') }}">

                        <i class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="30" viewBox="0 0 20 19"
                                fill="none">
                                <path
                                    d="M6.09975 10.9508L8.92975 8.1208L1.90975 1.1108C0.349746 2.6708 0.349746 5.2008 1.90975 6.7708L6.09975 10.9508ZM12.8797 9.1408C14.4097 9.8508 16.5597 9.3508 18.1497 7.7608C20.0597 5.8508 20.4297 3.1108 18.9597 1.6408C17.4997 0.180797 14.7597 0.540797 12.8397 2.4508C11.2497 4.0408 10.7497 6.1908 11.4597 7.7208L1.69975 17.4808L3.10975 18.8908L9.99975 12.0208L16.8797 18.9008L18.2897 17.4908L11.4097 10.6108L12.8797 9.1408Z"
                                    fill="#959895" />
                            </svg>
                        </i>
                        <span class="item-name">menu</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link "aria-current="page" href="pesananpenjual">
                        <i class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="28" viewBox="0 0 20 21"
                                fill="none">
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="30" viewBox="0 0 33 30"
                                fill="none">
                                <path
                                    d="M18.8974 0.747714C10.8752 0.526047 4.30301 7.00188 4.30301 14.9977H1.48186C0.772628 14.9977 0.425894 15.8527 0.930234 16.3435L5.32745 20.7769C5.64266 21.0935 6.13124 21.0935 6.44646 20.7769L10.8437 16.3435C11.3323 15.8527 10.9855 14.9977 10.2763 14.9977H7.45514C7.45514 8.82271 12.467 3.83521 18.6452 3.91438C24.5081 3.99355 29.4412 8.94938 29.52 14.8394C29.5988 21.0302 24.6342 26.081 18.4876 26.081C15.9501 26.081 13.6018 25.2102 11.742 23.7377C11.1116 23.2469 10.229 23.2944 9.66162 23.8644C8.99968 24.5294 9.04696 25.6535 9.78771 26.2235C12.1833 28.1235 15.1936 29.2477 18.4876 29.2477C26.4467 29.2477 32.8928 22.6452 32.6721 14.586C32.4673 7.16021 26.2891 0.953547 18.8974 0.747714ZM18.0936 8.66438C17.4474 8.66438 16.9115 9.20271 16.9115 9.85188V15.6785C16.9115 16.2327 17.211 16.7552 17.6838 17.0402L22.6011 19.9694C23.1685 20.3019 23.8935 20.1119 24.2244 19.5577C24.5554 18.9877 24.3663 18.2594 23.8147 17.9269L19.2756 15.2194V9.83605C19.2756 9.20271 18.7397 8.66438 18.0936 8.66438Z"
                                    fill="#959895" />
                            </svg>
                        </i>
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
                        <span class="item-name">Pembayaran</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pengajuandana">
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
                        <span class="item-name">Pengajuan</span>
                    </a>
                </li>
            </ul>
            </li>
            </ul>
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
                                <li><a class="dropdown-item" href="profilepenjual">Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <li><button type="submit" class="dropdown-item"> logout </button></li>
                                </form>
                            </ul>
                        </li>
                        <!-- End Profile-->
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="content-inner mt-5 py-0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="iq-main">
                        <div class="card mb-0 iq-content rounded-bottom">
                            <div class="d-flex flex-wrap align-items-center justify-content-between mx-3 my-3">
                                <div class="d-flex flex-wrap align-items-center">
                                    <div class="profile-img-edit position-relative">
                                    @foreach ($userPenjual as $Penjual)
                                        @if ($Penjual->user->fotoBanner != null)
                                            <img src="{{ asset('storage/' . $Penjual->user->fotoBanner) }}" alt="User-Profile" class="profile-pic rounded avatar-100">
                                        @else
                                            <img src="../assets/images/avatars/01.png" alt="User-Profile" class="profile-pic rounded avatar-100">
                                        @endif
                                    @endforeach
                                    </div>
                                <div class="d-flex align-items-center mb-3 mb-sm-0">
                                    <div style="margin-left: 20px;">
                                    <h6 style="color: black; font-size: 15px;" class="me-2 text-primary" id="profileNameDisplay">{{ Auth::user()->name }}</h6>
                                    <div style="color: black; font-size: 15px;" class="mb-1"><span id="email">{{ Auth::user()->email }}</span></div>
                                    </div>
                                </div>
                            </div>
                            <ul class="d-flex mb-0 text-center ">
                                <li class="badge bg-primary py-2 me-2">
                                    <p class="mb-3 mt-2">34</p>
                                    <small class="mb-1 fw-normal">Ulasan</small>
                                </li>
                                <li class="badge bg-primary py-2 me-2">
                                    <p class="mb-3 mt-2">5</p>
                                    <small class="mb-1 fw-normal">Menu</small>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="iq-header-img">
                    @foreach ($userPenjual as $User)
                            @if ($User->user->fotoProfile === null)
                            <img src="../../assets/images/User-profile/01.png" alt="header"
                            class="img-fluid w-100 rounded" style="object-fit: contain;">
                            @else
                             <img src="{{ asset('storage/' . $User->user->fotoBanner)}}" alt="header"
                            class="img-fluid w-100 rounded" style="object-fit: contain;">
                            @endif
                            @endforeach
                            <svg class="upload-button" width="14" height="14" viewBox="0 0 24 24">
                                <path fill="#ffffff"
                                    d="M14.06,9L15,9.94L5.92,19H5V18.08L14.06,9M17.66,3C17.41,3 17.15,3.1 16.96,3.29L15.13,5.12L18.88,8.87L20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18.17,3.09 17.92,3 17.66,3M14.06,6.19L3,17.25V21H6.75L17.81,9.94L14.06,6.19Z" />
                            </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
    <div class="card ">
        <div class="col-lg-12">
           <div class="card-header">
              <div class="card-body">
                 <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            {{ $message}}
                        </div>
                        @endif
                        @foreach ($userPenjual as $Penjual)
                        <form action="{{route('profileUpdateP', ['id'=>$Penjual->user->id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="name" class="form-control" value="{{ Auth()->user()->name }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Toko</label>
                                    <input type="text" name="nama_toko" class="form-control" value="{{$Penjual->nama_toko}}" >

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nomor Telepon</label>
                                    <input type="number" name="notlp" class="form-control" value="{{$Penjual->notlp}}" required>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Alamat Toko</label>
                                    <input type="text" name="alamat_toko" class="form-control" value="{{$Penjual->alamat_toko}}" required>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>foto profile</label>
                                    @if ($Penjual->user->fotoBanner === null)
                                    <input type="file" name="fotoProfile" class="form-control" value="" required>
                                    @else
                                    <input type="file" name="fotoProfile" class="form-control" value="{{ $Penjual->user->fotoProfile }}" >
                                    <img src="{{ asset('storage/' . $User->user->fotoBanner)}}" alt="header"
                                    class="profile-pic rounded avatar-100" >
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>foto Banner</label>
                                    @if ($Penjual->user->fotoBanner === null)
                                    <input type="file" name="fotoBanner" class="form-control" value="" required>
                                    @else
                                    <input type="file" name="fotoBanner" class="form-control" value="{{ $Penjual->fotoBanner }}">
                                    <img src="{{ asset('storage/' . $Penjual->user->fotoBanner) }}" alt="User-Profile" class="profile-pic rounded avatar-100">
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Bio</label>
                                    <textarea name="bio" class="form-control">{{ Auth()->user()->bio }}</textarea>
                                </div>
                            </div>

                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary">simpan perubahan</button>
                        </div>
                        </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                <!-- Menu Items -->
                <div class="row">
                <div class="col-lg-12 ">
                    <div class="card">
                        <div>
                            <h2 class="text-primary text-special">Menu</h2>
                        </div>
                        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 row-cols-xxl-4">
                              @foreach ($penjual as $p)
                                <div class="col-xl-3 col-lg-3 col-md-6 col-12 dish-card-horizontal mt-2">
                                    <div class="col active" data-iq-gsap="onStart" data-iq-opacity="0"
                                        data-iq-position-y="-40" data-iq-duration=".6" data-iq-delay=".6"
                                        data-iq-trigger="scroll" data-iq-ease="none">
                                        <div class="card card-white dish-card profile-img mb-5">
                                            <div class="profile-img21">
                                                <!-- tempat foto -->
                                                <img src="{{ asset('Storage/' . $p->fotomakanan) }}"
                                                    class="img-fluid rounded-pill avatar-170 blur-shadow position-bottom"
                                                    alt="profile-image">
                                                <img src="{{ asset('Storage/' . $p->fotomakanan) }}"
                                                    class="img-fluid rounded-pill avatar-170 hover-image "
                                                    alt="profile-image" data-iq-gsap="onStart" data-iq-opacity="0"
                                                    data-iq-scale=".6" data-iq-rotate="180" data-iq-duration="1"
                                                    data-iq-delay=".6" data-iq-trigger="scroll" data-iq-ease="none">
                                            </div>
                                            <!-- Menu muter muter Start -->
                                            <div class="card-body menu-image">
                                                <h6 class="heading-title fw-bolder mt-4 mb-0">
                                                    {{ $p->namamenu }}</h6>
                                                <div class="card-rating stars-ratings">
                                                    <!-- Star ratings here -->
                                                </div>
                                                <div class="d-flex justify-content-between mt-3">
                                                    <div class="d-flex align-items-center">
                                                       <span class="text-primary fw-bolder me-2">Rp.
                                                            {{ number_format($p->harga) }}</span>
                                                        {{-- @dump($p->id) --}}
                                                        {{-- <small class="text-decoration-line-through">$8.49</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
    </div>


                    </center>
                    <!-- Footer Section Start -->
                    <footer class="footer">
                        <div class="footer-body">
                            <ul class="left-panel list-inline mb-0 p-0">
                                <li class="list-inline-item"><a href="../extra/privacy-policy.html">Privacy Policy</a>
                                </li>
                                <li class="list-inline-item"><a href="../extra/terms-of-service.html">Terms of Use</a>
                                </li>
                            </ul>
                            <div class="right-panel">
                                ©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> Aprycot, Made with
                                <span class="text-gray">
                                    <svg width="15" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M15.85 2.50065C16.481 2.50065 17.111 2.58965 17.71 2.79065C21.401 3.99065 22.731 8.04065 21.62 11.5806C20.99 13.3896 19.96 15.0406 18.611 16.3896C16.68 18.2596 14.561 19.9196 12.28 21.3496L12.03 21.5006L11.77 21.3396C9.48102 19.9196 7.35002 18.2596 5.40102 16.3796C4.06102 15.0306 3.03002 13.3896 2.39002 11.5806C1.26002 8.04065 2.59002 3.99065 6.32102 2.76965C6.61102 2.66965 6.91002 2.59965 7.21002 2.56065H7.33002C7.61102 2.51965 7.89002 2.50065 8.17002 2.50065H8.28002C8.91002 2.51965 9.52002 2.62965 10.111 2.83065H10.17C10.21 2.84965 10.24 2.87065 10.26 2.88965C10.481 2.96065 10.69 3.04065 10.89 3.15065L11.27 3.32065C11.3618 3.36962 11.4649 3.44445 11.554 3.50912C11.6104 3.55009 11.6612 3.58699 11.7 3.61065C11.7163 3.62028 11.7329 3.62996 11.7496 3.63972C11.8354 3.68977 11.9247 3.74191 12 3.79965C13.111 2.95065 14.46 2.49065 15.85 2.50065ZM18.51 9.70065C18.92 9.68965 19.27 9.36065 19.3 8.93965V8.82065C19.33 7.41965 18.481 6.15065 17.19 5.66065C16.78 5.51965 16.33 5.74065 16.18 6.16065C16.04 6.58065 16.26 7.04065 16.68 7.18965C17.321 7.42965 17.75 8.06065 17.75 8.75965V8.79065C17.731 9.01965 17.8 9.24065 17.94 9.41065C18.08 9.58065 18.29 9.67965 18.51 9.70065Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </span> by <a href="https://iqonic.design/">Konekt</a>.
                            </div>
                        </div>
                    </footer>

                    <!-- Footer Section End -->
</main>
<!-- Wrapper End-->
<!-- offcanvas start -->

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
 <!-- Modal untuk mengedit profil -->

</body>

<!-- Mirrored from templates.iqonic.design/aprycot/html/dashboard/dist/dashboard/app/user-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 Aug 2023 04:55:19 GMT -->

</html>
