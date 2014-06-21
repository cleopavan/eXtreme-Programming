<?php
	require_once dirname (__FILE__)."/library/library.php";
	session_start();
	if($_SESSION['logado'] != TRUE){
		header('Location: login.php');
	}
	if($_SESSION['idNivelServidor'] != 0){
		header('Location: semPermissao.php');
	}
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="iso-8859-1"> <!-- charset="utf-8">-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
              <?php
			  if($_SESSION['idNivelServidor'] == 0)
                echo '<li><a href="index.php">Inicio</a></li>';
				?>
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
      <div class="col-md-2"> <!-- 18 largura maxima mobile || 12 largura maxima desktop  (outros tamanhos são configuraveis) -->
      	<div class="list-group-success">
          <a href="index.php" class="list-group-item list-group-item-success leftt">Inicio</a>		
          <a href="sair.php" class="list-group-item leftt">Sair</a>
        </div>        
      </div>
      <div class="col-md-10">
          <!------------------------- área designinada para os iframe ----------------------------->
          <iframe name="iframe-tela-meio" src="inicioControle.php" height="450px" width="100%" frameborder="0"></iframe>
          <!------------------------- área designinada para os iframe ----------------------------->      
      </div><!-- /col-md-10 -->
    </div><!-- /row -->
    <!-- /Principal -->
  
 	<footer class="text-center">Universidade Federal da Fronteira Sul - <a href="http://www.uffs.edu.br"><strong>UFFS</strong></a></footer>	

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>