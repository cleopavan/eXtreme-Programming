<?php
	require_once dirname (__FILE__)."/library/library.php";
	session_start();
	
	$_SESSION['aba'] = 2;
			
	header('Location: alocaCursoCcr.php');
	
?>
