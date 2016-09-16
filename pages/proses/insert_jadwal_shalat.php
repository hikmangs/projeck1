<?php
include "../config.php";
if (isset($_POST['inputshalat'])) {
	$ket_sha=addslashes($_POST['ket']);
	$jadwalshalat="INSERT INTO `tabel_jadwal_shalat`( `tgl_shalat`, `id_imam_shalat`, `ket_shalat`, `waktu_shalat`, `khotib_shalat`, `muazin_shalat`, `tema_shalat`)
	VALUES ('$_POST[tglshalat]' , '$_POST[imam]' , '$ket_sha' , '$_POST[waktushalat]' , '$_POST[khotib]' , '$_POST[muazin]' , '$_POST[tema_shalat]')";
	$input=mysql_query($jadwalshalat);
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
    window.location.href = "../Input_jadwal_shalat.php";
</script>
<a href="inputsdm.html">Back</a>
