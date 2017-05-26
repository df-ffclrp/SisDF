
<!-- jQuery -->
    <script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?= base_url() ?>assets/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?= base_url() ?>assets/dist/js/sb-admin-2.js"></script>

	<?php if(isset($custom_js)): ?>
	<!-- JS específico desta página-->
    <script src="<?= base_url() ?>assets/sisdf/js/<?= $custom_js ?>"> </script>

	<?php endif; ?>

</body>

</html>
