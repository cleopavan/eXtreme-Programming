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
	
	if(isset($_POST['codCurso']) && isset($_POST['nomeCurso']) && isset($_POST['idNivelCurso'])){
		$query = "INSERT INTO cursos (codCurso, nomeCurso, idNivelCurso, regValido) VALUES ('".$_POST['codCurso']."', '".$_POST['nomeCurso']."', '".$_POST['idNivelCurso']."', 1)";
		$sql = mysql_query($query);
		if(!$sql) die(mysql_error());
	}
?>

<br/>
<form class="form-horizontal" method="post" action="./cursos.php" >
	<div class="form-group">
		<label for="codCurso" class="col-sm-2 control-label">Código do curso</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="codCurso" name="codCurso" placeholder="Código do Curso">
		</div>
	</div>
	<div class="form-group">
		<label for="nomeCurso" class="col-sm-2 control-label">Nome do curso</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="nomeCurso" placeholder="Nome do Curso">
		</div>
	</div>
	<div class="form-group">
		<label for="nvlCurso" class="col-sm-2 control-label">Nível do Curso</label>
		<div class="col-sm-3">
			<select class="form-control" name="idNivelCurso" id="nvlCurso">
				<?php
					$query = "SELECT * FROM nivelcurso WHERE regValido = 1";
					$sql = mysql_query($query);
					if(!$sql){
						die('erro: '.mysql_error());
					}
					while($row = mysql_fetch_assoc($sql)){
						echo '<option value="'.$row['idNivelCurso'].'">'.$row['nomeNivelCurso'].'</option>';
					}
				?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<input type="submit" name="envia" value="Cadastrar" class="btn btn-default">
		</div>
	</div>
</form>