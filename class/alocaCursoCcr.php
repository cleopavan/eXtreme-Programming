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
	if($library->acessoRecusado('alocaCursoCcr.php', $_SESSION['idNivelServidor']) == FALSE){/* Excessão no caso do servidor não ter acesso a esta área*/
		header('Location: index.php?i=semPermissao');
	}
	if(isset($_POST['nivel'])){
		$_SESSION['nivel'] = $_POST['nivel'];
		$_SESSION['aba'] = 1;
	}
	if(isset($_POST['curso'])){
		$_SESSION['curso'] = $_POST['curso'];
		$_SESSION['ccr'] = NULL;
		$_SESSION['aba'] = 1;
	}
	if(isset($_POST['ccr'])){
		$_SESSION['ccr'] = $_POST['ccr'];
		$_SESSION['aba'] = 1;
	}
	if(isset($_POST['anoSemestre'])){
		$_SESSION['anoSemestre'] = $_POST['anoSemestre'];
		$_SESSION['aba'] = 1;
	}
	if(isset($_POST['desfazer'])){
		$_SESSION['siape'] = NULL;
		$_SESSION['servidorSiape'] = NULL;
		$_SESSION['nivel'] = NULL;
		$_SESSION['ccr'] = NULL;
		$_SESSION['anoSemestre'] = NULL;
		$_SESSION['obs'] = NULL;
		$_SESSION['aba'] = 1;
	}
	if(isset($_POST['validar'])){
		if(isset($_POST['siape']) && !isset($_SESSION['siape'])){
			if(!empty($_POST['siape'])){
				$servidor = $library->mostraServidorSelecionado($_POST['siape']);
			
				if($servidor != NULL){
					$_SESSION['siape'] = $servidor['siape'];
					$_SESSION['servidorSiape'] = $servidor['nome'] ." ". $servidor['sobrenome'];
				}
				else{
					$_SESSION['servidorSiape'] = "Não foi possível encontrar este Siape";
					$_SESSION['erroSiape'] = 1;
				}
			}
			else{
				$_SESSION['servidorSiape'] = "Não foi possível encontrar este Siape";
				$_SESSION['erroSiape'] = 1;
			}
		}
		$_SESSION['aba'] = 1;
	}
	if(isset($_POST['alocar'])){
		if(isset($_POST['obs'])){
			$_SESSION['obs'] = $_POST['obs'];
		}
		$deuCerto = $library->insereServidorCursoCcr($_SESSION['anoSemestre'],$_SESSION['curso'],$_SESSION['ccr'],$_SESSION['siape'],$_SESSION['obs']);
		$_SESSION['deuCerto'] = 1;
		$_SESSION['siape'] = NULL;
		$_SESSION['servidorSiape'] = NULL;
		$_SESSION['nivel'] = NULL;
		$_SESSION['ccr'] = NULL;
		$_SESSION['anoSemestre'] = NULL;
		$_SESSION['obs'] = NULL;
		$_SESSION['aba'] = 1;
	}
	if(isset($_POST['atualizar'])){
		if(isset($_POST['atua_siape']) && !empty($_POST['atua_siape'])){
			if(isset($_POST['atua_anosemestre']) && !empty($_POST['atua_anosemestre'])){
				$resultado = $library->listarServidorCursoCcr($_POST['atua_anosemestre'], 0, 0, 0, 0, $_POST['atua_siape']);
				$_SESSION['atualizar'] = 1;
				$_SESSION['atualizarResultado'] = $resultado;
			}
			else{
				$_SESION['atualizar'] = 0;
			}
		}
		else{
			$_SESSION['atualizar'] = 0;
		}
		$_SESSION['aba'] = 2;
	}
	if(isset($_POST['nivelCurso'])){
		$_SESSION['nivelCurso'] = $_POST['nivelCurso'];
		$_SESSION['aba'] = 3;
	}
	if(isset($_POST['cursoLista'])){
		$_SESSION['cursoLista'] = $_POST['cursoLista'];
		$_SESSION['aba'] = 3;
	}
	if(isset($_POST['atualizarNovo'])){
		if(isset($_POST['nivelCurso']) && !empty($_POST['nivelCurso'])){
			if(isset($_POST['cursoLista']) && !empty($_POST['cursoLista'])){
				$resultado = $library->listaCursoCcr($_SESSION['nivelCurso'], $_SESSION['cursoLista']);
				$_SESSION['atualizarNovo'] = 1;
				$_SESSION['atualizarResultadoNovo'] = $resultado;
				$_SESSION['cursoLista'] = NULL;
				$_SESSION['nivelCurso'] = NULL;
				//novo
			}
			else{
				$_SESION['atualizarNovo'] = 0;
			}
		}
		else{
			$_SESSION['atualizarNovo'] = 0;
		}
		$_SESSION['aba'] = 3;
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8"> <!-- charset="utf-8">-->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Alocar curso CCR</title>

		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/alternativeStyles.css" rel="stylesheet">
	</head>
	
	<body><!-- Principal -->    
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
				<!--<form action="alocaCursoCcr.php" class="form-horizontal" role="form" enctype="multipart/form-data" method="post">-->
				<ul class="nav nav-tabs" role="tablist">
				  <li <?php 
							if(isset($_SESSION['aba'])){
								if($_SESSION['aba'] == 1){
									echo 'class="active"';
								}
							}
							else{
								echo 'class="active"'; 
							}
							?> >
                  <a href="#alocar" role="tab" data-toggle="tab">Alocar servidor ao Ccr</a></li>
				  <li <?php if(isset($_SESSION['aba']) && $_SESSION['aba'] == 2) echo 'class="active"'; ?> >
                  <a href="#listServidor" role="tab" data-toggle="tab">Listar servidores alocados</a></li>
				  <li <?php if(isset($_SESSION['aba']) && $_SESSION['aba'] == 3) echo 'class="active"'; ?> >
                  <a href="#listCcr" role="tab" data-toggle="tab">Listar Ccrs alocadas</a></li>
				</ul>
				<!--</form>-->
				<!-- Tab panes -->
				<div class="tab-content">
				  <div class="tab-pane <?php 
											if(isset($_SESSION['aba'])){
												if($_SESSION['aba'] == 1){
													echo 'active';
												}
											}
											else{
												echo 'active';
											}
										?> " id="alocar"></br>				  					   
										  	
							<div class="form-group">
							 	<label for="inputSiape" class="col-sm-4 text-center">Servidor <hr></label>
							 	<!--<button class="btn btn-success col-sm-4" data-toggle="modal" data-target=".bs-example-modal-lg" disabled>Buscar servidor</button>-->
							 	<label for="inputSiape" class="col-sm-4 text-center">Selecionar Cursos CCR <hr></label>
								<label for="inputSiape" class="col-sm-4 text-center">Observações<hr></label>
							</div>
							<form action="alocaCursoCcr.php" class="form-horizontal" role="form" enctype="multipart/form-data" method="post">
							
							<div class="row">
								<div class="col-sm-4"><!-- /col-sm-4 1º -->
									<div class="col-sm-7">
										<input type="number" name="siape" <?php if(isset($_SESSION['siape'])) echo "value='".$_SESSION['siape']."'"; ?> class="form-control" id="inputSiape" placeholder="Siape">
									</div>
										<?php						 	
											if(!isset($_SESSION['erroSiape']) && isset($_SESSION['servidorSiape'])){
												echo "<button name='desfazer' value='1' type='submit' class='btn btn-default'>Desfazer</button>";
											}
											else{
												echo "<button name='validar' value='1' type='submit' class='btn btn-default'>Validar Siape</button>";
												$_SESION['erroSiape'] = NULL;
											}
										?>
									
								</div>
								<div class="col-sm-4"><!-- /col-sm-4 2º -->
									<?php 
										if(isset($_SESSION['siape'])){
											echo "<select class='form-control' name='nivel' onchange='this.form.submit()'>";
										}
										else{
											echo "<select class='form-control' name='nivel' disabled='disabled'>";
										}
									
										echo "<option value=''>Selecione: Nivel curso</option>";
										$lista = $library->mostraTodosNiveisCurso();
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
								</div><!-- /col-sm-4 2º -->							
								<div class="col-sm-4"><!-- /col-sm-4 3º -->
									
								</div>
							</div><!-- /row 1º -->
							<!--comment-->
							<br>
							<div class="row">
								<div class="col-sm-4"><!-- /col-sm-4 1º -->
									
								</div>
								
								<div class="col-sm-4"><!-- /col-sm-4 2º -->
									<?php 
										if(isset($_SESSION['siape'])){
											echo "<select class='form-control' name='curso' onchange='this.form.submit()'>";
										}
										else{
											echo "<select class='form-control' name='curso' disabled='disabled'>";
										}
										echo "<option value=''>Selecione: Curso</option>";
										if(isset($_SESSION['nivel'])){
											$lista = $library->mostraCursoPorNivel($_SESSION['nivel']);
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
								</div>
								<div class="col-sm-4">
									
								</div><!-- /col-sm-4 3º -->							
							</div><!-- /row 2º -->
							<br>
							<div class="row">
								<div class="col-sm-4"><!-- /col-sm-4 1º --></div>
								<div class="col-sm-4"><!-- /col-sm-4 2º -->
									<?php 
										if(isset($_SESSION['siape'])){
											echo "<select class='form-control' name='ccr' onchange='this.form.submit()'>";
										}
										else{
											echo "<select class='form-control' name='ccr' disabled='disabled'>";
										}
										echo "<option value=''>Selecione: CCR</option>";
										if(isset($_SESSION['curso'])){
											$lista = $library->mostraCursoPorCcr($_SESSION['curso']);
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
								</div>
								<div class="col-sm-4">
									<?php
										if(isset($_SESSION['siape'])){
											echo "<textarea name='obs' class='form-control' rows='3' resize:none>";
										}
										else{
											echo "<textarea name='obs' class='form-control' rows='3' resize='false' disabled>";
										}
									?>
									</textarea>
								</div><!-- /col-sm-4 3º -->							
							</div><!-- /row 3º -->
							<br>
							<div class="row">
								<div class="col-sm-4"><!-- /col-sm-4 1º --></div>
								<div class="col-sm-4 text-center"><!-- /col-sm-4 2º -->
									<?php
										if(!isset($_SESSION['erroSiape']) && isset($_SESSION['servidorSiape'])){
											echo $_SESSION['servidorSiape']." selecionado!<br>";
										}
										else{
											if(isset($_SESSION['erroSiape'])){
												echo $_SESSION['servidorSiape'];
												$_SESSION['servidorSiape'] = NULL;
												$_SESSION['erroSiape'] = NULL;
											}
										}										
									?>
									
								</div>
								
								<div class="col-sm-4">
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
											for($dataAtual = date('Y');$dataAtual <= date('Y');$dataAtual++){
												echo "<option value='".$dataAtual."/1'>".$dataAtual."/1</option>";
												echo "<option value='".$dataAtual."/2'>".$dataAtual."/2</option>";
											}
										}
										else{
											for($dataAtual = date('Y');$dataAtual <= date('Y');$dataAtual++){
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
							</div><!-- /row 4º -->
							
							<div class="row">
								<div class="col-sm-4"><!-- /col-sm-4 1º -->
									
								</div>
								<div class="col-sm-4">
								
								</div>
								<div class="col-sm-4"><!-- /col-sm-4 3º -->
									
								</div>															
							</div><!-- /row 5º -->      
						</form>
				  
				  </div><!-- /Aba alocar -->
				  <div class="tab-pane <?php if(isset($_SESSION['aba']) && $_SESSION['aba'] == 2) echo 'active'; ?> " id="listServidor"></br>
				  		<div class="form-group">
							<div class="col-sm-3 text-center">
								<label for="inputSiape" class="text-center">Informar servidor</label>
							</div>
						 	<div class="col-sm-6 text-center">
								<label for="inputSiape" class="text-center">Ano/semestre</label>
						 	</div>
							<div class="col-sm-3">
							</div>
						 	<br>
						</div>
						<form action="alocaCursoCcr.php" class="form-horizontal" role="form" enctype="multipart/form-data" method="post">
						<input type="hidden" name="aba" value="2">
						<div class="row">
							<div class="col-sm-4"><!-- /col-sm-4 1º -->
								<input name="atua_siape" type="number" class="form-control" id="inputSiape" placeholder="Siape">							 	
							</div>
							<div class="col-sm-3 col-md-offset-1">
								<select class="form-control" name="atua_anosemestre">
                                    <?php
								 	echo "<option value=''>Selecione ano/semestre</option>";
									if(!isset($_SESSION['anoSemestre'])){
									for($dataAtual = date('Y');$dataAtual <= date('Y');$dataAtual++){
											echo "<option value='".$dataAtual."/1'>".$dataAtual."/1</option>";
											echo "<option value='".$dataAtual."/2'>".$dataAtual."/2</option>";
										}
								}
									else{
										for($dataAtual = date('Y');$dataAtual <= date('Y');$dataAtual++){
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
								?>
								</select>
							</div>
							<div class="col-sm-4">
								<button type="submit" value='1' name='atualizar' class="btn btn-success col-sm-5 col-md-offset-4">Localizar </button><br>
							</div><!-- /col-sm-4 3º -->							
						</div><!-- /row 1º -->
						<div class="row">
							<div class="col-sm-4"><!-- /col-sm-4 1º --></div>
							<div class="col-sm-4"><!-- /col-sm-4 2º -->
							</div>
							<div class="col-sm-4"><!-- /col-sm-4 3º --></div>															
						</div><!-- /row 5º -->							
						</form>
                           
                           <!--<iframe name='tabela'>-->
                           <?php
							echo'<br>';
							echo'<table class="table table-bordered">';
								echo'<tr class="success text-center">';
									echo'<td><strong>Nível</strong></td>';
									echo'<td><strong>Curso</strong></td>';
									echo'<td><strong>Ccr</strong></td>';
									echo'<td><strong>Domínio</strong></td>';
									echo'<td><strong>Siape</strong></td>';
									echo'<td><strong>Professor</strong></td>';
									echo'<td><strong>Carga horária</strong></td>';
								echo'</tr>';
								if(isset($_SESSION['atualizar']) && $_SESSION['atualizar'] == 0){
									echo '<tr class="active text-center">';
										echo '<td></td><td></td><td></td><td></td><td></td><td></td><td></td>';
									echo '</tr>';
									echo "<h5 class='text-center'>Necessário informar os parâmetros</h5>";
									$_SESSION['atualizar'] = NULL;
								}
								else{
									$linha = 0;
									if(isset($_SESSION['atualizar']) && $_SESSION['atualizar'] == 1){
										$_SESSION['atualizar'] = NULL;
										$row = mysqli_fetch_array($_SESSION['atualizarResultado']);
										if($row == NULL){
											echo '<tr class="active text-center">';
												echo '<td></td><td></td><td></td><td></td><td></td><td></td><td></td>';
											echo '</tr>';
											echo "<h5 class='text-center'>Nenhuma CCR alocada para este Siape</h5>";
											$_SESSION['atualizarResultado'] = NULL;
										}
										else{
											do{
												if(!$linha){	
													echo'<tr class="active">';
														echo'<td>'.$row['nomeNivelCurso'].'</td>';
														echo'<td>'.$row['codCurso'].' - '.$row['nomeCurso'].'</td>';
														echo'<td>'.$row['codCcr'].' - '.$row['nomeCcr'].'</td>';
														echo'<td>'.$row['nomeDominio'].'</td>';
														echo'<td>'.$row['siape'].'</td>';
														echo'<td>'.$row['nome'].' '.$row['sobrenome'].'</td>';
														echo'<td>'.$row['cHoraria'].'</td>';
													echo'</tr>';
													$linha = 1;
												}else
												if($linha){
													echo'<tr class="success">';
														echo'<td>'.$row['nomeNivelCurso'].'</td>';
														echo'<td>'.$row['codCurso'].' - '.$row['nomeCurso'].'</td>';
														echo'<td>'.$row['codCcr'].' - '.$row['nomeCcr'].'</td>';
														echo'<td>'.$row['nomeDominio'].'</td>';
														echo'<td>'.$row['siape'].'</td>';
														echo'<td>'.$row['nome'].' '.$row['sobrenome'].'</td>';
														echo'<td>'.$row['cHoraria'].'</td>';
													echo'</tr>';
													$linha = 0;
												}
											} while($row = mysqli_fetch_array($_SESSION['atualizarResultado']));
										}
									}
									else{
										echo '<tr class="active text-center">';
											echo '<td></td><td></td><td></td><td></td><td></td><td></td><td></td>';
										echo '</tr>';
									}
								}
							echo'</table>';
						?>
				  </div><!-- /Aba listServidor -->
				  <div class="tab-pane <?php if(isset($_SESSION['aba']) && $_SESSION['aba'] == 3) echo 'active'; ?> " id="listCcr"></br>
				  		<div class="form-group">
							 <label for="inputSiape" class="col-sm-4 text-center">Selecione Nivel Curso</label>
							 <label for="inputSiape" class="col-sm-4 text-center">Selecione Curso</label>
							 <div class="col-sm-4">
							 </div>
							<br>
						</div>
							<form action="alocaCursoCcr.php" class="form-horizontal" role="form" enctype="multipart/form-data" method="post">
							<div class="row">
								<div class="col-sm-4"><!-- /col-sm-4 1º -->
									<select class="form-control" name="nivelCurso" onchange="this.form.submit()">
										<?php
										  echo "<option value=''>Selecione: Nivel curso</option>";
											$lista = $library->mostraTodosNiveisCurso();
											$i = 0;
											while($lista[$i] != NULL){
												if(!isset($_SESSION['nivelCurso'])){
													echo "<option value='".$lista[$i]['idNivelCurso']."'>".$lista[$i]['idNivelCurso']." - ". $lista[$i]['nomeNivelCurso']."</option>";
													$i++;
												}
												else{
													if($_SESSION['nivelCurso'] == $lista[$i]['idNivelCurso']){
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
								</div>
								<div class="col-sm-4">
									<?php
									echo "<select class='form-control' name='cursoLista' onchange='this.form.submit()'>";
										echo "<option value=''>Selecione: Curso</option>";
										if(isset($_SESSION['nivelCurso'])){
											$lista = $library->mostraCursoPorNivel($_SESSION['nivelCurso']);
											$i = 0;
											while($lista[$i] != NULL){
												if(!isset($_SESSION['cursoLista'])){
													echo "<option value='".$lista[$i]['codCurso']."'>".$lista[$i]['codCurso']." - ". $lista[$i]['nomeCurso']."</option>";
													$i++;
												}
												else{
													if($_SESSION['cursoLista'] == $lista[$i]['codCurso']){
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
									?>
									</select> <!-- /select -->
								</div>
								<div class="col-sm-4">
									<button type="submit" value='1' name='atualizarNovo' class="btn btn-success col-sm-5 col-md-offset-4">Localizar </button><br>
								</div><!-- /col-sm-4 3º -->							
							</div><!-- /row 1º -->
							<div class="row">
								<div class="col-sm-4"><!-- /col-sm-4 1º --></div>
								<div class="col-sm-4"><!-- /col-sm-4 2º -->
								</div>
								<div class="col-sm-4"><!-- /col-sm-4 3º --></div>															
							</div><!-- /row 5º -->
							
							</form>
							<br>
				  		<table class="table table-bordered">
				  			<tr class="success text-center">
				  				<td><strong>Codigo CCR</strong></td>
				  				<td><strong>Nome CCR</strong></td>
				  				<td><strong>Carga Horária</strong></td>
				  				<td><strong>Domínio</strong></td>
				  			</tr>
				  			<?php
						if(isset($_SESSION['atualizarNovo']) && $_SESSION['atualizarNovo'] == 0){
							echo '<tr class="active text-center">';
								echo '<td></td><td></td><td></td><td></td>';
							echo '</tr>';
							echo "<h5 class='text-center'>Necessário informar os parâmetros</h5>";
							$_SESSION['atualizarNovo'] = NULL;
						}
						else{
							$linha = 0;
							if(isset($_SESSION['atualizarNovo']) && $_SESSION['atualizarNovo'] == 1){
								$_SESSION['atualizarNovo'] = NULL;
								$row = mysqli_fetch_array($_SESSION['atualizarResultadoNovo']);
								if($row == NULL){
									echo '<tr class="active text-center">';
										echo '<td></td><td></td><td></td><td></td>';
									echo '</tr>';
									echo "<h5 class='text-center'>Nenhuma CCR alocada para este Siape</h5>";
									$_SESSION['atualizarResultadoNovo'] = NULL;
								}
								else{
									do{
										if(!$linha){	
											echo'<tr class="active">';
												echo'<td>'.$row['codCcr'].'</td>';
												echo'<td>'.$row['nomeCcr'].'</td>';
												echo'<td>'.$row['cHoraria'].'</td>';
												echo'<td>'.$row['nomeDominio'].'</td>';
											echo'</tr>';
											$linha = 1;
										}else
										if($linha){
											echo'<tr class="success">';
												echo'<td>'.$row['codCcr'].'</td>';
												echo'<td>'.$row['nomeCcr'].'</td>';
												echo'<td>'.$row['cHoraria'].'</td>';
												echo'<td>'.$row['nomeDominio'].'</td>';
											echo'</tr>';
											$linha = 0;
										}
									} while($row = mysqli_fetch_array($_SESSION['atualizarResultadoNovo']));
								}
							}
							else{
								echo '<tr class="active text-center">';
									echo '<td></td><td></td><td></td><td></td>';
								echo '</tr>';
							}
						}
						?>
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
	</body>
</html>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			...
		</div>
	</div>
</div>
