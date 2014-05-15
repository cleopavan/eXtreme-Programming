<?php

	/*
	$host = "ftp.projeto1.comxa.com";
	$user = "a6233819_000web";
	$pass = "000webhost";
	*/
	$host = "localhost";
	$user = "root";
	$pass = "";
	$app = "a6233819_000web";

	mysql_connect($host, $user, $pass);
	mysql_select_db($app);

	function dbConsulta($sql){
		($a = mysql_query($sql)) or (die ("error: ".mysql_error()));
		return $a;
	}
?>