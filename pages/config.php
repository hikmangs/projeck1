<?php
	session_start();
	$host = "localhost";
	$user = "root";
	$password = "";
	$database = "db_simas_jabar";
	
	$db = mysql_connect($host,$user,$password) or die ("pagging error");
	mysql_select_db($database,$db) or die ("Error database");
	
?>