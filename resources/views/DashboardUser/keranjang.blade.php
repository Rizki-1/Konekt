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
    <link rel="shortcut icon" href="../../assets/images/kuliner.png" />

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
                        <a class="nav-link" href="menu" role="button">
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
                        <!--  ACTIVE = PILIHAN SIDE BAR BERWARNA -->
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="daftartoko">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="30"
                                    viewBox="0 0 27 23" fill="none">
                                    <path
                                        d="M26.1895 6.67998L24.377 1.24248C24.3139 1.05491 24.1912 0.893125 24.0276 0.781849C23.8639 0.670572 23.6684 0.615917 23.4707 0.626232H3.53323C3.33561 0.615917 3.14004 0.670572 2.9764 0.781849C2.81276 0.893125 2.69004 1.05491 2.62698 1.24248L0.81448 6.67998C0.801423 6.77621 0.801423 6.87376 0.81448 6.96998V12.4075C0.81448 12.6478 0.909959 12.8783 1.07991 13.0483C1.24987 13.2183 1.48038 13.3137 1.72073 13.3137H2.62698V22.3762H4.43948V13.3137H9.87698V22.3762H24.377V13.3137H25.2832C25.5236 13.3137 25.7541 13.2183 25.924 13.0483C26.094 12.8783 26.1895 12.6478 26.1895 12.4075V6.96998C26.2025 6.87376 26.2025 6.77621 26.1895 6.67998ZM22.5645 20.5637H11.6895V13.3137H22.5645V20.5637ZM24.377 11.5012H20.752V7.87623H18.9395V11.5012H14.4082V7.87623H12.5957V11.5012H8.06448V7.87623H6.25198V11.5012H2.62698V7.11498L4.18573 2.43873H22.8182L24.377 7.11498V11.5012Z"
                                        fill="#959895" />
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
                        <a class="nav-link active"
                            href="{{ asset('UserKeranjang') }}"><!-- Tambahkan / sebelum keranjang -->
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="30"
                                    viewBox="0 0 31 25" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M15.0996 2.50046C14.0294 2.50055 12.9869 2.801 12.1232 3.35832C11.2595 3.91564 10.6194 4.7009 10.2955 5.6004L9.16151 8.75033H21.0377L19.9037 5.6004C19.5798 4.7009 18.9397 3.91564 18.076 3.35832C17.2123 2.801 16.1699 2.50055 15.0996 2.50046ZM24.0117 8.75033L22.6055 4.84416C22.0999 3.43854 21.0998 2.21137 19.7503 1.34042C18.4008 0.469478 16.7719 0 15.0996 0C13.4273 0 11.7984 0.469478 10.4489 1.34042C9.09935 2.21137 8.09935 3.43854 7.59371 4.84416L6.18751 8.75033H2.83501C2.39239 8.75035 1.95591 8.84174 1.56054 9.01721C1.16516 9.19267 0.821875 9.44733 0.558155 9.7608C0.294435 10.0743 0.117611 10.4378 0.0418433 10.8224C-0.0339244 11.2069 -0.00652333 11.6018 0.121835 11.9753L1.71515 16.6127L3.68271 22.3376C3.94735 23.1077 4.48587 23.7823 5.21874 24.2616C5.95161 24.7411 6.83994 25 7.75247 25H22.4467C23.3591 24.9998 24.247 24.7408 24.9796 24.2613C25.7122 23.7819 26.2506 23.1074 26.5151 22.3376L28.4841 16.6127L30.0774 11.9753C30.2058 11.6018 30.2332 11.2069 30.1573 10.8224C30.0816 10.4378 29.9047 10.0743 29.6411 9.7608C29.3774 9.44733 29.0341 9.19267 28.6387 9.01721C28.2434 8.84174 27.8068 8.75035 27.3642 8.75033H24.0117ZM7.22373 11.2503H2.83501L4.12356 15.0002H9.48188L8.90069 11.2503H7.22373ZM11.7627 11.2503L12.3425 15.0002H17.8567L18.4379 11.2503H11.7627ZM21.2985 11.2503L20.7173 15.0002H26.0756L27.3642 11.2503H21.2985ZM25.2166 17.5002H20.3303L19.5578 22.5001H22.4453C22.7495 22.5001 23.0456 22.4138 23.2899 22.2539C23.5341 22.0942 23.7137 21.8693 23.8019 21.6126L25.2166 17.5002ZM16.6972 22.5001L17.4697 17.5002H12.7281L13.502 22.5001H16.6972ZM10.64 22.5001L9.86745 17.5002H4.98259L6.39588 21.6126C6.4841 21.8693 6.6636 22.0942 6.9079 22.2539C7.15219 22.4138 7.4483 22.5001 7.75247 22.5001H10.64Z"
                                        fill="#fff" />
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
        <div class="content-inner mt-5 py-0">
            <div class="card col-md-12 col-lg-12">
                <div class="card-body h-100">
                    <div class="col active" data-iq-gsap="onStart" data-iq-opacity="0" data-iq-position-y="-40"
                        data-iq-duration=".6" data-iq-delay=".6" data-iq-trigger="scroll" data-iq-ease="none">
                        <h3 class="card-title" style="color:#F66F0C">
                            <i class="fas fa-shopping-cart"></i> Keranjang Saya
                        </h3>
                        <hr>

                        @php
                            $groupedItems = $keranjangItems->groupBy('barangpenjual.toko_id');
                        @endphp

                        @forelse ($groupedItems as $toko_id => $items)
                            @php
                                // Retrieve the store name (namatoko) based on user_id
                                $storeName = \App\Models\penjuallogin::where('user_id', $toko_id)->value('nama_toko');
                            @endphp

                            <table class="table text-center">
                                <thead>
                                    <div class="d-flex ms-5" id="namatoko">
                                        <input type="checkbox" name="selectAllItems" class="selectAllItems my-3"
                                            data-toko-id="{{ $storeName }}">
                                        <a href="{{ route('detailtoko', ['id' => $toko_id]) }}"
                                            class="fs-5 text-black mx-5 my-2"><i class="bi bi-shop"></i>
                                            {{ $storeName }}</a>
                                    </div>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody id="tabelKeranjang">
                                    @foreach ($items as $p)
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="itemCheckbox" class="itemCheckbox"
                                                    data-toko-id="{{ $storeName }}" value="{{ $p->id }}">
                                            </td>
                                            <td>
                                                <img src="{{ Storage::url($p->barangpenjual->fotomakanan) }}"
                                                    width="100px" alt="" srcset="">
                                                {{ $p->barangpenjual->namamenu }}
                                            </td>
                                            <td>Rp. {{ number_format($p->barangpenjual->harga, 0, ',', '.') }} </td>
                                            <td>
                                                <div class="input-group">
                                                    <button type="button"
                                                        class="btn btn-outline-primary btn-sm minus-btn">–</button>
                                                    <input type="number"
                                                        class="form-control product-quantity text-center"
                                                        style="width: 30px" value="{{ $p->jumlah }}"
                                                        min="0" max="100" readonly
                                                        data-product-id="{{ $p->id }}">
                                                    <button type="button"
                                                        class="btn btn-outline-primary btn-sm plus-btn">+</button>
                                                </div>
                                            </td>
                                            <td class="total-td">Rp. <span class="total" data-bs-toggle="tooltip"
                                                    data-bs-placement="top"
                                                    data-bs-title="5% Biaya Admin">{{ number_format($p->totalHarga, 0, ',', '.') }}</span>
                                            </td>
                                            <td>
                                                <button type="submit" class="btn btn-outline-danger hapus"
                                                    data-item-id="{{ $p->id }}" style="border-radius: 10%;"><i
                                                        class="bi bi-trash-fill"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @empty
                                    <p>Anda belum menambahkan keranjang.</p>
                        @endforelse
                        </tbody>
                        </table>
                        @if ($keranjangItems->count() > 0)
                            <div class="d-flex container-fluid" id="keranjang">
                                <div class="me-2">
                                    <input type="checkbox" id="checkAllItems">
                                    <label for="checkAllItems" style="cursor: pointer; color:#000000">
                                        Pilih Semua
                                    </label>
                                </div>
                                <div class="ms-auto">
                                    <button type="button" class="btn btn-primary" id="beli">Beli</button>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </main>
    @include('layout.js')
