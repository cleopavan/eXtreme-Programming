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
			$sql = "INSERT INTO situacaoservidor (idSituacaoServidor, situacao, dataEntrada, dataSaida, regValido) VALUES ($id, '$situacao', NULL, NULL, $regValido)";
		}else if(empty($dataEntrada)){
			$sql = "INSERT INTO situacaoservidor (idSituacaoServidor, situacao, dataEntrada, dataSaida, regValido) VALUES ($id, '$situacao', NULL, '$dataSaida', $regValido)";
		}else if(empty($dataSaida)){
			$sql = "INSERT INTO situacaoservidor (idSituacaoServidor, situacao, dataEntrada, dataSaida, regValido) VALUES ($id, '$situacao', '$dataEntrada', NULL, $regValido)";
		}else{
			$sql = "INSERT INTO situacaoservidor (idSituacaoServidor, situacao, dataEntrada, dataSaida, regValido) VALUES ($id, '$situacao', '$dataEntrada', '$dataSaida', $regValido)";
		}
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function getIdTabelaNivelServidor(){
		$sql = "SELECT idNivelServidor FROM nivelservidor ORDER BY idNivelServidor DESC LIMIT 1";
		
		$r = dbConsulta($sql);
		return $r;
	}
	
	function cadastroNivelServidor($dados){
		$id = $dados['id'];
		$nivel = $dados['nivel'];
		$regValido = $dados['regValido'];
		
		$sql = "INSERT INTO nivelservidor (idNivelServidor, nivel, regValido) VALUES ($id, '$nivel', $regValido)";
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function cadastroServidores($dados){
		$siape = $dados['siape'];
		$nome = $dados['nome'];
		$sobrenome = $dados['sobrenome'];
		$observacao = $dados['observacao'];
		$quemSubstitui = $dados['quemSubistitui'];
		$idCargo = $dados['idCargo'];
		$idJornada = $dados['idJornada'];
		$idSituacaoServidor = $dados['idSituacaoServidor'];
		$email = $dados['email'];
		$fone1 = $dados['fone1'];
		$fone2 = $dados['fone2'];
		$endereco = $dados['endereco'];
		$cidade = $dados['cidade'];
		$idNivelServidor = $dados['idNivelServidor'];
		$regValido = $dados['regValido'];
		$senha = $dados['senha'];
		
		$sql = "INSERT INTO servidores (siape, nome, sobrenome, observacao, quemSubstitui, idCargo, idJornada, idSituacaoServidor, email, fone1, fone2, endereco, cidade, senha, idNivelServidor, regValido)
		VALUES ('$siape', '$nome', '$sobrenome', '$observacao', '$quemSubstitui', $idCargo, $idJornada, $idSituacaoServidor, '$email', '$fone1', '$fone2', '$endereco', '$cidade', '$senha', $idNivelServidor, $regValido)";
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function getIdTabelaNivelCursos(){
		$sql = "SELECT idNivelCursos FROM nivelcursos ORDER BY idNivelCursos DESC LIMIT 1";
		
		$r = dbConsulta($sql);
		return $r;
	}
	
	function cadastroNivelCursos($dados){
		$id = $dados['id'];
		$nivel = $dados['nivel'];
		$regValido = $dados['regValido'];
		
		$sql = "INSERT INTO nivelcursos (idNivelCursos, nivel, regValido) VALUES ($id, '$nivel', $regValido)";
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function getIdTabelaDominios(){
		$sql = "SELECT idDominio FROM dominios ORDER BY idDominio DESC LIMIT 1";
		
		$r = dbConsulta($sql);
		return $r;
	}
	
	function cadastroDominios($dados){
		$id = $dados['id'];
		$dominio = $dados['dominio'];
		$regValido = $dados['regValido'];
		
		$sql = "INSERT INTO dominios (idDominio, dominio, regValido) VALUES ($id, '$dominio', $regValido)";
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function cadastroCursos($dados){
		$codCurso = $dados['codCurso'];
		$nome = $dados['nome'];
		$idNivelCursos = $dados['idNivelCursos'];
		$regValido = $dados['regValido'];
		
		$sql = "INSERT INTO cursos (codCurso, nome, idNivelCursos, regValido) VALUES ($codCurso, '$nome', $idNivelCursos, $regValido)";
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function cadastroCcrs($dados){
		$codCcr = $dados['codCcr'];
		$nome = $dados['nome'];
		$cHoraria = $dados['cHoraria'];
		$idDominio = $dados['idDominio'];
		$regValido = $dados['regValido'];
		
		$sql = "INSERT INTO ccrs (codCcr, nome, cHoraria, idDominio, regValido) VALUES ($codCcr, '$nome', $cHoraria, $idDominio, $regValido)";
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function cadastroCursosCcrs($dados){
		$codCcr = $dados['codCcr'];
		$codCurso = $dados['codCurso'];
		$regValido = $dados['regValido'];
		
		$sql = "INSERT INTO cursosccrs (codCcr, codCurso, regValido) VALUES ($codCcr, $codCurso, $regValido)";
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function login($dados){
		$user = $dados['usuario'];
		$senha = $dados['senha'];
		
		$sql = "SELECT siape FROM servidores WHERE (siape=$user OR email=$user) AND senha=$senha";
		
		$r = dbConsulta($sql);
		
		return $r;
	}
?>