<?php
/**
 * Created by PhpStorm.
 * User: Hikman
 * Date: 26/09/15
 * Time: 23:38
 */
include "../config.php";

$delete_rut="DELETE FROM `kegiatan_rutin`";
mysql_query($delete_rut);

if (isset($_POST['rut1'])) {
    $rutkeg="INSERT INTO `kegiatan_rutin`(`id_rutin`, `kode_rutin`) VALUES (null,'$_POST[rut1]')";
    $input=mysql_query($rutkeg);
}
if (isset($_POST['rut2'])) {
    $rutkeg="INSERT INTO `kegiatan_rutin`(`id_rutin`, `kode_rutin`) VALUES (null,'$_POST[rut2]')";
    $input=mysql_query($rutkeg);
}
if (isset($_POST['rut3'])) {
    $rutkeg="INSERT INTO `kegiatan_rutin`(`id_rutin`, `kode_rutin`) VALUES (null,'$_POST[rut3]')";
    $input=mysql_query($rutkeg);
}
if (isset($_POST['rut4'])) {
    $rutkeg="INSERT INTO `kegiatan_rutin`(`id_rutin`, `kode_rutin`) VALUES (null,'$_POST[rut4]')";
    $input=mysql_query($rutkeg);
}
if (isset($_POST['rut5'])) {
    $rutkeg="INSERT INTO `kegiatan_rutin`(`id_rutin`, `kode_rutin`) VALUES (null,'$_POST[rut5]')";
    $input=mysql_query($rutkeg);
}
if (isset($_POST['rut6'])) {
    $rutkeg="INSERT INTO `kegiatan_rutin`(`id_rutin`, `kode_rutin`) VALUES (null,'$_POST[rut6]')";
    $input=mysql_query($rutkeg);
}
if (isset($_POST['rut7'])) {
    $rutkeg="INSERT INTO `kegiatan_rutin`(`id_rutin`, `kode_rutin`) VALUES (null,'$_POST[rut7]')";
    $input=mysql_query($rutkeg);
}
if (isset($_POST['rut8'])) {
    $rutkeg="INSERT INTO `kegiatan_rutin`(`id_rutin`, `kode_rutin`) VALUES (null,'$_POST[rut8]')";
    $input=mysql_query($rutkeg);
}


?>
<br>
<script language="javascript">
    window.location.href = "../input_data_masjid.php";
</script>
