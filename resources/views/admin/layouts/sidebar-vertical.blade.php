<style>
    .text-red{
        color: #dd1b1b;
    }
</style>
<aside class="left-sidebar with-vertical">
    <div><!-- ---------------------------------- -->
        <!-- Start Vertical Layout Sidebar -->
        <!-- ---------------------------------- -->
        <div class="brand-logo d-flex align-items-center justify-content-center">
            <a href="{{ route('home') }}" class="text-nowrap logo-img">
                {{-- <h2 class="text-center mt-2 fw-bolder">D<span class="text-red">RR</span></h2> --}}
                <img src="{{ asset('img/logo2.jpeg') }}" width="100" alt="Logo" />
                {{-- <img class="text-center" src="#" alt="Logo" /> --}}
                {{-- <img src="{{ asset('modernize2/images/dark-logo.svg') }}" class="dark-logo" alt="Logo-Dark" />  
                <img src="{{ asset('modernize2/images/light-logo.svg') }}" class="light-logo" alt="Logo-light" />    --}}
            </a>
            <a href="javascript:void(0)" class="sidebartoggler ms-auto text-decoration-none fs-5 d-block d-xl-none">
                <i class="ti ti-x"></i>
            </a>
        </div>

        <nav class="sidebar-nav scroll-sidebar" data-simplebar>
            <ul id="sidebarnav">
                <!-- ---------------------------------- -->
                <!-- Home -->
                <!-- ---------------------------------- -->
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Home</span>
                </li>
                <!-- ---------------------------------- -->
                <!-- Dashboard -->
                <!-- ---------------------------------- -->
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('home') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('toko') }}" target="_blank" aria-expanded="false">
                        <span>
                            <i class="ti ti-aperture"></i>
                        </span>
                        <span class="hide-menu">Buka Toko</span>
                    </a>
                </li>
                <!-- ---------------------------------- -->
                <!-- Home -->
                <!-- ---------------------------------- -->
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">MENU MASTER</span>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('pelanggan.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-user"></i>
                        </span>
                        <span class="hide-menu">Data Pelanggan</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('pesanan.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-shopping-cart"></i>
                        </span>
                        <span class="hide-menu">Data Pesanan</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('category.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-package"></i>
                        </span>
                        <span class="hide-menu">Data Kategori</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('product.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-packages"></i>
                        </span>
                        <span class="hide-menu">Data Produk</span>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- ---------------------------------- -->
        <!-- End Vertical Layout Sidebar -->
        <!-- ---------------------------------- -->
    </div>
</aside>
