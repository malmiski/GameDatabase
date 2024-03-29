<?php
include "login-functions.php";

if(!is_logged_in()){
	header("Location: login.php");
}
?>
<nav id="bar_nav">
	<ul id="nav_ul">
		<a class="link" href="index.php">
			<li class="navItem_li" id="home_li">
				<span>
					Home
				</span>
			</li>
		</a>
		<a class="link" href="games.php">
			<li class="navItem_li" id="gameLink_li">
				<span>
					Games
				</span>
			</li>
		</a>
		<a class="link" href="consoles.php">
			<li class="navItem_li">
				<span>
					Consoles
				</span>
			</li>
		</a>
		<a class="link" href="gallery.php">
			<li class="navItem_li">
				<span>
					Gallery
				</span>
			</li>
		</a>
		<li id="search_li" class="navItem_li">
			<form action="games.php" method="get" >
			<button style="border:0px;margin:5px;padding:0px;background:none;display:inline;width:16px;height:16px;">
				<img id="searchImage_img" src="img/icons/ic_search.png" width="16px" heigth="16px"/>
			</button>
				<input type="text" name="search_text" id="searchArea_input">
			</form>
		</li>
		<a class="link" href="logout.php">
			<li class="navItem_li">
				<span>
					Logout
				</span>
			</li>
		</a>
	</ul>
</nav>
