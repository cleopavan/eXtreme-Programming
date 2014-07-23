<?php
	//$banco = 'local';
	//$banco = 'server';
	$banco = 'jacson';

	if($banco == 'server'){
		$host = "mysql.hostinger.com.br";
		$user = "u454558226_cadu";
		$pass = "t3051696";
	}

	if($banco == 'local'){
		$host = "localhost";
		$user = "root";
		$pass = "";
	}
	
	if($banco == 'jacson'){
		$host = "localhost";
		$user = "root";
		$pass = "NOVASENHA";
	}

	$app = "u454558226_cadu";

	$connect = @mysql_connect($host, $user, $pass);
	
	mysql_select_db($app, $connect);
	
	mysql_set_charset('UTF8',$connect);

	function dbConsulta($sql){
		($a = mysql_query($sql)) or (die ("error: ".mysql_error()));
		return $a;
	}

?>
