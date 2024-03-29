<?php

include("/../ink/database.php");

class databaseAcess{
	public $database;
	
	function __construct(){
		$this->database = new database();
	}
	
	function test(){
		$sql = "SELECT * FROM nivelServidor";
		
		$r=$database->dbConsulta($sql);
		return $r;
	}
	/****************************************************Inicio das funções de inserção****************************************/
	function insertFuncao($data){
		$funcao = $data['funcao'];
		$regValido = $data['regValido'];
		
		$sql = "INSERT INTO funcao (regValido, funcao) VALUES (regValido";
		
		if(empty($funcao)){
			$sql = $sql .", NULL";
		}else{
			$sql = $sql .", '$funcao'";
		}
		$sql = $sql . ")";
		
		$r = $this->database->dbConsulta($sql);
		
		return $r;
	}
	
	function insertServidorFuncao($data){
		$idFuncao = $data['idFuncao'];
		$siape = $data['siape'];
		$dataInicio = $data['dataInicio'];
		$dataSaida = $data['dataSaida'];
		$cargaHoraria = $data['cargaHoraria'];
		$regValido = $data['regValido'];
		
		$sql = "INSERT INTO servidorFuncao (idFuncao, siape, dataInicio, cargaHoraria, regValido, dataSaida) 
				VALUES ($idFuncao, '$siape', '$dataInicio', $cargaHoraria, $regValido";
		if(empty($dataSaida)){
			$sql = $sql . ", NULL";
		}else{
			$sql = $sql . ", '$dataSaida'";
		}
		$sql = $sql . ")";
		
		$r = $this->database->dbConsulta($sql);
		
		return $r;
	}
	
	function insertCargo($data){
		$cargo = $data['cargo'];
		$regValido = $data['regValido'];
		
		$sql = "INSERT INTO cargo (regValido, cargo) VALUES ($regValido";
		
		if(empty($cargo)){
			$sql = $sql . ", NULL";
		}else{
			$sql = $sql . ", '$cargo'";
		}
		$sql = $sql . ")";
		
		$r = $this->database->dbConsulta($sql);
		
		return $r;
	}
	
	function insertJornada($data){
		$jornada = $data['jornada'];
		$regValido = $data['regValido'];
		
		$sql = "INSERT INTO jornada (regValido, jornada) VALUES ($regValido";
		if(empty($jornada)){
			$sql = $sql . ", NULL";
		}else{
			$sql = $sql . ", '$jornada'";
		}
		$sql = $sql . ")";
		
		$r = $this->database->dbConsulta($sql);
		
		return $r;
	}
		
	function insertSituacaoServidor($data){
		$situacao = $data['situacao'];
		$dataEntrada = $data['dataEntrada'];
		$dataSaida = $data['dataSaida'];
		$regValido = $data['regValido'];
		
		$sql = "INSERT INTO situacaoServidor (regValido, situacao, dataEntrada, dataSaida)
					VALUES ($regValido";
		if(empty($situacao)){
			$sql = $sql . ", NULL";
		}else{
			$sql = $sql . ", '$situacao'";
		}
		if(empty($dataEntrada)){
			$sql = $sql . ", NULL";
		}else{
			$sql = $sql . ", '$dataEntrada'";
		}
		if(empty($dataSaida)){
			$sql = $sql . ", NULL";
		}else{
			$sql = $sql . ", '$dataSaida'";
		}
		$sql = $sql . ")";
		
		$r = $this->database->dbConsulta($sql);
		
		return $r;
	}
	
	function insertNivelServidor($data){
		$nivel = $data['nivel'];
		$regValido = $data['regValido'];
		
		$sql = "INSERT INTO nivelServidor (regValido, nivel) VALUES ($regValido";
		
		if(empty($nivel)){
			$sql = $sql . ", NULL";
		}else{
			$sql = $sql . ", '$nivel'";
		}
		$sql = $sql . ")";
		
		$r = $this->database->dbConsulta($sql);
		
		return $r;
	}
	
	function insertAreaMenu($data){
		$nomeAreaMenu = $data['nomeAreaMenu'];
		$descricaoAreaMenu = $data['descricaoAreaMenu'];
		$linkAreaMenu = $data['linkAreaMenu'];
		
		$sql = "INSERT INTO areaMenu (nomeAreaMenu, descricaoAreaMenu, linkAreaMenu) VALUES (";
		
		if(empty($nomeAreaMenu)){
			$sql = $sql . ", NULL";
		}else{
			$sql = $sql . ", '$nomeAreaMenu'";
		}
		if(empty($descricaoAreaMenu)){
			$sql = $sql . ", NULL";
		}else{
			$sql = $sql . ", '$descricaoAreaMenu'";
		}
		if(empty($linkAreaMenu)){
			$sql = $sql . ", NULL";
		}else{
			$sql = $sql . ", '$linkAreaMenu'";
		}
		$sql = $sql . ")";
		
		$r = $this->database->dbConsulta($sql);
		
		return $r;
	}
	
	function insertNivelServidorAreaMenu($data){
		$idNivelServidor = $data['idNivelServidor'];
		$idAreaMenu = $data['idAreaMenu'];
		
		$sql = "INSERT INTO nivelServidor_areaMenu (idNivelServidor, idAreaMenu) VALUES ($idNivelServidor, $idAreaMenu)";
		
		$r = $this->database->dbConsulta($sql);
		
		return $r;
	}
	
	function insertServidor($data){
		$siape = $data['siape'];
		$nome = $data['nome'];
		$sobrenome = $data['sobrenome'];
		$observacao = $data['observacao'];
		$quemSubstitui = $data['quemSubstitui'];
		$idCargo = $data['idCargo'];
		$idJornada = $data['idJornada'];
		$idSituacaoServidor = $data['idSituacaoServidor'];
		$email = $data['email'];
		$fone1 = $data['fone1'];
		$fone2 = $data['fone2'];
		$endereco = $data['endereco'];
		$cidade = $data['cidade'];
		$idNivelServidor = $data['idNivelServidor'];
		$regValido = $data['regValido'];
		$pass = $data['pass'];
		
		$sql = "INSERT INTO servidor (siape, nome, sobrenome, idCargo, idJornada, idSituacaoServidor, idNivelServidor, regValido, observacao, quemSubstitui, email, fone1, fone2, endereco, cidade, senha)
				VALUES ('$siape', '$nome', '$sobrenome', $idCargo, $idJornada, $idSituacaoServidor, $idNivelServidor, $regValido";
				
		if(empty($observacao)){
			$sql = $sql . ", NULL";
		}else{
			$sql = $sql . ", '$observacao'";
		}
		if(empty($quemSubstitui)){
			$sql = $sql . ", NULL";
		}else{
			$sql = $sql . ", '$quemSubstitui'";
		}
		if(empty($email)){
			$sql = $sql . ", NULL";
		}else{
			$sql = $sql . ", '$email'";
		}
		if(empty($fone1)){
			$sql = $sql . ", NULL";
		}else{
			$sql = $sql . ", '$fone1'";
		}
		if(empty($fone2)){
			$sql = $sql . ", NULL";
		}else{
			$sql = $sql . ", '$fone2'";
		}
		if(empty($endereco)){
			$sql = $sql . ", NULL";
		}else{
			$sql = $sql . ", '$endereco'";
		}
		if(empty($cidade)){
			$sql = $sql . ", NULL";
		}else{
			$sql = $sql . ", '$cidade'";
		}
		if(empty($pass)){
			$sql = $sql . ", NULL";
		}else{
			$sql = $sql . ", '$pass'";
		}
		$sql = $sql . ")";
		$r = $this->database->dbConsulta($sql);
		
		return $r;
	}
	
	function insertNivelCurso($data){
		$nivel = $data['nivel'];
		$regValido = $data['regValido'];
		
		$sql = "INSERT INTO nivelCurso (regValido, nomeNivelCurso) VALUES ($regValido";
		
		if(empty($nivel)){
			$sql = $sql . ", NULL";
		}else{
			$sql = $sql . ", '$nivel'";
		}
		$sql = $sql . ")";
		
		$r = $this->database->dbConsulta($sql);
		
		return $r;
	}
	
	function insertCurso($data){
		$codCurso = $data['codCurso'];
		$nome = $data['nome'];
		$idNivelCurso = $data['idNivelCurso'];
		$regValido = $data['regValido'];
		
		$sql = "INSERT INTO curso (codCurso, idNivelCurso, regValido, nomeCurso) VALUES ($codCurso, $idNivelCurso, $regValido";
		
		if(empty($nome)){
			$sql = $sql . ", NULL";
		}else{
			$sql = $sql . ", '$nome'";
		}
		$sql = $sql . ")";
		
		$r = $this->database->dbConsulta($sql);
		
		return $r;
	}
	
	function insertDominio($data){
		$dominio = $data['dominio'];
		$regValido = $data['regValido'];
		
		$sql = "INSERT INTO dominio (regValido, nomeDominio) VALUES ($regValido";
		
		if(empty($dominio)){
			$sql = $sql . ", NULL";
		}else{
			$sql = $sql . ", '$dominio'";
		}
		$sql = $sql . ")";
		
		$r = $this->database->dbConsulta($sql);
		
		return $r;
	}
	
	function insertCcr($data){
		$codCcr = $data['codCcr'];
		$nome = $data['nome'];
		$cHoraria = $data['cHoraria'];
		$idDominio = $data['idDominio'];
		$regValido = $data['regValido'];
		
		$sql = "INSERT INTO ccr (codCcr, idDominio, regValido, nomeCcr, cHoraria) VALUES ($codCcr, $idDominio, $regValido";
		
		if(empty($nome)){
			$sql = $sql . ", NULL";
		}else{
			$sql = $sql . ", '$nome'";
		}
		if(empty($cHoraria)){
			$sql = $sql . ", NULL";
		}else{
			$sql = $sql . ", $cHoraria";
		}
		$sql = $sql . ")";
		
		$r = $this->database->dbConsulta($sql);
		
		return $r;
	}
	
	function insertCursoCcr($data){
		$codCcr = $data['codCcr'];
		$codCurso = $data['codCurso'];
		$regValido = $data['regValido'];
		
		$sql = "INSERT INTO cursoCcr (codCcr, codCurso, regValido) VALUES ($codCcr, $codCurso, $regValido)";
		
		$r = $this->database->dbConsulta($sql);
		
		return $r;
	}
/****************************************************Fim das funções de inserção****************************************/
/**/
/****************************************************Fim das funções de seleção****************************************/
	function selectCcr($data){
		$filtro = $data['filtro'];
		$texto = $data['texto'];
		$tabela = $data['tabela'];
		
		$sql = "SELECT DISTINCT nomeCcr, ccr.codCcr, cHoraria, nomeDominio FROM cursoCcr JOIN curso USING(codCurso) JOIN ccr USING(codCcr) JOIN dominio USING(idDominio) WHERE cursoCcr.regValido=1 AND curso.regValido=1 AND dominio.regValido=1 AND ccr.regValido=1 AND ";
		
		if($tabela == 'curso'){
			$sql = $sql . "curso.$filtro like '%$texto%'";
		}else if($tabela == 'ccr'){
			if($filtro == 'nomeCcr'){
				$sql = $sql . "ccr.$filtro like '%$texto%'";
			}else{
				$sql = $sql . "ccr.$filtro=$texto";
			}
		}else if($tabela == 'dominio'){
			$sql = $sql . "dominio.$filtro like '%$texto%'";
		}
		
		$r = $this->database->dbConsulta($sql);
		
		return $r;
		
	}
	
	function selectCursoInfo(){
		$sql = "SELECT * FROM curso WHERE regValido=1";
		
		$r = $this->database->dbConsulta($sql);
		
		return $r;
	}
	////////////////////////////////////////
	function selectServidorDados($data){
		$filtro = $data['filtro'];
		$texto = $data['texto'];
		$tabela = $data['tabela'];
		
		/*$sql = "SELECT DISTINCT curso.nomeCurso, servidor.siape, servidor.nome, servidor.sobrenome, servidor.observacao, servidor.quemSubstitui, cargo.cargo, jornada.jornada,
		 situacaoServidor.situacao, servidor.email, servidor.fone1, servidor.fone2, servidor.endereco, servidor.cidade FROM servidorCursoCcr
		 JOIN servidor USING ( siape ) JOIN jornada USING ( idJornada ) JOIN cargo USING ( idCargo ) 
		 JOIN situacaoServidor USING ( idSituacaoServidor ) JOIN cursoCcr USING ( codCurso ) JOIN curso USING ( codCurso ) 
		 WHERE servidor.regValido=1 AND jornada.regValido=1 AND cargo.regValido=1 AND situacaoServidor.regValido=1 AND curso.regValido = 1 AND ";
		*/
		$sql = "SELECT DISTINCT * FROM servidor 
				JOIN jornada USING ( idJornada )
				JOIN cargo USING ( idCargo ) 
				JOIN situacaoServidor USING ( idSituacaoServidor )
				WHERE servidor.regValido=1
				AND jornada.regValido=1
				AND cargo.regValido=1
				AND situacaoServidor.regValido=1
				AND ";
		
		if($tabela == 'servidor'){
			if($filtro == 'nome'){
				$sql = $sql . "servidor.$filtro like '%$texto%' OR servidor.sobrenome like '%$texto%'";
			}else if($filtro == 'siape'){
				$sql = $sql . "servidor.$filtro like '%$texto%'";
			}else{
				//erro
			}
		}else if($tabela == 'cargo'){
			$sql = $sql . "cargo.$filtro like '%$texto%'";
		}else if($tabela == 'curso'){
			$sql = $sql . "curso.$filtro like '%$texto%'";
		}else{
			return false;
		}
		$r = $this->database->dbConsulta($sql);
		
		return $r;
		
	}
	
		
	/////////////////////
	
	function selectDominio($data){
		$id = $data['id'];
		
		$sql = "SELECT * FROM dominio WHERE dominio.regValido=1 AND idDominio='$id'";
		$r = $this->database->dbConsulta($sql);
		
		return $r;
	}
/****************************************************Fim das funções de seleção****************************************/
/**/
/****************************************************Inicio das funções de alteração****************************************/
	function updateFuncao($data){
		$id = $data['id'];
		$funcao = $data['funcao'];
		
		$sql = "UPDATE funcao SET idFuncao=$id, funcao=";
		if(empty($funcao)){
			$sql = $sql . "NULL";
		}else{
			$sql = $sql . "'$funcao'";
		}
		$sql = $sql . " WHERE idFuncao=$id AND regValido=1";
		
		$r = $this->database->dbConsulta($sql);
		
		return $r;
	}
	
	function updateServidorFuncao($data){
		$idFuncao = $data['idFuncao'];
		$siape = $data['siape'];
		$dataInicio = $data['dataInicio'];
		$dataSaida = $data['dataSaida'];
		$cargaHoraria = $data['cargaHoraria'];
		
		$sql = "UPDATE servidorFuncao SET idFuncao=$id, siape=$siape, dataInicio='$dataInicio', dataSaida=";
		if(empty($dataSaida)){
			$sql = $sql . "NULL";
		}else{
			$sql = $sql . "'$dataSaida'";
		}
		$sql = $sql . ", cargaHoraria=$cargaHoraria WHERE idFuncao=$idFuncao AND siape='$siape' AND dataInicio='$dataInicio' AND regValido=1";
		
		$r = $this->database->dbConsulta($sql);
		
		return $r;
	}
	
	function updateCargo($data){
		$id = $data['id'];
		$cargo = $data['cargo'];
		
		$sql = "UPDATE cargo SET idCargo=$id, cargo=";
		
		if(empty($cargo)){
			$sql = $sql . "NULL";
		}else{
			$sql = $sql . "'$cargo'";
		}
		$sql = $sql . " WHERE idCargo=$id AND regValido=1";
		
		$r = $this->database->dbConsulta($sql);
		
		return $r;
	}
	
	function updateJornada($data){
		$id = $data['id'];
		$jornada = $data['jornada'];
		
		$sql = "UPDATE jornada SET idJornada=$id, jornada=";
		if(empty($jornada)){
			$sql = $sql . "NULL";
		}else{
			$sql = $sql . "'$jornada'";
		}
		$sql = $sql . " WHERE idJornada=$id AND regValido=1";
		
		$r = $this->database->dbConsulta($sql);
		
		return $r;
	}
	
	function updateSituacaoServidor($data){
		$id = $data['id'];
		$situacao = $data['situacao'];
		$dataEntrada = $data['dataEntrada'];
		$dataSaida = $data['dataSaida'];
		
		$sql = "UPDATE situacaoServidor SET idSituacaoServidor=$id, situacao=";
		if(empty($situacao)){
			$sql = $sql . "NULL";
		}else{
			$sql = $sql . "'$situacao'";
		}
		$sql = $sql . ", dataEntrada=";
		if(empty($dataEntrada)){
			$sql = $sql . "NULL";
		}else{
			$sql = $sql . "'$dataEntrada'";
		}
		$sql = $sql . ", dataSaida=";
		if(empty($dataSaida)){
			$sql = $sql . "NULL";
		}else{
			$sql = $sql . "'$dataSaida'";
		}
		$sql = $sql . " WHERE idSituacaoServidor=$id AND regValido=1";
		
		$r = $this->database->dbConsulta($sql);
		
		return $r;
	}
	
	function updateNivelServidor($data){
		$id = $data['id'];
		$nivel = $data['nivel'];
		
		$sql = "UPDATE nivelServidor SET idNivelServidor=$id, nivel=";
		
		if(empty($nivel)){
			$sql = $sql . "NULL";
		}else{
			$sql = $sql . "'$nivel'";
		}
		$sql = $sql . " WHERE idNivelServidor=$id AND regValido=1";
		
		$r = $this->database->dbConsulta($sql);
		
		return $r;
	}
	
	function updateServidor($data){
		$siape = $data['siape'];
		$nome = $data['nome'];
		$sobrenome = $data['sobrenome'];
		$observacao = $data['observacao'];
		$quemSubstitui = $data['quemSubstitui'];
		$idCargo = $data['idCargo'];
		$idJornada = $data['idJornada'];
		$idSituacaoServidor = $data['idSituacaoServidor'];
		$email = $data['email'];
		$fone1 = $data['fone1'];
		$fone2 = $data['fone2'];
		$endereco = $data['endereco'];
		$cidade = $data['cidade'];
		$idNivelServidor = $data['idNivelServidor'];
		
		$sql = "UPDATE servidor SET siape='$siape', nome='$nome', sobrenome='$sobrenome', idCargo=$idCargo,
				idJornada=$idJornada, idSituacaoServidor=$idSituacaoServidor, idNivelServidor=idNivelServidor, observacao=";
		
		if(empty($observacao)){
			$sql = $sql . "NULL";
		}else{
			$sql = $sql . "'$observacao'";
		}
		$sql = $sql . ", quemSubstitui=";
		if(empty($quemSubstitui)){
			$sql = $sql . "NULL";
		}else{
			$sql = $sql . "'$quemSubstitui'";
		}
		$sql = $sql . ", email=";
		if(empty($email)){
			$sql = $sql . "NULL";
		}else{
			$sql = $sql . "'$email'";
		}
		$sql = $sql . ", fone1=";
		if(empty($fone1)){
			$sql = $sql . "NULL";
		}else{
			$sql = $sql . "'$fone1'";
		}
		$sql = $sql . ", fone2=";
		if(empty($fone2)){
			$sql = $sql . "NULL";
		}else{
			$sql = $sql . "'$fone2'";
		}
		$sql = $sql . ", endereco=";
		if(empty($endereco)){
			$sql = $sql . "NULL";
		}else{
			$sql = $sql . "'$endereco'";
		}
		$sql = $sql . ", cidade=";
		if(empty($cidade)){
			$sql = $sql . "NULL";
		}else{
			$sql = $sql . "'$cidade'";
		}
		$sql = $sql . " WHERE siape='$siape' AND regValido=1";
		
		$r = $this->database->dbConsulta($sql);
		
		return $r;
	}
	
	function updateNivelCurso($data){
		$id = $data['id'];
		$nivel = $data['nivel'];
		
		$sql = "UPDATE nivelCurso SET idNivelCurso=$id, nomeNivelCurso=";
		
		if(empty($nivel)){
			$sql = $sql . "NULL";
		}else{
			$sql = $sql . "'$nivel'";
		}
		$sql = $sql . " WHERE idNivelCurso=$id AND regValido=1";
		
		$r = $this->database->dbConsulta($sql);
		
		return $r;
	}
	
	function updateCurso($data){
		$codCurso = $data['codCurso'];
		$nome = $data['nome'];
		$idNivelCurso = $data['idNivelCurso'];
		
		$sql = "UPDATE curso SET codCurso=$codCurso, idNivelCurso=$idNivelCurso, nomeCurso=";
		
		if(empty($nome)){
			$sql = $sql . "NULL";
		}else{
			$sql = $sql . "'$nome'";
		}
		$sql = $sql . " WHERE codCurso=$codCurso AND regValido=1";
		
		$r = $this->database->dbConsulta($sql);
		
		return $r;
	}
	
	function updateDominio($data){
		$id = $data['id'];
		$dominio = $data['dominio'];
		
		$sql = "UPDATE dominio SET idDominio=$id, nomeDominio=";
		
		if(empty($dominio)){
			$sql = $sql . "NULL";
		}else{
			$sql = $sql . "'$dominio'";
		}
		$sql = $sql . " WHERE idDominio=$id AND regValido=1";
		
		$r = $this->database->dbConsulta($sql);
		
		return $r;
	}
	
	function updateCcr($data){
		$codCcr = $data['codCcr'];
		$nome = $data['nome'];
		$cHoraria = $data['cHoraria'];
		$idDominio = $data['idDominio'];
		
		$sql = "UPDATE ccr SET codCcr=$codCcr, idDominio=$idDominio, nomeCcr=";
		
		if(empty($nome)){
			$sql = $sql . "NULL";
		}else{
			$sql = $sql . "'$nome'";
		}
		$sql = $sql . ", cHoraria=";
		if(empty($cHoraria)){
			$sql = $sql . "NULL";
		}else{
			$sql = $sql . "$cHoraria";
		}
		$sql = $sql . " WHERE codCcr=$codCcr AND regValido=1";
		
		$r = $this->database->dbConsulta($sql);
		
		return $r;
	}
	
	function updateCursoCcr($data){
		$codCcr = $data['codCcr'];
		$codCurso = $data['codCurso'];
		
		$sql = "UPDATE cursoCcr SET codCcr=$codCcr, codCurso=$codCurso WHERE codCcr=$codCcr AND codCurso=$codCurso AND regValido=1";
		
		$r = $this->database->dbConsulta($sql);
		
		return $r;
	}
	
	function updateUsuarioServidor($data){//Função que o servidor altera seus dados.
		$siape = $data['siape'];
		$email = $data['email'];
		$fone1 = $data['fone1'];
		$fone2 = $data['fone2'];
		$endereco = $data['endereco'];
		$cidade = $data['cidade'];
		
		$sql = "UPDATE servidor SET email=";
		if(empty($email)){
			$sql = $sql . "NULL";
		}else{
			$sql = $sql . "'$email'";
		}
		$sql = $sql . ", fone1=";
		if(empty($fone1)){
			$sql = $sql . "NULL";
		}else{
			$sql = $sql . "'$fone1'";
		}
		$sql = $sql . ", fone2=";
		if(empty($fone2)){
			$sql = $sql . "NULL";
		}else{
			$sql = $sql . "'$fone2'";
		}
		$sql = $sql . ", endereco=";
		if(empty($endereco)){
			$sql = $sql . "NULL";
		}else{
			$sql = $sql . "'$endereco'";
		}
		$sql = $sql . ", cidade=";
		if(empty($cidade)){
			$sql = $sql . "NULL";
		}else{
			$sql = $sql . "'$cidade'";
		}
		$sql = $sql . " WHERE siape='$siape' AND regValido=1";
		
		$r = $this->database->dbConsulta($sql);
		
		return $r;
	}
	
	function esqueciMinhaSenha($data){//Altera a senha do servidor
		$siape = $data['siape'];
		$senha = $data['senha'];
		
		$sql = "UPDATE servidor SET senha='$senha' WHERE siape='$siape' AND regValido=1";
		
		$r = $this->database->dbConsulta($sql);
		
		return $r;
	}
/****************************************************Fim das funções de alteração****************************************/
/**/
/****************************************************Inicio das funções de delete****************************************/
	function deleteFuncao($data){
		$id = $data['id'];
		
		$sql = "UPDATE funcao SET regValido=0 WHERE idFuncao=$id";
		
		$r = $this->database->dbConsulta($sql);
		
		return $r;
	}
	
	function deleteServidorFuncao($data){
		$idFuncao = $data['idFuncao'];
		$siape = $data['siape'];
		$dataInicio = $data['dataInicio'];
		
		$sql = "UPDATE servidorFuncao SET regValido=0 WHERE idFuncao=$idFuncao AND siape='$siape' AND dataInicio='$dataInicio'";
		
		$r = $this->database->dbConsulta($sql);
		
		return $r;
	}
	
	function deleteCargo($data){
		$id = $data['id'];
		
		$sql = "UPDATE cargo SET regValido=0 WHERE idCargo=$id";
		
		$r = $this->database->dbConsulta($sql);
		
		return $r;
	}
	
	function deleteJornada($data){
		$id = $data['id'];
		
		$sql = "UPDATE jornada SET regValido=0 WHERE idJornada=$id";
		
		$r = $this->database->dbConsulta($sql);
		
		return $r;
	}
	
	function deleteSituacaoServidor($data){
		$id = $data['id'];
		
		$sql = "UPDATE situacaoServidor SET regValido=0 WHERE idSituacaoServidor=$id";
		
		$r = $this->database->dbConsulta($sql);
		
		return $r;
	}
	
	function deleteNivelServidor($data){
		$id = $data['id'];
		
		$sql = "UPDATE nivelServidor SET regValido=0 WHERE idNivelServidor=$id";
		
		$r = $this->database->dbConsulta($sql);
		
		return $r;
	}
	
	function deleteServidor($data){
		$siape = $data['siape'];
		
		$sql = "UPDATE servidor SET regValido=0 WHERE siape='$siape'";
		
		$r = $this->database->dbConsulta($sql);
		
		return $r;
	}
	
	function deleteNivelCurso($data){
		$id = $data['id'];
		
		$sql = "UPDATE nivelCurso SET regValido=0 WHERE idNivelCurso=$id";
		
		$r = $this->database->dbConsulta($sql);
		
		return $r;
	}
	
	function deleteDominio($data){
		$id = $data['id'];
		
		$sql = "UPDATE dominio SET regValido=0 WHERE idDominio=$id";
		
		$r = $this->database->dbConsulta($sql);
		
		return $r;
	}
	
	function deleteCcr($data){
		$codCcr = $data['codCcr'];
		
		$sql = "UPDATE ccr SET regValido=0 WHERE codCcr=$codCcr";
		
		$r = $this->database->dbConsulta($sql);
		
		return $r;
	}
	
	function deleteCursoCcr($data){
		$codCcr = $data['codCcr'];
		$codCurso = $data['codCurso'];
		
		$sql = "UPDATE cursoCcr SET regValido=0 WHERE codCcr=$codCcr AND codCurso=$codCurso";
		
		$r = $this->database->dbConsulta($sql);
		
		return $r;
	}
/****************************************************Fim das funções de delete****************************************/
/**/
	
	function login($data){
		$user = $data['user'];
		$pass = $data['pass'];
		
		$sql = "SELECT nome, 
		               sobrenome,
					   nivelServidor.idNivelServidor
			 	  FROM servidor
				  JOIN nivelServidor using(idNivelServidor)
				 WHERE (siape='$user' OR email='$user')
				   AND senha='$pass'
				   AND servidor.regValido=1";
		
		$r = $this->database->dbConsulta($sql);
		
		return $r;
	}
/*FUNCOES DESENVOLVIDAS POR FERNANDONESI@GMAIL.COM*/
	function selectServidor(){
		$sql = "SELECT *
		          FROM servidor
				  JOIN nivelServidor using(idNivelServidor)
				  ORDER BY idNivelServidor";

		$r=$this->database->dbConsulta($sql);
		return $r;
	}

	function selectMenu($nivel){
		$sql = "SELECT nomeAreaMenu,
		               descricaoAreaMenu,
					   linkAreaMenu
		          FROM areaMenu
				  JOIN nivelServidor_areaMenu using(idAreaMenu)				  
				  WHERE visivel = 1
				  AND nivelServidor_areaMenu.idNivelServidor = ".$nivel."
			 ORDER BY descricaoAreaMenu";		
		$r = $this->database->dbConsulta($sql);
		return $r;
	}
	
	function selectAreas(){
		$sql = "SELECT nivelServidor_areaMenu.idAreaMenu,
					   areaMenu.descricaoAreaMenu,
					   areaMenu.nomeAreaMenu,
		               nivelServidor_areaMenu.idNivelServidor,
					   nivelServidor.nivel,
					   visivel
		          FROM nivelServidor_areaMenu
				 JOIN nivelServidor using(idNivelServidor)
				 JOIN areaMenu using(idAreaMenu)
			 ORDER BY areaMenu.descricaoAreaMenu, nivelServidor.nivel";		
		$r = $this->database->dbConsulta($sql);
		return $r;
	}
	
	function setarArea($area, $nivel, $set){
		$sql = "UPDATE nivelServidor_areaMenu set visivel=".$set." WHERE idNivelServidor=".$nivel." AND idAreaMenu=".$area." ";
		$r = $this->database->dbConsulta($sql);
		return $r;
	}
	
	function insertArea($nome, $descricao, $link){
		$sql = "INSERT INTO areaMenu (idAreaMenu, nomeAreaMenu, descricaoAreaMenu, linkAreaMenu)
		VALUES (NULL, '".$nome."', '".$descricao."', '".$link."')";
		$r = $this->database->dbConsulta($sql);
		
		$sql = "SELECT max(idAreaMenu) as idAreaMenu FROM areaMenu";
		$r = $this->database->dbConsulta($sql);
		$row = mysqli_fetch_array($r);
		
		$sql = "INSERT INTO nivelServidor_areaMenu (idAreaMenu, idNivelServidor, visivel) VALUES ('".$row['idAreaMenu']."', '0', '0')";
		$r = $this->database->dbConsulta($sql);
		
		$sql = "INSERT INTO nivelServidor_areaMenu (idAreaMenu, idNivelServidor, visivel) VALUES ('".$row['idAreaMenu']."', '1', '0')";
		$r = $this->database->dbConsulta($sql);
		
		$sql = "INSERT INTO nivelServidor_areaMenu (idAreaMenu, idNivelServidor, visivel) VALUES ('".$row['idAreaMenu']."', '2', '0')";
		$r = $this->database->dbConsulta($sql);
		
		$sql = "INSERT INTO nivelServidor_areaMenu (idAreaMenu, idNivelServidor, visivel) VALUES ('".$row['idAreaMenu']."', '3', '0')";
		$r = $this->database->dbConsulta($sql);
		
		return $r;		
	}
	
	//@parametros (string, integer);
	//@parametros (nome da pagina, id do nivel do servidor)
	//@retorno respectivos IDs e parametro visivel(TRUE ou FALSE)
	function selectAcessoRecusado($areaMenu, $idNivelServidor){
		$sql = "SELECT nivelServidor_areaMenu.idAreaMenu,
					   nivelServidor_areaMenu.idNivelServidor,					   
					   nivelServidor_areaMenu.visivel,
					   areaMenu.linkAreaMenu
		          FROM nivelServidor_areaMenu
				  JOIN areaMenu using(idAreaMenu)
				 WHERE areaMenu.linkAreaMenu = '$areaMenu'
				   AND idNivelServidor = $idNivelServidor";
		$r = $this->database->dbConsulta($sql);		
		return $r;				
	}
	
	function selectUmServidor($siape){
		$sql = "SELECT siape,
					   nome,
					   sobrenome
		          FROM servidor
				 WHERE siape = $siape";
		$r = $this->database->dbConsulta($sql);		
		return $r;				
	}
	
	function selectListaNivelCurso(){
		$sql = "SELECT *
		          FROM nivelCurso";
		$r = $this->database->dbConsulta($sql);		
		return $r;				
	}
	function selectListaUmNivelCurso($nivel){
		$sql = "SELECT *
		          FROM nivelCurso
		         WHERE idNivelCurso = $nivel";
		$r = $this->database->dbConsulta($sql);		
		return $r;				
	}
	
	function selectListaCurso($idNivelCurso){
		$sql = "SELECT *
		          FROM curso
				 WHERE idNivelCurso = '$idNivelCurso'";
		$r = $this->database->dbConsulta($sql);		
		return $r;				
	}
	
	function selectListaCcr($codCurso){
		$sql = "SELECT *
		          FROM cursoCcr 
				 JOIN ccr using (codCcr)
				 WHERE cursoCcr.codCurso = '$codCurso'";
		$r = $this->database->dbConsulta($sql);	
		return $r;				
	}
	
	function selectServidorCursoCcr($anoSemestre, $nivelCurso, $codCurso, $codCcr, $idDominio, $siape){
		$sql = "SELECT scc.anoSemestre,
					s.siape,
					s.nome,
					s.sobrenome,
					ccr.codCcr,
					ccr.nomeCcr,
					ccr.cHoraria,
					d.nomeDominio,
					c.codCurso,
					c.nomeCurso,
					n.nomeNivelCurso
			 FROM servidorCursoCcr scc
			 JOIN servidor s USING(siape)
			 JOIN cursoCcr cc USING(codCurso, codCcr)
			 JOIN ccr ccr USING(codCcr)
			 JOIN dominio d USING(idDominio)
			 JOIN curso c USING(codCurso)
			 JOIN nivelCurso n USING(idNivelCurso)
			WHERE scc.anoSemestre = '$anoSemestre'
			  AND (n.idNivelCurso = $nivelCurso OR $nivelCurso = 0)
			  AND (c.codCurso = $codCurso OR $codCurso = 0)
			  AND (ccr.codCcr = $codCcr OR $codCcr = 0)
			  AND (d.idDominio = $idDominio OR $idDominio = 0)
			  AND (s.siape = $siape OR $siape = 0)";
     
		$r = $this->database->dbConsulta($sql);
		return $r;
	}
	
	function selectCursoCcr($nivel,$curso){
		$sql = "
			SELECT * FROM cursoCcr NATURAL JOIN curso NATURAL JOIN ccr NATURAL JOIN dominio
			WHERE idNivelCurso = $nivel AND codCurso = $curso;
			";
		$r = $this->database->dbConsulta($sql);
		//novo
		return $r;
	}
	function insertServidorCursoCcr($data){
		$anoSemestre = $data['anoSemestre'];
		$codCurso = $data['codCurso'];
		$codCcr = $data['codCcr'];
		$siape = $data['siape'];
		$observacoes = $data['observacoes'];
		
		$sql = "
			INSERT INTO servidorCursoCcr(anoSemestre, codCurso, codCcr, siape, observacoes, regValido)
			VALUES ('$anoSemestre', '$codCurso', '$codCcr', '$siape', '$observacoes', '1');
			";
		$r = $this->database->dbConsulta($sql);
		return $r;
		
	}

/*FUNCOES DESENVOLVIDAS POR FERNANDONESI@GMAIL.COM*/

/*INICIO FUNCOES DESENVOLVIDAS POR JACSONMATTE@GMAIL.COM*/

	function buscaCargos(){
		$sql = "SELECT cargo, idCargo FROM cargo WHERE regValido=1";
		$r = $this->database->dbConsulta($sql);		
		return $r;	
	}
	
	function buscaCargo($cargo){
		$sql = "SELECT cargo FROM cargo WHERE cargo='$cargo' AND regValido=1";
		$r = $this->database->dbConsulta($sql);		
		return $r;	
	}
	
	function buscaJornadas(){
		$sql = "SELECT jornada, idJornada FROM jornada WHERE regValido=1";
		$r = $this->database->dbConsulta($sql);		
		return $r;	
	}
	
	function buscaJornada($jornada){
		$sql = "SELECT jornada FROM jornada WHERE jornada='$jornada' AND regValido=1";
		$r = $this->database->dbConsulta($sql);		
		return $r;	
	}
	function buscaSituacoes(){
		$sql = "SELECT situacao, idSituacaoServidor FROM situacaoServidor WHERE  regValido=1";
		$r = $this->database->dbConsulta($sql);		
		return $r;	
	}
	
	function buscaSituacao($situacao){
		$sql = "SELECT situacao FROM situacaoServidor WHERE situacao='$situacao' AND  regValido=1";
		$r = $this->database->dbConsulta($sql);		
		return $r;	
	}
	
	function buscaNiveis(){
		$sql = "SELECT nivel, idNivelServidor FROM nivelServidor WHERE regValido=1";
		$r = $this->database->dbConsulta($sql);		
		return $r;	
	}
	
	function buscaNivel($nivel){
		$sql = "SELECT nivel FROM nivelServidor WHERE nivel='$nivel' AND regValido=1";
		$r = $this->database->dbConsulta($sql);		
		return $r;	
	}
	
	function sqlInsereCargo($cargo){
		$sql="INSERT INTO cargo(cargo, regValido) VALUES ('$cargo',1)";
		$this->database->dbConsulta($sql);
	}
	
	function sqlInsereSituacao($situacao){
		$sql="INSERT INTO situacaoServidor(situacao, regValido) VALUES ('$situacao',1)";
		$this->database->dbConsulta($sql);
	}
	
	
	function sqlExcluiNivel($nivel){
		$sql="UPDATE nivelServidor SET regValido=0 WHERE nivel='$nivel'";
		$this->database->dbConsulta($sql);
	}
	
	function sqlExcluiJornada($jornada){
		$sql="UPDATE jornada SET regValido=0 WHERE jornada='$jornada'";
		$this->database->dbConsulta($sql);
	}
	
	function sqlExcluiCargo($cargo){
		$sql="UPDATE cargo SET regValido=0 WHERE cargo='$cargo'";
		$this->database->dbConsulta($sql);
	}
	
	
	function sqlInsereServidor($inputSiape, $inputNome,$inputSobrenome, $inputEmail, $inputSenha,
	                		   $inputEndereco, $inputCidade, $inputTelefone, $inputCelular, $inputCargo, $inputJornada, 
	                		   $inputSituacao, $inputDataEntrada, $inputDataSaida, $inputNivel, $inputSubstituto, $inputObservacao){
		$sql = "SELECT idNivelServidor FROM nivelServidor WHERE nivel='$inputNivel' AND regValido=1";
		$r = $this->database->dbConsulta($sql);
		$sql1 = "SELECT idSituacaoServidor FROM situacaoServidor WHERE situacao='$inputSituacao' AND regValido=1";
		$r1 = $this->database->dbConsulta($sql1);
		$sql2 = "SELECT idJornada FROM jornada WHERE jornada='$inputJornada' AND regValido=1";
		$r2 = $this->database->dbConsulta($sql2);
		$sql3 = "SELECT idCargo FROM cargo WHERE cargo='$inputCargo' AND regValido=1";
		$r3 = $this->database->dbConsulta($sql3);
		$rNivel = mysqli_fetch_array($r);
		$inputNivel=$rNivel["idNivelServidor"];
		$rSituacao = mysqli_fetch_array($r1);
		$inputJornada=$rSituacao['idSituacaoServidor'];
		$rJornada = mysqli_fetch_array($r2);
		$inputJornada=$rJornada['idJornada'];
		$rCargo = mysqli_fetch_array($r3);
		$inputCargo=$rCargo['idCargo'];
		$senha=md5($inputSenha);
		
		$sql4 = "INSERT INTO servidor(siape, nome, sobrenome, email, senha, endereco, cidade, fone1, fone2, idCargo, idJornada,  idSituacaoServidor, idNivelServidor, quemSubstitui, observacao,  regValido) 
		VALUES ('$inputSiape', '$inputNome','$inputSobrenome', '$inputEmail', '$senha',
	          '$inputEndereco', '$inputCidade', '$inputTelefone', '$inputCelular', '$inputCargo', '$inputJornada', 
	       '$inputSituacao', '$inputNivel', '$inputSubstituto', '$inputObservacao', 1)" ;
		$this->database->dbConsulta($sql4);
	}
/*FIM FUNCOES DESENVOLVIDAS POR JACSONMATTE@GMAIL.COM*/

/* INÍCIO FUNÇÕES DESENVOLVIDAS POR ANDREI TOLEDO */

	function selectNivelCurso(){
		$sql = "SELECT * FROM nivelCurso
				WHERE regValido = 1";
		$retorno = $this->database->dbConsulta($sql);
		return $retorno;
	}

/* FIM DAS FUNÇÕES DESENVOLVIDAS POR ANDREI TOLEDO*/
}

?>
