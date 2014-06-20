<?php
	require_once dirname(__FILE__).'/databaseAcess.php';//banco de dados
	require_once dirname(__FILE__).'/constant.php';//constantes
	
	function buildDataInsertFuncao($function){
		$r = getIdTableFuncao();//pega o ultimo ID da tabela 'funcao'
		$id = 0;

		if(mysql_num_rows($r) > 0){
			while($row = mysql_fetch_assoc($r)){
				$id = $row['idFuncao'];//id recebe o ultimo id da tabela funcao
			}
		}
		
		$id = $id + 1;//incrementa em 1 para não duplicar a chave primaria
		
		$data = array();//inicializa um vetor de dados
		$data['id'] = $id;//na posição 'id', é passado o atual valor de 'id'
		$data['function'] = addslashes($function);//na posição 'function', é passado a string protegida de dados maliciosos para o banco de dados
		$data['regValid'] = 1;//na posição 'regValid', é passado o valor 1 como padrão, significando que o dado primeiramente é valido
		
		/**
		* Por padrão colocamos o prefixo que vai nos dizer o que a função faz (insert, update, select, delete)
		* e depois o nome da tabela (funcao, cargo, nivelServidor, cursos, etc).
		**/
		$r = insertFuncao($data);//r possui o retorno da função 'insertFuncao'
		return $r;
	}
	/*function chamaCadastroFuncao($funcao){
		$r = getIdTabelaFuncao();
		$id = 0;
		if(mysql_num_rows($r) > 0){
			while($row = mysql_fetch_assoc($r)){
				$id = $row['idFuncao'];
			}
		}
		
		$id = $id + 1;
		$dados = Array();
		$dados['id'] = $id;
		$dados['funcao'] = addslashes($funcao);
		$dados['regValido'] = 1;
		$r = cadastroFuncao($dados);
		return $r;
	}*/
	
	function buildDataInsertServidoresFuncoes($idFunction, $siape, $startDate, $endDate, $hours){
		$data = Array();
		
		$data['idFunction'] = addslashes($idFunction);
		$data['siape'] = addslashes($siape);
		$data['startDate'] = addslashes($startDate);
		$data['endDate'] = addslashes($endDate);
		$data['hours'] = addslashes($hours);
		$data['regValid'] = 1;
		
		$r = insertServidoresFuncao($data);
		return $r;
	}
	
	function buildDataInsertCargos($role){
		$r = getIdTableCargos();
		$id = 0;
		if(mysql_num_rows($r) > 0){
			while($row = mysql_fetch_assoc($r)){
				$id = $row['idCargos'];
			}
		}
		
		$id = $id + 1;
		$data = Array();
		$data['id'] = $id;
		$data['role'] = addslashes($role);
		$data['regValid'] = 1;
		
		$r = insertCargos($data);
		
		return $r;
	}
	
	function buildDataInsertSituacaoServidor($situation, $startDate, $endDate){
		$r = getIdTableSituacaoServidor();
		$id = 0;
		if(mysql_num_rows($r) > 0){
			while($row = mysql_fetch_assoc($r)){
				$id = $row['idSituacaoServidor'];
			}
		}
		
		$id = $id + 1;
		$data = Array();
		$data['id'] = $id;
		$data['situation'] = addslashes($situation);
		$data['startDate'] = addslashes($startDate);
		$data['endDate'] = addslashes($endDate);
		$data['regValid'] = 1;
		
		$r = insertSituacaoServidor($data);
		
		return $r;
	}
	
	function buildDataInsertJornada($run){
		$r = getIdTableJornada();
		$id = 0;
		if(mysql_num_rows($r) > 0){
			while($row = mysql_fetch_assoc($r)){
				$id = $row['idJornada'];
			}
		}
		
		$id = $id + 1;
		$data = Array();
		$data['id'] = $id;
		$data['run'] = addslashes($run);
		$data['regValid'] = 1;
		
		$r = insertJornada($data);
		
		return $r;
	}
	
	function buildDataInsertNivelServidor($nivel){
		$r = getIdTableNivelServidor();
		$id = 0;
		if(mysql_num_rows($r) > 0){
			while($row = mysql_fetch_assoc($r)){
				$id = $row['idNivelServidor'];
			}
		}
		
		$id = $id + 1;
		$data = Array();
		$data['id'] = $id;
		$data['nivel'] = addslashes($nivel);
		$data['regValid'] = 1;
		
		$r = insertNivelServidor($data);
		
		return $r;
	}
	
	function buildDataInsertNivelCursos($nivel){
		$r = getIdTableNivelCursos();
		$id = 0;
		if(mysql_num_rows($r) > 0){
			while($row = mysql_fetch_assoc($r)){
				$id = $row['idNivelCursos'];
			}
		}
		
		$id = $id + 1;
		$data = Array();
		$data['id'] = $id;
		$data['nivel'] = addslashes($nivel);
		$data['regValid'] = 1;
		
		$r = insertNivelCursos($data);
		
		return $r;
	}
	
	function buildDataInsertCursos($codCourse, $name, $idNivelCourse){
		$data = Array();
		$data['codCourse'] = addslashes($codCourse);
		$data['name'] = addslashes($name);
		$data['idNivelCourse'] = addslashes($idNivelCourse);
		$data['regValid'] = 1;
		
		$r = insertCursos($data);
		
		return $r;
	}
	
	function buildDataInsertDominios($domain){
		$r = getIdTableDominios();
		$id = 0;
		if(mysql_num_rows($r) > 0){
			while($row = mysql_fetch_assoc($r)){
				$id = $row['idDominio'];
			}
		}
		
		$id = $id + 1;
		$data = Array();
		$data['id'] = $id;
		$data['domain'] = addslashes($domain);
		$data['regValid'] = 1;
		
		$r = insertDominios($data);
		
		return $r;
	}
	
	function buildDataInsertCcrs($codCcr, $name, $hours, $idDomain){
		$data = Array();
		$data['codCcr'] = addslashes($codCcr);
		$data['name'] = addslashes($name);
		$data['hours'] = addslashes($hours);
		$data['idDomain'] = addslashes($idDomain);
		$data['regValid'] = 1;
		
		$r = insertCcrs($data);
		
		return $r;
	}
	
	function buildDataInsertCursosCcrs($codCcr, $codCourse){
		$data = array();
		$data['codCcr'] = addslashes($codCcr);
		$data['codCourse'] = addslashes($codCourse);
		$data['regValid'] = 1;
		
		$r = insertCursosCcrs($data);
		
		return $r;
	}
	
	function buildDataInsertDiaSemana($idWeek, $idDay, $week, $day){
		$data = array();
		
		$data['idWeek'] = addslashes($idWeek);
		$data['idDay'] = addslashes($idDay);
		$data['week'] = addslashes($week);
		$data['day'] = addslashes($day);
		
		$r = insertDiaSemana($data);
		
		return $r;
	}
	
	function buildDataInsertPeriodos($idPeriod, $idSubPeriod, $period, $startHour, $endHour){
		$data = array();
		
		$data['idPeriod'] = $idPeriod;
		$data['idSubPeriod'] = $idSubPeriod;
		$data['period'] = $period;
		$data['startHour'] = $startHour;
		$data['endHour'] = $endHour;
		
		$r = insertPeriodos($data);
		
		return $r;
	}
	
	function buildDataInsertHorarios($idWeek, $idDay, $idPeriod, $idSubPeriod){
		//$r = getIdTableHorarios();
		//$id = 0;
		/*if(mysql_num_rows($r) > 0){
			while($row = mysql_fetch_assoc($r)){
				$id = $row['idHorario'];
			}
		}*/
		
		//$id = $id + 1;
		$data = Array();
		//$data['id'] = $id;
		$data['idWeek'] = addslashes($idWeek);
		$data['idDay'] = addslashes($idDay);
		$data['idPeriod'] = addslashes($idPeriod);
		$data['idSubPeriod'] = addslashes($idSubPeriod);
		
		$r = insertHorarios($data);
		
		return $r;
	}
	
	function buildDataInsertSalas($numBlock, $numClass, $descrition){
		$data = array();
		
		$data['numBlock'] = addslashes($numBlock);
		$data['numClass'] = addslashes($numClass);
		$data['descrition'] = addslashes($descrition);
		
		$r = insertSalas($data);
		
		return $r;
	}
	
	function buildDataInsertAlocacao($numBlock, $numClass, $idHorary){
		//$r = getIdTableAlocacao();
		//$id = 0;
		/*if(mysql_num_rows($r) > 0){
			while($row = mysql_fetch_assoc($r)){
				$id = $row['idAlocacao'];
			}
		}*/
		
		//$id = $id + 1;
		$data = Array();
		//$data['id'] = $id;
		$data['numBlock'] = addslashes($numBlock);
		$data['numClass'] = addslashes($numClass);
		$data['idHorary'] = addslashes($idHorary);
		$data['regValid'] = 1;
		
		$r = insertAlocacao($data);
		
		return $r;
	}
	
	function buildDataInsertServidorCursoCcr($semesterYear, $codCcr, $codCourse, $siape, $alocation, $observation){
		$data = array();
		$data['semesterYear'] = addslashes($semesterYear);
		$data['codCcr'] = addslashes($codCcr);
		$data['codCourse'] = addslashes($codCourse);
		$data['siape'] = addslashes($siape);
		$data['alocation'] = addslashes($alocation);
		$data['observation'] = addslashes($observation);
		$data['regValid'] = 1;
		
		$r = insertServidorCursoCcr($data);
		
		return $r;
	}
	
	function buildDataInsertServidores($siape, $firstName, $lastName, $observation, $replace, $idCargo, $idJornada, $idSituacaoServidor, $email, $phone1, $phone2, $address, $city, $idNivelServidor){
		$data = Array();
		$data['siape'] = addslashes($siape);
		$data['firstName'] = addslashes($firstName);
		$data['lastName'] = addslashes($lastName);
		$data['observation'] = addslashes($observation);
		$data['replace'] = addslashes($replace);
		$data['idCargo'] = addslashes($idCargo);
		$data['idJornada'] = addslashes($idJornada);
		$data['idSituacaoServidor'] = addslashes($idSituacaoServidor);
		$data['email'] = addslashes($email);
		$data['phone1'] = addslashes($phone1);
		$data['phone2'] = addslashes($phone2);
		$data['address'] = addslashes($address);
		$data['city'] = addslashes($city);
		$data['idNivelServidor'] = addslashes($idNivelServidor);
		$data['regValid'] = 1;
		$pass = geraSenha(8, true, true, false);
		$encryptedPassword = md5($pass . '' . SAL);
		$data['pass'] = $encryptedPassword;
	
		$r = insertServidores($data);
		
		return $r;
	}
	
	function popularTabelas(){
		buildDataInsertFuncao("Nome da Funcao nova");
		buildDataInsertCargos("Nome do Cargo novo");
		buildDataInsertJornada("Nome da Jornada nova");
		buildDataInsertNivelServidor("Nome do NivelServidor novo");
		buildDataInsertSituacaoServidor("Nome da SituacaoServidor novo", '1999-12-15 15:13:15', '1999-12-15 15:13:15');
		buildDataInsertServidores(geraSenha(7, true, true, false), 'Fulano', 'Fonseca', 'Observacao', 'siapeQm', 1, 1, 1, 'email', 'fone1', 'fone2', 'endereco', 'cidade', 1);
		buildDataInsertServidores(geraSenha(7, true, true, false), 'Ciclano', 'Fonseca', 'Observacao', 'siapeQm', 1, 1, 1, 'email', 'fone1', 'fone2', 'endereco', 'cidade', 1);
		buildDataInsertNivelCursos("Nome do NivelCursos novo");
		buildDataInsertCursos(rand()%999, "Nome do Curso novo", 1);
		buildDataInsertDominios("Nome do Dominio novo");
		buildDataInsertCcrs(rand()%999, 'Estrutura de Dados I', 40, 1);
		buildDataInsertCursosCcrs(rand()%999, rand()%999);
		buildDataInsertDiaSemana(rand()%999, rand()%999, 'Semana', 'Dia');
		//buildDataInsertPeriodos(rand()%999, rand()%999, 'Periodo', '1999-12-15 15:13:15', '1999-12-15 15:13:15'); VERIFICAR INSERÇÃO DE HORAS SEM DIA
		buildDataInsertPeriodos(rand()%999, rand()%999, 'Periodo', NULL, NULL);
		//buildDataInsertHorarios(rand()%999, rand()%999, rand()%999, rand()%999); PROBLEMA, ENCONTRAR O ERRO E RESOLVER
		buildDataInsertSalas('1', rand()%999, 'Descricao da Sala');
		//buildDataInsertAlocacao('1', rand()%999, rand()%999);
		buildDataInsertServidorCursoCcr(geraSenha(8, true, false, false), rand()%999, rand()%999, geraSenha(7, true, false, false), NULL, NULL);
		return true;
	}
	
	function geraSenha($tamanho, $maiusculas, $numeros, $simbolos){
		/**
		* Função para gerar senhas aleatórias
		*
		* @author    Thiago Belem <contato@thiagobelem.net>
		*
		* @param integer $tamanho Tamanho da senha a ser gerada
		* @param boolean $maiusculas Se terá letras maiúsculas
		* @param boolean $numeros Se terá números
		* @param boolean $simbolos Se terá símbolos
		*
		* @return string A senha gerada
		*/
		$lmin = 'abcdefghijklmnopqrstuvwxyz';
		$lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$num = '1234567890';
		$simb = '!@#$%*-';
		$retorno = '';
		$caracteres = '';
		$caracteres .= $lmin;
		
		if ($maiusculas) $caracteres .= $lmai;
		if ($numeros) $caracteres .= $num;
		if ($simbolos) $caracteres .= $simb;
		$len = strlen($caracteres);
		for ($n = 1; $n <= $tamanho; $n++) {
			$rand = mt_rand(1, $len);
			$retorno .= $caracteres[$rand-1];
		}
		return $retorno;
	}

	function buildDataLogin($user, $pass){
		$data = array();
		
		$data['user'] = addslashes($user);
		$data['pass'] = md5(addslashes($pass) . '' . SAL);
		
		$r = login($data);
		return $r;
	}
	
	function chamaConsultaSql($table, $filter, $string, $type){
		$dados = array();
		$dados['tabela'] = addslashes($table);
		$dados['filtro'] = addslashes($filter);
		$dados['valor'] = addslashes($string);
		$dados['tipo'] = addslashes($type);
		
		$r = consultaSql($dados);
		
		return $r;
	}
?>
