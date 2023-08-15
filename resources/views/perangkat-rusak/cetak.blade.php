<!-- Modal -->
<div class="modal fade" id="cetakModal" tabindex="-1" role="dialog" aria-labelledby="cetakModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cetakModalLabel">Pilih Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 <form action="{{ route('prevRusak') }}" method="POST" target="_blank">
                    @csrf
                    <!-- <input type="hidden" name="sn" id="sn"> -->
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-control" id="status">
                            <option disabled selected>- Pilih Data -</option>
                            <option value="semua">Semua Data</option>
                            <option value="Hidup">Hidup</option>
                            <option value="Mati Total">Mati Total</option>
                            <option value="Rusak">Rusak</option>
                            <option value="Tanpa Status">Tanpa Status</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="close" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-success">Cetak</button>
            </div>
            </form>
        </div>
    </div>
</div>
