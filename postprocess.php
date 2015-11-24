<?php
include ("config.php");

$username = isset($_POST['username']) ? $_POST['username'] : "";
$password = isset($_POST['password']) ? $_POST['password'] : "";

adminAccess($username, $password);

header("Location: " . $_SERVER['HTTP_REFERER']);
