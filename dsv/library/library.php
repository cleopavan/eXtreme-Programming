<?php
	require_once dirname(__FILE__).'/databaseAcess.php';//banco de dados
	require_once dirname(__FILE__).'/constant.php';//constantes
	
	/****************************************************Inicio das funções de inserção****************************************/
	function constroiDadosInsertFuncao($funcao){
		$data = array();/*inicializa um vetor de dados*/
		$data['funcao'] = addslashes($funcao);/*na posição 'function', é passado a string protegida de dados maliciosos para o banco de dados*/
		$data['regValido'] = 1;/*na posição 'regValido', é passado o valor 1 como padrão, significando que o dado primeiramente é valido*/
		
		/**
		* Por padrão colocamos o prefixo que vai nos dizer o que a função faz (insert, update, select, delete)
		* e depois o nome da tabela (funcao, cargo, nivelServidor, curso, etc).
		**/
		$r = insertFuncao($data);/*r possui o retorno da função 'insertFuncao' que está na biblioteca 'databaseAcess.php'*/
		return $r;
	}
	
	function constroiDadosInsertServidorFuncao($idFuncao, $siape, $dataInicio, $dataSaida, $cargaHoraria){
		/**
		*Formato de inserção de datas: "AAAA-MM-DD hh:mm:ss"
		**/
		$data = Array();
		$data['idFuncao'] = addslashes($idFuncao);
		$data['siape'] = addslashes($siape);
		$data['dataInicio'] = addslashes($dataInicio);
		$data['dataSaida'] = addslashes($dataSaida);
		$data['cargaHoraria'] = addslashes($cargaHoraria);
		$data['regValido'] = 1;
		
		$r = insertServidorFuncao($data);
		return $r;
	}
	
	function constroiDadosInsertCargo($cargo){
		$data = Array();
		$data['cargo'] = addslashes($cargo);
		$data['regValido'] = 1;
		
		$r = insertCargo($data);
		
		return $r;
	}
	
	function constroiDadosInsertJornada($jornada){
		$data = Array();
		$data['jornada'] = addslashes($jornada);
		$data['regValido'] = 1;
		
		$r = insertJornada($data);
		
		return $r;
	}
	
	function constroiDadosInsertSituacaoServidor($situacao, $dataEntrada, $dataSaida){
		$data = Array();
		$data['situacao'] = addslashes($situacao);
		$data['dataEntrada'] = addslashes($dataEntrada);
		$data['dataSaida'] = addslashes($dataSaida);
		$data['regValido'] = 1;
		
		$r = insertSituacaoServidor($data);
		
		return $r;
	}
	
	function constroiDadosInsertNivelServidor($nivel){
		$data = Array();
		$data['nivel'] = addslashes($nivel);
		$data['regValido'] = 1;
		
		$r = insertNivelServidor($data);
		
		return $r;
	}
	
	function constroiDadosInsertAreaMenu($nomeAreaMenu, $descricaoAreaMenu, $linkAreaMenu){
		$data = array();
		$data['nomeAreaMenu'] = addslashes($nomeAreaMenu);
		$data['descricaoAreaMenu'] = addslashes($descricaoAreaMenu);
		$data['linkAreaMenu'] = addslashes($linkAreaMenu);
		
		$r = insertAreaMenu($data);
		
		return $r;
	}
	
	function constroiDadosInsertNivelServidorAreaMenu($idNivelServidor, $idAreaMenu){
		$data = array();
		$data['idNivelServidor'] = addslashes($idNivelServidor);
		$data['idAreaMenu'] = addslashes($idAreaMenu);
		
		$r = insertNivelServidorAreaMenu($data);
		
		return $r;
	}
	
	function constroiDadosInsertServidor($siape, $nome, $sobrenome, $observacao, $quemSubstitui, $idCargo, $idJornada, $idSituacaoServidor, $email, $fone1, $fone2, $endereco, $cidade, $idNivelServidor){
		$data = Array();
		$data['siape'] = addslashes($siape);
		$data['nome'] = addslashes($nome);
		$data['sobrenome'] = addslashes($sobrenome);
		$data['observacao'] = addslashes($observacao);
		$data['quemSubstitui'] = addslashes($quemSubstitui);
		$data['idCargo'] = addslashes($idCargo);
		$data['idJornada'] = addslashes($idJornada);
		$data['idSituacaoServidor'] = addslashes($idSituacaoServidor);
		$data['email'] = addslashes($email);
		$data['fone1'] = addslashes($fone1);
		$data['fone2'] = addslashes($fone2);
		$data['endereco'] = addslashes($endereco);
		$data['cidade'] = addslashes($cidade);
		$data['idNivelServidor'] = addslashes($idNivelServidor);
		$data['regValido'] = 1;
		$pass = geraSenha(8, true, true, false);
		$encryptedPassword = md5($pass . '' . SAL);
		$data['pass'] = $encryptedPassword;
	
		$r = insertServidor($data);
		
		return $r;
	}

	function constroiDadosInsertNivelCurso($nivel){
		$data = Array();
		$data['nivel'] = addslashes($nivel);
		$data['regValido'] = 1;
		
		$r = insertNivelCurso($data);
		
		return $r;
	}
	
	function constroiDadosInsertCurso($codCurso, $nome, $idNivelCurso){
		$data = Array();
		$data['codCurso'] = addslashes($codCurso);
		$data['nome'] = addslashes($nome);
		$data['idNivelCurso'] = addslashes($idNivelCurso);
		$data['regValido'] = 1;
		
		$r = insertCurso($data);
		
		return $r;
	}
	
	function constroiDadosInsertDominio($dominio){
		$data = Array();
		$data['dominio'] = addslashes($dominio);
		$data['regValido'] = 1;
		
		$r = insertDominio($data);
		
		return $r;
	}
	
	function constroiDadosInsertCcr($codCcr, $nome, $cHoraria, $idDominio){
		$data = Array();
		$data['codCcr'] = addslashes($codCcr);
		$data['nome'] = addslashes($nome);
		$data['cHoraria'] = addslashes($cHoraria);
		$data['idDominio'] = addslashes($idDominio);
		$data['regValido'] = 1;
		
		$r = insertCcr($data);
		
		return $r;
	}
	
	function constroiDadosInsertCursoCcr($codCcr, $codCurso){
		$data = array();
		$data['codCcr'] = addslashes($codCcr);
		$data['codCurso'] = addslashes($codCurso);
		$data['regValido'] = 1;
		
		$r = insertCursoCcr($data);
		
		return $r;
	}
	
	function constroiDadosInsertServidorCursoCcr($anoSemestre, $codCurso, $codCcr, $siape, $observacoes){
		$data = array();
		
		$data['anoSemestre'] = addslashes($anoSemestre);
		$data['codCurso'] = (int)addslashes($codCurso);
		$data['codCcr'] = (int)addslashes($codCcr);
		$data['siape'] = addslashes($siape);
		$data['observacoes'] = addslashes($observacoes);
		
		$r = insertServidorCursoCcr($data);
		
		return $r;
	}
	/****************************************************Fim das funções de inserção****************************************/
	/**/
	/****************************************************Inicio das funções de seleção****************************************/
	function constroiDadosSelectCcr($filtro, $texto){
		$data = array();
		$filtro = addslashes($filtro);
		$texto = addslashes($texto);
		$tabela = '';
		
		if($filtro == 'nome'){//string
			$filtro = 'nomeCcr';
			$tabela = 'ccr';
		}else if($filtro == 'cod'){//int
			$filtro = 'codCcr';
			$texto = (int)$texto;
			$tabela = 'ccr';
		}else if($filtro == 'ch'){//int
			$filtro = 'cHoraria';
			$texto = (int)$texto;
			$tabela = 'ccr';
		}else if($filtro == 'domin'){//string
			$filtro = 'idDominio';
			$texto = (int)$texto;
			$tabela = 'ccr';
		}else if($filtro == 'curso'){//string
			$filtro = 'codCurso';
			$texto = (int)$texto;
			$tabela = 'curso';
		}
		
		$data['filtro'] = $filtro;
		$data['texto'] = $texto;
		$data['tabela'] = $tabela;
		
		$r = selectCcr($data);
		
		return $r;
	}
