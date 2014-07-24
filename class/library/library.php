<?php
include("/databaseAcess.php");//banco de dados
include("/constant.php");//constantes

class library{
	public $databaseAcess;
	
	function __construct(){
		$this->databaseAcess = new databaseAcess();
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

	
	/****************************************************Inicio das funções de inserção****************************************/
	function constroiDadosInsertFuncao($funcao){
		$data = array();/*inicializa um vetor de dados*/
		$data['funcao'] = addslashes($funcao);/*na posição 'function', é passado a string protegida de dados maliciosos para o banco de dados*/
		$data['regValido'] = 1;/*na posição 'regValido', é passado o valor 1 como padrão, significando que o dado primeiramente é valido*/
		
		/**
		* Por padrão colocamos o prefixo que vai nos dizer o que a função faz (insert, update, select, delete)
		* e depois o nome da tabela (funcao, cargo, nivelServidor, curso, etc).
		**/
		$r = $this->databaseAcess->insertFuncao($data);/*r possui o retorno da função 'insertFuncao' que está na biblioteca 'databaseAcess.php'*/
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
		
		$r = $this->databaseAcess->insertServidorFuncao($data);
		return $r;
	}
	
	function constroiDadosInsertCargo($cargo){
		$data = Array();
		$data['cargo'] = addslashes($cargo);
		$data['regValido'] = 1;
		
		$r = $this->databaseAcess->insertCargo($data);
		
		return $r;
	}
	
	function constroiDadosInsertJornada($jornada){
		$data = Array();
		$data['jornada'] = addslashes($jornada);
		$data['regValido'] = 1;
		
		$r = $this->databaseAcess->insertJornada($data);
		
		return $r;
	}
	
	function constroiDadosInsertSituacaoServidor($situacao, $dataEntrada, $dataSaida){
		$data = Array();
		$data['situacao'] = addslashes($situacao);
		$data['dataEntrada'] = addslashes($dataEntrada);
		$data['dataSaida'] = addslashes($dataSaida);
		$data['regValido'] = 1;
		
		$r = $this->databaseAcess->insertSituacaoServidor($data);
		
		return $r;
	}
	
	function constroiDadosInsertNivelServidor($nivel){
		$data = Array();
		$data['nivel'] = addslashes($nivel);
		$data['regValido'] = 1;
		
		$r = $this->databaseAcess->insertNivelServidor($data);
		
		return $r;
	}
	
	function constroiDadosInsertAreaMenu($nomeAreaMenu, $descricaoAreaMenu, $linkAreaMenu){
		$data = array();
		$data['nomeAreaMenu'] = addslashes($nomeAreaMenu);
		$data['descricaoAreaMenu'] = addslashes($descricaoAreaMenu);
		$data['linkAreaMenu'] = addslashes($linkAreaMenu);
		
		$r = $this->databaseAcess->insertAreaMenu($data);
		
		return $r;
	}
	
	function constroiDadosInsertNivelServidorAreaMenu($idNivelServidor, $idAreaMenu){
		$data = array();
		$data['idNivelServidor'] = addslashes($idNivelServidor);
		$data['idAreaMenu'] = addslashes($idAreaMenu);
		
		$r = $this->databaseAcess->insertNivelServidorAreaMenu($data);
		
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
		$pass = $this->geraSenha(8, true, true, false);
		$encryptedPassword = md5($pass . '' . SAL);
		$data['pass'] = $encryptedPassword;
	
		$r = $this->databaseAcess->insertServidor($data);
		
		return $r;
	}

	function constroiDadosInsertNivelCurso($nivel){
		$data = Array();
		$data['nivel'] = addslashes($nivel);
		$data['regValido'] = 1;
		
		$r = $this->databaseAcess->insertNivelCurso($data);
		
		return $r;
	}
	
	function constroiDadosInsertCurso($codCurso, $nome, $idNivelCurso){
		$data = Array();
		$data['codCurso'] = addslashes($codCurso);
		$data['nome'] = addslashes($nome);
		$data['idNivelCurso'] = addslashes($idNivelCurso);
		$data['regValido'] = 1;
		
		$r = $this->databaseAcess->insertCurso($data);
		
		return $r;
	}
	
	function constroiDadosInsertDominio($dominio){
		$data = Array();
		$data['dominio'] = addslashes($dominio);
		$data['regValido'] = 1;
		
		$r = $this->databaseAcess->insertDominio($data);
		
		return $r;
	}
	
	function constroiDadosInsertCcr($codCcr, $nome, $cHoraria, $idDominio, $codCurso){
		$data = Array();
		$data['codCcr'] = addslashes($codCcr);
		$data['nome'] = addslashes($nome);
		$data['cHoraria'] = addslashes($cHoraria);
		$data['idDominio'] = addslashes($idDominio);
		$data['codCurso'] = addslashes($codCurso);
		$data['regValido'] = 1;
		
		$r = $this->databaseAcess->insertCcr($data);
		$r = $this->databaseAcess->insertCursoCcr($data);
		
		return $r;
	}
	
	function constroiDadosInsertCursoCcr($codCcr, $codCurso){
		$data = array();
		$data['codCcr'] = addslashes($codCcr);
		$data['codCurso'] = addslashes($codCurso);
		$data['regValido'] = 1;
		
		$r = $this->databaseAcess->insertCursoCcr($data);
		
		return $r;
	}
	
	function constroiDadosInsertServidorCursoCcr($anoSemestre, $codCurso, $codCcr, $siape, $observacoes){
		$data = array();
		
		$data['anoSemestre'] = addslashes($anoSemestre);
		$data['codCurso'] = (int)addslashes($codCurso);
		$data['codCcr'] = (int)addslashes($codCcr);
		$data['siape'] = addslashes($siape);
		$data['observacoes'] = addslashes($observacoes);
		
		$r = $this->databaseAcess->insertServidorCursoCcr($data);
		
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
			$filtro = 'nomeDominio';
			$texto = $texto;
			$tabela = 'dominio';
		}else if($filtro == 'curso'){//string
			$filtro = 'nomeCurso';
			$texto = $texto;
			$tabela = 'curso';
		}
		
		$data['filtro'] = $filtro;
		$data['texto'] = $texto;
		$data['tabela'] = $tabela;
		
		$r = $this->databaseAcess->selectCcr($data);
		
		return $r;
	}
	function constroiDadosSelectCursoInfo(){
		$r = $this->databaseAcess->selectCursoInfo();
		
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
			$filtro = 'nomeCurso';
			$texto = $texto;
			$tabela = 'curso';
		}else if($filtro == 'cargo'){//string
			$filtro = 'cargo';
			$texto = $texto;
			$tabela = 'cargo';
		}
		
