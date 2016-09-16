<?php
include "../config.php";

if (isset($_GET['id_jadwal_shalat'])) {
$id_jadwal_shalat = $_GET["id_jadwal_shalat"];

	$hapus_kegiatan="DELETE FROM `tabel_jadwal_shalat` WHERE `id_jadwal_shalat`='$id_jadwal_shalat'";
	$hapus=mysql_query($hapus_kegiatan);
	if ($hapus) {
		$_SESSION['hapus_shalat']="BERHASIL";
	}
	else{
		echo "gagal";
	}
}
?>
<br>
<script language="javascript">
    window.location.href = "../lihat_jadwal_shalat.php";
</script>