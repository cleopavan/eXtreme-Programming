<?php
	require_once dirname (__FILE__)."/library/library.php";
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
		setarArea($area, 0, $serv0);
		setarArea($area, 1, $serv1);
		setarArea($area, 2, $serv2);
		setarArea($area, 3, $serv3);
	}
	
	if($nomeArea != 'admArea') // não deixar retirar Administrador de Area do ADM
	setarArea($area, 0, $serv0);//echo $area.' - 0 - '.$serv0;
	setarArea($area, 1, $serv1);
	setarArea($area, 2, $serv2);
	setarArea($area, 3, $serv3);	
	header('Location: admArea.php');	
?>
