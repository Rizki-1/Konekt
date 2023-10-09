<!doctype html>
<html lang="en" dir="ltr">
<!-- Mirrored from templates.iqonic.design/aprycot/html/dashboard/dist/dashboard/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 Aug 2023 04:52:12 GMT -->

<head>

    <style>
        body {
            padding-right: 20px;
            /* Atur jumlah padding sesuai kebutuhan Anda */
        }

        .card.card-transparent {
            width: 300px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .pesan-shopee {
            position: fixed;
            bottom: 20px;
            right: 60px;
            z-index: 1000;
        }

        .btn-pesan-shopee {
            background-color: #ff5722;
            color: white;
            border: none;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            font-size: 24px;
            cursor: pointer;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* CSS untuk ikon notifikasi */
        .notification-count {
            position: absolute;
            top: 8px;
            right: 8px;
            background-color: #EA6A12;
            color: white;
            font-size: 12px;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            text-align: center;
            line-height: 18px;
            font-weight: bold;
        }

        .nav-link {
            position: relative;
            display: inline-block;
        }

        /* Untuk mengatur padding agar ikon tidak terlalu dekat dengan teks */
        .nav-link svg {
            margin-right: 10px;
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

    {{-- include links --}}
    @include('layout.link')
    {{-- include links --}}


    <link rel="stylesheet" href="{{ asset('assett/css/owl-carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assett/css/font-awesome.css') }}">

</head>

<body class=""
    style="background:url(../../assets/images/dashboard.png);    background-attachment: fixed;
    background-size: cover;">

    @include('layout.sweetalert')

    {{-- Modal Pembelian --}}
    @foreach ($penjual as $p)
        <form action="{{ route('pembelian', ['id' => $p->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal fade" id="myModal-{{ $p->id }}" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Pesanan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-4">
                                        <img src="{{ asset('storage/' . $p->fotomakanan) }}" alt="Foto Menu"
                                            class="img-fluid">
                                    </div>
                                    <div class="col-8">

                                        <p class="fs-4 text-dark">
                                            {{ $p->namamenu }}
                                            <input type="hidden" name="namamenu_id" value="{{ $p->id }}">
                                            <input type="hidden" name="user_id" value="{{ $user_id }}">
                                            <input type="hidden" name="toko_id" value="{{ $p->toko_id }}">
                                        </p>
                                        <input type="hidden" name="barangpenjual_id" value="{{ $p->id }}">
                                        <input type="hidden" name="id_toko" value="{{ $p->id }}">
                                        <p class="fs-6 text-primary">
                                            Harga :
                                            Rp. {{ $p->harga }}
                                            <input type="hidden" id="harga-{{ $p->id }}" name="harga"
                                                value="{{ $p->id }}">
                                            <input type="hidden" id="totalHarga-{{ $p->id }}" name="totalHarga"
                                                value="">
                                        </p>
                                        <p class="fs-6 text-black">
                                            Stok :
                                            {{ $p->stok }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="jumlah-{{ $p->id }}" class="form-label fw-bold">Jumlah</label>
                                <input type="number" id="jumlah-{{ $p->id }}" name="jumlah"
                                    class="form-control" placeholder="Masukan jumlah">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning text-white rounded-pill"
                                id="addToCart-{{ $p->id }}">Tambah Keranjang</button>
                            <button type="button" class="btn btn-primary pesan-btn rounded-pill"
                                id="pembelian-{{ $p->id }}" data-id="{{ $p->id }}">Pesan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endforeach
    <div class="modal fade" id="modalkategori" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Semua Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex flex-wrap justify-content-start align-items-start">
                        @foreach ($kategori as $Kategori)
                            <a href="{{ route('kategorifilter', ['kategori' => $Kategori->id]) }}"
                                class="btn btn-warning"
                                style="width: auto; margin: 0.5rem;">{{ $Kategori->kategori }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- Footer content here -->
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Pembeli --}}

    {{-- AJAX tambah pesanan --}}
    <script>
        $(document).ready(function() {
            @foreach ($penjual as $p)
                $("#pembelian-{{ $p->id }}").click(function() {

                    var jumlah = $("#jumlah-{{ $p->id }}").val();
                    var harga = {{ $p->harga }};
                    var stok = {{ $p->stok }};
                    var pajak = 0.05; // 5% pajak

                    // Periksa jika input jumlah kosong
                    if (!jumlah || jumlah <= 0) {
                        Swal.fire('Peringatan', 'Masukkan jumlah yang valid sebelum memesan!', 'warning');
                        return;
                    }

                    if (jumlah > stok) {
                        Swal.fire('Peringatan', 'Jumlah melebihi stok yang tersedia!', 'warning');
                        return;
                    }

                    // Hitung totalHarga
                    var totalHarga = jumlah * harga * (1 + pajak); // jumlah * harga * (1 + pajak)

                    // Set nilai totalHarga ke input tersembunyi
                    $("#totalHarga-{{ $p->id }}").val(totalHarga);

                    // Mendapatkan data yang diperlukan dari modal
                    var user_id = {{ $user_id }};
                    var toko_id = {{ $p->toko_id }};
                    var barangpenjual_id = {{ $p->id }};

                    // Kirim permintaan AJAX
                    $.ajax({
                        url: "{{ route('pembelian', ['id' => $p->id]) }}", // Mengarahkan ke rute 'tambahKeranjang'
                        type: "POST",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "user_id": user_id,
                            "toko_id": toko_id,
                            "barangpenjual_id": barangpenjual_id,
                            "jumlah": jumlah,
                            "totalHarga": totalHarga, // Sertakan totalHarga dalam data yang dikirim
                        },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire('Sukses', response.message, 'success');

                                setTimeout(function() {
                                    window.location =
                                        `/konfimasipembelian/${response.id}`;
                                }, 2000);
                            } else {
                                Swal.fire('Error', response.message, 'error');
                            }
                        },
                        error: function() {
                            Swal.fire('Error',
                                'Terjadi kesalahan. Item tidak dapat ditambahkan ke keranjang.',
                                'error');
                        }
                    });
                });
            @endforeach
        });
    </script>
    {{-- AJAX tambah pesanan --}}

    {{-- AJAX tambah keranjang --}}
    <script>
        $(document).ready(function() {
            @foreach ($penjual as $p)
                $("#addToCart-{{ $p->id }}").click(function() {

                    var jumlah = $("#jumlah-{{ $p->id }}").val();
                    var harga = {{ $p->harga }};
                    var stok = {{ $p->stok }};
                    var pajak = 0.05; // 5% pajak

                    // Periksa jika input jumlah kosong
                    if (!jumlah || jumlah <= 0) {
                        Swal.fire('Peringatan', 'Masukkan jumlah yang valid sebelum menambah keranjang!',
                            'warning');
                        return;
                    }

                    if (jumlah > stok) {
                        Swal.fire('Peringatan', 'Jumlah melebihi stok yang tersedia!', 'warning');
                        return;
                    }

                    // Hitung totalHarga
                    var totalHarga = jumlah * harga * (1 + pajak); // jumlah * harga * (1 + pajak)

                    // Set nilai totalHarga ke input tersembunyi
                    $("#totalHarga-{{ $p->id }}").val(totalHarga);

                    // Mendapatkan data yang diperlukan dari modal
                    var user_id = {{ $user_id }};
                    var toko_id = {{ $p->toko_id }};
                    var barangpenjual_id = {{ $p->id }};

                    // Kirim permintaan AJAX
                    $.ajax({
                        url: "{{ route('tambahKeranjang', ['id' => $p->id]) }}", // Mengarahkan ke rute 'tambahKeranjang'
                        type: "POST",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "user_id": user_id,
                            "toko_id": toko_id,
                            "barangpenjual_id": barangpenjual_id,
                            "jumlah": jumlah,
                            "totalHarga": totalHarga, // Sertakan totalHarga dalam data yang dikirim
                        },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire('Sukses', response.message, 'success');
                            } else {
                                Swal.fire('Error', response.message, 'error');
                            }
                        },
                        error: function() {
                            Swal.fire('Error',
                                'Terjadi kesalahan. Item tidak dapat ditambahkan ke keranjang.',
                                'error');
                        }
                    });
                });
            @endforeach
        });
    </script>
    {{-- AJAX tambah keranjang --}}

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
                        <a class="nav-link active" data-bs-toggle="collapse" href="{{route('menu.index')}}" role="button"
                            aria-expanded="false" aria-controls="home">
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
                        <a class="nav-link "aria-current="page" href="{{route('daftartoko')}}">
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
                        <a class="nav-link " href="{{route('pesanan')}}">
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
                        <a class="nav-link " href="{{route('riwayatuser')}}">
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
                        <a class="nav-link " href="{{ asset('UserKeranjang') }}">
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
                        @if ($kategoriId === 'null')
                        <form action="{{ route('searching', ['menu' => 'query']) }}" method="GET">

                            <input type="text" class="form-control" name="query"
                                value="{{ request('query') }}" placeholder="Cari...">
                        </form>
                        @else
                        <form action="{{ route('searchingKategori', ['menu' => 'query', 'kategori'=>$kategoriId]) }}" method="GET">

                            <input type="text" class="form-control" name="query"
                                value="{{ request('query') }}" placeholder="Cari...">
                        </form>

                        @endif
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
                                    <span class="notification-count" id="notification-count">0</span>
                                </a>
                                <div class="sub-drop dropdown-menu dropdown-menu-end p-0"
                                    aria-labelledby="notification-drop">
                                    <div class="card shadow-none m-0">
                                        <div class="card-header d-flex justify-content-between bg-primary mx-0 px-4">
                                            <div class="header-title">
                                                <h5 class="mb-0 text-white">Notifikasi</h5>
                                            </div>
                                        </div>

                                        {{-- Notifikasi --}}

                                        @php
                                            $latestNotifications = $notifikasi->sortByDesc('created_at')->take(3);
                                        @endphp

                                        @forelse ($latestNotifications as $notif)
                                            <div class="card-body p-0">
                                                <a href="{{ route('pesanan') }}" class="iq-sub-card"
                                                    data-notification-id="{{ $notif->id }}">
                                                    <div class="d-flex text-align-center">
                                                        <div class="w-100">
                                                            <h6 class="mb-0">{{ $notif->keterangan }}</h6>
                                                            <p class="mb-0" style="font-size: 15px">
                                                                {{ $notif->isi }}</p>
                                                            <small class="float-end font-size-4"
                                                                id="time-{{ $notif->id }}"></small>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>

                                        @empty

                                            <div class="card-body p-0">
                                                <a href="#" class="iq-sub-card">
                                                    <div class="d-flex text-align-center">
                                                        <h6 class="mb-0">Tidak ada notifikasi.</h6>
                                                    </div>
                                            </div>
                                            </a>
                                    </div>
                                    @endforelse

                                    {{-- Script for update time --}}
                                    <script>
                                        // Fungsi untuk mengupdate waktu dinamis
                                        function updateDynamicTime() {
                                            const now = new Date();

                                            @foreach ($latestNotifications as $notif)
                                                // Dalam loop, variabel dideklarasikan hanya sekali di luar loop
                                                const notificationTime{{ $notif->id }} = new Date("{{ $notif->created_at }}");
                                                const timeDiff{{ $notif->id }} = now - notificationTime{{ $notif->id }};
                                                const timeElement{{ $notif->id }} = document.getElementById("time-{{ $notif->id }}");

                                                if (timeDiff{{ $notif->id }} < 60000) {
                                                    timeElement{{ $notif->id }}.textContent = "Baru saja";
                                                } else if (timeDiff{{ $notif->id }} < 3600000) {
                                                    const minutesAgo{{ $notif->id }} = Math.floor(timeDiff{{ $notif->id }} / 60000);
                                                    timeElement{{ $notif->id }}.textContent = minutesAgo{{ $notif->id }} + " Menit yang lalu";
                                                } else if (timeDiff{{ $notif->id }} < 86400000) {
                                                    const hoursAgo{{ $notif->id }} = Math.floor(timeDiff{{ $notif->id }} / 3600000);
                                                    timeElement{{ $notif->id }}.textContent = hoursAgo{{ $notif->id }} + " Jam yang lalu";
                                                } else {
                                                    const daysAgo{{ $notif->id }} = Math.floor(timeDiff{{ $notif->id }} / 86400000);
                                                    timeElement{{ $notif->id }}.textContent = daysAgo{{ $notif->id }} + " Hari yang lalu";
                                                }
                                            @endforeach
                                        }

                                        // Panggil fungsi pertama kali saat halaman dimuat
                                        updateDynamicTime();

                                        // Set interval untuk mengupdate waktu setiap 1 menit (60.000 milidetik)
                                        setInterval(updateDynamicTime, 600);
                                    </script>
                                    {{-- Script for update time --}}

                                    {{-- Ajax read notifikasi --}}
                                    <script>
                                        function updateNotificationCount() {
                                            // Buat permintaan AJAX ke server untuk mengambil jumlah notifikasi
                                            $.ajax({
                                                url: "{{ route('notifikasiuser') }}", // Ganti dengan URL yang sesuai di server
                                                method: 'GET',
                                                success: function(response) {
                                                    const notificationCount = response.count; // Ambil jumlah notifikasi dari respons server
                                                    const notificationCountElement = document.querySelector('.notification-count');
                                                    notificationCountElement.textContent = notificationCount;

                                                    // Tampilkan atau sembunyikan angka notifikasi sesuai dengan jumlah notifikasi
                                                    notificationCountElement.style.display = notificationCount > 0 ? 'block' : 'none';
                                                },
                                                error: function(error) {
                                                    console.error("Gagal mengambil jumlah notifikasi:", error);
                                                }
                                            });
                                        }

                                        updateNotificationCount();

                                        // Atur interval untuk memperbarui jumlah notifikasi setiap beberapa detik
                                        setInterval(updateNotificationCount, 500); // Contoh: 5000 milidetik (5 detik)

                                        $('.iq-sub-card').click(function() {
                                            var notificationId = $(this).data('notification-id');
                                            var clickedNotification = $(this);
                                            // Ambil token CSRF dari meta tag
                                            var csrfToken = $('meta[name="csrf-token"]').attr('content');
                                            $.ajax({
                                                url: 'readnotifikasiuser/' + notificationId,
                                                type: 'POST',
                                                headers: {
                                                    'X-CSRF-TOKEN': csrfToken
                                                },
                                                success: function(response) {
                                                    // Tandai notifikasi sebagai telah dibaca
                                                    console.log('Notifikasi telah dibaca');
                                                },
                                                error: function(error) {
                                                    // Handle error
                                                    console.error('Gagal menandai notifikasi: ' + error.responseText);
                                                }
                                            });
                                        });
                                    </script>
                                    {{-- Ajax read notifikasi --}}

                                    {{-- Notifikasi --}}

                                </div>
                    </div>
                    </li>
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
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <li><button type="submit" class="dropdown-item"> logout </button></li>
                            </form>
                        </ul>
                    </li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="content-inner mt-5 py-0">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="" data-iq-gsap="onStart" data-iq-opacity="0" data-iq-position-y="-40"
                        data-iq-duration=".6" data-iq-delay=".8" data-iq-trigger="scroll" data-iq-ease="none"
                        style="position: relative">
                        @include('layout.bilboard')
                        <!-- Start Isi Dashboard -->
                        <div class="col active" data-iq-gsap="onStart" data-iq-opacity="0" data-iq-position-y="-40"
                            data-iq-duration=".6" data-iq-delay=".6" data-iq-trigger="scroll" data-iq-ease="none"
                            style="transform: translate(0px, 0px); opacity: 1;">
                            <h2 class="d-flex justify-content-center gap-2 mt-3">Kategori</h2>
                            <div class="d-flex justify-content-center gap-2 mt-3">

                                <a href="{{ route('menu.index') }}" class="btn btn-outline-primary"> Semua Kategori
                                </a>
                                @php
                                    $kategoriterbaru = $kategori->sortByDesc('created_at')->take(3);
                                @endphp
                                @foreach ($kategoriterbaru as $Kategori)
                                    <a href="{{ route('kategorifilter', ['kategori' => $Kategori->id]) }}"
                                        class="btn btn-outline-primary kategori-link"
                                        data-kategori-id="{{ $Kategori->id }}"> {{ $Kategori->kategori }} </a>
                                @endforeach
                                <button class="btn btn-outline-primary" data-bs-target="#modalkategori"
                                    data-bs-toggle="modal"> Lihat Semua Kategori </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if ($filterKategori === 'filter')
            <section class="section" id="men">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-heading" style="text-align: center">
                                <h4 style="color: #EA6A12">Menu Yang Sedang Populer</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="men-item-carousel">
                                <div class="owl-men-item owl-carousel">
                                    @forelse($produkPopuler as $item)
                                        <div class="item">
                                            <div class="thumb">
                                                <div class="hover-content">
                                                    <ul>
                                                        <li><a href="{{ route('detailmenu', ['id' => $item->id]) }}"><i
                                                                    class="fa fa-eye"></i></a></li>
                                                        <li><a data-bs-toggle="modal"
                                                                data-bs-target="#myModal-{{ $item->id }}"><i
                                                                    class="bi bi-bag-check"></i></a></li>
                                                    </ul>
                                                </div>
                                                <img src="{{ asset('Storage/' . $item->fotomakanan) }}"
                                                    alt="{{ $item->namamenu }}">
                                            </div>
                                            <div class="down-content">
                                                <div class="card-body menu-image">
                                                    <h4 class="heading-title fw-bolder mt-3 mb-0 text-center fs-5">
                                                        {{ $item->namamenu }}</h4>
                                                    <div class="d-flex justify-content-center">
                                                        <p class="text-primary fw-bolder my-2">
                                                            Rp.{{ number_format($item->harga, 0, ',', '.') }}</p>
                                                    </div>
                                                    <div class="card-rating stars-ratings text-center">
                                                        @if ($item->ulasan->count() > 0)
                                                            @for ($i = 0; $i < 5; $i++)
                                                                @if ($i < floor($item->ulasan->avg('rating')))
                                                                    <svg width="18" viewBox="0 0 30 30"
                                                                        fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M27.2035 11.1678C27.1270 10.9426 26.9862 10.7446 26.7985 10.5985C26.6109 10.4523 26.3845 10.3643 26.1474 10.3453L19.2112 9.79418L16.2097 3.14996C16.1141 2.93597 15.9586 2.75421 15.7620 2.62662C15.5654 2.49904 15.3360 2.43108 15.1017 2.43095C14.8673 2.43083 14.6379 2.49853 14.4411 2.6259C14.2444 2.75327 14.0887 2.93486 13.9929 3.14875L10.9914 9.79418L4.05515 10.3453C3.82211 10.3638 3.59931 10.4490 3.41343 10.5908C3.22754 10.7325 3.08643 10.9249 3.00699 11.1447C2.92754 11.3646 2.91311 11.6027 2.96544 11.8305C3.01776 12.0584 3.13462 12.2663 3.30204 12.4295L8.42785 17.4263L6.61502 25.2763C6.55997 25.5139 6.57762 25.7626 6.66566 25.99C6.75370 26.2175 6.90807 26.4132 7.10874 26.5519C7.30942 26.6905 7.54713 26.7656 7.79103 26.7675C8.03493 26.7693 8.27376 26.6978 8.47652 26.5623L15.1013 22.1458L21.7260 26.5623C21.9333 26.6999 22.1777 26.7707 22.4264 26.7653C22.6751 26.7598 22.9161 26.6783 23.1171 26.5318C23.3182 26.3852 23.4695 26.1806 23.5507 25.9455C23.6320 25.7104 23.6393 25.4560 23.5717 25.2167L21.3464 17.43L26.8652 12.4635C27.2266 12.1375 27.3592 11.6289 27.2035 11.1678Z"
                                                                            fill="currentColor" />
                                                                    </svg>
                                                                @else
                                                                    <svg width="18" viewBox="0 0 30 30"
                                                                        fill="none" style="color: grey"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M27.2035 11.1678C27.1270 10.9426 26.9862 10.7446 26.7985 10.5985C26.6109 10.4523 26.3845 10.3643 26.1474 10.3453L19.2112 9.79418L16.2097 3.14996C16.1141 2.93597 15.9586 2.75421 15.7620 2.62662C15.5654 2.49904 15.3360 2.43108 15.1017 2.43095C14.8673 2.43083 14.6379 2.49853 14.4411 2.6259C14.2444 2.75327 14.0887 2.93486 13.9929 3.14875L10.9914 9.79418L4.05515 10.3453C3.82211 10.3638 3.59931 10.4490 3.41343 10.5908C3.22754 10.7325 3.08643 10.9249 3.00699 11.1447C2.92754 11.3646 2.91311 11.6027 2.96544 11.8305C3.01776 12.0584 3.13462 12.2663 3.30204 12.4295L8.42785 17.4263L6.61502 25.2763C6.55997 25.5139 6.57762 25.7626 6.66566 25.99C6.75370 26.2175 6.90807 26.4132 7.10874 26.5519C7.30942 26.6905 7.54713 26.7656 7.79103 26.7675C8.03493 26.7693 8.27376 26.6978 8.47652 26.5623L15.1013 22.1458L21.7260 26.5623C21.9333 26.6999 22.1777 26.7707 22.4264 26.7653C22.6751 26.7598 22.9161 26.6783 23.1171 26.5318C23.3182 26.3852 23.4695 26.1806 23.5507 25.9455C23.6320 25.7104 23.6393 25.4560 23.5717 25.2167L21.3464 17.43L26.8652 12.4635C27.2266 12.1375 27.3592 11.6289 27.2035 11.1678Z"
                                                                            fill="currentColor" />
                                                                    </svg>
                                                                @endif
                                                            @endfor
                                                            <p>( {{ number_format($item->ulasan->avg('rating'), 1, ',', '.') }}/{{ $item->ulasan->count() }})
                                                            </p>
                                                        @else
                                                            <p style="text-align: center">Tidak ada ulasan</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p>Tidak ada menu populer</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        <!-- ***** Men Area Ends ***** -->

        @php
            $no = 1;
        @endphp
        <div id="results">
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 row-cols-xxl-4">
                @foreach ($penjual as $p)
                    <div class="col-xl-3 col-lg-3 col-md-6 col-12 dish-card-horizontal mt-2">
                        <div class="col active" data-iq-gsap="onStart" data-iq-opacity="0" data-iq-position-y="-40"
                            data-iq-duration=".6" data-iq-delay=".6" data-iq-trigger="scroll" data-iq-ease="none"
                            style="transform: translate(0px, 0px); opacity: 1;">
                            <div class="card card-white dish-card profile-img mb-5">
                                <div class="profile-img21">
                                    <!-- tempat foto -->
                                    <img src="{{ asset('Storage/' . $p->fotomakanan) }}"
                                        class="img-fluid rounded-pill avatar-170 blur-shadow position-bottom"
                                        alt="profile-image">
                                    <img src="{{ asset('Storage/' . $p->fotomakanan) }}"
                                        class="hehe img-fluid rounded-pill avatar-170 hover-image "
                                        alt="profile-image" data-iq-gsap="onStart" data-iq-opacity="0"
                                        data-iq-scale=".6" data-iq-rotate="180" data-iq-duration="1"
                                        data-iq-delay=".6" data-iq-trigger="scroll" data-iq-ease="none">
                                </div>
                                <!-- Menu muter muter Start -->
                                <div class="card-body menu-image">
                                    <h6 class="heading-title fw-bolder mt-3 mb-0 text-center fs-5">
                                        {{ $p->penjuallogin->nama_toko }}</h6>
                                    <h6 class="heading-title fw-bolder mt-3 mb-0 text-center fs-5">
                                        {{ $p->namamenu }}</h6>
                                    <div class="d-flex justify-content-evenly">
                                        <p class="text-primary fw-bolder my-2">Rp.
                                            {{ number_format($p->harga, 0, ',', '.') }}
                                        </p>
                                    </div>
                                    @if ($p->ulasan->count() > 0)
                                        <div class="card-rating stars-ratings text-center">
                                            @for ($i = 0; $i < 5; $i++)
                                                @if ($i < floor($p->ulasan->avg('rating')))
                                                    <svg width="18" viewBox="0 0 30 30" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M27.2035 11.1678C27.127 10.9426 26.9862 10.7446 26.7985 10.5985C26.6109 10.4523 26.3845 10.3643 26.1474 10.3453L19.2112 9.79418L16.2097 3.14996C16.1141 2.93597 15.9586 2.75421 15.762 2.62662C15.5654 2.49904 15.336 2.43108 15.1017 2.43095C14.8673 2.43083 14.6379 2.49853 14.4411 2.6259C14.2444 2.75327 14.0887 2.93486 13.9929 3.14875L10.9914 9.79418L4.05515 10.3453C3.82211 10.3638 3.59931 10.449 3.41343 10.5908C3.22754 10.7325 3.08643 10.9249 3.00699 11.1447C2.92754 11.3646 2.91311 11.6027 2.96544 11.8305C3.01776 12.0584 3.13462 12.2663 3.30204 12.4295L8.42785 17.4263L6.61502 25.2763C6.55997 25.5139 6.57762 25.7626 6.66566 25.99C6.7537 26.2175 6.90807 26.4132 7.10874 26.5519C7.30942 26.6905 7.54713 26.7656 7.79103 26.7675C8.03493 26.7693 8.27376 26.6978 8.47652 26.5623L15.1013 22.1458L21.726 26.5623C21.9333 26.6999 22.1777 26.7707 22.4264 26.7653C22.6751 26.7598 22.9161 26.6783 23.1171 26.5318C23.3182 26.3852 23.4695 26.1806 23.5507 25.9455C23.632 25.7104 23.6393 25.456 23.5717 25.2167L21.3464 17.43L26.8652 12.4635C27.2266 12.1375 27.3592 11.6289 27.2035 11.1678Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                @else
                                                    <svg width="18" viewBox="0 0 30 30" fill="none"
                                                        style="color: grey" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M27.2035 11.1678C27.127 10.9426 26.9862 10.7446 26.7985 10.5985C26.6109 10.4523 26.3845 10.3643 26.1474 10.3453L19.2112 9.79418L16.2097 3.14996C16.1141 2.93597 15.9586 2.75421 15.762 2.62662C15.5654 2.49904 15.336 2.43108 15.1017 2.43095C14.8673 2.43083 14.6379 2.49853 14.4411 2.6259C14.2444 2.75327 14.0887 2.93486 13.9929 3.14875L10.9914 9.79418L4.05515 10.3453C3.82211 10.3638 3.59931 10.449 3.41343 10.5908C3.22754 10.7325 3.08643 10.9249 3.00699 11.1447C2.92754 11.3646 2.91311 11.6027 2.96544 11.8305C3.01776 12.0584 3.13462 12.2663 3.30204 12.4295L8.42785 17.4263L6.61502 25.2763C6.55997 25.5139 6.57762 25.7626 6.66566 25.99C6.7537 26.2175 6.90807 26.4132 7.10874 26.5519C7.30942 26.6905 7.54713 26.7656 7.79103 26.7675C8.03493 26.7693 8.27376 26.6978 8.47652 26.5623L15.1013 22.1458L21.726 26.5623C21.9333 26.6999 22.1777 26.7707 22.4264 26.7653C22.6751 26.7598 22.9161 26.6783 23.1171 26.5318C23.3182 26.3852 23.4695 26.1806 23.5507 25.9455C23.632 25.7104 23.6393 25.456 23.5717 25.2167L21.3464 17.43L26.8652 12.4635C27.2266 12.1375 27.3592 11.6289 27.2035 11.1678Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                @endif
                                            @endfor

                                            <p>( {{ number_format($p->ulasan->avg('rating'), 1, ',', '.') }}
                                                / {{ $p->ulasan->count() }})</p>
                                            {{-- <p>( {{ $ulasan }} /  {{ $totalUlasan }})</p> --}}
                                        </div>
                                    @else
                                        <p style="text-align: center">tidak ada ulasan</p>
                                    @endif

                                    <div class="d-flex justify-content-center gap-2 mt-3">
                                        <button class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#myModal-{{ $p->id }}"><i
                                                class="bi bi-bag-check"></i> Beli
                                        </button>
                                        <a class="btn btn-primary"
                                            href="{{ route('detailmenu', ['id' => $p->id]) }}">Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @include('layout.footer')

    </main>

    @include('layout.js')

    <!-- jQuery -->
    <script src="{{ asset('assett/js/jquery-2.1.0.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('assett/js/popper.js') }}"></script>
    <script src="{{ asset('assett/js/bootstrap.min.js') }}"></script>

    <!-- Plugins -->
    <script src="{{ asset('assett/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('assett/js/accordions.js') }}"></script>
    <script src="{{ asset('assett/js/datepicker.js') }}"></script>
    <script src="{{ asset('assett/js/scrollreveal.min.js') }}"></script>
    <script src="{{ asset('assett/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assett/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assett/js/imgfix.min.js') }}"></script>
    <script src="{{ asset('assett/js/slick.js') }}"></script>
    <script src="{{ asset('assett/js/lightbox.js') }}"></script>
    <script src="{{ asset('assett/js/isotope.js') }}"></script>

    <!-- Global Init -->
    <script src="{{ asset('assett/js/custom.js') }}"></script>
</body>

</html>
