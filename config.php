<?php
$name = substr(preg_replace('/[^a-z\d]/i', '', __DIR__), -30);
session_name($name);
session_start();

//REMOVE ??
//$_SESSION['adminName'] = "";
//$_SESSION['adminPassword'] = "";

$pages = array(
    "admin.php" => "",
    "user.php" => "",
    "anotheradmin.php" => ""
);

foreach ($pages as $k => $value) {
    $pages[$k] = basename($_SERVER['SCRIPT_NAME']) == $k ? "selected" : "";
}

function adminAccess($name, $password) {

    $adminName = "admin";
    $adminPassword = "password";

    if ($name === $adminName && $password === $adminPassword) {
        $_SESSION['adminName'] = $adminName;
        $_SESSION['adminPassword'] = $adminPassword;
        return true;
    } else {
        $_SESSION['adminName'] = "";
        $_SESSION['adminPassword'] = "";
        return false;
    }
}

function isAdmin() {
    return adminAccess($_SESSION['adminName'], $_SESSION['adminPassword']);
}

function logout () {
    $_SESSION['adminName'] = "";
    $_SESSION['adminPassword'] = "";
    return "Logged out!";
}
