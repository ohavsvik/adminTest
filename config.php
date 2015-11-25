<?php
$name = substr(preg_replace('/[^a-z\d]/i', '', __DIR__), -30);
session_name($name);
session_start();



//Init the session admin name and password
// 'adminName' 'adminPassword' is used to check if the admin is logged in
if (!isset($_SESSION['adminName']) || !isset($_SESSION['adminPassword'])) {
    $_SESSION['adminName'] = "";
    $_SESSION['adminPassword'] = "";
}
//Init the deafault admin name and password
if (!isset($_SESSION['correctAdminName']) || !isset($_SESSION['correctAdminPassword'])) {
    $_SESSION['correctAdminName'] = "admin";
    $_SESSION['correctAdminPassword'] = "password";
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
        $_SESSION['adminName'] = $adminName;
        $_SESSION['adminPassword'] = $adminPassword;
        return true;
    } else {
        $_SESSION['adminName'] = "";
        $_SESSION['adminPassword'] = "";
        return false;
    }
}

/**
* Checks if the admin is logged in.
*
* @return bool
*/
function isAdmin() {
    return adminAccess($_SESSION['adminName'], $_SESSION['adminPassword']);
}

/**
* Logs the admin out by resetting the session variables
* @return void
*/
function logout () {
    $_SESSION['adminName'] = "";
    $_SESSION['adminPassword'] = "";
}
