<div id="content_div" >
<form method="post" action="add.php">
<input type="hidden" name="table" value="games"/>

<label for="name_input">Name:</label>
<input type="text" id="name_input" name="name">

<label for="console_select">Console:</label>
<select id="console_select" name="console">
<?php
$query = "SELECT * FROM consoles ORDER BY id";
$link = mysqli_connect($HOST, $USER, $PASS, $DB);
$arrayOfConsoles = $link->query($query);
for($i = mysqli_num_rows($arrayOfConsoles); $i >0; $i--){
$console_name = $arrayOfConsoles->fetch_array()["name"];
echo "\t".'<option value="'.$console_name.'" >'.$console_name.'</option>'."\n";
}
?>
</select>

<label for="date_select">Date:</label>
<input type="text" id="date_select" name="date"/>

<label for="publisher_input">Publisher:</label>
<input type="text" name="publisher"/>

<button action="submit">Submit</button>
</form>
</div>