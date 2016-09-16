<?php
include "../config.php";
$target_dir = "fotomasjid/";
$target_file = $target_dir . basename($_FILES["uploadfoto"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if($target_file=='fotomasjid/'){

}else{
if (isset($_POST['updatemasjid'])) {
	$check = getimagesize($_FILES["uploadfoto"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    // Check file size
if ($_FILES["uploadfoto"]["size"] > 2000000) {
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
    if (move_uploaded_file($_FILES["uploadfoto"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["uploadfoto"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}
}
if($target_file=='fotomasjid/'){
 $namam=addslashes($_POST['namamasjid']);   
    $updatemasjid="UPDATE `tabel_data_masjid` SET `provinsi`='$_POST[propinsi]',`kab_kota`='$_POST[kota]',`kecamatan`='$_POST[kec]',`nama_masjid`='$namam',`tipologi_masjid`='$_POST[tipologi]',`alamat_masjid`='$_POST[alamatmasjid]',`tema_masjid`='$_POST[temamasjid]',`luas_tanah_masjid`='$_POST[luastanah]',`status_tanah_masjid`='$_POST[statustanah]',`luas_bangunan_masjid`='$_POST[luasbangunan]',`tahun_berdiri_masjid`='$_POST[tahunberdiri]',`jamaah_masjid`='$_POST[jumlahjamaah]',`imam_masjid`='$_POST[jumlahimam]',`khatib_masjid`='$_POST[jumlahkhotib]',`muazin_masjid`='$_POST[jumlahmuazin]',`remaja_masjid`='$_POST[jumlahremaja]',`no_telp_masjid`='$_POST[telpmasjid]',`ket_masjid_masjid`='$_POST[ketmasjid]'";
}else{
    $namam=addslashes($_POST['namamasjid']);
	$updatemasjid="UPDATE `tabel_data_masjid` SET `provinsi`='$_POST[propinsi]',`kab_kota`='$_POST[kota]',`kecamatan`='$_POST[kec]',`nama_masjid`='$namam',`logo_masjid`='$target_file',`tipologi_masjid`='$_POST[tipologi]',`alamat_masjid`='$_POST[alamatmasjid]',`tema_masjid`='$_POST[temamasjid]',`luas_tanah_masjid`='$_POST[luastanah]',`status_tanah_masjid`='$_POST[statustanah]',`luas_bangunan_masjid`='$_POST[luasbangunan]',`tahun_berdiri_masjid`='$_POST[tahunberdiri]',`jamaah_masjid`='$_POST[jumlahjamaah]',`imam_masjid`='$_POST[jumlahimam]',`khatib_masjid`='$_POST[jumlahkhotib]',`muazin_masjid`='$_POST[jumlahmuazin]',`remaja_masjid`='$_POST[jumlahremaja]',`no_telp_masjid`='$_POST[telpmasjid]',`ket_masjid_masjid`='$_POST[ketmasjid]'";
}
    $input=mysql_query($updatemasjid);
	if ($input) {
        $_SESSION['tambah']="BERHASIL";
	}
	else{
		echo "gagal";
	}

?>
<br>
<script language="javascript">
  window.location.href = "../input_data_masjid.php";
</script>