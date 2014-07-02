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
        <div class="row">
          <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a >Inicio</a>
            </ul>
          </div>
        </div><!-- /row -->
        <div class="row">
          <div class="col-md-12">       
            <div class="panel-body">
                <h1>Bem-Vindo</h1>
            </div><!-- /panel-body -->                
          </div><!-- /col-md-12 -->   
        </div><!-- /row -->
</html>