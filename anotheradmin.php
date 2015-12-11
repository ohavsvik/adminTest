<?php
/**
 * Tests the admin functionality
 */
ob_start(); //turns on the output buffer
require "includes/header.php";

if ($user->isAuthenticated()) {
    echo "<p>Another admin only page</p>";
    require "includes/admincontent.php";
} else {
    header("Location: login.php?referer=". basename($_SERVER['SCRIPT_FILENAME']));
}
require "includes/footer.php";
