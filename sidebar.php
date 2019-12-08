<div id="sidebarContainer">
		<div id="marker">
			Consoles
		</div >
	<nav id="sidebar_nav">
		<ul id="consoles_ul">
			<?php
			$TABLE = "consoles";
			$query = "SELECT * FROM {$TABLE} ORDER BY id";
			$link = DatabaseManager::getInstance();
			$arrayOfConsoles = $link->query($query);

			for($i = $arrayOfConsoles->num_rows; $i >0; $i--){
				$array = $arrayOfConsoles->fetch_assoc();
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
