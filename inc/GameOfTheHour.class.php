<?php
require("Game.class.php");

/**
 * A class for receiving and setting the current game of the hour only contains static functions and methods
 */
class GameOfTheHour{
	private static $game;


	/**
	 * The constructor for GameOfTheHour private to keep other classes from initializing it
	 */
	private function __construct(){
		// Don't do anything
	}
	/**
	 * Returns the @link Game.class.php [Game] object 
	 * @return [type] [description]
	 */
	public static function getGameOfTheHour(){
		if(!($handle = fopen("goth.special", "w+"))){
			return null;
		}
		$g = new Game(); 


	}
}

?>