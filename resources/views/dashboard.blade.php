@extends('master')
@section('konten')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="row">
        <!-- CCTV Pemko Card-->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                CCTV Pemko</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $cctv }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-camera fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Server Card-->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Perangkat Server</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $server }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-desktop fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

    <div class="col-xl-12 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Perangkat Access Point</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $ap }}</div>
                    </div>
                        <div class="col-auto">
                            <i class="fas fa-upload fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">

            <!-- Visi Misi -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Visi dan Misi</h6>
                </div>
                <div class="card-body">
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Visi</div>
                    Adapun visi nya sebagai berikut :
                    <ol>
                        <li>Penyelenggaraan Pelayanan masyarakat dengan memanfaatkaan Teknologi Informasi dan Komunikasi.</li>
                    </ol>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Misi</div>
                    Adapun Misi sebagai berikut:
                    <ol>
                        <li>Melaksanakan pelayanan bidang informasi dan komunikasi dan statistik kepada masyarakat dalam rangka memberdayakan potensi masyarakat dan mewujudkan masyarakat berbudaya informasi;</li>
                        <li>Mengembangkan e-Government untuk mewujudkan pelayanan publik berbasis teknologi informasi.</li>
                    </ol>
                </div>
            </div>

        </div>

        <div class="col-lg-6">

            <!-- Peta Jabatan -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Peta Jabatan Diskominfotik Kota Banjarmasin</h6>
                </div>
                <div class="card-body">
                    <a href="{{ asset('img\peta-jabatan.jpg') }}" target="_blank">
                        <img src="{{ asset('img\peta-jabatan.jpg') }}" style="margin: auto;object-fit: contain;width: 75%;display: flex;" alt="">
                    </a>
                </div>
            </div>

        </div>

    </div>
@endsection