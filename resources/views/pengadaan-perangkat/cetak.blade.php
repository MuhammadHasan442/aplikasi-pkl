<!-- Modal -->
<div class="modal fade" id="cetakModal" tabindex="-1" role="dialog" aria-labelledby="cetakModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cetakModalLabel">Preview Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 <form action="{{ route('pdfPengadaan') }}" method="POST" target="_blank">
                    @csrf
                    <!-- <input type="hidden" name="sn" id="sn"> -->
                    <div class="form-group form-row">
                        <div class="col-md-6">
                            {{-- <input id="aktif1" type="checkbox"> --}}
                            <label for="minharga">Harga Min. (Rp)</label>
                            <input type="text" class="form-control" name="minharga" aria-describedby="minharga" value=0 ></div>
                        <div class="col-md-6">
                            {{-- <input id="aktif2" type="checkbox"> --}}
                            <label for="maxharga">Harga Max. (Rp)</label>
                            <input type="text" class="form-control" name="maxharga" aria-describedby="maxharga" value=0 ></div>
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
