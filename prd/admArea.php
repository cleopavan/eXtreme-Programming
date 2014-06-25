<?php
	require_once dirname (__FILE__)."/library/library.php";
	session_start();
	if($_SESSION['logado'] != TRUE){
		header('Location: login.php');
	}
	if($_SESSION['idNivelServidor'] != 1){/* implementar aqui os casos em que TAL NIVEL NÃO PODE VISUALIZAR ESTA PAGINA*/
		//header('Location: semPermissao.php');
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="iso-8859-1"> <!-- charset="utf-8">-->
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
            <li><a href="admArea.php">Administrar areas</a>
            </ul>
        </div><!-- /col-md-12 -->
    </div><!-- /row -->
    <div class="row">
        <div class="col-md-12">
        	<button class="btn btn-success" data-toggle="modal" data-target=".criar">Criar nova area</button>
            <button class="btn btn-danger" data-toggle="modal" data-target=".excluir">Excluir area existente</button>

            <div class="modal fade criar" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-sm">
                <div class="modal-content text-center">
                  <form action="cadastraArea.php" method="get"> 
                  	Nome area: ex(modelo1)</br><input type=text name=nome></br> 
                    Descricao area: ex(Modelo 1)</br><input type=text name=descricao></br>
                    Link area: ex(modelo1.php)</br><input type=text name=link></br>
                    <input type=submit value="Cadastrar">
                  </form>
                </div>
              </div>
            </div>
            <div class="modal fade excluir" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  ...
                </div>
              </div>
            </div>
            <?php
				listarAreas();
			?>    
        </div><!-- /col-md-12 -->                 
    </div><!-- /row --> 
<!-- /Principal -->
	

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</html>
