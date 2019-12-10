<?php

// In the future will want to transfer this to mongo
include "DatabaseManager.php";
$db = DatabaseManager::getInstance();
$res = $db->query("SELECT * FROM games");
$n = $res->num_rows;
  for ($i = 0; $i < $n; $i++) {
    $game = $res->fetch_assoc();
    $price = round(30 + mt_rand()/mt_getrandmax()*30, 2);
    DatabaseManager::getInstance()->query("UPDATE `games` SET `image` = 'img/covers/".$game["image"]."' WHERE `id` = ".$game["id"].";");
    // $imagePath = $game["image"];
    // $imageHandle = fopen($imagePath, 'r');
    // $image = fread($imageHandle, filesize($imagePath));
    // $imgData = base64_encode($image);
    // $imgData = "data:image;base64,".$imgData;
    // DatabaseManager::getInstance()->query("UPDATE ")
    // Insert base64 image to mongo
//    DatabaseManager::getInstance()->mongoInsert('images', )
  }

  ?>
