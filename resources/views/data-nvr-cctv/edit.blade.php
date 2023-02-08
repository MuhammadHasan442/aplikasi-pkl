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
                 <form action="{{ route('nvr') }}" method="POST">
                    @csrf
                    <input type="hidden" name="post_id" id="post_id">
                    <div class="form-group">
                        <label for="sn">SN</label>
                        <input type="text" class="form-control" name="sn" aria-describedby="sn" id="sn" required>
                    </div>
                    <div class="form-group">
                        <label for="merknvr">Merk NVR</label>
                        <input type="text" class="form-control" name="merknvr" aria-describedby="merknvr" id="merknvr" required>
                    </div>
                    <div class="form-group">
                        <label for="videoch">Video Channel</label>
                        <input type="text" class="form-control" name="videoch" aria-describedby="videoch" id="videoch" required>
                    </div>

                    <div class="form-group">
                        <label for="hardisk">Hardisk</label>
                        <input type="text" class="form-control" name="hardisk" aria-describedby="hardisk" id="hardisk" required>
                    </div>

                    <div class="form-group">
                        <label for="penggunaan">Penggunaan</label>
                        <input type="text" class="form-control" name="penggunaan" aria-describedby="penggunaan" id="penggunaan" required>
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
