<?php
	require_once dirname (__FILE__)."/library/library.php";
	session_start();
	session_destroy();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="img/uffs.ico">
		<title>Login</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/alternativeStyles.css" rel="stylesheet">
		<link href="css/login.css" rel="stylesheet">
	</head>
  <body>
    <div id="top-nav" class="navbar navbar-inverse navbar-static-top">
    <a class="navbar-brand" href="login.php"> <img src="img/logoUFFS.png" alt="logoUFFS" height="42"/> Cadastro de atividades dos docentes da UFFS</a>
      <div class="container">
        <div class="navbar-collapse collapse">

        </div>
      </div><!-- /container -->
    </div>
    <?php
		
		echo '<div class="fixada">';
		listarServidor();
		echo '</div>';
		
		echo '<div class="alerta">';
		if(isset($_SESSION['error']) && $_SESSION['error']==5){
			echo '<div class="alert alert-danger alert-dismissable text-center">';
			echo '	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
			echo '	  <strong>Erro!</strong> Senha ou usuario incorretos.';
			echo '</div>';
		}
		echo '</div>';
		
	?>
    
    <div class="container">    

      <form class="form-signin" role="form" action="validaLogin.php" method="post">
        <h2 class="form-signin-heading">Cadastro de atividades dos docentes da UFFS</h2>
        <input type="user" class="form-control" name="user" placeholder="Siape ou Email" required autofocus>
        <input type="password" class="form-control" name="pass" placeholder="Senha" required>
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Lembrar-me
        </label>
        <button class="btn btn-lg btn-success btn-block" type="submit">Continuar</button>
      </form>            

    </div> <!-- /container -->
	
    <hr>
	<footer class="text-center">Universidade Federal da Fronteira Sul - <a href="http://www.uffs.edu.br"><strong>UFFS</strong></a></footer>	
  </body>
</html>
