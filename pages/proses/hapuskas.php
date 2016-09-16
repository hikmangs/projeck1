<?php
include "../config.php";

if (isset($_GET['id_kas'])) {
$id_kas = $_GET["id_kas"];

	$hapus_kas="DELETE FROM `kas_masjid` WHERE `id_kas`='$id_kas'";
	$hapus=mysql_query($hapus_kas);
	if ($hapus) {
		echo "berhasil";
	}
	else{
		echo "gagal";
	}
}
?>
<br>
<script language="javascript">
    window.location.href = "../kas_masjid.php";
</script>
<a href="kas_masjid.html">Back</a>