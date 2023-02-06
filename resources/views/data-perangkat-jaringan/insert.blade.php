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
                <form action="{{ route('data-perangkat-jaringan.store') }}" method="POST">
                    @csrf
                    {{-- <input type="hidden" name="sn" id="sn"> --}}
                    <div class="form-group">
                        <label for="sn">SN</label>
                        <input type="text" class="form-control" name="sn" aria-describedby="sn" required>
                    </div>
                    <div class="form-group">
                        <label for="merkperangkat">Merk Perangkat</label>
                        <input type="text" class="form-control" name="merkperangkat" aria-describedby="merkperangkat">
                    </div>
                    <div class="form-group">
                        <label for="cpu">CPU</label>
                        <input type="text" class="form-control" name="cpu" aria-describedby="cpu">
                    </div>

                    <div class="form-group">
                        <label for="ram">RAM</label>
                        <input type="text" class="form-control" name="ram" aria-describedby="ram">
                    </div>

                    <div class="form-group">
                        <label for="lanport">LAN Port</label>
                        <input type="text" class="form-control" name="lanport" aria-describedby="lanport">
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
