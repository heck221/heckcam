<?php

	if (isset($_GET['id_user'])) {
		$id = $_GET['id_user'];

		$query = mysqli_query($koneksi, "UPDATE tb_user SET kyc = '0' WHERE extplayer = '$id' ");

		if ($query) {
			?>
			<script type="text/javascript">
				alert('Akun Berhasil Di Gagalkan');
				window.location = "?page=kyc";
			</script>
			<?php
		}
	}

	?>