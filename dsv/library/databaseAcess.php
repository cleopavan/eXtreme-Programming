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
		
		$sql = "INSERT INTO ccrs (codCcr, idDominio, regValido, nomeCcr, cHoraria) VALUES ($codCcr, $idDominio, $regValido";
		
		if(empty($name)){
			$sql = $sql . ", NULL";
		}else{
			$sql = $sql . ", '$name'";
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
	
	function login($data){
		$user = $data['user'];
		$pass = $data['pass'];
		
		$sql = "SELECT siape FROM servidores WHERE (siape='$user' OR email='$user') AND senha='$pass' AND regValido=1";
		
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