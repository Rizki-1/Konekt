<!doctype html>
<html lang="en" dir="ltr">
<!-- Mirrored from templates.iqonic.design/aprycot/html/dashboard/dist/dashboard/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 Aug 2023 04:52:12 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Kuliner kita</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#metode').change(function() {
                var selectedOption = $(this).val();

                if (selectedOption === 'e-wallet') {
                    $('#e-wallet-fields').show();
                    $('#bank-fields').hide();
                } else if (selectedOption === 'bank') {
                    $('#e-wallet-fields').hide();
                    $('#bank-fields').show();
                } else {
                    $('#e-wallet-fields').hide();
                    $('#bank-fields').hide();
                }
            });
        });

        $(document).ready(function() {
            // Tangani perubahan pada elemen select
            $("#selectMetode").change(function() {
                // Dapatkan nilai yang dipilih
                var selectedMetode = $(this).val();

                // Sembunyikan semua modals
                $(".modal").modal("hide");

                // Jika yang dipilih adalah "bank", tampilkan modal bank
                if (selectedMetode === "bank") {
                    $("#myModalBank").modal("show");
                } else {
                    // Jika yang dipilih adalah "ewallet", tampilkan modal E-Wallet
                    $("#myModal2").modal("show");
                }

            });

            // Tangani klik pada tombol "Next" di dalam modal pertama
            $("#nextButton").click(function() {
                // Dapatkan atribut data-target yang menentukan modal selanjutnya
                var targetModalId = $(this).data("target");

                $("#myModal2").modal("show");

            });

            // Tangani klik pada tombol "Next" di dalam modal kedua (opsional jika diperlukan)
            $("#nextButton2").click(function() {
                // Dapatkan atribut data-target yang menentukan modal selanjutnya (jika ada)
                var targetModalId = $(this).data("target");

                // Sembunyikan modal saat ini (yaitu modal kedua)
                $("#myModal2").modal("hide");

                // Tampilkan modal selanjutnya berdasarkan data-target
                $(targetModalId).modal("show");
            });
        });
    </script>
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

</head>