		$data['filtro'] = $filtro;
		$data['texto'] = $texto;
		$data['tabela'] = $tabela;
		
		$r = $this->databaseAcess->selectServidorDados($data);
		
		return $r;
	}
//////////////////////////////////
	
	
	function constroiDadosSelectDominio($id){
		$data = array();
		$data['id'] = addslashes($id);
		
		$r = $this->databaseAcess->selectDominio($data);
		
		return $r;
	}
	/****************************************************Fim das funções de seleção****************************************/
	/**/
	/****************************************************Inicio das funções de alteração****************************************/
	function constroiDadosUpdateFuncao($idFuncao, $funcao){
		$data = array();
		$data['id'] = addslashes($idFuncao);
		$data['funcao'] = addslashes($funcao);
		
		$r = $this->databaseAcess->updateFuncao($data);
		
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
		
		$r = $this->databaseAcess->updateServidorFuncao($data);
		return $r;
	}
	
	function constroiDadosUpdateCargo($idCargo, $cargo){
		$data = Array();
		$data['id'] = addslashes($idCargo);
		$data['cargo'] = addslashes($cargo);
		
		$r = $this->databaseAcess->updateCargo($data);
		return $r;
	}
	
	function constroiDadosUpdateJornada($idJornada, $jornada){
		$data = Array();
		$data['id'] = addslashes($idJornada);
		$data['jornada'] = addslashes($jornada);
		
		$r = $this->databaseAcess->updateJornada($data);
		return $r;
	}
	
	function constroiDadosUpdateSituacaoServidor($idSituacaoServidor, $situacao, $dataEntrada, $dataSaida){
		$data = Array();
		$data['id'] = addslashes($idSituacaoServidor);
		$data['situacao'] = addslashes($situacao);
		$data['dataEntrada'] = addslashes($dataEntrada);
		$data['dataSaida'] = addslashes($dataSaida);
		
		$r = $this->databaseAcess->updateSituacaoServidor($data);
		return $r;
	}
	
	function constroiDadosUpdateNivelServidor($idNivelServidor, $nivel){
		$data = Array();
		$data['id'] = addslashes($idNivelServidor);
		$data['nivel'] = addslashes($nivel);
		
		$r = $this->databaseAcess->updateNivelServidor($data);
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

		$r = $this->databaseAcess->updateServidor($data);
		return $r;
	}
	
	function constroiDadosUpdateNivelCurso($id, $nivel){
		$data = Array();
		$data['id'] = addslashes($id);
		$data['nivel'] = addslashes($nivel);

		$r = $this->databaseAcess->updateNivelCurso($data);
		return $r;
	}
	
	function constroiDadosUpdateCurso($codCurso, $nome, $idNivelCurso){
		$data = Array();
		$data['codCurso'] = addslashes($codCurso);
		$data['nome'] = addslashes($nome);
		$data['idNivelCurso'] = addslashes($idNivelCurso);

		$r = $this->databaseAcess->updateCurso($data);
		return $r;
	}
	
	function constroiDadosUpdateDominio($id, $dominio){
		$data = Array();
		$data['id'] = addslashes($id);
		$data['dominio'] = addslashes($dominio);
		
		$r = $this->databaseAcess->updateDominio($data);
		return $r;
	}
	
	function constroiDadosUpdateCcr($codCcr, $nome, $cHoraria, $idDominio){
		$data = Array();
		$data['codCcr'] = addslashes($codCcr);
		$data['nome'] = addslashes($nome);
		$data['cHoraria'] = addslashes($cHoraria);
		$data['idDominio'] = addslashes($idDominio);
		
		$r = $this->databaseAcess->updateCcr($data);
		return $r;
	}
	
	function constroiDadosUpdateCursoCcr($codCcr, $codCurso){
		$data = Array();
		$data['codCcr'] = addslashes($codCcr);
		$data['codCurso'] = addslashes($codCurso);
		
		$r = $this->databaseAcess->updateCursoCcr($data);
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
		
		$r = $this->databaseAcess->updateUsuarioServidor($data);
		
		return $r;
	}
	
	function constroiDadosEsqueciMinhaSenha($siape){//Gera uma senha e envia para o email ************INSIRIR FUNÇÃO PARA ENVIAR PARA O EMAIL**********
		$data = array();
		$data['siape'] = addslashes($siape);
		$senha = $this->geraSenha(8, true, true, false);
		$encryptedPassword = md5($senha . '' . SAL);
		$data['senha'] = $encryptedPassword;
		
		$r = $this->databaseAcess->esqueciMinhaSenha($data);
		
		return $r;
	}
	
	function constroiDadosUpdateSenhaServidor($siape, $senha){
		$data = array();
		$data['siape'] = addslashes($siape);
		$data['senha'] = addslashes($senha);
		
		$r = $this->databaseAcess->esqueciMinhaSenha($data);
		
		return $r;
	}
	/****************************************************Fim das funções de alteração****************************************/
	/**/
	/****************************************************Inicio das funções de delete****************************************/
	function constroiDadosDeleteFuncao($id){
		$data = array();
		$data['id'] = addslashes($id);
		
		$r = $this->databaseAcess->deleteFuncao($data);
		
		return $r;
	
	}
	
	function constroiDadosDeleteServidorFuncao($idFuncao, $siape, $dataInicio){
		$data = array();
		$data['idFuncao'] = addslashes($idFuncao);
		$data['siape'] = addslashes($siape);
		$data['dataInicio'] = addslashes($dataInicio);
		
		$r = $this->databaseAcess->deleteServidorFuncao($data);
		
		return $r;
	
	}
	
	function constroiDadosDeleteCargo($id){
		$data = array();
		$data['id'] = addslashes($id);
		
		$r = $this->databaseAcess->deleteCargo($data);
		
		return $r;
	
	}
	
	function constroiDadosDeleteJornada($id){
		$data = array();
		$data['id'] = addslashes($id);
		
		$r = $this->databaseAcess->deleteJornada($data);
		
		return $r;
	}
	
	function constroiDadosDeleteNivelServidor($id){
		$data = array();
		$data['id'] = addslashes($id);
		
		$r = $this->databaseAcess->deleteNivelServidor($data);
		
		return $r;
	}
	
	function constroiDadosDeleteServidor($siape){
		$data = array();
		$data['siape'] = addslashes($siape);
		
		$r = $this->databaseAcess->deleteServidor($data);
		
		return $r;
	}
	
	function constroiDadosDeleteNivelCurso($id){
		$data = array();
		$data['id'] = addslashes($id);
		
		$r = $this->databaseAcess->deleteNivelCurso($data);
		
		return $r;
	}
	
	function constroiDadosDeleteCurso($codCurso){
		$data = array();
		$data['codCurso'] = addslashes($codCurso);
		
		$r = $this->databaseAcess->deleteCurso($data);
		
		return $r;
	}
	
	function constroiDadosDeleteDominio($id){
		$data = array();
		$data['id'] = addslashes($id);
		
		$r = $this->databaseAcess->deleteDominio($data);
		
		return $r;
	}
	
	function constroiDadosDeleteCcr($codCcr){
		$data = array();
		$data['codCcr'] = addslashes($codCcr);
		
		$r = $this->databaseAcess->deleteCcr($data);
		
		return $r;
	}
	
	function constroiDadosDeleteCursoCcr($codCcr, $codCurso){
		$data = array();
		$data['codCcr'] = addslashes($codCcr);
		$data['codCurso'] = addslashes($codCurso);
		
		$r = $this->databaseAcess->deleteCursoCcr($data);
		
		return $r;
	}
	/****************************************************Fim das funções de delete****************************************/
	/**/
	
	function constroiDadosLogin($user, $pass){
		$data = array();
		
		$data['user'] = addslashes($user);
		$data['pass'] = md5(addslashes($pass) . '' . SAL);
		
		$r = $this->databaseAcess->login($data);
		return $r;
	}
