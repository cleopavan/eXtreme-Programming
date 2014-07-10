<?php
	require_once dirname (__FILE__)."/library/library.php";
	session_start();
	
	if(isset($_POST['user']) && isset($_POST['pass'])){
		$user = addslashes($_POST['user']);
		$pass = addslashes($_POST['pass']);
		
		$r=constroiDadosLogin($user, $pass);
		
		if(mysql_num_rows($r) == 0){
			$_SESSION['error'] = 5;
			header("Location: index.php"); // dont existing user
		}
		else if(mysql_num_rows($r) == 1){
			$_SESSION['logado'] = TRUE;
			$row = mysql_fetch_array($r);
			
			$_SESSION['nomeCompleto'] = $row['nome'].' '.$row['sobrenome'];
			$_SESSION['idNivelServidor'] = $row['idNivelServidor'];			
			header('Location: index.php');
		}
	}
?>
