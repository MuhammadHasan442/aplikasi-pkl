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
                        <label for="uraian">Uraian</label>
                        <input type="text" class="form-control" name="uraian" aria-describedby="uraian" required>
                    </div>
                    <div class="form-group">
                        <label for="volume">Volume</label>
                        <input type="text" class="form-control" name="volume" aria-describedby="volume" id="volume" value="0">
                    </div>
                    <div class="form-group">
                        <label for="unit">Unit</label>
                        <input type="text" class="form-control" name="unit" aria-describedby="unit">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga Satuan (Rp)</label>
                        <input type="text" class="form-control" name="harga" aria-describedby="harga" id="harga" value="0">
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah (Rp)</label>
                        <input type="text" class="form-control" name="jumlah" aria-describedby="jumlah" id="jumlah" readonly>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Foto</label>
                        <input type="file" class="form-control" name="gambar" aria-describedby="gambar">
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