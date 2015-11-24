<?php
include("includes/header.php");

if(isAdmin()){
    echo "<h4>You are logged in!</h4>";
} else {
    include("includes/adminlogin.php");

    if (isset($_GET['feedback'])) {
        echo "<p>Wrong input!</p>";
    }
}

include("includes/footer.php");
