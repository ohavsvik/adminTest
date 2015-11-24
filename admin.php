<?php
    include("includes/header.php");

    if(isAdmin()){
        include("includes/admincontent.php");
    } else {
        include("includes/adminlogin.php");

        if (isset($_GET['feedback'])) {
            echo "<p>Wrong input!</p>";
        }
    }

    include("includes/footer.php");
?>
