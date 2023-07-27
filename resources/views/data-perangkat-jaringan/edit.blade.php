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
                 <form action="{{ route('perangkat') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="post_id" id="post_id">
                    <div class="form-group">
                        <label for="sn">SN</label>
                        <input type="text" class="form-control" name="sn" aria-describedby="sn" id="sn" required>
                    </div>
                    <div class="form-group">
                        <label for="merkperangkat">Merk Perangkat</label>
                        <input type="text" class="form-control" name="merkperangkat" aria-describedby="merkperangkat" id="merkperangkat" required>
                    </div>
                    <div class="form-group">
                        <label for="cpu">CPU</label>
                        <input type="text" class="form-control" name="cpu" aria-describedby="cpu" id="cpu" required>
                    </div>

                    <div class="form-group">
                        <label for="ram">RAM</label>
                        <input type="text" class="form-control" name="ram" aria-describedby="ram" id="ram" required>
                    </div>

                    <div class="form-group">
                        <label for="lanport">LAN Port</label>
                        <input type="text" class="form-control" name="lanport" aria-describedby="lanport" id="lanport" required>
                    </div>

                    <div class="form-group">
                        <label for="tahun">Tahun</label>
                        <input type="text" class="form-control" name="tahun" aria-describedby="tahun" id="tahun" required>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Foto</label>
                        <input type="file" class="form-control" name="gambar" aria-describedby="gambar" id="gambar">
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
