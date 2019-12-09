<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/master.css"/>
	<link rel="stylesheet" type="text/css" href="css/table.css"/>
	<link rel="stylesheet" type="text/css" href="css/navigation.css"/>

	<script type="text/javascript" src="js/jquery/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="js/master.js"></script>
	<style>
		#gallery_container{
			margin-top: 34pt;
			text-align: center;
		}
		.gallery_img{
			width:150px;
			height:200px;
			margin: 0
		}
		button{

		}
		form{
			display: inline;;
		}
	</style>
	<?php
    include "title.php";
    ?>
</head>
<body>
<?php
include "navigationBar.php";
?>
<div id="gallery_container">
<?php
	$res = DatabaseManager::getInstance()->query("SELECT id, image FROM games");
	for($i = 0; $i < $res->num_rows; $i++){
		$response = $res->fetch_assoc();
		$image = $response["image"];
		if($image == null || $image == "") continue;
		$id = $response["id"];
		?>

		<form method="post" action="edit.php">
			<input type="hidden" name="selected[]" value="<?php echo $id; ?>"/>
			<input type="hidden" name="ids[]" value="<?php echo $id; ?>"/>
			<input type="hidden" name="table" value="games"/>
			<input type="hidden" name="operation" value="edit"/>
			<button action="submit">
				<img class='gallery_img' src='img/covers/<?php echo $image; ?>'/>
			</button>
		</form>
		<?php
	}
?>
</div>
</body>
</html>
