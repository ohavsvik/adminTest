<?php
include ("config.php");

$username = isset($_POST['username']) ? $_POST['username'] : "";
$password = isset($_POST['password']) ? $_POST['password'] : "";

$feedback = "";
//If the user types in wrong information
if (!adminAccess($username, $password)) {
    $symbol = "?";
    if(isset($_GET['logout'])){
        $symbol = "&";
    }
    $feedback = $symbol . "feedback";
}
echo count($_GET);


header("Location: " . $_SERVER['HTTP_REFERER'] . $feedback);
