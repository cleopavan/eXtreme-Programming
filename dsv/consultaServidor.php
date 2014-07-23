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
						<td>Jornada</td>
						<td>Situação</td>
						<td>Curso</td>
						<td>Substituto</td>
						<td>Email</td>
						<td>Fone 1</td>
						<td>Fone 2</td>
						<td>Endereço</td>
						<td>Cidade</td>
						<td>Observação</td>
					</tr>';
					if (mysql_num_rows($retorno) > 0) {
						while($row = mysql_fetch_array($retorno)){
							echo "<tr>";
							echo "<td>".$row['siape']."</td>";
							echo "<td>".$row['nome']."</td>";
							echo "<td>".$row['sobrenome']."</td>";
							echo "<td>".$row['cargo']."</td>";
							echo "<td>".$row['jornada']."</td>";
							echo "<td>".$row['situacao']."</td>";
							echo "<td>".$row['nomeCurso']."</td>";
							echo "<td>".$row['quemSubstitui']."</td>";
							echo "<td>".$row['email']."</td>";
							echo "<td>".$row['fone1']."</td>";
							echo "<td>".$row['fone2']."</td>";
							echo "<td>".$row['endereco']."</td>";
							echo "<td>".$row['cidade']."</td>";
							echo "<td>".$row['observacao']."</td>";
							echo '</tr>';
						}
					}
			echo '	  
					</table>
				</div>
			';
	}else {// tratar erro
		
		$_SESSION['erro'] = true;
		header('Location: servidor.php');
		exit();
	}


?>
