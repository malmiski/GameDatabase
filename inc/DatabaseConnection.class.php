<?php

class DatabaseConnection{
	private $connection;
	private $dsn;	
	private $user;
	private $pass;
	public function __construct($dsn, $user, $pass){
		$this->dsn = $dsn;
		$this->user = $user;
		$this->pass = $pass;
		$this->connection  = new PDO($this->dsn, $this->user, $this->pass);
	}
	public function __toString(){
		return "";
	}
	public function query($query){
		return $this->connection->query($query);
	}
	public function close(){
		$this->connection = null;
	}
}

?>
