<?php
	require_once dirname(__FILE__).'/../ink/database.php';//banco de dados

	function test(){
		$sql = "SELECT * FROM nivelServidor";
		
		$r=dbConsulta($sql);
		return $r;
	}
	
	function getIdTableFuncao(){	
		$sql = "SELECT idFuncao FROM funcao ORDER BY idFuncao DESC LIMIT 1";
		
		$r = dbConsulta($sql);
		return $r;
	}
	
	function insertFuncao($data){
		$id = $data['id'];
		$function = $data['function'];
		$regValid = $data['regValid'];
		
		if(empty($function)){
			$sql = "INSERT INTO funcao (idFuncao, funcao, regValido) VALUES ($id, NULL, $regValid)";
		}else{
			$sql = "INSERT INTO funcao (idFuncao, funcao, regValido) VALUES ($id, '$function', $regValid)";
		}
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function getIdTableCargos(){
		$sql = "SELECT idCargos FROM cargos ORDER BY idCargos DESC LIMIT 1";
		
		$r = dbConsulta($sql);
		return $r;
	}
	
	function insertCargos($data){
		$id = $data['id'];
		$role = $data['role'];
		$regValid = $data['regValid'];
		
		if(empty($role)){
			$sql = "INSERT INTO cargos (idCargos, cargo, regValido) VALUES ($id, NULL, $regValid)";
		}else{
			$sql = "INSERT INTO cargos (idCargos, cargo, regValido) VALUES ($id, '$role', $regValid)";
		}
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function getIdTableJornada(){
		$sql = "SELECT idJornada FROM jornada ORDER BY idJornada DESC LIMIT 1";
		
		$r = dbConsulta($sql);
		return $r;
	}
	
	function insertJornada($data){
		$id = $data['id'];
		$run = $data['run'];
		$regValid = $data['regValid'];
		
		if(empty($run)){
			$sql = "INSERT INTO jornada (idJornada, jornada, regValido) VALUES ($id, NULL, $regValid)";
		}else{
			$sql = "INSERT INTO jornada (idJornada, jornada, regValido) VALUES ($id, '$run', $regValid)";
		}
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function getIdTableHorarios(){
		$sql = "SELECT idHorario FROM horarios ORDER BY idHorario DESC LIMIT 1";
		
		$r = dbConsulta($sql);
		return $r;
	}
	
	function insertHorarios($data){
		//$id = $data['id'];
		$idWeek = $data['idWeek'];
		$idDay = $data['idDay'];
		$idPeriod = $data['idPeriod'];
		$idSubPeriod = $data['idSubPeriod'];
		
		/*$sql = "INSERT INTO horarios (idJornada, idSemana, idDia, idPeriodo, idSubPeriodo)
				VALUES ($id, '$idWeek', '$idDay', '$idPeriod', '$idSubPeriod')";*/ //Verificar a existencia de auto-increment
		
		$sql = "INSERT INTO horarios (idSemana, idDia, idPeriodo, idSubPeriodo)
				VALUES ($idWeek, $idDay, $idPeriod, $idSubPeriod)";
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
		$regValid = $data['regValid'];
		
		/*$sql = "INSERT INTO alocacao (numBloco, numSala, idHorario, regValido)
				VALUES ('$numBlock', '$numClass', '$idHorary', $regValid)";*/ //Verificar a existencia de auto-increment
		
		$sql = "INSERT INTO alocacao (numBloco, numSala, idHorario, regValido)
				VALUES ('$numBlock', $numClass, $idHorary, $regValid)";
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function insertServidoresFuncao($data){
		$idFunction = $data['idFunction'];
		$siape = $data['siape'];
		$startDate = $data['startDate'];
		$endDate = $data['endDate'];
		$hours = $data['hours'];
		$regValid = $data['regValid'];
		
		if(empty($endDate)){
			$sql = "INSERT INTO servidoresfuncao (idFuncao, siape, dataInicio, dataSaida, cargaHoraria, regValido) 
				VALUES ($idFunction, '$siape', '$startDate', NULL, $hours, $regValid)";
		}else{
			$sql = "INSERT INTO servidoresfuncao (idFuncao, siape, dataInicio, dataSaida, cargaHoraria, regValido) 
				VALUES ($idFunction, '$siape', '$startDate', '$endDate', $hours, $regValid)";
		}
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function getIdTableSituacaoServidor(){
		$sql = "SELECT idSituacaoServidor FROM situacaoservidor ORDER BY idSituacaoServidor DESC LIMIT 1";
		
		$r = dbConsulta($sql);
		return $r;
	}
	
	function insertSituacaoServidor($data){
		$id = $data['id'];
		$situation = $data['situation'];
		$startDate = $data['startDate'];
		$endDate = $data['endDate'];
		$regValid = $data['regValid'];
		
		if(empty($startDate) && empty($endDate)){
			$sql = "INSERT INTO situacaoservidor (idSituacaoServidor, situacao, dataEntrada, dataSaida, regValido)
					VALUES ($id, '$situation', NULL, NULL, $regValid)";
		}else if(empty($startDate)){
			$sql = "INSERT INTO situacaoservidor (idSituacaoServidor, situacao, dataEntrada, dataSaida, regValido)
					VALUES ($id, '$situation', NULL, '$endDate', $regValid)";
		}else if(empty($endDate)){
			$sql = "INSERT INTO situacaoservidor (idSituacaoServidor, situacao, dataEntrada, dataSaida, regValido)
					VALUES ($id, '$situation', '$startDate', NULL, $regValid)";
		}else{
			$sql = "INSERT INTO situacaoservidor (idSituacaoServidor, situacao, dataEntrada, dataSaida, regValido)
					VALUES ($id, '$situation', '$startDate', '$endDate', $regValid)";
		}
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function getIdTableNivelServidor(){
		$sql = "SELECT idNivelServidor FROM nivelservidor ORDER BY idNivelServidor DESC LIMIT 1";
		
		$r = dbConsulta($sql);
		return $r;
	}
	
	function insertNivelServidor($data){
		$id = $data['id'];
		$nivel = $data['nivel'];
		$regValid = $data['regValid'];
		
		if(empty($nivel)){
			$sql = "INSERT INTO nivelservidor (idNivelServidor, nivel, regValido) VALUES ($id, NULL, $regValid)";
		}else{
			$sql = "INSERT INTO nivelservidor (idNivelServidor, nivel, regValido) VALUES ($id, '$nivel', $regValid)";
		}
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function insertServidores($data){
		$siape = $data['siape'];
		$firstName = $data['firstName'];
		$lastName = $data['lastName'];
		$observation = $data['observation'];
		$replace = $data['replace'];
		$idCargo = $data['idCargo'];
		$idJornada = $data['idJornada'];
		$idSituacaoServidor = $data['idSituacaoServidor'];
		$email = $data['email'];
		$phone1 = $data['phone1'];
		$phone2 = $data['phone2'];
		$address = $data['address'];
		$city = $data['city'];
		$idNivelServidor = $data['idNivelServidor'];
		$regValid = $data['regValid'];
		$pass = $data['pass'];
		
		$sql = "INSERT INTO servidores (siape, nome, sobrenome, idCargo, idJornada, idSituacaoServidor, idNivelServidor, regValido, observacao, quemSubstitui, email, fone1, fone2, endereco, cidade, senha)
				VALUES ('$siape', '$firstName', '$lastName', $idCargo, $idJornada, $idSituacaoServidor, $idNivelServidor, $regValid";
				
		if(empty($observation)){
			$sql = $sql . ", NULL";
		}else{
			$sql = $sql . ", '$observation'";
		}
		if(empty($replace)){
			$sql = $sql . ", NULL";
		}else{
			$sql = $sql . ", '$replace'";
		}
		if(empty($email)){
			$sql = $sql . ", NULL";
		}else{
			$sql = $sql . ", '$email'";
		}
		if(empty($phone1)){
			$sql = $sql . ", NULL";
		}else{
			$sql = $sql . ", '$phone1'";
		}
		if(empty($phone2)){
			$sql = $sql . ", NULL";
		}else{
			$sql = $sql . ", '$phone2'";
		}
		if(empty($address)){
			$sql = $sql . ", NULL";
		}else{
			$sql = $sql . ", '$address'";
		}
		if(empty($city)){
			$sql = $sql . ", NULL";
		}else{
			$sql = $sql . ", '$city'";
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
	
	function getIdTableNivelCursos(){
		$sql = "SELECT idNivelCursos FROM nivelcursos ORDER BY idNivelCursos DESC LIMIT 1";
		
		$r = dbConsulta($sql);
		return $r;
	}
	
	function insertNivelCursos($data){
		$id = $data['id'];
		$nivel = $data['nivel'];
		$regValid = $data['regValid'];
		
		if(empty($nivel)){
			$sql = "INSERT INTO nivelcursos (idNivelCursos, nivel, regValido) VALUES ($id, NULL, $regValid)";
		}else{
			$sql = "INSERT INTO nivelcursos (idNivelCursos, nivel, regValido) VALUES ($id, '$nivel', $regValid)";
		}
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function getIdTableDominios(){
		$sql = "SELECT idDominio FROM dominios ORDER BY idDominio DESC LIMIT 1";
		
		$r = dbConsulta($sql);
		return $r;
	}
	
	function insertDominios($data){
		$id = $data['id'];
		$domain = $data['domain'];
		$regValid = $data['regValid'];
		
		if(empty($domain)){
			$sql = "INSERT INTO dominios (idDominio, dominio, regValido) VALUES ($id, NULL, $regValid)";
		}else{
			$sql = "INSERT INTO dominios (idDominio, dominio, regValido) VALUES ($id, '$domain', $regValid)";
		}
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function insertCursos($data){
		$codCourse = $data['codCourse'];
		$name = $data['name'];
		$idNivelCourse = $data['idNivelCourse'];
		$regValid = $data['regValid'];
		
		if(empty($name)){
			$sql = "INSERT INTO cursos (codCurso, nome, idNivelCursos, regValido) VALUES ($codCourse, NULL, $idNivelCourse, $regValid)";
		}else{
			$sql = "INSERT INTO cursos (codCurso, nome, idNivelCursos, regValido) VALUES ($codCourse, '$name', $idNivelCourse, $regValid)";
		}
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function insertCcrs($data){
		$codCcr = $data['codCcr'];
		$name = $data['name'];
		$hours = $data['hours'];
		$idDomain = $data['idDomain'];
		$regValid = $data['regValid'];
		
		if(empty($name) && empty($hours)){
			$sql = "INSERT INTO ccrs (codCcr, nome, cHoraria, idDominio, regValido) VALUES ($codCcr, NULL, NULL, $idDomain, $regValid)";
		}else if(empty($name)){
			$sql = "INSERT INTO ccrs (codCcr, nome, cHoraria, idDominio, regValido) VALUES ($codCcr, NULL, $hours, $idDomain, $regValid)";
		}else if(empty($hours)){
			$sql = "INSERT INTO ccrs (codCcr, nome, cHoraria, idDominio, regValido) VALUES ($codCcr, '$name', NULL, $idDomain, $regValid)";
		}else{
			$sql = "INSERT INTO ccrs (codCcr, nome, cHoraria, idDominio, regValido) VALUES ($codCcr, '$name', $hours, $idDomain, $regValid)";
		}
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function insertCursosCcrs($data){
		$codCcr = $data['codCcr'];
		$codCourse = $data['codCourse'];
		$regValid = $data['regValid'];
		
		$sql = "INSERT INTO cursosccrs (codCcr, codCurso, regValido) VALUES ($codCcr, $codCourse, $regValid)";
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function insertSalas($dados){
		$numBlock = $dados['numBlock'];
		$numClass = $dados['numClass'];
		$descrition = $dados['descrition'];
		
		if(empty($descrition)){
			$sql = "INSERT INTO salas (numBloco, numSala, descricao) VALUES ('$numBlock', $numClass, NULL)";
		}else{
			$sql = "INSERT INTO salas (numBloco, numSala, descricao) VALUES ('$numBlock', $numClass, '$descrition')";
		}
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function insertDiaSemana($data){
		$idWeek = $data['idWeek'];
		$idDay = $data['idDay'];
		$week = $data['week'];
		$day = $data['day'];
		
		if(empty($week) && empty($day)){
			$sql = "INSERT INTO diasemana (idSemana, idDia, semana, dia) VALUES ($idWeek, $idDay, NULL, NULL)";
		}else if(empty($week)){
			$sql = "INSERT INTO diasemana (idSemana, idDia, semana, dia) VALUES ($idWeek, $idDay, NULL, '$day')";
		}else if(empty($day)){
			$sql = "INSERT INTO diasemana (idSemana, idDia, semana, dia) VALUES ($idWeek, $idDay, '$week', NULL)";
		}else{
			$sql = "INSERT INTO diasemana (idSemana, idDia, semana, dia) VALUES ($idWeek, $idDay, '$week', '$day')";
		}
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
	function insertPeriodos($data){
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
	
	function insertServidorCursoCcr($data){
		$semesterYear = $data['semesterYear'];
		$codCcr = $data['codCcr'];
		$codCourse = $data['codCourse'];
		$siape = $data['siape'];
		$alocation = $data['alocation'];
		$observation = $data['observation'];
		$regValid = $data['regValid'];
		
		if(empty($observation) && empty($alocation)){
			$sql = "INSERT INTO servidorCursoCcr (anoSemestre, codCcr, codCurso, siape, alocacao, observacoes, regValido) 
				VALUES ('$semesterYear', $codCcr, $codCourse, '$siape', NULL, NULL, $regValid)";
		}else if(empty($observation)){
			$sql = "INSERT INTO servidorCursoCcr (anoSemestre, codCcr, codCurso, siape, alocacao, observacoes, regValido) 
				VALUES ('$semesterYear', $codCcr, $codCourse, '$siape', $alocation, NULL, $regValid)";
		}else if(empty($alocation)){
			$sql = "INSERT INTO servidorCursoCcr (anoSemestre, codCcr, codCurso, siape, alocacao, observacoes, regValido) 
				VALUES ('$semesterYear', $codCcr, $codCourse, '$siape', NULL, '$observation', $regValid)";
		}else{
			$sql = "INSERT INTO servidorCursoCcr (anoSemestre, codCcr, codCurso, siape, alocacao, observacoes, regValido) 
				VALUES ('$semesterYear', $codCcr, $codCourse, '$siape', $alocation, '$observation', $regValid)";
		}
		
		$r = dbConsulta($sql);
		
		return $r;
	}
	
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
	
	function consultaSql($dados){
		$tabela = $dados['tabela'];
		$filtro = $dados['filtro'];
		$valor = $dados['valor'];
		$tipo = $dados['tipo'];
		
		if($tipo == 0){
			$sql = "SELECT * FROM $tabela WHERE $filtro = $valor AND regValido = 1";
		}else if($tipo == 1){
			$sql = "SELECT * FROM $tabela WHERE $filtro = '$valor' AND regValido = 1";
		}else return 0;
		
		$r = dbConsulta($sql);
		
		return $r;
		
	}
	
/*FUNCOES DESENVOLVIDAS POR FERNANDONESI@GMAIL.COM*/
	function selectServidor(){
		$sql = "SELECT *
		          FROM servidor
				  JOIN nivelServidor using(idNivelServidor)";
		
		$r=dbConsulta($sql);
		return $r;
	}
	
	function selectMenu($nivel){
		$sql = "SELECT nomeAreaMenu,
		               descricaoAreaMenu,
					   linkAreaMenu
		          FROM areaMenu
				  JOIN nivelServidor_areaMenu using(idAreaMenu)
				  where nivelServidor_areaMenu.idNivelServidor = ".$nivel."";		
		$r=dbConsulta($sql);
		return $r;
	}
	
/*FUNCOES DESENVOLVIDAS POR FERNANDONESI@GMAIL.COM*/
	
?>