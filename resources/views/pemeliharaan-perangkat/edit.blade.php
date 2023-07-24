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
                <form action="{{ route('pemeliharaan') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="post_id" id="post_id">
                    <div class="form-group form-row">
                        <div class="col-md-6">
                            <label for="nama">Nama Barang</label>
                            <input type="nama" class="form-control" name="nama" aria-describedby="nama" id="nama" required>
                        </div>
                        <div class="col-md-3">
                            <label for="unit">Unit</label>
                            <input type="text" class="form-control" name="unit" aria-describedby="unit" id="unit" required>
                        </div>
                        <div class="col-md-3">
                            <label for="satuan">Satuan</label>
                            <input type="text" class="form-control" name="satuan" aria-describedby="satuan" id="satuan" required>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group form-row">
                        <div class="col-md-6">
                            <label for="harga">Harga (Rp)</label>
                            <input type="text" class="form-control" name="harga" aria-describedby="harga" id="harga" required></div>
                        <div class="col-md-6">
                            <label for="total">Total Harga (Rp)</label>
                            <input type="text" class="form-control" name="total" aria-describedby="total" id="total" required></div>
                    </div>
                    <div class="form-group form-row">
                        <div class="col-md-6">
                            <label for="ekatalog">Harga E-Katalog/item (Rp)</label>
                            <input type="text" class="form-control" name="ekatalog" aria-describedby="ekatalog" id="ekatalog" required>
                        </div>
                        <div class="col-md-6">
                            <label for="nego">Harga Nego/item (Rp)</label>
                            <input type="text" class="form-control" name="nego" aria-describedby="nego" id="nego" required>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="link">Link Barang</label>
                        <input type="text" class="form-control" name="link" id="link" aria-describedby="link">
                    </div>
                    <div class="form-group">
                        <label for="gambar">Foto</label>
                        <input type="file" class="form-control" name="gambar" id="gambar" aria-describedby="gambar">
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
