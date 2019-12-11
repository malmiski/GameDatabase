<html>
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
			$HOST = "localhost";
			$USER = "root";
			$PASS = "";
			$DB = "gdb";
			$TABLE;

			if(isset($_POST["table"]))
			$TABLE = $_POST["table"];

			if($TABLE == "games"){
			$console;
			$name;
			$date;
			$publisher;
			$image;
			$description;

			if(isset($_POST["console"])){
				$console= $_POST["console"];

			}
			if(isset($_POST["name"])){
				$name = $_POST["name"];
				$name = str_replace("'", "\'", $name);
			}

			if(isset($_POST["date"])){
				$date = $_POST["date"];

			}
			if(isset($_POST["publisher"])){
				$publisher = $_POST["publisher"];
			}

			if(isset($_POST["publisher"])){
				$image = $_POST["image"];
			}

			if(isset($_POST["description"])){
				$description = $_POST["description"];
			}

			if(isset($_POST["price"])){
				$price = $_POST["price"];
			}

			$query = "INSERT INTO games(id, name, console, publisher, publish_date, price, image, description) VALUES (NULL, '{$name}', '{$console}', '{$publisher}', '{$date}', '{$price}', '{$image}', '{$description}')";
			DatabaseManager::getInstance()->query($query);
			$name = str_replace("\'", "'", $name);
			echo "<table><tbody><tr><td>{$name}</td><td>{$console}</td><td>{$publisher}</td><td>{$date}</td></tr></tbody></table>";
		}
			?>
</div>
</body>
</html>
