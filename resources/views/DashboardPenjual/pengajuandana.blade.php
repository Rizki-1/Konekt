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

        /* .card-content {
            flex: 1;
        } */

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
    <link rel="shortcut icon" href="../../assets/images/kuliner.png" />

    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="../../assets/css/core/libs.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Bootstrap JavaScript (termasuk jQuery) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



    <!-- Custom Css -->
    <link rel="stylesheet" href="../../assets/css/aprycot.mine209.css?v=1.0.0">
</head>
@foreach ($pengajuan as $Pengajuan)
<form action="{{ route('mengajukandana',$Pengajuan->id) }}" method="post">
    @csrf
    @method('patch')
    @foreach ($pengajuandanapenjual as $U)
    <input type="hidden" name="penjual_id" value="{{ $U->id }}"
        id="penjual_id_{{ $U->id }}">
@endforeach
    <div class="modal fade" id="exampleModal{{ $Pengajuan->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs" id="myTab-{{ $Pengajuan->id }}" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab-{{ $Pengajuan->id }}" data-bs-toggle="tab" href="#home-{{ $Pengajuan->id }}" role="tab" aria-controls="home-{{ $Pengajuan->id }}" aria-selected="true">Bank</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab-{{ $Pengajuan->id }}" data-bs-toggle="tab" href="#profile-{{ $Pengajuan->id }}" role="tab" aria-controls="profile-{{ $Pengajuan->id }}" aria-selected="false">E Wallet</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent-{{ $Pengajuan->id }}">
                        <div class="tab-pane fade show active" id="home-{{ $Pengajuan->id }}" role="tabpanel" aria-labelledby="home-tab-{{ $Pengajuan->id }}">
                            <p class="fs-7 text-dark fw-semibold" for="">Pilih Jenis</p>
                            <select name="metodepembayaran_id" class="form-select mb-3">
                                <option value="" disabled selected>Pilih jenis bank</option>
                                @foreach ($bank as $bnk)
                                    <option name="tujuan_bank" value="{{ $bnk->id }}" data-keterangan="{{ $bnk->keterangan }}">{{ $bnk->tujuan }}</option>

                                @endforeach
                            </select>
                            <div name="keterangan_bank" id="selected_bank_keterangan"></div>
                        </div>
                        <div class="tab-pane fade" id="profile-{{ $Pengajuan->id }}" role="tabpanel" aria-labelledby="profile-tab-{{ $Pengajuan->id }}">
                            <p class="fs-7 text-dark fw-semibold" for="">Pilih Jenis</p>
                            <select name="metodepembayaran_id" class="form-select mb-3">
                                <option value="" disabled selected>Pilih jenis e-wallet</option>
                                @foreach ($wallet as $wl)
                                    <option name="tujuan_e_wallet" value="{{ $wl->id }}" data-keterangan="{{ $wl->keterangan }}" data-image="{{ $wl->image }}">{{ $wl->tujuan }}</option>

                                @endforeach
                            </select>
                            <div name="keterangan_e_wallet" id="selected_wallet_image"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Ajukan</button>
                </div>
            </div>
        </div>
    </div>

</form>
@endforeach

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var modals = document.querySelectorAll('.modal');
        modals.forEach(function(modal) {
            var modalId = modal.getAttribute('id');
            var selectBankList = modal.querySelectorAll('select[name="metodepembayaran_id"]');
            var selectWalletList = modal.querySelectorAll('select[name="metodepembayaran_id"]');

            selectBankList.forEach(function(selectBank) {
                var selectedBankKeterangan = selectBank.nextElementSibling;

                selectBank.addEventListener('change', function() {
                    var selectedOption = selectBank.options[selectBank.selectedIndex];
                    selectedBankKeterangan.innerText = selectedOption.getAttribute('data-keterangan');
                });
            });

            selectWalletList.forEach(function(selectWallet) {
                var selectedWalletKeterangan = selectWallet.nextElementSibling;
                var selectedWalletImage = modal.querySelector('#selected_wallet_image');

                selectWallet.addEventListener('change', function() {
    var selectedOption = selectWallet.options[selectWallet.selectedIndex];
    selectedWalletKeterangan.innerText = selectedOption.getAttribute('data-keterangan');
    selectedWalletImage.innerHTML = '<img src="{{ asset('storage/pembayaran/') }}/' + selectedOption.getAttribute('data-keterangan') + '" alt="Selected Wallet Image"> ';
    document.querySelector('#selected_wallet_image img').style.width = '200px';
document.querySelector('#selected_wallet_image img').style.height = '200px';
});
            });
        });
    });
</script>

