<?php
require_once "config/config.php";

if(empty($_SESSION["log"])) {
    header("Location: " . $url . "public/pages/login.php");
}