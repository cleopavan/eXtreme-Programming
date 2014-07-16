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
	if(isset($_POST['nivel'])){
		$_SESSION['nivel'] = $_POST['nivel'];
	}
	if(isset($_POST['curso'])){
		$_SESSION['curso'] = $_POST['curso'];
		$_SESSION['ccr'] = NULL;
	}
	if(isset($_POST['ccr'])){
		$_SESSION['ccr'] = $_POST['ccr'];
	}
	if(isset($_POST['anoSemestre'])){
		$_SESSION['anoSemestre'] = $_POST['anoSemestre'];
	}
	if(isset($_POST['desfazer'])){
		$_SESSION['siape'] = NULL;
		$_SESSION['servidorSiape'] = NULL;
		$_SESSION['nivel'] = NULL;
		$_SESSION['ccr'] = NULL;
		$_SESSION['anoSemestre'] = NULL;
		$_SESSION['obs'] = NULL;
	}
	if(isset($_POST['validar'])){
		if(isset($_POST['siape']) && !isset($_SESSION['siape'])){
			$servidor = mostraServidorSelecionado($_POST['siape']);
			
			$_SESSION['siape'] = $servidor['siape'];
			$_SESSION['servidorSiape'] = $servidor['nome'] ." ". $servidor['sobrenome'];
		}
	}
	if(isset($_POST['alocar'])){
		//$deuCerto = constroiDadosInsertServidorCursoCcr($_SESSION['anoSemestre'],$_SESSION['curso'],$_SESSION['ccr'],$_SESSION['siape'],$_SESSION['obs']);
		$_SESSION['deuCerto'] = 1;
		$_SESSION['siape'] = NULL;
		$_SESSION['servidorSiape'] = NULL;
		$_SESSION['nivel'] = NULL;
		$_SESSION['ccr'] = NULL;
		$_SESSION['anoSemestre'] = NULL;
		$_SESSION['obs'] = NULL;
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
        <div class="col-md-12"> <!-- mudar para col-md-12-->
            <ul class="breadcrumb">
            <li><a href="inicio.php">Inicio</a>
            <li class="active">Servidor / CursoCcr
            </ul>
        </div><!-- /col-md-12 -->
    </div><!-- /row -->
    <div class="row">
        <div class="col-md-12"> <!-- mudar para col-md-12-->      
            <!-- CODIGO DEVE SER IMPLEMENTADO NESTA AREA -->
            <!-- Nav tabs -->
            
				<ul class="nav nav-tabs" role="tablist">
				  <li <?php if(isset($_SESSION['aba'])){}else echo 'class="active"'; ?> >
                  <a href="#alocar" role="tab" data-toggle="tab">Alocar servidor ao Ccr</a></li>
				  <li <?php if(isset($_SESSION['aba']) && $_SESSION['aba'] != 3) echo 'class="active"'; ?> >
                  <a href="#listServidor" role="tab" data-toggle="tab">Listar servidores alocados</a></li>
				  <li <?php if(isset($_SESSION['aba']) && $_SESSION['aba'] != 2) echo 'class="active"'; ?> >
                  <a href="#listCcr" role="tab" data-toggle="tab">Listar Ccrs alocadas</a></li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
				  <div class="tab-pane <?php if(isset($_SESSION['aba'])){}else echo 'active'; ?> " id="alocar"></br>				  					   
										  	
							<div class="form-group">
							 	<label for="inputSiape" class="col-sm-4 text-center">Servidor <hr></label>
							 	<button class="btn btn-success col-sm-4" data-toggle="modal" data-target=".bs-example-modal-lg">Buscar servidor</button>
							 	<label for="inputSiape" class="col-sm-4 text-center">CursoCcr <hr></label>
							</div>
							<form action="alocaCursoCcr.php" class="form-horizontal" role="form" enctype="multipart/form-data" method="post">
							
							<div class="row">
								<div class="col-sm-4"><!-- /col-sm-4 1º -->
									<div class="col-sm-7">
										<input type="number" name="siape" <?php if(isset($_SESSION['siape'])) echo "value='".$_SESSION['siape']."'"; ?> class="form-control" id="inputSiape" placeholder="Siape">
									</div>
										<?php						 	
											if(isset($_SESSION['servidorSiape'])){
												echo "<button name='desfazer' value='1' type='submit' class='btn btn-default'>Desfazer</button>";
											}
											else{
												echo "<button name='validar' value='1' type='submit' class='btn btn-default'>Validar Siape</button>";
											}
										?>
									
								</div>
								<div class="col-sm-4"><!-- /col-sm-4 2º --></div>
								<div class="col-sm-4">
									<?php 
										if(isset($_SESSION['siape'])){
											echo "<select class='form-control' name='nivel' onchange='this.form.submit()'>";
										}
										else{
											echo "<select class='form-control' name='nivel' disabled='disabled'>";
										}
									
										echo "<option value=''>Selecione: Nivel curso</option>";
										$lista = mostraTodosNiveisCurso();
										$i = 0;
										while($lista[$i] != NULL){
											if(!isset($_SESSION['nivel'])){
												echo "<option value='".$lista[$i]['idNivelCurso']."'>".$lista[$i]['idNivelCurso']." - ". $lista[$i]['nomeNivelCurso']."</option>";
												$i++;
											}
											else{
												if($_SESSION['nivel'] == $lista[$i]['idNivelCurso']){
													echo "<option value='".$lista[$i]['idNivelCurso']."' selected>".$lista[$i]['idNivelCurso']." - ". $lista[$i]['nomeNivelCurso']."</option>";
													$i++;
												}
												else{
													echo "<option value='".$lista[$i]['idNivelCurso']."'>".$lista[$i]['idNivelCurso']." - ". $lista[$i]['nomeNivelCurso']."</option>";
													$i++;
												}
											}
										}
										echo "</select>";
								  	?>
								</div><!-- /col-sm-4 3º -->							
							</div><!-- /row 1º -->
							
							<div class="row">
								<div class="col-sm-4"><!-- /col-sm-4 1º --></div>
								<div class="col-sm-4"><!-- /col-sm-4 2º --></div>
								<div class="col-sm-4">
									<?php 
										if(isset($_SESSION['siape'])){
											echo "<select class='form-control' name='curso' onchange='this.form.submit()'>";
										}
										else{
											echo "<select class='form-control' name='curso' disabled='disabled'>";
										}
										echo "<option value=''>Selecione: Curso</option>";
										if(isset($_SESSION['nivel'])){
											$lista = mostraCursoPorNivel($_SESSION['nivel']);
											$i = 0;
											while($lista[$i] != NULL){
												if(!isset($_SESSION['curso'])){
													echo "<option value='".$lista[$i]['codCurso']."'>".$lista[$i]['codCurso']." - ". $lista[$i]['nomeCurso']."</option>";
													$i++;
												}
												else{
													if($_SESSION['curso'] == $lista[$i]['codCurso']){
														echo "<option value='".$lista[$i]['codCurso']."' selected>".$lista[$i]['codCurso']." - ". $lista[$i]['nomeCurso']."</option>";
														$i++;
													}
													else{
														echo "<option value='".$lista[$i]['codCurso']."'>".$lista[$i]['codCurso']." - ". $lista[$i]['nomeCurso']."</option>";
														$i++;
													}
												}
											}
										}
										echo "</select>";
								  	?>
								</div><!-- /col-sm-4 3º -->							
							</div><!-- /row 2º -->
							
							<div class="row">
								<div class="col-sm-4"><!-- /col-sm-4 1º --></div>
								<div class="col-sm-4"><!-- /col-sm-4 2º --></div>
								<div class="col-sm-4">
									<?php 
										if(isset($_SESSION['siape'])){
											echo "<select class='form-control' name='ccr' onchange='this.form.submit()'>";
										}
										else{
											echo "<select class='form-control' name='ccr' disabled='disabled'>";
										}
										echo "<option value=''>Selecione: CCR</option>";
										if(isset($_SESSION['curso'])){
											$lista = mostraCursoPorCcr($_SESSION['curso']);
											$i = 0;
											while($lista[$i] != NULL){
												if(!isset($_SESSION['ccr'])){
													echo "<option value='".$lista[$i]['codCcr']."'>".$lista[$i]['codCcr']." - ". $lista[$i]['nomeCcr']."</option>";
													$i++;
												}
												else{
													if($_SESSION['ccr'] == $lista[$i]['codCcr']){
														echo "<option value='".$lista[$i]['codCcr']."' selected>".$lista[$i]['codCcr']." - ". $lista[$i]['nomeCcr']."</option>";
														$i++;
													}
													else{
														echo "<option value='".$lista[$i]['codCcr']."'>".$lista[$i]['codCcr']." - ". $lista[$i]['nomeCcr']."</option>";
														$i++;
													}
												}
											}
										}
										echo "</select>";
								  	?>
								</div><!-- /col-sm-4 3º -->							
							</div><!-- /row 3º -->
							
							<div class="row">
								<div class="col-sm-4"><!-- /col-sm-4 1º --></div>
								<div class="col-sm-4 text-center"><!-- /col-sm-4 2º -->
									<?php
										if(isset($_SESSION['servidorSiape'])){
											echo $_SESSION['servidorSiape']." selecionado!<br>";
										}
										else{
											//echo "Descrição dos dados do servidor após ser selecionado.";
										}										
									?>
									</br></br></br></br></br>
								</div>
								<div class="col-sm-4"><!-- /col-sm-4 3º -->
									<br>
									<?php
										echo "<label for='inputSiape' class='col-sm-12 text-center'>CursoCcr</label>";
										if(isset($_SESSION['siape'])){
											echo "<textarea class='form-control' rows='3' resize:none>";
										}
										else{
											echo "<textarea class='form-control' rows='3' resize='false' disabled>";
										}
									?>
									</textarea>
								</div>							
							</div><!-- /row 4º -->
							
							<div class="row">
								<div class="col-sm-4"><!-- /col-sm-4 1º -->
									<div class="col-sm-7">
									<?php 
										if(isset($_SESSION['siape'])){
											echo "<select class='form-control' name='anoSemestre' onchange='this.form.submit()'>";
										}
										else{
											echo "<select class='form-control' name='anoSemestre' disabled='disabled'>";
										}
										
										echo "<option value=''>Selecione ano/semestre</option>";
										if(!isset($_SESSION['anoSemestre'])){
											for($dataAtual = date('Y');$dataAtual <= date('Y')+2;$dataAtual++){
												echo "<option value='".$dataAtual."/1'>".$dataAtual."/1</option>";
												echo "<option value='".$dataAtual."/2'>".$dataAtual."/2</option>";
											}
										}
										else{
											for($dataAtual = date('Y');$dataAtual <= date('Y')+2;$dataAtual++){
												$dataAtual1 = $dataAtual."/1";
												$dataAtual2 = $dataAtual."/2";
												if($dataAtual1 == $_SESSION['anoSemestre']){
													echo "<option value='".$dataAtual1."' selected>".$dataAtual1."</option>";
													echo "<option value='".$dataAtual2."'>".$dataAtual2."</option>";
												}
												else{
													if($dataAtual2 == $_SESSION['anoSemestre']){
														echo "<option value='".$dataAtual1."'>".$dataAtual1."</option>";
														echo "<option value='".$dataAtual2."' selected>".$dataAtual2."</option>";
													}
													else{
														echo "<option value='".$dataAtual1."'>".$dataAtual1."</option>";
														echo "<option value='".$dataAtual2."'>".$dataAtual2."</option>";
													}
												}
											}
										}
										echo "</select>";
										echo "</div>";
										if(isset($_SESSION['anoSemestre']) && isset($_SESSION['curso']) && isset($_SESSION['ccr']) && isset($_SESSION['siape'])){
											echo "<button name='alocar' type='submit' class='btn btn-success'>Alocar servidor</button>";
										}
										else{
											echo "<button name='alocar' type='submit' class='btn btn-success' disabled>Alocar servidor</button>";
										}
									?>
								</div>
								<div class="col-sm-4"><!-- /col-sm-4 3º -->
									
								</div>															
							</div><!-- /row 5º -->      
						</form>
				  
				  </div><!-- /Aba alocar -->
				  <div class="tab-pane <?php if(isset($_SESSION['aba']) && $_SESSION['aba'] != 3) echo 'active'; ?> " id="listServidor"></br>
				  		<div class="form-group">
							 	<label for="inputSiape" class="col-sm-4 text-center">Selecione servidor <hr></label>
							 	<button class="btn btn-success col-sm-4" data-toggle="modal" data-target=".bs-example-modal-lg">Buscar servidor</button>
							 	<label for="inputSiape" class="col-sm-4 text-center">Selecione ano/semestre<hr></label>
							</div>
							<form action="listarAlocaCursoCcr.php" class="form-horizontal" role="form">
                            <input type="hidden" name="aba" value="2">
							<div class="row">
								<div class="col-sm-4"><!-- /col-sm-4 1º -->
									<div class="col-sm-7">
										<input type="text" class="form-control" id="inputSiape" placeholder="Siape">
							 		</div>							 	
									<button type="submit col-sm-2" class="btn btn-default">Validar Siape</button>
								</div>
								<div class="col-sm-4"><!-- /col-sm-4 2º --></div>
								<div class="col-sm-4">
									 <select class="form-control" name="anoSemestre">
                                     <?php
									 	for($dataAtual = date('Y');$dataAtual <= date('Y')+2;$dataAtual++){
											echo '<option value="'.$dataAtual.'/1">'.$dataAtual.'/1</option>';
											echo '<option value="'.$dataAtual.'/2">'.$dataAtual.'/2</option>';
										}
									 ?>
								  	</select>
								</div><!-- /col-sm-4 3º -->							
							</div><!-- /row 1º -->
							<div class="row">
								<div class="col-sm-4"><!-- /col-sm-4 1º --></div>
								<div class="col-sm-4"><!-- /col-sm-4 2º -->
								<button type="submit" class="btn btn-success col-sm-4 col-md-offset-4">Atualizar tabela</button><hr>
								</div>
								<div class="col-sm-4"><!-- /col-sm-4 3º --></div>															
							</div><!-- /row 5º -->							
							</form>
                            
                            <?php listarServidorCursoCcr('2014/2', 0, 0, 0, 0, 0, 1) ?> <!-- E AGORA ISAC??-->
				  		<!--<table class="table table-bordered">
				  			<tr class="success text-center">
				  				<td><strong>Titulo</strong></td>
				  				<td><strong>Titulo</strong></td>
				  				<td><strong>Titulo</strong></td>
				  				<td><strong>Titulo</strong></td>
				  				<td><strong>Titulo</strong></td>
				  			</tr>
							<tr class="active">
				  				<td>...</td>
				  				<td>...</td>
				  				<td>...</td>
				  				<td>...</td>
				  				<td>...</td>
				  			</tr>
				  			<tr class="success">
				  				<td>...</td>
				  				<td>...</td>
				  				<td>...</td>
				  				<td>...</td>
				  				<td>...</td>
				  			</tr>
				  			<tr class="active"><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td></tr>
				  			<tr class="success"><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td></tr>
				  			<tr class="active"><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td></tr>
				  			<tr class="success"><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td></tr>
				  			<tr class="active"><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td></tr>
				  			<tr class="success"><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td></tr>
						</table> -->
				  </div><!-- /Aba listServidor -->
				  <div class="tab-pane <?php if(isset($_SESSION['aba']) && $_SESSION['aba'] != 2) echo 'active'; ?> " id="listCcr"></br>
				  		<div class="form-group">
							 	<label for="inputSiape" class="col-sm-4 text-center">Selecione Curso <hr></label>
							 	<label for="inputSiape" class="col-sm-4 text-center"> - <hr></label>
							 	<label for="inputSiape" class="col-sm-4 text-center">Selecione ano/semestre<hr></label>
							</div>
							<form action="alocarServidor.php" class="form-horizontal" role="form">
							<div class="row">
								<div class="col-sm-4"><!-- /col-sm-4 1º -->
									<select class="form-control" name="nivelCurso">
									  <option value="">Selecione: Nivel curso</option>	
								  	  <option value="1">1 - Graduação</option>
								  	  <option value="2">2 - Doutorado</option>
								  	</select>
									<select class="form-control" name="curso">
									  <option value="">Selecione: Curso</option>	
								  	  <option value="1">101 - Ciência da computação</option>
								  	  <option value="2">102 - Agronomia</option>
								  	</select>
								</div>
								<div class="col-sm-4"><!-- /col-sm-4 2º --></div>
								<div class="col-sm-4">
									 <select class="form-control" name="anoSemestre">
									  <option value="">Selecione ano/semestre</option>	
								  	  <option value="2014/1">2014/1</option>
								  	  <option value="2014/2">2014/2</option>
								  	  <option value="2015/1">2015/1</option>
								  	  <option value="2015/2">2015/2</option>
								  	  <option value="2016/1">2016/1</option>
								  	  <option value="2016/2">2016/2</option>
								  	  <option value="2017/1">2017/1</option>
								  	  <option value="2017/2">2017/2</option>
								  	</select>
								</div><!-- /col-sm-4 3º -->							
							</div><!-- /row 1º -->
							<div class="row">
								<div class="col-sm-4"><!-- /col-sm-4 1º --></div>
								<div class="col-sm-4"><!-- /col-sm-4 2º -->
								<button type="submit" class="btn btn-success col-sm-4 col-md-offset-4">Atualizar tabela</button><hr>
								</div>
								<div class="col-sm-4"><!-- /col-sm-4 3º --></div>															
							</div><!-- /row 5º -->
							
							</form>
				  		<table class="table table-bordered">
				  			<tr class="success text-center">
				  				<td><strong>Titulo</strong></td>
				  				<td><strong>Titulo</strong></td>
				  				<td><strong>Titulo</strong></td>
				  				<td><strong>Titulo</strong></td>
				  				<td><strong>Titulo</strong></td>
				  			</tr>
							<tr class="active">
				  				<td>...</td>
				  				<td>...</td>
				  				<td>...</td>
				  				<td>...</td>
				  				<td>...</td>
				  			</tr>
				  			<tr class="success">
				  				<td>...</td>
				  				<td>...</td>
				  				<td>...</td>
				  				<td>...</td>
				  				<td>...</td>
				  			</tr>
				  			<tr class="active"><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td></tr>
				  			<tr class="success"><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td></tr>
				  			<tr class="active"><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td></tr>
				  			<tr class="success"><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td></tr>
				  			<tr class="active"><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td></tr>
				  			<tr class="success"><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td></tr>
						</table>
				  </div><!-- /Aba listCcr -->
				</div>            
		<!-- CODIGO DEVE SER IMPLEMENTADO NESTA AREA -->
        </div><!-- /col-md-12 -->                 
    </div><!-- /row --> 
<!-- /Principal -->
	

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</html>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      ...
    </div>
  </div>
</div>
