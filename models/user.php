<?php
include("db/koneksi.php");

class User {
    public $username;
    public $password;

    function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }
    
    function getUsernameByID($id) {
        global $conn;
        
        try {
            $stmt = $conn->prepare("SELECT username FROM users WHERE id=:id");
            $stmt->bindParam(":id", $id);

            if($stmt->execute()) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                return $row["username"];
            }
        } catch (PDOException $e) {
            echo "". $e->getMessage();
        }
   }

    function userLogin() {
        global $conn;
        try {
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $stmt = $conn->prepare("SELECT password FROM user 
                WHERE username=:username");
                $stmt->bindParam(":username", $this->username);

                if(!$stmt->execute()) {
                    return false;                    
                }

                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if (!password_verify($this->password, $row["password"])) {
                    return false;
                }
                
                return true;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    private function registerValidation($username, $password) {
        if (strlen($username) < 3){
            echo "<p>Username should contains atleast 3 character</p>";
            return false;
        }
        if (strlen($password) < 6){
            echo "<p>Password should contains atleast 6 character</p>";
            return false;
        }

        return true;
    }

    function userRegister() {
        global $conn;
        try {
            if (!$this->registerValidation($this->username, $this->password)) {
                echo "<p>Check Your Username and password</p>";
                return false;
            }

            $hash_password = password_hash($this->password, PASSWORD_BCRYPT);
            
            $stmt = $conn->prepare("INSERT INTO users (username, password)
            VALUES (:username, :password)");

            $stmt->bindParam(":username", $this->username);
            $stmt->bindParam(":password", $hash_password);

            if(!$stmt->execute()) {
                echo "Register Failed Something Wrong";
                return false;
            }

            return true;
        } catch (PDOException $e) {
            echo "Error: ". $e->getMessage();
        }
    }
}