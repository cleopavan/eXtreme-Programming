<?php


	$host = "mysql9.000webhost.com"; // local
	$user = "a6233819_000web";
	$pass = "000webhost";
	$app = "a6233819_000web"; // db

	/*
	$host = "localhost";
	$user = "root";
	$pass = "";
	$app = "projeto1";
	*/
	
	mysql_connect($host, $user, $pass);
	
	mysql_select_db($app);

	function dbConsulta($sql){
		($a = mysql_query($sql)) or (die ("error: ".mysql_error()));
		return $a;
	}
?>