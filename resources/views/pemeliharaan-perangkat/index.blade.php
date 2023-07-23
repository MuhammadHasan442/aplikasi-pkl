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
            @include('partial.notif')
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Satuan</th>
                        <th scope="col">Harga (Rp)</th>
                        <th scope="col">Total Harga</th>
                        <th scope="col">Harga Ekatalog/item (Rp)</th>
                        <th scope="col">Harga Nego/item (Rp)</th>
                        <th scope="col">Link</th>
                        <th scope="col">AKSI</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($pelihara as $key => $post)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $post->sn }}</td>
                            <td>{{ $post->ip }}</td>
                            <td>{{ $post->merk_server }}</td>
                            <td><img src="{{ $post->gambar == 'null' ? asset('/img/default.jpg') : asset('storage/'.$post->gambar) }}" class="img-thumbnail" style="width:200px" /></td>
                            <td>{{ $post->jenis }}</td>
                            <td>{{ $post->hardisk }}</td>
                            <td>{{ $post->ram }}</td>
                            <td>{{ $post->processor }}</td>
                            <td>{{ $post->os }}</td>
                            <td>{{ $post->tahun }}</td>
                            <td>{{ $post->penggunaan }}</td>
                            <td class="text-center">
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('pemeliharaan-perangkat.destroy', $post->id) }}" method="POST">
                                    <input type="hidden" value="{{$post->id}}" name="id">
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
            url: "/getServer/"+id,
            type: 'GET',
            dataType: 'json', // added data type
            success: function(res) {
                for (const iterator of res) {
                    $('#post_id').val(`${iterator.id}`)
                    $('#snok').val(`${iterator.sn}`)
                    $('#ipok').val(`${iterator.ip}`)
                    $('#merkserver').val(`${iterator.merk_server}`)
                    $('#jenis').val(`${iterator.jenis}`)
                    $('#processor').val(`${iterator.processor}`)
                    $('#ram').val(`${iterator.ram}`)
                    $('#hardisk').val(`${iterator.hardisk}`)
                    $('#os').val(`${iterator.os}`)
                    $('#tahun').val(`${iterator.tahun}`)
                    $('#penggunaan').val(`${iterator.penggunaan}`)
                }
            }
        });

        }
    </script>
    @endpush
    @include('pemeliharaan-perangkat.insert')
    @include('pemeliharaan-perangkat.edit')
    @include('pemeliharaan-perangkat.cetak')
@endsection