<!DOCTYPE html>
<head>

	<link rel="stylesheet" type="text/css" href="css/master.css"/>
	<link rel="stylesheet" type="text/css" href="css/navigation.css"/>
	<link rel="stylesheet" type="text/css" href="css/edit.css"/>

	<link rel="stylesheet" type="text/css" href="js/jquery-ui/jquery-ui-1.10.4.custom/css/ui-lightness/jquery-ui-1.10.4.custom.css"/>
	<script type="text/javascript" src="js/jquery/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui/jquery-ui-1.10.4.custom/js/jquery-ui-1.10.4.custom.js"></script>
	<script type="text/javascript" src="js/master.js"></script>
	<script type="text/javascript" src="js/edit.js"></script>
	<?php
	include "title.php";
	?>
</head>
<body>
	<?php
	include "navigationBar.php";
	?>
	<div id="logoContainer_div">
		<a href="http://www.m-tech.com/" class="link">
			<img src="img/img_logo.png" class="image" id="logo_img"/>
		</a>
	</div>
	<div id="container_div">
	  <?php
/*	$HOST = "localhost";
	$USER = "root";
	$PASS = "";
	$DB = "gdb";
*/

	if(isset($_POST["table"]))
		$TABLE = $_POST["table"];

	if(isset($_POST["operation"])){
		$operation = $_POST["operation"];
	}
	$operation = strtolower($operation);

	$tableLowered = strtolower($TABLE);
	if($operation == "add"){
		switch($tableLowered){
			case "games":
			require("include/add_page_games.php");
			break;
			case "accessories":
			require("include/add_page_games.php");
			break;
			case "consoles":
			require("include/add_page_games.php");
			break;

		}
	}else if($operation == "edit"){
		switch($tableLowered){
			case "games":
			require("include/edit_page_games.php");
			break;
			case "accessories":
			require("include/edit_page_games.php");
			break;
			case "consoles":
			require("include/edit_page_games.php");
			break;
		}
	}else if($operation == "delete"){
		if(isset($_POST["selected"])){
			$to_delete = $_POST["selected"];
			foreach($to_delete as $val){
				echo "<br>";
				$res = DatabaseManager::getInstance()->query("SELECT * FROM games WHERE id = ".$val);
				$game = $res->fetch_assoc();
				$query = "DELETE FROM games WHERE id = ".$val;
				$link = DatabaseManager::getInstance();
				$success = $link->query($query);
				echo $success? "<span style=\"color:white; font-family: Helvetica Neue; text-align:center; display:block;\"> Successfully deleted ".$game["name"]." from the database </span>": "<span> Couldn't delete </span>";
			}

		}

	}
		?>
	</div>
</body>
</html>
