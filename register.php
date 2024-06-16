<?php
include "models/user.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="register.php" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
        <label for="password">Password : </label>
        <input type="password" name="password" id="password">
        <button type="submit">Register</button>
    </form>
<?php
// saveUser($_POST["username"], $_POST["password"]);
$newUser = new User($_POST["username"], $_POST["password"]);
if($newUser->userRegister()) {
    echo "Berhasil Register";
} else {
    echo "Failed";
}
?>
</body>
</html>