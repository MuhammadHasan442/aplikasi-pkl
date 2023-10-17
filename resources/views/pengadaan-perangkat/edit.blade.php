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
                 <form action="{{ route('pengadaan') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="post_id" id="post_id">
                    <div class="form-group">
                        <label for="uraian">Uraian</label>
                        <input type="text" class="form-control" name="uraian" aria-describedby="uraian" id="uraian" required>
                    </div>
                    <div class="form-group">
                        <label for="volume">Volume</label>
                        <input type="text" class="form-control" name="volume" aria-describedby="volume" id="volume_e">
                    </div>
                    <div class="form-group">
                        <label for="unit">Unit</label>
                        <input type="text" class="form-control" name="unit" aria-describedby="unit" id="unit">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga Satuan (Rp)</label>
                        <input type="text" class="form-control" name="harga" aria-describedby="harga" id="harga_e">
                    </div>

                    <div class="form-group">
                        <label for="jumlah">Jumlah (Rp)</label>
                        <input type="text" class="form-control" name="jumlah" aria-describedby="jumlah" id="jumlah_e">
                    </div>
                    <div class="form-group">
                        <label for="gambar">Foto</label>
                        <input type="file" class="form-control" name="gambar" aria-describedby="gambar">
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
