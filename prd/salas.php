<?php
	session_start();
	if($_SESSION['logado'] != TRUE){
		header('Location: login.php');
	}
	if($_SESSION['idNivelServidor'] != 1){/* implementar aqui os casos em que TAL NIVEL NÃO PODE VISUALIZAR ESTA PAGINA*/
		header('Location: semPermissao.php');
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

  </head>
    
    <!-- Principal -->  
    <div class="row">
      <div class="col-md-12">
        <ul class="breadcrumb">
            <li><a href="inicio.php">Inicio</a>
            <li><a href="salas.php">Salas</a>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">           
        <div class="panel-body">
            <div class='alert alert-warning alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <strong>Warning!</strong> Nada ainda foi programado nesta área.
            </div>
        </div><!-- /panel-body -->                
      </div><!-- /col-md-12 -->                 
    </div><!-- /row --> 
    <!-- /Principal -->
</html>