///////////////////////////////////////
	function constroiDadosSelectServidor($filtro, $texto){
		$data = array();
		$filtro = addslashes($filtro);
		$texto = addslashes($texto);
		$tabela = '';
		
		if($filtro == 'siape'){//string
			$filtro = 'siape';
			$tabela = 'servidor';
		}else if($filtro == 'nome'){//string
			$filtro = 'nome';
			$tabela = 'servidor';
		}else if($filtro == 'curso'){//string
			$filtro = 'codCurso';
			$texto = (int)$texto;
			$tabela = 'curso';
		}else if($filtro == 'cargo'){//string
			$filtro = 'idCargo';
			$texto = (int)$texto;
			$tabela = 'servidor';
		}
		
		$data['filtro'] = $filtro;
		$data['texto'] = $texto;
		$data['tabela'] = $tabela;
		
		$r = selectCcr($data);
		
		return $r;
	}
//////////////////////////////////
	
	
	function constroiDadosSelectDominio($id){
		$data = array();
		$data['id'] = addslashes($id);
		
		$r = selectDominio($data);
		
		return $r;
	}
	/****************************************************Fim das funções de seleção****************************************/
	/**/
	/****************************************************Inicio das funções de alteração****************************************/
	function constroiDadosUpdateFuncao($idFuncao, $funcao){
		$data = array();
		$data['id'] = addslashes($idFuncao);
		$data['funcao'] = addslashes($funcao);
		
		$r = updateFuncao($data);
		
		return $r;
	}
	
	function constroiDadosUpdateServidorFuncao($idFuncao, $siape, $dataInicio, $dataSaida, $cargaHoraria){
		/**
		*Formato de inserção de datas: "AAAA-MM-DD hh:mm:ss"
		**/
		$data = Array();
		$data['idFuncao'] = addslashes($idFuncao);
		$data['siape'] = addslashes($siape);
		$data['dataInicio'] = addslashes($dataInicio);
		$data['dataSaida'] = addslashes($dataSaida);
		$data['cargaHoraria'] = addslashes($cargaHoraria);
		
		$r = updateServidorFuncao($data);
		return $r;
	}
	
	function constroiDadosUpdateCargo($idCargo, $cargo){
		$data = Array();
		$data['id'] = addslashes($idCargo);
		$data['cargo'] = addslashes($cargo);
		
		$r = updateCargo($data);
		return $r;
	}
	
	function constroiDadosUpdateJornada($idJornada, $jornada){
		$data = Array();
		$data['id'] = addslashes($idJornada);
		$data['jornada'] = addslashes($jornada);
		
		$r = updateJornada($data);
		return $r;
	}
	
	function constroiDadosUpdateSituacaoServidor($idSituacaoServidor, $situacao, $dataEntrada, $dataSaida){
		$data = Array();
		$data['id'] = addslashes($idSituacaoServidor);
		$data['situacao'] = addslashes($situacao);
		$data['dataEntrada'] = addslashes($dataEntrada);
		$data['dataSaida'] = addslashes($dataSaida);
		
		$r = updateSituacaoServidor($data);
		return $r;
	}
	
	function constroiDadosUpdateNivelServidor($idNivelServidor, $nivel){
		$data = Array();
		$data['id'] = addslashes($idNivelServidor);
		$data['nivel'] = addslashes($nivel);
		
		$r = updateNivelServidor($data);
		return $r;
	}
	
	function constroiDadosUpdateServidor($siape, $nome, $sobrenome, $observacao, $quemSubstitui, $idCargo, $idJornada, $idSituacaoServidor, $email, $fone1, $fone2, $endereco, $cidade, $idNivelServidor){
		$data = Array();
		$data['siape'] = addslashes($siape);
		$data['nome'] = addslashes($nome);
		$data['sobrenome'] = addslashes($sobrenome);
		$data['observacao'] = addslashes($observacao);
		$data['quemSubstitui'] = addslashes($quemSubstitui);
		$data['idCargo'] = addslashes($idCargo);
		$data['idJornada'] = addslashes($idJornada);
		$data['idSituacaoServidor'] = addslashes($idSituacaoServidor);
		$data['email'] = addslashes($email);
		$data['fone1'] = addslashes($fone1);
		$data['fone2'] = addslashes($fone2);
		$data['endereco'] = addslashes($endereco);
		$data['cidade'] = addslashes($cidade);
		$data['idNivelServidor'] = addslashes($idNivelServidor);

		$r = updateServidor($data);
		return $r;
	}
	
	function constroiDadosUpdateNivelCurso($id, $nivel){
		$data = Array();
		$data['id'] = addslashes($id);
		$data['nivel'] = addslashes($nivel);

		$r = updateNivelCurso($data);
		return $r;
	}
	
	function constroiDadosUpdateCurso($codCurso, $nome, $idNivelCurso){
		$data = Array();
		$data['codCurso'] = addslashes($codCurso);
		$data['nome'] = addslashes($nome);
		$data['idNivelCurso'] = addslashes($idNivelCurso);

		$r = updateCurso($data);
		return $r;
	}
	
	function constroiDadosUpdateDominio($id, $dominio){
		$data = Array();
		$data['id'] = addslashes($id);
		$data['dominio'] = addslashes($dominio);
		
		$r = updateDominio($data);
		return $r;
	}
	
	function constroiDadosUpdateCcr($codCcr, $nome, $cHoraria, $idDominio){
		$data = Array();
		$data['codCcr'] = addslashes($codCcr);
		$data['nome'] = addslashes($nome);
		$data['cHoraria'] = addslashes($cHoraria);
		$data['idDominio'] = addslashes($idDominio);
		
		$r = updateCcr($data);
		return $r;
	}
	
	function constroiDadosUpdateCursoCcr($codCcr, $codCurso){
		$data = Array();
		$data['codCcr'] = addslashes($codCcr);
		$data['codCurso'] = addslashes($codCurso);
		
		$r = updateCursoCcr($data);
		return $r;
	}
	
	function constroiDadosUpdateUsuarioServidor($siape, $email, $fone1, $fone2, $endereco, $cidade){//Função que o servidor altera seus dados.
		$data = array();
		$data['siape'] = addslashes($siape);
		$data['email'] = addslashes($email);
		$data['fone1'] = addslashes($fone1);
		$data['fone2'] = addslashes($fone2);
		$data['endereco'] = addslashes($endereco);
		$data['cidade'] = addslashes($cidade);
		
		$r = updateUsuarioServidor($data);
		
		return $r;
	}
	
	function constroiDadosEsqueciMinhaSenha($siape){//Gera uma senha e envia para o email ************INSIRIR FUNÇÃO PARA ENVIAR PARA O EMAIL**********
		$data = array();
		$data['siape'] = addslashes($siape);
		$senha = geraSenha(8, true, true, false);
		$encryptedPassword = md5($senha . '' . SAL);
		$data['senha'] = $encryptedPassword;
		
		$r = esqueciMinhaSenha($data);
		
		return $r;
	}
	
	function constroiDadosUpdateSenhaServidor($siape, $senha){
		$data = array();
		$data['siape'] = addslashes($siape);
		$data['senha'] = addslashes($senha);
		
		$r = esqueciMinhaSenha($data);
		
		return $r;
	}
	/****************************************************Fim das funções de alteração****************************************/
	/**/
	/****************************************************Inicio das funções de delete****************************************/
	function constroiDadosDeleteFuncao($id){
		$data = array();
		$data['id'] = addslashes($id);
		
		$r = deleteFuncao($data);
		
		return $r;
	
	}
	
	function constroiDadosDeleteServidorFuncao($idFuncao, $siape, $dataInicio){
		$data = array();
		$data['idFuncao'] = addslashes($idFuncao);
		$data['siape'] = addslashes($siape);
		$data['dataInicio'] = addslashes($dataInicio);
		
		$r = deleteServidorFuncao($data);
		
		return $r;
	
	}
	
	function constroiDadosDeleteCargo($id){
		$data = array();
		$data['id'] = addslashes($id);
		
		$r = deleteCargo($data);
		
		return $r;
	
	}
	
	function constroiDadosDeleteJornada($id){
		$data = array();
		$data['id'] = addslashes($id);
		
		$r = deleteJornada($data);
		
		return $r;
	}
	
	function constroiDadosDeleteNivelServidor($id){
		$data = array();
		$data['id'] = addslashes($id);
		
		$r = deleteNivelServidor($data);
		
		return $r;
	}
	
	function constroiDadosDeleteServidor($siape){
		$data = array();
		$data['siape'] = addslashes($siape);
		
		$r = deleteServidor($data);
		
		return $r;
	}
	
	function constroiDadosDeleteNivelCurso($id){
		$data = array();
		$data['id'] = addslashes($id);
		
		$r = deleteNivelCurso($data);
		
		return $r;
	}
	
	function constroiDadosDeleteCurso($codCurso){
		$data = array();
		$data['codCurso'] = addslashes($codCurso);
		
		$r = deleteCurso($data);
		
		return $r;
	}
	
	function constroiDadosDeleteDominio($id){
		$data = array();
		$data['id'] = addslashes($id);
		
		$r = deleteDominio($data);
		
		return $r;
	}
	
	function constroiDadosDeleteCcr($codCcr){
		$data = array();
		$data['codCcr'] = addslashes($codCcr);
		
		$r = deleteCcr($data);
		
		return $r;
	}
	
	function constroiDadosDeleteCursoCcr($codCcr, $codCurso){
		$data = array();
		$data['codCcr'] = addslashes($codCcr);
		$data['codCurso'] = addslashes($codCurso);
		
		$r = deleteCursoCcr($data);
		
		return $r;
	}
	/****************************************************Fim das funções de delete****************************************/
	/**/
	
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

	function constroiDadosLogin($user, $pass){
		$data = array();
		
		$data['user'] = addslashes($user);
		$data['pass'] = md5(addslashes($pass) . '' . SAL);
		
		$r = login($data);
		return $r;
	}
