<?php
include "../config.php";

if (isset($_GET['id_kegiatan'])) {
$id_kegiatan = $_GET["id_kegiatan"];

	$hapus_kegiatan="DELETE FROM `jadwal_kegiatan` WHERE `id_kegiatan`='$id_kegiatan'";
	$hapus=mysql_query($hapus_kegiatan);
	if ($hapus) {
		$_SESSION['hapus_kegiatan']="BERHASIL";
	}
	else{
		echo "gagal";
	}
}
?>
<br>
<script language="javascript">
    window.location.href = "../lihat_jadwal_kegiatan.php";
</script>
<a href="kas_masjid.html">Back</a>