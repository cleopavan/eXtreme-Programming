<?php
include("/library/library.php");
session_start();

if(isset($_POST['user']) && isset($_POST['pass'])){
	$user = addslashes($_POST['user']);
	$pass = addslashes($_POST['pass']);
	$validaLogin = new validaLogin($user,$pass);
}

class validaLogin{
	private $user;
	private $pass;
	public $library;
	
	function __construct($user,$pass){
		$this->library = new library();
		$this->user = $user;
		$this->pass = $pass;
		
		$r= $this->library->constroiDadosLogin($user, $pass);
		
		if(mysqli_num_rows($r) == 0){
			$_SESSION['error'] = 5;
			header("Location: index.php"); // dont existing user
		}
		else if(mysqli_num_rows($r) == 1){
			$_SESSION['logado'] = TRUE;
			$row = mysqli_fetch_array($r);
		
			$_SESSION['nomeCompleto'] = $row['nome'].' '.$row['sobrenome'];
			$_SESSION['idNivelServidor'] = $row['idNivelServidor'];			
			header('Location: index.php');
		}
	}
}
?>
