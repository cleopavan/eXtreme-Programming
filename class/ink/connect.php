<?php

class connect{
	private $connect;
		
	function __construct($db){ 
		$connect = mysqli_init(); 
		if(!$connect){
			die("Mysqli_init failed!");
		}
		$r = mysqli_real_connect($connect,$db->getHost(),$db->getUser(),$db->getPass(),$db->getDb());
		if(!$r){
			die("Connect Error: " . mysqli_connect_error());
		}
		mysqli_select_db($connect,$db->getUser());
		mysqli_set_charset($connect,"UTF8");
		$this->connect = $connect;
	}

	public function getConnection(){
		return $this->connect;
	}
	
	public function endConnection($connect){
		mysqli_close($connect);
	}
}
class setDB{
	private $host;
	private $user;
	private $pass;
	private $db;
	
	function __construct($banco,$db){
		$this->db = $db;
		if($banco == 'server'){
			$this->host = "mysql.hostinger.com.br";
			$this->user = "u454558226_cadu";
			$this->pass = "t3051696";
		}
		if($banco == 'local'){
			$this->host = "localhost";
			$this->user = "root";
			$this->pass = "";
		}
	
		if($banco == 'jacson'){
			$this->host = "localhost";
			$this->user = "root";
			$this->pass = "NOVASENHA";
		}
	}
	
	public function getHost(){
		return $this->host;
	}
	
	public function getUser(){
		return $this->user;
	}
	
	public function getPass(){
		return $this->pass;
	}
	
	public function getDb(){
		return $this->db;
	}
}

?>
