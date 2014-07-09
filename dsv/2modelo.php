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
	if(acessoRecusado('2modelo.php', $_SESSION['idNivelServidor']) == FALSE){/* Excess�o no caso do servidor n�o ter acesso a esta �rea*/
		header('Location: index.php?i=semPermissao');
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="iso-8859-1"> <!-- charset="utf-8">-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pagina modelo 2</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/alternativeStyles.css" rel="stylesheet">

  </head>
   
<!-- Principal -->    
    <div class="row">
        <div class="col-md-12">
            <ul class="breadcrumb">
            <li><a href="inicio.php">Inicio</a>
            <li class="active">2 Modelo
            </ul>
        </div><!-- /col-md-12 -->
    </div><!-- /row -->
    <div class="row">
        <div class="col-md-12">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
            <li><a href="#buscar" data-toggle="tab">Buscar</a></li>
            <li><a href="#cadastrar" data-toggle="tab">Cadastrar</a></li>
            <li><a href="#editar" data-toggle="tab">Editar</a></li>
            </ul>
    
            <!-- Tab panes -->
            <div class="tab-content">                
                <div class="tab-pane" id="buscar">
                	<div class="tab-pane active" id="inicial">
                        <div class='alert alert-info alert-dismissable'>
                           <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                           <strong>Success!</strong> Está é apenas a pagina de modelo 1.
                        </div>
                	</div><!-- /tab-pane inicial -->                    
                </div><!-- /tab-pane buscar -->
    
                <div class="tab-pane" id="cadastrar">			  
                    <div class="tab-pane active" id="inicial">
                        <div class='alert alert-warning alert-dismissable'>
                           <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                           <strong>Success!</strong> Está é apenas a pagina de modelo 1.
                        </div>
                	</div><!-- /tab-pane inicial --> 
                </div><!-- /tab-pane cadastrar -->
                
                <div class="tab-pane" id="editar">
                   <div class="tab-pane active" id="inicial">
                        <div class='alert alert-danger alert-dismissable'>
                           <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                           <strong>Success!</strong> Está é apenas a pagina de modelo 1.
                        </div>
                	</div><!-- /tab-pane inicial -->  		  
                </div><!-- /tab-pane editar -->
                
            </div><!-- /tab-content -->
        </div><!-- /col-md-12 -->                 
    </div><!-- /row --> 
<!-- /Principal -->
	

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</html>