<body class="  "
    style="background:url(../../assets/images/dashboard.png);    background-attachment: fixed;
    background-size: cover;">

    {{-- Alert --}}
    @if (Session::has('notif.error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "{{ Session::get('notif.error') }}",
            });
        </script>
    @endif

    @if (Session::has('notif.success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: "{{ Session::get('notif.success') }}",
            });
        </script>
    @endif
    {{-- Alert --}}
    <script>
        $(document).ready(function() {
            // Listen for the submit event on all forms with the name "store"
            $("form[name='store']").submit(function(event) {
                event.preventDefault();

                // Validate the form data within this specific form
                var keterangan_bank = $(this).find("input[name='keterangan_bank']").val();
                var tujuan_bank = $(this).find("input[name='tujuan_bank']").val();
                var isDuplicate = checkUniquenessKeterangan(keterangan_bank, this);

                if (isDuplicate) {
                    Swal.fire({
                        title: 'Peringatan',
                        text: 'Keterangan harus unik.',
                        icon: 'warning',
                    });
                    return;
                }

                if (tujuan_bank === "") {
                    Swal.fire({
                        title: 'Peringatan',
                        text: 'Tujuan tidak boleh kosong.',
                        icon: 'warning',
                    });
                    return;
                }

                if (keterangan_bank < 5) {
                    Swal.fire({
                        title: 'Peringatan',
                        text: 'Minimal 5.',
                        icon: 'warning',
                    });
                    return;
                }

                if (keterangan === "") {
                    Swal.fire({
                        title: 'Peringatan',
                        text: 'Keterangan tidak boleh kosong.',
                        icon: 'warning',
                    });
                    return;
                }

                if (keterangan < 0) {
                    Swal.fire({
                        title: 'Peringatan',
                        text: 'Keterangan tidak boleh kurang dari nol.',
                        icon: 'warning',
                    });
                    return;
                }

                Swal.fire('Berhasil', 'Berhasil menambahkan data', 'success');

                // Menghapus event handler submit agar form tidak disubmit kembali
                $(this).off("submit");

                // Submit form
                this.submit();
            });

            function checkUniquenessKeterangan(keterangan_bank, currentForm) {
                var isDuplicate = false;
                $("form[name='store']").each(function() {
                    if (this !== currentForm) {
                        var existingKeterangan = $(this).find("input[name='keterangan_bank']").val();
                        if (keterangan_bank === existingKeterangan) {
                            isDuplicate = true;
                            return false; // Hentikan iterasi jika ada yang sama
                        }
                    }
                });
                return isDuplicate;
            }
        });
    </script>
    <form action="{{ route('pembayaranpenjual_store') }}" method="POST" enctype="multipart/form-data" name="store">
        @csrf
        <div class="modal" id="myModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Metode Pembayaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="container m-2 p-0 d-flex justify-content-between">
                        <div class="d-grid" style="display: flex; justify-content: space-between;">
                            <label for="metode" class="form-label fw-bold"
                                style="align-self: center; font-size: 16px;"> PIlih Metode Pembayaran</label>
                            <select class="form-select mb-3" name="metodepembayaran" aria-label=".form-select example"
                                id="selectMetode">
                                <option selected class="dropdown-menu" disabled>Pilih Pembayaran</option>
                                <option value="e-wallet" data-target="#myModal2">E-Wallet</option>
                                <option value="bank" data-target="myModalBank">Bank</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <div class="modal fade" id="myModal2" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Metode Pembayaran E-wallet</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="mb-3">
                                <label for="tujuan_e_wallet" class="form-label fw-bold">Tujuan</label>
                                <input type="text" class="form-control" id="tujuan_e_wallet" name="tujuan_e_wallet">
                                @if ($errors->has('tujuan_e_wallet'))
                                    <span class="text-danger">{{ $errors->first('tujuan_e_wallet') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="keterangan_e_wallet" class="form-label fw-bold">Keterangan</label>
                                <input type="file" class="form-control" id="keterangan_e_wallet"
                                    name="keterangan_e_wallet">
                                @if ($errors->has('keterangan_e_wallet'))
                                    <span class="text-danger">{{ $errors->first('keterangan_e_wallet') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                data-bs-target="#myModal">Kembali</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="myModalBank" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Metode Pembayaran Bank</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="tujuan_bank" class="form-label fw-bold">Tujuan</label>
                            <input type="text" class="form-control" id="tujuan_bank" name="tujuan_bank">
                            @if ($errors->has('tujuan_bank'))
                                <span class="text-danger">{{ $errors->first('tujuan_bank') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="keterangan_bank" class="form-label fw-bold">Nomor Rekening</label>
                            <input type="number" class="form-control" id="keterangan_bank" name="keterangan_bank"
                                rows="3">
                            @if ($errors->has('keterangan_bank'))
                                <span class="text-danger">{{ $errors->first('keterangan_bank') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                            data-bs-target="#myModal">Kembali</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </form>
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
                        <a class="nav-link active" href="pembayaranpenjual">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="26"
                                    viewBox="0 0 25 26" fill="none">
                                    <path
                                        d="M18.75 5.51367H6.25C4.52411 5.51367 3.125 6.91278 3.125 8.63867V16.972C3.125 18.6979 4.52411 20.097 6.25 20.097H18.75C20.4759 20.097 21.875 18.6979 21.875 16.972V8.63867C21.875 6.91278 20.4759 5.51367 18.75 5.51367Z"
                                        stroke="white" stroke-width="1.23" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M3.125 10.7207H21.875" stroke="white" stroke-width="1.23"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M7.29224 15.9297H7.30224" stroke="white" stroke-width="1.23"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M11.4578 15.9297H13.5411" stroke="white" stroke-width="1.23"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </i>
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
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                    <li><button type="submit" class="dropdown-item"> logout </button></li>
                                    </form>
                            </li>
                        </ul>
                        </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <!-- The modal itself -->

        @foreach ($pembayaranpenjual as $p)
            <div class="modal fade" id="editModal-{{ $p->id }}" tabindex="-1" role="dialog">
                <form action="{{ route('pembayaranupdate', ['id' => $p->id]) }}" method="POST" name="edit"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Konten Form Edit Data -->
                                <!-- Misalnya: -->
                                <div class="mb-3">
                                    <label for="metodepembayaran" class="form-label fw-bold">Metode Pembayaran</label>
                                    <input type="text" class="form-control" id="metodepembayaran"
                                        name="metodepembayaran" value="{{ $p->metodepembayaran }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="tujuan" class="form-label fw-bold">Tujuan</label>
                                    <input type="text" class="form-control" id="tujuan" name="tujuan"
                                        value="{{ $p->tujuan }}">
                                    @if ($errors->has('tujuan'))
                                        <span class="text-danger">{{ $errors->first('tujuan') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="keterangan" class="form-label fw-bold">Keterangan</label>
                                    @php
                                        $long = strlen($p->keterangan);
                                    @endphp
                                    @if ($long >= 20)
                                        <input type="file" class="form-control"
                                            value="{{ asset('storage/pembayaran/' . $p->keterangan) }}"
                                            name="keterangan" id="keterangan">
                                        <input type="hidden" value="{{ $p->keterangan }}" name="keterangan">
                                        {{-- @dump($p->keterangan); --}}
                                        <img src="{{ asset('storage/pembayaran/' . $p->keterangan) }}"
                                            style="width:120px;height:120px;margin-top:15px;" alt="tes">
                                    @else
                                        <input type="number" class="form-control" name="keterangan" id="keterangan"
                                            value="{{ $p->keterangan }}">
                                    @endif
                                </div>
                                <!-- ... Tambahkan input lain sesuai kebutuhan ... -->
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

        {{-- js validasi edit --}}
        <script>
            $(document).ready(function() {
                // Listen for the submit event on all forms with the name "edit"
                $("form[name='edit']").submit(function(event) {
                    event.preventDefault();

                    // Validate the form data within this specific form
                    var tujuan = $(this).find("input[name='tujuan']").val();
                    var keterangan = $(this).find("input[name='keterangan']").val();
                    // Cek apakah 'keterangan' adalah input file
                    var isFileInput = $(this).find("input[name='keterangan']").attr("type") === "file";

                    // Cek keunikan tujuan dan keterangan
                    // var isTujuanDuplicate = checkUniquenessTujuan(tujuan, this);
                    var isKeteranganDuplicate = checkUniquenessKeterangan(keterangan, this);

                    // if (isTujuanDuplicate) {
                    //     Swal.fire({
                    //         title: 'Peringatan',
                    //         text: 'Tujuan harus unik.',
                    //         icon: 'warning',
                    //     });
                    //     return;
                    // }

                    if (isKeteranganDuplicate) {
                        Swal.fire({
                            title: 'Peringatan',
                            text: 'Data sudah di gunakan',
                            icon: 'warning',
                        });
                        return;
                    }

                    if (tujuan === "") {
                        Swal.fire({
                            title: 'Peringatan',
                            text: 'Tujuan tidak boleh kosong.',
                            icon: 'warning',
                        });
                        return;
                    }

                    if (!isFileInput && keterangan === "") {
                        Swal.fire({
                            title: 'Peringatan',
                            text: 'Keterangan tidak boleh kosong.',
                            icon: 'warning',
                        });
                        return;
                    }

                    if (!isFileInput && keterangan < 0) {
                        Swal.fire({
                            title: 'Peringatan',
                            text: 'Keterangan tidak boleh kurang dari nol.',
                            icon: 'warning',
                        });
                        return;
                    }
                    // Jika validasi berhasil, Anda dapat melakukan submit form
                    Swal.fire('Berhasil', 'Berhasil mengedit data', 'success');

                    // // Menghapus event handler submit agar form tidak disubmit kembali
                    $(this).off("submit");

                    // Submit form
                    this.submit();
                });

                // // Fungsi untuk memeriksa keunikan tujuan dalam formulir
                // function checkUniquenessTujuan(tujuan, currentForm) {
                //     var isDuplicate = false;
                //     $("form[name='edit']").each(function() {
                //         if (this !== currentForm) {
                //             var existingTujuan = $(this).find("input[name='tujuan']").val();
                //             if (tujuan === existingTujuan) {
                //                 isDuplicate = true;
                //                 return false; // Hentikan iterasi jika ada yang sama
                //             }
                //         }
                //     });
                //     return isDuplicate;
                // }

                // Fungsi untuk memeriksa keunikan keterangan dalam formulir
                function checkUniquenessKeterangan(keterangan, currentForm) {
                    var isDuplicate = false;
                    $("form[name='edit']").each(function() {
                        if (this !== currentForm) {
                            var existingKeterangan = $(this).find("input[name='keterangan']").val();
                            if (keterangan === existingKeterangan) {
                                isDuplicate = true;
                                return false; // Hentikan iterasi jika ada yang sama
                            }
                        }
                    });
                    return isDuplicate;
                }
            });
        </script>
        {{-- js validasi edit --}}

        <!-- Start Isi Dashboard -->
        <div class="content-inner mt-5 py-0">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                        data-bs-target="#myModal">Tambah Pembayaran</button>
                    <div class="col active" data-iq-gsap="onStart" data-iq-opacity="0" data-iq-position-y="-40"
                        data-iq-duration=".6" data-iq-delay=".6" data-iq-trigger="scroll" data-iq-ease="none">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">metode pembayaran</th>
                                    <th scope="col">tujuan</th>
                                    <th scope="col">keterangan</th>
                                    <th scope="col">aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($pembayaranpenjual as $p)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $p->metodepembayaran }}</td>
                                        <td>{{ $p->tujuan }}</td>
                                        @php
                                            $i = strlen($p->keterangan);
                                        @endphp
                                        <td>
                                            @if ($i >= 20)
                                                <img src="{{ asset('storage/pembayaran/' . $p->keterangan) }}"
                                                    style="width:120px;height:120px;" alt="tes">
                                            @else
                                                {{ $p->keterangan }}
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <button style="margin-right: 10px;" type="submit"
                                                    class="btn btn-outline-warning " data-bs-toggle="modal"
                                                    data-bs-target="#editModal-{{ $p->id }}">
                                                    Edit
                                                </button>

                                                <form action="{{ route('pembayaranpenjual_destroy', $p->id) }}"
                                                    method="POST" id="delete-form{{ $p->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-outline-danger"
                                                        onclick="deletePembayaran({{ $p->id }})"> Hapus
                                                    </button>
                                                </form>
                                                <script>
                                                    function deletePembayaran(id) {
                                                        Swal.fire({
                                                            title: 'Apakah Anda Yakin?',
                                                            text: 'Data akan terhapus selamanya!',
                                                            icon: 'question',
                                                            showCancelButton: true,
                                                            confirmButtonText: 'Ya, Hapus',
                                                            cancelButtonText: 'Batal',
                                                            reverseButtons: true
                                                        }).then((result) => {
                                                            if (result.isConfirmed) {
                                                                document.getElementById('delete-form' + id).submit();
                                                            }
                                                        });
                                                    }
                                                </script>

                                            </div>
                                        </td>
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
