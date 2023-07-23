<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('Ubah') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="post_id" id="post_id">
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="sn">SN</label>
                            <input type="text" class="form-control" name="snok" aria-describedby="sn" id="snok" required>
                        </div>
                        <div class="col-md-6">
                            <label for="ip">IP Address</label>
                            <input type="text" class="form-control" name="ip" aria-describedby="ip" id="ipok" required>
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="merkserver">Merk Server</label>
                            <input type="text" class="form-control" name="merkserver" id="merkserver" aria-describedby="merkServer" required></div>
                        <div class="col-md-6">
                            <label for="jenis">Jenis Server</label>
                            <input type="text" class="form-control" name="jenis" id="jenis" aria-describedby="jenisServer" required></div>
                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="col-md-3">
                            <label for="processor">Processor</label>
                            <input type="text" class="form-control" name="processor" id="processor" aria-describedby="processorServer" required>
                        </div>
                        <div class="col-md-3">
                            <label for="ram">RAM</label>
                            <input type="text" class="form-control" name="ram" id="ram" aria-describedby="ramServer" required>
                        </div>
                        <div class="col-md-3">
                            <label for="hardisk">Harddisk</label>
                            <input type="text" class="form-control" name="hardisk" id="hardisk" aria-describedby="hardiskServer" required>
                        </div>
                        <div class="col-md-3">
                            <label for="os">OS</label>
                            <input type="text" class="form-control" name="os" id="os" aria-describedby="osServer" required>
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col-md-4">
                            <label for="tahun">Tahun</label>
                            <input type="text" class="form-control" name="tahun" id="tahun" aria-describedby="tahunServer" required>
                        </div>
                        <div class="col-md-8">
                            <label for="penggunaan">Penggunaan</label>
                            <input type="text" class="form-control" name="penggunaan" id="penggunaan" aria-describedby="penggunaanServer">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Foto</label>
                        <input type="file" class="form-control" name="gambar" aria-describedby="gambar" id="gambar">
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
