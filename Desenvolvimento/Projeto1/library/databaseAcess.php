<?php
	require_once dirname(__FILE__).'/../database/database.php';//banco de dados

	function test(){
		$sql = "SELECT * FROM nivelServidor";
		
		$r=dbConsulta($sql);
		return $r;
	}
	
	function getIdTabelaFuncao(){	
		$sql = "SELECT idFuncao FROM funcao ORDER BY idFuncao DESC LIMIT 1";
		
		$r = dbConsulta($sql);
		return $r;
	}
	
	function cadastroFuncao($dados){
		$id = $dados['id'];
		$funcao = $dados['funcao'];
		$regValido = $dados['regValido'];
		
		$sql = "INSERT INTO funcao (idFuncao, funcao, regValido) VALUES ($id, '$funcao', $regValido)";
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function getIdTabelaCargos(){
		$sql = "SELECT idCargos FROM cargos ORDER BY idCargos DESC LIMIT 1";
		
		$r = dbConsulta($sql);
		return $r;
	}
	
	function cadastroCargos($dados){
		$id = $dados['id'];
		$cargo = $dados['cargo'];
		$regValido = $dados['regValido'];
		
		$sql = "INSERT INTO cargos (idCargos, cargo, regValido) VALUES ($id, '$cargo', $regValido)";
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function getIdTabelaJornada(){
		$sql = "SELECT idJornada FROM jornada ORDER BY idJornada DESC LIMIT 1";
		
		$r = dbConsulta($sql);
		return $r;
	}
	
	function cadastroJornada($dados){
		$id = $dados['id'];
		$jornada = $dados['jornada'];
		$regValido = $dados['regValido'];
		
		$sql = "INSERT INTO jornada (idJornada, jornada, regValido) VALUES ($id, '$jornada', $regValido)";
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function cadastroServidoresFuncao($dados){
		$idFuncao = $dados['idFuncao'];
		$siape = $dados['siape'];
		$dataInicio = $dados['dataInicio'];
		$dataSaida = $dados['dataSaida'];
		$cargaHoraria = $dados['cargaHoraria'];
		$regValido = $dados['regValido'];
		
		$sql = "INSERT INTO servidoresfuncao (idFuncao, siape, dataInicio, dataSaida, cargaHoraria, regValido) 
				VALUES ($id, '$siape', '$dataInicio', $dataSaida, $cargaHoraria, $regValido)";
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function getIdTabelaSituacaoServidor(){
		$sql = "SELECT idSituacaoServidor FROM situacaoservidor ORDER BY idSituacaoServidor DESC LIMIT 1";
		
		$r = dbConsulta($sql);
		return $r;
	}
	
	function cadastroSituacaoServidor($dados){
		$id = $dados['id'];
		$situacao = $dados['situacao'];
		$dataEntrada = $dados['dataEntrada'];
		$dataSaida = $dados['dataSaida'];
		$regValido = $dados['regValido'];
		
		if(empty($dataEntrada) && empty($dataSaida)){
			$sql = "INSERT INTO situacaoservidor (idSituacaoServidor, situacao, dataEntrada, dataSaida, regValido) VALUES ($id, '$situacao', NULL, NULL, 1)";
		}else if(empty($dataEntrada)){
			$sql = "INSERT INTO situacaoservidor (idSituacaoServidor, situacao, dataEntrada, dataSaida, regValido) VALUES ($id, '$situacao', NULL, '$dataSaida', 1)";
		}else if(empty($dataSaida)){
			$sql = "INSERT INTO situacaoservidor (idSituacaoServidor, situacao, dataEntrada, dataSaida, regValido) VALUES ($id, '$situacao', '$dataEntrada', NULL, 1)";
		}else{
			$sql = "INSERT INTO situacaoservidor (idSituacaoServidor, situacao, dataEntrada, dataSaida, regValido) VALUES ($id, '$situacao', '$dataEntrada', '$dataSaida', 1)";
		}
		
		$r = dbConsulta($sql);
		
		return $r;
	}
?>