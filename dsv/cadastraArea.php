<?php
	require_once dirname (__FILE__)."/library/library.php";
	session_start();
	
	$nome = $_GET['nome'];
	$descricao = $_GET['descricao'];
	$link = $_GET['link'];
	
	$r = insertArea($nome, $descricao, $link);	
	
	header('Location: admArea.php?insertArea=Success');	
?>
