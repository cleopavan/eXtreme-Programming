<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Relatórios</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/alternativeStyles.css" rel="stylesheet">

  </head>
  <body>
    
  <!-- Header -->
    <div id="top-nav" class="navbar navbar-inverse navbar-static-top">
    <a class="navbar-brand" href="inicio.php"> <img src="img/logoUFFS.png" alt="logoUFFS" height="42"/> Cadastro de atividades dos docentes da UFFS</a>
      <div class="container">
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#">
                <i class="glyphicon glyphicon-user"></i> Claunir Pavan <span class="caret"></span>
              </a>
              <ul id="g-account-menu" class="dropdown-menu" role="menu">
                <li><a href="#">Painel de controle</a></li>
                <li><a href="#">Atalho para horários</a></li>
                <li><a href="#">Atalho para alocação</a></li>
                <li><a href="sair.php">Sair</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div><!-- /container -->
    </div>
    <!-- /Header -->  
  
    <div class="row">
      <div class="col-md-2 topp"> <!-- 18 largura maxima mobile || 12 largura maxima desktop  (outros tamanhos são configuraveis) -->
        <div class="list-group-success">
          <a href="inicio.php" class="list-group-item leftt">Inicio</a>
          <a href="servidor.php" class="list-group-item leftt">Servidor</a>
          <a href="relatorios.php" class="list-group-item list-group-item-success leftt">Relatórios</a>              
          <a href="#" class="list-group-item leftt">Curso</a>
          <a href="#" class="list-group-item leftt">Permissões</a>
          <a href="#" class="list-group-item leftt">Salas</a>
          <a href="#" class="list-group-item leftt">Horários</a>
          <a href="#" class="list-group-item leftt">Alocação</a>
          <a href="sair.php" class="list-group-item leftt">Sair</a>
        </div>
      </div>
      <iframe src="inicio.php" height="380px" width="1130px" frameborder="0"></iframe>
      <div class="col-md-10 topp">
        <div class="row">
          <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="inicio.php">Inicio</a>
                <li><a href="relatorios.php">Relatórios</a>
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
            </div>                
          </div>
        </div>
      </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
