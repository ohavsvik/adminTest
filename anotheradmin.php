<?php
ob_start(); //turns on the output buffer
include("includes/header.php");

echo "<h4>Another page with secrets</h4>";

if (isAdmin()) {
    include("includes/admincontent.php");
} else {
    header("Location: login.php?referer=" . basename($_SERVER['SCRIPT_FILENAME']));
}

include("includes/footer.php");
