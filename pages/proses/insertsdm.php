<?php
include "../config.php";

if(isset($_POST['inputsdm'])){
$sdm="INSERT INTO `tabel_sdm`(`nama_sdm`, `status_sdm`, `no_kontak_sdm`, `alamat_sdm`) VALUES ('$_POST[namasdm]' , '$_POST[statsdm]' , '$_POST[nohpsdm]' , '$_POST[alamatsdm]' )";
  $inputok=mysql_query($sdm);
  if ($inputok) {
		$_SESSION['tambahsdm']="BERHASIL";
  }
  else{
    echo "gagal";
  }
}
?>
<br>
<script language="javascript">
    window.location.href = "../input_data_sdm.php";
</script>
<a href="inputsdm.html">Back</a>