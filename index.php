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

	<title>The Game Database</title>
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

<div id="full_container_div">
<div id="title_div">THE GAME DATABASE</div>
<div id="content_div">
	<div id="game_of_the_hour_div">
		<h3>RANDOM GAME FROM YOUR COLLECTION</h3>
		<div id="game_hour_div">
			<?php
				 $game=generate_game_of_the_hour();
				 ?>
				 <form method="post" action="edit.php">
					 <input type="hidden" name="selected[]" value="<?php echo $game["id"]; ?>"/>
					 <input type="hidden" name="ids[]" value="<?php echo $game["id"]; ?>"/>
					 <input type="hidden" name="table" value="games"/>
					 <input type="hidden" name="operation" value="edit"/>
					 <button action="submit" style="border:0px;padding:0px;margin-top:0px;">
						 <img class='game_hour_img' src='<?php echo $game["image"];?>' alt="<?php echo $game["name"];?>" title="<?php echo $game["name"] ?>"/>
					 </button>
				 </form>
				 <?php
	//			 echo '<img class="game_hour_img" src="'.$game["image"].'" alt="'.$game["name"].'">'."\n";
			?>
		</div>
		<h4><?php echo $game["name"]." ". "[". $game["console"]."]";?></h4>
		<div  id="game_description_div">
				<p><?php echo $game["description"];?></p>
		</div>
	</div>
</div>
<div id="consoles_and_games_div">
<?php
//===========================================================================================================
//FUNCTIONS
//===========================================================================================================

	function generate_game_of_the_hour()
  {
  	$link = get_gdb_resource();
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

 			$query="SELECT * FROM games WHERE id = '{$gameOfTheHourID}'";
			$arrayOfGames = $link->query($query);

			return $arrayOfGames->fetch_assoc();



  }

	//returns a gdb database resource
	function get_gdb_resource()
  {
	return DatabaseManager::getInstance();
  }
	?>
</div>
</div>
</body>
</html>
