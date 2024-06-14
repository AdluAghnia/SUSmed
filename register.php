<?php
include "koneksi.php"; 
function registerValidation($username, $password) {
    if (strlen($username) < 3) {
        return false;
    }

    if (strlen($password) < 6) {
        return false;
    }
    return true;
}

function saveUser ($username, $password) {
    global $conn;

    try {
        if (registerValidation($username, $password)) {
            $hash_password = password_hash($password, PASSWORD_BCRYPT);
            $smst = $conn-> prepare("INSERT INTO users (username, password)
            VALUES (:username, :password)");

            $smst->bindParam(":username", $username);
            $smst->bindParam(":password", $hash_password);

            // excute the statment
            if($smst->execute()) {
                return "User successfully registered";
            } else {
                return "Failed to save a user";
            }
        } else {
            return "please check your username and password";
        }    
    } catch (PDOException $e) { 
        echo "Database error : " . $e->getMessage();
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
    <form action="register.php" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
        <label for="password">Password : </label>
        <input type="password" name="password" id="password">
        <button type="submit">Register</button>
    </form>
<?php
$message = saveUser($_POST["username"], $_POST["password"]);
echo $message;  
?>
</body>
</html>