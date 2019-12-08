
<?php
  include "login-functions.php";
  if(is_logged_in()){
    header("Location: index.php");
  }
  if(isset($_POST["username"])){
    $success = try_login($_POST["username"], $_POST["password"]);
    if($success){
      header("Location: index.php");
    }
  }
  if(isset($success) && !$success){
    ?>
    <span>Could not login</span>
    <?php
  }
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<style>

  #login-container{
    vertical-align: middle;
    width:100%;
    height:100%;
    text-align: center;
    display: flex;
  justify-content: center;
  flex-direction: column;
  }
</style>
<div id="login-container">
<form action="login.php" method="post">
  <div>Login to the Game Database</div>
  <label for="username">Username</label>
  <input name="username" type="text">
  <br>
  <label for="password">Password</label>
  <input name="password" type="text">
  <br>
  <button action="submit">Login</button>
</form>
</div>
