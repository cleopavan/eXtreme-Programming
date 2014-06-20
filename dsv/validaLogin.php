<?php
	require_once dirname (__FILE__)."/library/library.php";
	session_start();
	
	if(isset($_POST['user']) && isset($_POST['pass'])){
		$user = addslashes($_POST['user']);
		$pass = addslashes($_POST['pass']);
		
		$r=buildDataLogin($user, $pass);
		
		if(mysql_num_rows($r) == 0){
			$_SESSION['error'] = 5;
			header("Location: index.php"); // dont existing user
		}
		else if(mysql_num_rows($r) == 1){
			$_SESSION['logado'] = TRUE;
			$_SESSION['idNivelServidor'] = 1; /*FIXADO 1 (Somente para testes do menu dinamico) futuramente receberá id correto*/
			//header("Location: home.php");
			header('Location: index.php');
		}
	}
?>