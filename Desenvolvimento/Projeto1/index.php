<?php
	require_once dirname(__FILE__).'/library/library.php';//banco de dados
	in("Pagina de teste");
	
	$r = callTest();
	if(mysql_num_rows($r) > 0){
		while($l = mysql_fetch_assoc($r)){
			$id = $l['idNivel'];
			$nome = $l['nivel'];
			echo "$id".'<br/>';
			echo "$nome";
		}
	}
	echo '<br/><br/><br/><br/>';
	
	$r = chamaCadastroFuncao("faz nada");
	echo "valor da index -> $r <-<br/>";
	if($r){
		echo 'deu certo<br/>';
	}else{
		echo 'deu errado<br/>';
	}
	out();
?>
	