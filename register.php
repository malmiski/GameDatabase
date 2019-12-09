
<?php
  include "login-functions.php";
  if(isset($_POST["username"])){
    $success = try_register($_POST["username"], $_POST["password"], $_POST["email"]);
    if($success){
      try_login($_POST["username"], $_POST["password"],);
    }
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
  <?php
  if(isset($success) && $success){
    ?>
    <h3> You have successfully registered redirecting to the the main page </h3>
    <script type="text/javascript">
    setTimeout(() => window.location.replace("index.php"), 2000);
    </script>
    <?php

  }else{
    if(isset($success)){
      ?>
      <span style="color: red"> We couldn't register that username please try again </span>
      <?php
    }
    ?>
  <form action="register.php" method="post">
    <h3>Register</h3>
    <label for="username">Username</label>
    <input name="username" type="text">
    <br>
    <label for="password">Password</label>
    <input name="password" type="password">
    <br>
    <label for="email">Email</label>
    <input name="email" type="email">
    <br>
    <button action="submit">Register</button>
  </form>
  <?php
  }?>
</div>
