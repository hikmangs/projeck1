<?php
session_start(); 		//mulai session, krena kita akan menggunakan session pd file php ini
include 'config.php'; 		//hubungkan dengan config.php untuk berhubungan dengan database
$username=addslashes($_POST['username']); 	//tangkap data yg di input dari form login input username
$password=md5($_POST['password']); 	//tangkap data yg di input dari form login input password

$query=mysql_query("select * from admin where username='$username' and password='$password'");	 //melakukan pengampilan data dari database untuk di cocokkan
$xxx=mysql_num_rows($query);	 //melakukan pencocokan
if($xxx==TRUE){ 		// melakukan pemeriksaan kecocokan dengan percabangan.
    $_SESSION['username']=$username;  //jika cocok, buat session dengan nama sesuai dengan username
    header("location:index_server.php");     // dan alihkan ke index.php
}else{   				//jika tidak tampilkan pesan gagal login
    header("location:login.php");
    $_SESSION['error_login']="salah";
}

?>