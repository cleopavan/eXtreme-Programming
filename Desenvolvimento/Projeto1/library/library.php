<?php
	require_once dirname(__FILE__).'/databaseAcess.php';//banco de dados
	
	function callTest(){
		$r = test();
		return $r;
	}
	function in($title){//função do cabeçalho
		echo '<!DOCTYPE html>';
		echo '<html>';
		echo '	<head>';
		//echo '		<meta http-equiv="content-type" content="text/html; charset=UTF-8">';
		echo '		<meta http-equiv="content-type" content="text/html; charset=ISO-8859-15">';
		echo '		<title>'.$title.'</title>';//alterar para passar o nome da pagina
		echo '	</head>';
		echo '	<body>';
	}
	
	function out(){
	
		$date = date('Y');
		echo '		<hr>';
		echo '		<p>';
		echo '		© '.$date.' - All rights reserved.';
		echo '		</p>';
		echo '	</body>';
		echo '</html>';
	}

?>