<?php
class DatabaseManager{
private $instance;
public $link;
public $str = "hellow";
private	$host = 'localhost';
private	$user = 'root';
private	$password = '';
private $databaseName = "game";

private function __construct(){
	$this->link = mysqli_connect($this->host,$this->user,$this->password,$this->databaseName);
	if(mysqli_connect_errno())
		die("Nope, we couldn't connect to that dem database over thar.");
}
function __destruct(){
if(isset($link))
mysqli_close($link);
}

public static function getInstance(){
if(!isset($instance)){
$instance = new DatabaseManager();
}
return $instance;
}

}



?>