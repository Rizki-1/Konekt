<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title style="font-family:'Courier New', Courier, monospace;">Kuliner kita</title>

    <!-- Favicon -->
    <link href="../../asset/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../../asset/lib/animate/animate.min.css" rel="stylesheet">
    <link href="../../asset/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../../asset/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../../asset/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link rel="stylesheet" href="../../asset/css/sytle.css">

    <style>
:root {
    --primary: #FEA116;
    --light: #F1F8FF;
    --dark: #0F172B;
}

.ff-secondary {
    font-family: 'Pacifico', cursive;
}

.fw-medium {
    font-weight: 600 !important;
}

.fw-semi-bold {
    font-weight: 700 !important;
}

.back-to-top {
    position: fixed;
    display: none;
    right: 45px;
    bottom: 45px;
    z-index: 99;
}

/*** Button ***/
.btn {
    font-family: 'Nunito', sans-serif;
    font-weight: 500;
    text-transform: uppercase;
    transition: .5s;
}

.btn.btn-primary,
.btn.btn-secondary {
    color: #FFFFFF;
}

.btn-square {
    width: 38px;
    height: 38px;
}

.btn-sm-square {
    width: 32px;
    height: 32px;
}

.btn-lg-square {
    width: 48px;
    height: 48px;
}

.btn-square,
.btn-sm-square,
.btn-lg-square {
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: normal;
    border-radius: 2px;
}


/*** Navbar ***/
.navbar-dark .navbar-nav .nav-link {
    position: relative;
    margin-left: 25px;
    padding: 35px 0;
    font-size: 15px;
    color: var(--light) !important;
    text-transform: uppercase;
    font-weight: 500;
    outline: none;
    transition: .5s;
}

.sticky-top.navbar-dark .navbar-nav .nav-link {
    padding: 20px 0;
}

.navbar-dark .navbar-nav .nav-link:hover,
.navbar-dark .navbar-nav .nav-link.active {
    color: var(--danger) !important;
}

.navbar-dark .navbar-brand img {
    max-height: 60px;
    transition: .5s;
}

.sticky-top.navbar-dark .navbar-brand img {
    max-height: 45px;
}

@media (max-width: 991.98px) {
    .sticky-top.navbar-dark {
        position: relative;
    }

    .navbar-dark .navbar-collapse {
        margin-top: 15px;
        border-top: 1px solid rgba(255, 255, 255, .1)
    }

    .navbar-dark .navbar-nav .nav-link,
    .sticky-top.navbar-dark .navbar-nav .nav-link {
        padding: 10px 0;
        margin-left: 0;
    }

    .navbar-dark .navbar-brand img {
        max-height: 45px;
    }
}

@media (min-width: 992px) {
    .navbar-dark {
        position: absolute;
        width: 100%;
        top: 0;
        left: 0;
        z-index: 999;
        background: transparent !important;
    }

    .sticky-top.navbar-dark {
        position: fixed;
        background: var(--primary) !important;
    }
}


/*** Hero Header ***/
.hero-header {
    background: linear-gradient(rgba(255, 165, 0, 0.5), rgba(255, 165, 0, 0.5)), url(../img/bg-hero.jpg);
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
}

.hero-header img {
    animation: imgRotate 50s linear infinite;
}

@keyframes imgRotate {
    100% {
        transform: rotate(360deg);
    }
}

.breadcrumb-item + .breadcrumb-item::before {
    color: rgba(255, 255, 255, 0.5);
}

/*** Service ***/
.service-item {
    box-shadow: 0 0 45px rgba(0, 0, 0, .08);
    transition: .5s;
}

.service-item:hover {
    background: var(--primary);
}

.service-item * {
    transition: .5s;
}

.service-item:hover * {
    color: var(--light) !important;
}


/*** Food Menu ***/
.nav-pills .nav-item .active {
    border-bottom: 2px solid var(--primary);
}

/*** Footer ***/
.footer .btn.btn-social {
    margin-right: 5px;
    width: 35px;
    height: 35px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--light);
    border: 1px solid #FFFFFF;
    border-radius: 35px;
    transition: .3s;
}

.footer .btn.btn-social:hover {
    color: var(--primary);
}

