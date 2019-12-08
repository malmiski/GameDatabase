<?php
include "login-functions.php";
if(is_logged_in()){
  header("Location: index.php");
}

echo try_login("mo", "password");
?>
