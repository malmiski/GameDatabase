<?php
class DatabaseManager{
private $instance;
public $link;
public $str = "hellow";
private	$host = 'localhost';
private	$user = 'root';
private	$password = 'password';
private $databaseName = "gdb";

private function __construct(){
	$this->link = new mysqli($this->host,$this->user,$this->password,$this->databaseName);
//	if($this->link->connect_errno)
//		die("Nope, we couldn't connect to that dem database over thar.");
}
function __destruct(){
if(isset($link))
$link->close();
}

public static function getInstance(){
if(!isset($instance)){
$instance = new DatabaseManager();
}
return $instance;
}

public function query($query){
	return $this->link->query($query);
}

}



?>
