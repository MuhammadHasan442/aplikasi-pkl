<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        @page { margin: 180px 50px; }
        #header { position: fixed; left: 130px; top: -150px; right: 0px; height: 180px; text-align: center; }
        #footer { position: fixed; left: 0px; bottom: -150px; right: 0px; height: 180px;}
        #footer .page:after { content: counter(page, upper-roman); }
    </style>
    <title>Laporan</title>
</head>
<body>
    <div id="header">
        <table>
            <tr>
                <td>
                    <img src="{{ asset('img/LOGO_KOTA_BANJARMASIN_PNG.png') }}" style="width: 100px; height: auto;">
                </td>
                <td>&nbsp;</td>
                <td>
                    <h4 class="text text-center">PEMERINTAH KOTA BANJARMASIN <br> DINAS KOMUNIKASI, INFORMATIKA DAN STATISTIK</h4>
                    <p class="text text-center" style="font-size: 15px">Jalan R. E. Martadinata No.1 Kode Pos 70111 Gedung Blok B Lt. Dasar - Banjarmasin <br> Email : diskominfotik@mail.banjarmasinkota.go.id Website : diskominfotik.banjarmasinkota.go.id </p>
                </td>
            </tr>
        </table>
    </div>
    <hr align="right" style="height:5px;border:none;color:#333;background-color:#333;">
    <h5 class="text text-center">LAPORAN DATA SERVER</h5>
    <div id="content">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>No</th>
                <th>SN</th>
                <th>IP Address</th>
                <th>Merk Server</th>
                <th>Jenis</th>
                <th>Hardisk</th>
                <th>RAM</th>
                <th>Processor</th>
                <th>OS</th>
                <th>Tahun</th>
                <th>Penggunaan</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($data as $key => $post)
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
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text text-center">
                            Data Tidak Tersedia
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>