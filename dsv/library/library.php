<?php
	require_once dirname(__FILE__).'/databaseAcess.php';//banco de dados
	require_once dirname(__FILE__).'/constant.php';//constantes
	
	/****************************************************Inicio das fun��es de inser��o****************************************/
	function constroiDadosInsertFuncao($funcao){
		$data = array();//inicializa um vetor de dados
		$data['funcao'] = addslashes($funcao);//na posi��o 'function', � passado a string protegida de dados maliciosos para o banco de dados
		$data['regValido'] = 1;//na posi��o 'regValido', � passado o valor 1 como padr�o, significando que o dado primeiramente � valido
		
		/**
		* Por padr�o colocamos o prefixo que vai nos dizer o que a fun��o faz (insert, update, select, delete)
		* e depois o nome da tabela (funcao, cargo, nivelServidor, curso, etc).
		**/
		$r = insertFuncao($data);//r possui o retorno da fun��o 'insertFuncao' que est� na biblioteca 'databaseAcess.php'
		return $r;
	}
	
	function constroiDadosInsertServidorFuncao($idFuncao, $siape, $dataInicio, $dataSaida, $cargaHoraria){
		/**
		*Formato de inser��o de datas: "AAAA-MM-DD hh:mm:ss"
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
	
/**alterar daqui
	function constroiDadosInsertPeriodo($idPeriod, $idSubPeriod, $period, $startHour, $endHour){//********VERIFICAR
		$data = array();
		
		$data['idPeriod'] = $idPeriod;
		$data['idSubPeriod'] = $idSubPeriod;
		$data['period'] = $period;
		$data['startHour'] = $startHour;
		$data['endHour'] = $endHour;
		
		$r = insertPeriodo($data);
		
		return $r;
	}

	function constroiDadosInsertSala($numBloco, $numSala, $descricao){
		$data = array();
		
		$data['numBloco'] = addslashes($numBloco);
		$data['numSala'] = addslashes($numSala);
		$data['descricao'] = addslashes($descricao);
		
		$r = insertSala($data);
		
		return $r;
	}
	
	function constroiDadosInsertStatusAlocacao($id, $descricao){
		$data = array();
		$data['id'] = addslashes($id);
		$data['descricao'] = addslashes($descricao);
		
		$r = insertStatusAlocacao($data);
		
		return $r;
	}
	
	function constroiDadosInsertAlocacao($numBloco, $numSala, $idHorary){
		//$r = getIdTableAlocacao();
		//$id = 0;
		/*if(mysql_num_rows($r) > 0){
			while($row = mysql_fetch_assoc($r)){
				$id = $row['idAlocacao'];
			}
		}
		
		//$id = $id + 1;
		$data = Array();
		//$data['id'] = $id;
		$data['numBlock'] = addslashes($numBlock);
		$data['numClass'] = addslashes($numClass);
		$data['idHorary'] = addslashes($idHorary);
		$data['regValido'] = 1;
		
		$r = insertAlocacao($data);
		
		return $r;
	}
	
	function constroiDadosInsertServidorCursoCcr($semesterYear, $codCcr, $codCourse, $siape, $alocation, $observation){
		$data = array();
		$data['semesterYear'] = addslashes($semesterYear);
		$data['codCcr'] = addslashes($codCcr);
		$data['codCourse'] = addslashes($codCourse);
		$data['siape'] = addslashes($siape);
		$data['alocation'] = addslashes($alocation);
		$data['observation'] = addslashes($observation);
		$data['regValido'] = 1;
		
		$r = insertServidorCursoCcr($data);
		
		return $r;
	}
At� aqui*******************************************************/
	/****************************************************Fim das fun��es de inser��o****************************************/
	/**/
	/****************************************************Inicio das fun��es de altera��o****************************************/
	function constroiDadosUpdateFuncao($idFuncao, $funcao){
		$data = array();
		$data['id'] = addslashes($idFuncao);
		$data['funcao'] = addslashes($funcao);
		
		$r = updateFuncao($data);
		
		return $r;
	}
	
	function constroiDadosUpdateServidorFuncao($idFuncao, $siape, $dataInicio, $dataSaida, $cargaHoraria){
		/**
		*Formato de inser��o de datas: "AAAA-MM-DD hh:mm:ss"
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
	
	function constroiDadosCurso($codCurso, $nome, $idNivelCurso){
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
	
	function constroiDadosUpdateUsuarioServidor($siape, $email, $fone1, $fone2, $endereco, $cidade){//Fun��o que o servidor altera seus dados.
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
	
	function constroiDadosEsqueciMinhaSenha($siape){//Gera uma senha e envia para o email ************INSIRIR FUN��O PARA ENVIAR PARA O EMAIL**********
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
	/****************************************************Fim das fun��es de altera��o****************************************/
	/**/
	/****************************************************Inicio das fun��es de delete****************************************/
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
	/****************************************************Fim das fun��es de delete****************************************/
	/**/
	function popularTabelas(){
		return false;
	}
	
	function geraSenha($tamanho, $maiusculas, $numeros, $simbolos){
		/**
		* Fun��o para gerar senhas aleat�rias
		*
		* @author    Thiago Belem <contato@thiagobelem.net>
		*
		* @param integer $tamanho Tamanho da senha a ser gerada
		* @param boolean $maiusculas Se ter� letras mai�sculas
		* @param boolean $numeros Se ter� n�meros
		* @param boolean $simbolos Se ter� s�mbolos
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
			echo' <kbd>Usu�rios TESTE existentes:</kbd></br></br>';	
		while ($row = mysql_fetch_array($resultado)) {
			echo '<kbd>Nome:</kbd> '.$row['nome'].' '.$row['sobrenome'].'</br>';
			echo 'Siape: <kbd>'.$row['siape'].'</kbd></br>';
			echo 'Email: <kbd>'.$row['email'].'</kbd></br>';
			echo 'Senha: <kbd>1234</kbd></br>';
			echo 'N�vel: <kbd>'.$row['nivel'].'</kbd></br>';
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
		
		echo $resultado;
			
		
		//$rowServidor = mysql_fetch_array($resultado);
		
		//if($rowServidor
		//return $rowServidor;
		return TRUE;
			
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

	function insereServidor($siape,$nome, $sobrenome, $email,$senha,$endereco,$cidade,$telefone,$celular,$cargo,$jornada,$situacao,$dataEntrada,$dataSaida,$nivel,$substituto,$observacao){
		sqlInsereServidor(addslashes($siape),addslashes($nome),addslashes($sobrenome),addslashes($email),addslashes($senha),addslashes($endereco),addslashes($cidade),$telefone,$celular,$cargo,$jornada,$situacao,$dataEntrada,$dataSaida,$nivel,addslashes($substituto),addslashes($observacao));
	}

/*FIM FUNCOES DESENVOLVIDAS POR JACSONMATTE@GMAIL.COM*/	
	
?>
