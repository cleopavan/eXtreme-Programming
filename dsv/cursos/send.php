<?php
	require_once "./library/library.php";
	if(!isset($_SESSION)) session_start();
	if($_SESSION['logado'] != TRUE){
		header('Location: ./login.php');
	}
	if(!isset($_SESSION['idNivelServidor'])){//verifica se existe um servidor passando por SESSION
		header('Location: ./login.php');
	}
	//@parametros (string, integer);
	//@parametros (nome da pagina, id do nivel do servidor)
	if(acessoRecusado('cursos.php', $_SESSION['idNivelServidor']) == FALSE){/* Excessão no caso do servidor não ter acesso a esta área*/
		header('Location: ./index.php?i=semPermissao');
	}
	
	
	if (empty($_POST['codCurso'])) echo 'Digite o código do Curso';
	
	if (empty($_POST['nomeCurso'])) echo 'Digite o nome do Curso';
	
	if (empty($_POST['idNvlCurso'])) echo 'Selecione o nível do curso';
	
	if(isset($_POST['codCurso']) && isset($_POST['nomeCurso']) && isset($_POST['idNvlCurso'])){
		$query = "INSERT INTO cursos (codCurso, nomeCurso, idNivelCurso, regValido) VALUES ('".$_POST['codCurso']."', '".$_POST['nomeCurso']."', '".$_POST['idNvlCurso']."', 1)";
		$sql = mysql_query($query);
		if ($sql) echo false; 
		else die(mysql_error());
	}
?>

