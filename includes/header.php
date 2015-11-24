<?php
    include "config.php";
    $title = basename($_SERVER["SCRIPT_FILENAME"], '.php');

    if (isset($_GET['logout'])) {
        logout();
    }
?>
<!doctype html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=2.0;">
</head>

<body>
    <header class="site-header">
        <h3> Admin test page </h3>
    </header>

    <nav class="navbar">
        <a class="<?= $pages["admin.php"] ?>" href="admin.php">Admin</a>
        <a class="<?= $pages["user.php"] ?>" href="user.php">User</a>
        <a class="<?= $pages["anotheradmin.php"] ?>" href="anotheradmin.php">Another admin page</a>
    </nav>
    <?php
        if(isAdmin()){
            echo "<a href='?logout'>Log out</a>";
        }
    ?>
    <div class="site-content">