/*FUNCOES DESENVOLVIDAS POR FERNANDONESI@GMAIL.COM*/
	function insereServidorCursoCcr($anoSemestre,$codCurso,$codCcr,$siape,$observacoes){
		$dados['anoSemestre'] = $anoSemestre;
		$dados['codCurso'] = $codCurso;
		$dados['codCcr'] = $codCcr;
		$dados['siape'] = $siape;
		$dados['observacoes'] = $observacoes;
		
		$result = $this->databaseAcess->insertServidorCursoCcr($dados);
		
		return $result;
	}
	
	function listarServidor(){
		$resultado = $this->databaseAcess->selectServidor();
		echo '<kbd>Usuários TESTE existentes:</kbd></br></br>';	
		while ($row = mysqli_fetch_array($resultado)) {
			echo '<kbd>Nome:</kbd> '.$row['nome'].' '.$row['sobrenome'].'</br>';
			echo 'Siape: <kbd>'.$row['siape'].'</kbd></br>';
			echo 'Email: <kbd>'.$row['email'].'</kbd></br>';
			echo 'Senha: <kbd>1234</kbd></br>';
			echo 'Nível: <kbd>'.$row['nivel'].'</kbd></br>';
			echo '</br>';
		}
	}

	function listarMenu($nivel){		
		$resultado = $this->databaseAcess->selectMenu($nivel);
		echo '<div class="list-group-success">';
		if($nivel == 0)
        echo '  <a href="inicio.php" class="list-group-item list-group-item-success leftt" target="iframe-tela-meio">Inicio</a>';
		else
		echo '  <a href="inicio.php" class="list-group-item list-group-item-success leftt" target="iframe-tela-meio">Inicio</a>';
		while ($row = mysqli_fetch_array($resultado)) {
			echo '  <a href="'.$row['linkAreaMenu'].'" class="list-group-item leftt" target="iframe-tela-meio">'.$row['descricaoAreaMenu'].'</a>';
		}
        echo '  <a href="sair.php" class="list-group-item leftt">Sair</a>';
        echo '</div>';
	}
	
	function listarAreas(){
		$resultado = $this->databaseAcess->selectAreas();	
		$cont = 0;
		echo' <h3> Selecione as areas visiveis por cada Nivel </h3>';
		echo' <div class="row">';		
		while ($rowArea = mysqli_fetch_array($resultado)) {
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
		$resultado = $this->databaseAcess->selectAcessoRecusado($areaMenu, $idNivelServidor);
		
		$rowAcess = mysqli_fetch_array($resultado);
		if($rowAcess['visivel']){
			return TRUE;
		}else
		return FALSE;	
	}
	
	function mostraServidorSelecionado($siape){
		$resultado = $this->databaseAcess->selectUmServidor($siape);
		
		$rowAcess = mysqli_fetch_array($resultado);
		
		if($rowAcess){
			return $rowAcess;
		}
		else{
			return NULL;
		}
	}
	
	function mostraTodosNiveisCurso(){
		$resultado = $this->databaseAcess->selectListaNivelCurso(); 
		$i = 0;
		while($rowAcess = mysqli_fetch_array($resultado)){
			$lista[$i] = $rowAcess;
			$i++;
		}
		$lista[$i] = NULL;
		return $lista;
	}
	
	function mostraCursoPorNivel($idNivelCurso){
		$resultado = $this->databaseAcess->selectListaCurso($idNivelCurso); 
		$i = 0;
		while($rowAcess = mysqli_fetch_array($resultado)){
			$lista[$i] = $rowAcess;
			$i++;
		}
		$lista[$i] = NULL;
		return $lista;
	}
	
	function mostraCursoPorCcr($codCurso){
		$resultado = $this->databaseAcess->selectListaCcr($codCurso); 
		$i = 0;
		while($rowAcess = mysqli_fetch_array($resultado)){
			$lista[$i] = $rowAcess;
			$i++;
		}
		$lista[$i] = NULL;
		return $lista;
		
	}
	
	function listarServidorCursoCcr($anoSemestre, $nivelCurso, $codCurso, $codCcr, $idDominio, $siape){

		$resultado = $this->databaseAcess->selectServidorCursoCcr($anoSemestre, $nivelCurso, $codCurso, $codCcr, $idDominio, $siape);
		//resultado
		return $resultado;				
	}
	
	function listaCursoCcr($nivel,$curso){
		$resultado = $this->databaseAcess->selectCursoCcr($nivel,$curso);
		return $resultado;
		//novo
	}
	

/*FUNCOES DESENVOLVIDAS POR FERNANDONESI@GMAIL.COM*/
	
/*INICIO FUNCOES DESENVOLVIDAS POR JACSONMATTE@GMAIL.COM*/
	function listaCargos(){
		$resultado=$this->databaseAcess->buscaCargos();
		while ($rowArea = mysqli_fetch_array($resultado)) {
			echo '<option>'.utf8_encode($rowArea['cargo']).'</option>';
		}
	}
	
	function listaJornadas(){
		$resultado=$this->databaseAcess->buscaJornadas();
		while ($rowArea = mysqli_fetch_array($resultado)) {
			echo '<option>'.utf8_encode($rowArea['jornada']).'</option>';
		}
	}
	
	function listaSituacoes(){
		$resultado=$this->databaseAcess->buscaSituacoes();
		while ($rowArea = mysqli_fetch_array($resultado)) {
			echo '<option>'.utf8_encode($rowArea['situacao']).'</option>';
		}
	}
	
	function listaNiveis(){
		$resultado=$this->databaseAcess->buscaNiveis();
		while ($rowArea = mysqli_fetch_array($resultado)) {
			echo '<option>'.utf8_encode($rowArea['nivel']).'</option>';
		}
	}
	
	function insereCargo($cargo){
		$resultado=$this->databaseAcess->buscaCargo($cargo);
		$rowArea = mysqli_fetch_array($resultado);
		if($rowArea["cargo"]==$cargo) return 0;
		$this->sqlInsereCargo($cargo);
		return 1;
	}
	
	function insereJornada($jornada){
		$resultado=$this->databaseAcess->buscaCargo($jornada);
		$rowArea = mysqli_fetch_array($resultado);
		if($rowArea["jornada"]==$jornada) return 0;
		$this->constroiDadosInsertJornada($jornada);
		return 1;
	}
	
	function insereSituacao($situacao){
		$resultado=$this->databaseAcess->buscaSituacao($situacao);
		$rowArea = mysqli_fetch_array($resultado);
		if($rowArea["situacao"]==$situacao) return 0;
		$this->sqlInsereSituacao($situacao);
		return 1;
	}
	
	function insereNivel($nivel){
		$resultado=$this->databaseAcess->buscaNivel($nivel);
		$rowArea = mysqli_fetch_array($resultado);
		if($rowArea["nivel"]==$nivel || $nivel=="Cargos Cadastrados") return 0;
		$this->constroiDadosInsertNivelServidor($nivel);
		return 1;
	}
	
	function excluiNivel($nivel){
		$this->databaseAcess->sqlExcluiNivel($nivel);
	}
	
	function excluiJornada($jornada){
		$this->databaseAcess->sqlExcluiJornada($jornada);
	}
	
	function excluiCargo($cargo){
		$this->databaseAcess->sqlExcluiCargo($cargo);
	}
	
	function insereServidor($inputSiape, $inputNome,$inputSobrenome, $inputEmail,
	                $inputEndereco, $inputCidade, $inputTelefone, $inputCelular,
	                $inputCargo, $inputJornada, $inputSituacao, $inputDataEntrada, $inputDataSaida,
	                $inputNivel, $inputSubstituto, $inputObservacao){
	    $pass = $this->geraSenha(8, true, true, false);
		$encryptedPassword = md5($pass . '' . SAL);
		$inputSenha=$encryptedPassword;
		$this->databaseAcess->sqlInsereServidor($inputSiape, $inputNome,$inputSobrenome, $inputEmail, $inputSenha,
	    $inputEndereco, $inputCidade, $inputTelefone, $inputCelular, $inputCargo, $inputJornada, $inputSituacao, $inputDataEntrada,
	    $inputDataSaida, $inputNivel, $inputSubstituto, $inputObservacao);
	}
/*FIM FUNCOES DESENVOLVIDAS POR JACSONMATTE@GMAIL.COM*/	


/* INÍCIO FUNÇÕES DESENVOLVIDAS POR ANDREI TOLEDO */

	function constroiDadosSelectNivelCurso(){
		$rertorno = $this->databaseAcess->selectNivelCurso();
		
		return $retorno;
	}

/* FIM DAS FUNÇÕES DESENVOLVIDAS POR ANDREI TOLEDO*/
}
?>
