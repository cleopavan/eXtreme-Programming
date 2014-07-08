<?php
	require_once dirname (__FILE__)."/library/library.php";
	session_start();
	
	if(isset($_POST['filter']) && isset($_POST['text']) && strlen($_POST['text']) > 0){
		//echo $_POST['filter'];
		//echo $_POST['text'];
		
		constroiDadosSelectCcr($_POST['filter'], $_POST['text']);
		
		if ($_POST['filter'] == 'nome') {
			
		}
		if ($_POST['filter'] == 'cod') {
				
		}
		if ($_POST['filter'] == 'ch'){
			
		}
		if ($_POST['filter'] == 'domin'){
			
		}
		if ($_POST['filter'] == 'curso'){
			
		}
		
		
	}else {// tratar erro
		
		$_SESSION['erro'] = true;
		header('Location: ccr.php');
		exit();
	}


?>