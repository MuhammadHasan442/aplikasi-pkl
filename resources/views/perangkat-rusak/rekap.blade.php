<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Laporan Perangkat Rusak</title>
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
                        <p class="text text-center" style="font-size: 13px">Jalan R. E. Martadinata No.1 Kode Pos 70111 Gedung Blok B Lt. Dasar - Banjarmasin
                        <br> Email : diskominfotik@mail.banjarmasinkota.go.id Website : diskominfotik.banjarmasinkota.go.id </p>
                    </center>
                </td>
            </tr>
        </table>
    </center>
    <hr align="right" style="height:5px;border:none;color:#333;background-color:#333;">
    <h5 class="text text-center">REKAPITULASI PERANGKAT RUSAK</h5><br>

    <div id="content">
        <p><b>Data Server</b></p>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>No</th>
                <th>SN</th>
                <th>IP</th>
                <th>Merk</th>
                <th>Tahun</th>
                <th>Jenis</th>
                <th>Status Kerusakan</th>
                <th>Keterangan</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($server as $key => $post)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $post->sn }}</td>
                        <td>{{ $post->ip }}</td>
                        <td>{{ $post->merk }}</td>
                        <td>{{ $post->tahun }}</td>
                        <td>{{ $post->jenis }}</td>
                        <td>{{ $post->status }}</td>
                        <td>{{ $post->keterangan }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text text-center">
                            <b>Data Tidak Tersedia</b>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <br><br>

        <p><b>Data Access Point</b></p>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>No</th>
                <th>SN</th>
                <th>IP</th>
                <th>Merk</th>
                <th>Tahun</th>
                <th>Jenis</th>
                <th>Status Kerusakan</th>
                <th>Keterangan</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($accesspoint as $key => $post)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $post->sn }}</td>
                        <td>{{ $post->ip }}</td>
                        <td>{{ $post->merk }}</td>
                        <td>{{ $post->tahun }}</td>
                        <td>{{ $post->tipe }}</td>
                        <td>{{ $post->status }}</td>
                        <td>{{ $post->keterangan }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text text-center">
                            <b>Data Tidak Tersedia</b>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <br><br>

        <p><b>Data CCTV Pemko</b></p>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>No</th>
                <th>SN</th>
                <th>IP</th>
                <th>Merk</th>
                <th>Tahun</th>
                <th>Jenis</th>
                <th>Status Kerusakan</th>
                <th>Keterangan</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($cctvpemko as $key => $post)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $post->sn }}</td>
                        <td>{{ $post->ip }}</td>
                        <td>{{ $post->merk }}</td>
                        <td>{{ $post->tahun }}</td>
                        <td>{{ $post->tipe }}</td>
                        <td>{{ $post->status }}</td>
                        <td>{{ $post->keterangan }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text text-center">
                            <b>Data Tidak Tersedia</b>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <br><br>

        <p><b>Data CCTV Publik</b></p>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>No</th>
                <th>SN</th>
                <th>IP</th>
                <th>Merk</th>
                <th>Tahun</th>
                <th>Jenis</th>
                <th>Status Kerusakan</th>
                <th>Keterangan</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($cctvpublik as $key => $post)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $post->sn }}</td>
                        <td>{{ $post->ip }}</td>
                        <td>{{ $post->merk }}</td>
                        <td>{{ $post->tahun }}</td>
                        <td>{{ $post->tipe }}</td>
                        <td>{{ $post->status }}</td>
                        <td>{{ $post->keterangan }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text text-center">
                            <b>Data Tidak Tersedia</b>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <br><br>

        <p><b>Data NVR CCTV</b></p>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>No</th>
                <th>SN</th>
                <th>Merk</th>
                <th>Tahun</th>
                <th>Status Kerusakan</th>
                <th>Keterangan</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($nvr as $key => $post)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $post->sn }}</td>
                        <td>{{ $post->merk }}</td>
                        <td>{{ $post->tahun }}</td>
                        <td>{{ $post->status }}</td>
                        <td>{{ $post->keterangan }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text text-center">
                            <b>Data Tidak Tersedia</b>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <br><br>

        <p><b>Data Wifi Publik</b></p>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>No</th>
                <th>SN</th>
                <th>Merk</th>
                <th>Tahun</th>
                <th>Letak</th>
                <th>Status Kerusakan</th>
                <th>Keterangan</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($wifipublik as $key => $post)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $post->sn }}</td>
                        <td>{{ $post->merk }}</td>
                        <td>{{ $post->tahun }}</td>
                        <td>{{ $post->letak }}</td>
                        <td>{{ $post->status }}</td>
                        <td>{{ $post->keterangan }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text text-center">
                            <b>Data Tidak Tersedia</b>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <br><br>

        <p><b>Data Perangkat Jaringan</b></p>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>No</th>
                <th>SN</th>
                <th>Merk</th>
                <th>Tahun</th>
                <th>Status Kerusakan</th>
                <th>Keterangan</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($perangkatjar as $key => $post)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $post->sn }}</td>
                        <td>{{ $post->merk }}</td>
                        <td>{{ $post->tahun }}</td>
                        <td>{{ $post->status }}</td>
                        <td>{{ $post->keterangan }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text text-center">
                            <b>Data Tidak Tersedia</b>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>


        <table width="100%">
            <tbody>
                <tr>
                    <td width="65%"></td>
                    <td width="35%" align="center" style="border: none;">Banjarmasin, <?= date('d-m-Y'); ?> <br>MENGETAHUI,<br><br><br><br><br></td>
                </tr>
                <tr>
                    <td width="65%"></td>
                    <td width="35%" align="center" style="border: none;"><b><u>H.A. AGUNG SAPTOTO, M.Kom</u></b><br>NIP. 19750831 201001 1 005</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>