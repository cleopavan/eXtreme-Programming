<?php
	require_once dirname (__FILE__)."/library/library.php";
	session_start();
	if($_SESSION['logado'] != TRUE){
		header('Location: login.php');
	}
	if($_SESSION['idNivelServidor'] != 1){/* implementar aqui os casos em que TAL NIVEL NÃO PODE VISUALIZAR ESTA PAGINA*/
		//header('Location: semPermissao.php');
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="iso-8859-1"> <!-- charset="utf-8">-->
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
            <li><a href="1modelo.php">1 Modelo</a>
            </ul>
        </div><!-- /col-md-12 -->
    </div><!-- /row -->
    <div class="row">
        <div class="col-md-12">
            <!-- CODIGO DEVE SER IMPLEMENTADO NESTA AREA -->
            <div class="tab-pane active" id="inicial">
                    <div class='alert alert-success alert-dismissable'>
                       <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                       <strong>Success!</strong> Está é apenas a pagina de modelo 1 (CODIGO DEVE SER IMPLEMENTADO NESTA AREA).
                    </div>
                </div><!-- /tab-pane inicial -->
        </div><!-- /col-md-12 -->                 
    </div><!-- /row --> 
<!-- /Principal -->
	

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</html>
