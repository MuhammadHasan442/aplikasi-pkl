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
                <form action="{{ route('data-server.store') }}" method="POST">
                    @csrf
                    {{-- <input type="hidden" name="sn" id="sn"> --}}
                    <div class="form-group">
                        <label for="sn">SN</label>
                        <input type="text" class="form-control" name="sn" aria-describedby="sn" id="sn" required>
                    </div>
                    <div class="form-group">
                        <label for="ip">IP Address</label>
                        <input type="text" class="form-control" name="ip" aria-describedby="ip" id="ip" required>
                    </div>
                    <div class="form-group">
                        <label for="merkserver">Merk Server</label>
                        <input type="text" class="form-control" name="merkserver" aria-describedby="merkServer" required>
                    </div>
                    <div class="form-group">
                        <label for="jenis">Jenis Server</label>
                        <input type="text" class="form-control" name="jenis" aria-describedby="jenisServer" required>
                    </div>

                    <div class="form-group">
                        <label for="processor">Processor</label>
                        <input type="text" class="form-control" name="processor" aria-describedby="processorServer" required>
                    </div>

                    <div class="form-group">
                        <label for="ram">RAM</label>
                        <input type="text" class="form-control" name="ram" aria-describedby="ramServer" required>
                    </div>

                    <div class="form-group">
                        <label for="hardisk">Hardisk</label>
                        <input type="text" class="form-control" name="hardisk" aria-describedby="hardiskServer" required>
                    </div>

                    <div class="form-group">
                        <label for="os">OS</label>
                        <input type="text" class="form-control" name="os" aria-describedby="osServer" required>
                    </div>

                    <div class="form-group">
                        <label for="tahun">Tahun</label>
                        <input type="text" class="form-control" name="tahun" aria-describedby="tahunServer" required>
                    </div>

                    <div class="form-group">
                        <label for="penggunaan">Penggunaan</label>
                        <input type="text" class="form-control" name="penggunaan" aria-describedby="penggunaanServer">
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
