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
                <form action="{{ route('data-nvr-cctv.store') }}" method="POST">
                    @csrf
                    {{-- <input type="hidden" name="sn" id="sn"> --}}
                    <div class="form-group">
                        <label for="sn">SN</label>
                        <input type="text" class="form-control" name="sn" aria-describedby="sn" required>
                    </div>
                    <div class="form-group">
                        <label for="merknvr">Merk NVR</label>
                        <input type="text" class="form-control" name="merknvr" aria-describedby="merknvr">
                    </div>
                    <div class="form-group">
                        <label for="videoch">Channel Video</label>
                        <input type="text" class="form-control" name="videoch" aria-describedby="videoch">
                    </div>

                    <div class="form-group">
                        <label for="hardisk">Hardisk</label>
                        <input type="text" class="form-control" name="hardisk" aria-describedby="hardisk">
                    </div>

                    <div class="form-group">
                        <label for="penggunaan">Penggunaan</label>
                        <input type="text" class="form-control" name="penggunaan" aria-describedby="penggunaan">
                    </div>

                    <div class="form-group">
                        <label for="tahun">Tahun</label>
                        <input type="text" class="form-control" name="tahun" aria-describedby="tahun">
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
