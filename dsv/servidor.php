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
	if(acessoRecusado('servidor.php', $_SESSION['idNivelServidor']) == FALSE){/* Excessão no caso do servidor não ter acesso a esta área*/
		header('Location: index.php?i=semPermissao');
	}
?>
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
   
<!-- Principal -->    
    <div class="row">
        <div class="col-md-12">
            <ul class="breadcrumb">
            <li><a href="inicio.php">Inicio</a>
            <li class="active">Servidor
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
                <?php
                if(isset($_POST["inputSiape"])){
                	 //insereServidor($_POST["inputSiape"],$_POST["inputNome"],$_POST["inputEmail"],$_POST["inputEndereco"],$_POST["inputCidade"],$_POST["inputTelefone"],$_POST["inputCelular"],$_POST["inputCargo"],$_POST["inputJornada"],$_POST["inputSituacao"],$_POST["inputDataEntrada"],$_POST["inputDataSaida"],$_POST["inputNivel"],$_POST["inputSubstituto"],$_POST["inputObservacao"]);
	                echo '<div class="tab-pane active" id="inicial">
	                    <div class="alert alert-success alert-dismissable">
	                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                       Cadastro realizado com sucesso.
	                    </div>
	                </div> ';
                }
                ?>
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
                    <form action="servidor.php" method="post" class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="inputSiape" class="col-sm-2 control-label">Siape</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="inputSiape" placeholder="Siape" name="inputSiape">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNome" class="col-sm-2 control-label">Nome</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="inputNome" placeholder="Nome"name="inputNome" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputSobrenome" class="col-sm-2 control-label">Sobrenome</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="inputSobrenome" placeholder="Sobrenome" name="inputSobrenome">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-3">
                                <input type="email" class="form-control" id="inputEmail" placeholder="exemplo@mail.com" name="inputEmail">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEndereco" class="col-sm-2 control-label">Endereço</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="inputEndereco" placeholder="Endereço" name="inputEndereco">
                            </div>
                        </div>					
                        <div class="form-group">
                            <label for="inputCidade" class="col-sm-2 control-label">Cidade</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="inputCidade" placeholder="Cidade" name="inputCidade">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputTelefone" class="col-sm-2 control-label">Telefone</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="inputTelefone" placeholder="Telefone" name="inputTelefone">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputCelular" class="col-sm-2 control-label">Celular</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="inputCelular" placeholder="Celular" name="inputCelular">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputCargo" class="col-sm-2 control-label">Cargo</label>
                            <div class="col-sm-3">
                                <select class="form-control" name="inputCargo">
                                    <?php listaCargos(); ?>
                                </select>
                            </div>
                            <div class="col-sm-3">
	                            <a href=""  data-toggle="modal" data-target=".maisCargo">  
	                            	<button class="btn btn-success" data-toggle="modal" data-target=".maisCargo">+</button>
	                            </a>
	                       </div>
                        </div>
                        <div class="form-group">
                            <label for="inputJornada" class="col-sm-2 control-label">Jornada</label>
                            <div class="col-sm-3">
                                <select class="form-control" name="inputJornada">
                                    <?php listaJornadas(); ?>
                                </select>
                            </div>
                         
                                <div class="col-sm-3">
	                            <a href=""  data-toggle="modal" data-target=".maisJornada">  
	                            	<button class="btn btn-success" data-toggle="modal" data-target=".maisJornada">+</button>
	                            </a>
	                       </div>
                           
                         </div>
                         <div class="form-group">
                            <label for="inputSituacao" class="col-sm-2 control-label">Situação</label>
                            <div class="col-sm-3">
                                <select class="form-control" name="inputSituacao">
                                    <?php listaSituacoes(); ?>
                                </select>
                            </div>
                           
                                <div class="col-sm-3">
	                            <a href=""  data-toggle="modal" data-target=".maisSituacao">  
	                            	<button class="btn btn-success" data-toggle="modal" data-target=".maisSituacao">+</button>
	                            </a>
	                       </div>
                         </div>
                         <div class="form-group">
                            <label for="inputDataEntrada" class="col-sm-2 control-label">Data de Entrada</label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control" id="inputDataEntrada" placeholder="Data de Entrada" name="inputDataEntrada">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputDataSaida" class="col-sm-2 control-label">Data de Saída</label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control" id="inputDataSaida" placeholder="Data de Saída" name="inputDataSaida">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNivel" class="col-sm-2 control-label">Nível</label>
                            <div class="col-sm-3">
                                <select class="form-control" name="inputNivel">
                                    <?php listaNiveis(); ?>
                                </select>
                            </div>
                            
                               <div class="col-sm-3">
	                            <a href=""  data-toggle="modal" data-target=".maisNivel">  
	                            	<button class="btn btn-success" data-toggle="modal" data-target=".maisNivel">+</button>
	                            </a>
	                       </div>
                            
                         </div>
                         <div class="form-group">
                            <label for="inputSubstituto" class="col-sm-2 control-label">Substituto</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="inputSubstituto" placeholder="Substituto" name="inputSubstituto">
                            </div>
                        </div>
                       <div class="form-group">
                            <label for="inputObservacao" class="col-sm-2 control-label">Observação</label>
                        	<div class="col-sm-3">
                        		<textarea type="text" class="form-control" id="Observacao" rows="3" name="inputObservacao"></textarea>
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
<!-- /Principal -->
	
<div class="modal fade maisCargo" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      ...
    </div>
  </div>
</div>

<div class="modal fade maisJornada" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      ...
    </div>
  </div>
</div>

<div class="modal fade maisSituacao" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      ...
    </div>
  </div>
</div>


<div class="modal fade maisNivel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      ...
    </div>
  </div>
</div>


	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
	<script src="js/validateMask.js"></script>
	<script type="text/javascript">
		  $(document).ready(function(){
		  	  $('#inputTelefone').mask('(99) 9999-9999');
		  	  $('#inputCelular').mask('(99) 9999-9999');
		  	  
		  	  
			  function validateField(field){
			  $('#'+field).focusout(function(){
			    if($('#'+field).val()==''){
			 	   $('#'+field).css('border-color', 'red');
			    }else{
			       $('#'+field).css('border', '1px solid #ccc');
			    }
			  }); 
		  	 }
		  	 validateField('inputNome');
		  	 validateField('inputSiape');
		  	 validateField('inputSobrenome');
		  	 validateField('inputEmail');
		  	 validateField('inputEndereco');
		  	 validateField('inputCidade');
		  	 validateField('inputDataEntrada');	  	 
		  });
	</script>
</html>
