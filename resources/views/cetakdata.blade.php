@extends('master')
@section('konten')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
    </div>

    <div class="row">
        <div class="col-lg-6">

            <!-- Visi Misi -->
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
                            <button id="tombol-pdf" type="submit" class="btn btn-danger">Download PDF</button>
                            <button id="tombol-preview" type="submit" class="btn btn-primary">Preview Data</button>
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

                $('#tombol-pdf').click(function(){

                    if (kategori == "Server") {

                        $('#cetak').attr('action', "{{ route('pdfDS') }}");

                    }

                });

                $('#tombol-preview').click(function(){

                    if (kategori == "Server") {

                        $('#cetak').attr('action', "{{ route('prevServer') }}");

                    }

                });



            });

        });
    </script>
    @endpush
@endsection