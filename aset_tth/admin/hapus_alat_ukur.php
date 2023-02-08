<?php				
			include '../koneksi.php'; //menghubungkan ke file koneksi untuk ke database
			$id_alat_ukur = $_GET['id_alat_ukur']; //menampung id

			//query hapus
			$datas = mysqli_query($koneksi, "delete from alat_ukur where id_alat_ukur ='$id_alat_ukur'") or die(mysqli_error($koneksi));

			//alert dan redirect ke index.php
			echo "<script>alert('data berhasil dihapus.');window.location='data_alat_ukur.php';</script>";
	?>