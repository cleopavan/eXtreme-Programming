<?php

	/*
	$host = "ftp.projeto1.comxa.com";
=======

	$host = "mysql9.000webhost.com"; // local
>>>>>>> 42c0404362be589b7b54a4f4bd16e69009c9a13d
	$user = "a6233819_000web";
	$pass = "000webhost";
	$app = "a6233819_000web"; // db

	*/
	$host = "localhost";
	$user = "root";
	$pass = "";

	$app = "controleacademico";

	/*
	$app = "projeto1";
	*/

	mysql_connect($host, $user, $pass);
	
	mysql_select_db($app);

	function dbConsulta($sql){
		($a = mysql_query($sql)) or (die ("error: ".mysql_error()));
		return $a;
	}
?>