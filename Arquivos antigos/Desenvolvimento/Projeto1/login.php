<?php
	require_once dirname (__FILE__)."/library/library.php";
	session_start();
	if(isset($_POST['siape']) && isset($_POST['password'])){
		$user = addslashes($_POST['siape']);
		$pass = addslashes($_POST['password']);
		
		$r=chamaLogin($user, $pass);
		
		if(mysql_num_rows($r) == 0){
			$_SESSION['error'] = 5;
			header("Location: index.php"); // dont existing user
		}
		else if(mysql_num_rows($r) == 1){
			$_SESSION['logged'] = 1;
			header("Location: home.php");
		}
	}
?>