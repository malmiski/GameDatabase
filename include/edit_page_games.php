<form method="post" action="change.php">
<input type="hidden" name="table" value="games"/>
<?php
    $link = DatabaseManager::getInstance();
    $arrayOfIds =  isset($_POST["selected"])? $_POST["selected"] : null;

if (count($arrayOfIds) > 0) {
    foreach ($arrayOfIds as  $i) {
        echo '<input type="hidden" name="ids[]" value="'.$i.'" />'."\n";
    }
    echo '<div id="tabs">'."\n\n";
    echo '<ul>'."\n";
    foreach ($arrayOfIds as $id) {
        $game = $link->query("SELECT * FROM games WHERE id = {$id}")->fetch_assoc();
        echo '<li><a href="#tab'.$id.'">'.$game["name"].'</a></li>'."\n";
    }
    echo '</ul>'."\n\n";
    foreach ($arrayOfIds as $var) {
        $game = $link->query("SELECT * FROM games WHERE id = {$var}")->fetch_assoc();
        echo '<div id="tab'.$game["id"].'">'."\n\n";
        echo '<div id="content_div" >'."\n";
        echo '<label for="name_input">Name:</label>'."\n".
'<input type="text" id="name_input" value="'.$game["name"].'" name="names[]">'."\n".

'<label for="console_select">Console:</label>'."\n".
'<select id="console_select" name="consoles[]">'."\n";


        $query = "SELECT * FROM consoles ORDER BY id";
        $link = DatabaseManager::getInstance();
        $arrayOfConsoles = $link->query($query);
        for ($i = $arrayOfConsoles->num_rows; $i >0; $i--) {
            $console_name = $arrayOfConsoles->fetch_assoc()["name"];
            if ($console_name == $game["console"]) {
                echo "\t".'<option value="'.$console_name.'" selected>'.$console_name.'</option>'."\n";
            } else {
                echo "\t".'<option value="'.$console_name.'" >'.$console_name.'</option>'."\n";
            }
        }

        echo '</select>'."\n".

'<label for="date_select_input">Date:</label>'."\n".
'<input type="text" id="date_select_input" class="date_select_input" value="'.$game["publish_date"].'" name="dates[]"/>'."\n".

'<label for="publisher_input">Publisher:</label>'."\n".
'<input type="text" value="'.$game["publisher"].'" name="publishers[]"/>'."\n".
'</div>'."\n\n";
        if ($game["image"] != "") {
            echo '<div style="background: url(img/covers/'.$game["image"].') no-repeat scroll center center #AAA" class="image_marker_div"></div>'."\n";
        } else {
            echo '<div class="image_marker_div"></div>'."\n";
        }

        echo '<input type="text" name="images[]" value="'.$game["image"].'" class="path_to_cover"/>'."\n".'</div>'."\n\n";
    }
    echo "\n".'</div>';
}
?>

<button action="submit">Submit</button>
</form>
