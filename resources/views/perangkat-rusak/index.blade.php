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
                        <th scope="col">Foto</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">SN</th>
                        <th scope="col">Merk</th>
                        <th scope="col">Tahun</th>
                        <th scope="col">Status</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">AKSI</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($publik as $key => $post)
                    <tr>
                            <td>{{ $key + 1 }}</td>
                            <td><img src="{{ $post->gambar == 'null' ? asset('/img/default.jpg') : asset('storage/'.$post->gambar) }}" class="img-thumbnail" style="width:200px" /></td>
                            <td>{{ $post->kategori }}</td>
                            <td>{{ $post->sn }}</td>
                            <td>{{ $post->merk }}</td>
                            <td>{{ $post->tahun }}</td>
                            <td>{{ $post->status }}</td>
                            <td>{{ $post->keterangan }}</td>
                            <td class="text-center">
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('perangkat-rusak.destroy', $post->id) }}" method="POST">
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
                url: "/getRusak/"+id,
                type: 'GET',
                dataType: 'json', // added data type
                success: function(res) {
                    for (const iterator of res) {
                        $('#post_id').val(`${iterator.id}`)
                        $('#tahun_e').val(`${iterator.tahun}`)
                        $('#merk_e').val(`${iterator.merk}`)
                        $('#kategori_e').val(`${iterator.kategori}`).prop('selected', true)
                        if ($('#kategori_e').is(":selected")) {

                            var kategori = $('#kategori_e').val();
                            var serial = iterator.sn;

                            $.ajax({
                                url: "/getKategori/" + kategori,
                                type: "GET",
                                success: function(data) {

                                    var y = ""

                                    y = '<option disabled>- Pilih Data -</option>'

                                    for (i in data) {
                                        if (data[i]['sn'] == serial) {
                                            y += '<option value="'+ data[i]['sn'] +'" data-merke="'+ data[i]['merk'] +'" data-tahune="'+ data[i]['tahun'] +'" selected>'+ data[i]['sn'] +'</option>'
                                        } else {
                                            y += '<option value="'+ data[i]['sn'] +'" data-merke="'+ data[i]['merk'] +'" data-tahune="'+ data[i]['tahun'] +'">'+ data[i]['sn'] +'</option>'
                                        }
                                    }

                                    $('#sn_e').html(y).prop('selected', true)

                                    $('#sn_e').change(function() {
                                        var merk = $(this).children(':selected').data('merke')
                                        var tahun = $(this).children(':selected').data('tahune')
                                        $('#merk_e').val(merk)
                                        $('#tahun_e').val(tahun)
                                    })
                                }
                            });

                        }

                        $("#kategori_e").on("change", function() {

                            var kategori = $('#kategori_e').val();

                            $.ajax({
                                url: "/getKategori/" + kategori,
                                type: "GET",
                                success: function(data) {

                                    var y = ""

                                    y = '<option disabled selected>- Pilih Data -</option>'

                                    for (i in data) {
                                        y += '<option value="'+ data[i]['sn'] +'" data-merke="'+ data[i]['merk'] +'" data-tahune="'+ data[i]['tahun'] +'" selected>'+ data[i]['sn'] +'</option>'
                                    }

                                    $('#sn_e').html(y)

                                    $('#sn_e').change(function() {
                                        var merk = $(this).children(':selected').data('merke')
                                        var tahun = $(this).children(':selected').data('tahune')
                                        $('#merk_e').val(merk)
                                        $('#tahun_e').val(tahun)
                                    })
                                }
                            });
                        });

                        $('#status_e').val(`${iterator.status}`)
                        $('#keterangan_e').val(`${iterator.keterangan}`)
                    }
                },
                onError: function (err) {
                    console.log(err)
                }
            });
        }

        $(function() {

            $("#kategori").on("change", function() {

                var kategori = $(this).val();

                $.ajax({
                    url: "/getKategori/" + kategori,
                    type: "GET",
                    success: function(data) {

                        var y = ""

                        y = '<option disabled selected>- Pilih Data -</option>'

                        for (i in data) {
                            y += '<option value="'+ data[i]['sn'] +'" data-merk="'+ data[i]['merk'] +'" data-tahun="'+ data[i]['tahun'] +'">'+ data[i]['sn'] +'</option>'
                        }

                        $('#sn').html(y)

                        $('#sn').change(function() {
                            var merk = $(this).children(':selected').data('merk')
                            var tahun = $(this).children(':selected').data('tahun')
                            $('#merk').val(merk)
                            $('#tahun').val(tahun)
                        })
                    }
                });
            });
        });
    </script>
    @endpush
    @include('perangkat-rusak.insert')
    @include('perangkat-rusak.edit')
    @include('perangkat-rusak.cetak')
@endsection
