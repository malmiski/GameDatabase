<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require("DatabaseManager.php");

$link = DatabaseManager::getInstance();
$query = "SELECT * FROM games";
$res = $link->query($query);
for($i = 0; $i < $res->num_rows; $i++){
	echo $res->fetch_assoc()["name"];
}

        function generate_game_of_the_hour(){
       		$link = DatabaseManager::getInstance();//get_gdb_resource();
        	$query = "SELECT * FROM games";

        	$arrayOfGames = $link->query($query);
        	$numGames = $arrayOfGames->num_rows;

        	$gameIDs = array();
        	for($i=0; $i<$numGames; $i++)
        	{
                	$game = $arrayOfGames->fetch_assoc();
                	$gameIDs[] = $game["id"];
        	}


        	$gameOfTheHourID = $gameIDs[array_rand($gameIDs)];

        	echo "the game of the hour id is $gameOfTheHourID";
        	$query="SELECT * FROM games WHERE id = '{$gameOfTheHourID}'";
        	$arrayOfGames = $link->query($query);

        	return $arrayOfGames->fetch_assoc();
	}


$game = generate_game_of_the_hour();
echo $game;//["name"];
/*
$DB = "gdb";
$PASS = "password";
$HOST = "localhost";
$USER = "root";

$connection = new mysqli($HOST, $USER, $PASS, $DB);
if($connection->connect_errno){
	die("Nope");
}

echo "something went wrong";
$query = "SELECT * FROM games";
  	
$arrayOfGames = $connection->query($query);

echo var_dump($arrayOfGames);
$numGames = $arrayOfGames->num_rows;
$games = $arrayOfGames->fetch_assoc();

for($i = 0; $i<$numGames; $i++){
	echo $arrayOfGames->fetch_assoc()["name"];
}


*/

?>
