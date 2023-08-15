<!-- Modal -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- <input type="hidden" name="sn" id="sn"> --}}
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select name="kategori" class="form-control" id="kategori">
                            <option disabled selected>- Pilih Data -</option>
                            <option value="Server">Server</option>
                            <option value="Perangkat Jaringan">Perangkat Jaringan</option>
                            <option value="Access Point">Access Point</option>
                            <option value="NVR CCTV">NVR CCTV</option>
                            <option value="CCTV Pemko">CCTV Pemko</option>
                            <option value="CCTV Publik">CCTV Publik</option>
                            <option value="Wifi Publik">Wifi Publik</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="sn" class="form-control" id="sn">
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="merk">Merk Perangkat</label>
                        <input type="text" class="form-control" name="merk" id="merk" aria-describedby="merk" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tahun">Tahun</label>
                        <input type="text" class="form-control" name="tahun" id="tahun" aria-describedby="tahun" readonly>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-control" id="status">
                            <option disabled selected>- Pilih Data -</option>
                            <option value="Hidup">Hidup</option>
                            <option value="Mati Total">Mati Total</option>
                            <option value="Rusak">Rusak</option>
                            <option value="Tanpa Status">Tanpa Status</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" id="keterangan" aria-describedby="keterangan">
                    </div>
                    <div class="form-group">
                        <label for="gambar">Foto</label>
                        <input type="file" class="form-control" name="gambar" id="gambar" aria-describedby="gambar">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="close" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>