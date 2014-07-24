<?php
	include("/library/library.php");
	$library = new library();
	$library->databaseAcess->database->connect->endConnection($library->databaseAcess->database->connection);
	session_destroy();	
	header('Location: login.php');
?>
