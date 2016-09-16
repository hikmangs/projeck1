<?php
	session_start();
	$host = "localhost";
	$user = "root";
	$password = "erg1234";
	$database = "coba";
	
	$db = mysql_connect($host,$user,$password) or die ("pagging error");
	mysql_select_db($database,$db) or die ("Error database");
	
?>