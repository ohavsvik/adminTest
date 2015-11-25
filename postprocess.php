<?php
include ("config.php");

$username = isset($_POST['username']) ? $_POST['username'] : "";
$password = isset($_POST['password']) ? $_POST['password'] : "";
$referer = isset($_POST['referer']) ? $_POST['referer'] : "";

$feedback = "";
//If the user types in wrong information
if (!adminAccess($username, $password)) {
    $_SESSION["feedback"] = "true";
}

if ($referer === "" || $referer === "/") {
    $referer = $_SERVER['HTTP_REFERER'];
}

header("Location: " .  $referer);
