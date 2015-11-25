<?php
$name = substr(preg_replace('/[^a-z\d]/i', '', __DIR__), -30);
session_name($name);
session_start();

//Init the deafault admin name and password
if (!isset($_SESSION['correctAdminName']) || !isset($_SESSION['correctAdminPassword'])) {
    $_SESSION['correctAdminName'] = "admin";
    $_SESSION['correctAdminPassword'] = "password";
}
//Init the log status
if (!isset($_SESSION['logged'])) {
    $_SESSION['logged'] = "false";
}

/**
* Compares the parameters with the current admin name and password.
* If it does, the session varables 'adminName' and 'adminPassword' are
* initiated.
*
* @param string $name The name to match.
* @param string $password The password to match.
*
* @return bool If the login was successful or not
*/
function adminAccess($name, $password) {

    $adminName = $_SESSION['correctAdminName'];
    $adminPassword = $_SESSION['correctAdminPassword'];

    if ($name === $adminName && $password === $adminPassword) {
        $_SESSION['logged'] = "true";
        return true;
    } else {
        $_SESSION['logged'] = "false";
        return false;
    }
}

/**
* Checks if the admin is logged in.
*
* @return bool
*/
function isAdmin() {
    return $_SESSION['logged'] === "true" ? true : false;
}

/**
* Logs the admin out by setting 'logged' = false
*
* @return void
*/
function logout () {
    $_SESSION['logged'] = "false";
}
