<?php
	session_start();
	
	$_SESSION['aba'] = 2;
			
	header('Location: alocaCursoCcr.php');
	
?>
