<?php
require_once "../config/config.php";
require_once "../libraries/user.php";

$user = new user($conn);
$user->logout();
header("Location: " . $url . "public/pages/login.php?logout=success");