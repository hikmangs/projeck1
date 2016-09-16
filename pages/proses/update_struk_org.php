<?php
/**
 * Created by PhpStorm.
 * User: Hikman
 * Date: 20/09/15
 * Time: 10:24
 */
include "../config.php";
$target_dir = "fotomasjid/struk_org/";
$target_file = $target_dir . basename($_FILES["struk_org"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if (isset($_POST['update_struk'])) {
    $check = getimagesize($_FILES["struk_org"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["struk_org"]["size"] > 2000000) {
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
        if (move_uploaded_file($_FILES["struk_org"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["struk_org"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    $updatestruk="UPDATE `data_masjid` SET `struk_org`='$target_file',`jum_pengurus`='$_POST[jum_pengurus]' WHERE 1";
    $input=mysql_query($updatestruk);
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
    window.location.href = "../input_data_masjid.php";
</script>