</body>

</html>

{{-- JS for Update jumlah --}}
<script>
    $(document).ready(function() {
        $(".minus-btn").on("click", function() {
            updateCartItem($(this), -1);
        });

        $(".plus-btn").on("click", function() {
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
                    success: function(response) {
                        if (response.success) {
                            var totalElement = button.closest("tr").find(".total");
                            var formattedTotal = response.totalHarga.toLocaleString('id-ID');
                            totalElement.text(formattedTotal);
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function() {
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
    $(document).ready(function() {
        $(".hapus").click(function() {
            var itemId = $(this).data("item-id");
            var itemElement = $(this).closest("tr");

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
                        success: function(response) {
                            if (response.success) {
                                // Item keranjang berhasil dihapus
                                Swal.fire('Sukses',
                                    'Item keranjang berhasil dihapus.',
                                    'success');

                                // Hapus elemen item dari tampilan
                                itemElement.remove();

                                // Perbarui jumlah item keranjang
                                updateItemCount();
                            } else {
                                // Gagal menghapus item keranjang
                                Swal.fire('Gagal', 'Item keranjang gagal dihapus.',
                                    'error');
                            }
                        },
                        error: function() {

                            Swal.fire('Error',
                                'Terjadi kesalahan dalam menghapus item keranjang.',
                                'error');
                        }
                    });
                }
            });
        });

        // Ambil elemen-elemen yang ingin dihapus jika tidak ada <tr>
        var keranjangContainer = document.getElementById('keranjang');
        var thead = document.querySelector('thead');

        // Fungsi untuk memeriksa apakah ada <tr> dalam tabel
        function cekTrAda() {
            var tabel = document.getElementById(
                'tabelKeranjang'); // Ganti 'tabelKeranjang' dengan ID tabel Anda
            var trItems = tabel.getElementsByTagName('tr');
            return trItems.length > 0;
        }

        // Fungsi untuk mengubah class jika tidak ada <tr>
        function ubahClassJikaTrTidakAda() {
            if (!cekTrAda()) {
                keranjangContainer.classList.remove('d-flex');
                keranjangContainer.classList.add('d-none');
                thead.remove();
            } else {
                keranjangContainer.classList.remove('d-none');
                keranjangContainer.classList.add('d-flex');
            }
        }

        function updateItemCount() {
            var itemCount = $(".item-checkbox:checked").length;

            if (itemCount === 0) {
                ubahClassJikaTrTidakAda();
                pesanKeranjang.show();
            }
        }
    });
</script>
{{-- AJAX delete --}}

{{-- AJAX order --}}
<script>
    $(document).ready(function() {
        // Ketika tombol "Pilih Semua" diubah
        $("#checkAllItems").change(function() {
            var isChecked = $(this).prop("checked");

            // Perbarui status semua checkbox-item keranjang sesuai dengan tombol "Pilih Semua"
            $(".itemCheckbox").prop("checked", isChecked);
            $(".selectAllItems").prop("checked", isChecked);

            // Periksa apakah semua selectAllItems tercentang
            var allSelectAllChecked = $(".selectAllItems:checked").length === $(".selectAllItems")
                .length;

            // Perbarui status checkbox "Pilih Semua" utama
            $("#checkAllItems").prop("checked", allSelectAllChecked);
        });

        // Ketika checkbox "Pilih Semua" berdasarkan toko diubah
        $(".selectAllItems").change(function() {
            var tokoId = $(this).data("toko-id");
            var isChecked = $(this).prop("checked");

            // Temukan semua checkbox item keranjang yang terkait dengan toko ini
            $(".itemCheckbox[data-toko-id='" + tokoId + "']").prop("checked", isChecked);

            // Periksa apakah semua checkbox-item keranjang dalam grup ini dicentang
            var allChecked = $(".itemCheckbox[data-toko-id='" + tokoId + "']:checked").length ===
                $(".itemCheckbox[data-toko-id='" + tokoId + "']").length;

            // Perbarui status checkbox "Pilih Semua" berdasarkan toko
            $(this).prop("checked", allChecked);

            // Periksa apakah semua selectAllItems tercentang
            var allSelectAllChecked = $(".selectAllItems:checked").length === $(".selectAllItems")
                .length;

            // Perbarui status checkbox "Pilih Semua" utama
            $("#checkAllItems").prop("checked", allSelectAllChecked);
        });

        // Ketika salah satu checkbox item keranjang diubah
        $(".itemCheckbox").change(function() {
            var tokoId = $(this).data("toko-id");

            // Periksa apakah semua checkbox-item keranjang dalam grup ini dicentang
            var allChecked = $(".itemCheckbox[data-toko-id='" + tokoId + "']:checked").length ===
                $(".itemCheckbox[data-toko-id='" + tokoId + "']").length;

            // Perbarui status checkbox "Pilih Semua" berdasarkan toko
            $(".selectAllItems[data-toko-id='" + tokoId + "']").prop("checked", allChecked);

            // Periksa apakah semua selectAllItems tercentang
            var allSelectAllChecked = $(".selectAllItems:checked").length === $(".selectAllItems")
                .length;

            // Perbarui status checkbox "Pilih Semua" utama
            $("#checkAllItems").prop("checked", allSelectAllChecked);
        });

        $("#beli").click(function() {
            var itemIds = [];
            // Mengumpulkan ID item yang dicentang
            $(".itemCheckbox:checked").each(function() {
                itemIds.push($(this).val());
            });

            if (itemIds.length === 0) {
                Swal.fire('Peringatan', 'Pilih salah satu item terlebih dahulu.', 'warning');
                return;
            }

            Swal.fire({
                title: 'Konfirmasi Pembelian',
                text: 'Anda yakin ingin melakukan pembelian?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, Beli',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('order') }}",
                        type: "POST",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "items": itemIds,
                        },
                        success: function(data) {
                            // Cek jika pesanan berhasil diproses
                            if (data.message === 'Pesanan berhasil diproses.') {
                                Swal.fire('Sukses', data.message, 'success');
                                // Redirect ke halaman konfirmasi pembelian
                                window.location = `/konfimasipembelian/${data.id}`;
                            }
                        },
                        error: function(response) {
                            console.log(response);
                            Swal.fire('Peringatan',
                                'Jumlah pembelian melebihi jumlah stok yang tersedia.',
                                'warning');
                        }
                    });
                }
            });

        });
    });
</script>
{{-- AJAX order --}}

</html>
