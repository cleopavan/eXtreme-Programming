<?php
	//INÍCIO DO HEADER
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
	//FIM DO HEADER
	
	//cadastrar
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
	
	//buscar
	if(isset($_POST['acao']) && $_POST['acao'] == 'buscar'){
	
		$filter = $_POST['filter'];
		$text = $_POST['frase'];
		
		if($filter == "nomeCurso"){
			$query = 	"SELECT c.CodCurso, c.nomeCurso, nc.nomeNivelCurso
						FROM curso c
						JOIN nivelcurso nc ON c.idNivelCurso = nc.idNivelCurso
						WHERE c.nomeCurso LIKE '%".$texto."%' 
						AND c.regValido =1
						AND nc.regValido = 1";
		}
		if($filter == "codCurso"){
			$query = 	"SELECT c.CodCurso, c.nomeCurso, nc.nomeNivelCurso
						FROM curso c
						JOIN nivelcurso nc ON c.idNivelCurso = nc.idNivelCurso
						WHERE c.codCurso LIKE '%".$texto."%' 
						AND c.regValido =1
						AND nc.regValido = 1";
		}
		if($filter == "nivel"){
			$query = 	"SELECT c.CodCurso, c.nomeCurso, nc.nomeNivelCurso
						FROM curso c
						JOIN nivelcurso nc ON c.idNivelCurso = nc.idNivelCurso
						WHERE nc.nomeNivelCurso LIKE '%".$texto."%' 
						AND c.regValido =1
						AND nc.regValido = 1";
		}
		
		$sql = mysql_query($sql);
		
		if(!$sql) header("Location: curso.php?e=".urlencode(mysql_error()));
		
			$retorno = "";
		while($row = mysql_fetch_assoc($sql)){
			$retorno = $retorno.	"<tr>
									<td>".$row['codCurso']."</td>
									<td>".$row['nomeCurso']."</td>
									<td>".$row['nomeNivelCurso']."</td>
								</tr>";
								$retorno = 'foi';
		}
		header("Location:cursos/tabela.php?tab=".urlencode($retorno)."");
	}
?>