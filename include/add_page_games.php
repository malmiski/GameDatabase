<form method="post" action="add.php">
<div id="content_div" >
<input type="hidden" name="table" value="games"/>

<label for="name_input">Name:</label>
<input type="text" id="name_input" name="name">

<label for="console_select">Console:</label>
<select id="console_select" name="console">
<?php
$query = "SELECT * FROM consoles ORDER BY id";
$link = DatabaseManager::getInstance();
$arrayOfConsoles = $link->query($query);
for($i = $arrayOfConsoles->num_rows; $i >0; $i--){
$console_name = $arrayOfConsoles->fetch_assoc()["name"];
echo "\t".'<option value="'.$console_name.'" >'.$console_name.'</option>'."\n";
}
?>
</select>

<label for="date_select">Date:</label>
<input type="text" class="date_select" name="date"/>

<label for="publisher_input">Publisher:</label>
<input type="text" name="publisher"/>
<button action="submit">Submit</button>
</div>
<div class="image_marker_div"></div>
<input type="text" class="path_to_cover" name="image"/>
</form>
