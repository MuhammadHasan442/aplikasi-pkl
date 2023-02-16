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
                        <th scope="col">SN</th>
                        <th scope="col">IP Address</th>
                        <th scope="col">Merk Server</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">HDD</th>
                        <th scope="col">RAM</th>
                        <th scope="col">Processor</th>
                        <th scope="col">OS</th>
                        <th scope="col">Tahun</th>
                        <th scope="col">Penggunaan</th>
                        <th scope="col">AKSI</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($server as $key => $post)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $post->sn }}</td>
                            <td>{{ $post->ip }}</td>
                            <td>{{ $post->merk_server }}</td>
                            <td>{{ $post->jenis }}</td>
                            <td>{{ $post->hardisk }}</td>
                            <td>{{ $post->ram }}</td>
                            <td>{{ $post->processor }}</td>
                            <td>{{ $post->os }}</td>
                            <td>{{ $post->tahun }}</td>
                            <td>{{ $post->penggunaan }}</td>
                            <td class="text-center">
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('data-server.destroy', $post->id) }}" method="POST">
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
    @include('data-server.insert')
    @include('data-server.edit')
    @include('data-server.cetak')
@endsection