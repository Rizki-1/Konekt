<!doctype html>
<html lang="en" dir="ltr">

<!-- Mirrored from templates.iqonic.design/aprycot/html/dashboard/dist/dashboard/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 Aug 2023 04:52:12 GMT -->

<head>
    <style>

.centered-button {
    display: flex;
    justify-content: center; /* Untuk membuat kontennya berada di tengah secara horizontal */
    align-items: center; /* Untuk membuat kontennya berada di tengah secara vertikal */
    height: 15%; /* Ini akan mengisi tinggi div dengan class "centered-button" */
}

 body {
  display: flex;
  flex-direction: column;
  min-height: 100vh;
  margin: 0;
}

 .container {
        display: flex;
  }

  .card1 {
    background-color: #ffffff;
    color: #000000; /* Warna teks */
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    display: flex;
    margin: 10px;
    padding: 10px;
    width: 400px;
    margin-bottom: 10px;
    height: 400px;
  }

  .card-content {
    flex: 1;
  }
  .img {
    margin-top: 20px;
    margin-bottom: 40px;
    text-align: left;
    justify-content: left;
  }

  .img img {
    width: 50px;
    height: 50px;
  }
  .main-content {
    flex: 1px;
  }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Kuliner kita</title>

    <!-- Favicon -->
    <link rel="shortcut icon"
        href="https://templates.iqonic.design/aprycot/html/dashboard/dist/assets/images/favicon.ico" />

    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="../../assets/css/core/libs.min.css">

    <!-- Custom Css -->
    <link rel="stylesheet" href="../../assets/css/aprycot.mine209.css?v=1.0.0">
