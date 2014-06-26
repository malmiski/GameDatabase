<div id="sidebarContainer">
		<div id="marker">
			Consoles
		</div >
	<nav id="sidebar_nav">
		<ul id="consoles_ul">
			<?php
			$HOST = "localhost";
			$USER = "root";
			$PASS = "";
			$DB = "gdb";
			$TABLE = "consoles";
			$query = "SELECT * FROM {$TABLE} ORDER BY id";
			$link = mysqli_connect($HOST, $USER, $PASS, $DB);
			$arrayOfConsoles = $link->query($query);
	
			for($i = mysqli_num_rows($arrayOfConsoles); $i >0; $i--){
				$array = $arrayOfConsoles->fetch_array();
				$consoleName = $array["name"];
				$lowerCaseName=  strtolower($consoleName);
				$lowerCaseName = str_replace(" ", "_", $lowerCaseName);
				echo '<a class="link" href="games.php?console='.$consoleName.'">';
				echo '<li class="sidebarItem_li">';
				echo '<img src="img/icons/ic_'.$lowerCaseName.'.png" style="margin-right: 5px;"/>';
				echo $consoleName;
				echo "</li>";
				echo '</a>';
			}
			?>
		</ul>
	</nav>
</div>