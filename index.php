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

	$HOST = "localhost";
	$USER = "root";
	$PASS = "";
	$DB = "gdb";
	$TABLE = "consoles";
	$query = "SELECT * FROM {$TABLE} ORDER BY id";
	$link = mysqli_connect($HOST, $USER, $PASS, $DB);
	$arrayOfConsoles = $link->query($query);
?>
<div id="title_div">THE GAME DATABASE</div>
<div id="content_div">
	<div id="game_of_the_hour_div">
		<h3>GAME OF THE HOUR</h3>
		<div id="game_hour_div"></div>
		<h4>[TITLE OF THE GAME OF THE HOUR]</h4>
		<div  id="game_description_div">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
			Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
			Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
			Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</div>
	</div>
<div id="consoles_and_games_div">

<?php
//===========================================================================================================
//Application code
//===========================================================================================================
	for($i = mysqli_num_rows($arrayOfConsoles); $i >0; $i--){
		// Get array of associative attributes for this console
		$array = $arrayOfConsoles->fetch_array();
		$console_name = $array["name"];
		$console_name = str_replace(" ", "_", $console_name);
		$console_name = str_replace("'", "_", $console_name);

		echo '<div id="console_container_div">'."\n";
		echo '<img id="console_div" src="img/icons/ic_'.$console_name.'.png" style="-moz-user-select:none;">'."\n";
		//echo '<img class="console_img" src="img/ic_'.$console_name.'.png"/>'."\n";
		echo '</img>'."\n";
		echo '<div class="games_div">'."\n";
		echo_all_games_for_console($console_name);
		echo '</div>'."\n";
		echo '<div class="move_right_container_div">'."\n";
		
//		echo '<a href="#">'."\n";
		echo '<div class="move_right_div">'."\n";
		echo '<div class="arrow_right"></div>'."\n";
		echo '</div>'."\n";
//		echo '</a>'."\n";
		echo '</div>'."\n";
		echo '</div>'."\n";
	}

//===========================================================================================================
//FUNCTIONS
//===========================================================================================================
	function echo_all_games_for_console($console){
	$HOST = "localhost";
	$USER = "root";
	$PASS = "";
	$DB = "gdb";
	$TABLE = "consoles";
	$console = str_replace("_", " ", $console);
	$query = "SELECT * FROM games WHERE console = '{$console}' ORDER BY RAND()";
	$link = mysqli_connect($HOST, $USER, $PASS, $DB);
	$arrayOfGames = $link->query($query);
	for($i = mysqli_num_rows($arrayOfGames); $i >0; $i--){
		$game = $arrayOfGames->fetch_array();
//		echo '<a href="#">'."\n";
		echo '<img class="game_art_img" src="img/covers/'.$game["image"].'" alt="'.$game["name"].'">'."\n";
		echo '</img>'."\n";
//		echo '</a>'."\n";
	}

	}
	?>
</div>
</div>
</body>
</html>