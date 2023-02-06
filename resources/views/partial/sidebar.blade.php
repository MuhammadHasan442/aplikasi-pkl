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

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ request()->Is('data-server') ? 'active':'' }}">
        <a class="nav-link" href="data-server">
            <i class="fas fa-tasks"></i>
            <span>Data Server</span></a>
    </li>
    <li class="nav-item {{ request()->Is('data-perangkat-jaringan') ? 'active':'' }}">
        <a class="nav-link" href="data-perangkat-jaringan">
            <i class="fas fa-desktop"></i>
            <span>Data Perangkat Jaringan</span></a>
    </li>
    <li class="nav-item {{ request()->Is('data-access-point') ? 'active':'' }}">
        <a class="nav-link" href="data-access-point">
            <i class="fas fa-upload"></i>
            <span>Data Access Point</span></a>
    </li>
    <li class="nav-item {{ request()->Is('data-nvr-cctv') ? 'active':'' }}">
        <a class="nav-link" href="data-nvr-cctv">
            <i class="fas fa-inbox"></i>
            <span>Data NVR CCTV</span></a>
    </li>
    <li class="nav-item {{ request()->Is('data-cctv-pemko') ? 'active':'' }}">
        <a class="nav-link" href="data-cctv-pemko">
            <i class="fas fa-camera"></i>
            <span>Data CCTV Pemko</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
