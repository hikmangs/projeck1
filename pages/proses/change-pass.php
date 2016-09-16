<?php
include "../config.php";

if (isset($_POST['changepass'])) {
    $old_pass = md5($_POST["oldpass"]);
    $new_pass = md5($_POST["newpass"]);
    $renew_pass = md5($_POST["re-newpass"]);
    $pass_set = mysql_query("SELECT * FROM tabel_user_masjid");

    while ($row=mysql_fetch_array($pass_set)) {
        $pass=$row['pass_masjid'];
    }
    if (($old_pass==$pass)&&($new_pass==$renew_pass)){
        $insert_pass=("UPDATE tabel_user_masjid SET pass_masjid = '$new_pass' WHERE id_user_masjid='1'");
        $input=mysql_query($insert_pass);
        if ($input) {
        $_SESSION['valid_pass']="valid";
        header("location:../setting-admin.php");
        }
        else{
        $_SESSION['novalid']="novalid";
        header("location:../setting-admin.php");     // dan alihkan ke setting-admin.php
        }
    }else{
        header("location:../setting-admin.php");     // dan alihkan ke setting-admin.php
        $_SESSION['novalid']="novalid";
    }
}
?>