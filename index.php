<html lang="en-us">
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width"/>

	<link rel="stylesheet" type="text/css" href="css/master.css"/>
	<link rel="stylesheet" type="text/css" href="css/home.css"/>
	<link rel="stylesheet" type="text/css" href="css/navigation.css"/>
	<link rel="stylesheet" type="text/css" href="css/responsive.css" media="screen and (max-width:1500px)"/>
	<link rel="stylesheet" type="text/css" href="css/print.css" media="print"/>
	<link rel="icon" type="image/ico" href="img/favicon.ico"/>

	<script type="text/javascript" src="js/jquery/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui/jquery-ui-1.10.4.custom/js/jquery-ui-1.10.4.custom.js"></script>
	<script type="text/javascript" src="js/master.js"></script>
	<script type="text/javascript" src="js/home.js"></script>

	<title>That's life</title>
</head>
<body>
	<?php
	include "navigationBar.php";
	include "sidebar.php";
  $link = get_gdb_resource();
	$TABLE = "consoles";
	$query = "SELECT * FROM {$TABLE} ORDER BY id";
	$arrayOfConsoles = $link->query($query);
?>
<div id="title_div">THE GAME DATABASE</div>
<div id="content_div">
	<div id="game_of_the_hour_div">
		<h3>GAME OF THE HOUR</h3>
		<div id="game_hour_div">
			<?php
				 $game=generate_game_of_the_hour();
				 echo '<img class="game_hour_img" src="img/covers/'.$game["image"].'" alt="'.$game["name"].'">'."\n";
			?>
		</div>
		<h4><?php echo $game["name"]." ". "[". $game["console"]."]";?></h4>
		<div  id="game_description_div">
<!-- 			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
			Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
			Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
			Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
 -->
		</div>
	</div>
<div id="consoles_and_games_div">
<?php
//===========================================================================================================
//Application code
//===========================================================================================================
// 	for($i = mysqli_num_rows($arrayOfConsoles); $i >0; $i--){
// 		// Get array of associative attributes for this console
// 		$array = $arrayOfConsoles->fetch_array();
// 		$console_name = $array["name"];
// 		$console_name = str_replace(" ", "_", $console_name);
// 		$console_name = str_replace("'", "_", $console_name);

// 		echo '<div id="console_container_div">'."\n";
// 		echo '<img id="console_div" src="img/icons/ic_'.$console_name.'.png" style="-moz-user-select:none;">'."\n";
// 		//echo '<img class="console_img" src="img/ic_'.$console_name.'.png"/>'."\n";
// 		echo '</img>'."\n";
// 		echo '<div class="games_div">'."\n";
// 		echo_all_games_for_console($console_name);
// 		echo '</div>'."\n";
// 		echo '<div class="move_right_container_div">'."\n";
		
// //		echo '<a href="#">'."\n";
// 		echo '<div class="move_right_div">'."\n";
// 		echo '<div class="arrow_right"></div>'."\n";
// 		echo '</div>'."\n";
// //		echo '</a>'."\n";
// 		echo '</div>'."\n";
// 		echo '</div>'."\n";
// 	}

//===========================================================================================================
//FUNCTIONS
//===========================================================================================================
	
	function generate_game_of_the_hour()
  {
  	$link = get_gdb_resource();
  	$query = "SELECT * FROM games WHERE id=(SELECT RAND(id) FROM games));
  	
  	$arrayOfGames = $link->query($query);
  	$numGames = mysqli_num_rows($arrayOfGames);
  	
  	if($arrayOfGames)
    {
    	$gameIDs = array();
    	for($i=0; $i<$numGames; $i++)
			{
				$game = $arrayOfGames->fetch_array();
				$gameIDs[]=$game["id"];	
			}
			
			
			$gameOfTheHourID = $gameIDs[array_rand($gameIDs)];

// 			echo "the game of the hour id is $gameOfTheHourID";
 			$query="SELECT * FROM games WHERE id = '{$gameOfTheHourID}'";
			$arrayOfGames = $link->query($query);
			
			return $arrayOfGames -> fetch_array();
    }
  	

  }
	
// 	function echo_all_games_for_console($console){
// 		$link = get_gdb_resource();
// 		$TABLE = "consoles";
// 		$console = str_replace("_", " ", $console);
// 		$query = "SELECT * FROM games WHERE console = '{$console}' ORDER BY RAND()";
// 		$arrayOfGames = $link->query($query);
// 		for($i = mysqli_num_rows($arrayOfGames); $i >0; $i--){
// 			$game = $arrayOfGames->fetch_array();
// 	//		echo '<a href="#">'."\n";
// 			echo '<img class="game_art_img" src="img/covers/'.$game["image"].'" alt="'.$game["name"].'">'."\n";
// 			echo '</img>'."\n";
// 	//		echo '</a>'."\n";
// 		}

//	}
	
	
	//returns a gdb database resource
	function get_gdb_resource() 
  {
  	$HOST = "localhost";
  	$USER = "root";
  	$PASS = "";
  	$DB = "gdb";
  	return mysqli_connect($HOST, $USER, $PASS, $DB);
  }
	?>
</div>
</div>
</body>
</html>