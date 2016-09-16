<?php
include "../config.php";
$target_dir = "slide/";
$target_file = $target_dir . basename($_FILES["poster4"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if($target_file=='slide/'){

}else{
if (isset($_POST['updateslide4'])) {
	$check = getimagesize($_FILES["poster4"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    // Check file size
if ($_FILES["poster4"]["size"] > 2000000) {
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
    if (move_uploaded_file($_FILES["poster4"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["poster4"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}
}
if($target_file=='slide/'){
    $updateslide1="UPDATE `tabel_fitur_simas` SET `poster4`='' WHERE 1";
}else{
   $updateslide1="UPDATE `tabel_fitur_simas` SET `poster4`='$target_file' WHERE 1";
}
    $input=mysql_query($updateslide1);
	if ($input) {
        $_SESSION['tambah']="BERHASIL";
	}
	else{
		echo "gagal";
	}

?>
<script language="javascript">
  window.location.href = "../fitur.php";
</script>