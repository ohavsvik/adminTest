<?php
include("includes/header.php");

if(isAdmin()){
    echo "<h4>You are logged in!</h4>";
} else {
    include("includes/adminlogin.php");

    if (isset($_SESSION['feedback'])) {
        if ($_SESSION['feedback'] !== "") {
            echo "<p>Wrong input!</p>";
        }
        $_SESSION['feedback'] = ""; //reset
    }
}

include("includes/footer.php");
