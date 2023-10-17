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
                        <th scope="col">Gambar</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Satuan</th>
                        <th scope="col">Harga (Rp)</th>
                        <th scope="col">Total Harga (Rp)</th>
                        <th scope="col">Harga Ekatalog/item (Rp)</th>
                        <th scope="col">Harga Nego/item (Rp)</th>
                        <th scope="col">Link</th>
                        @if (Auth::user()->level == 'admin')
                            <th scope="col">AKSI</th>
                        @endif
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($pelihara as $key => $post)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td><img src="{{ $post->gambar == 'null' ? asset('/img/default.jpg') : asset('storage/'.$post->gambar) }}" class="img-thumbnail" style="width:200px" /></td>
                            <td>{{ $post->nama_barang }}</td>
                            <td>{{ $post->unit }}</td>
                            <td>{{ $post->satuan }}</td>
                            <td>@duit($post->harga)</td>
                            <td>@duit($post->total_harga)</td>
                            <td>@duit($post->ekatalog)</td>
                            <td>@duit($post->nego)</td>
                            <td>{{ $post->link }}</td>
                            @if (Auth::user()->level == 'admin')
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
            url: "/getPemeliharaan/"+id,
            type: 'GET',
            dataType: 'json', // added data type
            success: function(res) {
                for (const iterator of res) {
                    $('#post_id').val(`${iterator.id}`)
                    $('#nama').val(`${iterator.nama_barang}`)
                    $('#unit').val(`${iterator.unit}`)
                    $('#satuan').val(`${iterator.satuan}`)
                    $('#harga').val(`${iterator.harga}`)
                    $('#total').val(`${iterator.total_harga}`)
                    $('#ekatalog').val(`${iterator.ekatalog}`)
                    $('#nego').val(`${iterator.nego}`)
                    $('#link').val(`${iterator.link}`)
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