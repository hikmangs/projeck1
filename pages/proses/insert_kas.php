<?php
include "../config.php";

if (isset($_POST['inputkas'])) {
$pemasukan = $_POST["pemasukan"];
$pengeluaran = $_POST["pengeluaran"];
$saldoawal = mysql_query("SELECT * FROM tabel_kas_masjid");

		while ($row=mysql_fetch_array($saldoawal)) {
			$ok=$row['saldo'];
		}
		if (isset($ok)){
			$sal=$ok;
		}else{
			$sal=0;
		}
$saldo = ($pemasukan - $pengeluaran); 
	$kas="INSERT INTO `tabel_kas_masjid`( `tanggal_kas`, `nama_kas`, `pemasukan`, `pengeluaran`, `saldo`) VALUES ('$_POST[tglkas]' , '$_POST[namakas]' , '$_POST[pemasukan]' , '$_POST[pengeluaran]' , '$saldo' )";
	$input=mysql_query($kas);
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
    window.location.href = "../kas_masjid.php";
</script>