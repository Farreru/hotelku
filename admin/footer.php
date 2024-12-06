<!-- Modals -->
<?php
isset($modals) && !empty($modals) ? include_once($modals) : '';
?>
<!-- Modals End -->

<footer class="pc-footer">
    <div class="footer-wrapper container-fluid">
        <div class="row">
            <div class="col-sm-6 my-1">
                <p class="m-0"><b>HotelKu</b> &mdash; AdminPanel</p>
            </div>
            <div class="col-sm-6 ms-auto my-1">
                <ul class="list-inline footer-link mb-0 justify-content-sm-end d-flex">
                    <li class="list-inline-item"><a href="index.php">Home</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer> <!-- Required Js -->
<script src="assets/js/plugins/popper.min.js"></script>
<script src="assets/js/plugins/simplebar.min.js"></script>
<script src="assets/js/plugins/bootstrap.min.js"></script>
<script src="assets/js/fonts/custom-font.js"></script>
<script src="assets/js/pcoded.js"></script>
<script src="assets/js/plugins/feather.min.js"></script>
<script>
    layout_change('light');
</script>
<script>
    font_change("Roboto");
</script>
<script>
    change_box_container('false');
</script>
<script>
    layout_caption_change('true');
</script>
<script>
    layout_rtl_change('false');
</script>
<script>
    preset_change("preset-1");
</script>
<!-- [Page Specific JS] start --><!-- datatable Js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="assets/js/plugins/dataTables.min.js"></script>
<script src="assets/js/plugins/dataTables.bootstrap5.min.js"></script>

<!-- Script -->
<?php
isset($script) && !empty($script) ? include_once($script) : '';
?>
<!-- Script End -->


</body>
<!-- [Body] end -->

</html>