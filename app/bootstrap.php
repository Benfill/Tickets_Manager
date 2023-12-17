<?php
require_once "config/config.php";
require_once "libraries/user.php";
require_once "models/user.php";
require_once "models/tag.php";

$user = new user($conn);
$userData = $user->getUserData($_SESSION["email"]);
$_SESSION["user_id"] = $userData["user_id"];
if(empty($_SESSION["log"]) || empty($userData)) {
    session_destroy();
    header("Location: " . $url . "public/pages/login.php");
}