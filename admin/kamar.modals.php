<div class="modal fade modal-animate" id="animateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="no">Nomor</label>
                        <input type="text" name="no" id="no" placeholder="Nomor" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="tipe">Tipe</label>
                        <select name="tipe" id="tipe" class="form-control" required>
                            <option value="" disabled selected>-Pilih Tipe-</option>
                            <option value="Single Bed">Single Bed</option>
                            <option value="Double Bed">Double Bed</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga Per Malam</label>
                        <input type="text" name="harga" id="harga" placeholder="Harga Per Malam" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="" disabled selected>- Pilih Status -</option>
                            <option value="Tersedia">Tersedia</option>
                            <option value="Sudah Dibooking">Sudah Dibooking</option>
                            <option value="Sedang Perbaikan">Sedang Perbaikan</option>
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary shadow-2">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>