<?php
include "../config.php";
$target_dir = "background/";
$target_file = $target_dir . basename($_FILES["backf"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if (isset($_POST['atur_simas'])) {
	$check = getimagesize($_FILES["backf"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    // Check file size
if ($_FILES["backf"]["size"] > 2000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["backf"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["backf"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}
$lts = 30;
$ltk = $_POST["lama_tampil_kegiatan"];
$lama_tampil_shalat = '';
$lama_tampil_kegiatan = '';
$lama_tampil_shalat = ($lts*60);
$lama_tampil_kegiatan = ($ltk*60);
	$setting_simas="UPDATE `tabel_setting_simas` SET `atur_waktu_shalat`='$_POST[atur_waktu_shalat]',`lama_tampil_shalat`='$lama_tampil_shalat',`lama_tampil_kegiatan`='$lama_tampil_kegiatan',`hari_pertama_shaum`='$_POST[tgl_shaum]',`banyak_hari_shaum`='$_POST[hari_shaum]',`walpaper_simas`='$target_file' WHERE 1";
	$input=mysql_query($setting_simas);
	if ($input) {
		$_SESSION['tambah']="BERHASIL";
	}
	else{
		echo "gagal";
	}

?>
<br>
<script language="javascript">
    //window.location.href = "../setting_simas.php";
</script>