</head>

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
                        <a class="nav-link active"  href="DashboardPenjual_" >
                            <i class="icon">
                                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.4" d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z" fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z" fill="currentColor"></path>
                                </svg>
                            </i>
                            <span class="item-name">Dashboard</span>
                        </a>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{ route('DashboardPenjual.index') }}" >

                                  <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="30" viewBox="0 0 20 19" fill="none">
                                        <path d="M6.09975 10.9508L8.92975 8.1208L1.90975 1.1108C0.349746 2.6708 0.349746 5.2008 1.90975 6.7708L6.09975 10.9508ZM12.8797 9.1408C14.4097 9.8508 16.5597 9.3508 18.1497 7.7608C20.0597 5.8508 20.4297 3.1108 18.9597 1.6408C17.4997 0.180797 14.7597 0.540797 12.8397 2.4508C11.2497 4.0408 10.7497 6.1908 11.4597 7.7208L1.69975 17.4808L3.10975 18.8908L9.99975 12.0208L16.8797 18.9008L18.2897 17.4908L11.4097 10.6108L12.8797 9.1408Z" fill="#959895"/>
                                        </svg>
                                    </i>
                                  <span class="item-name">menu</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link "aria-current="page" href="pesananpenjual">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="28" viewBox="0 0 20 21" fill="none">
                                            <path d="M16.3712 11.067C16.3712 11.5236 15.9417 11.9346 15.4644 11.9346H4.58203C4.10474 11.9346 3.67517 11.5236 3.67517 11.067V10.1994C3.67517 9.74277 4.10474 9.33181 4.58203 9.33181H15.5121C15.9894 9.33181 16.419 9.74277 16.419 10.1994V11.067H16.3712ZM14.5575 16.2725C14.5575 16.7291 14.1279 17.14 13.6506 17.14H4.58203C4.10474 17.14 3.67517 16.7291 3.67517 16.2725V15.4049C3.67517 14.9483 4.10474 14.5373 4.58203 14.5373H13.6984C14.1757 14.5373 14.6052 14.9483 14.6052 15.4049V16.2725H14.5575ZM3.67517 4.94825C3.67517 4.49163 4.10474 4.08067 4.58203 4.08067H13.6984C14.1757 4.08067 14.6052 4.49163 14.6052 4.94825V5.81583C14.6052 6.27245 14.1757 6.68341 13.6984 6.68341H4.58203C4.10474 6.68341 3.67517 6.27245 3.67517 5.81583V4.94825ZM17.2781 0.610352H2.76831C1.24097 0.610352 0 1.79757 0 3.21309V18.0076C0 19.4231 1.24097 20.6104 2.72058 20.6104H17.2781C18.7577 20.6104 19.9987 19.4231 19.9987 18.0076V3.21309C20.0464 1.79757 18.8054 0.610352 17.2781 0.610352Z" fill="#959895"/>
                                            </svg>
                                    </i>
                                    <span class="item-name">pesanan</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="riwayatpenjual">
                                   <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="30" viewBox="0 0 33 30" fill="none">
                                        <path d="M18.8974 0.747714C10.8752 0.526047 4.30301 7.00188 4.30301 14.9977H1.48186C0.772628 14.9977 0.425894 15.8527 0.930234 16.3435L5.32745 20.7769C5.64266 21.0935 6.13124 21.0935 6.44646 20.7769L10.8437 16.3435C11.3323 15.8527 10.9855 14.9977 10.2763 14.9977H7.45514C7.45514 8.82271 12.467 3.83521 18.6452 3.91438C24.5081 3.99355 29.4412 8.94938 29.52 14.8394C29.5988 21.0302 24.6342 26.081 18.4876 26.081C15.9501 26.081 13.6018 25.2102 11.742 23.7377C11.1116 23.2469 10.229 23.2944 9.66162 23.8644C8.99968 24.5294 9.04696 25.6535 9.78771 26.2235C12.1833 28.1235 15.1936 29.2477 18.4876 29.2477C26.4467 29.2477 32.8928 22.6452 32.6721 14.586C32.4673 7.16021 26.2891 0.953547 18.8974 0.747714ZM18.0936 8.66438C17.4474 8.66438 16.9115 9.20271 16.9115 9.85188V15.6785C16.9115 16.2327 17.211 16.7552 17.6838 17.0402L22.6011 19.9694C23.1685 20.3019 23.8935 20.1119 24.2244 19.5577C24.5554 18.9877 24.3663 18.2594 23.8147 17.9269L19.2756 15.2194V9.83605C19.2756 9.20271 18.7397 8.66438 18.0936 8.66438Z" fill="#959895"/>
                                        </svg>
                                    </i>
                                   <span class="item-name">Riwayat</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="pembayaranpenjual">
                                   <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="30" viewBox="0 0 25 26" fill="none">
                                            <path d="M18.75 5.51367H6.25C4.52411 5.51367 3.125 6.91278 3.125 8.63867V16.972C3.125 18.6979 4.52411 20.097 6.25 20.097H18.75C20.4759 20.097 21.875 18.6979 21.875 16.972V8.63867C21.875 6.91278 20.4759 5.51367 18.75 5.51367Z" stroke="#959895" stroke-width="1.23" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M3.125 10.7207H21.875" stroke="#959895" stroke-width="1.23" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M7.29248 15.9297H7.30248" stroke="#959895" stroke-width="1.23" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M11.4575 15.9297H13.5409" stroke="#959895" stroke-width="1.23" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                    </i>
                                   <span class="item-name">Pembayaran</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="pengajuandana">
                                   <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="30" viewBox="0 0 21 22" fill="none">
                                        <path d="M5.25 4.04688H13.125V5.35938H5.25V4.04688Z" fill="#959895"/>
                                        <path d="M5.25 6.67285H13.125V7.98535H5.25V6.67285Z" fill="#959895"/>
                                        <path d="M5.25 9.29785H9.1875V10.6104H5.25V9.29785Z" fill="#959895"/>
                                        <path d="M5.25 15.8604H7.875V17.1729H5.25V15.8604Z" fill="#959895"/>
                                        <path d="M19.4972 12.7714L17.5284 10.8027C17.4675 10.7417 17.3952 10.6933 17.3156 10.6603C17.236 10.6273 17.1506 10.6104 17.0645 10.6104C16.9783 10.6104 16.8929 10.6273 16.8133 10.6603C16.7337 10.6933 16.6614 10.7417 16.6005 10.8027L10.502 16.9011V19.7979H13.3987L19.4972 13.6993C19.5581 13.6384 19.6065 13.5661 19.6395 13.4865C19.6725 13.4069 19.6895 13.3216 19.6895 13.2354C19.6895 13.1492 19.6725 13.0639 19.6395 12.9843C19.6065 12.9046 19.5581 12.8323 19.4972 12.7714ZM12.8552 18.4854H11.8145V17.4446L15.0957 14.1634L16.1364 15.2041L12.8552 18.4854ZM17.0645 14.2761L16.0237 13.2354L17.0645 12.1946L18.1052 13.2354L17.0645 14.2761Z" fill="#959895"/>
                                        <path d="M7.875 19.7978H3.9375C3.58952 19.7975 3.25589 19.6591 3.00983 19.413C2.76376 19.167 2.62536 18.8333 2.625 18.4853V2.73535C2.62536 2.38737 2.76376 2.05374 3.00983 1.80768C3.25589 1.56161 3.58952 1.42322 3.9375 1.42285H14.4375C14.7855 1.42322 15.1191 1.56161 15.3652 1.80768C15.6112 2.05374 15.7496 2.38737 15.75 2.73535V9.29785H14.4375V2.73535H3.9375V18.4853H7.875V19.7978Z" fill="#959895"/>
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
                            
                            <!-- End Pesan-->
                            <!-- Start Profile-->
                            <li class="nav-item dropdown">
                                <a class="nav-link py-0 d-flex align-items-center" href="#" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="../assets/images/avatars/01.png" alt="User-Profile"
                                        class="img-fluid avatar avatar-50 avatar-rounded">
                                    <div class="caption ms-3 d-none d-md-block ">
                                        <h6 class="mb-0 caption-title">{{ Auth::user()->name }}</h6>
                                        <p class="mb-0 caption-sub-title">Marketing Administrator</p>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="profilepenjual">Profile</a></li>
                                    <li><a class="dropdown-item" href="app/user-privacy-setting.html">Privacy Setting</a></li>
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
    <div class="row">
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="59" height="58" viewBox="0 0 59 58" fill="none">
                            <g clip-path="url(#clip0_1953_6020)">
                                <mask id="mask0_1953_6020" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="59" height="58">
                                <path d="M58.79 0.0351562H0.869995V57.9552H58.79V0.0351562Z" fill="white"/>
                                </mask>
                                <g mask="url(#mask0_1953_6020)">
                                <path d="M20.7882 14.064C20.6867 14.1109 20.5304 14.2047 20.4445 14.2751C20.218 14.4783 15.203 22.0371 15.1014 22.3342C14.9687 22.7016 14.9687 46.6991 15.0936 47.1603C15.3124 47.9342 16.0857 48.7002 16.8825 48.9113C17.1481 48.9816 19.3118 48.9973 25.7251 48.9816C34.1615 48.9582 34.2162 48.9582 34.4271 48.794C34.8411 48.4892 34.9661 48.239 34.9661 47.7466C34.9661 47.2541 34.8411 47.004 34.4271 46.6991C34.2162 46.535 34.1615 46.535 25.8579 46.5115L17.5074 46.4959V35.2397V23.9835H22.5067H27.4983L27.5217 27.3369C27.5451 30.5887 27.553 30.6982 27.7092 30.9092C27.9513 31.2375 28.2326 31.4173 28.5763 31.4642C28.834 31.4955 29.2324 31.3939 30.701 30.9014L32.5054 30.2995L34.3099 30.9014C35.7784 31.3939 36.1768 31.4955 36.4346 31.4642C36.7783 31.4173 37.0595 31.2375 37.3017 30.9092C37.4579 30.6982 37.4657 30.5887 37.4892 27.3369L37.5126 23.9835H42.5041H47.5035L47.5191 28.5876C47.5425 33.1057 47.5425 33.1995 47.7066 33.4106C48.0112 33.8249 48.2612 33.9499 48.7533 33.9499C49.2454 33.9499 49.4954 33.8249 49.8001 33.4106C49.9641 33.1995 49.9641 33.1057 49.9875 27.9466C50.0032 24.1868 49.9875 22.6078 49.9172 22.3811C49.8079 21.9824 44.7304 14.3923 44.4336 14.1735C44.2148 14.0171 44.1524 14.0171 32.5992 14.0015C25.0455 13.9937 20.9132 14.0171 20.7882 14.064ZM28.4825 16.7295C28.4591 16.8702 28.2716 17.988 28.0685 19.2153L27.6936 21.4431L23.1473 21.4665L18.601 21.4822L20.257 18.9808L21.9209 16.4872L25.2251 16.4794H28.5294L28.4825 16.7295ZM34.3177 18.7463C34.5208 19.9735 34.7083 21.0913 34.7317 21.2242L34.7786 21.4822H32.5054H30.2245L30.2714 21.2633C30.2948 21.146 30.4745 20.0673 30.6775 18.8635C30.8728 17.6597 31.0447 16.6279 31.0603 16.5732C31.0916 16.495 31.4196 16.4794 32.5211 16.495L33.9427 16.5185L34.3177 18.7463ZM44.7538 18.9808L46.4099 21.4822L41.8636 21.4665L37.3173 21.4431L36.9424 19.2153C36.7393 17.988 36.5518 16.8702 36.5283 16.7295L36.4815 16.4794H39.7857L43.09 16.4872L44.7538 18.9808ZM35.0051 26.2426V28.5095L33.8568 28.1186C33.2241 27.9076 32.6148 27.7356 32.5054 27.7356C32.3961 27.7356 31.7868 27.9076 31.154 28.1186L30.0058 28.5095V26.2426V23.9835H32.5054H35.0051V26.2426Z" fill="#ED790E"/>
                                <path d="M44.7675 36.6153C42.8224 36.9671 40.9086 38.0458 39.6744 39.4841C36.7763 42.8531 36.7763 47.637 39.6744 51.006C41.2601 52.8508 43.7832 53.9998 46.2517 53.9998C51.0479 53.9998 55.0005 50.0445 55.0005 45.245C55.0005 41.0005 51.9072 37.3423 47.6968 36.6153C46.8531 36.4668 45.5721 36.4668 44.7675 36.6153ZM47.8765 39.2261C50.0715 39.8436 51.7041 41.5164 52.3134 43.7598C52.5243 44.5337 52.5087 46.0345 52.2821 46.8318C51.6416 49.0674 49.9934 50.6933 47.7358 51.3109C47.0328 51.5063 45.4705 51.5063 44.7675 51.3109C43.6583 51.0138 42.7599 50.5057 41.971 49.7475C41.0961 48.9111 40.5571 48.0122 40.2212 46.8318C39.9947 46.0345 39.979 44.5337 40.19 43.7598C40.4868 42.6499 40.9945 41.7509 41.7523 40.9614C42.7365 39.9374 43.8692 39.3277 45.2987 39.0698C45.8845 38.9603 47.2359 39.0463 47.8765 39.2261Z" fill="#ED790E"/>
                                <path d="M45.7457 41.6033C45.4566 41.7362 45.1989 42.0098 45.0895 42.299C44.9567 42.6429 44.9801 45.4257 45.1129 45.7384C45.1754 45.8791 45.8863 46.6451 46.6909 47.4503C48.2766 49.0214 48.386 49.084 49.0421 48.9589C49.4249 48.8885 49.8936 48.4195 49.9639 48.0365C50.0889 47.3955 50.0029 47.2548 48.714 45.9494L47.5111 44.7378L47.4876 43.5106C47.4642 42.1817 47.4251 42.0723 46.9408 41.7049C46.6752 41.5095 46.0581 41.4548 45.7457 41.6033Z" fill="#ED790E"/>
                                </g>
                            </g>
                            <defs>
                                <clipPath id="clip0_1953_6020">
                                <rect width="57.92" height="57.92" fill="white" transform="translate(0.869995 0.0351562)"/>
                                </clipPath>
                            </defs>
                            </svg>                        
                            <div class="text-end">
                            <h2 class="angka m-0">{{ $menu }}</h2>
                            <p>Jumlah Menu</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 41 41" fill="none">
                        <g clip-path="url(#clip0_1953_6035)">
                            <path d="M10.5822 1.10497C10.1604 1.26122 9.71505 1.57372 9.48849 1.87059C9.16817 2.30028 3.64473 11.9253 3.52754 12.2612C3.43379 12.5268 3.41817 14.5659 3.41817 25.5581C3.41817 39.1987 3.41035 38.9018 3.7541 39.5581C3.96504 39.9643 4.57442 40.5268 5.04317 40.7456L5.48848 40.9565H20.84H36.1916L36.6369 40.7456C37.1057 40.5268 37.715 39.9643 37.926 39.5581C38.2697 38.9018 38.2619 39.2065 38.2619 25.4643C38.2619 13.0581 38.2541 12.3784 38.1213 12.105C37.801 11.4409 32.2775 1.95653 32.0822 1.73778C31.965 1.60497 31.676 1.39403 31.4494 1.26122L31.0354 1.03466L20.9572 1.01903C12.6135 1.00341 10.8244 1.01903 10.5822 1.10497ZM19.6682 7.12841V10.9175H13.34C9.86349 10.9175 7.01192 10.894 7.01192 10.8706C7.01192 10.8472 7.98067 9.14403 9.16817 7.08153L11.3244 3.33934H15.4963H19.6682V7.12841ZM32.4729 7.00341C33.6369 9.01903 34.6057 10.7222 34.6369 10.7925C34.6838 10.9097 34.176 10.9175 28.3869 10.9175H22.09V7.12841V3.33934H26.2229H30.3557L32.4729 7.00341ZM35.9182 25.8003C35.9182 38.2378 35.9182 38.3393 35.7619 38.4956C35.6057 38.6518 35.5041 38.6518 20.84 38.6518C6.17599 38.6518 6.07442 38.6518 5.91817 38.4956C5.76192 38.3393 5.76192 38.2378 5.76192 25.8003V13.2612H20.84H35.9182V25.8003Z" fill="#ED790E"/>
                            <path d="M24.7463 21.9016C24.6369 21.9719 23.3556 23.2219 21.8947 24.6751L19.2385 27.3235L18.1838 26.261C17.6056 25.6829 17.0353 25.1516 16.9181 25.0891C16.301 24.7688 15.4494 25.1751 15.2931 25.8782C15.1603 26.4563 15.2697 26.6204 16.9572 28.3235C17.8244 29.1985 18.6291 29.9641 18.7463 30.0266C19.0197 30.1672 19.5353 30.1672 19.8088 30.0266C19.926 29.9641 21.4494 28.4797 23.1994 26.7219C25.926 23.9876 26.3869 23.4876 26.4572 23.2141C26.59 22.7141 26.3947 22.2219 25.9416 21.9251C25.6603 21.7376 25.0119 21.7297 24.7463 21.9016Z" fill="#ED790E"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_1953_6035">
                            <rect width="40" height="40" fill="white" transform="translate(0.840027 0.995117)"/>
                            </clipPath>
                        </defs>
                        </svg>                         
                        <div class="text-end">
                            <h2 class="angka m-0">{{ $totalpenjualan }}</h2>
                            <p>Jumlah Penjualan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 41 41" fill="none">
                            <path d="M0.880005 32.6592V35.9951C0.880005 38.7529 7.59875 40.9951 15.88 40.9951C24.1613 40.9951 30.88 38.7529 30.88 35.9951V32.6592C27.6534 34.9326 21.755 35.9951 15.88 35.9951C10.005 35.9951 4.10657 34.9326 0.880005 32.6592ZM25.88 10.9951C34.1613 10.9951 40.88 8.75293 40.88 5.99512C40.88 3.2373 34.1613 0.995117 25.88 0.995117C17.5988 0.995117 10.88 3.2373 10.88 5.99512C10.88 8.75293 17.5988 10.9951 25.88 10.9951ZM0.880005 24.4639V28.4951C0.880005 31.2529 7.59875 33.4951 15.88 33.4951C24.1613 33.4951 30.88 31.2529 30.88 28.4951V24.4639C27.6534 27.1201 21.7472 28.4951 15.88 28.4951C10.0128 28.4951 4.10657 27.1201 0.880005 24.4639ZM33.38 25.3232C37.8566 24.4561 40.88 22.8467 40.88 20.9951V17.6592C39.0675 18.9404 36.4034 19.8154 33.38 20.3545V25.3232ZM15.88 13.4951C7.59875 13.4951 0.880005 16.292 0.880005 19.7451C0.880005 23.1982 7.59875 25.9951 15.88 25.9951C24.1613 25.9951 30.88 23.1982 30.88 19.7451C30.88 16.292 24.1613 13.4951 15.88 13.4951ZM33.0128 17.8936C37.7003 17.0498 40.88 15.3936 40.88 13.4951V10.1592C38.1066 12.1201 33.3409 13.1748 28.3253 13.4248C30.63 14.542 32.3253 16.042 33.0128 17.8936Z" fill="#ED790E"/>
                        </svg>                        
                        <div class="text-end">
                            <h2 class="angka m-0">Rp. {{ number_format ($pemasukkan, 0, ',', '.')}}</h2>
                            <p>Jumlah Pemasukkan</p>
                        </div>                    
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 41 41" fill="none">
                        <g clip-path="url(#clip0_1953_6053)">
                            <path d="M20.6581 0.573355C18.5331 0.93273 16.7831 2.49523 16.0487 4.67492L15.869 5.22179L15.8456 14.5343L15.8221 23.8546H14.2049C12.3221 23.8546 11.7987 23.9405 10.869 24.3937C9.02526 25.2843 7.82994 26.8937 7.5565 28.878C7.50963 29.2296 7.47056 30.7296 7.47056 32.3624C7.47056 35.5265 7.44713 35.7452 6.97838 36.6124C6.68931 37.1593 5.94713 37.9484 5.43931 38.2452C4.97056 38.5187 4.18931 38.753 3.57213 38.8077C2.97838 38.8624 2.73619 39.003 2.57994 39.378C2.42369 39.7452 2.54869 40.1359 2.89244 40.3468C3.12681 40.4952 3.35337 40.4952 12.119 40.4796L21.1034 40.4562L21.6503 40.2765C23.6112 39.6124 24.9549 38.2687 25.6034 36.3155C25.7753 35.7999 25.7831 35.628 25.8143 33.128L25.8456 30.4952H28.8456C32.1034 30.4952 32.1659 30.4874 32.3924 30.0734C32.4784 29.9015 32.494 28.0265 32.5018 18.5265L32.5096 7.17492L35.6034 7.13586C38.994 7.09679 38.8768 7.11242 39.0878 6.61242C39.2284 6.26867 39.2206 4.52648 39.0721 3.81554C38.9081 3.01867 38.5409 2.36242 37.9237 1.73742C37.3456 1.15148 36.5956 0.737417 35.8456 0.581167C35.3612 0.479605 21.2518 0.471792 20.6581 0.573355ZM31.6112 2.17492C31.6112 2.19054 31.4862 2.43273 31.3378 2.69836C30.8065 3.66711 30.8299 3.11242 30.8299 14.4171V24.6359L30.3456 24.3702C29.3065 23.8077 29.5643 23.8234 23.2128 23.8155H17.5096V14.753V5.69054L17.6815 5.14367C18.1737 3.57336 19.5643 2.40929 21.1424 2.21398C21.6815 2.15148 31.6112 2.11242 31.6112 2.17492ZM36.0721 2.43273C36.5331 2.65929 36.9628 3.08898 37.2206 3.58117C37.3846 3.90148 37.4315 4.10461 37.4549 4.72961L37.4862 5.49523H34.9706H32.4471L32.5018 4.84679C32.5253 4.49523 32.5878 4.07336 32.6268 3.91711C32.8065 3.26867 33.5721 2.49523 34.2206 2.29211C34.6581 2.15929 35.6737 2.23742 36.0721 2.43273ZM24.7049 25.9796C24.1971 26.9093 24.1971 26.9171 24.1659 31.3546C24.1424 35.2296 24.1346 35.3937 23.9706 35.8859C23.5565 37.1515 22.494 38.214 21.2284 38.6359C20.7128 38.8077 20.7049 38.8155 14.0956 38.839C10.4471 38.8546 7.47056 38.839 7.47056 38.8155C7.47056 38.7843 7.62681 38.5812 7.82213 38.3624C8.25963 37.8546 8.7362 36.964 8.96276 36.1984C9.12682 35.6437 9.13463 35.4171 9.18151 32.1749C9.2362 28.8077 9.2362 28.7296 9.41588 28.2687C9.94713 26.9249 11.1034 25.9015 12.4237 25.6124C12.7987 25.5343 14.2362 25.503 18.9315 25.503L24.9706 25.4952L24.7049 25.9796ZM29.3768 25.7609C30.2831 26.1749 30.7518 26.9562 30.8143 28.128L30.8534 28.8546H28.3299H25.8065L25.8456 28.128C25.8768 27.5655 25.9315 27.2999 26.0799 26.9718C26.6659 25.714 28.1268 25.1749 29.3768 25.7609Z" fill="#ED790E"/>
                            <path d="M19.58 5.62798C19.2753 5.83891 19.1971 5.97954 19.1893 6.3311C19.1893 6.58891 19.2362 6.7061 19.4315 6.8936L19.6737 7.13579H24.1425C28.5175 7.13579 28.6268 7.13579 28.8221 6.97954C29.119 6.74516 29.2284 6.35454 29.08 6.0186C28.8612 5.47954 28.9862 5.49516 24.1346 5.49516C20.1503 5.49516 19.7518 5.50298 19.58 5.62798Z" fill="#ED790E"/>
                            <path d="M19.58 10.628C19.2753 10.8389 19.1971 10.9795 19.1893 11.3311C19.1893 11.5889 19.2362 11.7061 19.4315 11.8936L19.6737 12.1358H24.1425C28.5175 12.1358 28.6268 12.1358 28.8221 11.9795C29.119 11.7452 29.2284 11.3545 29.08 11.0186C28.8612 10.4795 28.9862 10.4952 24.1346 10.4952C20.1503 10.4952 19.7518 10.503 19.58 10.628Z" fill="#ED790E"/>
                            <path d="M19.58 15.628C19.2753 15.8389 19.1971 15.9795 19.1893 16.3311C19.1893 16.5889 19.2362 16.7061 19.4315 16.8936L19.6737 17.1358H24.1425C28.5175 17.1358 28.6268 17.1358 28.8221 16.9795C29.119 16.7452 29.2284 16.3545 29.08 16.0186C28.8612 15.4795 28.9862 15.4952 24.1346 15.4952C20.1503 15.4952 19.7518 15.503 19.58 15.628Z" fill="#ED790E"/>
                            <path d="M19.58 20.628C19.2753 20.8389 19.1971 20.9795 19.1893 21.3311C19.1893 21.5889 19.2362 21.7061 19.4315 21.8936L19.6737 22.1358H24.1425C28.5175 22.1358 28.6268 22.1358 28.8221 21.9795C29.119 21.7452 29.2284 21.3545 29.08 21.0186C28.8612 20.4795 28.9862 20.4952 24.1346 20.4952C20.1503 20.4952 19.7518 20.503 19.58 20.628Z" fill="#ED790E"/>
                            <path d="M11.119 29.0576C11.0019 29.167 10.8925 29.3311 10.8612 29.417C10.7831 29.6748 10.9003 30.0654 11.1112 30.2686L11.3144 30.4561L16.5175 30.4795C19.3847 30.4873 21.7987 30.4795 21.8925 30.4639C21.9784 30.4404 22.1503 30.3232 22.2597 30.2139C22.5722 29.9092 22.5565 29.417 22.2284 29.0967L21.9862 28.8545H16.6581H11.3222L11.119 29.0576Z" fill="#ED790E"/>
                            <path d="M11.119 34.0576C11.0019 34.167 10.8925 34.3311 10.8612 34.417C10.7831 34.6748 10.9003 35.0654 11.1112 35.2686L11.3144 35.4561L16.5175 35.4795C19.3847 35.4873 21.7987 35.4795 21.8925 35.4639C21.9784 35.4404 22.1503 35.3232 22.2597 35.2139C22.5722 34.9092 22.5565 34.417 22.2284 34.0967L21.9862 33.8545H16.6581H11.3222L11.119 34.0576Z" fill="#ED790E"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_1953_6053">
                            <rect width="40" height="40" fill="white" transform="translate(0.829956 0.495117)"/>
                            </clipPath>
                        </defs>
                        </svg>                         
                        <div class="text-end">
                            <h2 class="angka m-0">{{ $tertunda }}</h2>
                            <p>Pesanan Tertunda</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12"> <!-- Mengganti col-lg-7 col-xl-8 menjadi col-lg-12 -->
            <div class="card" data-iq-gsap="onStart"
                data-iq-opacity="0"
                data-iq-position-y="-40"
                data-iq-duration=".6"
                data-iq-delay=".4"
                data-iq-trigger="scroll"
                data-iq-ease="none">
                <div class="card-header">
                    <h4 class="card-title">Total Pembelian</h4>
                    <small>2023-2024</small>
                </div>
                <div class="card-body" data-iq-gsap="onStart"
                    data-iq-opacity="0"
                    data-iq-position-y="-40"
                    data-iq-duration=".6"
                    data-iq-delay=".6"
                    data-iq-trigger="scroll"
                    data-iq-ease="none">
                    <div id="admin-chart-1" class="admin-chart-1"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-xl-7">
            <div class="card overflow-hidden" data-aos="fade-up" data-aos-delay="600" data-iq-gsap="onStart"
                data-iq-opacity="0"
                data-iq-position-y="-40"
                data-iq-duration=".6"
                data-iq-delay="1"
                data-iq-trigger="scroll"
                data-iq-ease="none">
                <div class="card-header border-0 pb-0">
                    <div class="header-title">
                        <h4 class="card-title">Menu yang sedang populer</h4>
                    </div>
                </div>
                <div class="card-body py-0">
                    <div class="table-responsive">
                        <table id="basic-table" class="table mb-0 iq-table user-list-table" role="grid">
                            <thead>
                            <tr>
                                <th>Gambar</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Terjual</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img class="bg-soft-primary rounded img-fluid avatar-80 me-3" src="../assets/images/avatars/06.png" alt="profile">
                                    </div>
                                </td>
                                <td>
                                    Nasi Goreng
                                </td>
                                <td>15.000</td>
                                <td>
                                    41
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-5">
            <div class="card" style="max-height: 450px; overflow-y: scroll;">
                <div class="card-header">
                    <h4 class="card-title">Riwayat Pesanan</h4>
                </div>
                <div class="card-body">
                    <!-- Tambahkan riwayat pesanan di sini -->
                    <div class="media">
                        <img class="bg-soft-primary rounded img-fluid avatar-80 me-3" src="../assets/images/avatars/06.png" alt="profile">
                        <div class="media-body">
                            <h6 class="mb-0">Nasi Goreng</h6>
                            <div class="d-flex justify-content-between align-items-center">
                                    <p>Nomor Pesanan: #12345</p>
                                    <p>Harga: 15.000</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="media">
                    <img class="bg-soft-primary rounded img-fluid avatar-80 me-3" src="../assets/images/avatars/06.png" alt="profile">
                        <div class="media-body">
                            <h6 class="mb-0">Mie Ayam</h6>
                            <p>Nomor Pesanan: #54321</p>
                            <p>Harga: 18.000</p>
                        </div>
                    </div>
                    
                    <!-- Tambahkan informasi riwayat pesanan lainnya di sini -->
                </div>
            </div>
        </div>

    </div>


    </div>
</div>
        {{-- @include('layout.footer') --}}
    </main>
    @include('layout.js')
</body>
</html>
