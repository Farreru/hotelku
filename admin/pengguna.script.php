<script>
    document.addEventListener("DOMContentLoaded", function(event) {

        var table = $('#tables').DataTable();

        var animateModal = document.getElementById('animateModal');
        animateModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var recipient = button.getAttribute('data-pc-animate');
            var status = button.getAttribute('data-status');
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
            }
        });
        animateModal.addEventListener('hidden.bs.modal', function(event) {
            removeClassByPrefix(animateModal, 'anim-');
            removeClassByPrefix(document.body, 'anim-');
            var form = animateModal.querySelector('form');
            form.action = '#';
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
</script>
</script>