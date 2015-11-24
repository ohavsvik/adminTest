<?php
    include("includes/header.php");

    if(adminAccess($_SESSION['adminName'], $_SESSION['adminPassword'])){
        include("includes/admincontent.php");
    } else {
        include("adminlogin.php");
    }

    include("includes/footer.php");
?>
