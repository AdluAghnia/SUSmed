<?php
include "koneksi.php";
session_start();

if($_SESSION["username"] == "") {
    header("Location: login.php");
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
    <form action="uploads.php" method="post" enctype="multipart/form-data">
        <label for="name">Name : </label>
        <?php 
        echo '<p name="name" id="name">' . htmlspecialchars($_SESSION["username"]) . '</p>'
        ?>

        <label for="caption"> Caption : </label>
        <textarea name="caption" id="caption"></textarea>
        <br>
        <label for="image">Image : </label>
        <br>
        <input type="file" name="image" id="image">
        <br>
        <button type="submit" name="submit">Upload</button>
    </form>
    <?php
    global $conn;
    $stmt = $conn->prepare('SELECT * FROM post');

    if($stmt-> execute()) {
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($posts) {
            foreach($posts as $post) {
                echo "<div class='post'>";
                echo "<img src='" . htmlspecialchars($post['image']) . "' alt='" . htmlspecialchars($post['caption']) . "'>";
                echo "<p>" . htmlspecialchars($post['caption']) . "</p>";
                echo "</div>";
            }
        } else {
            echo "Post Not Found";
        }
    }
    ?>
</body>
</html>

