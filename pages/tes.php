<?php
include "config.php";
$first_name = $_POST[‘namasdm’]; 
$stat = $_POST[‘statsdm’]; 
$no = $_POST[‘nohpsdm’]; 
$alamat = $_POST[‘alamatsdm’]; 
$pola_tlp = “^[0-9]+$”;

if((!$first_name) || (!$stat) || (!eregi($pola_tlp, $no))){
	echo "isi data dengan benar";
}

?>

<?php 
if(!$first_name){ 
?>
Tolong isi nama depan <br />

<?php???? } 
if(!$last_name){ 
?>
Tolong isi nama belakang <br />

<?php???? } 
if(!eregi($pola_tlp, $no)){ 
echo “Tolong isi Telpon, Harus Angka Ex. 085648173225<br />”; 
} 
if(!eregi($polaemail, $email_address)){ 
echo “Tolong isi Email, Ex. scorpio@linux.org<br />”; 
} 
if(!$username){ 
?>
Tolong isi username<br />

<?php????? } 
if(!eregi($polapassword, $password)){ 
echo “Tolong isi Password, Harus Lebih dari 5 Karakter<br />”; 
} 
if(!$retypepassword){ 
?>
Tolong isi retype password

<?php????? } 
if( “$password” != “$retypepassword” ){ 
?>
Passwordnya tidak sama, ulangi lagi? ya !

<?php??? 
}
include “input_data_sdm.html”;
exit();
?>