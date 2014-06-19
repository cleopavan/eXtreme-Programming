<?php
	session_start();
	$_SESSION['logado'] = TRUE;
	
	$_SESSION['idNivelServidor'] = 1; /*FIXADO 1 (Somente para testes do menu dinamico) futuramente receberá id correto*/
	header('Location: index.php');
?>