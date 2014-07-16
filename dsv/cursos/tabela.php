<head>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/alternativeStyles.css" rel="stylesheet">

</head>

<table class="table">

<?php

if(isset($_GET['tab'])){
	echo '<table class="table table-hover">
		<tr>
			<th>Id</th>
			<th>Nome do Curso</th>		
			<th>Nível do Curso</th>
		</tr>';
		
		echo urldecode($_GET['tab']);
		
	echo '</table>';
}

?>

</table>