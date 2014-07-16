﻿<?php
	require_once dirname (__FILE__)."/library/library.php";
	session_start();
	if($_SESSION['logado'] != TRUE){
		header('Location: login.php');
		exit();
	}else if(!isset($_SESSION['nomeCompleto'])){
		header('Location: login.php');
		exit();
	}else if(!isset($_SESSION['idNivelServidor'])){
		header('Location: login.php');
		exit();
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Inicio</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/alternativeStyles.css" rel="stylesheet">
	</head>
	<body>
	<!-- Header -->
	<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
		<a class="navbar-brand" href="index.php"> <img src="img/logoUFFS.png" alt="logoUFFS" height="42"/> Cadastro de atividades dos docentes da UFFS</a>
		<div class="container">
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#">
                <i class="glyphicon glyphicon-user"></i> <?php echo $_SESSION['nomeCompleto'];?> <span class="caret"></span>
              </a>
              <ul id="g-account-menu" class="dropdown-menu" role="menu">              	
                <li><a href="sair.php">Sair</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div><!-- /container -->
    </div>
    <!-- /Header -->
    <!-- Principal -->  
    <div class="row">
      <div class="col-md-2"> <!-- 18 largura maxima mobile || 12 largura maxima desktop  (outros tamanhos sao configuraveis) -->
      	<?php listarMenu($_SESSION['idNivelServidor']);?>
      </div>
      <div class="col-md-10">
          <!------------------------- area designinada para os iframe ----------------------------->
          <?php
			  	if(isset($_GET['i']) && $_GET['i'] == 'semPermissao')
				echo' <iframe name="iframe-tela-meio" src="semPermissao.php" height="1200px" width="100%" frameborder="0"></iframe>';
				else
				echo' <iframe name="iframe-tela-meio" src="inicio.php" height="1200px" width="100%" frameborder="0"></iframe>';
		   ?>          
          <!------------------------- area designinada para os iframe ----------------------------->      
      </div><!-- /col-md-10 -->
    </div><!-- /row -->
    <!-- /Principal -->
  
 	<!--<footer class="text-center">Universidade Federal da Fronteira Sul - <a href="http://www.uffs.edu.br"><strong>UFFS</strong></a></footer>	-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/validateMask.js"></script>
  </body>
</html>
