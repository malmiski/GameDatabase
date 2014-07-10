<?php
/**
 * The Game class represents a physical game and presents a set of functions
 * for dealing with simple operations like changing the name, picture location,
 * and description. It also contains operations for saving these changes to the 
 * database. 
 */
class Game{
	/**
	 * The magic method "__autoload" that loads classes that aren't found
	 * @param  [string] $class The class that the server can't find. This case they all would
	 * be in this directory.
	 */
	function __autoload($class){
		require($class.".class.php");
	}
	private $id;
	private $name;
	private $picture_location;
	private $description;
	private $dbConnection;
	public function __construct(DatabaseConnection $dbc, $id){
		if(is_int($id))
			$this->id = $id;
		else
			$this->id = 0;
		$this->dbConnection = $dbc;
		$query = "SELECT * FROM games WHERE id = ".$this->id;
		$data = $this->dbConnection->query($query);

		$this->name = $data["name"];
	}
}


?>