<?php
include "../config.php";
if (isset($_POST['inputkegiatan'])) {
	$jadwalkegiatan="INSERT INTO `tabel_jadwal_kegiatan`( `tgl_kegiatan`, `nama_kegiatan`, `waktu_kegiatan`, `pemateri`, `tempat_kegiatan`, `ket_kegiatan`)
	VALUES ('$_POST[tglkegiatan]' , '$_POST[namakegiatan]' , '$_POST[waktukegiatan]' , '$_POST[namapemateri]' , '$_POST[tempatkegiatan]', '$_POST[ketkegiatan]')";
	$input=mysql_query($jadwalkegiatan);
	if ($input) {
		$_SESSION['tambah']="BERHASIL";
	}
	else{
		echo "gagal";
	}
}
?>
<br>
<script language="javascript">
    window.location.href = "../input_jadwal_kegiatan.php";
</script>
<a href="inputkegiatan.html">Back</a>