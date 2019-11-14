<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/master.css"/>
	<link rel="stylesheet" type="text/css" href="css/table.css"/>
	<link rel="stylesheet" type="text/css" href="css/navigation.css"/>

	<script type="text/javascript" src="js/jquery/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="js/master.js"></script>
	<script type="text/javascript" src="js/jquery/jquery.tablesorter.js"></script>
	<script type="text/javascript" src="js/console.js"></script>
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
<div id="container_div">
<table>
	<thead>
	<tr>
		<th>
			Consoles
		</th>
	</tr>
	</thead>
	<tbody>
		<?php
		$HOST = "localhost";
		$USER = "root";
		$PASS = "password";
		$DB = "gdb";
		$TABLE = "consoles";
		$query = "SELECT * FROM {$TABLE}";
		$link = mysqli_connect($HOST, $USER, $PASS, $DB);
		$arrayOfConsoles = $link->query($query);

		for($i = mysqli_num_rows($arrayOfConsoles); $i >0; $i--){
			echo "<tr>";
			$array = $arrayOfConsoles->fetch_array();
			echo "<td>";
			echo $array["name"];
			echo "</td>";
			echo "</tr>";
		}

		?>
	</tbody>
</table>
</div>
</body>
</html>
