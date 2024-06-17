<?php 
session_start();
include "models/user.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $passsword = $_POST["password"];

    $user = new User($username, $passsword);
    $userid = $user->getUserID();
    if($user->userLogin()) {
        $_SESSION["userid"] = $userid;
        $_SESSION["username"] = $username;
        echo "<p>Login Success</p>";
        ob_start();
        header("Location: index.php");
        ob_end_flush();
        exit();
    } else {
        echo "<p>Login Failed</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="login.php" method="post">
    <label for="username">Username</label>
    <input type="text" name="username" id="username">
    <label for="password">Password</label>
    <input type="password" name="password" id="password">
    <button type="submit">Submit</button>
</form>
<a href="register.php">Sign Up</a>

</body>
</html>