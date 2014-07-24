<?php
	include("/library/library.php");
	$library = new library();
	session_start();
	if($_SESSION['logado'] != TRUE){
		header('Location: login.php');
	}
	if(!isset($_SESSION['idNivelServidor'])){//verifica se existe um servidor passando por SESSION
		header('Location: login.php');
	}
	//@parametros (string, integer);
	//@parametros (nome da pagina, id do nivel do servidor)
	if($library->acessoRecusado('admArea.php', $_SESSION['idNivelServidor']) == FALSE){/* Excessao no caso do servidor não ter acesso a esta area*/
		header('Location: index.php?i=semPermissao');
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8"> <!-- charset="utf-8">-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administrar áreas</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/alternativeStyles.css" rel="stylesheet">

  </head>
   
<!-- Principal -->    
    <div class="row">
        <div class="col-md-12">
            <ul class="breadcrumb">
            <li><a href="inicio.php">Inicio</a>
            <li class="active">Administrar areas
            </ul>
        </div><!-- /col-md-12 -->
    </div><!-- /row -->
    <div class="row">
        <div class="col-md-12">
        	<button class="btn btn-success" data-toggle="modal" data-target=".criar">Criar nova area</button>
            <button class="btn btn-danger" data-toggle="modal" data-target=".excluir">Excluir area existente</button>

            <div class="modal fade criar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content"></br>
		             <div class="tab-pane" id="cadastrar">	
		                 <form class="form-horizontal" role="form" action="cadastraArea.php" method="get">
		                     <div class="form-group">
		                         <label for="inputNome" class="col-sm-offset-2 col-sm-2 control-label">Nome da area</label>
		                         <div class="col-sm-3">
		                             <input type="text" class="form-control" id="inputNome" name=nome placeholder="exemplo: modelo1">
		                         </div>
		                     </div>
                           <div class="form-group">
		                          <label for="inputDescricao" class="col-sm-offset-2 col-sm-2 control-label">Descricao da area</label>
		                         <div class="col-sm-3">
		                             <input type="text" class="form-control" id="inputDescricao" name=descricao placeholder="exemplo: Modelo 1">
		                         </div>
		                     </div>
                           <div class="form-group">
		                         <label for="inputLink" class="col-sm-offset-2 col-sm-2 control-label">Link da area</label>
		                         <div class="col-sm-3">
		                             <input type="text" class="form-control" id="inputLink" name=link placeholder="exemplo: modelo1.php">
		                         </div>
		                     </div>
		                     <div class="form-group">
		                         <div class="col-sm-offset-3 col-sm-10">
		                             <button type="submit" class="btn btn-success">Cadastrar</button>
		                         </div>
                           </div>
		                  </form>
		             </div><!-- /tab-pane cadastrar -->    
                
                <!--
                  <form action="cadastraArea.php" method="get"> 
                  	Nome area: ex(modelo1)</br><input type=text name=nome></br> 
                    Descricao area: ex(Modelo 1)</br><input type=text name=descricao></br>
                    Link area: ex(modelo1.php)</br><input type=text name=link></br>
                    <input type=submit value="Cadastrar">
                  </form>
                  -->
                </div>
              </div>
            </div><!-- /modal fade criar -->
            <div class="modal fade excluir" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content"></br>
                  <div class="tab-pane" id="excluir">	
		                 <form class="form-horizontal" role="form" action="#" method="get">
		                     <div class="form-group">
		                         <label for="inputNome" class="col-sm-offset-2 col-sm-2 control-label">Selecione: </label>
		                         <div class="col-sm-3">
		                         	<select name="mydropdown">
											<option value="op1">Op 1</option>
											<option value="op2">Op 2</option>
											<option value="op3">Op 3</option>
											</select>
		                         </div>
		                     </div>
		                     <div class="form-group">
		                         <div class="col-sm-offset-3 col-sm-10">
		                             <button type="submit" class="btn btn-danger">Excluir</button>
		                         </div>
                           </div>
		                     </form>
		             </div><!-- /tab-pane cadastrar -->   
                </div>
              </div>
            </div><!-- /modal fade excluir -->
            <?php
				$library->listarAreas();
			?>    
        </div><!-- /col-md-12 -->                 
    </div><!-- /row --> 
<!-- /Principal -->
	

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</html>
