<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/master.css"/>
	<link rel="stylesheet" type="text/css" href="css/table.css"/>
	<link rel="stylesheet" type="text/css" href="css/navigation.css"/>
	<link rel="stylesheet" type="text/css" href="css/games.css"/>

	<script type="text/javascript" src="js/jquery/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery.tablesorter.js"></script>
	<script type="text/javascript" src="js/master.js"></script>
	<script type="text/javascript" src="js/game.js"></script>
	<?php
	include "title.php";
	?>
</head>
<body>
<?php
include "navigationBar.php";
include "sidebar.php";
?>
<div id="logoContainer_div">
	<a href="http://www.m-tech.com/" class="link">
	<img src="img/img_logo.png" class="image" id="logo_img"/>
	</a>
</div>
<div id="container_div"/>
<form id="buttons_form" action="edit.php" method="post" >
<table class="tablesorter">
	<thead>
		<tr>
			<th>Select</th>
			<th>Name</th>
			<th>Console</th>
			<th>Creation Date</th>
			<th>Publisher</th>
			<th>Current Price</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th>Select</th>
			<th>Name</th>
			<th>Console</th>
			<th>Creation Date</th>
			<th>Publisher</th>
			<th>Current Price</th>
		</tr>
	</tfoot>
			<tbody>
		<?php
		$HOST = "localhost";
		$USER = "root";
		$PASS = "password";
		$DB = "gdb";
		$TABLE = "games";
		$console = "";
		if(isset($_GET["console"]))
		$console = $_GET["console"];
		$query;
		if($console != "")
		$query = "SELECT * FROM {$TABLE} WHERE console = '{$console}'";
		else
		$query = "SELECT * FROM {$TABLE}";
		if(isset($_GET["search_text"])){
			$search_text = $_GET["search_text"];
			$query = $query." WHERE name LIKE '%{$search_text}%'";
		}
		$arrayOfConsoles = DatabaseManager::getInstance()->query($query);

		for($i = mysqli_num_rows($arrayOfConsoles); $i >0; $i--){
			$array = $arrayOfConsoles->fetch_array();
			echo "<tr>"."\n".
			"<td>"."\n".
			'<input type="checkbox" id="check_box_input'.$i.'" name="selected[]" value="'.$array["id"].'">'."\n".
			'<label for="check_box_input'.$i.'"></label>'."\n".
			"</td>"."\n".
			"<td>"."\n".
			 $array["name"]."\n".
			 "</td>"."\n".
			 "<td>"."\n".
			 $array["console"]."\n".
			 "</td>"."\n".
			 "<td>"."\n".
//			 $array["publish_date"]."\n".
			 parse_date($array["publish_date"])."\n".
			 "</td>"."\n".
			 "<td>"."\n".
			 $array["publisher"]."\n".
			 "</td>"."\n".
			 "<td>"."\n".
			 '$'.$array["price"]."\n".
			 "</td>"."\n".
			 "</tr>"."\n";
		}


		function parse_date($date){
			$months = array("January","February","March","April","May","June","July","August","September","October","November","December");
			$month = substr($date, 5,2);
			$day = intval(substr($date, 8,2));
			$year = intval(substr($date,0,4));

			if($month == 0)
				$month = 1;
			$date = $months[intval($month-1)]." ".$day.", ".$year;
			return $date;
		}

		?>
	</tbody>
</table>

<?php
if($console == ''){
	$console = "*";
}
if(mysqli_num_rows($arrayOfConsoles)!=0){
//echo '<form   id="buttons_form" action="edit.php" method="post" />'."\n".
echo '<input type="hidden" name="table" value="games"/>'."\n".
'<input type="hidden" name="console" value="'.$console.'"/>'."\n".
'<input type="hidden" name="selected_items[]" value="'.$console.'"/>'."\n".
'<button id="add_button" name="operation" value="add">Add</button>'."\n".
'<button id="edit_button" name="operation" value="edit">Edit</button>'."\n".
'<button id="delete_button" name="operation" value="delete">Delete</button>'."\n";
}
?>
</form>
</div>
</body>
</html>
