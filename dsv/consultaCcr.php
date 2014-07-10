<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/alternativeStyles.css" rel="stylesheet">

<?php
	require_once dirname (__FILE__)."/library/library.php";
	session_start();
	
	if(isset($_POST['filter']) && isset($_POST['text']) && strlen($_POST['text']) > 0){
		//echo $_POST['filter'];
		//echo $_POST['text'];
		
		//constroiDadosSelectCcr($_POST['filter'], $_POST['text']);
		
		if ($_POST['filter'] == 'nome') {
			$t = $_POST['text'];
			$sql = "SELECT * FROM ccr WHERE nomeCcr like '%$t%' AND regValido=1";
			$retorno = dbConsulta($sql);
			//$retornoArray = mysql_fetch_array($retorno);
			//echo mysql_num_rows($retorno);
			
			echo '
			<div class="panel panel-default">
				  <!-- Default panel contents -->
				  <div class="panel-heading">Resultado</div>

				  <!-- Table -->
				  <table class="table"> 
					 <tr>
					  <td>Nome</td>
					  <td>Código</td> 
					  <td>Carga Horária</td>
					  <td>Domínio</td>
					</tr> 
					<tr>
					</tr>';
					if (mysql_num_rows($retorno) > 0) {
						while($row = mysql_fetch_assoc($retorno)){
							echo "<tr> 
								<td>".$row['nomeCcr']."</td>	
								<td>".$row['codCcr']."</td>	
								<td>".$row['cHoraria']."</td>	
								<td>".$row['idDominio']."</td>	
							";
							echo '</tr>';
						}
					}
			echo '	  
					</table>
				</div>
			';
			 
			
			
		}
		if ($_POST['filter'] == 'cod') {
			$t = $_POST['text'];
			$sql = "SELECT * FROM ccr WHERE codCcr='$t' AND regValido=1";
			$retorno = dbConsulta($sql);
			//$retornoArray = mysql_fetch_array($retorno);
			//echo mysql_num_rows($retorno);
			
			echo '
			<div class="panel panel-default">
				  <!-- Default panel contents -->
				  <div class="panel-heading">Resultado</div>

				  <!-- Table -->
				  <table class="table"> 
					 <tr>
					  <td>Nome</td>
					  <td>Código</td> 
					  <td>Carga Horária</td>
					  <td>Domínio</td>
					</tr> 
					<tr>
					</tr>';
					if (mysql_num_rows($retorno) > 0) {
						while($row = mysql_fetch_assoc($retorno)){
							echo "<tr> 
								<td>".$row['nomeCcr']."</td>	
								<td>".$row['codCcr']."</td>	
								<td>".$row['cHoraria']."</td>	
								<td>".$row['idDominio']."</td>	
							";
							echo '</tr>';
						}
					}
			echo '	  
					</table>
				</div>
			';	
		}
		if ($_POST['filter'] == 'ch'){
			$t = $_POST['text'];
			$sql = "SELECT * FROM ccr WHERE cHoraria='$t' AND regValido=1";
			$retorno = dbConsulta($sql);
			//$retornoArray = mysql_fetch_array($retorno);
			//echo mysql_num_rows($retorno);
			
			echo '
			<div class="panel panel-default">
				  <!-- Default panel contents -->
				  <div class="panel-heading">Resultado</div>

				  <!-- Table -->
				  <table class="table"> 
					 <tr>
					  <td>Nome</td>
					  <td>Código</td> 
					  <td>Carga Horária</td>
					  <td>Domínio</td>
					</tr> 
					<tr>
					</tr>';
					if (mysql_num_rows($retorno) > 0) {
						while($row = mysql_fetch_assoc($retorno)){
							echo "<tr> 
								<td>".$row['nomeCcr']."</td>	
								<td>".$row['codCcr']."</td>	
								<td>".$row['cHoraria']."</td>	
								<td>".$row['idDominio']."</td>	
							";
							echo '</tr>';
						}
					}
			echo '	  
					</table>
				</div>
			';
		}
		if ($_POST['filter'] == 'domin'){
			$t = $_POST['text'];
			$sql = "SELECT * FROM ccr WHERE idDominio='$t' AND regValido=1";
			$retorno = dbConsulta($sql);
			//$retornoArray = mysql_fetch_array($retorno);
			//echo mysql_num_rows($retorno);
			
			echo '
			<div class="panel panel-default">
				  <!-- Default panel contents -->
				  <div class="panel-heading">Resultado</div>

				  <!-- Table -->
				  <table class="table"> 
					 <tr>
					  <td>Nome</td>
					  <td>Código</td> 
					  <td>Carga Horária</td>
					  <td>Domínio</td>
					</tr> 
					<tr>
					</tr>';
					if (mysql_num_rows($retorno) > 0) {
						while($row = mysql_fetch_assoc($retorno)){
							echo "<tr> 
								<td>".$row['nomeCcr']."</td>	
								<td>".$row['codCcr']."</td>	
								<td>".$row['cHoraria']."</td>	
								<td>".$row['idDominio']."</td>	
							";
							echo '</tr>';
						}
					}
			echo '	  
					</table>
				</div>
			';
		}
		if ($_POST['filter'] == 'curso'){
			
		}
		
		
	}else {// tratar erro
		
		$_SESSION['erro'] = true;
		header('Location: ccr.php');
		exit();
	}


?>