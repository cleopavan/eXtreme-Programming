<?php
include("/connect.php");

class database{
	public $connection;
	public $connect;

	function __construct(){
		$this->connect = new connect(new setDB('local',"u454558226_cadu"));
		$this->connection = $this->connect->getConnection();
	}
	
	public function dbConsulta($sql){
		($a = mysqli_query($this->connection,$sql)) or (die ("error: ".mysqli_error($this->connection)));
		return $a;
	}

}

?>
