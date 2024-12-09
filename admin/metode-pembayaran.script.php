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
                    var dataName = button.getAttribute('data-name');
                    var dataOwner = button.getAttribute('data-owner');
                    $('#id').val(dataId);
                    $('#no').val(dataNo);
                    $('#name').val(dataName);
                    $('#owner').val(dataOwner);
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
            $('#name').val('');
            $('#owner').val('');
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
            form.action = "aksi/metode-pembayaran.php?action=delete&id=" + id; // Targetkan ke URL tujuan
            form.style.display = "none"; // Buat form tidak terlihat

            // Tambahkan form ke body dan submit
            document.body.appendChild(form);
            form.submit();
        }
    }
</script>