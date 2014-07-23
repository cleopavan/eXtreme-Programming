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
				
		if(isset($_POST['codCurso']) && isset($_POST['nomeCurso']) && isset($_POST['idNvlCurso'])){
			
			$sql = constroiDadosInsertCurso($cod, $nome, $nvl);
			if ($sql){
				$retorno = "Curso cadastrado com sucesso!";
			}
			else{
				$retorno = mysql_error();
			}
			header("Location: cursos.php?e=".urlencode($retorno)."");
		}
	}
	
		//buscar
	if(isset($_POST['acao']) && $_POST['acao'] == 'buscar'){
	
		$filter = $_POST['filter'];
		$texto = $_POST['frase'];
		
		if($filter == "nomeCurso"){
			$query = 	"SELECT DISTINCT c.codCurso, c.nomeCurso, nc.nomeNivelCurso
						FROM curso c
						JOIN nivelcurso nc ON c.idNivelCurso = nc.idNivelCurso
						WHERE c.nomeCurso LIKE '%".$texto."%' 
						AND c.regValido =1
						AND nc.regValido = 1 
						ORDER BY c.nomeCurso";
		}
		if($filter == "codCurso"){
			$query = 	"SELECT DISTINCT c.codCurso, c.nomeCurso, nc.nomeNivelCurso
						FROM curso c
						JOIN nivelcurso nc ON c.idNivelCurso = nc.idNivelCurso
						WHERE c.codCurso LIKE '%".$texto."%' 
						AND c.regValido =1
						AND nc.regValido = 1
						ORDER BY c.nomeCurso";
		}
		if($filter == "nivel"){
			$query = 	"SELECT DISTINCT c.codCurso, c.nomeCurso, nc.nomeNivelCurso
						FROM curso c
						JOIN nivelcurso nc ON c.idNivelCurso = nc.idNivelCurso
						WHERE nc.nomeNivelCurso LIKE '%".$texto."%' 
						AND c.regValido =1
						AND nc.regValido = 1
						ORDER BY c.nomeCurso";
		}
		
		$sql = mysql_query($query);
		
		if(!$sql) echo mysql_error();
			
			echo '<h3> Resultado de busca por: <div class="italico" style="font-style:italic;">'.$texto.'</div></h3>';
			echo '<table class="table table-hover">
					<tr>
						<th>Id</th>
						<th>Nome do Curso</th>		
						<th>Nível do Curso</th>
					</tr>';

			while($row = mysql_fetch_assoc($sql)){
				echo "<tr>
						<td>".$row['codCurso']."</td>
						<td>".$row['nomeCurso']."</td>
						<td>".$row['nomeNivelCurso']."</td>
					</tr>";
			}
			echo '</table>';
	}
?>
