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
        $game_class_id = 'tab'.$game["id"];
        ?>
        <div id="<?php echo $game_class_id;?>">
        <div id="content_div" >
        <label for="name_input">Name:</label>
        <input type="text" id="name_input" value="<?php echo $game["name"] ?>" name="names[]">

        <label for="console_select">Console:</label>
        <select id="console_select" name="consoles[]">

      <?php
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
        ?>
        </select>
        <label for="date_select_input">Date:</label>
        <input type="text" id="date_select_input" class="date_select_input" value="<?php echo $game["publish_date"] ?>" name="dates[]"/>
        <label for="publisher_input">Publisher:</label>
        <input type="text" value="<?php echo $game["publisher"] ?>" name="publishers[]"/>
        </div>
        <?php
        if ($game["image"] != "") {
          ?>
            <div style="background: url(img/covers/<?php echo $game["image"] ?>) no-repeat scroll center center #AAA" class="image_marker_div">
            </div>
        <?php
        } else {
          ?>
            <div class="image_marker_div"></div>
            <?php
        }
        ?>
        <input type="text" name="images[]" value="<?php echo $game["image"] ?>" class="path_to_cover"/>
        </div>
        <?php
    } ?>
    </div>
    <?php
}
?>

<button action="submit">Submit</button>
</form>
