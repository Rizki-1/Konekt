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
                <ul class="sub-nav collapse" id="home" data-bs-parent="#sidebar">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="menu">
                          <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                    <g>
                                    <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                </svg>
                            </i>
                          <i class="sidenav-mini-icon">M</i>
                          <span class="item-name">Menu</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Request()->routeIs('daftartoko') ? 'active' : '' }}""aria-current="page" href="daftartoko">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                    <g>
                                    <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                </svg>
                            </i>
                            <i class="sidenav-mini-icon">D</i>
                            <span class="item-name">Daftar Toko</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="pesanan">
                           <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                    <g>
                                    <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                </svg>
                            </i>
                           <i class="sidenav-mini-icon">P</i>
                           <span class="item-name">Pesanan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="riwayat">
                           <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                    <g>
                                    <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                </svg>
                            </i>
                           <i class="sidenav-mini-icon">R</i>
                           <span class="item-name">Riwayat</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="restaurant-dashboard.html">
                           <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                    <g>
                                    <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                </svg>
                            </i>
                           <i class="sidenav-mini-icon">K</i>
                           <span class="item-name">Keranjang</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu End -->
    </div>
</div>
