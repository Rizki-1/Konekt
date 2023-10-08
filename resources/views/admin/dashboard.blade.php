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
    </style>

    @include('layout.link')

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
                        <a class="nav-link active" aria-current="page" href="DashboardAdmin" role="button"
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
                        <a class="nav-link " aria-current="page" href="calonpenjual">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="30"
                                    viewBox="0 0 24 17" fill="none">
                                    <path
                                        d="M3.6 7.2C4.92375 7.2 6 6.12375 6 4.8C6 3.47625 4.92375 2.4 3.6 2.4C2.27625 2.4 1.2 3.47625 1.2 4.8C1.2 6.12375 2.27625 7.2 3.6 7.2ZM20.4 7.2C21.7238 7.2 22.8 6.12375 22.8 4.8C22.8 3.47625 21.7238 2.4 20.4 2.4C19.0763 2.4 18 3.47625 18 4.8C18 6.12375 19.0763 7.2 20.4 7.2ZM21.6 8.4H19.2C18.54 8.4 17.9438 8.66625 17.5088 9.0975C19.02 9.92625 20.0925 11.4225 20.325 13.2H22.8C23.4638 13.2 24 12.6637 24 12V10.8C24 9.47625 22.9237 8.4 21.6 8.4ZM12 8.4C14.3212 8.4 16.2 6.52125 16.2 4.2C16.2 1.87875 14.3212 0 12 0C9.67875 0 7.8 1.87875 7.8 4.2C7.8 6.52125 9.67875 8.4 12 8.4ZM14.88 9.6H14.5688C13.7888 9.975 12.9225 10.2 12 10.2C11.0775 10.2 10.215 9.975 9.43125 9.6H9.12C6.735 9.6 4.8 11.535 4.8 13.92V15C4.8 15.9937 5.60625 16.8 6.6 16.8H17.4C18.3938 16.8 19.2 15.9937 19.2 15V13.92C19.2 11.535 17.265 9.6 14.88 9.6ZM6.49125 9.0975C6.05625 8.66625 5.46 8.4 4.8 8.4H2.4C1.07625 8.4 0 9.47625 0 10.8V12C0 12.6637 0.53625 13.2 1.2 13.2H3.67125C3.9075 11.4225 4.98 9.92625 6.49125 9.0975Z"
                                        fill="#959895" />
                                </svg>
                            </i>
                            <span class="item-name">Persetujuan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link "aria-current="page" href="pengajuanpembeliad">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="30"
                                    viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M17.5948 5.59835V3.19906C17.5948 2.77484 17.4263 2.36799 17.1263 2.06802C16.8263 1.76805 16.4195 1.59953 15.9953 1.59953H3.19906C2.77522 1.60079 2.36911 1.76972 2.06942 2.06942C1.76972 2.36911 1.60079 2.77522 1.59953 3.19906V20.7939C1.60079 21.2177 1.76972 21.6238 2.06942 21.9235C2.36911 22.2232 2.77522 22.3921 3.19906 22.3934H15.9953C16.4191 22.3921 16.8252 22.2232 17.1249 21.9235C17.4246 21.6238 17.5935 21.2177 17.5948 20.7939C17.5948 20.5818 17.6791 20.3783 17.8291 20.2283C17.979 20.0784 18.1825 19.9941 18.3946 19.9941C18.6067 19.9941 18.8101 20.0784 18.9601 20.2283C19.1101 20.3783 19.1943 20.5818 19.1943 20.7939C19.1949 21.2141 19.1125 21.6304 18.9519 22.0187C18.7913 22.4071 18.5557 22.76 18.2585 23.0571C17.9614 23.3543 17.6085 23.5899 17.2201 23.7505C16.8318 23.9111 16.4155 23.9935 15.9953 23.9929H3.19906C2.35061 23.9929 1.53692 23.6559 0.936982 23.0559C0.337043 22.456 0 21.6423 0 20.7939V3.19906C0 2.35061 0.337043 1.53692 0.936982 0.936982C1.53692 0.337043 2.35061 0 3.19906 0L15.9953 0C16.8437 0 17.6574 0.337043 18.2574 0.936982C18.8573 1.53692 19.1943 2.35061 19.1943 3.19906V5.59835C19.1943 5.81046 19.1101 6.01388 18.9601 6.16387C18.8101 6.31385 18.6067 6.39811 18.3946 6.39811C18.1825 6.39811 17.979 6.31385 17.8291 6.16387C17.6791 6.01388 17.5948 5.81046 17.5948 5.59835Z"
                                        fill="#959895" />
                                    <path
                                        d="M3.99898 19.9941C4.44068 19.9941 4.79875 19.636 4.79875 19.1943C4.79875 18.7526 4.44068 18.3945 3.99898 18.3945C3.55729 18.3945 3.19922 18.7526 3.19922 19.1943C3.19922 19.636 3.55729 19.9941 3.99898 19.9941Z"
                                        fill="#959895" />
                                    <path
                                        d="M15.2912 19.9941H7.10323C6.90854 19.9694 6.72953 19.8745 6.59978 19.7273C6.47003 19.5801 6.39844 19.3905 6.39844 19.1943C6.39844 18.998 6.47003 18.8085 6.59978 18.6613C6.72953 18.5141 6.90854 18.4192 7.10323 18.3945H15.2904C15.4851 18.4192 15.6641 18.5141 15.7939 18.6613C15.9236 18.8085 15.9952 18.998 15.9952 19.1943C15.9952 19.3905 15.9236 19.5801 15.7939 19.7273C15.6641 19.8745 15.4859 19.9694 15.2912 19.9941Z"
                                        fill="#959895" />
                                    <path
                                        d="M3.99898 6.39836C4.44068 6.39836 4.79875 6.04029 4.79875 5.59859C4.79875 5.15689 4.44068 4.79883 3.99898 4.79883C3.55729 4.79883 3.19922 5.15689 3.19922 5.59859C3.19922 6.04029 3.55729 6.39836 3.99898 6.39836Z"
                                        fill="#959895" />
                                    <path
                                        d="M15.2904 6.39836H7.10236C6.90323 6.38479 6.71751 6.29316 6.58557 6.1434C6.45363 5.99363 6.38614 5.79784 6.39777 5.59859C6.38677 5.39949 6.45449 5.20405 6.5863 5.05443C6.71812 4.90481 6.90347 4.81301 7.10236 4.79883H15.2896C15.4887 4.8126 15.6743 4.90426 15.8064 5.05395C15.9384 5.20364 16.0061 5.39931 15.9949 5.59859C16.0059 5.79769 15.9382 5.99313 15.8064 6.14275C15.6746 6.29237 15.4892 6.38418 15.2904 6.39836Z"
                                        fill="#959895" />
                                    <path
                                        d="M3.99898 16.5956C4.44068 16.5956 4.79875 16.2376 4.79875 15.7959C4.79875 15.3542 4.44068 14.9961 3.99898 14.9961C3.55729 14.9961 3.19922 15.3542 3.19922 15.7959C3.19922 16.2376 3.55729 16.5956 3.99898 16.5956Z"
                                        fill="#959895" />
                                    <path
                                        d="M3.99898 9.79679C4.44068 9.79679 4.79875 9.43873 4.79875 8.99703C4.79875 8.55533 4.44068 8.19727 3.99898 8.19727C3.55729 8.19727 3.19922 8.55533 3.19922 8.99703C3.19922 9.43873 3.55729 9.79679 3.99898 9.79679Z"
                                        fill="#959895" />
                                    <path
                                        d="M3.99898 13.1972C4.44068 13.1972 4.79875 12.8391 4.79875 12.3974C4.79875 11.9557 4.44068 11.5977 3.99898 11.5977C3.55729 11.5977 3.19922 11.9557 3.19922 12.3974C3.19922 12.8391 3.55729 13.1972 3.99898 13.1972Z"
                                        fill="#959895" />
                                    <path
                                        d="M23.5344 18.475L21.2847 16.2252C21.1374 16.076 20.9614 15.9583 20.7673 15.8791C20.5732 15.7999 20.365 15.761 20.1554 15.7646C20.0187 15.7606 19.8821 15.7765 19.7499 15.8118L19.0301 15.092C19.6796 14.2096 20.0274 13.1413 20.0218 12.0457C20.0241 11.047 19.7366 10.0692 19.1942 9.23071C18.6517 8.39222 17.8777 7.72912 16.9659 7.32182C16.0541 6.91451 15.0437 6.78049 14.0572 6.93602C13.0708 7.09154 12.1506 7.52993 11.4084 8.19801H7.10323C6.90854 8.22269 6.72953 8.31754 6.59978 8.46478C6.47003 8.61201 6.39844 8.80152 6.39844 8.99778C6.39844 9.19403 6.47003 9.38354 6.59978 9.53078C6.72953 9.67802 6.90854 9.77286 7.10323 9.79754H10.2031C9.92909 10.362 9.76076 10.9719 9.70647 11.597H7.10323C6.90854 11.6217 6.72953 11.7165 6.59978 11.8638C6.47003 12.011 6.39844 12.2005 6.39844 12.3968C6.39844 12.593 6.47003 12.7825 6.59978 12.9298C6.72953 13.077 6.90854 13.1719 7.10323 13.1965H9.81843C9.96627 13.8424 10.2379 14.4535 10.6182 14.996H7.10323C6.90854 15.0207 6.72953 15.1155 6.59978 15.2628C6.47003 15.41 6.39844 15.5995 6.39844 15.7958C6.39844 15.992 6.47003 16.1815 6.59978 16.3288C6.72953 16.476 6.90854 16.5709 7.10323 16.5955H12.4065C13.2641 17.0565 14.2346 17.2654 15.206 17.1984C16.1773 17.1313 17.1099 16.7909 17.8961 16.2164L18.6158 16.9402C18.5468 17.2104 18.5491 17.4939 18.6226 17.763C18.696 18.032 18.8381 18.2774 19.0349 18.475L21.2847 20.7247C21.583 21.0231 21.9876 21.1907 22.4095 21.1907C22.8314 21.1907 23.2361 21.0231 23.5344 20.7247C23.8327 20.4264 24.0003 20.0218 24.0003 19.5998C24.0003 19.1779 23.8327 18.7733 23.5344 18.475ZM14.8513 15.6198C14.2669 15.6185 13.6917 15.4742 13.1759 15.1994C12.6601 14.9246 12.2194 14.5278 11.8922 14.0435H14.7242C15.1755 14.0418 15.6078 13.8618 15.9269 13.5427C16.246 13.2236 16.426 12.7913 16.4277 12.34V11.9561C16.4277 11.5036 16.2485 11.0695 15.9292 10.7487C15.61 10.428 15.1767 10.2467 14.7242 10.2446H11.7755C12.0875 9.70466 12.5358 9.25611 13.0756 8.94382C13.6154 8.63154 14.2277 8.46647 14.8513 8.46513C15.0089 8.46509 15.1662 8.47524 15.3224 8.49552C16.2213 8.61653 17.0408 9.07441 17.6149 9.77655C18.1891 10.4787 18.4752 11.3727 18.4154 12.2778C18.3556 13.1828 17.9542 14.0314 17.2926 14.6518C16.631 15.2722 15.7584 15.6182 14.8513 15.6198Z"
                                        fill="#959895" />
                                </svg>
                            </i>
                            {{-- <i class="sidenav-mini-icon">P</i> --}}
                            <span class="item-name">Pengajuan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="pembelianadmin">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="30"
                                    viewBox="0 0 24 18" fill="none">
                                    <path
                                        d="M22.8 0H1.2C0.537375 0 0 0.575759 0 1.28571V16.7143C0 17.4242 0.537375 18 1.2 18H22.8C23.4626 18 24 17.4242 24 16.7143V1.28571C24 0.575759 23.4626 0 22.8 0ZM6.6 11.888V12.5357C6.6 12.7133 6.46575 12.8571 6.3 12.8571H5.7C5.53425 12.8571 5.4 12.7133 5.4 12.5357V11.8812C4.97662 11.8579 4.56488 11.6996 4.22363 11.4252C4.07738 11.3075 4.06987 11.0728 4.20225 10.9374L4.64288 10.487C4.74675 10.3809 4.90125 10.3761 5.02275 10.4577C5.16788 10.5549 5.3325 10.6071 5.5035 10.6071H6.55763C6.80138 10.6071 7.00013 10.3693 7.00013 10.0772C7.00013 9.83813 6.86475 9.62759 6.67125 9.56571L4.98375 9.0233C4.28662 8.79911 3.7995 8.08232 3.7995 7.27996C3.7995 6.29478 4.51388 5.49442 5.39963 5.46911V4.82143C5.39963 4.64384 5.53388 4.5 5.69963 4.5H6.29963C6.46538 4.5 6.59963 4.64384 6.59963 4.82143V5.47594C7.023 5.49924 7.43475 5.65714 7.776 5.93196C7.92225 6.04969 7.92975 6.28433 7.79738 6.41973L7.35675 6.87013C7.25287 6.97621 7.09838 6.98103 6.97688 6.89946C6.83175 6.80183 6.66713 6.75 6.49613 6.75H5.442C5.19825 6.75 4.9995 6.98786 4.9995 7.27996C4.9995 7.51902 5.13487 7.72955 5.32837 7.79143L7.01588 8.33384C7.713 8.55804 8.20013 9.27482 8.20013 10.0772C8.20013 11.0628 7.48575 11.8627 6.6 11.888ZM15.6 11.25C15.6 11.4276 15.4657 11.5714 15.3 11.5714H11.1C10.9343 11.5714 10.8 11.4276 10.8 11.25V10.6071C10.8 10.4296 10.9343 10.2857 11.1 10.2857H15.3C15.4657 10.2857 15.6 10.4296 15.6 10.6071V11.25ZM21.6 11.25C21.6 11.4276 21.4658 11.5714 21.3 11.5714H18.3C18.1343 11.5714 18 11.4276 18 11.25V10.6071C18 10.4296 18.1343 10.2857 18.3 10.2857H21.3C21.4658 10.2857 21.6 10.4296 21.6 10.6071V11.25ZM21.6 7.39286C21.6 7.57045 21.4658 7.71429 21.3 7.71429H11.1C10.9343 7.71429 10.8 7.57045 10.8 7.39286V6.75C10.8 6.57241 10.9343 6.42857 11.1 6.42857H21.3C21.4658 6.42857 21.6 6.57241 21.6 6.75V7.39286Z"
                                        fill="#959895" />
                                </svg>
                            </i>
                            {{-- <i class="sidenav-mini-icon">P</i> --}}
                            <span class="item-name">Pembelian</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="metodpembayaran">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="30"
                                    viewBox="0 0 28 28" fill="none">
                                    <path
                                        d="M22.1673 5.83203H5.83398C4.90573 5.83203 4.01549 6.20078 3.35911 6.85716C2.70273 7.51354 2.33398 8.40377 2.33398 9.33203V18.6654C2.33398 19.5936 2.70273 20.4839 3.35911 21.1402C4.01549 21.7966 4.90573 22.1654 5.83398 22.1654H22.1673C23.0956 22.1654 23.9858 21.7966 24.6422 21.1402C25.2986 20.4839 25.6673 19.5936 25.6673 18.6654V9.33203C25.6673 8.40377 25.2986 7.51354 24.6422 6.85716C23.9858 6.20078 23.0956 5.83203 22.1673 5.83203ZM12.834 17.4987H8.16732C7.8579 17.4987 7.56115 17.3758 7.34236 17.157C7.12357 16.9382 7.00065 16.6415 7.00065 16.332C7.00065 16.0226 7.12357 15.7259 7.34236 15.5071C7.56115 15.2883 7.8579 15.1654 8.16732 15.1654H12.834C13.1434 15.1654 13.4401 15.2883 13.6589 15.5071C13.8777 15.7259 14.0007 16.0226 14.0007 16.332C14.0007 16.6415 13.8777 16.9382 13.6589 17.157C13.4401 17.3758 13.1434 17.4987 12.834 17.4987ZM19.834 17.4987H17.5007C17.1912 17.4987 16.8945 17.3758 16.6757 17.157C16.4569 16.9382 16.334 16.6415 16.334 16.332C16.334 16.0226 16.4569 15.7259 16.6757 15.5071C16.8945 15.2883 17.1912 15.1654 17.5007 15.1654H19.834C20.1434 15.1654 20.4401 15.2883 20.6589 15.5071C20.8777 15.7259 21.0007 16.0226 21.0007 16.332C21.0007 16.6415 20.8777 16.9382 20.6589 17.157C20.4401 17.3758 20.1434 17.4987 19.834 17.4987ZM23.334 10.4987H4.66732V9.33203C4.66732 9.02261 4.79023 8.72587 5.00903 8.50707C5.22782 8.28828 5.52456 8.16536 5.83398 8.16536H22.1673C22.4767 8.16536 22.7735 8.28828 22.9923 8.50707C23.2111 8.72587 23.334 9.02261 23.334 9.33203V10.4987Z"
                                        fill="#959895" />
                                </svg>
                            </i>
                            {{-- <i class="sidenav-mini-icon">MP</i> --}}
                            <span class="item-name">Pembayaran</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kategori">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="30"
                                    viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M12 5C12 4.73478 12.1054 4.48043 12.2929 4.29289C12.4804 4.10536 12.7348 4 13 4H21C21.2652 4 21.5196 4.10536 21.7071 4.29289C21.8946 4.48043 22 4.73478 22 5C22 5.26522 21.8946 5.51957 21.7071 5.70711C21.5196 5.89464 21.2652 6 21 6H13C12.7348 6 12.4804 5.89464 12.2929 5.70711C12.1054 5.51957 12 5.26522 12 5Z"
                                        fill="#959895" />
                                    <path
                                        d="M12 12C12 11.7348 12.1054 11.4804 12.2929 11.2929C12.4804 11.1054 12.7348 11 13 11H21C21.2652 11 21.5196 11.1054 21.7071 11.2929C21.8946 11.4804 22 11.7348 22 12C22 12.2652 21.8946 12.5196 21.7071 12.7071C21.5196 12.8946 21.2652 13 21 13H13C12.7348 13 12.4804 12.8946 12.2929 12.7071C12.1054 12.5196 12 12.2652 12 12Z"
                                        fill="#959895" />
                                    <path
                                        d="M12 19C12 18.7348 12.1054 18.4804 12.2929 18.2929C12.4804 18.1054 12.7348 18 13 18H21C21.2652 18 21.5196 18.1054 21.7071 18.2929C21.8946 18.4804 22 18.7348 22 19C22 19.2652 21.8946 19.5196 21.7071 19.7071C21.5196 19.8946 21.2652 20 21 20H13C12.7348 20 12.4804 19.8946 12.2929 19.7071C12.1054 19.5196 12 19.2652 12 19Z"
                                        fill="#959895" />
                                    <path
                                        d="M6.00071 3.95009L7.20071 6.00009H4.75071L6.00071 3.95009ZM6.00071 1.00009C5.82892 1.00747 5.66157 1.05691 5.51336 1.1441C5.36515 1.23128 5.24062 1.35352 5.15071 1.50009L2.10071 6.50009C2.02543 6.65602 1.98633 6.82694 1.98633 7.00009C1.98633 7.17325 2.02543 7.34416 2.10071 7.50009C2.18306 7.65325 2.30587 7.78086 2.45575 7.86902C2.60563 7.95719 2.77684 8.00253 2.95071 8.00009H9.00071C9.1725 7.99272 9.33985 7.94327 9.48806 7.85609C9.63627 7.76891 9.7608 7.64666 9.85071 7.50009C9.9496 7.35209 10.0024 7.17809 10.0024 7.00009C10.0024 6.8221 9.9496 6.64809 9.85071 6.50009L6.85071 1.50009C6.76836 1.34694 6.64555 1.21933 6.49567 1.13116C6.34579 1.043 6.17458 0.99766 6.00071 1.00009Z"
                                        fill="#959895" />
                                    <path
                                        d="M6 15C5.40666 15 4.82664 14.8241 4.33329 14.4944C3.83994 14.1648 3.45543 13.6962 3.22836 13.1481C3.0013 12.5999 2.94189 11.9967 3.05765 11.4147C3.1734 10.8328 3.45912 10.2982 3.87868 9.87868C4.29824 9.45912 4.83279 9.1734 5.41473 9.05765C5.99667 8.94189 6.59987 9.0013 7.14805 9.22836C7.69623 9.45543 8.16477 9.83994 8.49441 10.3333C8.82405 10.8266 9 11.4067 9 12C9 12.7957 8.68393 13.5587 8.12132 14.1213C7.55871 14.6839 6.79565 15 6 15ZM6 11C5.80222 11 5.60888 11.0587 5.44443 11.1685C5.27998 11.2784 5.15181 11.4346 5.07612 11.6173C5.00043 11.8 4.98063 12.0011 5.01922 12.1951C5.0578 12.3891 5.15304 12.5673 5.29289 12.7071C5.43275 12.847 5.61093 12.9422 5.80491 12.9808C5.99889 13.0194 6.19996 12.9996 6.38268 12.9239C6.56541 12.8482 6.72159 12.72 6.83147 12.5556C6.94135 12.3911 7 12.1978 7 12C7 11.7348 6.89464 11.4804 6.70711 11.2929C6.51957 11.1054 6.26522 11 6 11Z"
                                        fill="#959895" />
                                    <path
                                        d="M8 22H4C3.73478 22 3.48043 21.8946 3.29289 21.7071C3.10536 21.5196 3 21.2652 3 21V17C3 16.7348 3.10536 16.4804 3.29289 16.2929C3.48043 16.1054 3.73478 16 4 16H8C8.26522 16 8.51957 16.1054 8.70711 16.2929C8.89464 16.4804 9 16.7348 9 17V21C9 21.2652 8.89464 21.5196 8.70711 21.7071C8.51957 21.8946 8.26522 22 8 22ZM5 20H7V18H5V20Z"
                                        fill="#959895" />
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
                                            $latestNotifications = $adminnotifikasi->sortByDesc('created_at')->take(3);
                                        @endphp

                                        @forelse ($latestNotifications as $notif)
                                            <div class="card-body p-0">
                                                @if ($notif->keterangan_admin === 'pesanan berhasil dikonfirmasi')
                                                    <div class="d-flex text-align-center">
                                                        <div class="w-100">
                                                            <h6 class="mb-0">{{ $notif->keterangan_admin }}</h6>
                                                            <p class="mb-0" style="font-size: 15px">
                                                                {{ $notif->isi_admin }}</p>
                                                            <small class="float-end font-size-4"
                                                                id="time-{{ $notif->id }}"></small>
                                                        </div>
                                                    </div>
                                                @else
                                                    <a href="{{ route('pembelianadmin.index') }}" class="iq-sub-card"
                                                        data-notification-id="{{ $notif->id }}">
                                                        <div class="d-flex text-align-center">
                                                            <div class="w-100">
                                                                <h6 class="mb-0">{{ $notif->keterangan_admin }}</h6>
                                                                <p class="mb-0" style="font-size: 15px">
                                                                    {{ $notif->isi_admin }}</p>
                                                                <small class="float-end font-size-4"
                                                                    id="time-{{ $notif->id }}"></small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                @endif
                                            </div>
                                        @empty
                                            <div class="card-body p-0">
                                                <a href="" class="iq-sub-card">
                                                    <div class="d-flex text-align-center">
                                                        <h6 class="mb-0">Tidak ada notifikasi.</h6>
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
                                                    url: "{{ route('notifikasiadmin') }}", // Ganti dengan URL yang sesuai di server
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
                                            setInterval(updateNotificationCount, 5000); // Contoh: 5000 milidetik (5 detik)

                                            // Public JavaScript file

                                            $('.iq-sub-card').click(function() {
                                                var notificationId = $(this).data('notification-id');
                                                var clickedNotification = $(this);
                                                // Ambil token CSRF dari meta tag
                                                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                                                $.ajax({
                                                    url: 'readnotifikasiadmin/' + notificationId,
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
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <li><button type="submit" class="dropdown-item">logout</button></li>
                                    </form>
                                </ul>
                            </li>
                            <!-- End Profile-->
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        {{-- dashboard --}}
        <!doctype html>
        <html lang="en" dir="ltr">

        <!-- Mirrored from templates.iqonic.design/aprycot/html/dashboard/dist/dashboard/admin-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 Aug 2023 04:53:24 GMT -->

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <title>Aprycot | Restaurant Management Admin Template</title>

            <!-- Favicon -->
            <link rel="shortcut icon"
                href="https://templates.iqonic.design/aprycot/html/dashboard/dist/assets/images/favicon.ico" />

            <!-- Library / Plugin Css Build -->
            <link rel="stylesheet" href="../assets/css/core/libs.min.css">

            <!-- Custom Css -->
            <link rel="stylesheet" href="../assets/css/aprycot.mine209.css?v=1.0.0">

        </head>

        <div class="content-inner mt-5 py-0">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <!-- <div class="bg-info text-white rounded p-3"> -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="31"
                                    viewBox="0 0 37 29" fill="none">
                                    <path
                                        d="M5.55 12.1978C7.59078 12.1978 9.25 10.3745 9.25 8.13187C9.25 5.88925 7.59078 4.06593 5.55 4.06593C3.50922 4.06593 1.85 5.88925 1.85 8.13187C1.85 10.3745 3.50922 12.1978 5.55 12.1978ZM31.45 12.1978C33.4908 12.1978 35.15 10.3745 35.15 8.13187C35.15 5.88925 33.4908 4.06593 31.45 4.06593C29.4092 4.06593 27.75 5.88925 27.75 8.13187C27.75 10.3745 29.4092 12.1978 31.45 12.1978ZM33.3 14.2308H29.6C28.5825 14.2308 27.6633 14.6818 26.9927 15.4124C29.3225 16.8165 30.9759 19.3513 31.3344 22.3626H35.15C36.1733 22.3626 37 21.4542 37 20.3297V18.2967C37 16.0541 35.3408 14.2308 33.3 14.2308ZM18.5 14.2308C22.0786 14.2308 24.975 11.0479 24.975 7.11538C24.975 3.18286 22.0786 0 18.5 0C14.9214 0 12.025 3.18286 12.025 7.11538C12.025 11.0479 14.9214 14.2308 18.5 14.2308ZM22.94 16.2637H22.4602C21.2577 16.899 19.9222 17.2802 18.5 17.2802C17.0778 17.2802 15.7481 16.899 14.5398 16.2637H14.06C10.3831 16.2637 7.4 19.5419 7.4 23.5824V25.4121C7.4 27.0956 8.64297 28.4615 10.175 28.4615H26.825C28.357 28.4615 29.6 27.0956 29.6 25.4121V23.5824C29.6 19.5419 26.6169 16.2637 22.94 16.2637ZM10.0073 15.4124C9.33672 14.6818 8.4175 14.2308 7.4 14.2308H3.7C1.65922 14.2308 0 16.0541 0 18.2967V20.3297C0 21.4542 0.826719 22.3626 1.85 22.3626H5.65984C6.02406 19.3513 7.6775 16.8165 10.0073 15.4124Z"
                                        fill="#EA6A12" />
                                </svg>
                                <!-- </div> -->
                                <div class="text-end">
                                    <h2 class="angka m-0">{{ $totalpengguna }}</h2>
                                    <p>jumlah Penjual</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <!-- <div class="bg-success text-white rounded p-3"> -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                    viewBox="0 0 50 50" fill="none">
                                    <path
                                        d="M18.7533 22.9167C20.4014 22.9167 22.0126 22.4279 23.383 21.5123C24.7534 20.5966 25.8215 19.2951 26.4523 17.7724C27.083 16.2496 27.248 14.5741 26.9265 12.9576C26.6049 11.3411 25.8113 9.85622 24.6458 8.69078C23.4804 7.52534 21.9955 6.73167 20.379 6.41013C18.7625 6.08858 17.0869 6.25361 15.5642 6.88434C14.0415 7.51507 12.74 8.58318 11.8243 9.95359C10.9087 11.324 10.4199 12.9352 10.4199 14.5833C10.4199 16.7935 11.2979 18.9131 12.8607 20.4759C14.4235 22.0387 16.5431 22.9167 18.7533 22.9167Z"
                                        fill="#EA6A12" />
                                    <path
                                        d="M35.4199 27.084C36.6561 27.084 37.8644 26.7174 38.8922 26.0307C39.92 25.3439 40.7211 24.3678 41.1942 23.2258C41.6672 22.0837 41.791 20.8271 41.5498 19.6147C41.3087 18.4023 40.7134 17.2886 39.8393 16.4146C38.9653 15.5405 37.8516 14.9452 36.6392 14.7041C35.4269 14.4629 34.1702 14.5867 33.0282 15.0597C31.8861 15.5328 30.91 16.3339 30.2232 17.3617C29.5365 18.3895 29.1699 19.5979 29.1699 20.834C29.1699 22.4916 29.8284 24.0813 31.0005 25.2534C32.1726 26.4255 33.7623 27.084 35.4199 27.084Z"
                                        fill="#EA6A12" />
                                    <path
                                        d="M43.7533 41.6691C44.3058 41.6691 44.8357 41.4496 45.2264 41.0589C45.6171 40.6682 45.8366 40.1383 45.8366 39.5857C45.8349 37.6387 45.2876 35.731 44.2566 34.0792C43.2257 32.4275 41.7524 31.0977 40.004 30.2409C38.2556 29.384 36.302 29.0344 34.3649 29.2316C32.4278 29.4288 30.5848 30.165 29.0449 31.3566C27.0043 29.324 24.4075 27.9412 21.5821 27.3825C18.7566 26.8238 15.8289 27.1143 13.1683 28.2173C10.5077 29.3203 8.23328 31.1864 6.63188 33.5804C5.03048 35.9744 4.17382 38.7889 4.16992 41.6691C4.16992 42.2216 4.38942 42.7515 4.78012 43.1422C5.17082 43.5329 5.70072 43.7524 6.25326 43.7524H31.2533C31.8058 43.7524 32.3357 43.5329 32.7264 43.1422C33.1171 42.7515 33.3366 42.2216 33.3366 41.6691"
                                        fill="#EA6A12" />
                                </svg>
                                <!-- </div> -->
                                <div class="text-end">
                                    <h2 class="angka m-0">{{ $totaluser }}</h2>
                                    <p>Jumlah User</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <!-- <div class="bg-warning text-white rounded p-3"> -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="61" height="61"
                                    viewBox="0 0 61 61" fill="none">
                                    <path
                                        d="M42.0451 59.2335C32.6133 59.2335 24.9009 51.7382 24.5454 42.3943H17.7218C17.3495 42.3943 17.0482 42.0931 17.0482 41.7208V17.3975C17.0482 17.0252 17.3495 16.7239 17.7218 16.7239H27.0769C27.2565 16.7239 27.4268 16.795 27.5521 16.9204C27.6794 17.0476 27.7505 17.2179 27.7505 17.3975V31.6079C28.9105 29.9595 30.3568 28.5188 32.0164 27.3682V2.42747C32.0164 2.05514 32.3176 1.75391 32.69 1.75391H42.0451C42.2247 1.75391 42.3968 1.82501 42.5222 1.95036C42.6475 2.07946 42.7186 2.2516 42.7186 2.42934L42.7168 24.2211C52.0625 24.5747 59.5578 32.2889 59.5578 41.7208C59.5578 51.3771 51.7014 59.2335 42.0451 59.2335ZM42.0451 25.5551C38.8288 25.5551 35.7248 26.4981 33.0642 28.285C30.7815 29.7968 28.9199 31.8886 27.6775 34.3377C26.5006 36.5998 25.8794 39.1518 25.8794 41.7208C25.8794 50.6343 33.1315 57.8864 42.0451 57.8864C50.9586 57.8864 58.2107 50.6343 58.2107 41.7208C58.2107 32.8072 50.9586 25.5551 42.0451 25.5551ZM18.3954 41.0472H24.5454C24.6427 38.5494 25.2789 36.0852 26.4033 33.8718V18.0711H18.3954V41.0472ZM33.3635 3.10291L33.3617 26.515C33.5207 26.4252 33.6797 26.3354 33.8425 26.2493C34.9932 25.6356 36.2056 25.1566 37.4592 24.8161C38.7296 24.4718 40.0393 24.2716 41.3696 24.2211L41.3715 3.10291H33.3635ZM42.7186 51.0759H41.3715V48.0074H36.432V46.6602H44.8516C46.0285 46.6602 46.9846 45.7042 46.9846 44.5273C46.9846 43.3504 46.0285 42.3943 44.8516 42.3943H39.2367C37.3189 42.3943 35.7584 40.832 35.7584 38.9142C35.7584 36.9964 37.3189 35.4341 39.2367 35.4341H41.3715V32.3657H42.7205V35.4341H47.6581V36.7831H39.2367C38.0617 36.7831 37.1056 37.7392 37.1056 38.9161C37.1056 40.093 38.0617 41.0491 39.2367 41.0491H44.8516C46.7694 41.0491 48.3317 42.6114 48.3317 44.5292C48.3317 46.447 46.7694 48.0093 44.8516 48.0093H42.7186V51.0759ZM12.1087 42.3943H2.75365C2.38131 42.3943 2.08008 42.0931 2.08008 41.7208V28.6236C2.08008 28.2513 2.38131 27.9501 2.75365 27.9501H12.1087C12.4811 27.9501 12.7823 28.2513 12.7823 28.6236V41.7208C12.7823 42.0931 12.4811 42.3943 12.1087 42.3943ZM3.42721 41.0472H11.4352V29.2972H3.42721V41.0472Z"
                                        fill="#EA6A12" />
                                </svg>
                                <!-- </div> -->
                                <div class="text-end">
                                    <h2 class="angka m-0">{{ $totalpembelian }}</h2>
                                    <p>Jumlah Pembelian</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <!-- <div class="bg-info text-white rounded p-3"> -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41"
                                    viewBox="0 0 41 41" fill="none">
                                    <path
                                        d="M0.880859 32.1582V35.4941C0.880859 38.252 7.59961 40.4941 15.8809 40.4941C24.1621 40.4941 30.8809 38.252 30.8809 35.4941V32.1582C27.6543 34.4316 21.7559 35.4941 15.8809 35.4941C10.0059 35.4941 4.10742 34.4316 0.880859 32.1582ZM25.8809 10.4941C34.1621 10.4941 40.8809 8.25195 40.8809 5.49414C40.8809 2.73633 34.1621 0.494141 25.8809 0.494141C17.5996 0.494141 10.8809 2.73633 10.8809 5.49414C10.8809 8.25195 17.5996 10.4941 25.8809 10.4941ZM0.880859 23.9629V27.9941C0.880859 30.752 7.59961 32.9941 15.8809 32.9941C24.1621 32.9941 30.8809 30.752 30.8809 27.9941V23.9629C27.6543 26.6191 21.748 27.9941 15.8809 27.9941C10.0137 27.9941 4.10742 26.6191 0.880859 23.9629ZM33.3809 24.8223C37.8574 23.9551 40.8809 22.3457 40.8809 20.4941V17.1582C39.0684 18.4395 36.4043 19.3145 33.3809 19.8535V24.8223ZM15.8809 12.9941C7.59961 12.9941 0.880859 15.791 0.880859 19.2441C0.880859 22.6973 7.59961 25.4941 15.8809 25.4941C24.1621 25.4941 30.8809 22.6973 30.8809 19.2441C30.8809 15.791 24.1621 12.9941 15.8809 12.9941ZM33.0137 17.3926C37.7012 16.5488 40.8809 14.8926 40.8809 12.9941V9.6582C38.1074 11.6191 33.3418 12.6738 28.3262 12.9238C30.6309 14.041 32.3262 15.541 33.0137 17.3926Z"
                                        fill="#ED790E" />
                                </svg>
                                <!-- </div> -->
                                <div class="text-end">
                                    <h2 class="angka m-0">Rp. {{ number_format($untung, 0, ',', '.') }}</h2>
                                    <p>Untung</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12"> <!-- Mengganti col-lg-7 col-xl-8 menjadi col-lg-12 -->
                    <div class="card" data-iq-gsap="onStart" data-iq-opacity="0" data-iq-position-y="-40"
                        data-iq-duration=".6" data-iq-delay=".4" data-iq-trigger="scroll" data-iq-ease="none">
                        <div class="card-header">
                            <h4 class="card-title">Total Pembelian</h4>
                            <small>2023-2024</small>
                        </div>
                        <div class="card-body" data-iq-gsap="onStart" data-iq-opacity="0" data-iq-position-y="-40"
                            data-iq-duration=".6" data-iq-delay=".6" data-iq-trigger="scroll" data-iq-ease="none">
                            <div id="admin-chart-1" class="admin-chart-1"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pesan-shopee">
                <a href="">
                    <button class="btn-pesan-shopee" id="btn-pesan-shopee">
                        <i class="fa fa-comments"></i>
                    </button>
                </a>
            </div>


        </div>

        <!-- Footer Section Start -->
        <footer class="footer">
            <div class="footer-body">
                <ul class="left-panel list-inline mb-0 p-0">
                    <li class="list-inline-item"><a href="extra/privacy-policy.html">Privacy Policy</a></li>
                    <li class="list-inline-item"><a href="extra/terms-of-service.html">Terms of Use</a></li>
                </ul>
                <div class="right-panel">
                    ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script> Aprycot, Made with
                    <span class="text-gray">
                        <svg width="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M15.85 2.50065C16.481 2.50065 17.111 2.58965 17.71 2.79065C21.401 3.99065 22.731 8.04065 21.62 11.5806C20.99 13.3896 19.96 15.0406 18.611 16.3896C16.68 18.2596 14.561 19.9196 12.28 21.3496L12.03 21.5006L11.77 21.3396C9.48102 19.9196 7.35002 18.2596 5.40102 16.3796C4.06102 15.0306 3.03002 13.3896 2.39002 11.5806C1.26002 8.04065 2.59002 3.99065 6.32102 2.76965C6.61102 2.66965 6.91002 2.59965 7.21002 2.56065H7.33002C7.61102 2.51965 7.89002 2.50065 8.17002 2.50065H8.28002C8.91002 2.51965 9.52002 2.62965 10.111 2.83065H10.17C10.21 2.84965 10.24 2.87065 10.26 2.88965C10.481 2.96065 10.69 3.04065 10.89 3.15065L11.27 3.32065C11.3618 3.36962 11.4649 3.44445 11.554 3.50912C11.6104 3.55009 11.6612 3.58699 11.7 3.61065C11.7163 3.62028 11.7329 3.62996 11.7496 3.63972C11.8354 3.68977 11.9247 3.74191 12 3.79965C13.111 2.95065 14.46 2.49065 15.85 2.50065ZM18.51 9.70065C18.92 9.68965 19.27 9.36065 19.3 8.93965V8.82065C19.33 7.41965 18.481 6.15065 17.19 5.66065C16.78 5.51965 16.33 5.74065 16.18 6.16065C16.04 6.58065 16.26 7.04065 16.68 7.18965C17.321 7.42965 17.75 8.06065 17.75 8.75965V8.79065C17.731 9.01965 17.8 9.24065 17.94 9.41065C18.08 9.58065 18.29 9.67965 18.51 9.70065Z"
                                fill="currentColor"></path>
                        </svg>
                    </span> by <a href="https://iqonic.design/">IQONIC Design</a>.
                </div>
            </div>
        </footer>
        <!-- Footer Section End -->
    </main>

</html>

{{-- @include('layout.footer') --}}
</main>
@include('layout.js')
<script>
    var chartData = @json($chartData);

        if (jQuery('#admin-chart-1').length) {
            const options = {
                series: [{
                    name:'Data Pembelian',
                        type: 'line',
                        curve: 'smooth',
                    data: chartData.map(data => parseInt(data.statusselesai))
                }],
                chart: {
                    height: 350,
                    type: 'line',
                    animations: {
                        enabled: true,
                        easing: 'easeinout',
                        speed: 800,
                        animateGradually: {
                            enabled: false,
                            delay: 150
                        },
                        dynamicAnimation: {
                            enabled: true,
                            speed: 350
                        }
                    },
                    zoom: {
                        enabled: false,
                    },
                    toolbar: {
                        show: false
                    }
                },
                tooltip: {
                    enabled: true,
                },
                stroke: {
                    width: 2
                },
                dataLabels: {
                    enabled: true,
                    offsetX: 3.0,
                    offsetY: -1.6,
                    style: {
                        fontSize: '1px',
                        fontFamily: 'Helvetica, Arial, sans-serif',
                        fontWeight: 'bold',
                    },
                    background: {
                        enabled: true,
                        foreColor: '#fff',
                        color: '#fff',
                        padding: 10,
                        borderRadius: 10,
                        borderWidth: 0,
                        borderColor: '#fff',
                        opacity: 1,
                    }

                },
                colors: ["#EA6A12"],
                legend: {
                    show: false,
                    offsetY: -25,
                    offsetX: -5
                },
                xaxis: {
                    categories: chartData.map(data => data.month),
                    labels: {
                        minHeight: 20,
                        maxHeight: 20,
                    }
                },
                yaxis: {
                    labels: {
                        minWidth: 20,
                        maxWidth: 20,
                    }
                },
            };

        const chart = new ApexCharts(document.querySelector("#admin-chart-1"), options);
        chart.render();
    }
</script>
</body>

</html>
