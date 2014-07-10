<?php
class GameDatabaseConnection{
	function __autoload($class){
		require($class.".class.php");
	}
	private $dbConnection;

	public function __construct(){
		try{
			$this->dbConnection = new DatabaseConnection("mysql:host=localhost;dbname=gdb", "root", "");
		}catch(Exception $e){
			echo "Sorry can't: ".$e->getMessage();
		}
	}

	public function getConsoles($order){
		$query = "SELECT * FROM consoles ORDER BY {$order}";
		return $this->dbConnection->query($query);
	}
	public function __destruct(){
		$this->dbConnection->close();
	}
}
?>