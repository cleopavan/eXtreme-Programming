<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Servidor</title>

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
		       <li><a href="#">Atalho para hor��rios</a></li>
		       <li><a href="#">Atalho para aloca����o</a></li>
		       <li><a href="sair.php">Sair</a></li>
		     </ul>
		   </li>
		 </ul>
	  </div>
	</div><!-- /container -->
</div><!-- /top-nav -->
<!-- /Header -->  

<!-- Dashboard -->    
<div class="row">
	<div class="col-md-2"> <!-- 18 largura maxima mobile || 12 largura maxima desktop  (outros tamanhos s��o configuraveis) -->
		<div class="list-group-success">
			<a href="inicio.php" class="list-group-item leftt">Inicio</a>
			<a href="servidor.php" class="list-group-item list-group-item-success leftt">Servidor</a>
			<a href="relatorios.php" class="list-group-item leftt">Relatórios</a>              
			<a href="#" class="list-group-item leftt">Curso</a>
			<a href="#" class="list-group-item leftt">Permissões</a>
			<a href="#" class="list-group-item leftt">Salas</a>
			<a href="#" class="list-group-item leftt">Horários</a>
			<a href="#" class="list-group-item leftt">Alocação</a>
			<a href="sair.php" class="list-group-item leftt">Sair</a>
		</div><!-- /list-group-success -->
	</div><!-- /col-md-2 -->
	<div class="col-md-10">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
				<li><a href="inicio.php">Inicio</a>
				<li><a href="servidor.php">Servidor</a>
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
					<div class="tab-pane active" id="inicial">
						<div class='alert alert-success alert-dismissable'>
						   <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						   <strong>Success!</strong> Alerta que um evento ocorreu com sucesso.
						</div>
					</div><!-- /tab-pane inicial -->
					<div class="tab-pane" id="buscar">
						<h4> Buscar servidor </h4>
						<div class="row">
							<div class="col-lg-6">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Buscar servidor">
									<div class="input-group-btn">
										<button class="btn btn-default" type="button">Buscar por</button>
										<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> <span class="caret"></span></button>
										<ul class="dropdown-menu pull-right">
											<li><a href="#">Siape</a></li>
											<li><a href="#">Nome</a></li>
											<li><a href="#">Email</a></li>
										</ul>
									</div><!-- /input-group-btn -->
								</div><!-- /input-group -->
							</div><!-- /col-lg-6 -->
						</div><!-- /row -->
					</div><!-- /tab-pane buscar -->

					<div class="tab-pane" id="cadastrar">			  
						<h4> Cadastrar servidor </h4>
						<form class="form-horizontal" role="form">
							<div class="form-group">
								<label for="inputSiape" class="col-sm-2 control-label">Siape</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="inputSiape" placeholder="Siape">
								</div>
							</div>
							<div class="form-group">
								<label for="inputNome" class="col-sm-2 control-label">Nome</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="inputNome" placeholder="Nome">
								</div>
							</div>
							<div class="form-group">
								<label for="inputSobrenome" class="col-sm-2 control-label">Sobrenome</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="inputSobrenome" placeholder="Sobrenome">
								</div>
							</div>
							<div class="form-group">
								<label for="inputEndereco" class="col-sm-2 control-label">Endereço</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="inputEndereco" placeholder="Endereço">
								</div>
							</div>					
							<div class="form-group">
								<label for="inputCidade" class="col-sm-2 control-label">Cidade</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="inputCidade" placeholder="Cidade">
								</div>
							</div>
							<div class="form-group">
								<label for="inputTelefone" class="col-sm-2 control-label">Telefone</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="inputTelefone" placeholder="Telefone">
								</div>
							</div>
							<div class="form-group">
								<label for="inputCelular" class="col-sm-2 control-label">Celular</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="inputCelular" placeholder="Celular">
								</div>
							</div>
							<div class="form-group">
								<label for="inputCargo" class="col-sm-2 control-label">Cargo</label>
								<div class="col-sm-3">
									<select class="form-control">
										<option>Cargo 1</option>
										<option>Cargo 2</option>
										<option>Cargo 3</option>
										<option>Cargo 4</option>
										<option>Cargo 5</option>
									</select>
								</div>
								<div class="col-sm-3">
									<a class="btn btn-success" type="submit">+</a>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-default">Cadastrar</button>
								</div>
							</div>
						</form>
					</div><!-- /tab-pane cadastrar -->
					
					<div class="tab-pane" id="editar">
						<div class="alert alert-warning alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times</button>
							<strong>Warning!</strong> Nada ainda foi programado nesta área.
						</div>			  
					</div><!-- /tab-pane editar -->
				</div><!-- /tab-content -->
			</div><!-- /col-md-12 -->                 
		</div><!-- /row --> 
	</div><!-- /col-md-10 -->
</div><!-- /row-->
<!-- /Dashboard -->    
  
<footer class="text-center">Universidade Federal da Fronteira Sul - <a href="http://www.uffs.edu.br"><strong>UFFS</strong></a></footer>	

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
  </body>
</html>
