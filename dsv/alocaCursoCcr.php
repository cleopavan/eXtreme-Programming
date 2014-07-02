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
	if(acessoRecusado('alocaCursoCcr.php', $_SESSION['idNivelServidor']) == FALSE){/* Excessão no caso do servidor não ter acesso a esta área*/
		header('Location: index.php?i=semPermissao');
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8"> <!-- charset="utf-8">-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pagina modelo 1</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/alternativeStyles.css" rel="stylesheet">

  </head>
   
<!-- Principal -->    
    <div class="row">
        <div class="col-md-12">
            <ul class="breadcrumb">
            <li><a href="inicio.php">Inicio</a>
            <li class="active">Servidor / CursoCcr
            </ul>
        </div><!-- /col-md-12 -->
    </div><!-- /row -->
    <div class="row">
        <div class="col-md-12">
            <!-- CODIGO DEVE SER IMPLEMENTADO NESTA AREA -->
            <form class="form-horizontal" role="form">
            	<div class="form-group">
                	<label for="inputEmail3" class="col-sm-2 control-label">Siape</label>
                	<div class="col-sm-3">
                  	<input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                	</div>
                    <button type="submit" class="btn btn-default">Validar Siape</button>
              	</div>  
            
            	<div class="form-group">
                	<label for="inputEmail3" class="col-sm-2 control-label">Ano/Semestre</label>
                	<div class="col-sm-3">
                	  <select class="form-control" name="anoSemestre">
                  		  <option value="">Selecione</option>	
                    	  <option value="2014/1">2014/1</option>
                    	  <option value="2014/2">2014/2</option>
                    	  <option value="2015/1">2015/1</option>
                    	  <option value="2015/2">2015/2</option>
                    	  <option value="2016/1">2016/1</option>
                    	  <option value="2016/2">2016/2</option>
                    	  <option value="2017/1">2017/1</option>
                    	  <option value="2017/2">2017/2</option>
                    	</select>
                	</div>
              	</div> 
            
                          
              
              <div class="form-group">
                
              </div>
            </form>

		<!-- CODIGO DEVE SER IMPLEMENTADO NESTA AREA -->
        </div><!-- /col-md-12 -->                 
    </div><!-- /row --> 
<!-- /Principal -->
	

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</html>
