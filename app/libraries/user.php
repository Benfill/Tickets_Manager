<?php
class user {
    private $user_id;
    private $username;
    private $email;
    private $password;
    private $picture;
    private $conn;

    function __construct($conn) {
        $this->conn = $conn;
    }

    function getUserData($email) {
        $sql = "SELECT * FROM user WHERE email=?";
        $stmt = mysqli_stmt_init($this->conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        return (mysqli_fetch_assoc($res));
    }
    function login($email, $password) {
        $row = $this->getUserData($email);
        if ($row) {
            if (password_verify($password, $row["password"])) {
                $_SESSION["log"] = true;
                $_SESSION["user_id"] = $row["user_id"];
            } else {
                throw new Exception("Password is Not Correct");
                return false;
            }
        } else {
            throw new Exception("User Not Found");
            return false;
        }
        return true;
    }

    function register($username, $email, $password, $picture) {
        $row = $this->getUserData($email);
        if (!$row) {
            $sql = "INSERT INTO user (username, email, password, picture) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($this->conn);
            mysqli_stmt_prepare($stmt, $sql);
            mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $password, $picture);
            mysqli_stmt_execute($stmt);
        } else {
            throw new Exception("User Exists");
            return false;
        }
        return true;
    }

    function logout() {
        session_destroy();
    }
}