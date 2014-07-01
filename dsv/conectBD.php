<?php
	
	/*teste se as variaveis estao setadas para inserir no banco*/
	if(isset($_POST['cod']) && isset($_POST['ch']) && isset($_POST['nome']) && isset($_POST['dominio'])){
		/*echo $_POST['cod'];
		echo $_POST['nome'];
		echo $_POST['ch'];
		echo $_POST['dominio'];
		*/
	}else{
		echo 'variable not set';
	}
	
	

?>
