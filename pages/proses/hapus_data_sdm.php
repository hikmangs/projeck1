<?php
include "../config.php";

if (isset($_GET['id_sdm'])) {
$id_sdm = $_GET["id_sdm"];

	$hapus_sdm="DELETE FROM `tabel_sdm` WHERE `id_sdm`='$id_sdm'";
	$hapus=mysql_query($hapus_sdm);
	if ($hapus) {
		$_SESSION['hapus_sdm']="BERHASIL";
	}
	else{
		echo "gagal";
	}
}
?>
<br>
<script language="javascript">
    window.location.href = "../lihat_data_sdm.php";
</script>
<a href="kas_masjid.html">Back</a>