{{-- // $(".selectMetode").change(function() {
        //     var selectedOption = $(this).val();
        //     // Sembunyikan semua elemen
        //     $("#ewalletInput, #bankInput").hide();
    //     // Periksa opsi yang dipilih
    //     if (selectedOption) {
    //         if (selectedOption === "{{ $wallet[0]->id }}" && "{{ $wallet[0]->id }}" !== "") {
    //             $("#ewalletInput").show();
    //             $("#tujuan_e_wallet").prop('disabled', false);
    //         } else if (selectedOption === "{{ $bank[0]->id }}" && "{{ $bank[0]->id }}" !== "") {
    //             $("#bankInput").show();
    //             $("#tujuan_bank").prop('disabled', false);
    //         }
    //     }
    // }); --}}

{{-- @if (count($wallet) > 0 && count($bank) > 0) --}}
{{-- @endif --}}






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
                    <a class="nav-link " href="DashboardPenjual_">
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
                    <a class="nav-link" aria-current="page" href="{{ route('DashboardPenjual.index') }}">

                        <i class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="30"
                                viewBox="0 0 20 19" fill="none">
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
                    <a class="nav-link active" href="pengajuandana">
                        <i class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="30"
                                viewBox="0 0 21 22" fill="none">
                                <path d="M5.25 4.04688H13.125V5.35938H5.25V4.04688Z" fill="white" />
                                <path d="M5.25 6.67285H13.125V7.98535H5.25V6.67285Z" fill="white" />
                                <path d="M5.25 9.29785H9.1875V10.6104H5.25V9.29785Z" fill="white" />
                                <path d="M5.25 15.8604H7.875V17.1729H5.25V15.8604Z" fill="white" />
                                <path
                                    d="M19.4972 12.7714L17.5284 10.8027C17.4675 10.7417 17.3952 10.6933 17.3156 10.6603C17.236 10.6273 17.1506 10.6104 17.0645 10.6104C16.9783 10.6104 16.8929 10.6273 16.8133 10.6603C16.7337 10.6933 16.6614 10.7417 16.6005 10.8027L10.502 16.9011V19.7979H13.3987L19.4972 13.6993C19.5581 13.6384 19.6065 13.5661 19.6395 13.4865C19.6725 13.4069 19.6895 13.3216 19.6895 13.2354C19.6895 13.1492 19.6725 13.0639 19.6395 12.9843C19.6065 12.9046 19.5581 12.8323 19.4972 12.7714ZM12.8552 18.4854H11.8145V17.4446L15.0957 14.1634L16.1364 15.2041L12.8552 18.4854ZM17.0645 14.2761L16.0237 13.2354L17.0645 12.1946L18.1052 13.2354L17.0645 14.2761Z"
                                    fill="white" />
                                <path
                                    d="M7.875 19.7978H3.9375C3.58952 19.7975 3.25589 19.6591 3.00983 19.413C2.76376 19.167 2.62536 18.8333 2.625 18.4854V2.73535C2.62536 2.38737 2.76376 2.05374 3.00983 1.80768C3.25589 1.56161 3.58952 1.42322 3.9375 1.42285H14.4375C14.7855 1.42322 15.1191 1.56161 15.3652 1.80768C15.6112 2.05374 15.7496 2.38737 15.75 2.73535V9.29785H14.4375V2.73535H3.9375V18.4854H7.875V19.7978Z"
                                    fill="white" />
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
                        <!-- isi dari notifikasi-->
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
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="profilepenjual">Profile</a></li>
                                <li><a class="dropdown-item" href="app/user-privacy-setting.html">Privacy Setting</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="auth/sign-in.html">Logout</a></li>
                            </ul>
                        </li>
                        <!-- End Profile-->
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <style>
        *::-webkit-scrollbar {
            display: none;
        }
    </style>

    <div class="content-inner mt-5 py-0">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body" style="overflow: hidden; padding-right: 40px">
                        <div class="row">
                            <div style="overflow: auto" class="" data-iq-gsap="onStart" data-iq-opacity="0"
                                data-iq-position-y="-40" data-iq-duration=".6" data-iq-delay=".8"
                                data-iq-trigger="scroll" data-iq-ease="none" style="position: relative">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">nama pembeli</th>
                                            <th scope="col">nama menu</th>
                                            <th scope="col">jumlah pesanan</th>
                                            <th scope="col">total</th>

                                            <th scope="col">aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($pengajuan as $Pengajuan)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $Pengajuan->userOrder->User->name }}</td>
                                                <td>{{ $Pengajuan->userOrder->penjual->namamenu }}</td>
                                                <td>{{ $Pengajuan->userOrder->jumlah }}</td>
                                                <td> Rp. {{ number_format($Pengajuan->userOrder->totalharga) }}</td>

                                                <td>
                                                    @if ($Pengajuan->status === 'sedangMengajukan')
                                                        <button
                                                            class="btn btn-outline-primary">{{ $Pengajuan->status }}</button>
                                                    @else
                                                        <button type="submit" class="btn btn-outline-primary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal{{ $Pengajuan->id }}">
                                                            {{-- @dump($Pengajuan->id) --}}
                                                            ajukan pengambilan dana
                                                        </button>
                                                    @endif
                                                </td>
                                                {{-- @dump($userOrder) --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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
