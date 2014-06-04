<?php
	require_once dirname(__FILE__).'/library/library.php';//acesso as bibliotecas do sistema

	if(isset($_POST['table'])){//tabela de pesquisa
		$table = $_POST['table'];
		if(isset($_POST['filter'])){//filtro de pesquisa
			$filtro = $_POST['filter'];
			if(isset($_POST['string'])){//valor da pesquisa
				$string = $_POST['string'];
				
				if($table != 'servidores'){
					if($filtro == 'codigo'){//se o campo for codigo, o tipo é 0
						$string = (int)$string;
						$tipo = 0;
					}else{//se o campo for string, o tipo é 1
						$tipo = 1;
				}
				
				$r = chamaConsultaSql($table, $filtro, $string);
				
				if($r){
					if(mysql_num_rows($r) > 0){
						//montar pagina de retorno com conteudo impresso (echo)
					}
				}else{
					return -2;
					/* echo (codigo de erro)*/
				}
			}
		}
	}







?>