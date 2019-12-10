<!DOCTYPE html>
<head>
	<link rel="stylesheet" type="text/css" href="css/master.css"/>
	<link rel="stylesheet" type="text/css" href="css/table.css"/>
	<link rel="stylesheet" type="text/css" href="css/navigation.css"/>
	<link rel="stylesheet" type="text/css" href="css/games.css"/>

	<script type="text/javascript" src="js/jquery/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="js/master.js"></script>
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
	<div id="container_div"/>
	<?php
			$TABLE = init_variable_with_post("table");


			if($TABLE == "games"){

			$ids = init_variable_with_post("ids");
			$consoles = init_variable_with_post("consoles");
			$names = init_variable_with_post("names");
			$publishers = init_variable_with_post("publishers");
			$dates = init_variable_with_post("dates");
			$images = init_variable_with_post("images");
			$descriptions = init_variable_with_post("descriptions");
			$prices = init_variable_with_post("prices");
			echo '<table>'."\n<tbody>\n";
			for($index = 0; $index < count($ids); $index++){
			$id = $ids[$index];
			$console = $consoles[$index];
			$name = $names[$index];
			$escape_name = str_replace("'","\'", $names[$index]);
			$publisher = $publishers[$index];
			$date = $dates[$index];
			$image = $images[$index];
			$description = addslashes($descriptions[$index]);
			$price = $prices[$index];
			$query = "UPDATE `gdb`.`games` SET `name` = '{$escape_name}', `console` = '{$console}', `publisher` = '{$publisher}', `publish_date` = '{$date}', `price` = '{$price}', `image` = '{$image}', `description` = '{$description}' WHERE `games`.`id` = '{$id}'";
			$link = DatabaseManager::getInstance();
			$link->query($query);
			$name = str_replace("\'", "'", $name);
			echo "<tr><td>{$name}</td><td>{$console}</td><td>{$publisher}</td><td>{$date}</td></tr>";
		}
		echo '</tbody></table>';
	}




	function init_variable_with_post($post_text){
		return isset($_POST[$post_text]) ? $_POST[$post_text] : NULL;
	}
			?>
</div>
</body>
</html>
