<?php
	require_once dirname(__FILE__).'/databaseAcess.php';//banco de dados
	
	function in($title){//função do cabeçalho
		echo '<!DOCTYPE html>';
		echo '<html>';
		echo '	<head>';
		//echo '		<meta http-equiv="content-type" content="text/html; charset=UTF-8">';
		echo '		<meta http-equiv="content-type" content="text/html; charset=ISO-8859-15">';
		echo '		<title>'.$title.'</title>';//alterar para passar o nome da pagina
		echo '	</head>';
		echo '	<body>';
	}
	
	function out(){
	
		$date = date('Y');
		echo '		<hr>';
		echo '		<p>';
		echo '		© '.$date.' - All rights reserved.';
		echo '		</p>';
		echo '	</body>';
		echo '</html>';
	}

	function callTest(){//teste de consulta banco
		$r = test();
		return $r;
	}
	
	function chamaCadastroFuncao($funcao){
		$r = getIdTabelaFuncao();
		
		echo "linhas -> ". mysql_num_rows($r) . "<br/>";
		if(mysql_num_rows($r) > 0){
			while($row = mysql_fetch_assoc($r)){
				$id = $row['idFuncao'];
			}
		}
		
		$funcao = addslashes($funcao);
		$id++;
		$dados = Array();
		$dados['id'] = $id;
		$dados['funcao'] = $funcao;
		$r = cadastroFruncao($dados);
		return $r;
	}
	function chamaCadastroServidoresFuncao(){
		
	}
	function chamaCadastroCargos(){
		$r = getIdTabelaCargos();
		
		echo "linhas -> ". mysql_num_rows($r) . "<br/>";
		if(mysql_num_rows($r) > 0){
			while($row = mysql_fetch_assoc($r)){
				$id = $row['idCargo'];
			}
		}
		
		$funcao = addslashes($cargo);
		$id++;
		$dados = Array();
		$dados['id'] = $id;
		$dados['cargo'] = $cargo;
		$r = cadastroFruncao($dados);
		return $r;
	}
	function chamaCadastroSituacaoServidor(){
		
	}
	function chamaCadastroJornada(){
		
	}
	function chamaCadastroNivel(){
		
	}
	function chamaCadastroNivelCursos(){
		
	}
	function chamaCadastroCursos(){
		
	}
	function chamaCadastroDominios(){
		
	}
	function chamaCadastroCcrs(){
		
	}
	function chamaCadastroCursosCcrs(){
		
	}
	function chamaCadastroDiaSemana(){
		
	}
	function chamaCadastroPeriodos(){
		
	}
	function chamaCadastroHorarios(){
		
	}
	function chamaCadastroSalas(){
		
	}
	function chamaCadastroAlocacao(){
		
	}
	function chamaCadastroServidorCursoCcr(){
		
	}
	function chamaCadastroServidores(){
		
	}
	
	
	function popularTabelas(){
	
	}
?>