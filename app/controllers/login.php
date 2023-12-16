<?php
require_once "../config/config.php";
require_once "../libraries/user.php";

if (isset($_POST["submit"])) {
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

    try {
        $user = new user($conn);
        $userChecker = $user->login($email, $password);
        header("Location: " . $url . "Public/index.php?login=success");
    } catch(Exception $e) {
        header("Location: " . $url . "Public/pages/login.php?error=" . $e->getMessage());
    }
}