.footer .btn.btn-link {
    display: block;
    margin-bottom: 5px;
    padding: 0;
    text-align: left;
    color: #FFFFFF;
    font-size: 15px;
    font-weight: normal;
    text-transform: capitalize;
    transition: .3s;
}

.footer .btn.btn-link::before {
    position: relative;
    content: "\f105";
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    margin-right: 10px;
}

.footer .btn.btn-link:hover {
    letter-spacing: 1px;
    box-shadow: none;
}

.footer .copyright {
    padding: 25px 0;
    font-size: 15px;
    border-top: 1px solid rgba(256, 256, 256, .1);
}

.footer .copyright a {
    color: var(--light);
}

.footer .footer-menu a {
    margin-right: 15px;
    padding-right: 15px;
    border-right: 1px solid rgba(255, 255, 255, .1);
}

.footer .footer-menu a:last-child {
    margin-right: 0;
    padding-right: 0;
    border-right: none;
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
</head>

<body>
    <div id="beranda" class="container-xxl bg-white p-0">
        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary px-4 px-lg-5 py-3 py-lg-0">
                <a href="/" class="navbar-brand p-0">
                    <h1 class="text-white m-0"><i class="fa fa-utensils me-3"></i>Kuliner Kita</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="#beranda" class="nav-item nav-link ">Beranda</a>
                        <a href="#about" class="nav-item nav-link">tentang kami</a>
                        <a href="#jelajah" class="nav-item nav-link">jelajahi makanan</a>
                    </div>
                    <a href="{{route('user.index')}}" class="btn btn-warning py-2 px-4">Login</a>
                </div>
            </nav>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container my-5 py-5">
                    <div class="row align-items-center g-5">
                        <div class="col-lg-6 text-center text-lg-start">
                            <h6 class="display-3 text-dark animated slideInLeft">selamat datang<br>di Kuliner kita</h6>
                            <p class="text-white animated slideInLeft mb-4 pb-2">Di setiap hidangan, ada keajaiban yang menanti untuk ditemukan, dan kami mengundang Anda untuk menjelajahi keajaiban-keajaiban itu bersama kuliner kami.</p>
                            <a href="{{route('user.index')}}" class="btn btn-dark py-sm-3 px-sm-5 me-3 animated slideInLeft">Pesan</a>
                        </div>
                        <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                            <img class="img-fluid" src="./../asset/img/hero.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->
        <!-- Service Start -->
        <div class="container-xxl py-5 text-center">
            <div class="container">
                <div class="row justify-content-center g-4">
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-user-tie text-primary mb-4"></i>
                                <h5>Pengguna</h5>
                                <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">{{ $totaluser }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-utensils text-primary mb-4"></i>
                                <h5>Menu</h5>
                                <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">{{ $totalmenu }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-headset text-primary mb-4"></i>
                                <h5>Penjual</h5>
                                <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">{{ $totalpenjual }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->
        <!-- About Start -->
        <div id="about" class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="./../asset/img/about-1.jpg">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="./../asset/img/about-2.jpg" style="margin-top: 25%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="./../asset/img/about-3.jpg">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="./../asset/img/about-4.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">tentang kami</h5>
                        <h1 class="mb-4">Selamat datang di <i class="fa fa-utensils text-primary me-2"></i>Kuliner Kita</h1>
                        <p class="mb-4">Kami adalah platform jual beli makanan yang berdedikasi untuk memenuhi hasrat kuliner Anda. Dengan jaringan pedagang berkualitas, kami menyediakan akses mudah untuk menemukan dan menikmati hidangan lezat dari berbagai jenis masakan.  Bergabunglah dengan kami dalam petualangan tak terbatas melalui cita rasa di Kuliner Kita.</p>
                        <p class="mb-4">Di setiap hidangan, ada keajaiban yang menanti untuk ditemukan, dan kami mengundang Anda untuk menjelajahi keajaiban-keajaiban itu bersama kuliner kami.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Menu Start -->
        <div id="jelajah" class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Jelajahi makanan kami</h5>
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
                                                <div class="card">
                                                    <div class="thumb">
                                                        <div class="hover-content">
                                                            <ul>
                                                                <li><a href="{{ route('detailmenu', ['id' => $item->id]) }}"><i class="fa fa-eye"></i></a></li>
                                                                <li><a data-bs-toggle="modal" data-bs-target="#myModal-{{ $item->id }}"><i class="bi bi-bag-check"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <img class="menu-image" src="{{ asset('Storage/' . $item->fotomakanan) }}" alt="{{ $item->namamenu }}">
                                                    </div>
                                                    <div class="down-content">
                                                        <div class="card-body">
                                                            <h4 class="heading-title fw-bolder mt-3 mb-0 text-center fs-5">{{ $item->namamenu }}</h4>
                                                            <div class="d-flex justify-content-center">
                                                                <p class="text-primary fw-bolder my-2">Rp.{{ number_format($item->harga, 0, ',', '.') }}</p>
                                                            </div>
                                                            <div class="card-rating stars-ratings text-center">
                                                                @if ($item->ulasan->count() > 0)
                                                                    @for ($i = 0; $i < 5; $i++)
                                                                        @if ($i < floor($item->ulasan->avg('rating')))
                                                                            <svg width="18" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path d="M27.2035 11.1678C27.1270 10.9426 26.9862 10.7446 26.7985 10.5985C26.6109 10.4523 26.3845 10.3643 26.1474 10.3453L19.2112 9.79418L16.2097 3.14996C16.1141 2.93597 15.9586 2.75421 15.7620 2.62662C15.5654 2.49904 15.3360 2.43108 15.1017 2.43095C14.8673 2.43083 14.6379 2.49853 14.4411 2.6259C14.2444 2.75327 14.0887 2.93486 13.9929 3.14875L10.9914 9.79418L4.05515 10.3453C3.82211 10.3638 3.59931 10.4490 3.41343 10.5908C3.22754 10.7325 3.08643 10.9249 3.00699 11.1447C2.92754 11.3646 2.91311 11.6027 2.96544 11.8305C3.01776 12.0584 3.13462 12.2663 3.30204 12.4295L8.42785 17.4263L6.61502 25.2763C6.55997 25.5139 6.57762 25.7626 6.66566 25.99C6.75370 26.2175 6.90807 26.4132 7.10874 26.5519C7.30942 26.6905 7.54713 26.7656 7.79103 26.7675C8.03493 26.7693 8.27376 26.6978 8.47652 26.5623L15.1013 22.1458L21.7260 26.5623C21.9333 26.6999 22.1777 26.7707 22.4264 26.7653C22.6751 26.7598 22.9161 26.6783 23.1171 26.5318C23.3182 26.3852 23.4695 26.1806 23.5507 25.9455C23.6320 25.7104 23.6393 25.4560 23.5717 25.2167L21.3464 17.43L26.8652 12.4635C27.2266 12.1375 27.3592 11.6289 27.2035 11.1678Z" fill="currentColor" />
                                                                            </svg>
                                                                        @else
                                                                            <svg width="18" viewBox="0 0 30 30" fill="none" style="color: grey" xmlns="http://www.w3.org/2000/svg">
                                                                                <path d="M27.2035 11.1678C27.1270 10.9426 26.9862 10.7446 26.7985 10.5985C26.6109 10.4523 26.3845 10.3643 26.1474 10.3453L19.2112 9.79418L16.2097 3.14996C16.1141 2.93597 15.9586 2.75421 15.7620 2.62662C15.5654 2.49904 15.3360 2.43108 15.1017 2.43095C14.8673 2.43083 14.6379 2.49853 14.4411 2.6259C14.2444 2.75327 14.0887 2.93486 13.9929 3.14875L10.9914 9.79418L4.05515 10.3453C3.82211 10.3638 3.59931 10.4490 3.41343 10.5908C3.22754 10.7325 3.08643 10.9249 3.00699 11.1447C2.92754 11.3646 2.91311 11.6027 2.96544 11.8305C3.01776 12.0584 3.13462 12.2663 3.30204 12.4295L8.42785 17.4263L6.61502 25.2763C6.55997 25.5139 6.57762 25.7626 6.66566 25.99C6.75370 26.2175 6.90807 26.4132 7.10874 26.5519C7.30942 26.6905 7.54713 26.7656 7.79103 26.7675C8.03493 26.7693 8.27376 26.6978 8.47652 26.5623L15.1013 22.1458L21.7260 26.5623C21.9333 26.6999 22.1777 26.7707 22.4264 26.7653C22.6751 26.7598 22.9161 26.6783 23.1171 26.5318C23.3182 26.3852 23.4695 26.1806 23.5507 25.9455C23.6320 25.7104 23.6393 25.4560 23.5717 25.2167L21.3464 17.43L26.8652 12.4635C27.2266 12.1375 27.3592 11.6289 27.2035 11.1678Z" fill="currentColor" />
                                                                            </svg>
                                                                        @endif
                                                                    @endfor
                                                                    <p>( {{ number_format($item->ulasan->avg('rating'), 1, ',', '.') }}/{{ $item->ulasan->count() }})</p>
                                                                @else
                                                                    <p style="text-align: center">Tidak ada ulasan</p>
                                                                @endif
                                                            </div>
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

            </div>
        </div>
        <!-- Menu End -->
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

        <!-- Footer Start -->
        <div class="container-fluid bg-primary text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="{{route('user.index')}}">Kuliner Kita</a>, All Right Reserved.
							Designed By <a class="border-bottom" href="https://htmlcodex.com">Konekt</a>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="#" data-toggle="modal" data-target="#myModal2">Kebijakan Privasi</a>
                                <a href="#" data-toggle="modal" data-target="#myModal">FAQs</a>                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
        <!-- Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Header Modal -->
                    <div class="modal-header">
                        <h4 class="modal-title">FAQs</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Isi Modal -->
                    <div class="modal-body" style="max-height: 450px; overflow-y: scroll;">
                        <h6>Bagaimana cara menggunakan layanan antrian makanan di website ini?</h6>
                        <p>Untuk menggunakan layanan antrian makanan online kami, Anda perlu melakukan langkah-langkah berikut:</p>
                        <ol>
                            <li>Pilih restoran atau tempat makan yang Anda inginkan.</li>
                            <li>Pilih makanan yang ingin Anda pesan.</li>
                            <li>Tentukan waktu pengambilan yang sesuai dengan jadwal Anda.</li>
                            <li>Selesaikan pembayaran lewat online atau langsung bayar ke toko.</li>
                        </ol>
                        <h6>Bagaimana cara membuat akun di website ini?</h6>
                        <p>Untuk membuat akun, Anda akan diarahkan terlebih dahulu ke halaman login/register, di mana Anda akan diberikan 2 pilihan, yaitu daftar sebagai penjual/pembeli. Isi informasi yang diperlukan, seperti nama, alamat, email, dan kata sandi, dan ikuti langkah-langkah yang diberikan.</p>
                        <h6>Apa keuntungan menggunakan antrian makanan online?</h6>
                        <p>Anda dapat memesan makanan dari berbagai restoran tanpa harus mengantri panjang. Anda juga akan mendapatkan nomor antrian. Antrian makanan online ini memungkinkan Anda untuk memesan makanan dengan mudah dan nyaman. Setelah pesanan Anda dikonfirmasi oleh restoran.</p>
                        <h6>Bagaimana saya tahu pesanan saya sudah diterima?</h6>
                        <p>Setelah Anda menyelesaikan pesanan Anda, Anda akan menerima pesan/notifikasi bahwa pesanan Anda telah diterima dan mendapatkan notifikasi nomor antrian pengambilan pesanan Anda di situs web kami.</p>
                        <h6>Bagaimana cara untuk pembayaran?</h6>
                        <p>Kami menerima metode pembayaran, kode QRIS, dan bank. Anda dapat memilih metode pembayaran yang nyaman untuk Anda gunakan.</p>
                        <h6>Apakah ada opsi untuk membatalkan pesanan?</h6>
                        <p>Anda dapat membatalkan pesanan Anda, tetapi harap lakukan sebelum restoran memproses pesanan Anda. Untuk membatalkan pesanan, periksa status pesanan Anda di akun Anda.</p>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal fade" id="myModal2">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Header Modal -->
                    <div class="modal-header">
                        <h4 class="modal-title">Kebijakan Privasi</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Isi Modal -->
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

                </div>
            </div>
        </div>


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-warning btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../asset/lib/wow/wow.min.js"></script>
    <script src="../../asset/lib/easing/easing.min.js"></script>
    <script src="../../asset/lib/waypoints/waypoints.min.js"></script>
    <script src="../../asset/lib/counterup/counterup.min.js"></script>
    <script src="../../asset/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../../asset/lib/tempusdominus/js/moment.min.js"></script>
    <script src="../../asset/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../../asset/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="../../asset/js/main.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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
