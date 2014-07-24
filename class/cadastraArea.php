<?php
	include("/library/library.php");
	$library = new library();
	session_start();
	
	$nome = $_GET['nome'];
	$descricao = $_GET['descricao'];
	$link = $_GET['link'];
	
	$r = $library->insertArea($nome, $descricao, $link);	
	
	header('Location: admArea.php?insertArea=Success');	
?>
