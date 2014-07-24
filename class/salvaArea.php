<?php
	include("/library/library.php");
	$library = new library();
	session_start();
	
	//echo 'Area descricao='.$_GET['descricaoAreaMenu'].'</br>';
	//echo 'Area id='.$_GET['idAreaMenu'].'</br>';
	$area = $_GET['idAreaMenu'];
	$nomeArea = $_GET['nomeAreaMenu'];
	$serv0 = 0;
	$serv1 = 0;
	$serv2 = 0;
	$serv3 = 0;
	//setarAreas($area, $nivel, $set);
	
	if(isset($_GET["check"])) {				
		foreach($_GET["check"] as $check) {
			//echo "- " . $check . "</br>";
			if($check == 0)
				$serv0 = 1;
			if($check == 1)
				$serv1 = 1;
			if($check == 2)
				$serv2 = 1;
			if($check == 3)
				$serv3 = 1;						
		} 
	}else{
		if($nomeArea != 'admArea') // não deixar retirar Administrador de Area do ADM
		$library->setarArea($area, 0, $serv0);
		$library->setarArea($area, 1, $serv1);
		$library->setarArea($area, 2, $serv2);
		$library->setarArea($area, 3, $serv3);
	}
	
	if($nomeArea != 'admArea') // não deixar retirar Administrador de Area do ADM
	$library->setarArea($area, 0, $serv0);//echo $area.' - 0 - '.$serv0;
	$library->setarArea($area, 1, $serv1);
	$library->setarArea($area, 2, $serv2);
	$library->setarArea($area, 3, $serv3);	
	header('Location: admArea.php');	
?>