/*FUNCOES DESENVOLVIDAS POR FERNANDONESI@GMAIL.COM*/
	function listarServidor(){
		$resultado = selectServidor();
		echo '<kbd>Usuários TESTE existentes:</kbd></br></br>';	
		while ($row = mysql_fetch_array($resultado)) {
			echo '<kbd>Nome:</kbd> '.$row['nome'].' '.$row['sobrenome'].'</br>';
			echo 'Siape: <kbd>'.$row['siape'].'</kbd></br>';
			echo 'Email: <kbd>'.$row['email'].'</kbd></br>';
			echo 'Senha: <kbd>1234</kbd></br>';
			echo 'Nível: <kbd>'.$row['nivel'].'</kbd></br>';
			echo '</br>';
		}
	}

	function listarMenu($nivel){		
		$resultado = selectMenu($nivel);
		echo '<div class="list-group-success">';
		if($nivel == 0)
        echo '  <a href="inicio.php" class="list-group-item list-group-item-success leftt" target="iframe-tela-meio">Inicio</a>';
		else
		echo '  <a href="inicio.php" class="list-group-item list-group-item-success leftt" target="iframe-tela-meio">Inicio</a>';
		while ($row = mysql_fetch_array($resultado)) {
			echo '  <a href="'.$row['linkAreaMenu'].'" class="list-group-item leftt" target="iframe-tela-meio">'.$row['descricaoAreaMenu'].'</a>';
		}
        echo '  <a href="sair.php" class="list-group-item leftt">Sair</a>';
        echo '</div>';
	}
	
	function listarAreas(){
		$resultado = selectAreas();	
		$cont = 0;
		echo' <h3> Selecione as areas visiveis por cada Nivel </h3>';
		echo' <div class="row">';		
		while ($rowArea = mysql_fetch_array($resultado)) {
			if($cont == 0){
				echo' <div class="row">';
				echo'<div class="col-md-2 text-right"> <h5>'.$rowArea['descricaoAreaMenu'].'</h5> </div>';
				echo'<div class="col-md-10">';
				echo'<form action="salvaArea.php" method=GET">';
				echo'<input type="hidden" name="nomeAreaMenu" value="'.$rowArea['nomeAreaMenu'].'">';
				echo'<input type="hidden" name="idAreaMenu" value="'.$rowArea['idAreaMenu'].'">';
			}
			
			//echo' <div class="btn-group" data-toggle="buttons">';
			echo' <label class="btn btn-default'; if($rowArea['visivel'] ==1)echo' active'; echo'">';
			echo' 	<input type="checkbox" name=check[] value='.$rowArea['idNivelServidor'].' ';
			if($rowArea['visivel'] ==1)echo'CHECKED'; echo '>'; 
			echo' '.$rowArea['nivel'].'';
			echo' </label>';
			//echo' </div>';

			$cont++;
			if($cont == 4){
		    echo' <input type="submit" value="Salvar">';
			echo' </form>';				  
			echo' </div>';// fecha btn-group
			echo' ';// fecha col-md-10
			echo' </div>';// fecha row	
			$cont = 0;
			}
		
		}		
	}
	
	//@parametros (string, integer);
	//@parametros (nome da pagina, id do nivel do servidor)
	function acessoRecusado($areaMenu, $idNivelServidor){
		$resultado = selectAcessoRecusado($areaMenu, $idNivelServidor);
		
		$rowAcess = mysql_fetch_array($resultado);
		if($rowAcess['visivel']){
			return TRUE;
		}else
		return FALSE;	
	}
	
	function mostraServidorSelecionado($siape){
		$resultado = selectUmServidor($siape);
		
		$rowAcess = mysql_fetch_array($resultado);
		
		if($rowAcess){
			return $rowAcess;
		}
		else{
			return NULL;
		}
	}
	
	function mostraTodosNiveisCurso(){
		$resultado = selectListaNivelCurso(); 
		$i = 0;
		while($rowAcess = mysql_fetch_array($resultado)){
			$lista[$i] = $rowAcess;
			$i++;
		}
		$lista[$i] = NULL;
		return $lista;
	}
	
	function mostraCursoPorNivel($idNivelCurso){
		$resultado = selectListaCurso($idNivelCurso); 
		$i = 0;
		while($rowAcess = mysql_fetch_array($resultado)){
			$lista[$i] = $rowAcess;
			$i++;
		}
		$lista[$i] = NULL;
		return $lista;
	}
	
	function mostraCursoPorCcr($codCurso){
		$resultado = selectListaCcr($codCurso); 
		$i = 0;
		while($rowAcess = mysql_fetch_array($resultado)){
			$lista[$i] = $rowAcess;
			$i++;
		}
		$lista[$i] = NULL;
		return $lista;
		
	}
	
	function listarServidorCursoCcr($anoSemestre, $nivelCurso, $codCurso, $codCcr, $idDominio, $siape, $buscando){

		if($buscando)
		$resultado = selectServidorCursoCcr($anoSemestre, $nivelCurso, $codCurso, $codCcr, $idDominio, $siape);
	
		$linha = 0;
		echo'<table class="table table-bordered">';
			echo'<tr class="success text-center">';
				echo'<td><strong>Nível</strong></td>';
				echo'<td><strong>Curso</strong></td>';
				echo'<td><strong>Ccr</strong></td>';
				echo'<td><strong>Domínio</strong></td>';
				echo'<td><strong>Siape</strong></td>';
				echo'<td><strong>Professor</strong></td>';
				echo'<td><strong>Carga horária</strong></td>';
			echo'</tr>';
		if($buscando)	
		while($row = mysql_fetch_array($resultado)){
			if(!$linha){	
				echo'<tr class="active">';
					echo'<td>'.$row['nomeNivelCurso'].'</td>';
					echo'<td>'.$row['codCurso'].' - '.$row['nomeCurso'].'</td>';
					echo'<td>'.$row['codCcr'].' - '.$row['nomeCcr'].'</td>';
					echo'<td>'.$row['nomeDominio'].'</td>';
					echo'<td>'.$row['siape'].'</td>';
					echo'<td>'.$row['nome'].' '.$row['sobrenome'].'</td>';
					echo'<td>'.$row['cHoraria'].'</td>';
				echo'</tr>';
				$linha = 1;
			}else
			if($linha){
				echo'<tr class="success">';
					echo'<td>'.$row['nomeNivelCurso'].'</td>';
					echo'<td>'.$row['codCurso'].' - '.$row['nomeCurso'].'</td>';
					echo'<td>'.$row['codCcr'].' - '.$row['nomeCcr'].'</td>';
					echo'<td>'.$row['nomeDominio'].'</td>';
					echo'<td>'.$row['siape'].'</td>';
					echo'<td>'.$row['nome'].' '.$row['sobrenome'].'</td>';
					echo'<td>'.$row['cHoraria'].'</td>';
				echo'</tr>';
				$linha = 0;
			}
		}
		echo'</table>';						
	}

