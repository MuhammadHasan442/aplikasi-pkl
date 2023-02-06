@extends('master')
@section('konten')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $title }}</h6>
        </div>
        <div class="card-body">
            <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#tambahModal">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Data</span>
            </a>
            <a href="#" class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#cetakModal">
                <span class="icon text-white-50">
                    <i class="fas fa-file-pdf"></i>
                </span>
                <span class="text">Cetak Data</span>
            </a>
            <div class="table-responsive">
            <br>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">SN</th>
                        <th scope="col">Merk CCTV</th>
                        <th scope="col">Tipe</th>
                        <th scope="col">Letak</th>
                        <th scope="col">Tahun</th>
                        <th scope="col">AKSI</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($pemko as $key => $post)
                    <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $post->sn }}</td>
                            <td>{{ $post->merk_cctv }}</td>
                            <td>{{ $post->tipe }}</td>
                            <td>{{ $post->letak }}</td>
                            <td>{{ $post->tahun }}</td>
                            <td class="text-center">
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('data-cctv-pemko.destroy', $post->sn) }}" method="POST">
                                    <input type="hidden" value="{{$post->sn}}" name="sn">
                                    <a href="{{ route('data-cctv-pemko.edit', $post->sn) }}" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editModal" onclick="get_data('{{ $post->sn }}')">EDIT</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <div class="alert alert-danger">
                            Data Belum Tersedia.
                        </div>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @push('js')
    <script>
        function get_data(sn) {
            // JavaScript untuk ambil data buat Edit Data
            $.ajax({
                url: "/getPemko/"+sn,
                type: 'GET',
                dataType: 'json', // added data type
                success: function(res) {
                    for (const iterator of res) {
                        $('#sn').val(`${iterator.sn}`)
                        $('#merkcctv').val(`${iterator.merk_cctv}`)
                        $('#tipe').val(`${iterator.tipe}`)
                        $('#letak').val(`${iterator.letak}`)
                        $('#tahun').val(`${iterator.tahun}`)
                    }
                },
                onError: function (err) {
                    console.log(err)
                }
            });

        }
    </script>
    @endpush
    @include('data-cctv-pemko.insert')
    @include('data-cctv-pemko.edit') 
    @include('data-cctv-pemko.cetak') 
@endsection
