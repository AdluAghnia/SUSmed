<?php 
  session_start();
?>

<?php
  $username = $_POST["username"];
  $password = $_POST["password"];
  $_SESSION["id"] = ""; // Random generated string
  $_SESSION["username"] = $username;
  $_SESSION["password"] = $password;
  echo "Session are set";
?>

<a href="login.php">Back To Login Form</a>
