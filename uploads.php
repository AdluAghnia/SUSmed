<?php
include "koneksi.php";
session_start();
function uploadCaption() {
    $path_file = "komentar.txt";

    if (isset($_POST["caption"])) {
        $name = htmlentities($_POST["name"]);
        $caption = htmlspecialchars($_POST["caption"]); 
 
        if ($my_file = fopen($path_file,"a")){
            fwrite($my_file, $name . ":" . $caption . "\n");
            fclose($my_file);
 
        } else {
            die("Unable to open " . $path_file);
        }

   }
}

function getIDByUsername($username) {
    global $conn;
    $user_id  = null;
    try {
        $stmt =  $conn->prepare("SELECT id from users WHERE username=:username");
        $stmt->bindparam(":username", $username);

        if($stmt -> execute()){
            if($stmt->rowCount() >0 ) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $user_id = $row["id"];
            }
        }
    } catch (PDOException $e) {
        echo "Error : " . $e->getMessage();
    }
    return $user_id;
}

function savePost($username, $path_image, $caption) {
    global $conn;
    $userid = getIDByUsername($username);
    try {
        $stmt = $conn->prepare("INSERT INTO posts (userid,caption ,image) VALUES (:userid, :caption, :image)");
        $stmt->bindParam(":image", $path_image);
        $stmt-> bindParam(":userid", $userid);
        $stmt-> bindParam(":caption", $caption);
        if(!$stmt->execute()) {
            echo "Upload Post Failed";
        }
    } catch (PDOException $e) {
        echo "</br>Error : " . $e->getMessage();
    }
}


$target_dir = "./uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$allowFormat = array("jpg", "jpeg", "png");
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    $uploadOK = 0;

    // Check image format
    if(!in_array(strtolower(pathinfo($target_file, PATHINFO_EXTENSION)), $allowFormat)) {
        echo "</br>This Format is not supported</br>";
        $uploadOK = 0;
    } else {
        $uploadOK = 1;
    }
}


if($uploadOK == 1) {
    if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file) == true) {
        savePost($_SESSION["username"], $target_file, $_POST["caption"]);
        header("Location: index.php");
    }
} else {
    echo "</br>Failed to upload an image</br>";
}