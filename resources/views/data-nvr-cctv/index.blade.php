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
                            <th scope="col">Merk NVR</th>
                            <th scope="col">Channel Video</th>
                            <th scope="col">HDD</th>
                            <th scope="col">Penggunaan</th>
                            <th scope="col">Tahun</th>
                            <th scope="col">AKSI</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($nvr as $key => $post)
                    <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $post->sn }}</td>
                            <td>{{ $post->merk_nvr }}</td>
                            <td>{{ $post->video_ch }}</td>
                            <td>{{ $post->hardisk }}</td>
                            <td>{{ $post->penggunaan }}</td>
                            <td>{{ $post->tahun }}</td>
                            <td class="text-center">
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('data-nvr-cctv.destroy', $post->sn) }}" method="POST">
                                    <input type="hidden" value="{{$post->sn}}" name="sn">
                                    <a href="{{ route('data-nvr-cctv.edit', $post->sn) }}" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editModal" onclick="get_data('{{ $post->sn }}')">EDIT</a>
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
                url: "/getNvr/"+sn,
                type: 'GET',
                dataType: 'json', // added data type
                success: function(res) {
                    for (const iterator of res) {
                        $('#sn').val(`${iterator.sn}`)
                        $('#merknvr').val(`${iterator.merk_nvr}`)
                        $('#videoch').val(`${iterator.video_ch}`)
                        $('#hardisk').val(`${iterator.hardisk}`)
                        $('#penggunan').val(`${iterator.penggunaan}`)
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
    @include('data-nvr-cctv.insert')
    @include('data-nvr-cctv.edit') 
    @include('data-nvr-cctv.cetak') 
@endsection
