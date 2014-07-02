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
	if(acessoRecusado('ccr.php', $_SESSION['idNivelServidor']) == FALSE){/* Excessão no caso do servidor não ter acesso a esta área*/
		header('Location: index.php?i=semPermissao');
	}
	if(isset($_SESSION['sucessInsert']) && $_SESSION['sucessInsert']){
		echo "<div class='alert alert-success alert-dismissable'>
					   <button type='button' class='close' onClick='updateSession()' data-dismiss='alert' aria-hidden='true'>&times;</button>
					   <strong>Sucesso!</strong>
					</div> ";
	}
	
	if (isset($_SESSION['erro']) && $_SESSION['erro']){
		echo "<div class='alert alert-danger alert-dismissable'>
					   <button type='button' class='close' onClick='updateSession()' data-dismiss='alert' aria-hidden='true'>&times;</button>
					   <strong>Erro!</strong>
					</div> ";
	}
	
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ccr</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/alternativeStyles.css" rel="stylesheet">

  </head>
   
<!-- Principal -->    
    <div class="row">
        <div class="col-md-12">
            <ul class="breadcrumb">
            <li><a href="inicio.php">Inicio</a>
            <li class="active">Ccr
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
                  
                </div><!-- /tab-pane inicial -->
                <div class="tab-pane" id="buscar">
                    <h4> Buscar CCR </h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Buscar ccr">
                                <div class="input-group-btn" >
                                    <button class="btn btn-default" type="button" >Buscar por</button>
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
                    <h4> Cadastrar ccr </h4>
                    <form action="cadastraCcr.php" method="post" class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="inputCod" class="col-sm-2 control-label">Código</label>
                            <div class="col-sm-3">
                                <input type="text" name="cod" class="form-control" id="inputCod" placeholder="Código">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNome" class="col-sm-2 control-label">Nome</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="nome" id="inputNome" placeholder="Nome">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputCH" class="col-sm-2 control-label">Carga Horária</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="ch" id="inputCH" placeholder="Carga Horária">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputDominio" class="col-sm-2 control-label">Domínio</label>
                            <div class="col-sm-3">
                                <select class="form-control" name="dominio">
                                    <option>Comum</option>
                                    <option>Específico</option>
                                    <option>Conexo</option>
								</select>
                            </div>
                            <div class="col-sm-3">
                                <a class="btn btn-success" type="submit">+</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default" >Cadastrar</button>
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
<!-- /Principal -->
	

	<script>
		
		function updateSession(){
			<?php
				$_SESSION['sucessInsert'] = false;
				$_SESSION['erro'] = false;
			?>
		}
		
	</script>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</html>
