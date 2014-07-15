<?php
	require_once "library/library.php";
	if(!isset($_SESSION)) session_start();
	if($_SESSION['logado'] != TRUE){
		header('Location: login.php');
	}
	if(!isset($_SESSION['idNivelServidor'])){//verifica se existe um servidor passando por SESSION
		header('Location: login.php');
	}
	//@parametros (string, integer);
	//@parametros (nome da pagina, id do nivel do servidor)
	if(acessoRecusado('cursos.php', $_SESSION['idNivelServidor']) == FALSE){/* Excessão no caso do servidor não ter acesso a esta área*/
		header('Location: index.php?i=semPermissao');
	}
	if(isset($_POST['acao']) && $_POST['acao'] == 'cadastrar'){
		$cod = $_POST['codCurso'];
		$nome = $_POST['nomeCurso'];
		$nvl = $_POST['idNvlCurso'];
		
		if (!isset($_POST['codCurso'])) $error =  'Digite o código do Curso';
		
		if (!isset($_POST['nomeCurso'])) $error = 'Digite o nome do Curso';
		
		if (!isset($_POST['idNvlCurso']) || strlen()) $error = 'Selecione o nível do curso';
		
		if(isset($error)){
			header("Location: cursos.php?e=".urlencode($error)."");
		}
		
		if(isset($_POST['codCurso']) && isset($_POST['nomeCurso']) && isset($_POST['idNvlCurso'])){
			$query = "INSERT INTO curso (codCurso, nomeCurso, idNivelCurso, regValido) VALUES ('".$_POST['codCurso']."', '".$_POST['nomeCurso']."', '".$_POST['idNvlCurso']."', 1)";
			$sql = mysql_query($query);
			if ($sql){
				$retorno = "Curso cadastrado com sucesso!";
				header("Location: cursos.php?e=".urlencode($retorno)."");
			}
			else die(mysql_error());
		}
	}
	if(isset($_POST['acao']) && $_POST['acao'] == 'buscar'){
		$cod = $_POST['codCurso'];
	
?>

