@extends('master')
@section('konten')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $title }}</h6>
        </div>
        <div class="card-body">
            @if (Auth::user()->level == 'admin')
                <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#tambahModal">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Data</span>
                </a>
            @endif
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
                        <th scope="col">Foto</th>
                        <th scope="col">Uraian</th>
                        <th scope="col">Volume</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Harga Satuan (Rp)</th>
                        <th scope="col">Jumlah (Rp)</th>
                        @if (Auth::user()->level == 'admin')
                            <th scope="col">AKSI</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($publik as $key => $post)
                    <tr>
                            <td>{{ $key + 1 }}</td>
                            <td><img src="{{ $post->gambar == 'null' ? asset('/img/default.jpg') : asset('storage/'.$post->gambar) }}" class="img-thumbnail" style="width:200px" /></td>
                            <td>{{ $post->uraian }}</td>
                            <td>{{ $post->volume }}</td>
                            <td>{{ $post->unit }}</td>
                            <td>@duit($post->harga)</td>
                            <td>@duit($post->jumlah)</td>
                            @if (Auth::user()->level == 'admin')
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('pengadaan-perangkat.destroy', $post->id) }}" method="POST">
                                        <input type="hidden" value="{{$post->id}}" name="id" id="id">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" href="#" class="btn btn-warning" data-toggle="modal" data-target="#editModal" onclick="get_data('{{$post->id}}')"><i class="fas fa-edit"></i></button>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </form>
                                </td>
                            @endif
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
                url: "/getPengadaan/"+id,
                type: 'GET',
                dataType: 'json', // added data type
                success: function(res) {
                    for (const iterator of res) {
                        $('#post_id').val(`${iterator.id}`)
                        $('#uraian').val(`${iterator.uraian}`)
                        $('#volume_e').val(`${iterator.volume}`)
                        $('#unit').val(`${iterator.unit}`)
                        $('#harga_e').val(`${iterator.harga}`)
                        $('#jumlah_e').val(`${iterator.jumlah}`)
                    }
                },
                onError: function (err) {
                    console.log(err)
                }
            });

        }

        $(function() {
            const $a = $("#volume, #harga")

            $a.on("keyup", function() {

                var harga = parseInt($("#harga").val());
                var vol = parseInt($("#volume").val());
                var total = harga * vol;

                $("#jumlah").val(total)

            });

        });

        $(function() {
            const $b = $("#volume_e, #harga_e")

            $b.on("keyup", function() {

                var harga = parseInt($("#harga_e").val());
                var vol = parseInt($("#volume_e").val());
                var total = harga * vol;

                $("#jumlah_e").val(total)

            });

        });

    </script>
    @endpush
    @include('pengadaan-perangkat.insert')
    @include('pengadaan-perangkat.edit')
    @include('pengadaan-perangkat.cetak')
@endsection
