<?php
	require_once dirname(__FILE__).'/library/library.php';//banco de dados
	in("Index");
	echo '<body>';
	
	session_start();
	if(isset($_SESSION['logged']) && $_SESSION['logged'] == 1) header("Location: home.php");
	
	/*$r = popularTabelas();
	if($r){
		//echo 'deu certo<br/>';
	}else{
		//echo 'deu errado<br/>';
	}*/
	
	echo '<div class="sign_in" id="id-sign_in">';
	echo '	<div class="container_logo" id="id-container_logo">';
	echo '		<p>Login</p>';
	echo '	</div>';
	echo '	<div id="container_form" class="container_form">';
	echo '		<form action="login.php" method="post"> </br>';
	echo '			Siape: <input id="field_form" class="input_login" type="text" name="siape" value="" placeholder=" Siape"> </br></br>';
	echo '			Senha: <input id="field_form" class="input_login" type="password" name="password" value="" placeholder=" Senha" > </br></br>';
	echo '			<input id="button_form" class="button_login" type="submit" name="Signin" value="Entrar">';
	echo '		</form>';
	echo '	</div>';
	echo '</div>';
	
	echo '<div class="container_title" id="id-container_title">';
	echo '	<p>CADASTRO de COMPONENTES CURRICULARES</p>';
	echo '</div>';
	
	echo '<div class="footer" id="id-footer">';
	echo '	<a href="http://www.uffs.edu.br" target="blank">';
	echo '	<div class="container_logo_uffs" id="id-container_logo_uffs">';
	echo '	</div>';
	echo '</a>';
	echo '<p>Universidade Federal da Fronteira Sul </br> Ci�ncia da Computa��o</p>';
	echo '</div>';
	out();
?>
	