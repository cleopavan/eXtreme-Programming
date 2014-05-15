<?php
	require_once dirname(__FILE__).'/../database/database.php';//banco de dados

	function test(){
		$sql = "SELECT * FROM nivel";
		
		$r=dbConsulta($sql);
		return $r;
	}
	
	function getIdTabelaFuncao(){
		$sql = "SELECT idFuncao FROM funcao ORDER BY idFuncao DESC LIMIT 1";
		
		$r = dbConsulta($sql);
		return $r;
	}
	
	function cadastroFruncao($dados){
		$id = $dados['id'];
		$funcao = $dados['funcao'];
		
		$sql = "INSERT INTO funcao (idFuncao, funcao) VALUES ($id, '$funcao')";
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function getIdTabelaCargo(){
		$sql = "SELECT idCargo FROM cargo ORDER BY idCargo DESC LIMIT 1";
		
		$r = dbConsulta($sql);
		return $r;
	}
	
	function cadastroFruncao($dados){
		$id = $dados['id'];
		$cargo = $dados['cargo'];
		
		$sql = "INSERT INTO cargo (idCargo, cargo) VALUES ($id, '$cargo')";
		
		$r = dbConsulta($sql);
		
		return $r;
	}

?>