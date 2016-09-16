<?php
/**
 * Created by PhpStorm.
 * User: Hikman
 * Date: 25/09/15
 * Time: 20:05
 */
include "config.php";

$delete_fa="DELETE FROM `fasilitas_masjid`";
mysql_query($delete_fa);

if (isset($_POST['fa1'])) {
    $fa="INSERT INTO `fasilitas_masjid`(`id_fa`, `kode_fa`) VALUES (null,'$_POST[fa1]')";
    $input=mysql_query($fa);
}
if (isset($_POST['fa2'])) {
    $fa="INSERT INTO `fasilitas_masjid`(`id_fa`, `kode_fa`) VALUES (null,'$_POST[fa2]')";
    $input=mysql_query($fa);
}
if (isset($_POST['fa3'])) {
    $fa="INSERT INTO `fasilitas_masjid`(`id_fa`, `kode_fa`) VALUES (null,'$_POST[fa3]')";
    $input=mysql_query($fa);
}
if (isset($_POST['fa4'])) {
    $fa="INSERT INTO `fasilitas_masjid`(`id_fa`, `kode_fa`) VALUES (null,'$_POST[fa4]')";
    $input=mysql_query($fa);
}
if (isset($_POST['fa5'])) {
    $fa="INSERT INTO `fasilitas_masjid`(`id_fa`, `kode_fa`) VALUES (null,'$_POST[fa5]')";
    $input=mysql_query($fa);
}
if (isset($_POST['fa6'])) {
    $fa="INSERT INTO `fasilitas_masjid`(`id_fa`, `kode_fa`) VALUES (null,'$_POST[fa6]')";
    $input=mysql_query($fa);
}
if (isset($_POST['fa7'])) {
    $fa="INSERT INTO `fasilitas_masjid`(`id_fa`, `kode_fa`) VALUES (null,'$_POST[fa7]')";
    $input=mysql_query($fa);
}
if (isset($_POST['fa8'])) {
    $fa="INSERT INTO `fasilitas_masjid`(`id_fa`, `kode_fa`) VALUES (null,'$_POST[fa8]')";
    $input=mysql_query($fa);
}
if (isset($_POST['fa9'])) {
    $fa="INSERT INTO `fasilitas_masjid`(`id_fa`, `kode_fa`) VALUES (null,'$_POST[fa9]')";
    $input=mysql_query($fa);
}
if (isset($_POST['fa10'])) {
    $fa="INSERT INTO `fasilitas_masjid`(`id_fa`, `kode_fa`) VALUES (null,'$_POST[fa10]')";
    $input=mysql_query($fa);
}
if (isset($_POST['fa11'])) {
    $fa="INSERT INTO `fasilitas_masjid`(`id_fa`, `kode_fa`) VALUES (null,'$_POST[fa11]')";
    $input=mysql_query($fa);
}
if (isset($_POST['fa12'])) {
    $fa="INSERT INTO `fasilitas_masjid`(`id_fa`, `kode_fa`) VALUES (null,'$_POST[fa12]')";
    $input=mysql_query($fa);
}
if (isset($_POST['fa13'])) {
    $fa="INSERT INTO `fasilitas_masjid`(`id_fa`, `kode_fa`) VALUES (null,'$_POST[fa13]')";
    $input=mysql_query($fa);
}
if (isset($_POST['fa14'])) {
    $fa="INSERT INTO `fasilitas_masjid`(`id_fa`, `kode_fa`) VALUES (null,'$_POST[fa14]')";
    $input=mysql_query($fa);
}
if (isset($_POST['fa15'])) {
    $fa="INSERT INTO `fasilitas_masjid`(`id_fa`, `kode_fa`) VALUES (null,'$_POST[fa15]')";
    $input=mysql_query($fa);
}
if (isset($_POST['fa16'])) {
    $fa="INSERT INTO `fasilitas_masjid`(`id_fa`, `kode_fa`) VALUES (null,'$_POST[fa16]')";
    $input=mysql_query($fa);
}
if (isset($_POST['fa17'])) {
    $fa="INSERT INTO `fasilitas_masjid`(`id_fa`, `kode_fa`) VALUES (null,'$_POST[fa17]')";
    $input=mysql_query($fa);
}
if (isset($_POST['fa18'])) {
    $fa="INSERT INTO `fasilitas_masjid`(`id_fa`, `kode_fa`) VALUES (null,'$_POST[fa18]')";
    $input=mysql_query($fa);
}
if (isset($_POST['fa19'])) {
    $fa="INSERT INTO `fasilitas_masjid`(`id_fa`, `kode_fa`) VALUES (null,'$_POST[fa19]')";
    $input=mysql_query($fa);
}
if (isset($_POST['fa20'])) {
    $fa="INSERT INTO `fasilitas_masjid`(`id_fa`, `kode_fa`,`daya_tampung`) VALUES (null,'$_POST[fa20]','$_POST[tampung_jamaah]')";
    $input=mysql_query($fa);
}

?>
<br>
<script language="javascript">
    window.location.href = "input_data_masjid.php";
</script>
