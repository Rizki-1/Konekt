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

<body class=""style="background:url(../../assets/images/dashboard.png);    background-attachment: fixed; background-size: cover;">
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
                        <a class="nav-link" aria-current="page" href="DashboardAdmin" role="button"
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
                        <!--  ACTIVE = PILIHAN SIDE BAR BERWARNA -->
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="calonpenjual">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="30" viewBox="0 0 24 17" fill="none">
                                            <path d="M3.6 7.2C4.92375 7.2 6 6.12375 6 4.8C6 3.47625 4.92375 2.4 3.6 2.4C2.27625 2.4 1.2 3.47625 1.2 4.8C1.2 6.12375 2.27625 7.2 3.6 7.2ZM20.4 7.2C21.7238 7.2 22.8 6.12375 22.8 4.8C22.8 3.47625 21.7238 2.4 20.4 2.4C19.0763 2.4 18 3.47625 18 4.8C18 6.12375 19.0763 7.2 20.4 7.2ZM21.6 8.4H19.2C18.54 8.4 17.9438 8.66625 17.5088 9.0975C19.02 9.92625 20.0925 11.4225 20.325 13.2H22.8C23.4638 13.2 24 12.6637 24 12V10.8C24 9.47625 22.9237 8.4 21.6 8.4ZM12 8.4C14.3212 8.4 16.2 6.52125 16.2 4.2C16.2 1.87875 14.3212 0 12 0C9.67875 0 7.8 1.87875 7.8 4.2C7.8 6.52125 9.67875 8.4 12 8.4ZM14.88 9.6H14.5688C13.7888 9.975 12.9225 10.2 12 10.2C11.0775 10.2 10.215 9.975 9.43125 9.6H9.12C6.735 9.6 4.8 11.535 4.8 13.92V15C4.8 15.9937 5.60625 16.8 6.6 16.8H17.4C18.3938 16.8 19.2 15.9937 19.2 15V13.92C19.2 11.535 17.265 9.6 14.88 9.6ZM6.49125 9.0975C6.05625 8.66625 5.46 8.4 4.8 8.4H2.4C1.07625 8.4 0 9.47625 0 10.8V12C0 12.6637 0.53625 13.2 1.2 13.2H3.67125C3.9075 11.4225 4.98 9.92625 6.49125 9.0975Z" fill="#959895"/>
                                            </svg>
                                    </i>
                                    <span class="item-name">Persetujuan</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link "aria-current="page" href="pengajuanpembeliad">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="30" viewBox="0 0 24 24" fill="none">
                                            <path d="M17.5948 5.59835V3.19906C17.5948 2.77484 17.4263 2.36799 17.1263 2.06802C16.8263 1.76805 16.4195 1.59953 15.9953 1.59953H3.19906C2.77522 1.60079 2.36911 1.76972 2.06942 2.06942C1.76972 2.36911 1.60079 2.77522 1.59953 3.19906V20.7939C1.60079 21.2177 1.76972 21.6238 2.06942 21.9235C2.36911 22.2232 2.77522 22.3921 3.19906 22.3934H15.9953C16.4191 22.3921 16.8252 22.2232 17.1249 21.9235C17.4246 21.6238 17.5935 21.2177 17.5948 20.7939C17.5948 20.5818 17.6791 20.3783 17.8291 20.2283C17.979 20.0784 18.1825 19.9941 18.3946 19.9941C18.6067 19.9941 18.8101 20.0784 18.9601 20.2283C19.1101 20.3783 19.1943 20.5818 19.1943 20.7939C19.1949 21.2141 19.1125 21.6304 18.9519 22.0187C18.7913 22.4071 18.5557 22.76 18.2585 23.0571C17.9614 23.3543 17.6085 23.5899 17.2201 23.7505C16.8318 23.9111 16.4155 23.9935 15.9953 23.9929H3.19906C2.35061 23.9929 1.53692 23.6559 0.936982 23.0559C0.337043 22.456 0 21.6423 0 20.7939V3.19906C0 2.35061 0.337043 1.53692 0.936982 0.936982C1.53692 0.337043 2.35061 0 3.19906 0L15.9953 0C16.8437 0 17.6574 0.337043 18.2574 0.936982C18.8573 1.53692 19.1943 2.35061 19.1943 3.19906V5.59835C19.1943 5.81046 19.1101 6.01388 18.9601 6.16387C18.8101 6.31385 18.6067 6.39811 18.3946 6.39811C18.1825 6.39811 17.979 6.31385 17.8291 6.16387C17.6791 6.01388 17.5948 5.81046 17.5948 5.59835Z" fill="#959895"/>
                                            <path d="M3.99898 19.9941C4.44068 19.9941 4.79875 19.636 4.79875 19.1943C4.79875 18.7526 4.44068 18.3945 3.99898 18.3945C3.55729 18.3945 3.19922 18.7526 3.19922 19.1943C3.19922 19.636 3.55729 19.9941 3.99898 19.9941Z" fill="#959895"/>
                                            <path d="M15.2912 19.9941H7.10323C6.90854 19.9694 6.72953 19.8745 6.59978 19.7273C6.47003 19.5801 6.39844 19.3905 6.39844 19.1943C6.39844 18.998 6.47003 18.8085 6.59978 18.6613C6.72953 18.5141 6.90854 18.4192 7.10323 18.3945H15.2904C15.4851 18.4192 15.6641 18.5141 15.7939 18.6613C15.9236 18.8085 15.9952 18.998 15.9952 19.1943C15.9952 19.3905 15.9236 19.5801 15.7939 19.7273C15.6641 19.8745 15.4859 19.9694 15.2912 19.9941Z" fill="#959895"/>
                                            <path d="M3.99898 6.39836C4.44068 6.39836 4.79875 6.04029 4.79875 5.59859C4.79875 5.15689 4.44068 4.79883 3.99898 4.79883C3.55729 4.79883 3.19922 5.15689 3.19922 5.59859C3.19922 6.04029 3.55729 6.39836 3.99898 6.39836Z" fill="#959895"/>
                                            <path d="M15.2904 6.39836H7.10236C6.90323 6.38479 6.71751 6.29316 6.58557 6.1434C6.45363 5.99363 6.38614 5.79784 6.39777 5.59859C6.38677 5.39949 6.45449 5.20405 6.5863 5.05443C6.71812 4.90481 6.90347 4.81301 7.10236 4.79883H15.2896C15.4887 4.8126 15.6743 4.90426 15.8064 5.05395C15.9384 5.20364 16.0061 5.39931 15.9949 5.59859C16.0059 5.79769 15.9382 5.99313 15.8064 6.14275C15.6746 6.29237 15.4892 6.38418 15.2904 6.39836Z" fill="#959895"/>
                                            <path d="M3.99898 16.5956C4.44068 16.5956 4.79875 16.2376 4.79875 15.7959C4.79875 15.3542 4.44068 14.9961 3.99898 14.9961C3.55729 14.9961 3.19922 15.3542 3.19922 15.7959C3.19922 16.2376 3.55729 16.5956 3.99898 16.5956Z" fill="#959895"/>
                                            <path d="M3.99898 9.79679C4.44068 9.79679 4.79875 9.43873 4.79875 8.99703C4.79875 8.55533 4.44068 8.19727 3.99898 8.19727C3.55729 8.19727 3.19922 8.55533 3.19922 8.99703C3.19922 9.43873 3.55729 9.79679 3.99898 9.79679Z" fill="#959895"/>
                                            <path d="M3.99898 13.1972C4.44068 13.1972 4.79875 12.8391 4.79875 12.3974C4.79875 11.9557 4.44068 11.5977 3.99898 11.5977C3.55729 11.5977 3.19922 11.9557 3.19922 12.3974C3.19922 12.8391 3.55729 13.1972 3.99898 13.1972Z" fill="#959895"/>
                                            <path d="M23.5344 18.475L21.2847 16.2252C21.1374 16.076 20.9614 15.9583 20.7673 15.8791C20.5732 15.7999 20.365 15.761 20.1554 15.7646C20.0187 15.7606 19.8821 15.7765 19.7499 15.8118L19.0301 15.092C19.6796 14.2096 20.0274 13.1413 20.0218 12.0457C20.0241 11.047 19.7366 10.0692 19.1942 9.23071C18.6517 8.39222 17.8777 7.72912 16.9659 7.32182C16.0541 6.91451 15.0437 6.78049 14.0572 6.93602C13.0708 7.09154 12.1506 7.52993 11.4084 8.19801H7.10323C6.90854 8.22269 6.72953 8.31754 6.59978 8.46478C6.47003 8.61201 6.39844 8.80152 6.39844 8.99778C6.39844 9.19403 6.47003 9.38354 6.59978 9.53078C6.72953 9.67802 6.90854 9.77286 7.10323 9.79754H10.2031C9.92909 10.362 9.76076 10.9719 9.70647 11.597H7.10323C6.90854 11.6217 6.72953 11.7165 6.59978 11.8638C6.47003 12.011 6.39844 12.2005 6.39844 12.3968C6.39844 12.593 6.47003 12.7825 6.59978 12.9298C6.72953 13.077 6.90854 13.1719 7.10323 13.1965H9.81843C9.96627 13.8424 10.2379 14.4535 10.6182 14.996H7.10323C6.90854 15.0207 6.72953 15.1155 6.59978 15.2628C6.47003 15.41 6.39844 15.5995 6.39844 15.7958C6.39844 15.992 6.47003 16.1815 6.59978 16.3288C6.72953 16.476 6.90854 16.5709 7.10323 16.5955H12.4065C13.2641 17.0565 14.2346 17.2654 15.206 17.1984C16.1773 17.1313 17.1099 16.7909 17.8961 16.2164L18.6158 16.9402C18.5468 17.2104 18.5491 17.4939 18.6226 17.763C18.696 18.032 18.8381 18.2774 19.0349 18.475L21.2847 20.7247C21.583 21.0231 21.9876 21.1907 22.4095 21.1907C22.8314 21.1907 23.2361 21.0231 23.5344 20.7247C23.8327 20.4264 24.0003 20.0218 24.0003 19.5998C24.0003 19.1779 23.8327 18.7733 23.5344 18.475ZM14.8513 15.6198C14.2669 15.6185 13.6917 15.4742 13.1759 15.1994C12.6601 14.9246 12.2194 14.5278 11.8922 14.0435H14.7242C15.1755 14.0418 15.6078 13.8618 15.9269 13.5427C16.246 13.2236 16.426 12.7913 16.4277 12.34V11.9561C16.4277 11.5036 16.2485 11.0695 15.9292 10.7487C15.61 10.428 15.1767 10.2467 14.7242 10.2446H11.7755C12.0875 9.70466 12.5358 9.25611 13.0756 8.94382C13.6154 8.63154 14.2277 8.46647 14.8513 8.46513C15.0089 8.46509 15.1662 8.47524 15.3224 8.49552C16.2213 8.61653 17.0408 9.07441 17.6149 9.77655C18.1891 10.4787 18.4752 11.3727 18.4154 12.2778C18.3556 13.1828 17.9542 14.0314 17.2926 14.6518C16.631 15.2722 15.7584 15.6182 14.8513 15.6198Z" fill="#959895"/>
                                          </svg>
                                    </i>
                                    {{-- <i class="sidenav-mini-icon">P</i> --}}
                                    <span class="item-name">Pengajuan</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="pembelianadmin">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="30" viewBox="0 0 24 18" fill="none">
                                            <path d="M22.8 0H1.2C0.537375 0 0 0.575759 0 1.28571V16.7143C0 17.4242 0.537375 18 1.2 18H22.8C23.4626 18 24 17.4242 24 16.7143V1.28571C24 0.575759 23.4626 0 22.8 0ZM6.6 11.888V12.5357C6.6 12.7133 6.46575 12.8571 6.3 12.8571H5.7C5.53425 12.8571 5.4 12.7133 5.4 12.5357V11.8812C4.97662 11.8579 4.56488 11.6996 4.22363 11.4252C4.07738 11.3075 4.06987 11.0728 4.20225 10.9374L4.64288 10.487C4.74675 10.3809 4.90125 10.3761 5.02275 10.4577C5.16788 10.5549 5.3325 10.6071 5.5035 10.6071H6.55763C6.80138 10.6071 7.00013 10.3693 7.00013 10.0772C7.00013 9.83813 6.86475 9.62759 6.67125 9.56571L4.98375 9.0233C4.28662 8.79911 3.7995 8.08232 3.7995 7.27996C3.7995 6.29478 4.51388 5.49442 5.39963 5.46911V4.82143C5.39963 4.64384 5.53388 4.5 5.69963 4.5H6.29963C6.46538 4.5 6.59963 4.64384 6.59963 4.82143V5.47594C7.023 5.49924 7.43475 5.65714 7.776 5.93196C7.92225 6.04969 7.92975 6.28433 7.79738 6.41973L7.35675 6.87013C7.25287 6.97621 7.09838 6.98103 6.97688 6.89946C6.83175 6.80183 6.66713 6.75 6.49613 6.75H5.442C5.19825 6.75 4.9995 6.98786 4.9995 7.27996C4.9995 7.51902 5.13487 7.72955 5.32837 7.79143L7.01588 8.33384C7.713 8.55804 8.20013 9.27482 8.20013 10.0772C8.20013 11.0628 7.48575 11.8627 6.6 11.888ZM15.6 11.25C15.6 11.4276 15.4657 11.5714 15.3 11.5714H11.1C10.9343 11.5714 10.8 11.4276 10.8 11.25V10.6071C10.8 10.4296 10.9343 10.2857 11.1 10.2857H15.3C15.4657 10.2857 15.6 10.4296 15.6 10.6071V11.25ZM21.6 11.25C21.6 11.4276 21.4658 11.5714 21.3 11.5714H18.3C18.1343 11.5714 18 11.4276 18 11.25V10.6071C18 10.4296 18.1343 10.2857 18.3 10.2857H21.3C21.4658 10.2857 21.6 10.4296 21.6 10.6071V11.25ZM21.6 7.39286C21.6 7.57045 21.4658 7.71429 21.3 7.71429H11.1C10.9343 7.71429 10.8 7.57045 10.8 7.39286V6.75C10.8 6.57241 10.9343 6.42857 11.1 6.42857H21.3C21.4658 6.42857 21.6 6.57241 21.6 6.75V7.39286Z" fill="#959895"/>
                                          </svg>
                                    </i>
                                    {{-- <i class="sidenav-mini-icon">P</i> --}}
                                    <span class="item-name">Pembelian</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="metodpembayaran">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="30" viewBox="0 0 28 28" fill="none">
                                            <path d="M22.1673 5.83203H5.83398C4.90573 5.83203 4.01549 6.20078 3.35911 6.85716C2.70273 7.51354 2.33398 8.40377 2.33398 9.33203V18.6654C2.33398 19.5936 2.70273 20.4839 3.35911 21.1402C4.01549 21.7966 4.90573 22.1654 5.83398 22.1654H22.1673C23.0956 22.1654 23.9858 21.7966 24.6422 21.1402C25.2986 20.4839 25.6673 19.5936 25.6673 18.6654V9.33203C25.6673 8.40377 25.2986 7.51354 24.6422 6.85716C23.9858 6.20078 23.0956 5.83203 22.1673 5.83203ZM12.834 17.4987H8.16732C7.8579 17.4987 7.56115 17.3758 7.34236 17.157C7.12357 16.9382 7.00065 16.6415 7.00065 16.332C7.00065 16.0226 7.12357 15.7259 7.34236 15.5071C7.56115 15.2883 7.8579 15.1654 8.16732 15.1654H12.834C13.1434 15.1654 13.4401 15.2883 13.6589 15.5071C13.8777 15.7259 14.0007 16.0226 14.0007 16.332C14.0007 16.6415 13.8777 16.9382 13.6589 17.157C13.4401 17.3758 13.1434 17.4987 12.834 17.4987ZM19.834 17.4987H17.5007C17.1912 17.4987 16.8945 17.3758 16.6757 17.157C16.4569 16.9382 16.334 16.6415 16.334 16.332C16.334 16.0226 16.4569 15.7259 16.6757 15.5071C16.8945 15.2883 17.1912 15.1654 17.5007 15.1654H19.834C20.1434 15.1654 20.4401 15.2883 20.6589 15.5071C20.8777 15.7259 21.0007 16.0226 21.0007 16.332C21.0007 16.6415 20.8777 16.9382 20.6589 17.157C20.4401 17.3758 20.1434 17.4987 19.834 17.4987ZM23.334 10.4987H4.66732V9.33203C4.66732 9.02261 4.79023 8.72587 5.00903 8.50707C5.22782 8.28828 5.52456 8.16536 5.83398 8.16536H22.1673C22.4767 8.16536 22.7735 8.28828 22.9923 8.50707C23.2111 8.72587 23.334 9.02261 23.334 9.33203V10.4987Z" fill="#959895"/>
                                          </svg>
                                    </i>
                                    {{-- <i class="sidenav-mini-icon">MP</i> --}}
                                    <span class="item-name">Pembayaran</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="kategori">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="30" viewBox="0 0 24 24" fill="none">
                                            <path d="M12 5C12 4.73478 12.1054 4.48043 12.2929 4.29289C12.4804 4.10536 12.7348 4 13 4H21C21.2652 4 21.5196 4.10536 21.7071 4.29289C21.8946 4.48043 22 4.73478 22 5C22 5.26522 21.8946 5.51957 21.7071 5.70711C21.5196 5.89464 21.2652 6 21 6H13C12.7348 6 12.4804 5.89464 12.2929 5.70711C12.1054 5.51957 12 5.26522 12 5Z" fill="white"/>
                                     `         <path d="M12 12C12 11.7348 12.1054 11.4804 12.2929 11.2929C12.4804 11.1054 12.7348 11 13 11H21C21.2652 11 21.5196 11.1054 21.7071 11.2929C21.8946 11.4804 22 11.7348 22 12C22 12.2652 21.8946 12.5196 21.7071 12.7071C21.5196 12.8946 21.2652 13 21 13H13C12.7348 13 12.4804 12.8946 12.2929 12.7071C12.1054 12.5196 12 12.2652 12 12Z" fill="white"/>
                                            <path d="M12 19C12 18.7348 12.1054 18.4804 12.2929 18.2929C12.4804 18.1054 12.7348 18 13 18H21C21.2652 18 21.5196 18.1054 21.7071 18.2929C21.8946 18.4804 22 18.7348 22 19C22 19.2652 21.8946 19.5196 21.7071 19.7071C21.5196 19.8946 21.2652 20 21 20H13C12.7348 20 12.4804 19.8946 12.2929 19.7071C12.1054 19.5196 12 19.2652 12 19Z" fill="white"/>
                                            <path d="M6.00071 3.95009L7.20071 6.00009H4.75071L6.00071 3.95009ZM6.00071 1.00009C5.82892 1.00747 5.66157 1.05691 5.51336 1.1441C5.36515 1.23128 5.24062 1.35352 5.15071 1.50009L2.10071 6.50009C2.02543 6.65602 1.98633 6.82694 1.98633 7.00009C1.98633 7.17325 2.02543 7.34416 2.10071 7.50009C2.18306 7.65325 2.30587 7.78086 2.45575 7.86902C2.60563 7.95719 2.77684 8.00253 2.95071 8.00009H9.00071C9.1725 7.99272 9.33985 7.94327 9.48806 7.85609C9.63627 7.76891 9.7608 7.64666 9.85071 7.50009C9.9496 7.35209 10.0024 7.17809 10.0024 7.00009C10.0024 6.8221 9.9496 6.64809 9.85071 6.50009L6.85071 1.50009C6.76836 1.34694 6.64555 1.21933 6.49567 1.13116C6.34579 1.043 6.17458 0.99766 6.00071 1.00009Z" fill="white"/>
                                            <path d="M6 15C5.40666 15 4.82664 14.8241 4.33329 14.4944C3.83994 14.1648 3.45543 13.6962 3.22836 13.1481C3.0013 12.5999 2.94189 11.9967 3.05765 11.4147C3.1734 10.8328 3.45912 10.2982 3.87868 9.87868C4.29824 9.45912 4.83279 9.1734 5.41473 9.05765C5.99667 8.94189 6.59987 9.0013 7.14805 9.22836C7.69623 9.45543 8.16477 9.83994 8.49441 10.3333C8.82405 10.8266 9 11.4067 9 12C9 12.7957 8.68393 13.5587 8.12132 14.1213C7.55871 14.6839 6.79565 15 6 15ZM6 11C5.80222 11 5.60888 11.0587 5.44443 11.1685C5.27998 11.2784 5.15181 11.4346 5.07612 11.6173C5.00043 11.8 4.98063 12.0011 5.01922 12.1951C5.0578 12.3891 5.15304 12.5673 5.29289 12.7071C5.43275 12.847 5.61093 12.9422 5.80491 12.9808C5.99889 13.0194 6.19996 12.9996 6.38268 12.9239C6.56541 12.8482 6.72159 12.72 6.83147 12.5556C6.94135 12.3911 7 12.1978 7 12C7 11.7348 6.89464 11.4804 6.70711 11.2929C6.51957 11.1054 6.26522 11 6 11Z" fill="white"/>
                                            <path d="M8 22H4C3.73478 22 3.48043 21.8946 3.29289 21.7071C3.10536 21.5196 3 21.2652 3 21V17C3 16.7348 3.10536 16.4804 3.29289 16.2929C3.48043 16.1054 3.73478 16 4 16H8C8.26522 16 8.51957 16.1054 8.70711 16.2929C8.89464 16.4804 9 16.7348 9 17V21C9 21.2652 8.89464 21.5196 8.70711 21.7071C8.51957 21.8946 8.26522 22 8 22ZM5 20H7V18H5V20Z" fill="white"/>
                                            </svg>
                                    </i>
                                    {{-- <i class="sidenav-mini-icon">K</i> --}}
                                    <span class="item-name">Kategori</span>
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
                                    <li><a class="dropdown-item" href="app/user-profile.html">Profile</a></li>
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

        {{-- Modal Store --}}
        <div class="modal fade" id="myModal" tabindex="-1" aria-hidden="true">
            <form action="{{ route('kstore') }}" method="POST">
                @csrf
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Kategori</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="kelas" class="form-label fw-bold">Nama Kategori</label>
                                <input type="text" name="kategori" class="form-control @error('kategori') is-invalid @enderror" placeholder="Masukkan Nama Kategori">
                            </div>
                            @error('kategori')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="mb-3">
                                <label for="keterangan" class="form-label fw-bold">Keterangan</label>
                                <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" placeholder="Masukkan Keterangan"></textarea>
                            </div>
                            @error('keterangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        {{-- Modal Store --}}

        {{-- Modal Edit --}}
        <div class="modal fade" id="editModal" tabindex="-1">
            <form action="{{ route('kupdate', ['id' => ':id']) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="item_id" id="editItemID">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalTitle">Edit Menu</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="kategori" class="form-label fw-bold">Kategori</label>
                                <input type="text" name="kategori" id="editkategori" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label fw-bold">Keterangan</label>
                                <textarea name="keterangan" id="editketerangan" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        {{-- Modal Edit --}}

        <div class="content-inner mt-5 py-0">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <div class="" data-iq-gsap="onStart" data-iq-opacity="0" data-iq-position-y="-40"
                        data-iq-duration=".6" data-iq-delay=".8" data-iq-trigger="scroll" data-iq-ease="none"
                        style="position: relative">
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#myModal">Tambah Kategori</button>
                        <table class="table text-center" id="tabel-data">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no = 1;
                                @endphp
                                @foreach ($admink as $a)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $a->kategori }}</td>
                                    <td>
                                        {{ Str::limit($a->keterangan, 10) }}

                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-outline-warning edit-btn" data-id="{{ $a->id }}"><i class="bi bi-pencil-square"></i></button>
                                        <button type="submit" class="btn btn-outline-danger delete-btn ms-1" data-id="{{ $a->id }}"><i class="bi bi-trash-fill"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- @include('layout.footer') --}}
    </main>
    @include('layout.js')
</body>

{{-- AJAX DELETE --}}
<script>
    $(document).ready(function () {
        // Tangani klik tombol "Delete"
        $(".delete-btn").click(function () {
            var itemId = $(this).data("id"); // Dapatkan ID item dari atribut data

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
                        url: "{{ route('kdestroy', '') }}" + "/" + itemId,
                        type: "DELETE",
                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function (response) {
                            // Tanggapan berhasil, lakukan sesuatu jika perlu
                            if (response.success) {
                                Swal.fire({
                                    title: 'Sukses',
                                    text: response.message,
                                    icon: 'success'
                                }).then(function() {
                                    // Hapus elemen <tr> terkait dari tabel
                                    $(`.delete-btn[data-id="${itemId}"]`).closest('tr').remove();
                                });
                            } else {
                                Swal.fire('Peringatan', response.message, 'warning');
                            }
                        },
                        error: function (error) {
                            Swal.fire('Peringatan', error.responseJSON.message, 'warning');
                        }
                    });
                }
            });
        });
    });
</script>
{{-- AJAX DELETE --}}

{{-- AJAX Store --}}
<script>
    $(document).ready(function () {
        // Tangani klik tombol "Simpan"
        $("#myModal form").submit(function (e) {
            e.preventDefault();

            // Hapus pesan kesalahan yang mungkin sudah ada
            $(".is-invalid").removeClass('is-invalid');
            $(".invalid-feedback").remove();

            var formData = new FormData($(this)[0]); // Dapatkan data formulir
            formData.append('_token', '{{ csrf_token() }}'); // Tambahkan token CSRF

            $.ajax({
                url: "{{ route('kstore') }}",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    // Tanggapan berhasil, lakukan sesuatu jika perlu
                    if (response.success) {
                        $("#myModal").modal("hide"); // Sembunyikan modal
                        Swal.fire('Sukses', 'Berhasil menambahkan kategori, halaman akan terefresh.', 'success');

                        setTimeout(function() {
                        location.reload();
                        }, 2000);

                    } else {
                        Swal.fire('Gagal', 'Terjadi kesalahan saat menambahkan kategori.', 'error');
                    }
                },
                error: function (xhr, status, error) {
                // Tangani kesalahan status respons
                if (xhr.status === 422) {
                    var responseErrors = xhr.responseJSON.errors;

                    $.each(responseErrors, function (key, value) {
                        var inputField = $("input[name='" + key + "'], textarea[name='" + key + "']");
                        inputField.addClass('is-invalid');

                        inputField.after('<div class="invalid-feedback">' + value[0] + '</div>');
                    });
                } else {
                    Swal.fire('Gagal', 'Terjadi kesalahan saat menambahkan kategori.', 'error');
                }
                }
            });
        });
    });
</script>
{{-- AJAX Store --}}

{{-- AJAX Edit --}}
<script>
    $(document).ready(function () {
        // Tangani klik tombol "Edit"
        $(".edit-btn").click(function () {
            var itemId = $(this).data("id"); // Dapatkan ID item dari atribut data'

            // Reset pesan kesalahan dari validasi sebelumnya
            $(".is-invalid").removeClass('is-invalid');
            $(".invalid-feedback").remove();

            // Setel nilai ID pada formulir modal
            $("#editItemID").val(itemId);

            // Setel action formulir modal edit berdasarkan ID
            var editForm = $("#editModal form");
            var actionUrl = "{{ route('kedit', ['id' => ':id']) }}".replace(':id', itemId);
            editForm.attr("action", actionUrl);

            // Kirim permintaan GET untuk mendapatkan data item yang akan diedit
            $.ajax({
                url: "{{ url('kedit') }}" + "/" + itemId + "/edit",
                type: "GET",
                success: function (response) {
                    if (response.success) {
                        // Isi nilai-nilai dalam modal edit dengan data item
                        $("#editkategori").val(response.data.kategori);
                        $("#editketerangan").val(response.data.keterangan);

                        // Simpan ID item yang akan diubah
                        $("#editItemID").val(itemId);

                        // Tampilkan modal edit
                        $("#editModal").modal("show");

                    } else {
                        Swal.fire('Gagal', 'Terjadi kesalahan saat mengambil data item.', 'error');
                    }
                },
                error: function () {
                    Swal.fire('Gagal', 'Terjadi kesalahan saat mengambil data item.', 'error');
                }
            });
        });

        // Tangani klik tombol "Simpan Perubahan" pada modal edit
        $("#editModal form").submit(function (e) {
            e.preventDefault();

            // Reset pesan kesalahan dari validasi sebelumnya
            $(".is-invalid").removeClass('is-invalid');
            $(".invalid-feedback").remove();

            var itemId = $("#editItemID").val(); // Dapatkan ID item yang akan diubah
            var formData = new FormData($(this)[0]); // Dapatkan data formulir
            formData.append('_token', '{{ csrf_token() }}'); // Tambahkan token CSRF
            formData.append('_method', 'PUT'); // Tambahkan metode PUT
            // Kirim permintaan PUT untuk menyimpan perubahan
            $.ajax({
                url: "{{ url('kupdate') }}" + "/" + itemId,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    // Tanggapan berhasil, lakukan sesuatu jika perlu
                    if (response.success) {
                        // Sembunyikan modal edit
                        $("#editModal").modal("hide");

                        Swal.fire('Sukses', 'Berhasil memperbarui data kategori, halaman akan terefresh.', 'success');

                        setTimeout(function() {
                        location.reload();
                        }, 2000);
                    } else {
                        Swal.fire('Gagal', 'Terjadi kesalahan saat menyimpan perubahan.', 'error');
                    }
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        var responseErrors = xhr.responseJSON.errors;

                        $.each(responseErrors, function (key, value) {
                        var inputField = $("input[name='" + key + "']");
                        inputField.addClass('is-invalid');
                        // Jika ini elemen select, tambahkan pesan validasi di bawahnya
                    if (inputField.is('select')) {
                        inputField.after('<div class="invalid-feedback">' + value[0] + '</div>');
                    } else {
                        // Jika bukan elemen select, tambahkan pesan validasi setelah elemen
                        inputField.after('<div class="invalid-feedback">' + value[0] + '</div>');
                    }

                    });
                    } else {
                        // Menampilkan pesan kesalahan umum jika bukan 422
                        Swal.fire('Gagal', 'Terjadi kesalahan saat menyimpan perubahan.', 'error');
                    }
                }
            });
        });
    });
</script>
{{-- AJAX Edit --}}

</html>
