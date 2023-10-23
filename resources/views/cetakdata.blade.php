@extends('master')
@section('konten')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
    </div>

    <div class="row">

        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Jaringan & CCTV</h6>
                </div>

                <div class="card-body">
                    <form id="cetak" method="POST" target="_blank">
                        @csrf
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select name="kategori" class="form-control" id="kategori">
                                <option disabled selected>- Pilih Data -</option>
                                <option value="Server">Server</option>
                                <option value="Perangkat Jaringan">Perangkat Jaringan</option>
                                <option value="Access Point">Access Point</option>
                                <option value="NVR CCTV">NVR CCTV</option>
                                <option value="CCTV Pemko">CCTV Pemko</option>
                                <option value="CCTV Publik">CCTV Publik</option>
                                <option value="Wifi Publik">Wifi Publik</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tahun">Tahun</label>
                            <select name="tahun" class="form-control" id="tahun">
                                <option disabled selected>- Pilih Data -</option>
                                <option value="semua">Semua Data</option>
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button id="pdf-jarcctv" type="submit" class="btn btn-danger">Download PDF</button>
                            <button id="prev-jarcctv" type="submit" class="btn btn-primary">Preview Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Perangkat Rusak</h6>
                </div>

                <div class="card-body">
                    <form id="cetak-rusak" method="POST" target="_blank">
                        @csrf
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control" id="status">
                                <option disabled selected>- Pilih Data -</option>
                                <option value="semua">Semua Data</option>
                                <option value="Hidup">Hidup</option>
                                <option value="Mati Total">Mati Total</option>
                                <option value="Rusak">Rusak</option>
                                <option value="Tanpa Status">Tanpa Status</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button id="pdf-rusak" type="submit" class="btn btn-danger">Download PDF</button>
                            <button id="prev-rusak" type="submit" class="btn btn-primary">Preview Data</button>
                    </form>
                        <form action="rekapRusak" method="get" target="_blank">
                            <button type="submit" class="btn btn-success">Rekap Data</button>
                        </form>
                        </div>
                </div>

            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pengadaan dan Pemeliharaan</h6>
                </div>

                <div class="card-body">
                    <form id="cetak-pp" method="POST" target="_blank">
                        @csrf
                        <div class="form-group">
                            <label for="menu">Kategori</label>
                            <select name="menu" class="form-control" id="menu">
                                <option disabled selected>- Pilih Data -</option>
                                <option value="pengadaan">Pengadaan Perangkat</option>
                                <option value="pemeliharaan">Pemeliharaan Perangkat</option>
                            </select>
                        </div>
                        <div class="form-group form-row">
                            <div class="col-md-6">
                                <label for="minharga">Harga Min. (Rp)</label>
                                <input type="text" class="form-control" name="minharga" aria-describedby="minharga" value=0 ></div>
                            <div class="col-md-6">
                                <label for="maxharga">Harga Max. (Rp)</label>
                                <input type="text" class="form-control" name="maxharga" aria-describedby="maxharga" value=0 ></div>
                        </div>
                        <div class="modal-footer">
                            <button id="pdf-pp" type="submit" class="btn btn-danger">Download PDF</button>
                            <button id="prev-pp" type="submit" class="btn btn-primary">Preview Data</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>

    @push('js')
    <script>
        $(function() {

            $("#kategori").on("change", function() {

                var kategori = $(this).val();

                $('#pdf-jarcctv').click(function(){

                    if (kategori == "Server") {

                        $('#cetak').attr('action', "{{ route('pdfDS') }}");

                    } else if (kategori == "Perangkat Jaringan") {

                        $('#cetak').attr('action', "{{ route('pdfPJ') }}");

                    } else if (kategori == "Access Point") {

                        $('#cetak').attr('action', "{{ route('pdfAP') }}");

                    } else if (kategori == "NVR CCTV") {

                        $('#cetak').attr('action', "{{ route('pdfNVR') }}");

                    } else if (kategori == "CCTV Pemko") {

                        $('#cetak').attr('action', "{{ route('pdfPemko') }}");

                    } else if (kategori == "CCTV Publik") {

                        $('#cetak').attr('action', "{{ route('pdfPublik') }}");

                    } else if (kategori == "Wifi Publik") {

                        $('#cetak').attr('action', "{{ route('pdfWifi') }}");

                    }

                });

                $('#prev-jarcctv').click(function(){

                    if (kategori == "Server") {

                        $('#cetak').attr('action', "{{ route('prevServer') }}");

                    } else if (kategori == "Perangkat Jaringan") {

                        $('#cetak').attr('action', "{{ route('prevPJ') }}");

                    } else if (kategori == "Access Point") {

                        $('#cetak').attr('action', "{{ route('prevAP') }}");

                    } else if (kategori == "NVR CCTV") {

                        $('#cetak').attr('action', "{{ route('prevNvr') }}");

                    } else if (kategori == "CCTV Pemko") {

                        $('#cetak').attr('action', "{{ route('prevPemko') }}");

                    } else if (kategori == "CCTV Publik") {

                        $('#cetak').attr('action', "{{ route('prevPublik') }}");

                    } else if (kategori == "Wifi Publik") {

                        $('#cetak').attr('action', "{{ route('prevWifi') }}");

                    }

                });

            });

            $("#status").on("change", function() {

                var status = $(this).val();

                $('#pdf-rusak').click(function(){

                    $('#cetak-rusak').attr('action', "{{ route('pdfRusak') }}");

                });

                $('#prev-rusak').click(function(){

                    $('#cetak-rusak').attr('action', "{{ route('prevRusak') }}");

                });
            });

            $("#menu").on("change", function() {

                var menu = $(this).val();

                $('#pdf-pp').click(function(){

                    if (menu == 'pengadaan') {

                        $('#cetak-pp').attr('action', "{{ route('pdfPengadaan') }}");

                    } else if (menu == 'pemeliharaan') {

                        $('#cetak-pp').attr('action', "{{ route('pdfPemeliharaan') }}");

                    }

                });

                $('#prev-pp').click(function(){

                    if (menu == 'pengadaan') {

                        $('#cetak-pp').attr('action', "{{ route('prevPengadaan') }}");

                    } else if (menu == 'pemeliharaan') {

                        $('#cetak-pp').attr('action', "{{ route('prevPemeliharaan') }}");

                    }

                });


            });

        });
    </script>
    @endpush
@endsection