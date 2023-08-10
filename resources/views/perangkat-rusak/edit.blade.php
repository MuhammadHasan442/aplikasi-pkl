<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 <form action="{{ route('rusak') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="post_id" id="post_id">
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select name="kategori" class="form-control" id="kategori_e">
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
                        <select name="sn" class="form-control sn" id="sn_e">
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="merk">Merk Perangkat</label>
                        <input type="text" class="form-control" name="merk" id="merk_e" aria-describedby="merk" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tahun">Tahun</label>
                        <input type="text" class="form-control" name="tahun" id="tahun_e" aria-describedby="tahun" readonly>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" class="form-control" name="status" id="status_e" aria-describedby="status">
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" id="keterangan_e" aria-describedby="keterangan">
                    </div>
                    <div class="form-group">
                        <label for="gambar">Foto</label>
                        <input type="file" class="form-control" name="gambar" id="gambar" aria-describedby="gambar">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="close" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
