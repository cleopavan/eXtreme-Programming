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
                if(isset($_POST["inputCadastraServidor"])){
                
	             	insereServidor($_POST["inputSiape"], $_POST["inputNome"], 
	                $_POST["inputSobrenome"], $_POST["inputEmail"],  $_POST["inputSenha"],
	                $_POST["inputEndereco"], $_POST["inputCidade"], $_POST["inputTelefone"], $_POST["inputCelular"],
	                $_POST["inputCargo"], $_POST["inputJornada"], $_POST["$inputSituacao"], $_POST["inputDataEntrada"], $_POST["inputDataSaida"],
	                $_POST["inputNivel"], $_POST["inputSubstituto"], $_POST["inputObservacao"]);
		            echo '<div class="tab-pane active" id="inicial">
	                    <div class="alert alert-success alert-dismissable">
	                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                       Cadastro realizado com sucesso
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
                                <input type="text" class="form-control" id="inputNome" placeholder="Nome"name="inputNome">
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
                            <label for="inputSenha" class="col-sm-2 control-label">Senha</label>
                            <div class="col-sm-3">
                                <input type="password" class="form-control" id="inputSenha" placeholder="senha" name="inputSenha">
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
                                <button type="submit" class="btn btn-default" id="btnCadastrar" name="inputCadastraServidor">Cadastrar</button>
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
	
<?php
	if(isset($_POST["btnCadastrarCargo"])){
		if(isset($_POST["inputAuxC"]) && strlen($_POST["inputAuxC"])>0){
			excluiCargo($_POST["inputAuxC"]);
		}
		$confere=insereCargo($_POST["inputNovoCargo"]);
		if($confere==0){
			echo '<div class="tab-pane active" id="inicial">
		           <div class="alert alert-danger alert-dismissable">
		              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		              Cargo já cadastrado
		           </div>
		         </div> ';
		}else{
			echo '<div class="tab-pane active" id="inicial">
		           <div class="alert alert-success alert-dismissable">
		              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		              Cargo cadastrado com sucesso
		           </div>
		         </div> ';
	   }
	}
	
	if(isset($_POST["btnCadastrarJornada"])){
		if(isset($_POST["inputAuxJ"]) && strlen($_POST["inputAuxJ"])>0){
			excluiJornada($_POST["inputAuxJ"]);
		}
		$resultado=insereJornada($_POST["inputNovaJornada"]);
		if($resultado==0){
			echo '<div class="tab-pane active" id="inicial">
		           <div class="alert alert-danger alert-dismissable">
		              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		              Jornada já cadastrada
		           </div>
		         </div> ';
		}else{
		echo '<div class="tab-pane active" id="inicial">
	           <div class="alert alert-success alert-dismissable">
	              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	              Jornada cadastrada com sucesso
	           </div>
	         </div> ';
	   }
	}
	
	if(isset($_POST["btnCadastrarSituacao"])){
		$confere=insereSituacao($_POST["inputNovaSituacao"]);
		if($confere==0){
			echo '<div class="tab-pane active" id="inicial">
		           <div class="alert alert-danger alert-dismissable">
		              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		              Situação já cadastrada
		           </div>
		         </div> ';
		}else{
		echo '<div class="tab-pane active" id="inicial">
	           <div class="alert alert-success alert-dismissable">
	              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	              Situação cadastrada com sucesso
	           </div>
	         </div> ';
		}
	}
	
	if(isset($_POST["btnCadastrarNivel"])){
		if(isset($_POST["inputAux"]) && strlen($_POST["inputAux"])>0){
			excluiNivel($_POST["inputAux"]);
		}
		$confere=insereNivel($_POST["inputNovoNivel"]);
		if($confere==0){
			echo '<div class="tab-pane active" id="inicial">
		           <div class="alert alert-danger alert-dismissable">
		              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		              Nível já cadastrada
		           </div>
		         </div> ';
		}else{
		echo '<div class="tab-pane active" id="inicial">
	           <div class="alert alert-success alert-dismissable">
	              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	              Nível cadastrado com sucesso
	           </div>
	         </div> ';
	    }
	}
	
	if(isset($_POST["btnExcluirNivel"])){
		excluiNivel($_POST["inputComboNivel"]);
		echo '<div class="tab-pane active" id="inicial">
	           <div class="alert alert-success alert-dismissable">
	              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	              Nível excluido com sucesso
	           </div>
	         </div> ';
	}
	
	if(isset($_POST["btnExcluirJornada"])){
		excluiJornada($_POST["inputJornada"]);
		echo '<div class="tab-pane active" id="inicial">
	           <div class="alert alert-success alert-dismissable">
	              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	              Jornada excluido com sucesso
	           </div>
	         </div> ';
	}
	
	if(isset($_POST["btnExcluirCargo"])){
		excluiCargo($_POST["inputCargo"]);
		echo '<div class="tab-pane active" id="inicial">
	           <div class="alert alert-success alert-dismissable">
	              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	              Cargo excluido com sucesso
	           </div>
	         </div> ';
	}
?>
	
	
<div class="modal fade maisCargo" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <form action="servidor.php" method="post" class="form-horizontal" role="form">   
       <div class="form-group">
          <div class="col-sm-4" style="left:36%;">
             <h3> Manutenção de Cargos </h3>
          </div>
       </div>
       
       <div class="form-group">
          <div class="col-sm-3" style="left:38%;">
              <select class="form-control" id="inputComboCargo" name="inputCargo">
                   <option>Cargos Cadastrados</option>
                   <?php listaCargos(); ?>
              </select>
           </div>
       </div> 
           
	       <div class="col-sm-3" style="left:47%;">
	         <div class="col-sm-offset-2 col-sm-10">
                   <button type="submit" class="btn btn-default" name="btnExcluirCargo">Excluir</button>
                </div>
	       </div>
	  </form>
	  <div class="col-sm-3" style="left:8%;">            
	          	<div class="col-sm-offset-2 col-sm-10">
                   <button type="submit" class="btn btn-default" id="btnEditarCargo" name="btnEditarCargo">Editar</button>
                </div>
	       </div>
	  </br>
  <form action="servidor.php" method="post" class="form-horizontal" role="form">                
      </br>     
     <div class="form-group">
       <div class="col-sm-3" style="left:42%;">
          <h3> Incluir Cargo </h3>
       </div>
     </div>
     <div class="form-group">
	   <div class="col-sm-4" style="left:35%;">
	   	  <input type="text" class="form-control" id="inputNovoCargo" placeholder="Insira o novo cargo" name="inputNovoCargo">
	   </div>
	 </div>
	 <input type="text" id="inputAuxC"  name="inputAuxC" style="display:none;">
	 <div class="form-group">
	   <div class="col-sm-3" style="left:30%;">            
		 <div class="col-sm-offset-2 col-sm-10" >
	       <button type="submit" class="btn btn-default" name="btnCadastrarCargo">Cadastrar</button>
	     </div>
	    </div>
		
		<div class="col-sm-3" style="left:29%;">            
		  <div class="col-sm-offset-2 col-sm-10" >
	        <button type="submit" class="btn btn-default" name="btnSair">Sair</button>
	      </div>
		</div>
      </div>
    </form>
	  
	 </div>
  </div>
</div>

<div class="modal fade maisJornada" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
     <form action="servidor.php" method="post" class="form-horizontal" role="form">   
       <div class="form-group">
          <div class="col-sm-4" style="left:36%;">
             <h3> Manutenção de Jornadas </h3>
          </div>
       </div>
       
       <div class="form-group">
          <div class="col-sm-3" style="left:38%;">
              <select class="form-control" id="inputComboJornada" name="inputJornada">
                   <option>Jonadas Cadastrados</option>
                  <?php listaJornadas(); ?>
              </select>
           </div>
       </div> 
           
	       <div class="col-sm-3" style="left:47%;">
	         <div class="col-sm-offset-2 col-sm-10">
                   <button type="submit" class="btn btn-default" name="btnExcluirJornada">Excluir</button>
                </div>
	       </div>
	  </form>
	  <div class="col-sm-3" style="left:8%;">            
	          	<div class="col-sm-offset-2 col-sm-10">
                   <button type="submit" class="btn btn-default" id="btnEditarJornada" name="btnEditarJornada">Editar</button>
                </div>
	       </div>
	  </br>
  <form action="servidor.php" method="post" class="form-horizontal" role="form">                
      </br>     
     <div class="form-group">
       <div class="col-sm-3" style="left:42%;">
          <h3> Incluir Jornada </h3>
       </div>
     </div>
     <div class="form-group">
	   <div class="col-sm-4" style="left:35%;">
	   	  <input type="text" class="form-control" id="inputNovaJornada" placeholder="Insira a nova jornada" name="inputNovaJornada">
	   </div>
	 </div>
	 <input type="text" id="inputAuxJ"  name="inputAuxJ" style="display:none;">
	 <div class="form-group">
	   <div class="col-sm-3" style="left:30%;">            
		 <div class="col-sm-offset-2 col-sm-10" >
	       <button type="submit" class="btn btn-default" name="btnCadastrarJornada">Cadastrar</button>
	     </div>
	    </div>
		
		<div class="col-sm-3" style="left:29%;">            
		  <div class="col-sm-offset-2 col-sm-10" >
	        <button type="submit" class="btn btn-default" name="btnSair">Sair</button>
	      </div>
		</div>
      </div>
    </form>
    </div>
  </div>
</div>

<div class="modal fade maisSituacao" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="servidor.php" method="post" class="form-horizontal" role="form">   
       <div class="form-group">
          <div class="col-sm-4" style="left:36%;">
             <h3> Manutenção de Situações </h3>
          </div>
       </div>
       
       <div class="form-group">
          <div class="col-sm-3" style="left:38%;">
              <select class="form-control" id="inputComboSituacao" name="inputSituacao">
                   <option>Situações Cadastrados</option>
                   <?php listaSituacoes(); ?>
              </select>
           </div>
       </div> 
           
	       <div class="col-sm-3" style="left:47%;">
	         <div class="col-sm-offset-2 col-sm-10">
                   <button type="submit" class="btn btn-default" name="btnExcluirSituacao">Excluir</button>
                </div>
	       </div>
	  </form>
	  <div class="col-sm-3" style="left:8%;">            
	          	<div class="col-sm-offset-2 col-sm-10">
                   <button type="submit" class="btn btn-default" id="btnEditarSituacao" name="btnEditarSituacao">Editar</button>
                </div>
	       </div>
	  </br>
  <form action="servidor.php" method="post" class="form-horizontal" role="form">                
      </br>     
     <div class="form-group">
       <div class="col-sm-3" style="left:42%;">
          <h3> Incluir Situacão </h3>
       </div>
     </div>
     <div class="form-group">
	   <div class="col-sm-4" style="left:35%;">
	   	  <input type="text" class="form-control" id="inputNovaSituacao" placeholder="Insira o nova situação" name="inputNovaSituacao">
	   </div>
	 </div>
	 <div class="form-group">
	   <div class="col-sm-3" style="left:30%;">            
		 <div class="col-sm-offset-2 col-sm-10" >
	       <button type="submit" class="btn btn-default" name="btnCadastrarSituacao">Cadastrar</button>
	     </div>
	    </div>
		
		<div class="col-sm-3" style="left:29%;">            
		  <div class="col-sm-offset-2 col-sm-10" >
	        <button type="submit" class="btn btn-default" name="btnSair">Sair</button>
	      </div>
		</div>
      </div>
    </form>
    </div>
  </div>
</div>


<div class="modal fade maisNivel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="servidor.php" method="post" class="form-horizontal" role="form">   
       <div class="form-group">
          <div class="col-sm-4" style="left:36%;">
             <h3> Manutenção de Niveis </h3>
          </div>
       </div>
       
       <div class="form-group">
          <div class="col-sm-3" style="left:38%;">
              <select class="form-control" id="inputComboNivel" name="inputComboNivel">
                   <option>Niveis Cadastrados</option>
                   <?php listaNiveis(); ?>
              </select>
           </div>
       </div> 
	       <div class="col-sm-3" style="left:47%;">
	         <div class="col-sm-offset-2 col-sm-10">
                   <button type="submit" class="btn btn-default" name="btnExcluirNivel">Excluir</button>
                </div>
	       </div>
	  </form>
	  <div class="col-sm-3" style="left:8%;">            
	          	<div class="col-sm-offset-2 col-sm-10">
                   <button class="btn btn-default" id="btnEditarNivel" name="btnEditarNivel">Editar</button>
                </div>
	       </div>
	  </br>
  <form action="servidor.php" method="post" class="form-horizontal" role="form">                
      </br>     
     <div class="form-group">
       <div class="col-sm-3" style="left:42%;">
          <h3> Incluir Nível </h3>
       </div>
     </div>
     <div class="form-group">
	   <div class="col-sm-4" style="left:35%;">
	   	  <input type="text" class="form-control" id="inputNovoNivel" placeholder="Insira o novo nível" name="inputNovoNivel">
	   </div>
	 </div>
	 <input type="text" id="inputAux"  name="inputAux" style="display:none;">
	 <div class="form-group">
	   <div class="col-sm-3" style="left:30%;">            
		 <div class="col-sm-offset-2 col-sm-10" >
	       <button type="submit" class="btn btn-default" id="btnCadastrarNivel" name="btnCadastrarNivel">Cadastrar</button>
	     </div>
	    </div>
		
		<div class="col-sm-3" style="left:29%;">            
		  <div class="col-sm-offset-2 col-sm-10" >
	        <button type="submit" class="btn btn-default" name="btnSair">Sair</button>
	      </div>
		</div>
      </div>
    </form>
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
		  	  $('#btnEditarNivel').click(function(){ $('#inputNovoNivel').val($('#inputComboNivel').val()); });
		  	  $('#btnEditarNivel').click(function(){ $('#inputAux').val($('#inputComboNivel').val()); });
		  	  
		  	  $('#btnEditarSituacao').click(function(){ $('#inputNovaSituacao').val($('#inputComboSituacao').val()); });
		  	  
		  	  
		  	  $('#btnEditarCargo').click(function(){ $('#inputNovoCargo').val($('#inputComboCargo').val()); });
		  	  $('#btnEditarCargo').click(function(){ $('#inputAuxC').val($('#inputComboCargo').val()); });
		  	  
		  	  $('#btnEditarJornada').click(function(){ $('#inputNovaJornada').val($('#inputComboJornada').val()); });
		  	  $('#btnEditarJornada').click(function(){ $('#inputAuxJ').val($('#inputComboJornada').val()); });

		  	  $('#inputTelefone').mask('(99) 9999-9999');
		  	  $('#inputCelular').mask('(99) 9999-9999');
		  	  
		  	  
			  function validateField(field){
			  $('#'+field).focusout(function(){
			    if($('#'+field).val().length < 2){
			 	   $('#'+field).css('border-color', 'red');
			 	   alert("Campo deve ter mais que 2 caracteres");
			 	   $('#btnCadastrar').attr("disabled", "disabled");
			    }else{
			       $('#'+field).css('border', '1px solid #ccc');
			       $('#btnCadastrar').removeAttr("disabled");
			    }
			  }); 
		  	 }
		  	 validateField('inputNome');
		  	 validateField('inputSiape');
		  	 validateField('inputSobrenome');
		  	 validateField('inputEmail');
		  	 validateField('inputSenha');
		  	 validateField('inputEndereco');
		  	 validateField('inputCidade');
		  	 validateField('inputDataEntrada');	  	 
		  });
	</script>
</html>
