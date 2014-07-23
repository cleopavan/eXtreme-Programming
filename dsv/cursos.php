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
	if(acessoRecusado('cursos.php', $_SESSION['idNivelServidor']) == FALSE){/* Excessão no caso do servidor não ter acesso a esta área*/
		header('Location: index.php?i=semPermissao');
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/alternativeStyles.css" rel="stylesheet">
		
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="cursos/myFunctions.js" ></script>

  </head>
  <body>
    
    <!-- Principal -->  
    <div class="row">
      <div class="col-md-12">
        <ul class="breadcrumb">
            <li><a href="inicio.php">Inicio</a>
            <li class="active">Cursos
        </ul>
      </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
            <li><a href="#buscar" data-toggle="tab">Buscar</a></li>
            <li><a href="#cadastrar" data-toggle="tab">Cadastrar</a></li>
            </ul>
			
			<?php 
			
			if(isset($_GET['e']))
			
			echo '<div class="tab-pane active" id="inicial">
                        <div class="alert alert-success alert-dismissable">
                           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        '.urldecode($_GET['e']).'
                     </div>
            </div><!-- /tab-pane inicial -->';
			
			?>
    
            <!-- Tab panes -->
            <div class="tab-content">                
                <div class="tab-pane" id="buscar">
                	<div class="tab-pane active" id="inicial">
                        <?php include("cursos/buscar.php"); ?>
                	</div><!-- /tab-pane inicial -->                    
                </div><!-- /tab-pane buscar -->
    
                <div class="tab-pane" id="cadastrar">			  
                    <div class="tab-pane active" id="inicial">
                        <?php include("cursos/cadastrar.php"); ?>
                	</div><!-- /tab-pane inicial --> 
                </div><!-- /tab-pane cadastrar -->
            </div><!-- /tab-content -->
        </div><!-- /col-md-12 -->                 
    </div><!-- /row --> 
    <!-- /Principal -->
	
	</body>
</html>
