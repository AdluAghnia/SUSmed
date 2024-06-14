<?php 
session_start();
include "koneksi.php";

// Checking username and password
function checkUser ($username, $password)  {
    global $conn;

    try {
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $stmt = $conn-> prepare("SELECT password FROM users WHERE username=:username");
            $stmt->bindParam(":username", $username);
            if ($stmt ->execute()) {
                if ($stmt -> rowCount() > 0) {
                    $rows = $stmt->fetch(PDO::FETCH_ASSOC);
                    if (password_verify($password, $rows["password"])) {
                        $_SESSION["username"] = $username;
                        header("Location: index.php");
                    } else {
                        echo "Invalid username or password 1";
                    }
                } else {
                    echo "Invalid username or password 2";
                }
            } else {
                echo "Something, wrong failed to login";
            }
       }
    } catch (PDOException $e) {
        echo "Error : " . $e->getMessage();
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

<?php 
checkUser($_POST["username"], $_POST["password"])
?> 
</body>
</html>