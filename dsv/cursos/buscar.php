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
			
			<div class="radio-inline">
				<label>
					<input type="radio" name="filter" id="filter1" value="nomeCurso" checked />
					Nome
				</label>
			</div>
			
			<div class="radio-inline">
				<label>
					<input type="radio" name="filter" id="filter2" value="codCurso" />
					Código do Curso
				</label>
			</div>
			
			<div class="radio-inline">
				<label>
					<input type="radio" name="filter" id="filter3" value="nivel" />
					Nível
				</label>
			</div>
			
			<input type="hidden" name="acao" id="acao" value="buscar"/>
			
		<div class="input-group">
			<input type="text" class="form-control" name="frase" id="frase" placeholder="Buscar curso">
			<div class="input-group-btn"  >
				<span class="input-group-btn">
					<button class="btn btn-default" onclick="mostrarBusca()">BUSCAR</button>											
				</span>
				
			</div>
		</div><!-- /input-group-btn -->
				
	</div><!-- /col-lg-6 -->
</div><!-- /row -->

<div class="col-lg-6" id="tabela">

</div>
