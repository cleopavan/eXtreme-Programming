<?php
	require_once dirname (__FILE__)."/library/library.php";
	session_start();
	
	/*teste se as variaveis estao setadas para inserir no banco*/
	if(isset($_POST['cod']) && isset($_POST['ch']) && isset($_POST['nome']) && isset($_POST['dominio']) && isset($_POST['curso'])){
		$codCcr = $_POST['cod'];
		$cHoraria = $_POST['ch'];
		$nomeCcr = $_POST['nome'];
		$idDominio = $_POST['dominio']; /*variavel que identifica o dominio inserido no banco*/
		$codCurso = $_POST['curso'];
		if(empty($codCcr)){
			$_SESSION['erro'] = true;
			echo "ENTROU NO IF <br/>";
			header('Location: ccr.php');
			exit();
		}
		
		$testeRetorno = constroiDadosInsertCcr($codCcr, $nomeCcr, $cHoraria, $idDominio, $codCurso);
		
		 if ($testeRetorno) {
			$_SESSION['sucessInsert'] = true;
					
		 }else{
			$_SESSION['erro'] = true;
		 }
		header('Location: ccr.php');
		exit();
		
	}else{
		echo 'variable not set';
	}	
?>