/*FUNCOES DESENVOLVIDAS POR FERNANDONESI@GMAIL.COM*/
	
/*INICIO FUNCOES DESENVOLVIDAS POR JACSONMATTE@GMAIL.COM*/
	ini_set( 'default_charset', 'utf-8');
	function listaCargos(){
		$resultado=buscaCargos();
		while ($rowArea = mysql_fetch_array($resultado)) {
			echo '<option>'.utf8_encode($rowArea['cargo']).'</option>';
		}
	}
	
	function listaJornadas(){
		$resultado=buscaJornadas();
		while ($rowArea = mysql_fetch_array($resultado)) {
			echo '<option>'.utf8_encode($rowArea['jornada']).'</option>';
		}
	}
	
	function listaSituacoes(){
		$resultado=buscaSituacoes();
		while ($rowArea = mysql_fetch_array($resultado)) {
			echo '<option>'.utf8_encode($rowArea['situacao']).'</option>';
		}
	}
	
	function listaNiveis(){
		$resultado=buscaNiveis();
		while ($rowArea = mysql_fetch_array($resultado)) {
			echo '<option>'.utf8_encode($rowArea['nivel']).'</option>';
		}
	}

	
	function insereCargo($cargo){
		$resultado=buscaCargo($cargo);
		$rowArea = mysql_fetch_array($resultado);
		if($rowArea["cargo"]==$cargo) return 0;
		sqlInsereCargo($cargo);
		return 1;
	}
	
	function insereJornada($jornada){
		$resultado=buscaCargo($jornada);
		$rowArea = mysql_fetch_array($resultado);
		if($rowArea["jornada"]==$jornada) return 0;
		constroiDadosInsertJornada($jornada);
		return 1;
	}
	
	function insereSituacao($situacao){
		$resultado=buscaSituacao($situacao);
		$rowArea = mysql_fetch_array($resultado);
		if($rowArea["situacao"]==$situacao) return 0;
		sqlInsereSituacao($situacao);
		return 1;
	}
	
	function insereNivel($nivel){
		$resultado=buscaNivel($nivel);
		$rowArea = mysql_fetch_array($resultado);
		if($rowArea["nivel"]==$nivel || $nivel=="Cargos Cadastrados") return 0;
		constroiDadosInsertNivelServidor($nivel);
		return 1;
	}
	
	function excluiNivel($nivel){
		sqlExcluiNivel($nivel);
	}
	
	function excluiJornada($jornada){
		sqlExcluiJornada($jornada);
	}
	
	function excluiCargo($cargo){
		sqlExcluiCargo($cargo);
	}
	
	function insereServidor($inputSiape, $inputNome,$inputSobrenome, $inputEmail,
	                $inputEndereco, $inputCidade, $inputTelefone, $inputCelular,
	                $inputCargo, $inputJornada, $inputSituacao, $inputDataEntrada, $inputDataSaida,
	                $inputNivel, $inputSubstituto, $inputObservacao){
	    $pass = geraSenha(8, true, true, false);
		$encryptedPassword = md5($pass . '' . SAL);
		$inputSenha=$encryptedPassword;
		sqlInsereServidor($inputSiape, $inputNome,$inputSobrenome, $inputEmail, $inputSenha,
	    $inputEndereco, $inputCidade, $inputTelefone, $inputCelular, $inputCargo, $inputJornada, $inputSituacao, $inputDataEntrada,
	    $inputDataSaida, $inputNivel, $inputSubstituto, $inputObservacao);
	}
/*FIM FUNCOES DESENVOLVIDAS POR JACSONMATTE@GMAIL.COM*/	


/* INÍCIO FUNÇÕES DESENVOLVIDAS POR ANDREI TOLEDO */

	function constroiDadosSelectNivelCurso(){
		$rertorno = selectNivelCurso();
		
		return $retorno;
	}

/* FIM DAS FUNÇÕES DESENVOLVIDAS POR ANDREI TOLEDO*/

?>
