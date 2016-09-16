<?php
include "../config.php";
if (isset($_POST['updateqod'])) {
$qotd=addslashes($_POST['qotd']);
	$updateqod="UPDATE `tabel_fitur_simas` SET `qotd`='$qotd' WHERE 1";
	 $inputqod=mysql_query($updateqod);
	if ($inputqod) {
        $_SESSION['tambah']="BERHASIL";
	}
	else{
		echo "gagal";
	}
};

?>
<script language="javascript">
  window.location.href = "../fitur.php";
</script>