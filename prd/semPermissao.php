<?php
	session_start();
	if($_SESSION['logado'] != TRUE){
		header('Location: login.php');
	}
	if(!isset($_SESSION['idNivelServidor'])){//verifica se existe um servidor passando por SESSION
		header('Location: login.php');
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
            <li class="active">Sem permissão
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">           
        <div class="panel-body">
            <div class='alert alert-danger alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <strong>Sem premisão!</strong> Atenção você não tem permissão para acessar esta área.
              </br></br></br><strong>Em caso de dúvida contate o administrador.</strong>
            </div>
        </div><!-- /panel-body -->                
      </div><!-- /col-md-12 -->                 
    </div><!-- /row --> 
    <!-- /Principal -->
</html>