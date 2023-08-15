<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Laporan Pemeliharaan Barang</title>
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
    <h5 class="text text-center">LAPORAN PEMELIHARAAN BARANG</h5>
    <div id="content">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Unit</th>
                <th>Satuan</th>
                <th>Harga (Rp)</th>
                <th>Total Harga</th>
                <th>Harga Ekatalog/item (Rp)</th>
                <th>Harga Nego/item (Rp)</th>
                <th>Foto</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($data as $key => $post)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $post->nama_barang }}</td>
                        <td>{{ $post->unit }}</td>
                        <td>{{ $post->satuan }}</td>
                        <td>{{ $post->harga }}</td>
                        <td>{{ $post->total_harga }}</td>
                        <td>{{ $post->ekatalog }}</td>
                        <td>{{ $post->nego }}</td>
                        <td><img src="{{ $post->gambar == 'null' ? asset('/img/default.jpg') : asset('storage/'.$post->gambar) }}" class="img-thumbnail" style="width:200px" /></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text text-center">
                            <b>Data Tidak Tersedia</b>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <table width="100%">
            <tbody>
                <tr>
                    <td width="70%"></td>
                    <td width="30%" align="center" style="border: none;">Banjarmasin, <?= date('d-m-Y'); ?> <br>MENGETAHUI,<br><br><br><br><br></td>
                </tr>
                <tr>
                    <td width="70%"></td>
                    <td width="30%" align="center" style="border: none;"><b><u>H.A. AGUNG SAPTOTO, M.Kom</u></b><br>NIP. 19750831 201001 1 005</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>