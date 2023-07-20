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
                <form action="{{ route('data-access-point.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- <input type="hidden" name="sn" id="sn"> --}}
                    <div class="form-group">
                        <label for="sn">SN</label>
                        <input type="text" class="form-control" name="sn" aria-describedby="sn" required>
                    </div>
                    <div class="form-group">
                        <label for="ip">IP Address</label>
                        <input type="text" class="form-control" name="ip" aria-describedby="ip" required>
                    </div>
                    <div class="form-group">
                        <label for="merkap">Merk AP</label>
                        <input type="text" class="form-control" name="merkap" aria-describedby="merkap">
                    </div>
                    <div class="form-group">
                        <label for="gambar">Foto</label>
                        <input type="file" class="form-control" name="gambar" aria-describedby="gambar">
                    </div>
                    <div class="form-group">
                        <label for="tipe">Tipe</label>
                        <input type="text" class="form-control" name="tipe" aria-describedby="tipe">
                    </div>

                    <div class="form-group">
                        <label for="namaap">Nama AP</label>
                        <input type="text" class="form-control" name="namaap" aria-describedby="namaap">
                    </div>

                    <div class="form-group">
                        <label for="letak">Letak</label>
                        <input type="text" class="form-control" name="letak" aria-describedby="letak">
                    </div>

                    <div class="form-group">
                        <label for="tahun">Tahun</label>
                        <input type="text" class="form-control" name="tahun" aria-describedby="tahun">
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
