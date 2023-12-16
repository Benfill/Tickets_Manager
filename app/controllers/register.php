<?php
require_once "../config/config.php";
require_once "../libraries/user.php";

if (isset($_POST["submit"])) {
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $picture = file_get_contents($_FILES["picture"]["tmp_name"]);
    $password = password_hash($password, PASSWORD_BCRYPT);

    try {
        $user = new user($conn);
        $userChecker = $user->register($username, $email, $password, $picture);
        header("Location: ../../public/pages/login.php?register=success");
    } catch(Exception $e) {
        header("Location: ../../public/pages/login.php?error=" . $e->getMessage());
    }
}