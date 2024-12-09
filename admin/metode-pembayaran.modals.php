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
                        <label for="name">Nama</label>
                        <input type="text" name="name" id="name" placeholder="Nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="no">Nomor Rekening</label>
                        <input type="text" name="no" id="no" placeholder="Nomor Rekening" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="owner">Atas Nama</label>
                        <input type="text" name="owner" id="owner" placeholder="Atas Nama" class="form-control" required>
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