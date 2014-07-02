<?php
	require_once dirname(__FILE__).'/../ink/database.php';//banco de dados

	function test(){
		$sql = "SELECT * FROM nivelServidor";
		
		$r=dbConsulta($sql);
		return $r;
	}

	/****************************************************Inicio das funчѕes de inserчуo****************************************/
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
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function insertServidorFuncao($data){
		$idFuncao = $data['idFuncao'];
		$siape = $data['siape'];
		$dataInicio = $data['dataInicio'];
		$dataSaida = $data['dataSaida'];
		$cargaHoraria = $data['cargaHoraria'];
		$regValido = $data['regValido'];
		
		$sql = "INSERT INTO servidorfuncao (idFuncao, siape, dataInicio, cargaHoraria, regValido, dataSaida) 
				VALUES ($idFuncao, '$siape', '$dataInicio', $cargaHoraria, $regValido";
		if(empty($dataSaida)){
			$sql = $sql . ", NULL";
		}else{
			$sql = $sql . ", '$dataSaida'";
		}
		$sql = $sql . ")";
		
		$r = dbConsulta($sql);
		
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
		
		$r = dbConsulta($sql);
		
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
		
		$r = dbConsulta($sql);
		
		return $r;
	}
		
	function insertSituacaoServidor($data){
		$situacao = $data['situacao'];
		$dataEntrada = $data['dataEntrada'];
		$dataSaida = $data['dataSaida'];
		$regValido = $data['regValido'];
		
		$sql = "INSERT INTO situacaoservidor (regValido, situacao, dataEntrada, dataSaida)
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
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function insertNivelServidor($data){
		$nivel = $data['nivel'];
		$regValido = $data['regValido'];
		
		$sql = "INSERT INTO nivelservidor (regValido, nivel) VALUES ($regValido";
		
		if(empty($nivel)){
			$sql = $sql . ", NULL";
		}else{
			$sql = $sql . ", '$nivel'";
		}
		$sql = $sql . ")";
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function insertAreaMenu($data){
		$nomeAreaMenu = $data['nomeAreaMenu'];
		$descricaoAreaMenu = $data['descricaoAreaMenu'];
		$linkAreaMenu = $data['linkAreaMenu'];
		
		$sql = "INSERT INTO areamenu (nomeAreaMenu, descricaoAreaMenu, linkAreaMenu) VALUES (";
		
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
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function insertNivelServidorAreaMenu($data){
		$idNivelServidor = $data['idNivelServidor'];
		$idAreaMenu = $data['idAreaMenu'];
		
		$sql = "INSERT INTO nivelservidor_areamenu (idNivelServidor, idAreaMenu) VALUES ($idNivelServidor, $idAreaMenu)";
		
		$r = dbConsulta($sql);
		
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
		
		$sql = "INSERT INTO servidores (siape, nome, sobrenome, idCargo, idJornada, idSituacaoServidor, idNivelServidor, regValido, observacao, quemSubstitui, email, fone1, fone2, endereco, cidade, senha)
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
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function insertNivelCurso($data){
		$nivel = $data['nivel'];
		$regValido = $data['regValido'];
		
		$sql = "INSERT INTO nivelcursos (regValido, nomeNivelCurso) VALUES ($regValido";
		
		if(empty($nivel)){
			$sql = $sql . ", NULL";
		}else{
			$sql = $sql . ", '$nivel'";
		}
		$sql = $sql . ")";
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function insertCurso($data){
		$codCurso = $data['codCurso'];
		$nome = $data['nome'];
		$idNivelCurso = $data['idNivelCurso'];
		$regValido = $data['regValido'];
		
		$sql = "INSERT INTO curso (codCurso, idNivelCursos, regValido, nomeCurso) VALUES ($codCurso, $idNivelCurso, $regValido";
		
		if(empty($nome)){
			$sql = $sql . ", NULL";
		}else{
			$sql = $sql . ", '$nome'";
		}
		$sql = $sql . ")";
		
		$r = dbConsulta($sql);
		
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
		
		$r = dbConsulta($sql);
		
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
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function insertCursoCcr($data){
		$codCcr = $data['codCcr'];
		$codCurso = $data['codCurso'];
		$regValido = $data['regValido'];
		
		$sql = "INSERT INTO cursoccr (codCcr, codCurso, regValido) VALUES ($codCcr, $codCurso, $regValido)";
		
		$r = dbConsulta($sql);
		
		return $r;
	}
/*******************daqui
	function insertSala($dados){
		$numBlock = $dados['numBlock'];
		$numClass = $dados['numClass'];
		$descrition = $dados['descrition'];

		$sql = "INSERT INTO sala (numBloco, numSala, descricaoSala) VALUES ('$numBlock', $numClass";
		
		if(empty($descrition)){
			$sql = $sql . ", NULL";
		}else{
			$sql = $sql . ", '$description'";
		}
		$sql = $sql . ")";
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function insertStatusAlocacao($dados){
		$id = $data['id'];
		$description = $data['descrition'];

		$sql = "INSERT INTO statusalocacao (idStatusAlocacao, descricaoStatusAlocacao) VALUES ($id";
		
		if(empty($descrition)){
			$sql = $sql . ", NULL";
		}else{
			$sql = $sql . ", '$description'";
		}
		$sql = $sql . ")";
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function insertPeriodo($data){
		$idPeriod = $data['idPeriod'];
		$idSubPeriod = $data['idSubPeriod'];
		$period = $data['period'];
		$startHour = $data['startHour'];
		$endHour = $data['endHour'];
		
		$sql = "INSERT INTO periodos (idPeriodo, idSubPeriodo, periodo, horaInicio, horaFim) 
				VALUES ($idPeriod, $idSubPeriod";
		if(empty($period)){
			$sql = $sql . 'NULL,';
		}else{
			$sql = $sql . ", $period";
		}
		if(empty($startHour)){
			$sql = $sql . ', NULL';
		}else{
			$sql = $sql . ", $startHour";
		}
		if(empty($endHour)){
			$sql = $sql . ', NULL';
		}else{
			$sql = $sql . ", $endHour";
		}
		$sql = $sql . ")";
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function getIdTableAlocacao(){
		$sql = "SELECT idAlocacao FROM alocacao ORDER BY idAlocacao DESC LIMIT 1";
		
		$r = dbConsulta($sql);
		return $r;
	}
	
	function insertAlocacao($data){
		//$id = $data['id'];
		$numBlock = $data['numBlock'];
		$numClass = $data['numClass'];
		$idHorary = $data['idHorary'];
		$regValido = $data['regValido'];
		
		/*$sql = "INSERT INTO alocacao (numBloco, numSala, idHorario, regValido)
				VALUES ('$numBlock', '$numClass', '$idHorary', $regValido)";//Verificar a existencia de auto-increment
		
		$sql = "INSERT INTO alocacao (numBloco, numSala, idHorario, regValido)
				VALUES ('$numBlock', $numClass, $idHorary, $regValido)";
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function insertServidorCursoCcr($data){
		$semesterYear = $data['semesterYear'];
		$codCcr = $data['codCcr'];
		$codCourse = $data['codCourse'];
		$siape = $data['siape'];
		$alocation = $data['alocation'];
		$observation = $data['observation'];
		$regValido = $data['regValido'];
		
		if(empty($observation) && empty($alocation)){
			$sql = "INSERT INTO servidorCursoCcr (anoSemestre, codCcr, codCurso, siape, alocacao, observacoes, regValido) 
				VALUES ('$semesterYear', $codCcr, $codCourse, '$siape', NULL, NULL, $regValido)";
		}else if(empty($observation)){
			$sql = "INSERT INTO servidorCursoCcr (anoSemestre, codCcr, codCurso, siape, alocacao, observacoes, regValido) 
				VALUES ('$semesterYear', $codCcr, $codCourse, '$siape', $alocation, NULL, $regValido)";
		}else if(empty($alocation)){
			$sql = "INSERT INTO servidorCursoCcr (anoSemestre, codCcr, codCurso, siape, alocacao, observacoes, regValido) 
				VALUES ('$semesterYear', $codCcr, $codCourse, '$siape', NULL, '$observation', $regValido)";
		}else{
			$sql = "INSERT INTO servidorCursoCcr (anoSemestre, codCcr, codCurso, siape, alocacao, observacoes, regValido) 
				VALUES ('$semesterYear', $codCcr, $codCourse, '$siape', $alocation, '$observation', $regValido)";
		}
		
		$r = dbConsulta($sql);
		
		return $r;
	}
*******************************atщ aqui/
/****************************************************Fim das funчѕes de inserчуo****************************************/
/**/
/****************************************************Inicio das funчѕes de alteraчуo****************************************/
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
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function updateServidorFuncao($data){
		$idFuncao = $data['idFuncao'];
		$siape = $data['siape'];
		$dataInicio = $data['dataInicio'];
		$dataSaida = $data['dataSaida'];
		$cargaHoraria = $data['cargaHoraria'];
		
		$sql = "UPDATE servidorfuncao SET idFuncao=$id, siape=$siape, dataInicio='$dataInicio', dataSaida=";
		if(empty($dataSaida)){
			$sql = $sql . "NULL";
		}else{
			$sql = $sql . "'$dataSaida'";
		}
		$sql = $sql . ", cargaHoraria=$cargaHoraria WHERE idFuncao=$idFuncao AND siape='$siape' AND dataInicio='$dataInicio' AND regValido=1";
		
		$r = dbConsulta($sql);
		
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
		
		$r = dbConsulta($sql);
		
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
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function updateSituacaoServidor($data){
		$id = $data['id'];
		$situacao = $data['situacao'];
		$dataEntrada = $data['dataEntrada'];
		$dataSaida = $data['dataSaida'];
		
		$sql = "UPDATE situacaoservidor SET idSituacaoServidor=$id, situacao=";
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
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function updateNivelServidor($data){
		$id = $data['id'];
		$nivel = $data['nivel'];
		
		$sql = "UPDATE nivelservidor SET idNivelServidor=$id, nivel=";
		
		if(empty($nivel)){
			$sql = $sql . "NULL";
		}else{
			$sql = $sql . "'$nivel'";
		}
		$sql = $sql . " WHERE idNivelServidor=$id AND regValido=1";
		
		$r = dbConsulta($sql);
		
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
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function updateNivelCurso($data){
		$id = $data['id'];
		$nivel = $data['nivel'];
		
		$sql = "UPDATE nivelcurso SET idNivelCurso=$id, nomeNivelCurso=";
		
		if(empty($nivel)){
			$sql = $sql . "NULL";
		}else{
			$sql = $sql . "'$nivel'";
		}
		$sql = $sql . " WHERE idNivelCurso=$id AND regValido=1";
		
		$r = dbConsulta($sql);
		
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
		
		$r = dbConsulta($sql);
		
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
		
		$r = dbConsulta($sql);
		
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
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function updateCursoCcr($data){
		$codCcr = $data['codCcr'];
		$codCurso = $data['codCurso'];
		
		$sql = "UPDATE cursoccr SET codCcr=$codCcr, codCurso=$codCurso WHERE codCcr=$codCcr AND codCurso=$codCurso AND regValido=1";
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function updateUsuarioServidor($data){//Funчуo que o servidor altera seus dados.
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
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function esqueciMinhaSenha($data){//Altera a senha do servidor
		$siape = $data['siape'];
		$senha = $data['senha'];
		
		$sql = "UPDATE servidor SET senha='$senha' WHERE siape='$siape' AND regValido=1";
		
		$r = dbConsulta($sql);
		
		return $r;
	}
/****************************************************Fim das funчѕes de alteraчуo****************************************/
/**/
/****************************************************Inicio das funчѕes de delete****************************************/
	function deleteFuncao($data){
		$id = $data['id'];
		
		$sql = "UPDATE funcao SET regValido=0 WHERE idFuncao=$id";
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function deleteServidorFuncao($data){
		$idFuncao = $data['idFuncao'];
		$siape = $data['siape'];
		$dataInicio = $data['dataInicio'];
		
		$sql = "UPDATE servidorfuncao SET regValido=0 WHERE idFuncao=$idFuncao AND siape='$siape' AND dataInicio='$dataInicio'";
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function deleteCargo($data){
		$id = $data['id'];
		
		$sql = "UPDATE cargo SET regValido=0 WHERE idCargo=$id";
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function deleteJornada($data){
		$id = $data['id'];
		
		$sql = "UPDATE jornada SET regValido=0 WHERE idJornada=$id";
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function deleteSituacaoServidor($data){
		$id = $data['id'];
		
		$sql = "UPDATE situacaoservidor SET regValido=0 WHERE idSituacaoServidor=$id";
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function deleteNivelServidor($data){
		$id = $data['id'];
		
		$sql = "UPDATE nivelservidor SET regValido=0 WHERE idNivelServidor=$id";
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function deleteServidor($data){
		$siape = $data['siape'];
		
		$sql = "UPDATE servidor SET regValido=0 WHERE siape='$siape'";
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function deleteNivelCurso($data){
		$id = $data['id'];
		
		$sql = "UPDATE nivelcurso SET regValido=0 WHERE idNivelCurso=$id";
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function deleteDominio($data){
		$id = $data['id'];
		
		$sql = "UPDATE dominio SET regValido=0 WHERE idDominio=$id";
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function deleteCcr($data){
		$codCcr = $data['codCcr'];
		
		$sql = "UPDATE ccr SET regValido=0 WHERE codCcr=$codCcr";
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function deleteCursoCcr($data){
		$codCcr = $data['codCcr'];
		$codCurso = $data['codCurso'];
		
		$sql = "UPDATE cursoccr SET regValido=0 WHERE codCcr=$codCcr AND codCurso=$codCurso";
		
		$r = dbConsulta($sql);
		
		return $r;
	}
/****************************************************Fim das funчѕes de delete****************************************/
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
		
		$r = dbConsulta($sql);
		
		return $r;
	}
/*FUNCOES DESENVOLVIDAS POR FERNANDONESI@GMAIL.COM*/
	function selectServidor(){
		$sql = "SELECT *
		          FROM servidor
				  JOIN nivelServidor using(idNivelServidor)
				  ORDER BY idNivelServidor";

		$r=dbConsulta($sql);
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
		$r=dbConsulta($sql);
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
		$r=dbConsulta($sql);
		return $r;
	}
	
	function setarArea($area, $nivel, $set){
		$sql = "UPDATE nivelServidor_areaMenu set visivel=".$set." WHERE idNivelServidor=".$nivel." AND idAreaMenu=".$area." ";
		$r=dbConsulta($sql);
		return $r;
	}
	
	function insertArea($nome, $descricao, $link){
		$sql = "INSERT INTO areaMenu (idAreaMenu, nomeAreaMenu, descricaoAreaMenu, linkAreaMenu)
		VALUES (NULL, '".$nome."', '".$descricao."', '".$link."')";
		$r=dbConsulta($sql);
		
		$sql = "SELECT max(idAreaMenu) as idAreaMenu FROM areaMenu";
		$r=dbConsulta($sql);
		$row = mysql_fetch_array($r);
		
		$sql = "INSERT INTO nivelServidor_areaMenu (idAreaMenu, idNivelServidor, visivel) VALUES ('".$row['idAreaMenu']."', '0', '0')";
		$r=dbConsulta($sql);
		
		$sql = "INSERT INTO nivelServidor_areaMenu (idAreaMenu, idNivelServidor, visivel) VALUES ('".$row['idAreaMenu']."', '1', '0')";
		$r=dbConsulta($sql);
		
		$sql = "INSERT INTO nivelServidor_areaMenu (idAreaMenu, idNivelServidor, visivel) VALUES ('".$row['idAreaMenu']."', '2', '0')";
		$r=dbConsulta($sql);
		
		$sql = "INSERT INTO nivelServidor_areaMenu (idAreaMenu, idNivelServidor, visivel) VALUES ('".$row['idAreaMenu']."', '3', '0')";
		$r=dbConsulta($sql);
		
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
		$r=dbConsulta($sql);		
		return $r;				
	}
	
	function selectUmServidor($siape){
		$sql = "SELECT siape,
					   nome,
					   sobrenome
		          FROM servidor
				 WHERE siape = $siape";
		$r=dbConsulta($sql);		
		return $r;				
	}

/*FUNCOES DESENVOLVIDAS POR FERNANDONESI@GMAIL.COM*/
?>