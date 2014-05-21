<?php
	require_once dirname(__FILE__).'/library/library.php';//banco de dados
	in("Pagina de teste");

	$r = popularTabelas();
	echo "valor da index -> $r <-<br/>";
	if($r){
		echo 'deu certo<br/>';
	}else{
		echo 'deu errado<br/>';
	}
	out();
?>
	