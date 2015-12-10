<?php
ob_start(); //turns on the output buffer
include("includes/header.php");

if ($user->isAuthenticated()) {
    include("includes/admincontent.php");
} else {
    header("Location: login.php?referer=". basename($_SERVER['SCRIPT_FILENAME']));
}
include("includes/footer.php");
