<?php
	require_once dirname(__FILE__).'/databaseAcess.php';//banco de dados
	define("SAL", 'CadCCrs');
	
	function in($title){//função do cabeçalho
		echo '<!DOCTYPE html>';
		echo '<html>';
		echo '	<head>';
		echo '		<meta http-equiv="content-type" content="text/html; charset=ISO-8859-15">';
		echo '		<script src="js/cadu.js"></script>';
		echo '		<link type="text/css" rel="stylesheet" href="css/style.css"/>';
		echo '		<link type="text/css" rel="stylesheet" href="css/home.css"/>';
		echo '		<title>'.$title.'</title>';//alterar para passar o nome da pagina
		echo '	</head>';
		//echo '	<body>';
	}
	
	function out(){
		echo '	</body>';
		//echo '<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>';
		//echo '<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>';
		echo '<script src="js/jquery.js"></script>';
		echo '<script src="js/CADU.js"></script>';
		echo '<script src="js/CADU.ui.js"></script>';
		echo '<script src="js/actions/CADU.actions.curso.js"></script>';
		echo '<script src="js/actions/CADU.actions.logout.js"></script>';
		echo '</html>';
	}
	
	function chamaCadastroFuncao($funcao){
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
	}
	
	function chamaCadastroServidoresFuncao($idFuncao, $siape, $dataInicio, $dataSaida, $cargaHoraria){
		$dados = Array();
		$dados['idFuncao'] = addslashes($idFuncao);
		$dados['siape'] = addslashes($siape);
		$dados['dataInicio'] = addslashes($dataInicio);
		$dados['dataSaida'] = addslashes($dataSaida);
		$dados['cargaHoraria'] = addslashes($cargaHoraria);
		$dados['regValido'] = 1;
		$r = cadastroServidoresFuncao($dados);
		return $r;
	}
	
	function chamaCadastroCargos($cargo){
		$r = getIdTabelaCargos();
		$id = 0;
		if(mysql_num_rows($r) > 0){
			while($row = mysql_fetch_assoc($r)){
				$id = $row['idCargos'];
			}
		}
		
		$id = $id + 1;
		$dados = Array();
		$dados['id'] = $id;
		$dados['cargo'] = addslashes($cargo);
		$dados['regValido'] = 1;
		
		$r = cadastroCargos($dados);
		
		return $r;
	}
	
	function chamaCadastroSituacaoServidor($situacao, $dataEntrada, $dataSaida){
		$r = getIdTabelaSituacaoServidor();
		$id = 0;
		if(mysql_num_rows($r) > 0){
			while($row = mysql_fetch_assoc($r)){
				$id = $row['idSituacaoServidor'];
			}
		}
		
		$id = $id + 1;
		$dados = Array();
		$dados['id'] = $id;
		$dados['situacao'] = addslashes($situacao);
		$dados['dataEntrada'] = addslashes($dataEntrada);
		$dados['dataSaida'] = addslashes($dataSaida);
		$dados['regValido'] = 1;
		
		$r = cadastroSituacaoServidor($dados);
		
		return $r;
	}
	
	function chamaCadastroJornada($jornada){
		$r = getIdTabelaJornada();
		$id = 0;
		if(mysql_num_rows($r) > 0){
			while($row = mysql_fetch_assoc($r)){
				$id = $row['idJornada'];
			}
		}
		
		$id = $id + 1;
		$dados = Array();
		$dados['id'] = $id;
		$dados['jornada'] = addslashes($jornada);
		$dados['regValido'] = 1;
		
		$r = cadastroJornada($dados);
		
		return $r;
	}
	
	function chamaCadastroNivelServidor($nivel){
		$r = getIdTabelaNivelServidor();
		$id = 0;
		if(mysql_num_rows($r) > 0){
			while($row = mysql_fetch_assoc($r)){
				$id = $row['idNivelServidor'];
			}
		}
		
		$id = $id + 1;
		$dados = Array();
		$dados['id'] = $id;
		$dados['nivel'] = addslashes($nivel);
		$dados['regValido'] = 1;
		
		$r = cadastroNivelServidor($dados);
		
		return $r;
	}
	
	function chamaCadastroNivelCursos($nivel){
		$r = getIdTabelaNivelCursos();
		$id = 0;
		if(mysql_num_rows($r) > 0){
			while($row = mysql_fetch_assoc($r)){
				$id = $row['idNivelCursos'];
			}
		}
		
		$id = $id + 1;
		$dados = Array();
		$dados['id'] = $id;
		$dados['nivel'] = addslashes($nivel);
		$dados['regValido'] = 1;
		
		$r = cadastroNivelCursos($dados);
		
		return $r;
	}
	
	function chamaCadastroCursos($codCurso, $nome, $idNivelCursos){		
		$dados = Array();
		$dados['codCurso'] = addslashes($codCurso);
		$dados['nome'] = addslashes($nome);
		$dados['idNivelCursos'] = addslashes($idNivelCursos);
		$dados['regValido'] = 1;
		
		$r = cadastroCursos($dados);
		
		return $r;
	}
	
	function chamaCadastroDominios($dominio){
		$r = getIdTabelaDominios();
		$id = 0;
		if(mysql_num_rows($r) > 0){
			while($row = mysql_fetch_assoc($r)){
				$id = $row['idDominio'];
			}
		}
		
		$id = $id + 1;
		$dados = Array();
		$dados['id'] = $id;
		$dados['dominio'] = addslashes($dominio);
		$dados['regValido'] = 1;
		
		$r = cadastroDominios($dados);
		
		return $r;
	}
	
	function chamaCadastroCcrs($codCcr, $nome, $cHoraria, $idDominio){
		$dados = Array();
		$dados['codCcr'] = addslashes($codCcr);
		$dados['nome'] = addslashes($nome);
		$dados['cHoraria'] = addslashes($cHoraria);
		$dados['idDominio'] = addslashes($idDominio);
		$dados['regValido'] = 1;
		
		$r = cadastroCcrs($dados);
		
		return $r;
	}
	
	function chamaCadastroCursosCcrs($codCcr, $codCurso){
		$dados = array();
		$dados['codCcr'] = addslashes($codCcr);
		$dados['codCurso'] = addslashes($codCurso);
		$dados['regValido'] = 1;
		
		$r = cadastroCursosCcrs($dados);
		
		return $r;
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
	
	function chamaCadastroServidores($siape, $nome, $sobrenome, $observacao, $quemSubstitui, $idCargo, $idJornada, $idSituacaoServidor, $email, $fone1, $fone2, $endereco, $cidade, $idNivelServidor){
		$dados = Array();
		$dados['siape'] = addslashes($siape);
		$dados['nome'] = addslashes($nome);
		$dados['sobrenome'] = addslashes($sobrenome);
		$dados['observacao'] = addslashes($observacao);
		$dados['quemSubistitui'] = addslashes($quemSubstitui);
		$dados['idCargo'] = addslashes($idCargo);
		$dados['idJornada'] = addslashes($idJornada);
		$dados['idSituacaoServidor'] = addslashes($idSituacaoServidor);
		$dados['email'] = addslashes($email);
		$dados['fone1'] = addslashes($fone1);
		$dados['fone2'] = addslashes($fone2);
		$dados['endereco'] = addslashes($endereco);
		$dados['cidade'] = addslashes($cidade);
		$dados['idNivelServidor'] = addslashes($idNivelServidor);
		$dados['regValido'] = 1;
		//$dados['senha'] = md5(addslashes('123456'.''.SAL));
		//$dados['senha'] = md5(addslashes(geraSenha(8, true, true, false).''.SAL));
		$dados['senha'] = '123456';
	
		$r = cadastroServidores($dados);
		
		return $r;
	}
	
	function popularTabelas(){
		chamaCadastroFuncao("Cadastro de Funcao");
		chamaCadastroCargos("Cadastro de Cargos");
		chamaCadastroJornada("Cadastro de Jornada");
		chamaCadastroSituacaoServidor("Cadastro de Situacao Servidor", NULL, NULL);
		chamaCadastroSituacaoServidor("Cadastro de Situacao Servidor", '1999-12-15 12:13:15', NULL);
		chamaCadastroSituacaoServidor("Cadastro de Situacao Servidor", NULL, '1999-12-15 12:13:15');
		chamaCadastroSituacaoServidor("Cadastro de Situacao Servidor", '1999-12-15 15:13:15', '1999-12-16 20:13:15');
		chamaCadastroNivelServidor("Cadastro de Nivel Servidor");
		//chamaCadastroServidores('10', 'Fulano', 'Fonseca', 'Observacao', 'quemSubs', 1, 2, 3, 'email', 'fone1', 'fone2', 'endereco', 'cidade', 2);
		//chamaCadastroServidores(geraSenha(7, false, true, false), 'Fulano', 'Fonseca', 'Observacao', 'quemSubs', 1, 2, 3, 'email', 'fone1', 'fone2', 'endereco', 'cidade', 2);
		chamaCadastroNivelCursos("Nivel Cursos");
		chamaCadastroDominios("Dominio");
		//chamaCadastroCursos(001, "Nome do Curso", 1);
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

	function chamaLogin($usuario, $senha){
		$dados = array();
		
		$dados['usuario'] = addslashes($usuario);
		$dados['senha'] = addslashes($senha);
		//$dados['senha'] = md5(addslashes($senha).''. SAL );
		
		$r = login($dados);
		return $r;
	}
	
	function chamaBuscaCurso($campo, $filtro){
		
	}
	
	
?>