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
                    <i class="fa fa-eye"></i>
                </span>
                <span class="text">Preview Cetak</span>
            </a>
            <div class="table-responsive">
                <br>
                @include('partial.notif')
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">SN</th>
                        <th scope="col">IP</th>
                        <th scope="col">Merk AP</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Tipe</th>
                        <th scope="col">Nama AP</th>
                        <th scope="col">Letak</th>
                        <th scope="col">Tahun</th>
                        <th scope="col">AKSI</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($ap as $key => $post)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $post->sn }}</td>
                            <td>{{ $post->ip }}</td>
                            <td>{{ $post->merk }}</td>
                            <td><img src="{{ asset('storage/'.$post->gambar) }}" class="img-thumbnail" style="width:200px" /></td>
                            <td>{{ $post->tipe }}</td>
                            <td>{{ $post->nama_ap }}</td>
                            <td>{{ $post->letak }}</td>
                            <td>{{ $post->tahun }}</td>
                            <td class="text-center">
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('data-access-point.destroy', $post->id) }}" method="POST">
                                    <input type="hidden" value="{{$post->id}}" name="id" id="id">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" href="#" class="btn btn-warning" data-toggle="modal" data-target="#editModal" onclick="get_data('{{$post->id}}')"><i class="fas fa-edit"></i></button>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </div>
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
        function get_data(id) {
            // JavaScript untuk ambil data buat Edit Data
            $.ajax({
                url: "/getAccessPoint/"+id,
                type: 'GET',
                dataType: 'json', // added data type
                success: function(res) {
                    for (const iterator of res) {
                        $('#post_id').val(`${iterator.id}`)
                        $('#sn').val(`${iterator.sn}`)
                        $('#ip').val(`${iterator.ip}`)
                        $('#merkap').val(`${iterator.merk}`)
                        $('#tipe').val(`${iterator.tipe}`)
                        $('#namaap').val(`${iterator.nama_ap}`)
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
    @include('data-access-point.insert')
    @include('data-access-point.edit')
    @include('data-access-point.cetak')
@endsection

