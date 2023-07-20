<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard">
        <div class="sidebar-brand-icon rotate-n-15">
            <img src="{{ asset('img\logo-kominfo-transparent.png') }}" style="position:relative; left:17%; width: 40px; height: auto;" alt="">
        </div>
        <div class="sidebar-brand-text mx-3">Administrator</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->Is('dashboard') ? 'active':'' }}">
        <a class="nav-link" href="dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item {{ request()->Is('list-ip') ? 'active':'' }}">
        <a class="nav-link" href="list-ip">
            <i class="fa fa-link"></i>
            <span>Daftar IP</span></a>
    </li>

    <li class="nav-item {{ request()->Is('list-merk') ? 'active':'' }}">
        <a class="nav-link" href="list-merk">
            <i class="fa fa-list-ul"></i>
            <span>Daftar Merk</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <!-- Nav Item - Data Jaringan Menu -->
    <li class="nav-item {{ request()->Is('data-server') | request()->Is('data-perangkat-jaringan') | request()->Is('data-access-point') | request()->Is('data-wifi-publik') ? 'active':'' }}">
        <a class="nav-link {{ request()->Is('data-server') | request()->Is('data-perangkat-jaringan') | request()->Is('data-access-point') | request()->Is('data-wifi-publik') ? '':'collapsed' }}" href="#" data-toggle="collapse" data-target="#dataJaringan"
            aria-expanded="{{ request()->Is('data-server') | request()->Is('data-perangkat-jaringan') | request()->Is('data-access-point') | request()->Is('data-wifi-publik') ? 'true':'' }}" aria-controls="dataJaringan">
            <i class="fas fa-desktop"></i>
            <span>Data Jaringan</span>
        </a>
        <div id="dataJaringan" class="collapse {{ request()->Is('data-server') | request()->Is('data-perangkat-jaringan') | request()->Is('data-access-point') | request()->Is('data-wifi-publik') ? 'show':'' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->Is('data-server') ? 'active':'' }}" href="data-server">Server</a>
                <a class="collapse-item {{ request()->Is('data-perangkat-jaringan') ? 'active':'' }}" href="data-perangkat-jaringan">Perangkat Jaringan</a>
                <a class="collapse-item {{ request()->Is('data-access-point') ? 'active':'' }}" href="data-access-point">Access Point</a>
                <a class="collapse-item {{ request()->Is('data-wifi-publik') ? 'active':'' }}" href="data-wifi-publik">Wifi Publik</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Data CCTV Menu -->
    <li class="nav-item {{ request()->Is('data-nvr-cctv') | request()->Is('data-cctv-pemko') | request()->Is('data-cctv-publik') ? 'active':'' }}">
        <a class="nav-link {{ request()->Is('data-nvr-cctv') | request()->Is('data-cctv-pemko') | request()->Is('data-cctv-publik') ? '':'collapsed' }}" href="#" data-toggle="collapse" data-target="#dataCctv"
            aria-expanded="{{ request()->Is('data-nvr-cctv') | request()->Is('data-cctv-pemko') | request()->Is('data-cctv-publik') ? 'true':'' }}" aria-controls="dataCctv">
            <i class="fa fa-camera"></i>
            <span>Data CCTV</span>
        </a>
        <div id="dataCctv" class="collapse {{ request()->Is('data-nvr-cctv') | request()->Is('data-cctv-pemko') | request()->Is('data-cctv-publik') ? 'show':'' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->Is('data-nvr-cctv') ? 'active':'' }}" href="data-nvr-cctv">NVR CCTV</a>
                <a class="collapse-item {{ request()->Is('data-cctv-pemko') ? 'active':'' }}" href="data-cctv-pemko">CCTV Pemko</a>
                <a class="collapse-item {{ request()->Is('data-cctv-publik') ? 'active':'' }}" href="data-cctv-publik">CCTV Publik</a>
            </div>
        </div>
    </li>

    <li class="nav-item {{ request()->Is('data-perangkat-rusak') ? 'active':'' }}">
        <a class="nav-link" href="data-perangkat-rusak">
            <i class="fa fa-unlink"></i>
            <span>Data Perangkat Rusak</span></a>
    </li>

    <li class="nav-item {{ request()->Is('data-pemeliharaan-perangkat') ? 'active':'' }}">
        <a class="nav-link" href="data-pemeliharaan-perangkat">
            <i class="fa fa-wrench"></i>
            <span>Data Pemeliharaan Perangkat</span></a>
    </li>

    <li class="nav-item {{ request()->Is('data-pengadaan-perangkat') ? 'active':'' }}">
        <a class="nav-link" href="data-pengadaan-perangkat">
            <i class="fas fa-boxes"></i>
            <span>Data Pengadaan Perangkat</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
