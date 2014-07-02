<?php
	require_once dirname (__FILE__)."/library/library.php";
	session_start();
	if($_SESSION['logado'] != TRUE){
		header('Location: login.php');
	}
	if(!isset($_SESSION['idNivelServidor'])){//verifica se existe um servidor passando por SESSION
		header('Location: login.php');
	}
	//@parametros (string, integer);
	//@parametros (nome da pagina, id do nivel do servidor)
	if(acessoRecusado('alocaCursoCcr.php', $_SESSION['idNivelServidor']) == FALSE){/* Excessão no caso do servidor não ter acesso a esta área*/
		header('Location: index.php?i=semPermissao');
	}
	if(isset($_POST['desfazer'])){
		$_SESSION['siape'] = NULL;
		$_SESSION['servidorSiape'] = NULL;
	}
	if(isset($_POST['validar'])){
		if(isset($_POST['siape']) && !isset($_SESSION['siape'])){
			//validarsiape
			$_SESSION['siape'] = $_POST['siape'];
			$_SESSION['servidorSiape'] = "Teste Teste";
		}
		elseif(isset($_POST['siape']) && isset($_SESSION['siape'])){
			//validarsiape
			$_SESSION['siape'] = $_POST['siape'];
			$_SESSION['servidorSiape'] = "Teste Teste";
		}
	}
		
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8"> <!-- charset="utf-8">-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pagina modelo 1</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/alternativeStyles.css" rel="stylesheet">

  </head>
   
<!-- Principal -->    
    <div class="row">
        <div class="col-md-12">
            <ul class="breadcrumb">
            <li><a href="inicio.php">Inicio</a>
            <li class="active">Servidor / CursoCcr
            </ul>
        </div><!-- /col-md-12 -->
    </div><!-- /row -->
    <div class="row">
        <div class="col-md-12">
            <!-- CODIGO DEVE SER IMPLEMENTADO NESTA AREA -->
            <form class="form-horizontal" role="form" enctype="multipart/form-data" method="post" action="alocaCursoCcr.php">
            	<div class="form-group">
                	<label for="inputSiape" class="col-sm-2 control-label">Siape</label>
                	<div class="col-sm-3">
                  	<input name="siape" <?php if(isset($_SESSION['siape'])) echo "value='".$_SESSION['siape']."'"; ?> type="number" class="form-control" id="inputSiapeText" placeholder="Siape">
                	</div>
                    <?php
						if(isset($_SESSION['servidorSiape'])){
							echo "<label for='siapeValidado' class='col-sm-2 control-label'>".$_SESSION['servidorSiape']." ativo!</label>";
							echo "<button name='desfazer' value='1' type='submit' class='btn btn-default'>Desfazer</button>";
						}
						else{
							echo "<button name='validar' value='1' type='submit' class='btn btn-default'>Validar Siape</button>";
						}
                    ?>
              	</div>  
				
            	<div class="form-group">
                	<label for="inputEmail3" class="col-sm-2 control-label">Ano/Semestre</label>
                	<div class="col-sm-3">
						<?php 
							if(isset($_SESSION['siape'])){
								echo '<select class="form-control" name="anoSemestre">';
							}
							else{
								echo '<select class="form-control" name="anoSemestre" disabled="disabled">';
							}
						?>
                  		  <option value="">Selecione</option>	
                    	  <option value="2014/1">2014/1</option>
                    	  <option value="2014/2">2014/2</option>
                    	  <option value="2015/1">2015/1</option>
                    	  <option value="2015/2">2015/2</option>
                    	  <option value="2016/1">2016/1</option>
                    	  <option value="2016/2">2016/2</option>
                    	  <option value="2017/1">2017/1</option>
                    	  <option value="2017/2">2017/2</option>
                    	</select>
                	</div>
              	</div>
              	<div class="form-group">
					<label for="curso" class="col-sm-2 control-label">Curso</label>
                	<div class="col-sm-3">
						<?php 
							if(isset($_SESSION['siape'])){
								echo '<select class="form-control" name="codCurso">';
							}
							else{
								echo '<select class="form-control" name="codCurso" disabled="disabled">';
							}
						?>
                  		  <option value="">Selecione</option>	
                    	  <option value="1001">Ciência da Computação</option>
                    	  <option value="1002">Enfermagem</option>
                    	  <option value="1003">Agronomia</option>
                    	  <option value="1004">Matemática</option>
                    	</select>
                    </div>
              	</div>
              	<div class="form-group">
					<label for="ccr" class="col-sm-2 control-label">CCR</label>
                	<div class="col-sm-3">
						<?php 
							if(isset($_SESSION['siape'])){
								echo '<select class="form-control" name="codCcr">';
							}
							else{
								echo '<select class="form-control" name="codCcr" disabled="disabled">';
							}
						?>
                  		  <option value="">Selecione</option>	
                    	  <option value="100">Redes</option>
                    	  <option value="101">Computação Gráfica</option>
                    	  <option value="200">Leitura e Produção Textual I</option>
                    	  <option value="201">Leitura e Produção Textual II</option>
                    	</select>
                    </div>   
              	</div>
              	<div class="col-sm-4">
					<button name='alocar' value='1' type='submit' class='btn btn-default'>Alocar</button>
				</div>
            </form>

		<!-- CODIGO DEVE SER IMPLEMENTADO NESTA AREA -->
        </div><!-- /col-md-12 -->                 
    </div><!-- /row --> 
<!-- /Principal -->
	

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</html>
