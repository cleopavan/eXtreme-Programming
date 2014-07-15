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
?>

<br/>
<h4> Buscar Curso </h4>
<div class="row">
	<div class="col-lg-6">
		<form action="send.php"  method="post">
			<div class="input-group">
				<input type="text" class="form-control" name="text" placeholder="Buscar curso">
				<div class="input-group-btn"  >
					<span class="input-group-btn">
						<button type="submit" class="btn btn-default" >BUSCAR</button>											
						
					</span>
					
				</div>
			</div><!-- /input-group-btn -->
			
			<input type="hidden" name="acao" value="buscar"/>
			
			<input type="radio" name="filter" value="nomeCurso" checked>
			<label for="Nome">Nome  </label>
			
			<input type="radio" name="filter" value="codCurso">
			<label for="cod">Código  </label>
			
			<input type="radio" name="filter" value="nivel">
			<label for="curso">Nível  </label>
		</form>			
	</div><!-- /col-lg-6 -->
</div><!-- /row -->

<?

if(isset($_GET['retorno'])){
	echo 'retono';
}

?>