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
                <form action="{{ route('Ubah') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="sn">SN</label>
                        <input type="text" class="form-control" name="sn" aria-describedby="sn" id="snok" required>
                    </div>
                    <div class="form-group">
                        <label for="merkserver">Merk Server</label>
                        <input type="text" class="form-control" name="merkserver" aria-describedby="merkServer" id="merkserver" required>
                    </div>
                    <div class="form-group">
                        <label for="jenis">Jenis Server</label>
                        <input type="text" class="form-control" name="jenis" aria-describedby="jenisServer" id="jenis" required>
                    </div>

                    <div class="form-group">
                        <label for="processor">Processor</label>
                        <input type="text" class="form-control" name="processor" aria-describedby="processorServer" id="processor" required>
                    </div>

                    <div class="form-group">
                        <label for="ram">RAM</label>
                        <input type="text" class="form-control" name="ram" aria-describedby="ramServer" id="ram" required>
                    </div>

                    <div class="form-group">
                        <label for="hardisk">Hardisk</label>
                        <input type="text" class="form-control" name="hardisk" aria-describedby="hardiskServer" id="hardisk" required>
                    </div>

                    <div class="form-group">
                        <label for="os">OS</label>
                        <input type="text" class="form-control" name="os" aria-describedby="osServer" id="os" required>
                    </div>

                    <div class="form-group">
                        <label for="tahun">Tahun</label>
                        <input type="text" class="form-control" name="tahun" aria-describedby="tahunServer" id="tahun" required>
                    </div>

                    <div class="form-group">
                        <label for="penggunaan">Penggunaan</label>
                        <input type="text" class="form-control" name="penggunaan" aria-describedby="penggunaanServer" id="penggunaan">
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
