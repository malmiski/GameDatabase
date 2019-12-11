<form method="post" action="add.php">
<input type="hidden" name="table" value="games"/>
<div id="">
<?php
    $link = DatabaseManager::getInstance();
    echo '<div id="tabs">'."\n\n";
    ?>
        <div style="display:flex;">
        <div id="content_div" >
        <label for="name_input">Name:</label>
        <input type="text" id="name_input" value="" name="name">

        <label for="console_select">Console:</label>
        <select id="console_select" name="console">

      <?php
        $query = "SELECT * FROM consoles ORDER BY id";
        $link = DatabaseManager::getInstance();
        $arrayOfConsoles = $link->query($query);
        for ($i = $arrayOfConsoles->num_rows; $i >0; $i--) {
            $console_name = $arrayOfConsoles->fetch_assoc()["name"];
            echo "\t".'<option value="'.$console_name.'" >'.$console_name.'</option>'."\n";
        }
        ?>
        </select>
        <label for="date_select_input">Date:</label>
        <input type="text" id="date_select_input" class="date_select_input" value="" name="date"/>
        <label for="publisher_input">Publisher:</label>
        <input type="text" value="" name="publisher"/>
        <label for="price_input">Price:</label>
        <input type="number" min="0.01" step="0.01" max="2500" value="" name="price"/>
        </div>
        <div class="image_container" style="margin-left:auto;">
            <div class="image_marker_div"></div>
        <input style="float: right;" type="text" name="image" value="" class="path_to_cover"/>
        </div>
      </div>
        <div>
          <label for="description">Description:</label>
          <textarea name="description" style="width: 100%; height:230px; resize: none;" rows="10"></textarea>
        </div>
        </div>
    <button action="submit">Submit</button>
  </div>
</form>
