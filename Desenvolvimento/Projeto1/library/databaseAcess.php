<?php
	require_once dirname(__FILE__).'/../database/database.php';//banco de dados

	function test(){
		$sql = "SELECT * FROM nivel";
		
		$r=dbConsulta($sql);
		return $r;
	}








?>