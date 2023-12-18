<?php
require_once "../config/config.php";
require_once "../libraries/user.php";

if (isset($_POST["submit"])) {
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = password_hash($password, PASSWORD_BCRYPT);

    $targetDir = "../../public/img/";
    $fileName = basename($_FILES["picture"]["name"]);
    $targetFilePath = $targetDir . $fileName;

    // Upload file to server
    if (move_uploaded_file($_FILES["picture"]["tmp_name"], $targetFilePath)) {

        try {
            $user = new user($conn);
            $userChecker = $user->register($username, $email, $password, $targetFilePath);
            header("Location: " . $url . "public/pages/login.php?register=success");
        } catch(Exception $e) {
            header("Location: " . $url . "public/pages/login.php?error=" . $e->getMessage());
        }
    }
}