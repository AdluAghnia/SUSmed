<?php 
try {
    $conn = new PDO('mysql:host=127.0.0.1;port=3306;dbname=susmed','shieldz', 'le2minerale');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "database has been connected successfully";
} catch (PDOException $e) {
    echo "Connection failed " . $e->getMessage();
}