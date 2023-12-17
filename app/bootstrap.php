<?php
require_once "config/config.php";
require_once "libraries/user.php";
require_once "models/user.php";
require_once "models/tag.php";

if(empty($_SESSION["log"])) {
    header("Location: " . $url . "public/pages/login.php");
}
$user = new user($conn);
$userData = $user->getUserData($_SESSION["email"]);