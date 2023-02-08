<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Laporan</title>
</head>
<body>
<center>
    <table>
        <tr>
            <td>
                <img src="{{ asset('img/LOGO_KOTA_BANJARMASIN_PNG.png') }}" style="width: 100px; height: auto;">
            </td>
            <td>&nbsp;</td>
            <td>
            <center>
                    <h5 class="text text-center">PEMERINTAH KOTA BANJARMASIN</h5>
                    <h5 class="text text-center">DINAS KOMUNIKASI, INFORMATIKA DAN STATISTIK</h5>
                    <p class="text text-center" style="font-size: 12px">Jalan R. E. Martadinata No.1 Kode Pos 70111 Gedung Blok B Lt. Dasar - Banjarmasin </p>
                    <p class="text text-center" style="font-size: 12px">Email : diskominfotik@mail.banjarmasinkota.go.id Website : diskominfotik.banjarmasinkota.go.id</p>
                </center>
            </td>
        </tr>
    </table>
</center>
    <hr align="right" style="height:5px;border:none;color:#333;background-color:#333;">
    <h5 class="text text-center">LAPORAN DATA ACCESS POINT</h5>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>No</th>
            <th>SN</th>
            <th>Merk AP</th>
            <th>Tipe</th>
            <th>Nama AP</th>
            <th>Letak</th>
            <th>Tahun</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($data as $key => $post)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $post->sn }}</td>
                    <td>{{ $post->ip }}</td>
                    <td>{{ $post->merk_ap }}</td>
                    <td>{{ $post->tipe }}</td>
                    <td>{{ $post->nama_ap }}</td>
                    <td>{{ $post->letak }}</td>
                    <td>{{ $post->tahun }}</td>
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
</body>
</html>