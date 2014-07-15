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
		$filtro = $_POST['filter'];
		$texto = $_POST['text'];
		
		$retorno = constroiDadosSelectServidor($filtro, $texto);
		
		echo '<div class="panel panel-default">
				  <!-- Default panel contents -->
				  <div class="panel-heading">Resultado</div>
				  
				  <!-- Table -->
				  <table class="table"> 
					 <tr>
					  <td>Siape</td>
					  <td>Nome</td> 
					  <td>Sobrenome</td>
					  <td>Cargo</td>
					  <td>Nível</td>
					  <td>Jornada</td>
					  <td>Situação</td>
					  <td>Substituto</td>
					  <td>Email</td>
					  <td>Fone 1</td>
					  <td>Fone 2</td>
					  <td>Endereço</td>
					  <td>Cidade</td>
					  <td>Observação</td>
					</tr> 
					<tr>
					</tr>';
					if (mysql_num_rows($retorno) > 0) {
						while($row = mysql_fetch_assoc($retorno)){
							echo "<tr> 
								<td>".$row['siape']."</td>	
								<td>".$row['nome']."</td>	
								<td>".$row['sobrenome']."</td>	
								<td>".$row['idCargo']."</td>	
								<td>".$row['idNivelServidor']."</td>
								<td>".$row['idJornada']."</td>
								<td>".$row['idSituacaoServidor']."</td>
								<td>".$row['quemSubstitui']."</td>
								<td>".$row['email']."</td>	
								<td>".$row['fone1']."</td>	
								<td>".$row['fone2']."</td>	
								<td>".$row['endereco']."</td>	
								<td>".$row['cidade']."</td>	
								<td>".$row['observacao']."</td>		
							";
							echo '</tr>';
						}
					}
			echo '	  
					</table>
				</div>
			';
	}else {// tratar erro
		
		$_SESSION['erro'] = true;
		header('Location: ccr.php');
		exit();
	}


?>