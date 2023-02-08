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
                 <form action="{{ route('pemko') }}" method="POST">
                    @csrf
                    <input type="hidden" name="post_id" id="post_id">
                    <div class="form-group">
                        <label for="sn">SN</label>
                        <input type="text" class="form-control" name="sn" aria-describedby="sn" id="sn" required>
                    </div>
                    <div class="form-group">
                        <label for="ip">IP Address</label>
                        <input type="text" class="form-control" name="ip" aria-describedby="ip" id="ip" required>
                    </div>
                    <div class="form-group">
                        <label for="merkcctv">Merk CCTV</label>
                        <input type="text" class="form-control" name="merkcctv" aria-describedby="merkcctv" id="merkcctv" required>
                    </div>
                    <div class="form-group">
                        <label for="tipe">Tipe</label>
                        <input type="text" class="form-control" name="tipe" aria-describedby="tipe" id="tipe" required>
                    </div>

                    <div class="form-group">
                        <label for="letak">Letak</label>
                        <input type="text" class="form-control" name="letak" aria-describedby="letak" id="letak" required>
                    </div>

                    <div class="form-group">
                        <label for="tahun">Tahun</label>
                        <input type="text" class="form-control" name="tahun" aria-describedby="tahun" id="tahun" required>
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
