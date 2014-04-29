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
	
	out();
?>
	