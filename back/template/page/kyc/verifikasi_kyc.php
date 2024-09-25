<?php

	if (isset($_GET['id_user'])) {
		$id = $_GET['id_user'];

		$query = mysqli_query($koneksi, "UPDATE tb_user SET kyc = '2' WHERE extplayer = '$id' ");

		if ($query) {
			?>
			<script type="text/javascript">
				alert('Akun Berhasil Di Verifikasi');
				window.location = "?page=kyc";
			</script>
			<?php
		}else{
		    ?>
			<script type="text/javascript">
				alert('Akun Gagal Di Verifikasi');
				window.location = "?page=kyc";
			</script>
			<?php
		}
	}

	?>