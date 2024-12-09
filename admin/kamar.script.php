<script>
    document.addEventListener("DOMContentLoaded", function(event) {

        var table = $('#tables').DataTable();

        var animateModal = document.getElementById('animateModal');
        animateModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var recipient = button.getAttribute('data-pc-animate');
            var status = button.getAttribute('data-status-modal');
            var modalTitle = animateModal.querySelector('.modal-title');
            modalTitle.textContent = status + " Data";
            animateModal.classList.add('anim-' + recipient);

            if (recipient == 'let-me-in' || recipient == 'make-way' || recipient == 'slip-from-top') {
                document.body.classList.add('anim-' + recipient);
            }

            var form = animateModal.querySelector('form');
            var newAction = button.getAttribute('data-action-url');
            if (newAction) {
                form.action = newAction;
                if (status == 'Edit') {
                    var dataId = button.getAttribute('data-id');
                    var dataNo = button.getAttribute('data-no');
                    var dataTipe = button.getAttribute('data-tipe');
                    var dataHarga = button.getAttribute('data-harga');
                    var dataStatus = button.getAttribute('data-status');
                    $('#id').val(dataId);
                    $('#no').val(dataNo);
                    $('#tipe').val(dataTipe);
                    $('#harga').val(dataHarga);
                    $('#status').val(dataStatus);
                }
            }
        });
        animateModal.addEventListener('hidden.bs.modal', function(event) {
            removeClassByPrefix(animateModal, 'anim-');
            removeClassByPrefix(document.body, 'anim-');
            var form = animateModal.querySelector('form');
            form.action = '#';
            $('#id').val('');
            $('#no').val('');
            $('#tipe').val('');
            $('#harga').val('');
            $('#status').val('');
        });

        function removeClassByPrefix(node, prefix) {
            for (let i = 0; i < node.classList.length; i++) {
                let value = node.classList[i];
                if (value.startsWith(prefix)) {
                    node.classList.remove(value);
                }
            }
        }
    });

    function hapusData(id) {
        // Menampilkan konfirmasi kepada pengguna
        if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
            // Buat elemen form secara dinamis
            const form = document.createElement("form");
            form.method = "POST"; // Ubah metode menjadi POST
            form.action = "aksi/kamar.php?action=delete&id=" + id; // Targetkan ke URL tujuan
            form.style.display = "none"; // Buat form tidak terlihat

            // Tambahkan form ke body dan submit
            document.body.appendChild(form);
            form.submit();
        }
    }
</script>