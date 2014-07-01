<?php
	require_once dirname (__FILE__)."/library/library.php";
	
	
	/*teste se as variaveis estao setadas para inserir no banco*/
	if(isset($_POST['cod']) && isset($_POST['ch']) && isset($_POST['nome']) && isset($_POST['dominio'])){
		/*echo $_POST['cod'];
		echo $_POST['nome'];
		echo $_POST['ch'];
		echo $_POST['dominio'];
		*/
		$idDominio = ''; /*variavel que identifica o dominio inserido no banco*/
		
		if ($_POST['dominio'] == 'Comum') {
			echo $_POST['dominio'];
			$idDominio = 1;
		}
		if ($_POST['dominio'] == 'Específico') {
			echo $_POST['dominio'];
			$idDominio = 2;
		}
		if ($_POST['dominio'] == 'Conexo'){
			echo $_POST['dominio'];
			$idDominio = 3;
		}
		
		$testeRetorno = constroiDadosInsertCcr($_POST['cod'], $_POST['nome'], $_POST['ch'], $idDominio);
		
		echo $testeRetorno;
		
		
	}else{
		echo 'variable not set';
	}
	
	

?>
